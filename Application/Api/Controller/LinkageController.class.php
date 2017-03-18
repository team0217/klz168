<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Api\Controller;
use Think\Controller;
class LinkageController extends Controller
{
	public function index() {
		$act = I('act');
		switch($act) {
			case 'ajax_getlist':
				ajax_getlist();
			break;
			
			case 'ajax_getpath':
				ajax_getpath($_GET['parentid'],$_GET['keyid'],$_GET['callback']);
			break;

			case 'ajax_gettopparent':
				ajax_gettopparent($_GET['linkageid'],$_GET['keyid'],$_GET['callback']);
			break;

			case 'ajax_linkagesel':
				$parent_id = I('id', 0, 'intval');
				$keyid = I('keyid', 0, 'intval');
				ajax_linkagesel($parent_id,$keyid);				
				break;

			case 'ajax_select':
				$parent_id = $_GET['parent_id'] ? intval($_GET['parent_id']) : 0;
				$keyid = $_GET['keyid'];
				ajax_select($parent_id,$keyid);
			break;
		}
	}
}

/* 获取地区列表 */
function ajax_getlist() {
	$keyid = I('keyid', 0, 'intval');
	$datas = getcache('linkage_'.$keyid,'linkage');
	$infos = $datas['data'];
	$where_id = I('parentid', $infos[$_GET['linkageid']]['parentid'], 'intval');
	$parent_menu_name = ($where_id==0) ? $datas['title'] :$infos[$where_id]['name'];
	if(is_array($infos)){
		foreach($infos AS $k=>$v) {
			if($v['parentid'] == $where_id) {
				$s[]=iconv(CHARSET,'utf-8',$v['linkageid'].','.$v['name'].','.$v['parentid'].','.$parent_menu_name);
			}
		}
	}	
	if(count($s)>0) {
		$jsonstr = json_encode($s);
		echo trim_script($_GET['callback']).'(',$jsonstr,')';
		exit;			
	} else {
		echo trim_script($_GET['callback']).'()';exit;			
	}		
}

/**
 * 获取地区父级路径路径
 * @param $parentid 父级ID
 * @param $keyid 菜单keyid
 * @param $callback json生成callback变量
 * @param $result 递归返回结果数组
 * @param $infos
 */
function ajax_getpath($parentid,$keyid,$callback,$result = array(),$infos = array()) {
	$keyid = intval($keyid);
	$parentid = intval($parentid);
	if(!$infos) {
		$datas = getcache('linkage_'.$keyid,'linkage');
		$infos = $datas['data'];
	}
	if(array_key_exists($parentid,$infos)) {
		$result[]=iconv(CHARSET,'utf-8',$infos[$parentid]['name']);
		return ajax_getpath($infos[$parentid]['parentid'],$keyid,$callback,$result,$infos);
	} else {
		if(count($result)>0) {
			krsort($result);
			$jsonstr = json_encode($result);
			echo trim_script($callback).'(',$jsonstr,')';
			exit;			
		} else {
			$result[]=iconv(CHARSET,'utf-8',$datas['title']);
			$jsonstr = json_encode($result);
			echo trim_script($callback).'(',$jsonstr,')';
			exit;
		}
	}
}
/**
 * 获取地区顶级ID
 * Enter description here ...
 * @param  $linkageid 菜单id
 * @param  $keyid 菜单keyid
 * @param  $callback json生成callback变量
 * @param  $infos 递归返回结果数组
 */
function ajax_gettopparent($linkageid,$keyid,$callback,$infos = array()) {
	$keyid = intval($keyid);	
	$linkageid = intval($linkageid);
	if(!$infos) {
		$datas = getcache('linkage_'.$keyid,'linkage');
		$infos = $datas['data'];
	}
	if($infos[$linkageid]['parentid']!=0) {
		return ajax_gettopparent($infos[$linkageid]['parentid'],$keyid,$callback,$infos);
	} else {
		echo trim_script($callback).'(',$linkageid,')';
		exit;		
	}
}
/**************************************************************
 *
 *	以下函数适用于select联动样式
 *
 *************************************************************/
function ajax_select($parentid,$keyid) {
	$keyid = intval($keyid);
	$datas = getcache('linkage_'.$keyid,'linkage');
	$infos = $datas['data'];
	$json_str = "[";
	$json = array();
	foreach($infos AS $k=>$v) {
		if($v['parentid'] == $parentid) {
			$r = array('region_id' => $v['linkageid'],
					   'region_name' => $v['name']);
			$json[] = JSON($r);		
		}
	}
	$json_str .= implode(',',$json);
	$json_str .= "]";
	echo $json_str;	
}

/**************************************************************
 *
 *	以下函数适用于select联动样式
 *
 *************************************************************/
function ajax_linkagesel($parentid,$keyid) {
	$keyid = intval($keyid);
	if($keyid < 1) return FALSE;
	$datas = getcache('linkage_'.$keyid,'linkage');
	$infos = $datas['data'];
	$result = array();
	foreach ($infos AS $k => $v) {
		if($v['parentid'] == $parentid) {
			$result[$k] = array('id' => $k, 'name' => $v['name']);	
		}
	}
	echo JSON($result);	
}


function arrayRecursive(&$array, $function, $apply_to_keys_also = false) {
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }

        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
}

function JSON($array) {
	arrayRecursive($array, 'urlencode', true);
	$json = json_encode($array);
	return urldecode($json);
}
?>