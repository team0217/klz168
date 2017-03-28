<?php 
namespace Api\Controller;
use Think\Controller;
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2013, Chongqing Zero Technology Co. Ltd.
 * @link           http://www.xuewl.com
**/
class DocumentController extends Controller {
	public function _initialize() {
		$this->db = D('Document');
	}
	/**
	 * 根据内容获取关键字
	 * @author xuewl <master@xuewl.com>
	 */
	public function get_keywords() {
		$info = I('param.');
		$result = dz_segment($info['data'], $info['data']);
		echo implode(",", $result);
	}
}