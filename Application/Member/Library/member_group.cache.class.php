<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
class member_group
{
	public function __construct() {
		$this->db = D('Member/MemberGroup');
	}

	public function run() {
		$data = $this->db->select();
		$result = array();
		if (is_array($data)) {
			foreach ($data as $v) {
				$result[$v['groupid']] = $v;
			}
		}
		setcache('member_group', $result,'member');
		return $result;		
	}
}
?>