<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户注册--<?php echo C('WEBNAME');?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>




	</head>
	<body class="ui-bg-a">
			<?php include template('v2_register_header','member/common'); ?>

		
		<div id="zc-content">
			<div class="wrap">
				<div class="zc-top">
					<div class="tab-title clear">
						<a href="javascript:;" class="fl js_btn <?php if($modelid == 1) { ?> active <?php } ?>" data-id='1' >用户注册</a>
						<a href="javascript:;" class="fr js_btn <?php if($modelid == 2) { ?> active <?php } ?>" data-id='2'>商家注册</a>

						<script type="text/javascript">
							$('.js_btn').click(function(){
								var modelid = $(this).attr('data-id');
								$.post("<?php echo U('Member/Index/public_ajax_check');?>",{modelid:modelid},function(data){
									if (data.status == 1) {
										location.href=data.url;
									}else{
										
										location.href=data.url;
										

										};
														
								},'json');
							});
							

					</script>
					</div>
					<p class="zc-title">
						已有账号，立即<a href="<?php echo U('Member/Index/login');?>">登录</a>
					</p>
				</div>
				
				<ul class="zc-lc">
					<li class="li1 active">填写账户信息<b></b></li>
					<li class="li2">验证身份信息<b></b></li>
					<li class="li3">注册成功<b></b></li>
					<li class="linear"></li>
				</ul>
				
				<div class="user_l_c" style="">
					
					<ul class="u_tab clear">
						<li class="u_e active"><a href="<?php if(in_array($modelid,$settings['setting_register_v2_email'])) { ?><?php echo U('Member/Index/userregister',array('modelid'=>$modelid));?><?php } else { ?>javascript:;<?php } ?>" data-id='1'><b></b>邮箱注册</a></li>
						<li class="u_p "><a href="<?php if(in_array($modelid,$settings['setting_register_v2_phone'])) { ?><?php echo U('Member/Index/v2_register_phone',array('modelid'=>$modelid));?><?php } else { ?>javascript:;<?php } ?>" data-id='2'><b></b>手机注册</a></li>
					</ul>

	<style type="text/css" media="screen">
	.u_tab_list .js_css div {
		width: 100%;
		float: left;
		padding-left: 122px;
		font-size: 12px;
		height: 30px;
		line-height: 30px;
	}

	.u_tab_list .js_css .onError{
		color:red;
	}
	.u_tab_list .js_css .onFocus{
		color:green;
	}
	.u_tab_list .js_css .onCorrect{
		color:green;
	}
	.ui-menu-item a.ui-state-focus {
	background:url(/static/js/jq-ui/img/ui_header_bg.png);
}
	</style>

					
					<div class="u_tab_list">
						<ul class="box">
							<form  class="yz" id="myform">
								<input type="hidden" id="modelid" name="modelid" value="<?php echo $modelid;?>">
								<input type="hidden" id='agent_id' value="<?php echo $agent_id;?>"/>


								<li class="clear js_css">
									<strong>邮箱：</strong>
									<input type="text" id="email" placeholder="请输入邮箱" name="email"/>
								</li>
								<li class="clear js_css">
									<strong>密码：</strong>
									<input type="password"  placeholder="请输入密码"  id="password"/>
								</li>
								<li class="clear js_css">
									<strong>确认密码：</strong>
									<input type="password" placeholder="请输入确认密码" id="pwdconfirm"/>
								</li>
								<li class="clear yzm js_css">
									<strong>验证码：</strong>
									<input type="text" class="kCode" placeholder="请输入验证码"  id="verify"/>
									<p class="fl img">
										<img src="<?php echo U('Api/Verify/create');?>" onclick="refresh_verify();" id="verify_img" style="cursor:pointer; "  />
									</p>
									<p class="fl txt">
										看不清？<a href="javascript:;" onclick="refresh_verify();">换一张</a>
									</p>
								</li>
								<li class="clear xy">
									<strong></strong>
									<span>
										<input class="checkbox" type="checkbox" checked="checked" name='checkbox' value="1" id="check"/>我已阅读并同意
										<a href="javascript:;">《注册协议》</a>
									</span>
								</li>
								<li class="clear btn">
									<strong></strong>
									<input type="button" class="btn_s " onclick="js_submit();" id="remove" value="立即注册" />
								</li>
								
							</form>
						</ul>
					</div>

					
					
				</div>
				
			</div>	
		</div>
			<?php include template('v2_register_footer','member/common'); ?>

		
		
		
	</body>
</html>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>

<script type="text/javascript" charset="utf-8">
/*$(function(){
	if ($('div').hasClass('onShow')) {
			$('.onShow').hide();

	}else{
		$('.onError').removeAttr('style');
		$('.onCorrect').removeAttr('style');
		$('.onFocus').removeAttr('style');


	};

});*/
$('#check').click(function(){
	var check = $("[name='checkbox']:checked").val();
	if (check == 1) {
		$('#remove').removeClass('dasied');
		$('#remove').removeAttr('disabled');

	}else{
		$('#remove').addClass('dasied');

	};
});

var email_chek = 1;


$.formValidator.initConfig({
	formid:"myform",
	autotip:true,
	onerror:function(msg,obj){
		$(obj).focus();
	}
});




$("#email").formValidator({
	empty:false,
	onempty:'电子邮箱不能为空',
	onshow:true,
	onfocus:'请填写您的电子邮箱'
}).inputValidator({
	min:1,
	onerror:'电子邮箱不能为空'
}).regexValidator({
	datatype:'enum',
	regexp:'email',
	onerror:'电子邮箱格式不正确'
}).ajaxValidator({
    url : "<?php echo U('public_checkemail_ajax');?>",
    datatype:'JSON',
    async:false,
    success:function(ret) {
        if(ret.status == 1) {
        	email_chek = 1;
            return true;
        } else {
            email_chek = 0;
            return false;
        }
    },
    onerror:'该Email已被占用'
});

$("#password").formValidator({
	empty:false,
	onempty:'登录密码不能为空',
	onshow:true,
	onfocus:'6-20个字符，请使用字母数字加上下划线组合密码。'
}).inputValidator({
	min:6,
	max:20,
	onerror:'登录密码必须为6-20个字符'
});

$("#pwdconfirm").formValidator({
	empty:false,
	onempty:'确认密码不能为空',
	onshow:true,
	onfocus:'请再次确认登录密码'
}).inputValidator({
	min:6,
	max:20,
	onerror:'确认密码必须为6-20个字符'
}).compareValidator({
	desid:'password',
	onerror:'确认密码输入不一致'
});


$("#verify").formValidator({
	empty:false,
	onempty:'验证码不能为空',
	onshow:true,
	onfocus:'请输入验证码'
}).inputValidator({
	min:4,
	max:4,
	onerror:'验证码只能为4位'
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
    onerror:'验证码输入错误'
});

/* 刷新图形验证码 */
function refresh_verify() {
	$("img#verify_img").attr('src', 'index.php?m=api&c=verify&a=create&_t=' + Math.random());
}

function js_submit(){
	var email = $.trim($('#email').val());
	var modelid = $.trim($('#modelid').val());
	var agent_id = $.trim($('#agent_id').val());
	if (email == '' || email_chek == 0) {
		$('#email').focus();
		return false;
	};

	var password = $.trim($('#password').val());
	if (password == '') {
		$('#password').focus();
		return false;
	};
	var pwdconfirm = $.trim($('#pwdconfirm').val());
	if (pwdconfirm == '') {
		$('#pwdconfirm').focus();
		return false;
	};

	var verify = $.trim($('#verify').val());
	if (verify == '') {
		$('#verify').focus();
		return false;
	};

	var check = $("[name='checkbox']:checked").val();
	if (check != 1) {
		art.dialog({
				lock: true,
				fixed: true,
				icon: 'face-sad',
				title: '错误提示',
				content: '请勾选用户协议',
				ok: true
			});
	};

$('#remove').attr("disabled", "disabled").removeClass('btn_s').val('正在提交...');
$.post("<?php echo U('Member/Index/userregister');?>",{email:email,password:password,verify:verify,pwdconfirm:pwdconfirm,modelid:modelid,agent_id:agent_id},function(data){
			if (data.status == 1) {
				location.href=data.url;
			}else{
				art.dialog({
				lock: true,
				fixed: true,
				icon: 'face-sad',
				title: '错误提示',
				content: data.info,
				ok: true

			});
				$('#remove').addClass('btn_s').removeAttr("disabled").val('立即注册');
				};
								
		},'json');
	
}

</script>
<script type="text/javascript" src="/static/js/tool/tool.js"></script>
<script>
$(document).ready(function(){ 
	email_autocomplete("#email");
})
</script>