<?php
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Sms\Api\Driver;
class Zs {
	private static $config    =   '';
	public static function getInstance() {
        self::$setting = getcache('setting', 'sms');
        self::$config = array(
            'Sn'  => self::$setting['username'],
            'Pwd'  => self::$setting['password']
        );
	}

	/* 发送短信 */
	public static function send($mobile, $content) {
        if(empty(self::$config)){
            self::getInstance();
        }
        self::$config['mobile'] = $mobile;
        self::$config['content'] = $content;
		$result = _dfsockopen('http://124.173.70.59:8081/SmsAndMms/mg?'.http_build_query(self::$config));
        if ($result == 0) {
            return TRUE;
        } else {
            switch ($result) {
                case '-1':
                    return '用户名或密码错误';
                    break;
                case '-2':
                    return '余额不足';
                    break;
                case '-3':
                    return '内容超过300字';
                    break;
                case '-4':
                    return 'IP不符合';
                    break;
                case '-7':
                    return '手机号错误';
                    break;
                case '-404':
                    return '系统异常';
                    break;
                default:
                    return '短信发送失败';
                    break;
            }
            return FALSE;
        }
	}

	/* 查询余额 */
	public static function get_num() {
        if(empty(self::$config)){
            self::getInstance();
        }
		return (int) _dfsockopen('http://124.173.70.59:8081/SmsAndMms/balance?'.http_build_query(self::$config));
	}
}
?>