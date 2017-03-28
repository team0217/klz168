<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo get_seo('rebate_show','show_rebate_title',$title);?></title>
<meta name="keywords" content="<?php echo get_seo('rebate_show','show_rebate_keyword',$title);?>">
<meta name="description" content="<?php echo get_seo('rebate_show','show_rebate_description',$title);?>">
<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/menu_gen_style.css" />
<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/shop_data_mess.css" />
<style type="text/css">
	.buy_flow .flow_text p font{ width: 85%; }
	.CPM_style { padding-bottom:20px;border:solid 1px #ddd; background:#fff; float:left; height:auto; position:fixed;font-size: 12px;}
.CPM_style textarea{font-size: 12px;}

.CPM_style .font > li{
	font-size: 12px;
}
body .cp-wrap .big_2 img{ width:100%; height:100%; }
.CPM_style .span > a { font-weight:700; display:block; float:left;  border-radius:3px; -webkit-border-radius:3px; -moz-border-radius:3px; color:#fff; padding:0 12px; height:28px; line-height:28px; font-size: 12px; }
.a_background1 { background:#ff6600; }
.a_background2 { background:#999999; }
.CPM_style > h2 { 
width:100%; height:33px;
border-radius-top-left:3px; -webkit-border-top-left-radius:3px; -moz-border-top-left-radius:3px;
border-radius-top-right:3px; -webkit-border-top-right-radius:3px; -moz-border-top-right-radius:3px;
line-height:33px; text-indent:10px; color:#fff; background:#ff6600; }
.CPM_style_1 { width:360px; }
.CPM_style_2 { width:590px; }
.f_bg_yes { background:url(../images/verify_btn1.png) no-repeat 0 center; }
.f_bg_no { background:url(../images/verify_btn2.png) no-repeat 0 center; }
.CPM_style .font { padding-top:20px;padding-bottom:20px;padding-left:35px; font-size:14px; margin:0 auto; line-height:36px; height:36px; }
.CPM_style .font_2 { font-size:14px; font-weight:700; font-family:"寰蒋闆呴粦"; color:#ff6600; }
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
.CPM_style .hint_text_2 p { height:30px; line-height:30px; color:#ff6600; font-size: 12px;}
.CPM_style .hint_text_2 li { height:20px; line-height:20px; }
.CPM_style .hint_text_2 li em { color:#ff6600; }
.CPM_style .hint_text_2 li a { color:#2bc4fe; }
.QR_code { width:134px; height:134px; display:block; margin:0px auto; border:solid 1px #ddd; padding:3px; }
.set_iss { margin-left:135px;margin-bottom:20px;font-size: 12px; }
.set_iss li {width:100%; height:22px; line-height:22px; margin:5px 0; }
.set_iss li input,.set_iss li img,.set_iss li font{ float:left; }
.set_iss li input { height:18px; line-height:18px; width:170px; }
.set_iss li img { width:30px; margin-top:-5px;}
.set_iss li a { margin-left:35px;display:block; width:60px; height:22px; text-align:center; border:solid 1px #2bc4fe; color:#2bc4fe; background:#e4ffff;border-radius:3px; -webkit-border-radius:3px; -moz-border-radius:3px;}
.iss_hint {text-align:center; width:100%;height:20px; line-height:20px; margin-bottom:20px; font-size: 12px; }
.iss_hint a { color:#2bc4fe; }
.CPM_style p a{
	font-size: 12px;
}
</style>

</head>
<script type='text/javascript'>
	<?php
	$goods = $rs;
	$goods['report_count'] = report_buyer_by_gid($id);//晒单
	$goods['buyer_count'] = buyer_count_by_gid($id);//抢到
	unset($rs['goods_content']);
	?>
	var goods = <?php echo json_encode($goods); ?> ;
	goods.goods_stock = goods.goods_number - goods.already_num;
	goods.buyer_good_buy_times = <?php echo C_READ('buyer_good_buy_times','rebate'); ?>
</script>
<style type="text/css">
  
body #header .logo img{ width:176px; height:52px; position:relative; top:50%; margin-top:-26px; }

</style>

<body>
	<?php include template('toper','common'); ?>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/goods.js"></script>
	<!-- logo和搜索部分 -->
	<?php include template('header','common'); ?>
	<script type="text/javascript">
		$(function() {
			$('.small:eq(0)').attr('src', $('.small_img li:eq(0) img').attr('src'));
			$('.small_img li:eq(0)').css({
				'opacity': '1',
				'border': 'solid 1px #ff6600'
			});
			$('.small_img li img').click(function() {
				var smallImgSrc = $(this).attr('src');
				$('.small_img li').css({
					'opacity': '0.5',
					'border': 'none'
				});
				$(this).parent().animate({
					opacity: '1'
				}, 300);
				$(this).parent().css({
					'border': 'solid 1px #f60'
				});
				$('.small:eq(0)').css({
					'opacity': '0'
				});
				$('.small:eq(0)').animate({
					opacity: '1'
				}, 300);
				$('.small:eq(0)').attr('src', smallImgSrc);
			});
		});
	</script>
		<div class="content">
			<div class="wrap">
				<p class="hint"><a href="<?php echo __APP__;?>">首页</a><font> > <?php echo catpos($catid, '', 'product',$mod);?> </font><?php echo $data['title'];?></p>
				<div class="shop_intro">
					<div class="shop_big_img">
						<img class="small" src="<?php echo $rs['thumb'];?>" alt="<?php echo $title;?>" /><!--  <?php if($rs[goods_albums]) { ?>
						<ul class="small_img">
							<?php $n=1; if(is_array($rs[goods_albums])) foreach($rs[goods_albums] AS $k => $album) { ?>
								<?php if($k < 4) { ?>
									<li><img src="<?php echo $album['url'];?>" alt="<?php echo $album['alt'];?>"/></li>
								<?php } ?>
							<?php $n++;}unset($n); ?>
						</ul>
						<?php } ?> -->
					</div>
					<div class="shop_text" id="shop_text">
						<h2 class="shop_name"><?php echo $title;?></h2>
						<ul class="aciivity_mess">
							<li>
								<span>活动时间</span>
								<font><?php echo dgmdate($start_time);?> - <?php echo dgmdate($end_time);?></font>
							</li>
							<li>
								<span>担保金</span>
								<font>商家已预存担保金<b><?php echo sprintf('%.2f', ($goods_price * $goods_number))?></b>元，请放心购买</font>
							</li>
						</ul>
						<!-- 判断图章 -->
						<ul class="shop_mess <?php if($type == 'search') { ?>search_try_out_img<?php } elseif ($type == 'ask') { ?>answer_try_out<?php } elseif ($type == 'qrcode') { ?>two_t_code_try_out_img<?php } ?>">
							<li class="set_color"><span>限量份数：<b><?php echo $goods_number;?></b>份</span><span>剩余份数：<b><?php echo $goods_number - $already_num?></b>份</span><!-- <a href="javascript:;" class="margin_btn" onclick="margin_dialog();">(补仓提醒)</a> -->
							</li>
							<li><span>下单价：<b><?php echo $goods_price;?></b>元</span><span>折扣：<b><?php echo $goods_discount;?></b>折</span><span>返还划算金：<b><?php echo sprintf('%.2f',$rs['goods_price']-$rs['goods_price'] * $rs['goods_discount']/10)?></b>元</span>
							</li>
						</ul>
						<ul class="cost_buy_btn">
							<p>
								<span><?php echo activitiy_price_name($mod);?>：<b>￥<em><?php echo sprintf('%.2f',price($id))?></em></b></span>
								<font>
									<a class="shop_buy_btn_off" href="javascript:;" onclick="page_detail.buy();" id="btn_buy">立即抢购</a>
									<i class="timeRemaining-cont"><font></font></i>
								<!--<strong class="shop_buy_btn_off">活动已结束</strong>-->
								</font>
							</p>
							<style type="text/css">
								body .bdsharebuttonbox{
									float:left;
									margin-top:-5px;
								}
							</style>
							<li>
								<a class="coll_shop" href="javascript:;" onclick="add_collect(<?php echo $id;?>);">收藏商品</a>
								<span class="share">
									<!-- 分享 -->
									<div class="bdsharebuttonbox" >
										<a href="#" class="bds_more" data-cmd="more"></a>
										<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
										<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
										<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
										<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
										<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
									</div>
									<script>
										window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
									</script>
								<!-- 分享 .end -->
								</span>
								<span class="set_color">浏览次数：<font><?php echo $hits;?></font> 次</span>
							</li>
						</ul>
					</div>
					<?php ?>
					<?php if((count($seller) > 0)) { ?>
					<div class="box_shops_message">
						<div class="shops_message">
							<!-- diamond_bg：钻石  common:普通   crown_bg:皇冠 -->
							<h4 <?php if($seller['groupid']==3) { ?>class="s_m_title crown_bg"<?php } elseif ($seller['groupid']==2) { ?>class="s_m_title diamond_bg"<?php } else { ?>class="s_m_title common"<?php } ?>class="s_m_title  diamond_bg">
								<p><?php echo C("webname");?><?php echo $seller['seller_type'];?></p>
							</h4>
							<span class="user_icon"><img src="<?php if($seller['store_logo']) { ?><?php echo $seller['store_logo'];?><?php } else { ?>/uploadfile/avatar/seller_logo.jpg<?php } ?>" alt="店铺：<?php echo substr_replace($seller['store_name'],'***','3','-3');?>" /></span>
							<ul class="vip_approve">
								<p><?php echo substr_replace($seller['store_name'],'***','3','-3');?></p>
								<li class="v_app_bg_01">质量检测合格</li>
								<?php if($seller['shop_attesta'] == 1) { ?>
									<li class="v_app_bg_02">店铺认证</li>
								<?php } ?>
								<?php if($seller['brand_attesta'] == 1) { ?>
									<li class="v_app_bg_03">品牌认证</li>
								<?php } ?>
							</ul>
						</div>
						<p class="shops_all_shop">
							<a href="../<?php echo __ROOT__;?>?m=search&keyword=<?php echo $seller['store_name'];?>&type=c" class="btn_style01" target="_blank">查看全部商品</a>
						</p>
						<?php if($seller['store_address']) { ?>
							<p class="shops_all_shop">
								<a href="<?php echo $goods_url;?>" target="_blank" class="btn_style02">去<?php echo shop_set($source,'name');?>看看</a>
							</p>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<div class="buy_flow">
					<h2 class="flow_title">抢购流程</h2>
					<div class="flow_text">
						<p class="set_width">
							<span>1</span>
							<font>
								<em>抢资格</em>
								<i>抢到购买资格</i>
							</font>
						</p>
						<p>
							<span>2</span>
							<font>
								<em>购买</em>
								<i>以活动下单价<b><?php echo $goods_price;?></b>到指定商家店铺购买</i>
							</font>
						</p>
						<p class="set_width">
							<span>3</span>
							<font>
								<em>订单号</em>
								<i>返回<?php echo C('webname');?>填写已付款订单号</i>
							</font>
						</p>
						<p class="bor_none">
							<span>4</span>
							<font>
								<em>返划算金</em>
								<i>商家审核后返还划算金<b><?php echo sprintf('%.2f',$rs['goods_price']-$rs['goods_price'] * $rs['goods_discount']/10)?></b>元</i>
							</font>
						</p>
					</div>
				</div>		
				<div class="acti_content arr_content">
					<ul class="title">
						<li class="li">商品详情</li>
					</ul>
					<ul class="acti_details">
						
						<?php if(array_filter($rs['goods_tips']['order_tip'])) { ?>
							<span>温馨提示：</span>
							<?php $n=1; if(is_array($rs['goods_tips']['order_tip'])) foreach($rs['goods_tips']['order_tip'] AS $k => $v) { ?>
								<li <?php if($k==0 ) { ?>class="li_margin" <?php } ?>>
									<?php if($rs['goods_tips']['order_tip'][$k] == 1) { ?>
									请不要使用淘金币下单
									<?php } ?>
									<?php if($rs['goods_tips']['order_tip'][$k] == 2) { ?>
									请不要催促商家返款
									<?php } ?>
									<?php if($rs['goods_tips']['order_tip'][$k] == 3) { ?>
									请不要使用手机下单
									<?php } ?>
									<?php if($rs['goods_tips']['order_tip'][$k] == 4) { ?>
									请不要使用店铺优惠券
									<?php } ?>
									
								</li>
							<?php $n++;}unset($n); ?>
						<?php } ?>
						<?php if(($rs['goods_tips']['goods_order']['kuaidi'])) { ?>
							<span>默认快递：</span>
							<li class="li_margin"><?php echo $rs['goods_tips']['goods_order']['kuaidi'];?></li>
						<?php } ?> 
						<?php if(($rs['goods_tips']['goods_order']['package'])) { ?>
							<span>套餐包含：</span>
							<li class="li_margin"><?php echo $rs['goods_tips']['goods_order']['package'];?></li>
						<?php } ?> 
						<?php if(($rs['goods_tips']['goods_order']['remark'])) { ?><span>拍下须知：
							</span>
							<li class="li_margin"><?php echo $rs['goods_tips']['goods_order']['remark'];?></li>
						<?php } ?>
					</ul>
					<div class="wrap_box" name="try_help_01" id="try_help_01">
						<span class="meau_chart_title">商品详情：</span> <?php echo $goods_content;?>
					</div>
					<script type="text/javascript">
						$(function(){
		                    $("p.buy_list_title a").click(function(){
		                        $("div.buy_list .buy_user").hide();
		                        var data_id = $(this).attr('data-id');
		                        $("div.buy_list .buy_user#"+data_id+"_list").show();
		                        $("p.buy_list_title a").removeClass('a_link');
		                        $(this).addClass('a_link');
		                    })
						});
					</script>
					<div class="buy_list">
						<p class="buy_list_title">
							<a data-id='who' class="a_link">谁抢到了（<em id="buyer_count">0</em>）</a>
							<a data-id='report'>买家晒单（<em id="report_count">0</em>）</a>  
						</p>
						<div class="buy_user" id="who_list">
							<?php require_once('E:\WWW\klz168.com/Application/Order\Taglib\order.class.php');$order_tag = new order();if(method_exists($order_tag, 'buyer_list')) {$data = $order_tag->buyer_list(array('goods_id'=>$id,'mod'=>'rebate','limit'=>'27',));} ?>
							<ul>
								<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
								<?php $userinfo = getuserinfo($r);?>
								<li><img src="<?php echo getavatar($r);?>" alt="<?php echo $userinfo['nickname'];?>"><p><?php echo $userinfo['nickname'];?></p></li>
								<?php $n++;}unset($n); ?>
							</ul>
							<?php if($goods['buyer_count'] > 27) { ?>
							<p class="load_more" id="buyer_list"><a href="javascript:;" onclick="page_detail.buyer_list();">加载更多&nu;</a></p>
							<?php } ?>
							
						</div>
						<div class="buy_user c_b_user" id="report_list" style="display:none;">
							<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'report_list')) {$data = $product_tag->report_list(array('goods_id'=>$id,'limit'=>'5',));} ?>
							<ul>
								<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
								<?php $userinfo = getuserinfo($r);?>
								<li><p class="set_buy_w01"><a href="javascript:;" class="buy_big_img"><img src="<?php echo $r['report_imgs'];?>"></a></p><p class="buy_small_img" id=""><a><img src="<?php echo getavatar($r);?>"></a><span><?php echo $userinfo['nickname'];?></span></p><p class="buy_time"><?php echo dgmdate($r['reporttime'],'Y年m月d日H时');?></p><span class="buy_text"><?php echo str_cut($r['content'],160);?></span></li>
								<?php $n++;}unset($n); ?>
							</ul>
							<?php if($goods['report_count'] > 5) { ?>							
							<p class="load_more" id="trail_report"><a href="javascript:;" onclick="page_detail.report_list();">加载更多&nu;</a></p>
							<?php } ?>
							
						</div>
					</div>				
				</div>
				<div class="user_hint">
					<h2 class="title">猜你喜欢</h2>
					<?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'lists')) {$data = $product_tag->lists(array('mod'=>'rebate','order'=>'id DESC','limit'=>'2',));} ?>
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<div class="box">
							<a href="<?php echo $r['url'];?>" class="box_img">
								<img src="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>"/>
							</a>
							<p class="box_title">
								<a href="<?php echo $r['url'];?>"><img src="<?php echo $r['source_img'];?>" alt="<?php echo $r['title'];?>" width="15px" height="15px"/><?php echo str_cut($r[title],54);?></a>
							</p>
							<p class="box_sum"><?php echo activitiy_price_name($r[mod]);?>：<span class="font_size"><b>￥</b>	<?php echo sprintf('%.2f',price($r[id]));?></span><span>￥<?php echo $r['goods_price'];?></span><a href="<?php echo $r['url'];?>" class="btn">立即抢购</a>
							</p>
						</div>
						<?php $n++;}unset($n); ?>
					
				</div>
			</div>
		</div>
		<style type="text/css" media="screen">
		.box_sum .btn{
			margin-top: -27px;
		}
			
		</style>
		<div class="clear"></div>
						<?php include template('footer','common'); ?>

<script type="text/javascript">
	page_detail.init();
</script>

<script type="text/javascript">
	 /* 加入收藏 */
	function add_collect(goods_id) {
		return $.getJSON("<?php echo U('member/collect/add');?>", {
			goods_id: goods_id
		}, function(ret) {
			if (ret.status == 1) {
				page_detail.succes(ret.info);
				return false;
			} else {
				page_detail.error(ret.info);
				return false;
			}
		});
	}
</script>