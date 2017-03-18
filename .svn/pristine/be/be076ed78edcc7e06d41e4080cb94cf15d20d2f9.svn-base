<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>会员中心-试用报告列表-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="个人资料,会员中心,<?php echo C('WEBNAME');?>" />
		<meta name="Description" content="个人资料,会员中心,<?php echo C('WEBNAME');?>" />
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
  <?php $seller_get_appeal = string2array(C_READ('seller_get_appeal','rebate'));?>
  <?php $seller_trialtalk_check = string2array(C_READ('seller_trialtalk_check'));?>
    <?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>
    <?php   
        if ($r['status']==6 && $r['appeal']['appeal_status']==0){  //  商家申诉倒计时
            $end_time = $r['check_time']+$seller_get_appeal['time']*3600;
        }elseif($r['status']==1 && $mod=='trial'){  //  待审核资格
          $end_time = $r['create_time']+C_READ('seller_check_time')*86400;
        }elseif($r['status']==2 && $mod=='trial' && $r['trial_report']){  // 待会员下单
          $end_time = $r['check_time']+C_READ('buyer_write_order_time')*3600;
        }elseif($r['status']==2 && $mod=='trial' && !$r['trial_report'] && !$r['order_sn']){  // 待填写订单号
          $end_time = $r['check_time']+C_READ('buyer_write_order_time')*3600;
        }elseif($r['status']==2 && $mod=='trial' && !$r['trial_report'] && $r['order_sn']){ // 审核订单号倒计时
        $end_time = $r['check_time']+C_READ('seller_order_check_time','trial')*3600;

        }elseif($r['status']==8 && $mod=='trial' && !$r['trial_report']){ // 待填写试用报告倒计时
          $end_time = $r['check_time']+C_READ('buyer_write_talk_time')*86400;
        }elseif($r['status']==3 && $mod=='trial'){  // 待审核试用报告
          $end_time = $r['check_time']+$seller_trialtalk_check['value']*86400;
        }else{
            $end_time = $r['create_time']+C_READ('seller_check_time','rebate')*86400;
        }
    ?>   
    <?php if($n > 1) { ?>,<?php } ?>
    <?php echo $r['order_id'];?>:{
        "oid":"<?php echo $r['order_id'];?>",
        "gid":"<?php echo $r['goods_id'];?>",
        "title":"<?php echo $r['title'];?>",
        "url":"<?php echo $r['goods_url'];?>",
        "userid":"<?php echo $this->userid;?>",
        "modelid":"<?php echo $userinfo['modelid'];?>",
        "price":"<?php echo $r['goods_price'];?>",
        "end_time" : "<?php echo $end_time;?>",
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
	<body>
				<?php include template('v2_header','member/common'); ?>

		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>试用报告</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				<?php include template('v2_member_left','member/common'); ?>

				
				<script type="text/javascript">
					$(function(){
						$('.sy_list_wrap .list').eq($('.sy_list_btn .active').index()).show(100).siblings('.list').hide(100);
						$('.sy_list_btn li a').on('click',function(){
							$(this).parents('li').addClass('active').siblings('li').removeClass('active').parents('.sy_list_btn').siblings('.sy_list_wrap').find('.list').eq($(this).parents('li').index()).show(100).siblings('.list').hide(100);
						});
					});
				</script>
				
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">试用报告</h2>
					<!-- 正文 -->
					<ul class="sy_list_btn clear">
						<!-- <li><a href="javascript:;">代写报告<b>0</b></a></li>
						<li class="active"><a href="javascript:;">草稿箱<b>2</b></a></li> -->
						
						<li <?php if($status == '0') { ?>class="active" <?php } ?>><a href="<?php echo U('get_trial_report',array('status'=>'0'));?>">待审核报告<b><?php echo $center_pass;?></b></a></li>
						<li <?php if($status == '-1') { ?>class="active" <?php } ?>><a href="<?php echo U('get_trial_report',array('status'=>'-1'));?>">报告不通过<b><?php echo $no_pass;?></b></a></li>
						<li <?php if($status == '1') { ?>class="active" <?php } ?>><a href="<?php echo U('get_trial_report',array('status'=>1));?>">报告已通过<b><?php echo $pass;?></b></a></li>
					</ul>
					<p class="sy_fb_btn clear">
<!-- 						<a href="javascript:;"><b class="ico"></b>发布试用报告</a>
 -->					</p>
					<div class="sy_list_wrap">
						
						<div class="list">
							<table>
								<thead>
									<tr>
										<th width="45%">活动标题</th>
										<th>试用担保金</th>
										<th>订单号</th>
										<th>流程状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php $n=1;if(is_array($lists)) foreach($lists AS $r) { ?>

									<tr>
										<td class="clear">
											<div class="img fl"><img src="<?php echo $r['goods_thumb'];?>"/></div>
											<dl class="sy_tab_title fl">
												<dt><?php echo $r['title'];?></dt>
												<dd><?php echo dgmdate($r['inputtime'],'Y年m月d日'); ?> <?php echo dgmdate($r['inputtime'],'H:i'); ?></dd>
											</dl>
										</td>
										<td>￥<?php echo $r['goods_price'];?></td>
										<td><?php echo $r['order_sn'];?></td>
										<td>
											<!-- <ul class="sy_zs_hb">
											<li class="c_333"><?php echo $states[$r['status']];?></li>
											 <?php if($r['status']==3 && $r['act_mod']=='trial' && $r['check_time']+$seller_trialtalk_check['value']*86400>NOW_TIME) { ?>
		                                        <li>待审核试用报告:</li>
												<li class="c_333" id='remaining_time_<?php echo $r['id'];?>'>--</li>
											    <script type="text/javascript">order.timer(<?php echo $r['id'];?>);</script>
		                                    	<?php } ?>
		                                    </ul> -->
		                                    <?php if($r[report_status] == 0) { ?>
		                                    待审核
		                                    <?php } elseif ($r[report_status] == -1) { ?>
		                                    审核失败
		                                    <?php } elseif ($r[report_status] == 1) { ?>
		                                    已通过
		                                    <?php } ?>


										</td>
										<td>
											 <!-- <?php if($r[status] == 3 && $userid == $r['seller_id']) { ?>
						                    <a href="javascript:;" class="Fbtn" onclick="order.pay_report(<?php echo $r['order_id'];?>,'<?php echo U('view_report');?>')">通过</a>
						                    <a href="javascript:;" class="Fbtn" onclick="order.refuse(<?php echo $r['order_id'];?>)">拒绝</a>
						                     <a href="javascript:;" class="Fbtn" onclick="order.view_log(<?php echo $r['order_id'];?>)">更多信息</a>
						                    <?php } ?> -->

						                    <?php if($r['status'] == 4 ) { ?><!-- && $user_info['modelid'] == 1 -->
						                       <a href="<?php echo U('Order/v2_trial_report',array('order_id'=>$r['order_id']));?>" class="Fbtn" target="_blank">修改试用报告</a>
						                    <?php } ?>
						                    <a href="javascript:;" onclick="order.view_log(<?php echo $r['order_id'];?>);">操作记录</a>
						                    <!-- <?php if($r[status] == 7 && $userid == $r['seller_id']) { ?>
						                    <a href="javascript:;" class="Fbtn" onclick="order.view_report(<?php echo $r['order_id'];?>,'<?php echo U('view_report');?>')">查看报告</a>
						                    <?php } ?> -->

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