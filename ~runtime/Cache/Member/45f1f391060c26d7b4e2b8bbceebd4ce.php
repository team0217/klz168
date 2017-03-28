<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>会员中心-手机认证</title>
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
</head>
<body>

	<?php include template('v2_header','member/common'); ?>
	
	<style type="text/css" media="screen">
			#phone{ width:265px; }
			.w_1{ text-align:left; }
			.user_code_box_3 .hints {
			display: inline-block;
			margin: 5px 0;
			color: #fd0004;
			padding-left: 22px;
			}
		</style>
	<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b><?php if($userinfo['email_status'] != 1) { ?>手机验证<?php } else { ?>更改手机<?php } ?></b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php include template('v2_member_left','member/common'); ?>
			<div class="fr u_index_mess user_pd_1">
				<h2 class="user_page_title">手机验证</h2>
				<div class="user_code_box_1">
					<p>为了保护账号安全，需要验证身份</p>
					<p>点击获取验证码按钮，将会发送一条有验证信息发至您的手机</p>
					<p class="cc">
						<?php if($this->userinfo['phone']) { ?><?php echo substr_replace($this->userinfo['phone'],'***',3,5);?><?php } ?><?php if($this->userinfo['phone_status'] == 1) { ?>(已认证)<?php } ?>
					</p>
				</div>

				<div class="user_code_box_3">
					<p class="w_1 clear">
						<input type="text" class="txt fl" name="mobile"  id="phone" value=""/>
					</p>
					<p class="w_1">请输入<?php if($userinfo[phone_status] == 1) { ?>新<?php } ?>手机号码</p>
					<p class="w_1 clear">
						<input type="text" class="txt fl" id="verify" />
						<input type="button" onclick="getCode();"  id="sns" class="t_btn fr" value="发送验证码"/>
					</p>
					<p class="w_1">请输入您收到的验证码</p>
					<p class="hint" id="btnSendCode" >
						<!-- 您多次提交错误验证码，已被系统锁定，请在60分钟后重试 -->
					</p>
					<p class="bs_btn">
						<input  type="button" id="js_submit" value="确定"/>
					</p>
				</div>
			</div>
		</div>

		<script type="text/javascript">
				$('.tab_wrap li').on('click',function(){
					$(this).find('input').attr('checked','checked').parents('li').siblings('li').find('input').removeAttr('checked');
				});
				$('.tab_list a').on('click',function(){
					$(this).parents('li').addClass('active').siblings('li').removeClass('active').parents('.u_i_form').find('.tab_wrap .box').eq($(this).parents('li').index()).addClass('active').siblings('.box').removeClass('active');
				});
			</script>

	</div>
	<?php include template('footer','common'); ?>
</body>
</html>

<script type="text/javascript">
	 	var InterValObj; //timer变量，控制时间
	    var count = 60; //间隔函数，1秒执行
	    var curCount;//当前剩余秒数
	    var code = ""; //验证码
		function getCode(){
			curCount = count;
			var tel = $.trim($("#phone").val());
			if (tel == '') {
				$("#phone").focus();
				return false;
			};
			
			$.getJSON("<?php echo U('Member/Attesta/code');?>", {phone:tel}, function(ret) {
		        if(ret.status == 1) {
		        	$(".t_btn").val("请等待" + curCount+'秒' );
		        	$(".t_btn").removeAttr("style");
					$("#btnSendCode").html("请在" + curCount + "秒内再获取验证码");
					$(".t_btn").removeAttr("onclick");
					$(".btn").attr('style','display:none');			        
					InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
		        } else {
					$("#btnSendCode").html(ret.info);

		        }
		    });

		}


		$("#phone").blur(function(){ 
		 	$.get("<?php echo U('Member/Attesta/check_phone');?>",{phone:$.trim($("#phone").val())},function(data){
				if (data.status == 1) {
					$("#btnSendCode").removeClass('hint').addClass('hints');
					$("#btnSendCode").html('<font color="green">'+data.info+'</font>');
					$("#sns").removeAttr("disabled");
                    $("#sns").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});

				}else{
					$("#btnSendCode").html(data.info);
				}
			},'json');

		 });

		$("#js_submit").click(function(){
			var phone = $.trim($("#phone").val());
			if (phone == '') {
				$("#phone").focus();
				$("#btnSendCode").html('请输入手机号码');

				return false;
			};
			var newcode = $.trim($("#verify").val());
			if (newcode == '') {
				$("#verify").focus();
				return false;
			};
			$.post("<?php echo U('Member/Attesta/phone_attesta');?>",{mobile:phone,id_code:newcode},function(data){
				console.log(data);
				if (data.status == 0) {
					$("#btnSendCode").html(data.info);
				}else{
					art.dialog({
						lock: true,
						fixed: true,
						icon: 'face-smile',
						title: '提示',
						content: data.info,
						okVal: '确定',
						ok:function() { 
							location.href='<?php echo U('Member/Attesta/index');?>';
						}
					});
					
				};
			},'json')
		});

		function SetRemainTime() {
            if (curCount == 0) {                
                window.clearInterval(InterValObj);//停止计时器
                $(".t_btn").attr("onclick",'getCode();');
                $("#btnSendCode").html('');
                $("#sns").val("重新发送");
                $("#sns").removeAttr("disabled");
                $("#sns").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});



                code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
            }
            else {
                curCount--;
                $("#btnSendCode").html("请在" + curCount + "秒后再次获取验证码");
                $("#sns").val("请等待" + curCount+'秒' );
                $("#sns").removeAttr("style");
                $("#sns").attr("disabled", true);


            }
        }

        $("#sns").attr("disabled", true);





	</script>
<script type="text/javascript">

	$("#verify").on("input",function(evt){
	  if($(this).val().trim().length == 6){
	    
	    $("#js_submit").removeAttr("disabled");
	    $("#js_submit").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});
	  }else{
	  	$("#js_submit").removeAttr("style");
	    $("#sub").prop("disabled","disabled");
	  }
	});

</script>