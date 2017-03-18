<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<script type="text/javascript" src="/templates/cloud3/style/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/integration_list.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
</head>
<body>
	<!-- 头部 start -->
	<?php include template('toper','common'); ?>
	<!-- logo和搜索部分 -->
	<?php include template('header','common'); ?>	<!-- 头部 end -->
	<!-- 主体内容 start -->
	<div class="main">
		<div class="main_box">
			<!-- 每日任务 start -->
			<div class="bgffffff wrap">
				<dl>
					<dt>每日签到</dt>
					<dd>
						<div class="fl">
							<div class="task-ico fl mr12 registration"></div>
							<div class="mt7 fl">
								<p class="f16"><?php echo $sign['task_name'];?></p>
								<p class="f14"><?php echo $sign['task_desc'];?></p>
							</div>
						</div>
						<div class="task-push fr">
							<?php if(! is_sign($userinfo['userid'])) { ?>
							<a onclick="signon()">立即签到</a>
							<?php } else { ?>
							<span>已签到</span>
							<?php } ?>
						</div>
						<div style="clear: both;"></div>
					</dd>
				</dl>
			</div>
			<!-- 每日任务 end -->
			<!-- 新手任务 start -->
			<div class="bgffffff wrap new-task">
				<dl>
					<dt>积分任务</dt>
					<?php $n=1;if(is_array($tasks)) foreach($tasks AS $task) { ?>
					<dd>
						<div class="fl">
							<div class="task-ico fl mr12 <?php echo $task['type'];?>"></div>
							<div class="mt7 fl">
								<p class="f16"><?php echo $task['task_name'];?></p>
								<p class="f14"><?php echo $task['task_desc'];?>  <span>奖励<?php echo $task['record'];?></span></p>
							</div>
						</div>
						<div class="task-push fr">
						<?php if($task[is_complete]) { ?>
							<span>已参与</span>							
						<?php } else { ?>
							<a href="<?php echo $task['url'];?>">立即参与</a>
						<?php } ?>
						</div>
						<div style="clear: both;"></div>
					</dd>
					<?php $n++;}unset($n); ?>
				</dl>
			</div>
			<!-- 新手任务 end -->
		</div>
	</div>
	<!-- 主体内容 end -->
	<!-- 底部 start -->
<script type="text/javascript">
		var sign = <?php echo $sign['task_reward'];?>;
		
		function signon(){
				console.log("1111");
				$.post("<?php echo U('Member/Sign/index');?>",function(data){

					if (site.user.length < 1) {	// 未登录
							member.login();
							return false;
						}

					console.log(data);
					if (data.status == 1) {
						art.dialog({
							lock: true,
							fixed: true,
							icon: 'face-smile',
							title: '提示',
							content: data.info + '，已获得' + sign + '积分',
							okVal: '确定',
							ok:function() { 
								location.reload();
							}
						});
					}
				},'json')
			};





</script>
<?php include template('footer','common'); ?>
<style type="text/css">
	.copy a img{ width: auto; height: auto; }
</style>