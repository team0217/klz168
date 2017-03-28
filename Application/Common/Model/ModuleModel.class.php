<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Common\Model;
use Think\Model;
class ModuleModel extends Model {
	/* 更新缓存 */
	public function build_cache($module = '') {
		$sqlmap = array();
		if ($module) $sqlmap['module'] = ucwords($module);
		$modules = $this->where($sqlmap)->select();
		$result = array();
		if ($modules) {
			foreach ($modules as $m) {
				$result[$m['module']] = $m['name'];
				if ($m['setting']) {
					setcache('setting', unserialize($m['setting']), strtolower($m['module']));
				}
				api('Cache/run', '*,'.$m['module']);
			}
			setcache('module', $result, 'commons');
		}
		return TRUE;
	}
}