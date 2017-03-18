<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>活动管理-商家个人中心-缴纳追加库存担保金-<?php echo C('WEBNAME');?></title>
	<meta name="keywords" content="活动管理,商家个人中心,缴纳追加库存担保金,<?php echo C('WEBNAME');?>" />
	<meta name="description" content="活动管理,商家个人中心,缴纳追加库存担保金,<?php echo C('WEBNAME');?>" />
	<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
	<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/release_shop.css" /> 

	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/plugins/iframeTools.js"></script>

	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/order.js"></script>

	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/activity.js"></script>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/task.js"></script>

</head>
<body>
	<?php include template('v2_merchant_header','member/common'); ?>
	<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b>活动追加</b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php include template('v2_merchant_left','member/common'); ?>
			<div class="fr u_index_mess user_pd_1">

				<h2 class="user_page_title">活动追加</h2>
				<div class="user_code_box_1" style="text-align:left;">
					<p>1.您可以对正在进行中的活动进行商品追加</p>
					<p>2.追加付款成功之后,需等待后台管理员审核。</p>
					<p>3.上一次追加未审核通过之前,您不能再次追加！</p>

				</div>
				<table class="table">
					<thead>
						<tr class="t_t_bg">
							<th class="t_w_1 tc">商品名称</th>
							<th class="t_w_2 tc">当前状态</th>
							<th class="t_w_2 tc">下单价<?php if($proInfo['mod']=='trial') { ?>/红包<?php } ?>(元)</th>
							<th class="t_w_3 tc">平台损耗费（元）</th>
							<th class="t_w_4 tc">数量</th>
							<th class="t_w_5 tc">合计（元）</th>
						</tr>
					</thead>
					<tbody id="test">
						<tr>
							<td class="t_w_1 tc">
								<img src="<?php echo $proInfo['thumb'];?>" alt="<?php echo $proInfo['title'];?>" width="60" height="40"/>
								<a href="<?php echo $proInfo['url'];?>" target="_blank" class="link_color"><?php echo str_cut($proInfo['title'],30);?></a>
							</td>
							<td class="t_w_2 tc"><?php echo $this->activity_status[$proInfo['status']]?></td>
							<td class="t_w_2 tc">
								<?php echo $proInfo['goods_price'];?><?php if($proInfo['mod']=='trial') { ?>/<?php echo $proInfo['goods_bonus'];?><?php } ?>
							</td>
							<td class="t_w_3 tc">
								<?php if($proInfo['mod']=='rebate') { ?>
							<?php echo $proInfo['goods_price']*$proInfo['goods_service']/100?>/单笔
						<?php } else { ?>
							<?php echo $proInfo['goods_service'];?>/
							<?php if($proInfo['goods_charge_way']) { ?>单场<?php } else { ?>单份<?php } ?>
						<?php } ?>
							</td>
							<td class="t_w_4 tc"><?php echo $proInfo['goods_number'];?></td>
							<td class="t_w_5 tc"><?php echo $proInfo['goods_deposit'];?></td>
						</tr>
						<tr>
							<td class="t_w_1 tc">追加库存</td>
							<td class="t_w_2 tc">待支付...</td>
							<td class="t_w_2 tc">
								<?php echo $proInfo['goods_price'];?><?php if($proInfo['mod']=='trial') { ?>/<?php echo $proInfo['goods_bonus'];?><?php } ?>
							</td>
							<td class="t_w_3 tc">
								<?php if($proInfo['mod']=='rebate') { ?>
							<?php echo $proInfo['goods_price']*$proInfo['goods_service']/100?>/单笔
						<?php } else { ?>
							<?php echo $proInfo['goods_service'];?>/
							<?php if($proInfo['goods_charge_way']) { ?>单场<?php } else { ?>单份<?php } ?>
						<?php } ?>
							</td>
							<td class="t_w_4 tc"><?php echo $records['com_number'];?></td>
							<td class="t_w_5 tc"><?php echo $records['com_total_fee'];?></td>
						</tr>
					</tbody>
				</table>
				<p class="r_hint">
					<?php if($proInfo['mod']=='rebate') { ?>
						平台损耗费=下单价×<?php echo $proInfo['goods_service'];?>%
					<?php } ?>
					<font> （注：每次计算结果只取小数点后两位，不四舍五入）</font>
					总计：<span class="all_sum"><?php echo $records['com_total_fee'];?></span>元
					<a href="javascript:;" class="btn">确定支付</a>
				</p>
				<p class="r_state">说明：担保金款项部分作为本次活动返还给购买者的折扣款项，另一部分在活动中逐笔退还到您的会员中心；平台损耗费
				为<?php echo C('WEBNAME');?>成交的笔数逐笔收取；其余未售出商品担保金及平台损耗费，将在活动结束后退还到您的互联支付账号。
				</p>
			</div>
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function(){
	//点击确认按钮
	$(".btn").click(function(){
		artDialog({
			title:'提示',
			icon: 'question',
			fixed: true,
			lock: true,
			okVal : '确定支付',
			content:'您确认支付？该操作不可逆转，你确定吗？',
			ok : function(){
				$.ajax({
					url:'<?php echo U('Member/MerchantProduct/push_bailbond');?>',
					type:'post',
					dataType:'json',
					data:{'pid':"<?php echo $proInfo['id'];?>"},
					success:function(data){
						if(data.status == 1){
							location.href = "<?php echo U('Member/MerchantProduct/push_check');?>";
						}else{
							artDialog({
								title:'提示',
								icon: 'warning',
								fixed: true,
								lock: true,
								okVal : '去充值',
								content:data.info,
								ok : function(){
									window.open('<?php echo U('Pay/Index/pay',array('userid'=>$this->userid));?>');
								},
								cancel:true
							});
						}
					}
				});
			},
			cancel:true
		});				
	});
});
</script>
<?php include template('footer','common'); ?>