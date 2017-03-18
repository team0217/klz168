<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
class member_model
{
    private static $module_fields = '';
    private static $module_cache = '';

	public function __construct() {
		$this->db = D('Member/MemberGroup');
		$this->models = getcache('model', 'commons');
        self::$module_fields = APP_PATH.'Member/Fields/';
        self::$module_cache = DATA_PATH.'caches_model/';
	}

	public function run() {
        include self::$module_fields.'fields.inc.php';
        if(!file_exists(self::$module_cache))            
            @mkdir(self::$module_cache, 0755, TRUE);
        /* 更新内容模型类：表单生成、入库、更新、输出 */
        $classtypes = array('form','input','update','output');
        foreach($classtypes as $classtype) {
            $cache_data = file_get_contents(self::$module_fields.'member_'.$classtype.'.class.php');
            $cache_data = str_replace('}?>','',$cache_data);
            foreach($fields as $field => $fieldvalue) {
                if(file_exists(self::$module_fields.$field.DIRECTORY_SEPARATOR.$classtype.'.inc.php')) {
                    $cache_data .= "\r\n".file_get_contents(self::$module_fields.$field.DIRECTORY_SEPARATOR.$classtype.'.inc.php');
                }
            }
            $cache_data .= "\r\n } \r\n?>";
            file_put_contents(self::$module_cache.'member_'.$classtype.'.class.php',$cache_data);
            @chmod(self::$module_cache.'member_'.$classtype.'.class.php',0777);
        }
        /* 删除字段缓存 */
        api('Cache/clear_fields');
        return TRUE;
	}
}
?>