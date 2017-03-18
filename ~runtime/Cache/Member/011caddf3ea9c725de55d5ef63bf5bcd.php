<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
        <meta name="keywords" content="<?php echo $SEO['keyword'];?>" />
        <meta name="description" content="<?php echo $SEO['description'];?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src='<?php echo THEME_STYLE_PATH;?>style/js/order.js'></script>

	</head>
	<script type="text/javascript">
<?php $userinfo = is_login();?>
var order_data = {
    <?php $seller_trialtalk_check = string2array(C_READ('seller_trialtalk_check'));?>
    <?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
    <?php
        if($r['status'] == 4 && $mod =='trial'){  // 商家审核失败后会员可申诉时间(免费试用)
            $end_time = $r['check_time']+C_READ('buyer_check_update_order_sn','trial')*3600;
        }elseif ($r['status']==1 && $mod== 'trial'){    //  待商家审核资格
            $end_time = $r['create_time']+C_READ('seller_check_time')*86400;
        }elseif ($r['status']==2 && $mod=='trial' && !$r['order_sn']) { //  待填写订单号
            $end_time = $r['check_time']+C_READ('buyer_write_order_time')*3600;
        }elseif ($r['status']==2 && $mod=='trial' && $r['order_sn'] && !$r['trial_report']){ //  待审核订单号            
            $end_time = $r['check_time'] + C_READ('seller_order_check_time')*3600;
        }elseif ($r['status']==8 && $mod=='trial' && $r['order_sn'] && !$r['trial_report']){ //  填写试用报告倒计时(更新试用流程后)            
            $end_time = $r['check_time'] + C_READ('buyer_write_talk_time')*86400;
        }elseif ($r['status']==3 && $mod=='trial'){ // 待审核试用报告
            $end_time = $r['check_time']+$seller_trialtalk_check['value']*86400;
        }
    ?>
    <?php if($n > 1) { ?>,<?php } ?>
    <?php echo $r['id'];?>:{
        "oid":"<?php echo $r['id'];?>",
        "gid":"<?php echo $r['goods_id'];?>",
        "title":"<?php echo $r['product_info']['title'];?>",
        "url":"<?php echo $r['product_info']['goods_url'];?>",
        "userid":"<?php echo $this->userid;?>",
        "modelid":"<?php echo $userinfo['modelid'];?>",
        "price":"<?php echo $r['product_info']['goods_price'];?>",
        "end_time" : "<?php echo $end_time;?>",
        "type" : "<?php echo $r['product_info']['type'];?>",
        "goods_price" : "<?php echo $r['product_info']['goods_price'];?>",
        "goods_bonus" : "<?php echo $r['product_info']['goods_bonus'];?>",
        "goods_tryproduct":"<?php echo $r['product_info']['goods_tryproduct'];?>",
        "type" : "<?php echo $r['product_info']['type'];?>",
        "pro" : <?php echo json_encode($r['product_info']);?>,
        "store_name" : "<?php echo store_name($r['product_info']['company_id']);?>",
        "contact_want" : "<?php echo $r['contact_want'];?>",
        "shop_source" :<?php echo json_encode(shop_set($r['product_info']['source'])); ?>
    }
    <?php $n++;}unset($n); ?>
};

var site = {
	"site_root" : '<?php echo __ROOT__;?>',
	"js_path" : '<?php echo JS_PATH;?>',
	"css_path" : '<?php echo CSS_PATH;?>',
	"img_path" : '<?php echo IMG_PATH;?>',
	"template_img" : '<?php echo THEME_STYLE_PATH;?>style/images',
	"webname" : '<?php echo C("webname");?>',
	"order_url" : '<?php echo U("Order/DoOrder/manage");?>',
	"nickname" : '<?php echo nickname($userinfo["userid"]);?>',
	"message":'<?php echo message_count($userinfo["userid"]);?>',
	"user":<?php echo json_encode($userinfo ? $userinfo : array());?>
};
var act_config = <?php echo json_encode($act_config);?>;
</script>
<style type="text/css">
/* 弹窗样式 */
.CPM_style { padding-bottom:20px;border:solid 1px #ddd; background:#fff; float:left; height:auto; position:fixed; }
.CPM_style .span > a { font-weight:700; display:block; float:left;  border-radius:3px; -webkit-border-radius:3px; -moz-border-radius:3px; color:#fff; padding:0 12px; height:28px; line-height:28px; }
.a_background1 { background:#ff6600; }
.a_background2 { background:#999999; }

.CPM_style > h2 { 
width:100%; height:33px;
border-radius-top-left:3px; -webkit-border-top-left-radius:3px; -moz-border-top-left-radius:3px;
border-radius-top-right:3px; -webkit-border-top-right-radius:3px; -moz-border-top-right-radius:3px;
line-height:33px; text-indent:10px; color:#fff; background:#ff6600; }
.CPM_style_1 { width:360px; }
.CPM_style_2 { width:590px; }
.f_bg_yes { background:url(<?php echo THEME_STYLE_PATH;?>style/images/verify_btn1.png) no-repeat 0 center; }
.f_bg_no { background:url(<?php echo THEME_STYLE_PATH;?>style/images/verify_btn2.png) no-repeat 0 center; }
.CPM_style .font { padding-top:20px;padding-bottom:20px;padding-left:35px; font-size:14px; margin:0 auto; line-height:36px; height:36px; }
.CPM_style .font_2 { font-size:14px; font-weight:700; font-family:"微软雅黑"; color:#ff6600; }
.CPM_style .span { height:20px; line-height:20px; margin:0 auto; }
.CPM_style .span > a { margin:0 11px;border-radius:3px; -webkit-border-radius:3px; -moz-border-radius:3px; }
.form em,.hint { color:#ff6600; }
.form { margin:15px 0 0 40px; }
.form li { height:30px; width:100%; line-height:30px; margin:5px 0; }
.form li input { width:175px; height:26px; line-height:26px; }
.CPM_style .hint { text-align:right;width:100px; height:auto; line-height:20px; margin:0; float:left;  }
.CPM_style .hint_text { float:left; width:450px; float:left; line-height:20px; }
.CPM_style .hint_text li { width:100%; }
.CPM_style .hint_text li a {color:#2bc4fe;}
.issue { width:100%; height:30px; line-height:30px; text-align:right; }
.issue a { margin-right:10px; color:#2bc4fe; }
.CPM_style .hint_text_2 { margin-left:50px; margin-bottom:20px; }
.CPM_style .margin_b_10 { margin-bottom:10px; }
.CPM_style .hint_text_2 p { height:30px; line-height:30px; color:#ff6600; }
.CPM_style .hint_text_2 li { height:20px; line-height:20px; }
.CPM_style .hint_text_2 li em { color:#ff6600; }
.CPM_style .hint_text_2 li a { color:#2bc4fe; }
.QR_code { width:134px; height:134px; display:block; margin:0px auto; border:solid 1px #ddd; padding:3px; }
.set_iss { margin-left:135px;margin-bottom:20px; }
.set_iss li {width:100%; height:22px; line-height:22px; margin:5px 0; }
.set_iss li input,.set_iss li img,.set_iss li font{ float:left; }
.set_iss li input { height:18px; line-height:18px; width:170px; }
.set_iss li img { width:30px; margin-top:-5px;}
.set_iss li a { margin-left:35px;display:block; width:60px; height:22px; text-align:center; border:solid 1px #2bc4fe; color:#2bc4fe; background:#e4ffff;border-radius:3px; -webkit-border-radius:3px; -moz-border-radius:3px; }
.iss_hint {text-align:center; width:100%;height:20px; line-height:20px; margin-bottom:20px; }
.iss_hint a { color:#2bc4fe; }
.operate-log {
max-width: 520px;
_width: 520px;
max-height: 420px;
_height: 420px;
padding: 1px;
overflow: auto;
}
.aui_state_focus .aui_content {
color: #000;
}
.ui-table {
border: 1px solid #ccc;
table-layout: fixed;
width: 100%;
text-align: center;
}
table {
border-collapse: collapse;
border-spacing: 0;
font-size: 12px;
}
.ui-table th {
height: 35px;
font-size: 12px;
color: #4c4c4c;
text-shadow: 0 1px 1px #fff;
background-color: #CCCCCC;
background-image: -webkit-linear-gradient(#eaeaea, #eaeaea 25%, #CCCCCC);
background-image: -moz-linear-gradient(top, #eaeaea, #eaeaea 25%, #CCCCCC);
background-image: -o-linear-gradient(#eaeaea, #eaeaea 25%, #CCCCCC);
background-image: linear-gradient(#eaeaea, #eaeaea 25%, #CCCCCC);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eaeaea', endColorstr='#CCCCCC', GradientType=0);
}
.ui-table th {

}
textarea {
font: 12px/1.5 tahoma, arial, \5b8b\4f53;
}
.ui-table td {
border: 1px solid #ccc;
border-bottom-style: dotted;
border-top: none;
padding: 12px 0;
word-break: break-all;
word-wrap: break-word;
}

.CPM_style .hint_text_2 li{
	height: auto;
}
</style>

	<body>
		<?php include template('v2_header','member/common'); ?>
		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>试用参与</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				<?php include template('v2_member_left','member/common'); ?>
				
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">闪电佣金</h2>
					<!-- 正文 -->
					<ul class="sy_list_btn clear">
						<li <?php if($state == 1) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>1));?>">待审批</a></li>
						<li <?php if($state == 2) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>2));?>">已通过</a></li>
						<li <?php if($state == 0) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage', array('mod' => 'trial','state'=>0));?>">未通过</a></li>
					</ul>
					
					<?php if($state == 2) { ?>
						<ul class="sy_list_btn sy_list_btn_2 clear" style="height: auto; margin-top: 20px;">
							<li  <?php if($state == 2 && $search_status == 1) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>1));?>">已通过待领取<b><?php echo $no_ordersn_count;?></b></a></li>
							<li <?php if($state == 2 && $search_status == 2) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>2));?>">订单号审核中<b><?php echo $check_ordersn_count;?></b></a></li>
							<li <?php if($state == 2 && $search_status == 3) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>3));?>">已下单待交报告<b><?php echo $write_report_count;?></b></a></li>
							<li <?php if($state == 2 && $search_status == 4) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>4));?>">好评报告审核中<b><?php echo $check_report_count;?></b></a></li>
						    <li <?php if($state == 2 && $search_status == 5) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>5));?>">待修改订单号/报告<b><?php echo $no_passreport_count;?></b></a></li>
						    <li <?php if($state == 2 && $search_status == 6) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>6));?>">申诉中<b><?php echo $appeal_count;?></b></a></li>
						    <li <?php if($state == 2 && $search_status == 7) { ?>class="active"<?php } ?>><a href="<?php echo U('Member/Order/v2_manage',array('mod'=>$mod,'state'=>'2','search_status'=>7));?>">闪电佣金完成<b><?php echo $finish_count;?></b></a></li>

						</ul>
					<?php } ?>
					
					<form action="<?php echo __APP__;?>" method="get">
						<input type="hidden" name="m" value="<?php echo MODULE_NAME;?>" />
	                    <input type="hidden" name="c" value="<?php echo CONTROLLER_NAME;?>" />
	                    <input type="hidden" name="a" value="<?php echo ACTION_NAME;?>" />
	                    <input type="hidden" name="mod" value="<?php echo $mod;?>" />
	                    <input type="hidden" name="state" value="<?php echo $state;?>" />
						<p class="sy_cy_search" <?php if($state == 2) { ?>style="margin-top:10px;"<?php } else { ?>style="margin-top:20px;"<?php } ?>>
							<select name="search_type">
		                   	<option value="0" <?php if($search_type == '0') { ?>selected<?php } ?>>所有活动</option>
		                   	<option value="2" <?php if($search_type == '2') { ?>selected<?php } ?>>活动名称</option>
		                    <option value="1" <?php if($search_type == '1') { ?>selected<?php } ?>>订单号</option>
		                 	</select>
							<input type="text" class="input_txt" name="keywords" value="<?php echo $_GET['keywords'];?>"/>
<!-- 							<input type="checkbox" id="all_sy_hd"/><label for="all_sy_hd">试用通过券活动</label>
 -->							<input type="submit" value="搜索" class="_sub"/>
						</p>
					</form>
					
					<div class="sy_list_wrap">
						<div class="list list_sy_cy">
							<table>
								<thead>
									<tr>
										<th width="45%" style="text-align: center;">活动标题</th>
										<th>试用担保金</th>
										<th>绑定账号</th>
										<th>流程状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
									<tr>
										<td class="clear">
											<div class="img fl"><img src="<?php echo $r['product_info']['thumb'];?>" title="<?php echo $r['product_info']['title'];?>"/></div>
											<dl class="sy_tab_title fl">
												<dt><a href="<?php echo $r['product_info']['url'];?>" target="_blank"><?php echo str_cut($r[product_info][title],57);?></a></dt>
												<dd>活动id：<span class="c_333"><?php echo $r['product_info']['id'];?></span></dd>
												<dd><?php echo dgmdate($r[inputtime],'Y年m月d日 H:i');?></dd>
											</dl>
										</td>
										<td>
											<ul class="sy_zs_hb">
												<li>￥<?php echo $r['product_info']['goods_price'];?></li>
												<?php if($r[product_info][goods_bonus] > 0) { ?>
												<li><a href="javascript:;">赠送红包</a></li>
												<li><a href="javascript:;">￥<?php echo $r['product_info']['goods_bonus'];?></a></li>

												<?php } ?>
											</ul>
										</td>
										<td>
											<ul class="sy_zs_hb">
												<li>下单账号：<span class="c_333"><?php echo $r['bind_account'];?></span></li>
												<?php if($r[reg_time]) { ?>
												<li>注册时间：<span class="c_333"><?php echo dgmdate($r[reg_time],'Y-m-d');?></span></li>
												<?php } ?>
												<?php if($r[account_level]) { ?>
												<li class="clear">
													<strong class="fl">账号等级：</strong>
													<p class="fl sy_mj_xy">
														
														<img src="<?php echo $r['account_level'];?>"/>
														<!-- <b></b>
														<b></b> -->
													</p>												
												</li>
												<?php } ?>
											</ul>
										</td>
										<td>
											<ul class="sy_zs_hb">
												<li class="c_333"><?php echo $states[$r['status']];?></li>
												 
			                                    <?php if($r['status']==1 && $r['act_mod'] =='trial' && ($r['create_time']+C_READ('seller_check_time')*86400>NOW_TIME)) { ?>
			                                    <li>待商家审核资格:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
												<?php } ?>

												<?php if($r['status']==2 && $r['act_mod'] =='trial'&&!$r['order_sn']) { ?>
		                                        <li>填写订单号倒计时:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
		                                   		<?php } ?>

		                                   		<?php if($r['status']==2 && $r['act_mod']=='trial'&&$r['order_sn'] && !$r['trial_report']) { ?>
			                                    <li>待审核订单号倒计时:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
			                                    <?php } ?>
			                                    <?php if($r['status']==3 && $r['act_mod']=='trial' && $r['check_time']+$seller_trialtalk_check['value']*86400>NOW_TIME) { ?>
		                                        <li>待审核试用报告:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
		                                    	<?php } ?>

		                                    	<?php if($r['status']==4 && ($r['check_time']+C_READ('buyer_check_update_order_sn','rebate')*3600) > NOW_TIME) { ?>
			                                    <li>停止申诉时间:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
			                                    <?php } ?>

			                                    <?php if($r['status']==8 && $r['act_mod'] =='trial'&&$r['order_sn'] && !$r['trial_report']) { ?>
			                                    <li>填写试用报告倒计时:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
			                                    <?php } elseif ($r['status']==8 && $r['act_mod']=='trial'&&$r['order_sn']&&$r['trial_report']) { ?>
												<li>已填写试用报告</li>
			                                    <?php } ?>




											</ul>
										</td>
										<td>
											<ul class="sy_zs_hb sy_zs_btn">
												<?php if($r['status'] == 1 || $r['status'] == 2) { ?>
					                                <li><a href="javascript:;" onclick="order.close(<?php echo $r['id'];?>);">撤销申请</a></li>
					                            <?php } ?>

					                            <?php if($r['status'] == 2) { ?>
					                                <?php if(!$r['order_sn'] && !$r['trial_report']) { ?>
					                            	    <li><a href="javascript:;" onclick="order.buy(<?php echo $r['id'];?>);">现在去下单</a></li>
					                                    <li><a href="javascript:;" onclick="order.fill_trade_no(<?php echo $r['id'];?>);">填写订单号</a></li>
					                                <?php } else { ?>
					                                
					                                    <?php if(C_READ('buyer_update_order_type','rebate')> 0 && ($mod=='rebate'|| $mod=='trial')) { ?>
					                                       <li><a href="javascript:;" onclick="order.fill_trade_no(<?php echo $r['id'];?><?php if($r['order_sn']) { ?>,'修改订单号'<?php } ?>);">修改订单号</a></li>
					                                    <?php } ?>
					                                <?php } ?>                               
					                            <?php } ?>

					                            <?php if($r['status'] == 4) { ?>
					                               <li><a href="<?php echo U('Member/Appeal/add', array('id' => $r['id']));?>">我要申诉</a></li>
					                                <?php if($r['trial_report']) { ?>
					                               <li><a href="<?php echo U('Order/v2_trial_report',array('order_id'=>$r['id']));?>" target="_blank">修改试用报告</a></li>
					                               <?php } else { ?>
					                               <li><a href="javascript:;" onclick="order.fill_trade_no(<?php echo $r['id'];?><?php if($r['order_sn']) { ?>,'修改订单号'<?php } ?>);">修改订单号</a></li>
					                               <?php } ?>
					                            <?php } ?>


					                            <?php if($r['status'] == 6) { ?>
					                            	<li><a href="javascript:;" onclick="order.view_appeal(<?php echo $r['appeal_id'];?>,'<?php echo U('Member/Appeal/read');?>');">查看申诉</a></li>
													<li><a href="javascript:;" onclick="order.close_appeal(<?php echo $r['appeal_id'];?>,<?php echo $r['id'];?>);">关闭申诉</a></li>
					                            <?php } ?>

					                            <?php if($r['status'] == 8 && $mod=='trial'&& !$r['trial_report'] && $r['order_sn']) { ?>
					                                <li><a href="<?php echo U('Order/v2_trial_report',array('order_id'=>$r['id']));?>" target="_blank">填写试用报告</a></li>
					                            <?php } ?>
												<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);">操作记录</a></li>
											</ul>
										</td>
									</tr>
									<?php $n++;}unset($n); ?>
									
									
									
								</tbody>
							</table>
							
							<div id="page" class="mt30">
								<?php echo $v2_pages;?>
							</div>
						</div>
					</div>
					
				</div>
			</div>

		</div>
		
						<?php include template('footer','common'); ?>

	</body>
</html>
        <script type="text/javascript" src="<?php echo JS_PATH;?>tool/tool.js"></script>