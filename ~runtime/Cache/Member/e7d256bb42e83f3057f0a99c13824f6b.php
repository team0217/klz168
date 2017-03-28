<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
		<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
		<meta name="description" content="<?php echo $SEO['description'];?>">
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>

	</head>
	<body>
				<?php include template('v2_header','member/common'); ?>

		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>积分明细</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
					<?php include template('v2_member_left','member/common'); ?>

				
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">积分明细</h2>
					<p class="wd_jf_dh">我的积分<span class="cc"><?php echo $userinfo['point'];?></span><a href="<?php echo U('Shop/Index/index');?>" target="_blank">兑换</a></p>
					<dl class="user_hd_jf">
						<dt>您可以通过以下方式获取积分：</dt>
						<dd>
							<ul class="list clear">
								<?php foreach ($task as $k => $v): ?>

								<li>
									<a href="<?php echo __ROOT__;?><?php echo $v['url'];?>" target="_blank">
										<span class="ico  <?php if($k == 0) { ?>sj <?php } elseif ($k == 1) { ?>yx<?php } elseif ($k == 2) { ?> sm<?php } elseif ($k == 3) { ?>integration_friend<?php } else { ?>qd<?php } ?>"></span>
										<dl>
											<dt><?php echo $v['task_name'];?></dt>
											<dd>获取<span class="cc"><?php echo $v['task_reward'];?></span><?php if($v['task_type'] == 'point') { ?>积分<?php } elseif ($v['task_type'] == 'money') { ?>元<?php } elseif ($v['task_type'] == 'exp') { ?>经验值<?php } ?></dd>
										</dl>
									</a>
								</li>
								<?php endforeach ?>

								<!-- <li>
									<a href="#">
										<span class="ico yx"></span>
										<dl>
											<dt>邮箱认证</dt>
											<dd>获取<span class="cc">2</span>积分</dd>
										</dl>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="ico sm"></span>
										<dl>
											<dt>实名认证</dt>
											<dd>获取<span class="cc">5</span>积分</dd>
										</dl>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="ico qd"></span>
										<dl>
											<dt>网站签到</dt>
											<dd>获取<span class="cc">3</span>积分</dd>
										</dl>
									</a>
								</li> -->
							</ul>
						</dd>
					</dl>
					
					<table class="jf_tab" width="100%">
						<thead>
							<tr>
								<th width="35%">创建时间</th>
								<th width="20%">收入/支出</th>
								<th width="45%">名称/备注</th>
							</tr>
						</thead>
						<tbody>
						<?php $n=1;if(is_array($point)) foreach($point AS $v) { ?>

							<tr>
								<td class="c_3"><?php echo dgmdate($v['dateline'],'Y年m月d日'); ?><span class="time"><?php echo dgmdate($v['dateline'],'H:i'); ?></span></td>
								<td <?php if($v[num] >0 ) { ?>class="jia"<?php } else { ?>class="jian"<?php } ?>><?php echo substr($v[num],0,-3);?></td>
								<td class="c_3"><?php echo $v['cause'];?></td>
							</tr>
						<?php $n++;}unset($n); ?>								

							<!-- <tr>
								<td class="c_3">2015年09月09日<span class="time">21:14</span></td>
								<td class="jian">- ￥16.00</td>
								<td class="c_3">戴诗涵美人红沐浴露250ML全身美白保湿滋润</td>
							</tr>
							<tr>
								<td class="c_3">2015年09月09日<span class="time">21:14</span></td>
								<td class="jia">+ ￥16.00</td>
								<td class="c_3">戴诗涵美人红沐浴露250ML全身美白保湿滋润</td>
							</tr>
							<tr>
								<td class="c_3">2015年09月09日<span class="time">21:14</span></td>
								<td class="jian">- ￥16.00</td>
								<td class="c_3">戴诗涵美人红沐浴露250ML全身美白保湿滋润</td>
							</tr> -->
						</tbody>
					</table>
					<div id="page" class="mt30 clear" style="margin-top:20px;">
							<?php echo $v2_pages;?>
						</div>
				</div>
			</div>

		</div>
		
							<?php include template('footer','common'); ?>

	</body>
</html>