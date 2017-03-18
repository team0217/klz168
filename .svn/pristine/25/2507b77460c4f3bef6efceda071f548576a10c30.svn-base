<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>会员中心-邮箱认证</title>
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
</head>
<body>
	<?php include template('v2_header','member/common'); ?>
	<style type="text/css" media="screen">
			#email{ width:265px; }
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
				当前位置： <b>首页 ></b> <b><?php if($userinfo['email_status'] != 1) { ?>邮箱验证<?php } else { ?>更改邮箱<?php } ?></b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php include template('v2_member_left','member/common'); ?>
						<div class="fr u_index_mess user_pd_1">
							<h2 class="user_page_title"><?php if($userinfo['email_status'] != 1) { ?>邮箱验证<?php } else { ?>更改邮箱<?php } ?></h2>
							<div class="user_code_box_1">
								<p>为了保护账号安全，需要验证身份</p>
								<p>点击获取验证码按钮，将会发送一条有验证信至您的邮箱</p>
								<p>温馨提示：如果在收件箱当中没有找到,有可能是被系统拦截,可以在垃圾箱当中找找看看</p>

								<p class="cc">
									<?php if($userinfo['email']) { ?><?php echo substr_replace($userinfo['email'],'***',3,5);?><?php } ?><?php if($userinfo['email_status'] == 1) { ?>(已认证)<?php } ?>
								</p>
						</div>

						<div class="user_code_box_3">
							<p class="w_1 clear">
							   <?php if($userinfo['email_status'] == 1) { ?>
								<input type="text" class="txt fl" name="email"  id="email" value="" placeholder="<?php if($userinfo[email_status] == 1) { ?>新<?php } ?>邮箱账号"/>
							  <?php } ?>
							  <?php if($userinfo['email_status'] != 1) { ?>
							  <input type="text" class="txt fl" name="email"  id="email" value="<?php echo $userinfo['email'];?>" placeholder="邮箱账号"/>
			                  <?php } ?>

							</p>
							<p class="w_1" style="min-height:20px;"></p>
							<p class="w_1 clear">
								<input type="text"  placeholder="您的验证码 " class="txt fl" id="u_code" name="verify_code"/>
								<input type="button" id="sns"  onclick="getCode();" class="t_btn fr "   value="发送验证码"/>
							</p>

							<p class="hint" id="btnSendCode" >
								<!-- 您多次提交错误验证码，已被系统锁定，请在60分钟后重试 -->
							</p>
							<p class="bs_btn">
								<input  type="button" value="确定" disabled id="js_submit"/>
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
						var email = $.trim($("#email").val());
						var status = '<?php echo $userinfo['email_status'];?>';

						if (email == '') {
							$("#email").focus();
							return false;
						};
                        $.post("<?php echo U('Member/Attesta/verify');?>",{email:email},function(data){
                        	if (data.status == 1) {
                        		$("#btnSendCode").html("请在" + curCount + "秒内输入验证码");
                        		$(".t_btn").removeAttr("onclick");
                        		$(".btn").attr('style','display:none');

                        		InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                        	}else{
                        		$("#btnSendCode").html(data.info);
                        	}
                        },'json')

					}


				function check_email(email){
				 	$.get("<?php echo U('Member/Attesta/v2_check_email');?>",{email:email},function(data){
						if (data.status == 1) {
							$("#btnSendCode").removeClass('hint').addClass('hints');
							$("#btnSendCode").html('<font color="green">'+data.info+'</font>');
							$("#sns").removeAttr("disabled");
		                    $("#sns").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});

						}else{
							$("#btnSendCode").html(data.info);
							$("#sns").attr("disabled", true);
		       
						}
					},'json');

				}

					 //当前邮箱 
					var  oid_email = $('#email').val();

					if(oid_email != ''){

					  //验证邮箱
					  check_email(oid_email);					  

					}

                   


					 $("#email").blur(function(){ 

					 	if($("#email").val() == '') return false;

					 	$.get("<?php echo U('Member/Attesta/v2_check_email');?>",{email:$.trim($("#email").val())},function(data){
							if (data.status == 1) {
								$("#btnSendCode").removeClass('hint').addClass('hints');
								$("#btnSendCode").html('<font color="green">'+data.info+'</font>');
								$("#sns").removeAttr("disabled");
			                    $("#sns").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});

							}else{
								$("#btnSendCode").html(data.info);
								$("#sns").attr("disabled", true);
			       
							}
						},'json');

					 });

					$("#js_submit").click(function(){
						var status = '<?php echo $userinfo['email_status'];?>';
						var email = $.trim($("#email").val());
						if (email == '') {
							return false;
						};
						var newcode = $.trim($("#u_code").val());
						if (newcode == '') {
							$("#u_code").focus();
							return false;
						};
						$.post("<?php echo U('Member/Attesta/email_attesta');?>",{email:email,n_code:newcode},function(data){
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
			                $("#sns").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});


			                code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
			            }
			            else {
			                curCount--;
			                $("#btnSendCode").html("请在" + curCount + "秒内输入验证码");
			                $("#sns").removeAttr("onclick");
			                $("#sns").val("请等待" + curCount+'秒' );
			                $("#sns").removeAttr("style");

			            }
			        }

			        $("#sns").attr("disabled", true);

			        $("#u_code").on("input",function(evt){
			          if($(this).val().trim().length == 6){
			            
			            $("#js_submit").removeAttr("disabled");
			            $("#js_submit").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});
			          }else{
			          	$("#js_submit").removeAttr("style");
			            $("#sub").prop("disabled","disabled");
			          }
			        });
				</script>