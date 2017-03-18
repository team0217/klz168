<?php
namespace Pay\Controller;
use \Admin\Controller\InitController;
class SettingController extends InitController{
	public function _initialize(){
		parent::_initialize();
		$this->typeConfig = array(
            'quick'   => '快速提现',
            'small'   => '普通提现',
        );
        $this->db = model('member_finance_log');
        $this->yeb = model('yeb');
		$this->type = (isset($this->typeConfig['quick'])) ? $this->typeConfig['quick'] : 'small';
	}
	public function init(){
		$pay_setting = getcache('deposite_setting','pay');
        extract($pay_setting);
		$form = new \Common\Library\form();
		include $this->admin_tpl('deposite_setting');
	}
    public function yeb(){
        $pay_setting = getcache('yeb_setting','pay');
        extract($pay_setting);
        $form = new \Common\Library\form();
        include $this->admin_tpl('yeb_setting');
    }

    public function update(){
		if(submitcheck('dosubmit')){
		  	$info = $_POST['setting'];
            if (empty($info)) { $this->error('参数错误');}
            setcache('deposite_setting',$info,'pay');
            $this->success('操作成功');
		}else{
			$this->error('请勿非法提交');
		}
	}
    public function update_yeb(){
        if(submitcheck('dosubmit')){
            $info = $_POST['setting'];
            if (empty($info)) { $this->error('参数错误');}
            setcache('yeb_setting',$info,'pay');
            $this->success('操作成功');
        }else{
            $this->error('请勿非法提交');
        }
    }

    /*查询淘金呗列表*/
    public function yeb_transfer_lists(){
        $pagecurr = max(1,I('page',0,'intval'));
        $pagesize = 20;
        $sqlMap = array();
        $condition = array();
        $info = I('param.');
        $type = (isset($info['type'])) ? (int) $info['type'] : 1;
        if(IS_GET){

            if($type ==1 ){
                $sqlMap['type'] = 'yeb';
                $sqlMap['from'] = 'money';
            }
            else {
                $sqlMap['type'] = 'money';
                $sqlMap['from'] = 'yeb';
            }
            /*else{
                ///$sqlMap['type|from'] = 'yeb';
                //$sqlMap['from'] = 'money';

                $condition['type|from']  = array('eq', array('yeb','money'),'and');
                $condition['type|from']  = array('eq', array('money','yeb'),'and');
                $condition['_logic'] = 'or';
                $sqlMap['_complex'] = $condition;
                //$map['_string'] = " ((type='yeb' and from='money')  or (type='money' and from='yeb' )) ";

            }*/
            $keyword = $info['keyword'];
            $info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : strtotime(date('Y-m-d 00:00:00',time()));
            $info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : strtotime(date('Y-m-d 23:59:59',time()));
            $info['end_time'] = strtotime(date('Y-m-d 23:59:59', $info['end_time']));
            if ($info['start_time'] && $info['end_time']){
                $sqlMap['dateline'] = array("BETWEEN",array($info['start_time'],$info['end_time']));
            }else{
                if ($info['start_time'] > 0) {
                    $sqlMap['dateline'] = array("EGT", $info['start_time']);
                }
                if ($info['end_time'] > 0) {
                    $sqlMap['dateline'] = array("ELT", $info['end_time']);
                }
            }

            if(isset($info['p_type']) && isset($keyword) && $keyword!=''){
                if($info['p_type'] == 1){//昵称
                    //查出输入昵称相似的会员
                    $rs = model('member')->where(array('nickname'=>array("LIKE","%$keyword%")))->select();
                    foreach($rs as $k=>$v){
                        $ids[] = $v['userid'];
                    }
                    $sqlMap['userid'] = array("in",$ids);
                }else{
                    $sqlMap['userid'] = $keyword;
                }
            }
        }
        //print_r($sqlMap);
        $count = $this->db->where($sqlMap)->count();
        $lists = $this->db->where($sqlMap)->page($pagecurr,$pagesize)->order('dateline DESC')->select();
        foreach ($lists as $k=>$v){
            //查出用户名、用户组
            $lists[$k]['nickname'] = model('member')->getFieldByUserid($v['userid'],'nickname');
            $lists[$k]['modelid'] =  model('member')->getFieldByUserid($v['userid'],'modelid');
        }

        $pages = page($count,$pagesize);
        $form = new \Common\Library\form();
        include $this->admin_tpl('yeb_transfer_lists');
    }

    /*查询淘金呗每日列表*/
    public function money(){
        $pagecurr = max(1,I('page',0,'intval'));
        $pagesize = 20;
        $sqlMap = array();
        $info = I('param.');
        if(IS_GET){
            $keyword = $info['keyword'];
            $info['start_time'] = (!empty($info['start_time'])) ? ($info['start_time']) : (date('Y-m-d 00:00:00',strtotime('-7 day')));
            $info['end_time'] = (!empty($info['end_time'])) ? ($info['end_time']) : (date('Y-m-d 23:59:59',time()));
            $info['end_time'] = (date('Y-m-d 23:59:59', strtotime($info['end_time'])));
            if ($info['start_time'] && $info['end_time']){
                $sqlMap['b_day'] = array("BETWEEN",array($info['start_time'],$info['end_time']));
            }else{
                if ($info['start_time'] > 0) {
                    $sqlMap['b_day'] = array("EGT", $info['start_time']);
                }
                if ($info['end_time'] > 0) {
                    $sqlMap['b_day'] = array("ELT", $info['end_time']);
                }
            }

            if(isset($info['p_type']) && isset($keyword) && $keyword!=''){
                if($info['p_type'] == 1){//昵称
                    //查出输入昵称相似的会员
                    $rs = model('member')->where(array('nickname'=>array("LIKE","%$keyword%")))->select();
                    foreach($rs as $k=>$v){
                        $ids[] = $v['b_uid'];
                    }
                    $sqlMap['b_uid'] = array("in",$ids);
                }else{
                    $sqlMap['b_uid'] = $keyword;
                }
            }
        }
        //print_r($sqlMap);

        $count = $this->yeb->where($sqlMap)->count();
        $lists = $this->yeb->where($sqlMap)->page($pagecurr,$pagesize)->order('b_id DESC')->select();
        foreach ($lists as $k=>$v){
            //查出用户名、用户组
            $lists[$k]['nickname'] = model('member')->getFieldByUserid($v['b_uid'],'nickname');
            $lists[$k]['modelid'] =  model('member')->getFieldByUserid($v['b_uid'],'modelid');
        }

        $pages = page($count,$pagesize);
        $form = new \Common\Library\form();
        include $this->admin_tpl('yeb_money');
    }

    //淘金呗收入
    public function yeb_get_money(){
        $pagecurr = max(1,I('page',0,'intval'));
        $pagesize = 20;
        $sqlMap = array();
        $condition = array();
        $info = I('param.');
        $type = (isset($info['type'])) ? (int) $info['type'] : 1;
        if(IS_GET){


            $sqlMap['type'] = 'yeb_rate';


            $keyword = $info['keyword'];
            $info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : strtotime(date('Y-m-d 00:00:00',time()));
            $info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : strtotime(date('Y-m-d 23:59:59',time()));
            $info['end_time'] = strtotime(date('Y-m-d 23:59:59', $info['end_time']));
            if ($info['start_time'] && $info['end_time']){
                //if($info['start_time']==$info['end_time'])  $info['end_time'] = strtotime(date('Y-m-d 23:59:59', $info['end_time']));
                $sqlMap['dateline'] = array("BETWEEN",array($info['start_time'],$info['end_time']));
            }else{
                if ($info['start_time'] > 0) {
                    $sqlMap['dateline'] = array("EGT", $info['start_time']);
                }
                if ($info['end_time'] > 0) {
                    $sqlMap['dateline'] = array("ELT", $info['end_time']);
                }
            }

            if(isset($info['p_type']) && isset($keyword) && $keyword!=''){
                if($info['p_type'] == 1){//昵称
                    //查出输入昵称相似的会员
                    $rs = model('member')->where(array('nickname'=>array("LIKE","%$keyword%")))->select();
                    foreach($rs as $k=>$v){
                        $ids[] = $v['userid'];
                    }
                    $sqlMap['userid'] = array("in",$ids);
                }else{
                    $sqlMap['userid'] = $keyword;
                }
            }
        }
        //print_r($sqlMap);
        $count = $this->db->where($sqlMap)->count();
        $lists = $this->db->where($sqlMap)->page($pagecurr,$pagesize)->order('dateline DESC')->select();
        foreach ($lists as $k=>$v){
            //查出用户名、用户组
            $lists[$k]['nickname'] = model('member')->getFieldByUserid($v['userid'],'nickname');
            $lists[$k]['modelid'] =  model('member')->getFieldByUserid($v['userid'],'modelid');
        }

        $pages = page($count,$pagesize);
        $form = new \Common\Library\form();
        include $this->admin_tpl('yeb_rate_lists');
    }

    //设定收益
    public function set_yeb_money(){
        $info = I('post.');
        $type = floatval($info['type']);
        $id =  floatval($info['id']);

        $arr = array(
            'id'=>1001,
            'msg'=>'未知',
            'info'=>''
        );

        if($id<=0) {
            $arr['msg'] = ('ID不正确');
        }
        //$this->ajaxReturn ($arr,'JSON');
        M()->startTrans();
        $this->member = M('member');
        $time = NOW_TIME;
        $day = date('Y-m-d',NOW_TIME);
        try{

            $map = array(
                'b_id'=>$id,
            );
            $yebInfo_today = M('yeb')->lock(true)->where($map)->find();//加锁查询
            if(!$yebInfo_today){
                throw new \Exception('数据不存在',-1);
            }
            if($yebInfo_today['b_is_finish']!='0'){
                throw new \Exception('已操作，不能重新确认',-1);
            }
            if($type==1){
                $uid = $yebInfo_today['b_uid'];
                $day_on = $yebInfo_today['b_day'];
                //计算收入
                $b_money_new = bcmul($yebInfo_today['b_money'],$yebInfo_today['b_rate'],2);
                $b_add_money_new = bcmul($yebInfo_today['b_add_money'],$yebInfo_today['b_rate'],2);
                $b_money_all = bcadd($b_money_new,$b_add_money_new,2);

                $map = array(
                    'userid'=>$uid,
                );
                $memberInfo = $this->member->lock(true)->where($map)->find();//加锁查询
                $yeb_money_new = bcadd($b_money_all,$memberInfo['yeb_money'],2);
                //变动金额
                $data = array(
                    'yeb_money'=>$yeb_money_new,
                );
                //throw new \Exception('已操作，不能重新确认'.var_export($data,1),-1);
                //条件
                $condition['userid'] = $uid;
                $status = $this->member->where($condition)->save($data); // 根据条件保存修改的数据
                if($status===false){
                    throw new \Exception('操作失败1',-1);
                }
                $sign = uniqid($this->userid);
                //会员资金日志
                $result = action_finance_log($uid,$b_money_all,'yeb_rate',$day_on.'淘金呗收入',$sign,array(),true,$yeb_money_new,'yeb');
                if(!$result){
                    throw new \Exception('写入资金日志失败2',-1);
                }

            }

                $condition = array(
                    'b_id'=>$id,
                );
                $data = array(
                    'b_is_finish'=>''.$type.'',
                );
                //throw new \Exception('已操作，不能重新确认'.var_export($data,1),-1);
                $status = M('yeb')->where($condition)->save($data); // 根据条件保存修改的数据
                if($status===false){
                    throw new \Exception('操作失败2',-1);
                }


            // 提交事务
            M()->commit();

            $arr['id'] = 1002;
            $arr['msg'] = '操作成功';
            $arr['info'] = $data;
            $this->ajaxReturn ($arr,'JSON');

        } catch (\Exception $e) {

            $arr['id'] = 1001;
            $arr['msg'] = $e->getMessage();
            $this->ajaxReturn ($arr,'JSON');
            M()->rollback();
        }
    }

    //生成所有淘金呗用户昨天的
    public function fresh_yeb_money(){
        $data = M('member')->where(" yeb_money>0 ")->field('yeb_money,userid')->select();
        M()->startTrans();
        $day = date('Y-m-d',strtotime('-1 day'));
        try{
            foreach($data as $v){

                $map = array(
                    'b_uid'=>$v['userid'],
                    'b_day'=>$day,
                );
                $yebInfo_today = M('yeb')->lock(true)->where($map)->find();//加锁查询
                if(!$yebInfo_today){


                    $pay_setting = getcache('yeb_setting','pay');
                    extract($pay_setting);
                    $log = array();
                    $log['b_uid']=$v['userid'];
                    $log['b_day']=$day;
                    $log['b_money']=$v['yeb_money'];
                    $log['b_add_money']=0;
                    $log['b_rate']=$rate;//注:从$pay_setting获取
                    //throw new \Exception('写入资金日志失败'.var_export($log,1),-1);
                    $r = model('yeb')->add($log);
                    //if(!$r) return FALSE;


                }

            }

            M()->commit();
            $arr['id'] = 1002;
            $arr['msg'] = '操作成功';
            $arr['info'] = $data;
            $this->ajaxReturn ($arr,'JSON');

        } catch (\Exception $e) {

            $arr['id'] = 1001;
            $arr['msg'] = $e->getMessage();
            $this->ajaxReturn ($arr,'JSON');
            M()->rollback();
        }

    }


}