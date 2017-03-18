<?php
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Task\Library;
class hook {
    public function __construct() {
        $this->uid = (int) cookie('_userid');
    }
    
    public function system_init() {
    	/* 活动定时上线 */
    	$sqlmap = array();
    	$sqlmap['status'] = -1;
    	$sqlmap['start_time'] = array("LT", NOW_TIME);
    	$online_ids = model('task_day')->where($sqlmap)->limit(100)->order("start_time ASC")->getField('id', TRUE);
    	if($online_ids) {
    		foreach ($online_ids as $id) {
    			$factory = new \Task\Factory\task($id);
    			$factory->set_status(1, '任务开始');
    		}
    	}

    	/* 活动份数发放完毕，则自动结束 */
        $sql = "SELECT `id` FROM `".C('DB_PREFIX')."task_day` WHERE ( `status` = 1 ) AND ( `goods_number` = `already_num` )";
        $offline_ids = M()->query($sql);
        if($offline_ids) {
            foreach ($offline_ids as $id) {
                $factory = new \Task\Factory\task($id['id']);
                $factory->set_status(2, '任务结束');
            }
        }
    	return FALSE;
    }
    
    /* 注册奖励 */
    public function member_register_success(&$param) {

        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'reg';
        $task = model('task')->where($sqlmap)->order("sort ASC,id DESC")->find();
        if(!$task) return FALSE;
    
        //如果开启云平台 发送新人注册奖励
        if(c('sso_is_open') == 1){
           $info['userid'] = $this->uid;
           $info['type'] = $task['task_type'];
           $info['type_id'] = '1101';
           $info['num'] = $task['task_reward'];
           _ps_send($task['task_type'],$info);
        
        }
        $sign = '3-1-'.$this->uid;
        $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
        if(!$rs){
        
            action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
        }else{
            return FALSE;
        }

        
        
        /* 邀请奖励 */
      /* $agent_id = model('member')->where(array('userid' => $param['userid']))->getField('agent_id');
        if($agent_id > 0) {
           // $invite = model('task')->where(array('task_status' => 1, 'type' => 'invite'))->find();
        	$invite = getcache('friend_setting','member');
            if($invite) action_finance_log($agent_id, $invite['fix']['r_cost'], $invite['fix']['r_type'], '邀请好友注册成功',array('recommend_status'=>'1'));
        } */
        return TRUE;
    }
    
    
    /* 邮件认证 */
    public function member_attesta_email(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'email';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();
        if(!$tasks) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-3-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){

                 if(C('sso_is_open') == 1){
                    unset($info);
                    $info = array();
                    $info['userid'] = $this->uid;
                    $info['type'] = $task['task_type'];
                    $info['type_id'] = '1104';
                    $info['num'] = $task['task_reward'];
                   _ps_send($task['task_type'],$info);


                }
               action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
            }
            
        }
        return TRUE;        
    }
    
    /* 手机认证 */ 
    public function member_attesta_phone(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'phone';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();
        if(!$tasks) return FALSE;
        $rs_1 = model('member')->where(array('userid'=>$this->uid,'phone_status' =>1))->getField('userid');
        if(!$rs_1) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-2-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){
                //如果开启云平台 发送新人注册奖励
                if(C('sso_is_open') == 1){
                    unset($info);
                    $info = array();
                    $info['userid'] = $this->uid;
                    $info['type'] = $task['task_type'];
                    $info['type_id'] = '1103';
                    $info['num'] = $task['task_reward'];
                    $ret = _ps_send($task['task_type'],$info);
                    $data = php_data($ret);
                    if ($data['status'] == 1) {
                       action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);

                    }
                }else{
                    action_finance_log($this->uid,$task['task_reward'], $task['task_type'], $task['task_name'],$sign);

                }
            }
        }
        /*邀请好友完成手机认证奖励*/
        $agent_id = model('member')->where(array('userid' =>$this->uid,'phone_status' =>1))->getField('agent_id');
        if($agent_id > 0) {
        	$invite = getcache('friend_setting','member');
        	if($invite) {
        	    $sign1 = '3-7-'.$agent_id.'-'.$this->uid;
        	    $rs1 = model('member_finance_log')->where(array('only'=>$sign1))->find();
        	    if(!$rs){
        	        action_finance_log($agent_id, $invite['fix']['cost'] , $invite['fix']['type'] , '您邀请的好友(会员id:'.$this->uid.')完成手机认证',$sign1,array('recommend_status'=>'1'));
        	    }
                /*被邀请人奖励 10-userid-agent_id-当前时间*/
                $_sign_1 = '10-'.$this->uid.'-'.$agent_id.'-'.NOW_TIME;
                $rss = model('member_finance_log')->where(array('only'=>$_sign_1))->find();
                if (!$rss) {
                    action_finance_log($this->uid, $invite['fix']['cost2'] , $invite['fix']['type2'] , '您被好友邀请并完成手机认证',$_sign_1,array('recommend_status'=>'1'));
                }
        	}
        }
        return TRUE;
    }
    
    /* 实名认证 */
    public function member_attesta_name(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'name';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();

        /*获取用户的实名认证状态 未通过不予奖励*/
        $name_status = model('member_attesta')->where(array('id' =>$param['id']))->getField('status');
        if($name_status != 1) return FALSE;

        if(!$tasks) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-4-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){
                 //如果开启云平台 发送新人注册奖励
                if(C('sso_is_open') == 1){
                    unset($info);
                    $info = array();
                    $info['userid'] = $this->uid;
                    $info['type'] = $tasks['task_type'];
                    $info['type_id'] = '1105';
                    $info['num'] = $tasks['task_reward'];
                   _ps_send($tasks['task_type'],$info);


                }
                action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
            }
        }
        return TRUE;        
    }
    
    /* 支付宝认证 */
    public function member_attesta_alipay(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'alipay';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();
        if(!$tasks) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-8-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){
                action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
            }
        }
        return TRUE;        
    }

    /* 银行卡认证 */
    public function member_attesta_bank(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'bank';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();
        if(!$tasks) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-9-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){
                action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
            }
        }
        return TRUE;        
    } 

    /* 店铺认证 */
    public function member_attesta_shop(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'shop';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();
        if(!$tasks) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-10-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){
                action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
            }
        }
        return TRUE;        
    } 

    /* 品牌认证 */
    public function member_attesta_brand(&$param) {
        $sqlmap = array();
        $sqlmap['task_status'] = 1;
        $sqlmap['type'] = 'brand';
        $tasks = model('task')->where($sqlmap)->order("sort ASC,id DESC")->select();
        if(!$tasks) return FALSE;
        foreach ($tasks as $key => $task) {
            $sign = '3-11-'.$this->uid;
            $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
            if(!$rs){
                action_finance_log($this->uid, $task['task_reward'], $task['task_type'], $task['task_name'],$sign);
            }
        }
        return TRUE;        
    }

  	/*邀请好友等级奖励*/
    /**
     * 
     * @param int 传进来的是完成试用的用户id
     * @return boolean
     * 
     */
    public function goods_friends_reward(&$param){
        if (!$param['userid']) return FALSE;
        //推荐人是否为VIP
        $agentid = model('member')->where(array('userid'=>$param['userid']))->getField('agent_id');
        //file_put_contents('D:/wwww1.txt',$agentid);
        $gid = model('member')->where(array('userid'=>$agentid))->getField('groupid');
        //file_put_contents('D:/wwww2.txt',$gid);
        if($gid <=1 ){
        	return FALSE;
        }
        //file_put_contents('D:/wwww3.txt',$gid);
        $levels = model('member')->where(array('userid'=>$param['userid']))->getField('levels');
        if (!$levels) return FALSE;
        //file_put_contents('D:/wwww3-1.txt',$levels);
        $order_count = model('order')->where(array('buyer_id'=>$param['userid'],'status'=>array('eq',7)))->count();
        if ($order_count < 1) {
            return FALSE;
        }
        //file_put_contents('D:/wwww4.txt',$order_count);
        $_levels = string2array($levels);
        $setting = getcache('friend_setting','member');
        $level = $setting['friend'];
        if (!$level) return FALSE;
        //file_put_contents('D:/wwww5.txt',json_encode($level));
        /*11-等级-userid-当前时间*/
        foreach ($_levels as $k => $v) {
            $sign = '11-'.$_levels[$k].'-'.$param['userid'].'-'.time();
            ////file_put_contents('D:/wwww6.txt',$sign);
            if ($level[$k+1]['type'] == 'money') {
                //$msg = '您的'.($k+1).'级好友(会员id:'.$param['userid'].'),完成邀请任务,您获得奖励'.$level[$k+1]['cost'].'元';
                //$reward = sprintf('%.2f',$level[$k+1]['cost']);
                //现金按百分比计算
                $reward = round( ($param['goods_price']*$level[$k+1]['cost'])/100, 2); 
                $msg = '您的'.($k+1).'级好友(会员id:'.$param['userid'].'),做完任务,您获得奖励'.$reward.'元';
                $type = 'money';
            }else{
                $msg = '您的'.($k+1).'级好友(会员id:'.$param['userid'].'),完成邀请任务,您获得奖励'.$level[$k+1]['cost'].'积分';
                $reward = $level[$k+1]['cost'];
                $type = 'point';
            }
            //每一笔都计算，所以这里屏蔽
            //$rs = model('member_finance_log')->where(array('only'=>$sign,'userid'=>$_levels[$k]))->find();
            //if(!$rs){
            //file_put_contents('D:/wwww7.txt',$msg);
                if (C('sso_is_open') == 1) {
                    $info = array();
                    $info['userid'] = $_levels[$k];
                    $info['type'] = $level[$k+1]['type'];
                    $info['type_id'] = 1202+($k+1);
                    $info['num'] = $reward;
                    $info['level'] = $k+1;
                    $ret = _ps_send($level[$k+1]['type'],$info);
                    $data = php_data($ret);
                    if ($data['status'] == 1) {
                        action_finance_log($_levels[$k], $reward,$level[$k+1]['type'],$msg,$sign,array('recommend_status'=>1));
                    }
                    # code...
                }else{
                    action_finance_log($_levels[$k], $reward,$level[$k+1]['type'],$msg,$sign,array('recommend_status'=>1));

                }
           // }
            
        }

        return TRUE;
       
    }

    /*闪电佣金邀请好友等级奖励*/
    /**
     * @desc
     * @param int 传进来的是完成试用的用户id
     * @return boolean
     *
     */
    public function goods_friends_reward_trial(&$param)
    {
        if (!$param['userid']) return FALSE;
        //推荐人是否为VIP
        $agentid = model('member')->where(array('userid'=>$param['userid']))->getField('agent_id');
        //查询一级推荐人信息
        $fdata = model('member')->where(array('userid'=>$agentid))->find();
        if(empty($fdata) || $fdata['groupid'] <= 1)
        {
            return FALSE;
        }
        //一级下属都有 1% 奖励
        $reward =sprintf('%.2f',$param['goods_price'] * 0.01);
        if($fdata['groupid'] == 2 || $fdata['groupid'] == 4 || $fdata['groupid'] == 5 || $fdata['groupid'] == 6)
        {
            $msg = "您的1级好友(会员id:".$param['userid']."),做完任务,您获得奖励".$reward."元";
            $sign = '11-'.$fdata['userid'].'-'.$param['userid'].'-'.time();
            action_finance_log($fdata['userid'], $reward,'money',$msg,$sign,array('recommend_status'=>1));
        }

        //二级好有奖励
        $sdata = model('member')->where(array('userid'=>$fdata['agent_id']))->find();

        if( $sdata['groupid'] == 5 || $sdata['groupid'] == 6)
        {
            $msg = "您的2级好友(会员id:".$param['userid']."),做完任务,您获得奖励".$reward."元";
            $sign = '11-'.$sdata['userid'].'-'.$param['userid'].'-'.time();
            action_finance_log($sdata['userid'], $reward,'money',$msg,$sign,array('recommend_status'=>1));
        }

        //三级好有奖励
        $tdata = model('member')->where(array('userid'=>$sdata['agent_id']))->find();

        if($tdata['groupid'] == 6)
        {
            $msg = "您的3级好友(会员id:".$param['userid']."),做完任务,您获得奖励".$reward."元";
            $sign = '11-'.$tdata['userid'].'-'.$param['userid'].'-'.time();
            action_finance_log($tdata['userid'], $reward,'money',$msg,$sign,array('recommend_status'=>1));
        }

        return TRUE;

    }

    /**
     * 
     * @param unknown $param
     * @return boolean
     */
    public function goods_friends_order_reward(&$param){
        if (!$param['userid']) return FALSE;
        // 获得当前用户的推荐人
        $agent_id = model('member')->where(array('userid'=>$param['userid']))->getField('agent_id');
        if (!$agent_id) return FALSE;
        // 统计当前用户的订单数
        $order_count = model('order')->where(array('buyer_id'=>$param['userid'],'status'=>array('eq',7)))->count();
        if ($order_count < 3) {
            return FALSE;
        }
        // 订单数达到3个以上，且有酬谢配置
        $setting = getcache('friend_setting','member');
        if($setting) {
            $_signs = '13-'.$param['userid'].'-'.$agent_id.'-'.'3';
            // 查找是否已经酬谢过了
            $_rs = model('member_finance_log')->where(array('only'=>$_signs,'userid'=>$param['userid']))->find();
            // 开始酬谢
            if ($setting['fix']['type3'] == 'point') {
                $msg = '积分';
            }else{
                $msg = '元金额';
            }
            if (!$_rs) {
                action_finance_log($param['userid'], $setting['fix']['cost3'] , $setting['fix']['type3'] , '您被好友邀请且完成了3笔订单获得奖励'.$setting['fix']['cost3'].$msg,$_signs,array(' '=>'1'));
            }
        }
         return true;
    }
    
    
}
