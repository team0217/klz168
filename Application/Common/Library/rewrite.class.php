<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Common\Library;
class rewrite
{
	private $urlrules;
	public function __construct() {
		$this->urlrules = C('REWRITE_RULE');
        $this->urlrules = ($this->urlrules && is_string($this->urlrules)) ? string2array($this->urlrules) : $this->urlrules;
	}
    
    /**
     * 商品内容页地址
     * @param type $id
     * @param type $page
     * @param type $pos
     * @return boolean
     */
	public function show($id = 0, $mod = 'rebate') {
        if($this->urlrules['enabled'] == 1 && $this->urlrules[$mod]) {
            $result = __ROOT__.$this->urlrules[$mod].$id;
        } else {
            $result = U('Product/Index/show', array('id' => $id));
        }
        return $result;
	}
    
    public function category($id = 0) {
        if($this->urlrules['enabled'] == 1 && $this->urlrules['category']) {
            $result = __ROOT__.$this->urlrules['category'].$id;
        } else {
            $result = U('Product/Index/show', array('id' => $id));
        }
        return $result;        
    }
}