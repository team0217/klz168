<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Sms\Api\Driver;
class Dalan {
	private static $config    =   '';
	public static function getInstance() {
        self::$setting = getcache('setting', 'sms');
		self::$config = array(
			'username' 	=> self::$setting['username'],
			'password'	=> self::$setting['password']
		);
	}

	/* 发送短信 */
	public static function send($mobile, $content) {
        if(empty(self::$config)){
            self::getInstance();
        }
        self::$config['action'] = 'sendsms';
        self::$config['mobile'] = $mobile;
        self::$config['content'] = 'test';
		$result = _dfsockopen('http://220.194.54.161:8060/index.aspx?'.http_build_query(self::$config));
        if ($result == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	/* 查询余额 */
	public static function get_num() {
		self::$config['action'] = 'getsms';
		return _dfsockopen('http://220.194.54.161:8060/index.aspx?'.http_build_query(self::$config));
	}
}
?>