<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>活动管理-商家个人中心-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="活动管理,商家个人中心,<?php echo C('WEBNAME');?>" />
		<meta name="description" content="活动管理,商家个人中心,<?php echo C('WEBNAME');?>" />
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
  		<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
    	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
 	    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/plugins/iframeTools.js"></script>

        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/order.js"></script>

        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/activity.js"></script>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/task.js"></script>


		<script type="text/javascript">
			$(function(){
				var item_timer = null;
				$('.s_title_item .item').addClass('dn');
				$('.s_title_item .title .item_show,.s_title_item .item').on('mouseover',function(){
					clearTimeout(item_timer);
					$(this).parents('.s_title_item').find('.item').removeClass('dn');
				}).on('mouseout',function(){
					var This = $(this);
					item_timer = setTimeout(function(){
						This.parents('.s_title_item').find('.item').addClass('dn');
					},300);
				});
			});
		</script>
	</head>
	<body>
		      <?php include template('v2_merchant_header','member/common'); ?>

		
		
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
						<h3 class="title"><?php if($mod == 'trial') { ?><?php echo C('TRIAL_NAME');?><?php } elseif ($mod == 'commission') { ?><?php echo C('COMMISSION_NAME');?><?php } elseif ($mod == 'postal') { ?><?php echo C('POSTAL_NAME');?><?php } elseif ($mod == 'rebate') { ?><?php echo C('REBATE_NAME');?><?php } ?>活动管理</h3>
						<p class="s_intro"><?php if($mod == 'trial') { ?><?php echo C('TRIAL_NAME');?><?php } elseif ($mod == 'commission') { ?><?php echo C('COMMISSION_NAME');?><?php } elseif ($mod == 'postal') { ?><?php echo C('POSTAL_NAME');?><?php } elseif ($mod == 'rebate') { ?><?php echo C('REBATE_NAME');?><?php } ?>（<span class="cd"><?php echo activity_count($userid,$mod);?></span>）</p>
						<form action="<?php echo __APP__;?>" method="get">
							<input type="hidden" name="m" value="<?php echo MODULE_NAME;?>" />
							<input type="hidden" name="c" value="<?php echo CONTROLLER_NAME;?>" />
							<input type="hidden" name="a" value="<?php echo ACTION_NAME;?>" />
							<input type="hidden" name="mod" value="<?php echo $mod;?>" />
						<p class="s_hd_status clear">
							<select name="activity_state" class="fl">
								<option value="-99">活动状态</option>
								<?php $n=1; if(is_array($this->activity_state)) foreach($this->activity_state AS $key => $value) { ?>
								<option value="<?php echo $key;?>" <?php if($key == $activity_state) { ?>selected<?php } ?>><?php echo $value;?></option>	
								<?php $n++;}unset($n); ?>
							</select>
							<input type="text" class="t fl" placeholder="请输入活动标题关键字" name="keyword"/>
							<input type="submit" value="搜索" class="b">
<!-- 							<a href="#" class="b fl">搜索</a>
 -->						</p>
					</form>
						
						<table class="s_table_2 pd_28 mt_1" width="100%">
							<thead>
								<tr>
									<th style="text-indent:88px;text-align:left;">商品标题</th>
									<th>状态</th>
									<th>下单价</th>
									<th>份数</th>
									<th>申请人数</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>

								<?php $n=1;if(is_array($lists)) foreach($lists AS $l) { ?>
								<?php 
									$mod = !isset($mod) ? $mod : $l['mod'];
								?>
								<tr>
									<td>
										<div class="s_user_l_b clear">
											<div class="fl u_tx">
												<a href="<?php echo $l['url'];?>" target="_blank"><img src="<?php echo $l['thumb'];?>" alt="" /></a>
												<p class="add_hd_bh">编号:<?php echo $l['id'];?></p>
											</div>
											<dl class="fl u_list">
												<dt><a href="<?php echo $l['url'];?>" target="_blank"><?php echo $l['title'];?></a></dt>
												<dd>开始时间：<span><?php echo dgmdate($l[start_time],'Y年m月d日 H:i');?></span></dd>
												<dd>结束时间：<span><?php echo dgmdate($l[end_time],'Y年m月d日 H:i');?></span></dd>
											</dl>
										</div>
									</td>
									<td>
										<ul>
											<li><?php echo C("ACTIVITY_STATUS.$l[status]");?></li>
<!-- 											<li>(结算中...)</li>
 -->										</ul>
									</td>
									<td>
										<ul>
											<li>￥<?php echo $l['goods_price'];?></li>
												<?php if($l[mod] == 'trial' && $l['goods_bonus'] > 0) { ?>
												<li><a href="javascript:;" class="hb">赠送红包<span>

												￥<?php echo $l['goods_bonus'];?>
												<?php } elseif ($l[mod] == 'commission' && $l['bonus_price'] > 0) { ?>
												<li><a href="javascript:;" class="hb">闪电佣金<span>

												￥<?php echo $l['bonus_price'];?>
												<?php } ?>

											</span></a></li>
										</ul>
									</td>
									<td>
										<ul>
											<?php echo $l['goods_number'];?>
										</ul>
									</td>
									<td>
										<ul>
										<?php if($mod == 'rebate') { ?>
											<li>已抢购:<span><?php echo get_trial_by_gid($l['id']);?></span></li>
											<li>已完成:<span><?php echo get_over_trial_by_gid($l['id']);?></span></li>
										 <?php } else { ?>	
										     <li>已申请:<span><?php echo get_trial_by_gid($l['id']);?></span></li>
											<li>已通过:<span><?php echo get_trial_pass_by_gid($l['id']);?></span></li>
											<li>已完成:<span><?php echo get_over_trial_by_gid($l['id']);?></span></li>
										 <?php } ?>		
										</ul>
									</td>
									<td>
										<ul class="btn">
											<?php if($l[status] == -3 && ($mod == 'commission' || $mod=='trial'|| $mod=='rebate')) { ?>
												<li><a class="ch" href="<?php echo U('Member/MerchantProduct/edit',array('id'=>$l[id],'mod'=>$l[mod]));?>">编辑活动</a></li>
												<?php if($mod == 'commission' || $mod=='trial' || $mod=='rebate') { ?>
													<li><a class="ch"  href="<?php echo U('Member/MerchantProduct/bailbond',array('id'=>$l[id],'mod'=>$l[mod]));?>">支付费用</a></li>
												<?php } ?>
												<li><a class="ch"  href="javascript:;" onclick="revocation(<?php echo $l['id'];?>,'<?php echo $l['mod'];?>')" id="revocation">撤销活动</a></li>
											<?php } ?>
											<?php if($l['status'] == 1 && ($mod == 'commission' || $mod=='trial' || $mod=='rebate')) { ?>
													<!--修改增加库存条件-->			
													<li><a class="ch"  href="javascript:;" onclick="order.push_number(<?php echo $l['id'];?>,'<?php echo U('Member/MerchantProduct/push_number');?>')">追加库存</a></li>
												<!--<?php if(((int)($l['goods_number']-$l['already_num']) == 0)  && $mod == 'trial' || $mod=='rebate') { ?>
													<li><a class="ch"  href="javascript:;" onclick="order.push_number(<?php echo $l['id'];?>,'<?php echo U('Member/MerchantProduct/push_number');?>')">追加库存</a></li>
												<?php } ?>-->
												<li><a class="ch" href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $l['id'],'mod'=>$mod,'state'=>1));?>">审核订单</a></li>
												<!-- <?php if($mod=='trial') { ?>
												<li><a href="<?php echo U('Member/Order/manage', array('goods_id' => $l['id'],'mod'=>$mod));?>">审核试用报告</a></li>
												<?php } ?> -->
											<?php } ?>
											<?php if($l['status'] == 2 && ($mod == 'commission' || $mod=='trial' || $mod=='rebate')) { ?>
												<li><a class="ch"  href="javascript:;" onclick="goods.activity_over('<?php echo U('activity_over');?>', '<?php echo $l['id'];?>');">活动结算</a></li>
												<li><a class="ch" href="<?php echo U('Member/Order/v2_manage', array('goods_id' => $l['id'],'mod'=>$mod,'state'=>1));?>">审核订单</a></li>

												<li><a href="javascript:;" onclick="order.add_time(<?php echo $l['id'];?>,'<?php echo U('Member/MerchantProduct/add_time');?>')"  class="ch">延期时间</a></li>

												<!-- <?php if($mod=='trial') { ?>
												<li><a href="<?php echo U('Member/Order/manage', array('goods_id' => $l['id'],'mod'=>$mod));?>">审核试用报告</a></li>
												<?php } ?> -->
											<?php } ?>
											<li><a class="ch" href="javascript:;" onclick="goods.log(this);" data-gid="<?php echo $l['id'];?>" data-url="<?php echo U('Member/merchantProduct/product_log',array('id'=>$l[id]));?>">操作记录</a></li>
											<input type="hidden" name="id" value="<?php echo $l['id'];?>" />

											<!-- <li><a class="ch" href="#">活动结算</a></li>
											<li><a class="ch" href="#">审核订单</a></li>
											<li><a class="ch" href="#">操作记录</a></li> -->
										</ul>
									</td>
								</tr>

								<?php } ?>

							</tbody>

						</table>
						<div id="page" class="mt30 clear" style="margin:20px 20px;">
							<?php echo $v2_pages;?>
						</div>
						<br/><br/>
					</div>
				</div>
			</div>
			
		</div>
		
		      <?php include template('footer','common'); ?>

	</body>
</html>
<script type="text/javascript">
	function revocation(id,mod){
		if(confirm('您将要撤销这个活动，该操作不可逆转，您确定吗？')){
				$.ajax({
					url:'<?php echo U('Member/MerchantProduct/revocation');?>',
					type:'post',
					dataType:'json',
					data:{'id':id,'mod':mod},
					success:function(data){
						if(data.status == 1){
							art.dialog(data.info);
							location.reload();
						}else{
							art.dialog(data.info);
							loaction.reload();
						}
					}
				});
			}
	}
</script>