<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Member\Controller;
use \Member\Controller\InitController;
class YebController extends InitController {
	public function _initialize() {
		parent::_initialize();
		$this->db = model("member_finance_log");
		$this->yeb = model("yeb_index");
		$this->pay = model('pay_check');
		$this->cash = model('cash_records');
		$this->pagesize = 10;
		$this->pagecurr = max(1,I('page',1,'intval'));
	}
	/* 淘金呗 */
	public function index() {
		$sqlMap = array();
		if (IS_GET) {
			$info = I('get.');
			$start_time = $info['start_time'];
			$end_time = $info['end_time'];
			$info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : 0;
			$info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : 0;

			/* 注册时间 */
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
		}
		$userinfo = getUserInfo($this->userid);
		$sqlMap['userid'] = $this->userid;
		$sqlMap['type'] = array('in','yeb_rate');//淘金呗
		$count = $this->db->where($sqlMap)->count();	
		$account = $this->db->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order("dateline DESC")->select();
		$pages = showPage($count,$this->pagecurr,$this->pagesize);
		$v2_pages = v2_page_3($count,$this->pagesize);

		$SEO = seo(0,"淘金呗");
        //收益率
        $pay_setting = getcache('yeb_setting','pay');
        extract($pay_setting);
        //昨日收益
        $day_s = strtotime(date('Y-m-d 00:00:00',strtotime('-1 day')));
        $day_end = strtotime(date('Y-m-d 23:59:59',strtotime('-1 day')));
        $map = array(
            'userid'=>$this->userid,
            'type'=>'yeb_rate',
            'dateline'=>array("BETWEEN",array($day_s,$day_end)),
        );
        $yebInfo_yesterday = $this->db->where($map)->find();//加锁查询
        $yesterday_yeb = $yebInfo_yesterday['num'] ? $yebInfo_yesterday['num']:0;
        $yesterday_yeb = bcadd($yesterday_yeb,0,2);

		include template('buyer/yeb/index');
	}

    //转入转出淘金呗
    public function toYeb(){
        $info = I('post.');
        $type = floatval($info['type']);
        $money =  floatval($info['money']);
        $money = bcadd($money,0,2);//转成小数2位
        $arr = array(
            'id'=>1001,
            'msg'=>$money,
            'info'=>''
        );

        if($money<=0) {
            $arr['msg'] = ('金额不正确');
        }
        //$this->ajaxReturn ($arr,'JSON');
        M()->startTrans();
        $this->member = M('member');
        $time = NOW_TIME;
        $day = date('Y-m-d',NOW_TIME);
        try{
            $map['userid']=$this->userid;//查询条件
            $memberInfo = $this->member->lock(true)->where($map)->find();//加锁查询
            //将余额转入淘金呗
            if($type==1){
                $less_money = bcsub($memberInfo['money'],$money,2);
                $yeb_money = bcadd($memberInfo['yeb_money'],$money,2);
                if($less_money<0){
                    throw new \Exception('余额不足',-1);
                }
                $sign = uniqid($this->userid);
                //会员资金日志
                $result = action_finance_log($this->userid,$money,'yeb','将余额转入淘金呗',$sign,array(),true,$yeb_money,'money');
                if(!$result){
                    throw new \Exception('写入资金日志失败2',-1);
                }
            }
            //将淘金呗转出到余额
            else{
                $yeb_money= bcsub($memberInfo['yeb_money'],$money,2);
                $less_money = bcadd($memberInfo['money'],$money,2);
                if($yeb_money<0){
                    throw new \Exception('淘金呗不足',-1);
                }
                //会员日志
                $sign = uniqid($this->userid);
                $result = action_finance_log($this->userid,$money,'money','将淘金呗转出到余额',$sign,array(),true,$less_money,'yeb');
                if(!$result){
                    throw new \Exception('写入资金日志失败',-1);
                }
            }


            //变动金额
            $data = array(
                'money'=>$less_money,
                'yeb_money'=>$yeb_money,
            );

            //条件
            $condition['userid'] = $this->userid;
            $status = $this->member->where($condition)->save($data); // 根据条件保存修改的数据
            if($status===false){
                throw new \Exception('操作失败',-1);
            }

            //记录淘金呗每日日志
            $result_mew = log_yeb_day($this->userid,$day);
            if(!$result_mew){
                throw new \Exception('写入资金日志失败3',-1);
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


}