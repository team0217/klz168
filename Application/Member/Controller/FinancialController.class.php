<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Member\Controller;
use \Member\Controller\InitController;
class FinancialController extends InitController {
	public function _initialize() {
		parent::_initialize();
		$this->member = model("member");
		$this->db = model("member_finance_log");
		$this->pay = model('pay_check');
		$this->cash = model('cash_records');
		$this->pagesize = 10;
		$this->pagecurr = max(1,I('page',1,'intval'));
	}
	/* 账单明细 */
	public function index() {
		// 冻结中的保证金
		$frozen_deposit = model('member_merchant')->where(array('userid' => $this->userid))->getField("frozen_deposit");
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
		$sqlMap['type'] = array('in','money,yeb,yeb_rate');
		$count = $this->db->where($sqlMap)->count();	
		$account = $this->db->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order("dateline DESC")->select();
		$pages = showPage($count,$this->pagecurr,$this->pagesize);
		$v2_pages = v2_page_3($count,$this->pagesize);

		$SEO = seo(0,"账单明细");
		include template('buyer/financial');
	}

	/*充值记录*/
	public function pay_log(){
		if (IS_GET) {
			$info = I('get.');
			$info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : 0;
			$info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : 0;
			/* 注册时间 */
			if ($info['start_time'] && $info['end_time']){
				$sqlMap['inputtime'] = array("BETWEEN",array($info['start_time'],$info['end_time']));
			}else{
				if ($info['start_time'] > 0) {
				$sqlMap['inputtime'] = array("EGT", $info['start_time']);
				}
				if ($info['end_time'] > 0) {
					$sqlMap['inputtime'] = array("ELT", $info['end_time']);
				}
			};
		}
		$sqlMap['userid'] = $this->userid;	
		$type = I('type',1);		
		if ($type == 1) {
			$count = $this->pay->where($sqlMap)->count();
			$pay_log = $this->pay->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order("check_time DESC,inputtime DESC")->select();
		}else{
			$count = model('pay_order')->where($sqlMap)->count();
			$pay_log = model('pay_order')->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order("id DESC,notify_time DESC")->select();
		}
		$userinfo = getUserInfo($this->userid);		
		$pages = showPage($count,$this->pagecurr,$this->pagesize);
		$SEO = seo(0,"充值记录");
		include template('pay_log');
	}

	/*提现记录*/
	public function cash_log(){
		if (IS_GET) {
			$info = I('get.');
			$start_time = $info['start_time'];
			$end_time = $info['end_time'];
			$info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : 0;
			$info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : 0;
			/* 注册时间 */
			if ($info['start_time'] && $info['end_time']){
				$sqlMap['inputtime'] = array("BETWEEN",array($info['start_time'],$info['end_time']));
			}else{
				if ($info['start_time'] > 0) {
				$sqlMap['inputtime'] = array("EGT", $info['start_time']);
				}
				if ($info['end_time'] > 0) {
					$sqlMap['inputtime'] = array("ELT", $info['end_time']);
				}
			}
		}
		$sqlMap['userid'] = $this->userid;
		$count = $this->cash->where($sqlMap)->count();
		$cash = $this->cash->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order("check_time DESC,inputtime DESC")->select();
		$userinfo = getUserInfo($this->userid);
		$pages = showPage($count,$this->pagecurr,$this->pagesize);
		$SEO = seo(0,"提现记录");
		include template('cash_log');
	}

	/* 积分明细 */
	public function point_log(){
		if ($this->userinfo['modelid'] != 1) $this->error('请登录买家会员',U('member/index/login'));
		$userinfo = model('member')->find($this->userid);
		$sqlMap = array();
		$sqlMap['id'] = array('NEQ',2);
        $task = model('task')->where($sqlMap)->select(); 
        unset($sqlMap);
        $sqlmap = array();
        $sqlmap['userid'] = $this->userid;
		$sqlmap['type'] = 'point';
		$count = model('member_finance_log')->where($sqlmap)->count();	
		$point = model('member_finance_log')->where($sqlmap)->page($this->pagecurr,10)->order("id DESC")->select();
		$pages = showPage($count,$this->pagecurr,10);
		$v2_pages = v2_page_3($count,10);
		$SEO = seo(0,'积分明细记录');
		include template('buyer/integration');
	}

	


	public function convert_log(){
		$sqlMap['userid'] = $this->userid;
		$count = model('shop_log')->where($sqlMap)->count();
        $lists = model('shop_log')->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order("apply_time DESC,id DESC")->select();
        foreach ($lists as $k => $v) {
            $shop = model('shop')->where(array('id'=>$v['shop_id']))->select();
	        foreach ($shop as $key => $s) {
	            $lists[$k]['title'] = $s['title'];
	            $lists[$k]['images'] = $s['images'];
	        }
        }       
        $pages = showPage($count,$this->pagecurr,$this->pagesize);
		$SEO = seo(0,'积分兑换记录');
		include template('buyer/convert');
	}

	/* 保证金明细 */
	public function capital_log(){
		if ($this->userinfo['modelid'] != 2) $this->error('请登录商家会员',U('member/index/login'));
		$sqlMap = array();
		if (IS_GET) {
			$info = I('get.');
			$info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : 0;
			$info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : 0;
			/* 出账时间 */
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
		$userinfo = model('member')->find($this->userid);
		$sqlMap['userid'] = $this->userid;
		$sqlMap['type'] = 'deposit';
		$count = $this->db->where($sqlMap)->count();
		$capital = $this->db->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order('dateline DESC')->select();
		foreach ($capital as $k => $v) {
			$factory = new \Product\Factory\product($v['goods_id']);
			$capital[$k]['title'] = $factory->product_info['title'];
			$capital[$k]['url'] = $factory->product_info['url'];
		}
		$pages = showPage($count,$this->pagecurr,$this->pagesize);
		$SEO = seo(0,'保证金流动记录');
		// 总保证金
		$sqlmap = array();
		$sqlmap['company_id'] = $this->userid;
		$ids = model('product')->where($sqlmap)->getField("id",TRUE);
		foreach ($ids as $id) {
			$deposit_all += model('product_rebate')->where(array('id'=>$id))->getField("goods_deposit");
			$deposit_all += model('product_trial')->where(array('id'=>$id))->getField("goods_deposit");
		}
		if (C('DEFAULT_STYLE') == 'cloud2') {
			$deposit_all += model('task_day')->where(array('status'=>1,'company_id'=>$this->userid))->sum('totalmoney');
		}
		// 冻结中的保证金
		$frozen_deposit = model('member_merchant')->where(array('userid' => $this->userid))->getField("frozen_deposit");
		include template('merchant/capital');		
	}

    /*提现记录 json*/
    public function cash_log_json(){
        $param = I('param.');
        if(empty($param)) exit(0);
        extract($param);
        $page = max(1, (int) $page);
        $num = (isset($num) && is_numeric($num)) ? abs($num) : 20;
        $sqlmap = array();
        //查处购物返利的2状态和申请试用的1状态
        if($userid == 1) $sqlmap['userid'] = $this->userid;
        $count = $this->cash->where($sqlmap)->count();
        $lists = $this->cash->where($sqlmap)->page($page, $num)->order($orderby.' '.$orderway)->select();
        if($lists == ""){
            $result['status'] = 0;
            echo json_encode($result);
            exit;
        }
        foreach($lists as $k=>$v){
            $lists[$k]['inputtime2'] = date("Y-m-d",$v['inputtime']);
        }
        $pages = page($count, $num);
        $result = array();
        $result['status'] = 1;
        $result['data'] = array(
            'count' => $count,
            'lists' => $lists,
            'pages' => $pages
        );
        echo json_encode($result);
    }
	/*日赚任务记录*/
	public function work_log(){
		$pagecurr = max(1,I('page',0,'intval'));
		$pagesize = 10;
		$sqlMap = array();
		$sqlMap['userid'] = $this->userid;
		$count = model('task_records')->where($sqlMap)->count();
		$task_log = model('task_records')->where($sqlMap)->page($pagecurr,$pagesize)->order('id DESC')->select();

		foreach ($task_log as $k=>$v) {
			$factory = new \Task\Factory\task($v['tid']);
			$r = $factory->task_info;
			$task_log[$k]['task'] = $r;
		}
		$pages = page($count,$pagesize);
		$v2_pages = v2_page_3($count,$pagesize);

		$SEO = seo(0, '日赚任务记录');
		//总金额
		$money = model('task_records')->where($sqlMap)->sum('price');
		include template('buyer/task_log');
	}


    //会员间转账
    public function money_to_user(){

        $info = I('post.');
        $money =  floatval($info['money']);
        $pwd =  trim($info['set_pwd']);
        $money = bcadd($money,0,2);//转成小数2位

            $arr = array(
                'id'=>1001,
                'msg'=>$money,
                'info'=>''
            );

        if($money<=0) {
            $arr['msg'] = ('金额不正确');
            $this->ajaxReturn ($arr,'JSON');
        }


        $sqlMap['userid'] = $this->userid;

        $form_userinfo = $this->member->where($sqlMap)->lock(true)->field('userid,email')->find();
        if(!$form_userinfo){

        }
        $form_email = $form_userinfo['email'];

        $to_email = I('set_user');
        $time = I('time');
        $form_user_new_money = 0;
        $to_user_new_money = 0;
        if($form_email==$to_email){
            $arr['msg'] = ('来源方用户不能是目标用户');
            $this->ajaxReturn ($arr,'JSON');
        }
        if(  isemail($to_email) || is_mobile($to_email)  ){
            //交易备注
            $usernote = isset($_POST['usernote']) && trim($_POST['usernote']) ? addslashes(trim($_POST['usernote'])) :'会员间转账';

            $now_time = NOW_TIME;
            M()->startTrans();
            try{
                //根据用户名查出用户id
                $form_userinfo = $this->member->where(array('email|phone' => $form_email))->lock(true)->field('userid,money,password,encrypt')->find();
                if(!$form_userinfo){
                    throw new \Exception('来源方用户不存在',-1);
                }

                if ($form_userinfo['password'] != md5(md5($pwd.$form_userinfo['encrypt']))) {
                    throw new \Exception('用户名或密码错误',-1);
                }
                if($form_userinfo['money']<=0){
                    throw new \Exception('来源方用户金额不能转账'.var_export($form_userinfo,1),-1);
                }

                if($form_userinfo['money']<$money){
                    throw new \Exception('来源方用户金额不能转账'.var_export($form_userinfo,1),-1);
                }
                $form_user_new_money = bcsub($form_userinfo['money'],$money,2);
                //根据用户名查出用户id
                $to_userinfo = $this->member->where(array('email|phone' => $to_email))->lock(true)->field('userid,money')->find();
                if(!$to_userinfo){
                    throw new \Exception('目标用户不存在',-1);
                }

                //扣除来源方金额
                $sqlMap = array();
                $pay_unit = 0;//充值额度  有增加 ‘1’  减少 ‘0’ 增加及添加一个订单，减少及在用户的账户上相应的减少
                $userid = $sqlMap['userid'] = $form_userinfo['userid'];
                $sqlMap['email'] = $form_email;
                $sqlMap['inputtime'] = $now_time;
                $sqlMap['cause'] = $usernote;
                $num = $sqlMap['money'] = ($pay_unit == 1) ? $money : -$money;
                $sqlMap['ip'] = get_client_ip();
                $sqlMap['admin'] = get_admin_name(cookie('userid'));
                //新增记录
                $sign = '4-5-'.$userid.'-'.uniqid().'-'.$time;
                $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
                if($rs){
                    throw new \Exception('交易失败,请重试1',-1);
                }
                $to_user_new_money = bcadd($to_userinfo['money'],$money,2);

                $result = action_finance_log($userid,$num,'money','会员间转账，扣除余额，转给：'.$to_email,$sign,array(
                        'from_uid'=>$to_userinfo['userid'],
                        'transfer_type'=>1,
                    ));
                if(!$result){
                    throw new \Exception('交易失败,请重试2',-1);
                }

                $rs = model('pay_records')->add($sqlMap);
                if(!$rs){
                    throw new \Exception($this->member->getError(),-1);
                }

                //增加目标方金额
                $sqlMap = array();
                $pay_unit = 1;//充值额度  有增加 ‘1’  减少 ‘0’ 增加及添加一个订单，减少及在用户的账户上相应的减少
                $userid = $sqlMap['userid'] = $to_userinfo['userid'];
                $sqlMap['email'] = $to_email;
                $sqlMap['inputtime'] = $now_time;
                $sqlMap['cause'] = $usernote;
                $num = $sqlMap['money'] = ($pay_unit == 1) ? $money : -$money;
                $sqlMap['ip'] = get_client_ip();
                $sqlMap['admin'] = get_admin_name(cookie('userid'));
                //新增记录
                $sign = '5-5-'.$userid.'-'.uniqid().'-'.$time;
                $rs = model('member_finance_log')->where(array('only'=>$sign))->find();
                if($rs){
                    throw new \Exception('交易失败,请重试3',-1);
                }


                $result = action_finance_log($userid,$num,'money','会员间转账，获得收入，来源：'.$form_email,$sign,array(
                        'from_uid'=>$form_userinfo['userid'],
                        'transfer_type'=>1,
                    ));
                if(!$result){
                    throw new \Exception('交易失败,请重试4',-1);
                }

                $rs = model('pay_records')->add($sqlMap);
                if(!$rs){
                    throw new \Exception($this->member->getError(),-1);
                }

                //throw new \Exception('ok',-1);

                // 提交事务
                M()->commit();
                $arr['id'] = 1002;
                $arr['msg'] = ('交易成功');
                $arr['info'] = array(
                    'form'=>$form_user_new_money,
                    'to'=>$to_user_new_money,
                );
                $this->ajaxReturn ($arr,'JSON');
            } catch (\Exception $e) {
                M()->rollback();
                $arr['id'] = 1001;
                $arr['msg'] = $e->getMessage();
                $this->ajaxReturn ($arr,'JSON');
            }
        }else{
            $arr['id'] = 1001;
            $arr['msg'] = '手机或者邮箱格式错误';
            $this->ajaxReturn ($arr,'JSON');
        }


    }

    /**
     *检测邮箱或者手机是否存在
     */
    public function public_checkemail_ajax() {

        $email = I('to_email');

        if(isemail($email) || is_mobile($email)) {
            $sqlmap = array();
            $sqlmap['email|phone'] = $email;
            $rs = model('member')->where($sqlmap)->field('userid,money')->select();
            $member_info = member_info($rs[0]['userid']);
            if($rs) {
                $this->success(array('msg'=>'可用','name'=> ($member_info['name']==null?'':$member_info['name']) ));
            } else {
                $this->error('没有此用户');
            }
        }else{
            $this->error('格式错误');
        }

    }
}