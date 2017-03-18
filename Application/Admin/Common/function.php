<?php
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2013, Chongqing Zero Technology Co. Ltd.
 * @link           http://www.xuewl.com
**/
defined('IN_TPCMS') or exit('No permission resources.');
/**
 * 获取管理员信息
 * @param  int $id [管理员ID]
 * @return array
 */
function getAdminInfoById($id) {
	return model('admin')->find($id);
}