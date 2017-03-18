<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
#header .logo img{ width:auto; height:52px; position:relative; top:50% !important; margin-top:-26px; }
.onCorrect{ color: green;}
.onError{ color: red;}
#usernameTip{ padding-left: 100px;}
#verifyTip{ padding-left: 100px;}

</style>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
		<meta name="Keywords" content="<?php echo $SEO['keyword'];?>" />
		<meta name="Description" content="<?php echo $SEO['description'];?>" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
				<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css" /> 

		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/find_password.css" /> 
	</head>

	
	<body>
					<?php include template('v2_register_header','member/common'); ?>

		
	<div class="content" style="overflow:hidden;width:100%;padding-bottom:30px;">			
			<div class="password_wrap">
				<ul class="at_present">
					<li class="at_bg">
						<p>1</p>
						<font>填写账户信息</font>
					</li>
					<li class="auto_bg">
						<p>2</p>
						<font>验证身份</font>
					</li>
					<li class="auto_bg">
						<p>3</p>
						<font>设置新密码</font>
					</li>
					<li class="auto_bg">
						<p>4</p>
						<font>完成</font>
					</li>
				</ul>
				<form action="<?php echo U('forget');?>" method="post" id="myform">
				<ul class="input_message">
					<li>
						<span>账户名：</span>
						<input type="text" id="username" name="username" placeholder="邮箱/已验证手机" class="set_w_input"/>
						<div style="clear: both;"></div>
					</li>
					<li>
						<span>验证码：</span>
						<input type="text" class="set_w_try" id="verify" name="verify"/>
						<img class="try_img_set" id="verify_img" src="<?php echo U('Api/Verify/create');?>" onclick="refresh_verify();" style="cursor:pointer; " alt="设置验证码" />
						<div style="clear: both;"></div>
					</li>
					<li><input type="submit" value="下一步" /></li>
				</ul>
			</form>
			</div>

		</div>


			<?php include template('v2_register_footer','member/common'); ?>
		<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
		<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
	<script type="text/javascript">
	/* 刷新图形验证码 */
		function refresh_verify() {
			$("#verify_img").attr('src', 'index.php?m=api&c=verify&a=create&_t=' + Math.random());
		}
		$(function(){
			$.formValidator.initConfig({
			formid:"myform",
			autotip:true,
			onerror:function(msg,obj){
				$(obj).focus();
			}
		});

		$("#username").formValidator({
		    empty:false,
		    onshow:true,
		    onfocus:'请输入账号'
		}).inputValidator({
			min:1,
			onerror:'账号不能为空'
		}).ajaxValidator({
		    url:"<?php echo U('check_exist_name');?>",
		    datatype:'JSON',
		    async:false,
		    success:function(ret) {
		        if(ret.status == 1) {
		            return true;
		        } else {
		            return false;
		        }
		    },
		    onerror:"该用户不存在"
		});


		$("#verify").formValidator({
			empty:false,
			onempty:'验证码不能为空',
			onshow:true,
			onfocus:'<p class="set-height">请输入验证码</p>'
		}).inputValidator({
			min:4,
			max:4,
			onerror:'<p class="set-height">验证码只能为4位</p>'
		}).ajaxValidator({
		    url : "<?php echo U('public_checkverify_ajax');?>",
		    datatype:'JSON',
		    async:false,
		    success:function(ret) {
		        if(ret.status == 1) {
		            return true;
		        } else {
		            return false;
		        }
		    },
		    onerror:'<p class="set-height">验证码输入错误</p>'
		});
		
		});
</script>