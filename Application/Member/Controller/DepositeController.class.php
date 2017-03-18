<?php
namespace Member\Controller;
use \Admin\Controller\InitController;
class DepositeController extends InitController{
	public function _initialize(){
		parent::_initialize();
		$this->db = model('cash_records');
	}
	public function init(){
		$pagecurr = max(1,I('page',0,'intval'));
		$pagesize = 20;
		$sqlMap = array();
		$info = I('param.');
		$status = (isset($info['status']))	 ? (int) $info['status']: -2;
		/*if(isset($info['paypal'])){
			$paypal = $info['paypal'];
		}*/
		
		if(!empty($info['mintotalmoney']) || !empty($info['maxtotalmoney'])){
		    $mintotalmoney=$info['mintotalmoney'];
		    $maxtotalmoney=$info['maxtotalmoney'];
		    
		    if($info['maxtotalmoney'] > 3300){
		        $sqlMap['totalmoney'] = array('GT',3300);
		    } else{
		        $sqlMap['totalmoney'] = array("BETWEEN",array($info['mintotalmoney'],$info['maxtotalmoney']));
		    }
		}
		$type = (isset($info['type'])) ? (int) $info['type'] : -99;
		$paypal = (isset($info['paypal'])) ? (int) $info['paypal'] : -99;
		if(IS_GET){
			/*if(isset($info['paypal']) && $info['paypal']!=""){
				$sqlMap['paypal'] = $info['paypal'];
			}*/
			if($status > -2){
				$sqlMap['status'] = $status;
			}
			if($type > -99){
				$sqlMap['type'] = $type;
			}
			if($paypal > -99){
			    $sqlMap['paypal'] = $paypal;
			}
			$action = $info['export'];
			$keyword = $info['keyword'];
			$info['start_time'] = (!empty($info['start_time'])) ? strtotime($info['start_time']) : 0;
			$info['end_time'] = (!empty($info['end_time'])) ? strtotime($info['end_time']) : 0;
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
			
			if(isset($info['p_type']) && isset($keyword)){
				if($info['p_type'] == 1){//昵称 
					//查出输入昵称相似的会员
					$rs = model('member')->where(array('nickname'=>array("LIKE","%$keyword%")))->select();
					foreach($rs as $k=>$v){
						$ids[] = $v['userid'];
					}
					$sqlMap['userid'] = array("in",$ids);
				}else if($info['p_type'] == 0){
					$sqlMap['name'] = array("LIKE","%$keyword%");
				}else{
					$sqlMap['userid'] = $keyword;
				}				
			}
		}
		$count = $this->db->where($sqlMap)->count();		
		$lists = $this->db->where($sqlMap)->page($pagecurr,$pagesize)->order('inputtime DESC')->select();

		foreach ($lists as $k=>$v){
			//查出用户名、用户组
			$lists[$k]['nickname'] = model('member')->getFieldByUserid($v['userid'],'nickname');
			$lists[$k]['modelid'] =  model('member')->getFieldByUserid($v['userid'],'modelid');
		}
		
		if($action == 'export'){
		    $deposite_lists = $this->db->where($sqlMap)->order('inputtime DESC')->select();
		    
			$this->deposite_export($deposite_lists);
		}
		
		$pages = page($count,$pagesize);
		$form = new \Common\Library\form();
		include $this->admin_tpl('deposite_lists');
	}
	
	/*审核通过*/
	public function check($id = 0,$success_order=NULL){
		$id = (int) $id;
		if($id < 1) $this->error('参数错误');
		//判断该信息是否已经通过
		$rs = $this->db->where(array('cashid'=> $id))->find();
		if(IS_POST){
			if($rs['status'] != 0) $this->error('该信息已经审核，请勿重新审核','javascript:close_dialog();');
				$sqlmap['status'] =1;
				$sqlmap['check_time'] =time();
			if(isset($success_order)){
			    $sqlmap['success_order'] =$success_order;
			}
			$sqlmap['cashier'] =$_POST['cashier'];
			$sqlmap['username'] =cookie('admin_username');
			$result = $this->db->where(array('cashid'=>$id))->setField($sqlmap);
			if(!$result) $this->error('审核失败','javascript:close_dialog();');
			runhook('pay_cash_check',array('id' => $id, 'userid' => $rs['userid'],'money' => $rs['money'],'result' => 1,'paypal' => $rs['paypal']));
			$this->success('审核成功','javascript:close_dialog();');
		}
        include $this->admin_tpl('deposite_chek');
	}
	
	/*审核失败*/
	public function uncheck($id = 0){
		$id = (int) $id;
		if($id < 1) $this->error('参数错误');
		//判断该信息是否审核
		$info =  $this->db->where(array('cashid'=>$id))->find();
		if($info['status'] != 0) $this->error('该信息已经审核，请勿重新审核');
		if(IS_POST){
			$cause = trim($_POST['cause']);
			if (!$cause)	$this->error('请填写审核失败原因');
			$name = cookie('admin_username');
			$result = $this->db->where(array('cashid'=>$id))->setField(array('status'=>-1,'cause'=>$cause,'operator'=>$name,'check_time'=>NOW_TIME));
			if(!$result) $this->error('操作失败');
			//退还金额
			$info = $this->db->getByCashid($id);
			
			$sign = '4-2-'.$info['userid'].'-'.$info['money'].'-'.dgmdate($info['inputtime'],'Y-m-d H:i:s');
			$sqlmap = array();
			$sqlmap['only'] = $sign;
			$result = model('member_finance_log')->where($sqlmap)->find();
			if(!$result){
			    action_finance_log($info['userid'],$info['money'],'money','提现未通过返回',$sign,array());
			    runhook('pay_cash_check',array('id' => $id, 'userid' => $info['userid'],'money' => $info['money'],'result' => 0,'cause' => $cause));
			    $this->success('操作成功','javascript:close_dialog();');
			}else{
			    $this->error('操作失败,重复操作');
			}
		}else{
			include $this->admin_tpl('deposite_uncheck');
		}
	}

    /*重新审核处理微信支付*/
    public function check_weixin_deposite($id = 0){
    	$id = (int) $id;
    	if($id < 1) $this->error('参数错误');
    	//判断该信息是否审核
    	$info =  $this->db->where(array('cashid'=>$id))->find();

    	if($info['status'] != -2) $this->error('当前付款状态不对，请勿重新审核');
    	if($info['type'] != 3) $this->error('当前会员不是申请的微信提现');

    	$openid = model('member_oauth')->where(array('uid' =>$info['userid']))->getField('openid');
    	if(!$openid) $this->error('当前会员没有关注平台微信公众号,并且绑定帐号');

    	//发起快速提现申请
    	$deposite = new \Wechat\Pay\lib\WxPayMpaymkttransfers();
    	$wxrs = $deposite->wxpay_deposite($info['cashid'],$openid,$info['totalmoney'],$info['name']);
    	//print_r($wxrs);
    	if($wxrs['result_code'] == 'SUCCESS'){
    	    //标记已成功
    	    model('cash_records')->where(array('cashid' =>$id))->setField(array('status' =>1,'success_order' =>$wxrs['payment_no'],'err_cause'=>'','check_time' =>strtotime

($wxrs['payment_time'])));
    	    //写入交易成功订单号
    	    runhook('pay_cash_check',array('id' => $id, 'userid' => $info['userid'],'money' => $info['money'],'result' => 1,'paypal' => $info['paypal']));
    	    $this->success('提现处理成功,资金已实时到提现会员的微信钱包');
    	}else{
    	    //没有实时提现成功
    	    //标记原因
    	    model('cash_records')->where(array('cashid' =>$id))->setField(array('status' =>-2,'err_cause'=>$wxrs['return_msg']));
    	    $this->error('微信支付返回提示：'.$wxrs['return_msg']);
        }
    }

	/*提现详细信息*/
	public function deposite_info($id = 0){
		$id = (int) $id;
		if($id < 1) $this->error('参数错误');
		$info = $this->db->getByCashid($id);
		extract($info);
		$rs = model('member_attesta')->where(array('userid'=>$userid,'type'=>'bank'))->find();
		$infos = string2array($rs['infos']);
		$privince = model('linkage')->getFieldByLinkageid($infos['province'],'name');
		$city = model('linkage')->getFieldByLinkageid($infos['city'],'name');
		$bankname =  model('linkage')->getFieldByLinkageid($infos['bank_name'],'name');
		include $this->admin_tpl('deposite_info');
	}
	
	//导出数据方法
	protected function deposite_export($list=array())
	{
	    $data = array();
	    foreach ($list as $k=>$info){
	        $data[$k][cashid] = $info['cashid'];
	        $data[$k][userid] = $info['userid'];
	        
	        $modelid =  model('member')->getFieldByUserid($info['userid'],'modelid');
	        $data[$k][modelid] = ($modelid==1)?"会员":"商家";
	            
			if($info['paypal']==1){
				$paypal="普通提现";
			}elseif($info['paypal']==2){
				$paypal="快速提现";
			}else{
				$paypal="微信实时提现";	
			}
	        $data[$k][paypal] = $paypal;
	        $data[$k][name]  = $info['name'];
	        $data[$k][total]  = $info['totalmoney']+$info['fee'];
	        $data[$k][fee]  = $info['fee'];
	        $data[$k][totalmoney] = $info['totalmoney'];
			if($info['type']==1){
				$type=$info['bank'];
			}elseif($info['type']==2){
				$type="支付宝";
			}else{
				$type="微信";	
			}
	        $data[$k][type] = $type;
			$data[$k][cash_alipay_username] = $info['cash_alipay_username'];
			$data[$k][inputtime] = dgmdate($info['inputtime'], 'Y/m/d H:i:s');
			if($info['status']==0){
				$status="未审核";
			}elseif($info['status']==1){
				$status="审核成功";
			}else{
				$status="审核失败";	
			}
			$data[$k][status] = $status;
			$check_time=dgmdate($info['check_time'], 'Y/m/d H:i:s');
			$data[$k][check_time] = ($check_time==false)?"":$check_time;
			$data[$k][success_order] = $info['success_order'];
			if($info['status']==-2){
				$err_cause=$info['err_cause'];
			}else{
				$err_cause=$info['cause'];
			}
			$data[$k][err_cause] = $err_cause;
	    }
		unset($list);
		
		$headArr=array('ID','userid','会员类型','提现类型','提现人姓名','提现总额','手续费','实际应支付','提现方式','提现账号','申请时间','状态','审核时间','交易成功单

号','审核失败原因');
	
	    $filename="list";
	
	    $this->getExcel($filename,$headArr,$data);
	}
	
	//导入PHPExcel类库
	private  function getExcel($fileName,$headArr,$data){
	    import("Org.Util.PHPExcel");
	    import("Org.Util.PHPExcel.Writer.Excel5");
	    import("Org.Util.PHPExcel.IOFactory.php");
		import("Org.Util.PHPExcel.CachedObjectStorageFactory.php");
		set_time_limit(500);
		ini_set("memory_limit","1024M");
	
		//设置缓存方式
		$cacheMethod = \PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;  
        $cacheSettings = array();  
        \PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings); 
		
	    $date = date("Y_m_d_H_i_s",time());
	    $fileName .= "_{$date}.xls";

	    $objPHPExcel = new \PHPExcel();
	    $objProps = $objPHPExcel->getProperties();
	
	    //设置表头
	    $key = ord("A");

	    foreach($headArr as $v){
	        $colum = chr($key);
	        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
	        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
	        $key += 1;
	    }
	
	    $column = 2;
	    $objActSheet = $objPHPExcel->getActiveSheet();
	
	    foreach($data as $key => $rows){ //行写入
	        $span = ord("A");
	        foreach($rows as $keyName=>$value){// 列写入
	            $j = chr($span);
	            $objActSheet->setCellValue($j.$column, $value);
	            $span++;
	        }
	        $column++;
			unset($rows);
	    }
	    unset($data);
		
	    $fileName = iconv("utf-8", "gb2312", $fileName);
	
	    //重命名表
	    $objPHPExcel->setActiveSheetIndex(0);
	    ob_end_clean();//清除缓冲区
	    header('Content-Type: application/vnd.ms-excel');
	    header("Content-Disposition: attachment;filename=\"$fileName\"");
	    header('Cache-Control: max-age=0');
	
	    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	    $objWriter->save('php://output'); 
	    exit;
	}
}