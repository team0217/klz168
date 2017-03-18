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
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/validate.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

	</head>
	<body>
		<script type="text/javascript">
			$(function(){
				$('#user_pass_box_form').validate({
					change: true,
					focus: function(data) {
						$(this).siblings('p').remove();
						$(this).after('<p class="hint suc">' + data + '<p>');
					},
					error: function(data) {
						$(this).siblings('p').remove();
						$(this).after('<p class="hint err">' + data + '<p>');
					},
					success: function(data) {
						$(this).siblings('p').remove();
						$(this).after('<p class="hint suc">' + data + '<p>');
					},
					null: function(data) {
						$(this).siblings('p').remove();
						$(this).after('<p class="hint err">' + data + '<p>');
					},
					status: function(status) {
						if(status){
							$(this).find('.submit').removeClass('dasied').removeAttr('disabled');

						}else{
							$(this).find('.submit').addClass('dasied').attr('disabled','disabled');
						}
					},
				});
			});
		</script>
				<?php include template('v2_header','member/common'); ?>

		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>修改密码</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
									<?php include template('v2_member_left','member/common'); ?>

				
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">修改密码</h2>
					
					<dl class="user_pass_box_form" id="user_pass_box_form">
						<form>
						
							<dt>请重设您的账号密码</dt>
							<dd class="clear">
								<label for="old_pass" class="fl">当前密码</label>
								<input type="password" validate="password" id="old_pass" name="oldpass" class="txt fl"/>
							</dd>
							<dd class="clear">
								<label for="new_pass" class="fl">新密码</label>
								<input type="password" id="new_pass" null="新密码不能为空" name="password" reg="[a-zA-Z0-9]{6,16}" focus="请输入新密码" error="新密码输入格式错误" success=" " validate="new_pass" class="txt fl"/>
							</dd>
							<dd class="clear">
								<label for="new_pass_repeat" class="fl">确认新密码</label>
								<input type="password" name="pwdconfirm" id="new_pass_repeat" null="确认密码不能为空" reg="[a-zA-Z0-9]{6,16}" mate="new_pass,确认密码与新密码不一致" focus="请输入确认密码" error="确认密码格式错误" success=" " validate="new_pass_repeat" class="txt fl"/>
							</dd>
							<dd class="clear" style="padding-left:147px;">
								<input type="button"  value="提交"  id="js_submit" class="submit fl dasied" disabled="disabled"/>
							</dd>
						
						</form>
					</dl>
					
				</div>
			</div>

		</div>
		
							<?php include template('footer','common'); ?>

	</body>
</html>
<script type="text/javascript">
	$("#js_submit").click(function(){
		var oldpass = $("#old_pass").val();
		var password = $("#new_pass").val();
		var pwdconfirm = $("#new_pass_repeat").val();
		if (oldpass == '' || password == '' || pwdconfirm == '') {
			return false;
		};

		$.post("<?php echo U('Member/Profile/pwd');?>",{oldpass:oldpass,password:password,pwdconfirm:pwdconfirm},function(data){
						if (data.status == 1) {
							art.dialog({
							lock: true,
							fixed: true,
							icon: 'face-smile',
							title: '提示',
							content: data.info,
							okVal: '确定',
							ok:function() { 
								location.href=data.url;
							}
						});

						}else{
							art.dialog({
							lock: true,
							fixed: true,
							icon: 'face-sad',
							title: '错误提示',
							content: data.info,
							ok: true
						});

							};
											
					},'json');
							});
	
</script>