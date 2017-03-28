<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户登录-<?php echo C('WEBNAME');?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<style>
			#login-content .user-bg-img{ background:none; }
			#login-content .top li{ width:100%; text-align:left; text-indent:10px; font-size:20px; }
			#login-content .l-u-list .lu-box li.b input{ background:#ccc; }
			#login-content .l-u-list .lu-box li.b input.sub{ background:#fc6600; }
		</style>

		<script type="text/javascript">
			$(function(){
				$('#username,#pwd').on('input propertychange',function(){
					var user_reg = /^(1[3|4|5|7|8][0-9]\d{8}|([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+)$/;
					var u_s = user_reg.test($('#username').val());
					var status = $('#pwd').val() != '' && $('#pwd').val().length >= 6;
					if(u_s && status){
						$('#js_login').addClass('sub');
					}else{
						$('#js_login').removeClass('sub');
					}
				});
			});
		</script>

	</head>
	<body class="ui-bg-a">
		

		<div id="header" class="user-header clear">
			<div class="wrap-and clear">
				<div class="fl logo">
					<a href="<?php echo __APP__;?>"><img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /></a>
				</div>
				<h2 class="user-header-hint fl">欢迎登录</h2>
				
				<dl class="clear fr user-nav">
					<dt class="fl">欢迎光临<?php echo C('WEBNAME');?></dt>
					<dd class="fl"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes">在线客服</a></dd>
					<dd class="fl"><a href="<?php echo U('Member/Profile/index');?>">我的<?php echo C('WEBNAME');?></a></dd>
					<dd class="fl"><a href="<?php echo U('Member/EnterActivity/index');?>">卖家报名</a></dd>
					<dd class="fl"><a href="<?php echo U('document/index/lists',array('catid'=>2));?>">帮助中心</a></dd>
					<dd class="fl"><a href="<?php echo U('navigation/index/index');?>">网站导航</a></dd>
				</dl>
				
			</div>
		</div>
		
		<div id="login-content">
			
			<div class="wrap-and">
				
				<div class="user-bg-img">
					<img src="<?php echo THEME_STYLE_PATH;?>style/images/user-login-banner.gif"/>
				</div>
				
				<div class="login-wrap">
					<ul class="top">
						<li class="active"><a href="javascript:;"><b class="ico user"></b>用户登录</a></li>
						<!--<li><a href="javascript:;"><b class="ico shops"></b>商家登录</a></li>-->
					</ul>
					
					<div class="l-u-list">
						<div class="lu-box">
							<form acion="<?php echo U('Member/Index/login');?>" method="post">
								<ul>
									<li class="t">登录名：</li>
									<li class="i"><input type="text" class="s" placeholder="邮箱/手机号" name="username" value='<?php echo cookie('_username');?>' id="username" /></li>
									<li class="t">密码：</li>
									<li class="i"><input type="password" class="s" placeholder="请输入密码" name="password" id="pwd"/></li>
									<p class="user_verify" style="color:red;height:30px;line-height:30px;" style="display:none;"></p>	
									<li class="clear k">
										<span class="fl"><input type="checkbox" value='1' class="js_checkbox"/>记住登录名</span>
										<span class="fr"><a href="<?php echo U('Member/Index/forget');?>">忘记密码</a></span>
									</li>
									<li class="b">
										<input type="button" id="js_login" value="立即登录" />
									</li>					

									<li class="ic">
										<span class="fl qq-icon"><a href="<?php echo U('Oauth/Index/login');?>" target="_blank">QQ登录</a></span>
										<span class="fr cc"><a href="<?php echo U('Member/Index/register_index');?>">注册新账号</a></span>
									</li>
								</ul>
							</form>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		<div style="height:110px;"></div>
		<!-- / -->
		<?php include template('v2_register_footer','member/common'); ?>

		
	</body>
</html>
<script type="text/javascript">
$('#vCode_pic').bind('click',function(){
	$(this).attr('src',$("#vCode_pic").attr('src') + '&t=' + Math.random());
});

$('input[name=password]').keydown(function(e){
	if(e.keyCode==13) dologin();
})

$("#js_login").click(function() {
	dologin();
});

function dologin () {
	var name = $.trim($('#username').val());
	var pwd = $.trim($('#pwd').val());
	var remember  = $('.js_checkbox:checked').val();
	if (name.length == 0) {
		$("#username").focus();
		$(".user_verify").html('请输入用户名/邮箱/手机').show();
		return false;
	}

     $('#js_login').attr("disabled", "disabled").removeClass('sub').val('正在登录中...');

	$.post("<?php echo U('Member/Index/login');?>",{
		username:name,
		password:pwd,
		remember :remember ,
		refresh:'<?php echo $refresh;?>'
	},function(data){
		if (data.status == 1) {
			location.href = data.url;
		}else{
			$('#js_login').removeAttr("disabled").val('重新登录');
			$(".user_verify").show();
			$(".user_verify").html(data.info);
		};
		
	},"json");
}
$(function(){
	$("#username,#pwd").keyup(function(){
		$(".user_verify").hide();
	});
	
	// 邮箱提示
	$("#username").keyup(function(event){
		if(event.keyCode != 38 && event.keyCode != 40 && event.keyCode != 13){
			var mail_val = $(this).val();
			if($.trim(mail_val) != "" && $.trim(mail_val).match(/^@/) == null){
				$(".mail_lists").show();
				$(".mail_lists li").addClass("db");
				$(".mail_lists li").removeClass("mail_active");
				$(".mail_lists li").eq(0).addClass("mail_active");
				if($.trim(this.value).match("@") == null){
					$(".mail_prefix").text(mail_val);
				}
				else{
					var sub_mail_val = new Array();
					sub_mail_val = mail_val.split("@");
					$(".mail_prefix").text(sub_mail_val[0]);
					var sub_mail_val_len = sub_mail_val[0].length;
					if(mail_val.length > sub_mail_val_len + 1){
						var _sub_mail_val = sub_mail_val[1];
						$(".mail_suffix").each(function(){
							var mail_suffix_text = $(this).text();
							if(mail_suffix_text.match(_sub_mail_val) != null && mail_suffix_text.indexOf(_sub_mail_val) == 0){
								$(this).parent().addClass("db");
								$(".mail_lists li").removeClass("mail_active");
								$(".mail_lists .db").eq(0).addClass("mail_active");
								if(_sub_mail_val.length >= mail_suffix_text.length){
									$(this).parent().removeClass("db mail_active");
				                }
							}
							else{
								$(this).parent().removeClass("db mail_active");
							}
						});
					}
					else{
						$(".mail_lists li").addClass("db");
						$(".mail_lists li").removeClass("mail_active");
						$(".mail_lists li").eq(0).addClass("mail_active");
					}
				}
			}
			else{
				$(".mail_lists").hide();
				$(".mail_lists li").removeClass("mail_active");
				$(".mail_lists li").removeClass("db");
			}
		}
					
		
	});
	
	$("#username").keydown(function(event){
		if(event.keyCode == 40){
			if($(".mail_active").nextAll().is(".db")){
				$(".mail_active").removeClass("mail_active").nextAll(".db").eq(0).addClass("mail_active");
			}
			else{
				$(".mail_lists .db").removeClass("mail_active");
				$(".mail_lists .db").eq(0).addClass("mail_active");
			}
			
		}
		
		if(event.keyCode == 38){
			if($(".mail_active").prevAll().is(".db")){
				$(".mail_active").removeClass("mail_active").prevAll(".db").eq(0).addClass("mail_active");
			}
			else{
				$(".mail_lists .db").removeClass("mail_active");
				$(".mail_lists .db:last").addClass("mail_active");
			}
		}

		if(event.keyCode == 13){
			//var mail_val = $(".mail_active").find(".mail_prefix").text() + "@" + $(".mail_active").find(".mail_suffix").text();
			//$(this).val(mail_val);
			$(".mail_lists").hide();
			$(".mail_lists li").removeClass("db mail_active");
		}
	});
	
	$(".mail_lists li").mouseover(function(){
		$(".mail_lists li").removeClass("mail_active");
		$(this).addClass("mail_active");
	});
	
	$(".mail_lists li").click(function(){
		var mail_val = $(this).find(".mail_prefix").text() + "@" + $(this).find(".mail_suffix").text();
		$("#username").val(mail_val);
		$(".mail_lists").hide();
		$(".mail_lists li").removeClass("db mail_active");
	});
	
	$(document).click(function(){
		$(".mail_lists").hide();
	});
});
</script>
<script type="text/javascript" src="/static/js/tool/tool.js"></script>
<script>
$(document).ready(function(){ 
	email_autocomplete("#username");
})
</script>