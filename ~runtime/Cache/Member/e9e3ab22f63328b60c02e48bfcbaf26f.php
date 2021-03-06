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
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/lyz.calendar.css" />

        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	</head>
	<body>
				
		
		<?php include template('v2_header','member/common'); ?>
		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>日赚任务</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
					<?php include template('v2_member_left','member/common'); ?>

				
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">日赚任务</h2>
					
					<table class="jf_tab jf_tab_2" width="100%">
						<thead>
							<tr>
								<th>完成时间</th>
								<th>任务名称</th>
								<th>任务佣金</th>
								<th>操作ip</th>
							</tr>
						</thead>
						<tbody class="border_none">
								<?php $n=1;if(is_array($task_log)) foreach($task_log AS $v) { ?>

							<tr>
								<td class="c_3"><?php echo dgmdate($v['start_time'],'Y年m月m日'); ?><span class="time"><?php echo dgmdate($v['start_time'],'H:i'); ?></span></td>
								<td class="jian"><?php echo $v['task']['title'];?></td>
								<td class="jia"><?php echo $v['task']['goods_price'];?></td>
								<td class="c_3"> <?php echo $v['clientip'];?></td>
							</tr>
						<?php $n++;}unset($n); ?>

							
						</tbody>
					</table>
					<div id="page" class="mt30 clear" style="margin-top:20px;">
							<?php echo $v2_pages;?>
							</span>
						</div>
				</div>
			</div>

		</div>
		
		<?php include template('footer','common'); ?>

	</body>
</html>