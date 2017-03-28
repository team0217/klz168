<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2013, Chongqing Zero Technology Co. Ltd.
 * @link           http://www.xuewl.com
**/
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller {
	public function index() {
		$this->error('控制器不存在');
	}
}