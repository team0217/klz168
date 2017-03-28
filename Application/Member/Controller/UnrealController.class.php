<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Member\Controller;
use \Admin\Controller\InitController;
if (!defined('MODULE_CACHE')) define('MODULE_CACHE', DATA_PATH.'caches_model/');
/**
 * 后台会员模型管理
 */
class UnrealController extends InitController {
	public function _initialize() {
		parent::_initialize();
		$this->db = model('member_unreal');
		$this->pagecurr = max(1, I('page', 0, 'intval'));
		$this->pagesize = 10;
	}

	/**
	 * 会员管理
	 * @author xuewl <master@xuewl.com>
	 */
	public function index() {
		$sqlMap = array();		
		if (IS_GET) {
			$info = I('get.');
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
			
			
			/* 关键字搜索类型 */
			$info['type'] = (int) $info['type'];
			if (trim($info['keyword'])) {
				switch ($info['type']) {
					case '2': // 用户ID
						$sqlMap['userid'] = array("LIKE", "%".intval($info['keyword'])."%");
						break;
					
					default:
						$sqlMap['nickname'] = array("LIKE", "%".$info['keyword']."%");
						break;
				}
			}
		}
		$membercount = $this->db->where($sqlMap)->count();
		$memberlist = $this->db->where($sqlMap)->page($this->pagecurr, $this->pagesize)->order('userid DESC ,dateline DESC')->select();
		
		$pages = page($membercount, $this->pagesize);
		/* 附加菜单 */
		
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\''.U('add',array('t'=>1)).'\', title:\''.L('member_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', '添加虚拟会员');
		
		$form =  new \Common\Library\form();
		include $this->admin_tpl('unreal_list');
	}

	/**
	 * 添加会员
	 * @author xuewl <master@xuewl.com>
	 */
	public function add() {
		//会员模型
	
		if (IS_POST) {
			$info = $_POST['info'];
			$info['dateline'] = NOW_TIME;
			$result = $this->db->add($info);
			if (!$result) {
				$this->error('操作失败');
			}
			$this->success('操作成功','javascript:close_dialog();', 1);
		} else {
			$form =  new \Common\Library\form();		
			$show_header = true;
			$show_validator = true;
			include $this->admin_tpl('unreal_add');
		}
	}
	
	
	/**
	 * 判断昵称是否存在
	 */
	public function public_checknickname_ajax(){
		$nickname = isset($_GET['nickname']) && trim($_GET['nickname']) ? trim($_GET['nickname']) : exit(0);
		if(CHARSET != 'utf-8') {
			$nickname = iconv('utf-8', CHARSET, $nickname);
			$nickname = addslashes($nickname);
		}
		$status = $this->db->where(array('nickname'=>$nickname))->count();
		if($status > 0){
			exit('0');
		}else{
			exit('1');
		}
	}
	
	
	public function dialog($goods_id = '') {
		$goods_id = (int)$_GET['goods_id'];
		$sqlmap = array();
		if (submitcheck('search','G')) {
			$sqlmap['nickname'] = array("LIKE", "%".intval($post_info['keywords'])."%");
		}
		$unreal_order = model('unreal_order')->where(array('goods_id'=>$goods_id))->select();
		 $userid = array();
		foreach ($unreal_order as $key => $value) {
			if (!in_array($value['buyer_id'],$rand) ) {
               $userid[] = $value['buyer_id'];
            }
		}
		if(is_array($userid) && $userid[0] > 0){
			$sqlmap['userid'] = array('NOT IN',$userid);
		}
		$count = model('member_unreal')->where($sqlmap)->count();
		$infos = model('member_unreal')->where($sqlmap)->page($this->pagecurr, 10)->select();
		$pages = page($count, 10);
		$form =  new \Common\Library\form();
		$show_header = TRUE;
		include $this->admin_tpl('member_unreal_dialog');
	}

	public function unreal_order(){
		if (IS_POST) {
			//var_dump($_REQUEST);
				$goods_id = (int)$_REQUEST['goods_id'];
				$ids = $_REQUEST['ids'];
				foreach ($ids as $k => $userid) {

					if ($userid > 0) {
						$info = array();
						$info['goods_id'] = $goods_id;
						$info['buyer_id'] = $userid;
						$info['status'] = 1;
						$info['dateline'] = NOW_TIME;
						$result = model('unreal_order')->add($info);
						/*echo model('unreal_order')->getLastSql();
						die();*/
					}
					
				}

				$this->success('操作成功');
		}
	}

	
	
	

}