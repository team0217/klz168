<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Navigation\Controller;
use \Common\Controller\BaseController;
class IndexController extends BaseController
{
	public function _initialize() {
		parent::_initialize();
		
	}

	public function index() {
		$SEO = seo(0,"网站导航");
		$map['navid'] = array('NOT IN',array(1,5));
		$nav = model('navigate')->where($map)->select();
		include template('navigation');
	}
}
?>