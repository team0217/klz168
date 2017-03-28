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
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/activity.js"></script>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/task.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/order.js"></script>


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
						<h3 class="title">活动管理</h3>
						<p class="s_intro">日赚任务（<span class="cd"><?php echo $count;?></span>）</p>
						<form action="<?php echo __APP__;?>" method="get">
							<input type="hidden" name="m" value="<?php echo MODULE_NAME;?>" />
							<input type="hidden" name="c" value="<?php echo CONTROLLER_NAME;?>" />
							<input type="hidden" name="a" value="<?php echo ACTION_NAME;?>" />
							<input type="hidden" name="mod" value="<?php echo $mod;?>" />
					    	<p class="s_hd_status clear">
							<select name="task_state" class="fl">
								<option value="-99">任务状态</option>
							<?php $n=1; if(is_array($this->task_state)) foreach($this->task_state AS $key => $value) { ?>
							<option value="<?php echo $key;?>" <?php if($key == $task_state) { ?>selected<?php } ?>><?php echo $value;?></option>	
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
									<th>佣金</th>
									<th>份数</th>
									<th>申请人数</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>

								<?php $n=1;if(is_array($lists)) foreach($lists AS $l) { ?>
								
								<tr>
									<td>
										<div class="s_user_l_b clear">
											<div class="fl u_tx">
												<a href="<?php echo U('Task/Index/broke_show',array('id' =>$l['id']));?>" target="_blank"><img src="<?php echo $l['thumb'];?>" alt="" /></a>
												<p class="add_hd_bh">活动编号： <?php echo $l['id'];?></p>
											</div>
											<dl class="fl u_list">
												<dt><a href="<?php echo U('Task/Index/broke_show',array('id' =>$l['id']));?>" target="_blank"><?php echo $l['title'];?></a></dt>
												<!-- <dd>活动编号: <span><?php echo $l['id'];?></span></dd> -->
												<dd>开始时间：<span><?php echo dgmdate($l[start_time],'Y年m月d日 H:i');?></span></dd>
												<dd>(注：任务全部领取完成活动自动结束)</span></dd>
											</dl>
										</div>
									</td>
									<td>
										<ul>
											<li><?php echo C("TASK_STATUS.$l[status]");?></li>
<!-- 											<li>(结算中...)</li>
 -->										</ul>
									</td>
									<td>
										<ul>
											<li>￥<?php echo $l['goods_price'];?></li>
										</ul>
									</td>
									<td>
										<ul>
											<?php echo $l['goods_number'];?>
										</ul>
									</td>
									<td>
										<ul>
											<li>已申请:<span><?php echo $l['already_num'];?></span></li>
																					</ul>
									</td>
									<td>
										<ul class="btn">
											<?php if($l[status] == -3 ) { ?>
											<li><a class="ch"  href="<?php echo U('Member/merchantTask/task_edit',array('id'=>$l[id]));?>">编辑活动</a></li>
											<li><a class="ch"  href="<?php echo U('Member/merchantTask/task_price',array('id'=>$l[id]));?>">支付费用</a></li>										
											<?php } ?>


											<?php if($l['status'] == 1 || $l['status'] == 2) { ?>
												<li><a class="ch"   href="javascript:;" onclick="task.person_log(this)" data-id="<?php echo $l['id'];?>" data-url="<?php echo U('Member/MerchantTask/person_log');?>">用户记录</a></li>
											<?php } ?>
											<li><a class="ch"   href="javascript:;" onclick="task.log(this);" data-gid="<?php echo $l['id'];?>" data-url="<?php echo U('Member/merchantTask/task_log',array('id'=>$l[id]));?>">操作记录</a></li>
											<input type="hidden" name="id" value="<?php echo $l['id'];?>" />
										
										</ul>
									</td>
								</tr>

								<?php } ?>

							</tbody>

						</table>
						<div id="page" class="mt30 clear" style="margin:20px 20px;">
							<?php echo $v2_pages;?>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
		
		      <?php include template('footer','common'); ?>

	</body>
</html>