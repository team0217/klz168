<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Wap\Library;
class hook
{
	public function system_inits() {
		if (isset($_GET['ismobile'])) {
			cookie('ismobile', null);
			return FALSE;
		}

		$setting = getcache('setting', 'wap');
		if ($setting['wap_enable'] == 1 && $setting['wap_domain'] && C('system_auth_type') == 'professional') {
			$http_host = $_SERVER['HTTP_HOST'];
		    $wap_domain = ltrim($setting['wap_domain'], "'http://'");

            if($_SERVER['HTTP_HOST'] == $wap_domain ){
            	include TPL_PATH.'wap2';
            	return false;
            }
            
			$detect = new \Wap\Library\Mobile_Detect();
			if ($detect->isMobile() || stripos($http_host, $wap_domain) !== FALSE || cookie('ismobile') == 1) {
				if(C('system_auth_type') != 'professional') {
					return False;
				};
				cookie('ismobile', 1, 86400);
				define('DEFAULT_THEME', 'wap');
		        if(strtolower(MODULE_NAME) != 'admin') {
		            C('TMPL_ACTION_SUCCESS',TPL_PATH.'wap/success.tpl');
		            C('TMPL_ACTION_ERROR',TPL_PATH.'wap/error.tpl');   
		        }
			}
		}
		return TRUE;
	}
}
