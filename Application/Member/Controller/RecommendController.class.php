<?php 
/**
 * @version        $Id$
 * @author         master@xuewl.com
 * @copyright      Copyright (c) 2007 - 2014, Chongqing xuewl Information Technology Co., Ltd.
 * @link           http://www.xuewl.com
**/
namespace Member\Controller;
use Member\Controller\InitController;
class RecommendController extends InitController {
	public function _initialize() {
		parent::_initialize();
		$this->db = model('member');
		$this->pagesize = 10;
		$this->pagecurr = max(1,I('page',1,'intval'));
	}
	/* 云返利推荐好友*/
	public function index() {
		$SEO=seo(0,"我的推荐好友");
		$type = I('type',1);
		$count = $this->db->where(array('agent_id'=>$this->userid))->count();
		$agent = $this->db->where(array('agent_id'=>$this->userid))->page($this->pagecurr, $this->pagesize)->select();

		$uids = array();
		foreach ($agent as $key => $v) {
			$uids[] = $v['userid'];
			//累积完成订单数
			$sqlMap['status'] = 7;
			$sqlMap['buyer_id'] = $v['userid'];
			//当前用户完成的总订单数
			$agent[$key]['order_count'] = model('order')->where($sqlMap)->count();
		}
		if($uids) {
			$userid = array_unique($uids);
			$map['userid'] = array('IN',$userid);
			$map['type'] = array('EQ','point');
			$map['recommend_status'] = array('EQ','1');
		    $reward = model('member_finance_log')->field("userid,type,SUM(`num`) AS num")->where($map)->order('num DESC')->group('userid')->select();	
		    foreach ($reward as $key => $value) {
		    	$agent[$key]['reward'] = $value['num'];
		    	$agent[$key]['type'] = $value['type'];
		    }
		}
	 	$pages = showPage($count,$this->pagecurr,$this->pagesize);
	 	$v2_pages = v2_page_3($count,$this->pagesize);
	 	if($type > 2){
	 		$sqlMap = array();
	 		$sqlMap['userid'] = $this->userid;
	 		$sqlMap['recommend_status'] =  1;
	 		$sqlMap['type'] = ($type == 3) ? array('EQ','money') : array('EQ','point');
	 		$reword_count = model('member_finance_log')->where($sqlMap)->count();
	 		$reword_list = model('member_finance_log')->where($sqlMap)->page($this->pagecurr, $this->pagesize)->select();
	 		$reword_page =  showPage($reword_count,$this->pagecurr,$this->pagesize);
	 		$v2_reword_page = v2_page_3($reword_count,$this->pagesize);

	 	}
        //统计 合伙人
        if($type  == 2)
        {
            $agentCount = array();
            if($this->userinfo['groupid'] == 6 || $this->userinfo['groupid'] == 5 || $this->userinfo['groupid'] == 4 || $this->userinfo['groupid'] == 2)
            {
                //一级好友
                $agentCount[1]['key'] = "1级好友";
                $agentCount[1]['count'] = $this->db->where(array('agent_id'=>$this->userid))->count();
                $agentCount[1]['award'] = "1%";
                if($this->userinfo['groupid'] == 6 || $this->userinfo['groupid'] == 5 || $this->userinfo['groupid'] == 4)
                {
                    //二级好友
                    $sdata = $this->db->where(array('agent_id'=>$this->userid))->select();
                    if(!empty($sdata))
                    {
                        $count = 0;
                        //var_dump($sdata);
                        $user_ids = '';
                        foreach ($sdata as $key => $v) {
                            //二级级好友
                            $sCount= $this->db->where(array('agent_id'=>$v['userid']))->count();
                            $fdata = $this->db->where(array('agent_id'=>$v['userid']))->select();
                            foreach($fdata as $k => $fv)
                            {

                                $user_ids .= $fv['userid'].",";
                            }
                            $count += $sCount;
                        }
                        //二级级好友
                        $agentCount[2]['key'] = "2级好友";
                        $agentCount[2]['count'] = $count;
                        $agentCount[2]['award'] = $this->userinfo['groupid'] == 4 ? "100元":"1%";
						unset($fdata);
                    }
                    $user_ids = trim($user_ids,',');
                }

                if($this->userinfo['groupid'] == 6)
                {
                    if(isset($user_ids))
                    {
                        //三级好友
                        $Dao = M();
                        $sql = "select count(userid) as count from xw_member where agent_id in (" . $user_ids .')';
                        $res = $Dao->query($sql);
                        //二级级好友
                        $agentCount[3]['key'] = "3级好友";
                        $agentCount[3]['count'] = $res[0]['count'];
                        $agentCount[3]['award'] = "1%";
						unset($user_ids);
						unset($res);
                    }

                }

            }
        }
		include template('recommend');
	}
}