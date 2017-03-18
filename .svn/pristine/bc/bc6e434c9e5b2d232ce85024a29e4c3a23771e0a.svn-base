<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商家中心-订单管理-<?php echo C('WEBNAME');?></title>
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
  		<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
    	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
 	    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/plugins/iframeTools.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/order.js"></script>
<!-- 商家订单管理 -->
	</head>
	<body>
		  <?php include template('v2_merchant_header','member/common'); ?>
		
		<script type="text/javascript">
	<?php $userinfo = is_login();?>
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
var order_data = {
	<?php $seller_get_appeal = string2array(C_READ('seller_get_appeal','rebate'));?>
	<?php $seller_trialtalk_check = string2array(C_READ('seller_trialtalk_check'));?>
    <?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
    <?php   
        if ($r['status']==6 && $r['appeal']['appeal_status']==0){  //  商家申诉倒计时
            $end_time = $r['check_time']+$seller_get_appeal['time']*3600;
        }elseif($r['status']==1 && $mod=='trial'){	//	待审核资格
        	$end_time = $r['create_time']+C_READ('seller_check_time')*86400;
        }elseif($r['status']==2 && $mod=='trial' && $r['trial_report']){	// 待会员下单
        	$end_time = $r['check_time']+C_READ('buyer_write_order_time')*3600;
        }elseif($r['status']==2 && $mod=='trial' && !$r['trial_report'] && !$r['order_sn']){	// 待填写订单号
        	$end_time = $r['check_time']+C_READ('buyer_write_order_time')*3600;
        }elseif($r['status']==2 && $mod=='trial' && !$r['trial_report'] && $r['order_sn']){	// 审核订单号倒计时
        	$end_time = $r['check_time']+C_READ('seller_order_check_time')*3600;
        }elseif($r['status']==8 && $mod=='trial' && !$r['trial_report']){	// 待填写试用报告倒计时
        	$end_time = $r['check_time']+C_READ('buyer_write_talk_time')*86400;
        }elseif($r['status']==3 && $mod=='trial'){	// 待审核试用报告
        	$end_time = $r['check_time']+$seller_trialtalk_check['value']*86400;
        }elseif($r['status'] == 2 && $mod == 'commission'&& !$r['order_sn']){
            $end_time = $r['create_time']+C_READ('buyer_write_order_time','commission')*60;
        }elseif($r['status'] == 3 && $mod == 'commission'&& $r['order_sn']){
        $end_time = $r['check_time']+C_READ('seller_check_time','commission')*3600;
        }elseif($r['status'] == 5 && $mod == 'commission'&& $r['order_sn']){
           $end_time = $r['check_time']+C_READ('seller_pay_time','commission')*3600;

        }else{
        	 $end_time = $r['create_time']+C_READ('seller_check_time','rebate')*86400;
        }
    ?>
    <?php if($n > 1) { ?>,<?php } ?>
    <?php echo $r['id'];?>:{
        "oid":"<?php echo $r['id'];?>",
        "buyer_id":"<?php echo $r['buyer_id'];?>",
        "mod":"<?php echo $r['product_info']['mod'];?>",
        "seller_id":"<?php echo $r['seller_id'];?>",
        "gid":"<?php echo $r['goods_id'];?>",
        "title":"<?php echo $r['product_info']['title'];?>",
        "url":"<?php echo $r['product_info']['goods_url'];?>",
        "userid":"<?php echo $this->userid;?>",
        "modelid":"<?php echo $userinfo['modelid'];?>",
        "price":"<?php echo $r['product_info']['goods_price'];?>",
        "end_time" : "<?php echo $end_time;?>",
    }
    <?php $n++;}unset($n); ?>
};
</script>
		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>活动管理</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				  <?php include template('v2_merchant_left','member/common'); ?>
				<div class="fr u_index_mess user_r_w_2">
					<div class="s_right_wrap">
						<h3 class="title s_bor_t">订单管理-<?php echo $pro['title'];?></h3>
						<ul class="s_s_list s_bor_t">
							<li>试用品名称：<a href="<?php echo $pro['url'];?>" target="_blank"><span><?php echo $pro['title'];?></span></a></li>
							<li>下单价：<span>￥<b><?php echo $pro['goods_price'];?></b></span>
								<?php if($mod == 'trial' && $pro['goods_bonus'] > 0) { ?>
								<strong class="cr" style="margin-left:6px;">赠送红包<b><?php echo $pro['goods_bonus'];?></b>元</strong>
								<?php } elseif ($mod == 'commission' && $pro['bonus_price']) { ?>
								<strong class="cr" style="margin-left:6px;">试客佣金<b><?php echo $pro['bonus_price'];?></b>元</strong>
								<?php } ?>

							</li>
							<li class="clear">
								<strong class="fl">库存情况：</strong>
								<ul class="fl clear">
									<li>总数<span class="cd"><?php echo $pro['goods_number'];?></span>份</li>
									<li>进行中<span class="cd"><?php echo $ing;?></span>份</li>
									<li>已完成<span class="cd"><?php echo get_over_trial_by_gid($pro[id]);?></span>份</li>
									<li>剩余<span class="cd"><?php echo $pro[goods_number] - $pro[already_num]?></span>份</li>
								</ul>
							</li>
							<li class="clear">
								<strong class="fl">参与情况：</strong>
								<?php if($mod == 'rebate') { ?>
								<ul class="fl clear">
									<li>已抢购<span class="cd"><?php echo get_trial_by_gid($pro['id']);?></span>人</li>
									<li>已通过<span class="cd"><?php echo get_trial_pass_by_gid($pro['id']);?></span>人</li>
									<li>已放弃<span class="cd"><?php echo get_Close_order($pro['id']);?></span>人</li>
								</ul>
								<?php } else { ?>
								<ul class="fl clear">
									<li>总申请人数<span class="cd"><?php echo get_trial_by_gid($pro['id']);?></span>人</li>
									<li>已通过<span class="cd"><?php echo get_trial_pass_by_gid($pro['id']);?></span>人申请</li>
									<li>已放弃<span class="cd"><?php echo get_Close_order($pro['id']);?></span>人</li>

								</ul>

								<?php } ?>

							</li>
						</ul>
						
						<div class="s_title_item">

							<p class="title clear">
								<a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>1));?>"class=" <?php if($state == 1) { ?> active <?php } ?> item_show">待审批</a>
								<a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>6,'status'=>6));?>"class=" <?php if($state == 6) { ?> active <?php } ?> item_show">活动中</a>
								<a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>2));?>" class="<?php if($state == 2) { ?> active <?php } ?>">已完成</a>
								<a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>3));?>" class=" <?php if($state == 3) { ?> active <?php } ?> ">已关闭</a>
								<a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>5));?>" class=" <?php if($state == 5) { ?> active <?php } ?> ">审核失败</a>
								<a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>4));?>" class=" <?php if($state == 4) { ?> active <?php } ?> item_show">申诉中</a>
							</p>
							<?php if($state == 1) { ?>
							<div class="item">
								<ul class="box clear active">
									<?php if($mod == 'trial') { ?>
									<li><a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>1,'status'=>1));?> " <?php if($status == 1) { ?>class="active" <?php } ?>>待审核试用资格 <span><?php echo $check_zhige;?></span></a></li>
									<?php } ?>
									<li><a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>1,'status'=>2));?> " <?php if($status == 2) { ?>class="active" <?php } ?>>待审核订单号 <span><?php echo $seller_ordersn;?></span></a></li>

									

								    <?php if($mod == 'trial') { ?>

									<li><a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>1,'status'=>3));?> " <?php if($status == 3) { ?>class="active" <?php } ?>>待审核试用报告 <span><?php echo $trial_report_count;?></span></a></li>
									<?php } ?>

									<?php if($mod == 'commission' || $mod == 'rebate') { ?>

									<li><a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>1,'status'=>4));?> " <?php if($status == 4) { ?>class="active" <?php } ?>>待付款订单 <span><?php echo $pay_count;?></span></a></li>
									<?php } ?>



								</ul>
							</div>
							<?php } ?>

							<?php if($state == 6) { ?>
							<div class="item">
								<ul class="box clear active">

									<li><a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>6,'status'=>6));?> " <?php if($status == 6) { ?>class="active" <?php } ?>>待填写订单号 <span><?php echo $trial_write_order_sn;?></span></a></li>

								   <?php if($mod == 'trial') { ?>
									<li><a href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $pro['id'],'mod'=>$mod,'state'=>6,'status'=>5));?> " <?php if($status == 5) { ?>class="active" <?php } ?>>待填写试用报告 <span><?php echo $trial_write_count;?></span></a></li>
									<?php } ?>


								</ul>
							</div>
							<?php } ?>
						</div>
						<?php if($status == 1 && $state == 1) { ?>
						
						<table class="s_table" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>申请理由</th>
									<th>下单账号</th>
									<th>历史申请</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if($lists) { ?>
							<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width:100%;" src="<?php echo getavatar($r[buyer_id]);?>"/></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq') != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<div style="width:86px;" class="ch">
											<?php echo $r['talk'];?>	
										</div>
									</td>
                                    
								    <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>下单账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
	                                        <li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch">累计申请本店<span class="cs"><?php echo $r['total_apply'];?></span>次</li>
											<li class="ch">正在进行中<span class="cs"><?php echo $r['total_ing'];?></span>次</li>
											<li class="ch">成功完成本店<span class="cs"><?php echo $r['total_complete'];?></span>次</li>
											<li class="ch"><a href="javascript:;" onclick="order.seller_complete_log(<?php echo $r['id'];?>);" class="cs">查看成功</a></li>
										</ul>
									</td>

									<td>
										<ul class="tc">
											<li class="ch"><?php echo $states[$r['status']];?></li>
											<li>审核时间还有</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				</li>
										</ul>
									</td>

									<td>
										<ul class="btn btn_s_2">
											<li>
												  <a href="javascript:;" onclick="ajax_enter('确定试用资格通过?该操作不可逆转','<?php echo U('trial_pass', array('order_id' => $r['id'],'state'=>'1','mod'=>$mod,'v2'=>1));?>')"  class="tg">通过审核</a>
	                                       
											</li>
											<li>
												 <a href="javascript:;" onclick="ajax_enter('确定拒绝试用资格?该操作不可逆转','<?php echo U('trial_pass', array('order_id' => $r['id'],'state'=>'0','mod'=>$mod,'v2'=>1));?>')"  class="jj">拒绝审核</a>
											</li>
											<li>
										    <a href="javascript:;" onclick="order.blacklist(<?php echo $r['id'];?>)"  class="cz">加入黑名单</a>
											</li>
											<li><a class="cz" href="javascript:;" onclick="order.userInfo(<?php echo $r['buyer_id'];?>,<?php echo $r['id'];?>);">买家信息</a>
											</li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
								
							</tbody>
						</table>
						<?php } ?>

						<?php if($status == 2 && $state == 1) { ?>
						<table width="100%" class="s_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>填写订单号时间</th>
									<th>下单账号</th>
									<th>订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>

								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq' ) != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch"><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
										</ul>
									</td>
								    <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img  width="180" height="100" src="<?php echo $r['taobao_img'];?>" />查看淘宝信誉截图</a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li><span><?php echo $r['order_sn'];?></span></li>
											<?php if($r[act_mod] == 'commission') { ?>
											<p>
												<a href="javascript:;" data-url="<?php echo $r['order_img'];?>" class="cs ajax_img">查看订单截图</a>
											</p>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li class="ch">	<?php echo $states[$r['status']];?></li>
										 <?php if($r['status']==2 && $mod=='trial' && ($r['check_time']+C_READ('buyer_write_order_time')*3600>NOW_TIME) && !$r['trial_report'] && !$r['order_sn']) { ?>
											<li>待填写订单号倒计时</li>
											<li class="ch">
										
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				    </li>

                        				   <?php } elseif ($r['status']==2 && $mod=='trial' && !$r['trial_report'] && $r['order_sn']) { ?>
                        				   <li>待审核订单号</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        					</li>
                        					<?php } elseif ($r['status']==2 && $mod=='commission' && ($r['create_time']+C_READ('buyer_write_order_time')*60>NOW_TIME)  && !$r['order_sn']) { ?>
                        					<li>待填写订单号倒计时</li>
											<li class="ch">
										
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				    </li>
                        				    <?php } elseif ($r['status']==3 && $mod=='commission'  && $r['order_sn']) { ?>
                        				    <li>待审核订单号倒计时</li>
											<li class="ch">
										
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				    </li>
                        					<?php } ?>

                        				<?php if(($r['status']==3 || $r['status']==5) && $mod=='rebate' && C('seller_no_check_order') != 3) { ?>
											<li>订单完成倒计时:</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script></li>
										<?php } ?>
												

										</ul>
									</td>
									<td>
										<ul class="btn">
											<?php if($r[status] == 2 && $r[order_sn]) { ?>
											<li><a href='javascript:;' onclick="javascript:ajax_enter('确定通过该订单号?该操作不可逆转','<?php echo U('check_ordersn', array('order_id' => $r['id'],'ispass' => 1,'v2'=>1));?>');" class="tg">通过审核</a>
											</li>
											<li><a href='javascript:;' onclick="javascript:ajax_enter('确定拒绝该订单号通过?该操作不可逆转','<?php echo U('check_ordersn', array('order_id' => $r['id'],'ispass' => 2,'v2'=>1));?>');" class="jj">拒绝审核</a></li>
											<?php } ?>

										<?php if($r['status'] == 3 ) { ?>
											<?php if($r[act_mod] == 'commission') { ?>
										    <li><a href='javascript:;' onclick="javascript:ajax_enter('确定审核通过?该操作不可逆转','<?php echo U('pass', array('order_id' => $r['id'],'v2'=>1));?>');" class="tg">通过审核</a></li>
										    <?php } elseif ($r[act_mod] == 'trial') { ?>
										    <li> <a href="javascript:;" onclick="order.pay_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="tg">通过</a></li>

										    <?php } elseif ($r[act_mod] == 'rebate') { ?>
										    <a href='javascript:;' onclick="javascript:ajax_enter('确定审核通过?该操作不可逆转','<?php echo U('pass', array('order_id' => $r['id'],'v2'=>1));?>');" class="tg">通过审核</a>
										    <?php } ?>
											<li><a href="javascript:;" onclick="order.refuse(<?php echo $r['id'];?>)" class="jj">拒绝审核</a></li>
										<?php } ?>

											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);" class="cz">操作记录</a></li>



										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
							</tbody>
						</table>
						<?php } ?>

						<?php if($status == 3 && $state == 1) { ?>

						<table class="s_table" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>填写报告时间</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>
								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq') != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch"><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
										</ul>
									</td>
								    <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li>
												<span><?php echo $r['order_sn'];?></span>

											</li>
											<?php if($r['trial_report']) { ?>
											<li><a href="javascript:;" onclick="order.view_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="cs">查看试用报告</a></li>
											<?php } ?>

										</ul>
									</td>
									<td>
										<ul class="tc">
											<li class="ch">	<?php echo $states[$r['status']];?></li>
											<?php if($r['status']==8 && $mod=='trial' && !$r['trial_report'] && $r['order_sn']) { ?>
                        					<li>待填写试用报告倒计时</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        					</li>
										   <?php } ?>

										   <?php if($r['status']==3 && $mod=='trial' && $r['check_time']+$seller_trialtalk_check['value']*86400>NOW_TIME) { ?>
										   <li>待审核试用报告</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
										   <?php } ?>
											


										</ul>
									</td>
									<td>
										<ul class="btn">


										   	<?php if($r['status'] == 3) { ?>
												<?php if($mod == 'trial') { ?>
													<li><a href="javascript:;" onclick="order.pay_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="tg">通过审核</a></li>
													
												<?php } ?>

													<li><a href="javascript:;" onclick="order.refuse(<?php echo $r['id'];?>)" class="jj">拒绝</a></li>
											<?php } ?>
											
											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);" class="cz">操作记录</a></li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
							</tbody>
						</table>

						<?php } ?>


						<?php if($status == 4 && $state == 1) { ?>

						<table class="s_table" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>填写报告时间</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>
								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq') != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch"><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li>
											<span><?php echo $r['order_sn'];?></span>
											<?php if($r[act_mod] == 'commission') { ?>
											<p>
												<a href="javascript:;" data-url="<?php echo $r['order_img'];?>" class="cs ajax_img">查看订单截图</a>
											</p>
											<?php } ?>
											</li>
											<?php if($r['trial_report']) { ?>
											<li><a href="javascript:;" onclick="order.view_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="cs">查看试用报告</a></li>
											<?php } ?>

										</ul>
									</td>
									<td>
										<ul class="tc">
											<li class="ch">	<?php echo $states[$r['status']];?></li>
											
										   <?php if($r['status']==5 && $mod=='commission') { ?>
										   <li>待返款</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
										   <?php } ?>

										   <?php if(($r['status']==3 || $r['status']==5) && $mod=='rebate' && C('seller_no_check_order') != 3) { ?>
											<li>订单完成倒计时:</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script></li>
										<?php } ?>
											


										</ul>
									</td>
									<td>
										<ul class="btn">

											<?php if($r['status'] == 5 && $mod == 'commission') { ?>
											
												<li><a href="<?php echo U('pay', array('order_id[]' => $r['id'],'mod'=>$r['act_mod']));?>"  onclick="return confirm('确定付款?该操作不可逆转哦~')" class="tg">付款</a></li>
												<li><a href="<?php echo U('cancel', array('order_id' => $r['id']));?>" onclick="return confirm('确定撤销通过?该操作不可逆转')" class="jj">撤销</a>	</li>
											<?php } ?>

											<?php if($r['status'] == 5 && $mod == 'rebate') { ?>
											
												<li><a href="<?php echo U('pay', array('order_id[]' => $r['id'],'mod'=>$r['act_mod']));?>"  onclick="return confirm('确定付款?该操作不可逆转哦~')" class="tg">付款</a></li>
												<li><a href="<?php echo U('cancel', array('order_id' => $r['id']));?>" onclick="return confirm('确定撤销通过?该操作不可逆转')"  class="jj">撤销</a>	</li>
											<?php } ?>

											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);" class="cz">操作记录</a></li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
							</tbody>
						</table>

						<?php } ?>


						<?php if($state == 6) { ?>
						<table width="100%" class="s_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>操作时间</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>

								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq' ) != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch"><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
										</ul>
									</td>
									<td>
											<ul>
											    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
											    <?php if($r['account_level']) { ?>
												<li class="clear">
													<strong class="fl">买家信用: </strong>
													<img src="<?php echo $r['account_level'];?>" />
												</li>
												<?php } ?>
		                                        <?php if($r['taobao_img']) { ?>
												<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
												<?php } ?>
											</ul>
									</td>
									<td>
										<ul class="tc">
											<li><span><?php echo $r['order_sn'];?></span></li>
											<?php if($r[act_mod] == 'commission') { ?>
											<p>
												<a href="javascript:;" data-url="<?php echo $r['order_img'];?>" class="cs ajax_img">查看订单截图</a>
											</p>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li class="ch">	<?php echo $states[$r['status']];?></li>
										 <?php if($r['status']==2 && $mod=='trial' && ($r['check_time']+C_READ('buyer_write_order_time')*3600>NOW_TIME) && !$r['trial_report'] && !$r['order_sn']) { ?>
											<li>待填写订单号倒计时</li>
											<li class="ch">
										
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				    </li>

                        				   <?php } elseif ($r['status']==2 && $mod=='trial' && !$r['trial_report'] && $r['order_sn']) { ?>
                        				   <li>待审核订单号</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        					</li>
                        					<?php } elseif ($r['status']==2 && $mod=='commission' && ($r['create_time']+C_READ('buyer_write_order_time')*60>NOW_TIME)  && !$r['order_sn']) { ?>
                        					<li>待填写订单号倒计时</li>
											<li class="ch">
										
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				    </li>
                        				    <?php } elseif ($r['status']==3 && $mod=='commission'  && $r['order_sn']) { ?>
                        				    <li>待审核订单号倒计时</li>
											<li class="ch">
										
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
                        				    </li>
                        					<?php } ?>

                        				<?php if(($r['status']==3 || $r['status']==5) && $mod=='rebate' && C('seller_no_check_order') != 3) { ?>
											<li>订单完成倒计时:</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script></li>
										<?php } ?>

										<?php if($r['status']==8  && $mod=='trial') { ?>
											<li>待填写试用报告倒计时:</li>
											<li class="ch">
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script></li>
										<?php } ?>
												

										</ul>
									</td>
									<td>
										<ul class="btn">
											<?php if($r[status] == 2 && $r[order_sn]) { ?>
											<li><a href='javascript:;' onclick="javascript:ajax_enter('确定通过该订单号?该操作不可逆转','<?php echo U('check_ordersn', array('order_id' => $r['id'],'ispass' => 1,'v2'=>1));?>');" class="tg">通过审核</a>
											</li>
											<li><a href='javascript:;' onclick="javascript:ajax_enter('确定拒绝该订单号通过?该操作不可逆转','<?php echo U('check_ordersn', array('order_id' => $r['id'],'ispass' => 2,'v2'=>1));?>');" class="jj">拒绝审核</a></li>
											<?php } ?>

										<?php if($r['status'] == 3 ) { ?>
											<?php if($r[act_mod] == 'commission') { ?>
										    <li><a href='javascript:;' onclick="javascript:ajax_enter('确定审核通过?该操作不可逆转','<?php echo U('pass', array('order_id' => $r['id'],'v2'=>1));?>');" class="tg">通过审核</a></li>
										    <?php } elseif ($r[act_mod] == 'trial') { ?>
										    <li> <a href="javascript:;" onclick="order.pay_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="tg">通过</a></li>

										    <?php } elseif ($r[act_mod] == 'rebate') { ?>
										    <a href='javascript:;' onclick="javascript:ajax_enter('确定审核通过?该操作不可逆转','<?php echo U('pass', array('order_id' => $r['id'],'v2'=>1));?>');" class="tg">通过审核</a>
										    <?php } ?>
											<li><a href="javascript:;" onclick="order.refuse(<?php echo $r['id'];?>)" class="jj">拒绝审核</a></li>
										<?php } ?>

											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);" class="cz">操作记录</a></li>



										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
							</tbody>
						</table>
						<?php } ?>

						<?php if($state == 2) { ?>
						<table width="100%" class="s_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>订单历史</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>
								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
							
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq' )!= 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li>完成时间: <span><?php echo dgmdate($r[complete_time],'Y-m-d H:i');?></span></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
											<li class="ch">累计申请本店<span class="cs"><?php echo $r['total_apply'];?></span>次</li>
											<li class="ch">正在进行中<span class="cs"><?php echo $r['total_ing'];?></span>次</li>
											<li class="ch">成功完成本店<span class="cs"><?php echo $r['total_complete'];?></span>次</li>
										</ul>
									</td>
								    <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul>
											<li><span><?php echo $r['order_sn'];?></span></li>
											<?php if($r['trial_report']) { ?>
											<li><a href="javascript:;" onclick="order.view_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="cs">查看试用报告</a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul>
											<li style="text-align: center; text-indent: 0px;"><span><?php echo $states[$r['status']];?></span></li>
											<li>成功返还会员</li>
											<?php if($r[act_mod] == 'trial' ) { ?>

											<li class="ch"><span class="cs"><b><?php echo $pro['goods_price'] + $pro['goods_bonus']?></b>元</span>(含红包)</li>
											<?php } elseif ($r['act_mod'] == 'commission') { ?>
											<li class="ch"><span class="cs"><b><?php echo $pro['goods_price'] + $pro['bonus_price']?></b>元</span>(含佣金)</li>
											<?php } elseif ($r['act_mod'] == 'rebate') { ?>
											<li class="ch"><span class="cs"><b><?php echo sprintf('%.2f',$pro['goods_price']-$pro['goods_price'] * $pro['goods_discount']/10)?></b>元</span></li>
											<?php } ?>

										</ul>
									</td>
									<td>
										<ul class="btn">
											
<!-- 											<a class="jrdp" href="#">加入店铺<br>免审会员</a>
 -->											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);" class="cz">操作记录</a></li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>

								
							</tbody>
						</table>
						<?php } ?>

						<?php if($state == 3) { ?>
						<table width="100%" class="s_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>订单历史</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>
								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
							
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq') != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li>关闭时间: <span><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></span></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
											<li class="ch">累计申请本店<span class="cs"><?php echo $r['total_apply'];?></span>次</li>
											<li class="ch">正在进行中<span class="cs"><?php echo $r['total_ing'];?></span>次</li>
											<li class="ch">成功完成本店<span class="cs"><?php echo $r['total_complete'];?></span>次</li>
										</ul>
									</td>
								   <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li><span><?php echo $r['order_sn'];?></span></li>
											<?php if($r['trial_report']) { ?>
											<li><a href="javascript:;" onclick="order.view_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="cs">查看试用报告</a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch tc" style="text-align: center;"><?php echo $states[$r['status']];?></li>
											<li class="tc" style="width: 80px;">原因:<span><?php echo $r['close_cause'];?></span></li>
										</ul>
									</td>
									<td>
										<ul class="btn btn_h">
												<a href="javascript:;" onclick="order.blacklist(<?php echo $r['id'];?>)"  class="cz">加入黑名单</a>
											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);" class="cz">操作记录</a></li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
								
							</tbody>
						</table>
						<?php } ?>

						<?php if($state == 4) { ?>
						<table width="100%" class="s_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>填写报告时间</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if($lists) { ?>
							<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq') != 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li>操作时间: <span><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></span></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
											<li class="ch">累计申请本店<span class="cs"><?php echo $r['total_apply'];?></span>次</li>
											<li class="ch">正在进行中<span class="cs"><?php echo $r['total_ing'];?></span>次</li>
											<li class="ch">成功完成本店<span class="cs"><?php echo $r['total_complete'];?></span>次</li>
										</ul>
									</td>
								    <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li><span><?php echo $r['order_sn'];?></span></li>
											<?php if($r['trial_report']) { ?>
											<li><a href="javascript:;" onclick="order.view_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="cs">查看试用报告</a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch" style="text-align: center;"><?php echo $states[$r['status']];?></li>
											<?php if($r['status']==6 && $r['appeal']['appeal_status']==0) { ?>
											<li>商家申诉倒计时</li>
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="btn btn_h">
											<?php if($r[status] == 6) { ?>
											<li><a href="<?php echo U('member/appeal/appeal_manage');?>">回应申诉</a></li>
											<?php } ?>
											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);">操作记录</a></li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
								
							</tbody>
						</table>
						<?php } ?>



						<?php if($state == 5) { ?>
						<table width="100%" class="s_table">
							<thead>
								<tr>
									<th>ID</th>
									<th>申请人</th>
									<th>填写报告时间</th>
									<th>淘宝账号</th>
									<th>淘宝订单号</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if($lists) { ?>
								<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
							
								<tr>
									<td>
										<div class="img fl">
											<span class="s_id"><?php echo $n;?></span>
											<div class="img_data"><img style="width: 100%;" src="<?php echo getavatar($r[buyer_id]);?>"></div>
											<span class="s_name"><?php echo nickname($r[buyer_id]);?></span>
										</div>
									</td>
									<td>
										<ul>
											<li>真实姓名：<span><?php echo $r['real_name'];?></span><span class="cs"><?php if($r['name_status'] == 1) { ?>(已实名认证)<?php } elseif ($r['name_status'] == -1) { ?>(认证未通过)<?php } else { ?>(未认证)<?php } ?></span></li>
											<li>性别：<span><?php if($r[sex] == 1) { ?>女<?php } elseif ($r[sex] == 2) { ?>男<?php } else { ?>保密<?php } ?></span></li>
											<?php if(getUserInfo($r['buyer_id'],'phone') !="" ) { ?>
											<li>手机：<span><?php echo getUserInfo($r['buyer_id'],'phone');?></span></li>
											<?php } ?>
											<?php if(getUserInfo($r['buyer_id'],'qq' )!= 0) { ?>
											<li>QQ：<span><?php echo getUserInfo($r['buyer_id'],'qq');?></span><a target="_bank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo getUserInfo($r['buyer_id'],'qq');?>&site=qq&menu=yes" class="cs">在线联系<img src="<?php echo THEME_STYLE_PATH;?>style/img/qqjt.gif"></a></li>
											<?php } ?>
											<?php if($r[provice] !="") { ?>
											<li>所在地：<span><?php echo $r['provice'];?></span></li>
											<?php } ?>
											<li>申请时间：<span><?php echo dgmdate($r[create_time],'Y-m-d H:i');?></span></li>
											<li>ip：<span><?php echo $r['ip'];?></span></li>
										</ul>
									</td>
									<td>
										<ul>
											<li>操作时间: <span><?php echo dgmdate($r[check_time],'Y-m-d H:i');?></span></li>
											<li>ip: <span><?php echo $r['check_ip'];?></span></li>
											<li class="ch">累计申请本店<span class="cs"><?php echo $r['total_apply'];?></span>次</li>
											<li class="ch">正在进行中<span class="cs"><?php echo $r['total_ing'];?></span>次</li>
											<li class="ch">成功完成本店<span class="cs"><?php echo $r['total_complete'];?></span>次</li>
										</ul>
									</td>
								    <td>
										<ul>
										    <?php if($r[bind_account]) { ?><li>淘宝账号: <span><?php echo $r['bind_account'];?></span></li><?php } ?>
										    <?php if($r['account_level']) { ?>
											<li class="clear">
												<strong class="fl">买家信用: </strong>
												<img src="<?php echo $r['account_level'];?>" />
											</li>
											<?php } ?>
	                                        <?php if($r['taobao_img']) { ?>
											<li><a href="javascript:;" onclick="get_toabao_img('<?php echo $r['taobao_img'];?>')" class="cs"><img width="180" height="100" src="<?php echo $r['taobao_img'];?>" /><p>查看淘宝信誉截图</p></a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="tc">
											<li><span><?php echo $r['order_sn'];?></span></li>
											<?php if($r['trial_report']) { ?>
											<li><a href="javascript:;" onclick="order.view_report(<?php echo $r['id'];?>,'<?php echo U('view_report');?>')" class="cs">查看试用报告</a></li>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul>
											<li class="ch" style="text-align: center;"><?php echo $states[$r['status']];?></li>
											<?php if($r['status']==6 && $r['appeal']['appeal_status']==0) { ?>
											<li>商家申诉倒计时</li>
											<span id="remaining_time_<?php echo $r['id'];?>">--</span>
                        					<script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
											<?php } ?>
										</ul>
									</td>
									<td>
										<ul class="btn btn_h">
											<?php if($r[status] == 6) { ?>
											<li><a href="<?php echo U('member/appeal/appeal_manage');?>">回应申诉</a></li>
											<?php } ?>
											<li><a href="javascript:;" onclick="order.view_log(<?php echo $r['id'];?>);">操作记录</a></li>
										</ul>
									</td>
								</tr>
								<?php $n++;}unset($n); ?>
								<?php } ?>
								
							</tbody>
						</table>
						<?php } ?>

						<div id="page" class="mt30 clear" style="margin:20px 20px;">
							<?php echo $v2_pages;?>
						</div>
						<script type="text/javascript">
							$(function(){
								$('span[credit]').each(function(){
									var len = $(this).attr('credit');
									var _html = '';
									for(var i=0;i<len;i++){
										_html += '<b></b>';
									}
									$(this).html(_html);
								});
							});
						</script>
					</div>
				</div>
			</div>
			
		</div>
		
		<script type="text/javascript">

			function ImgonLoad(url,fn){
				var img = new Image();
				img.src = url;
				img.onload = fn;
			}

			 /*查看已上传的信誉截图*/
			 function get_toabao_img(img){
				art.dialog({
					lock: true,fixed: true,
					title: '已上传的信誉截图',
					time:5,
					content:'<img src="'+img+'" />',
					ok: function (){

						}
					});
			 }
			
			$(function(){
				$('.ajax_img').on('click',function(){
					var url = $(this).attr('data-url');
					var This = this;
					
					ImgonLoad(url,function(){
						art.dialog({
							    		id:'',
							    		lock : true,
							   	        fixed : true,
							   	        title : '订单截图',
							   	        content:'<div><img src="'+url+'"/></div>',
							   	        drag : false,
							   	        ok:function(){

							   	        },
							   	    });
					});
									

				});
			});



		</script>

		  <?php include template('footer','common'); ?>
	</body>
</html>
<style type="text/css">
.operate-log {
max-width: 520px;
_width: 520px;
max-height: 420px;
_height: 420px;
padding: 1px;
overflow: auto;
font-size: 12px;
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
</style>