<?php
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
class payment
{
	public function __construct() {
		$this->db = D('Pay/PayPayment');
	}

	public function run() {
		$this->db->build_cache(TRUE);
	}
}