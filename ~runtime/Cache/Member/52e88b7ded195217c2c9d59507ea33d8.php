<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
		<meta name="Keywords" content="<?php echo $seo['keywords'];?>" />
		<meta name="Description" content="<?php echo $seo['description'];?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />

		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src='<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default'></script>
		<script type="text/javascript" src='<?php echo THEME_STYLE_PATH;?>style/js/order.js'></script>	</head>
	<body>
		
		<script type="text/javascript">
		<?php $userinfo = is_login();?>
		var order_data = {
		    <?php $n=1;if(is_array($orders)) foreach($orders AS $r) { ?>
		    <?php if($n > 1) { ?>,<?php } ?>
		    <?php echo $r['id'];?>:{
		        "oid":"<?php echo $r['id'];?>",
		        "gid":"<?php echo $r['goods_id'];?>",
		        "title":"<?php echo $r['product_info']['title'];?>",
		        "url":"<?php echo $r['product_info']['goods_url'];?>",
		        "userid":"<?php echo $this->userid;?>",
		        "modelid":"<?php echo $userinfo['modelid'];?>",
		        "price":"<?php echo $r['product_info']['goods_price'];?>",
		        "end_time" : "<?php echo $r['create_time']+C('buyer_write_order_time')*60?>",
		    }
		    <?php $n++;}unset($n); ?>
		};
</script>
		  <?php include template('v2_merchant_header','member/common'); ?>

		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>申诉管理</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				
								<?php include template('v2_merchant_left','member/common'); ?>

				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">申诉管理</h2>
					<!-- 正文 -->
					<ul class="sy_list_btn clear">
					<li <?php if($state==-1) { ?> class="active"<?php } ?>><a href="<?php echo U('appeal_manage', array('state' => -1));?>">所有申诉(<span><?php echo appeal_count($this->userid,$this->userinfo['modelid'],-1);?></span>)</a>
					<li <?php if($state==0) { ?> class="active"<?php } ?>>	<a href="<?php echo U('appeal_manage', array('state' => 0));?>" >待商家处理(<span><?php echo appeal_count($this->userid,$this->userinfo['modelid'],0);?></span>)</a>
					<li <?php if($state==1) { ?> class="active"<?php } ?>> 	<a href="<?php echo U('appeal_manage', array('state' => 1));?>">待平台仲裁(<span><?php echo appeal_count($this->userid,$this->userinfo['modelid'],1);?></span>)</a>
					<li <?php if($state==2) { ?> class="active"<?php } ?>> 	<a href="<?php echo U('appeal_manage', array('state' => 2));?>">仲裁完毕(<span><?php echo appeal_count($this->userid,$this->userinfo['modelid'],2);?></span>)</a>
						
					</ul>
					
					<div class="jt_fx_wrap clear">


					<table class="jf_tab jf_tab_2" width="100%">
						<thead>
							<tr>
							<th>商品标题</th>
							<th>申诉时间</th>
							<th>申诉类型</th>
							<th>申诉人</th>
							<th>状态</th>
							<th>操作</th>
							</tr>
						</thead>
						<tbody class="border_none">
					
							<?php $n=1;if(is_array($appeals)) foreach($appeals AS $appeal) { ?>
							<tr>
								<td class="c_3"><?php echo str_cut($appeal['goods']['title'],39);?></td>
								<td class="c_3"><?php echo dgmdate($appeal['buyer_time'],'Y年m月d日');?><span class="time"><?php echo dgmdate($appeal['buyer_time'],'H:i');?></span></td>
								<td class="jian"><?php echo $appealtypes[$appeal['appeal_type']];?></td>
								<td class="c_3"> <?php echo $appeal['username'];?></td>
								<td class="jia"><?php echo $appealstatus[$appeal['appeal_status']];?></td>
								<td class="c_3">
									<a href="javascript:;" onclick="order.view_appeal(<?php echo $appeal['id'];?>,'<?php echo U('Member/Appeal/read');?>',<?php echo $userinfo['modelid'];?>,<?php echo $appeal['appeal_status'];?>)"><span>查看申诉</span></a>
									<a href="javascript:;" onclick="order.view_log(<?php echo $appeal['order_id'];?>);"><span>操作记录</span></a>
								</td>

							</tr>
							<?php $n++;}unset($n); ?>
						
							
						
						</tbody>
					</table>
					<div id="page" class="mt30 clear" style="margin-top:20px;">
							<?php echo $v2_pages;?>							
						</div>
					</div>

					

					
				</div>
			</div>

		</div>
		
						<?php include template('footer','common'); ?>

	</body>
</html>