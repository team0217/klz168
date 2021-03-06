<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户注册</title>
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	</head>
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
	</style>

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

						<li class="u_e <?php if(ACTION_NAME == 'userregister') { ?> active<?php } ?>"><a href="<?php if(in_array($_GET['modelid'],$settings['setting_register_v2_email'])) { ?><?php echo U('Member/Index/userregister',array('modelid'=>$_GET['modelid']));?><?php } else { ?>javascript:;<?php } ?>" data-id='1'><b></b>邮箱注册</a></li>

						<li class="u_p <?php if(ACTION_NAME == 'v2_register_phone') { ?> active<?php } ?>"><a href="<?php if(in_array($_GET['modelid'],$settings['setting_register_v2_phone'])) { ?><?php echo U('Member/Index/v2_register_phone',array('modelid'=>$_GET['modelid']));?><?php } else { ?>javascript:;<?php } ?>" data-id='2'><b></b>手机注册</a></li>
                       
					</ul>

					<div class="u_tab_list">
						<ul class="box">
							<form  class="yz" id="myform">
								<input type="hidden" id="modelid" name="modelid" value="<?php echo $modelid;?>">
								<input type="hidden" id='agent_id' value="<?php echo $agent_id;?>"/>
								<li class="clear js_css">
									<strong>手机号码：</strong>
									<input type="text" id="phone" placeholder="请输入手机号码"/>
								</li>
								<li class="clear yzm js_css">
									<strong>验证码：</strong>
									<input type="text" class="kCode" id="sms" placeholder="请输入验证码"/>
									<input type="button" disabled class="button btn_s_2 dasied getverify" style="border:none;"  id='get_sns' value="获取短信验证码"/>
								</li>
								<li class="clear js_css">
									<strong>密码：</strong>
									<input type="password" id="password" placeholder="请输入密码"/>
								</li>
								<li class="clear js_css">
									<strong>确认密码：</strong>
									<input type="password" id="pwdconfirm" placeholder="请输入确认密码"/>
								</li>
								<li class="clear xy">
									<strong></strong>
									<span><input class="checkbox" checked="checked" type="checkbox" name="checkbox" id="check" value='1'/>我已阅读并同意<a href="javascript:;">《<?php echo C('WEBNAME');?>用户注册协议》</a></span>
								</li>
								<li class="clear btn">
									<strong></strong>
									<input type="button" class="btn_s" onclick="js_submit();" id="remove" value="立即注册"/>
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
$('#check').click(function(){
	var check = $("[name='checkbox']:checked").val();
	if (check == 1) {
		$('#remove').removeClass('dasied');
		$('#remove').removeAttr('disabled');

	}else{
		$('#remove').addClass('dasied');
		$('#remove').attr('disabled','disabled');


	};
});

function js_submit(){
	var phone = $.trim($('#phone').val());
	var modelid = $.trim($('#modelid').val());
	var agent_id = $.trim($('#agent_id').val());

	var sms = $.trim($('#sms').val());
	if (sms == '') {
		$('#sms').focus();
		return false;
	};
	if (phone == '') {
		$('#phone').focus();
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

	$.post("<?php echo U('Member/Index/v2_register_phone');?>",{phone:phone,password:password,sms:sms,pwdconfirm:pwdconfirm,modelid:modelid,agent_id:agent_id},function(data){
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

				};
								
		},'json');
	
}
$.formValidator.initConfig({
	formid:"myform",
	autotip:true,
	onerror:function(msg,obj){
		$(obj).focus();
	}
});

$("#phone").formValidator({
	empty:false,
	onempty:'手机号码不能为空',
	onshow:true,
	onfocus:'请输入您的手机号码（大陆地区）'
}).inputValidator({
	min:11,
	max:11,
	onerror:'手机号码只能为11位'
}).regexValidator({
	datatype:'enum',
	regexp:'mobile',
	onerror:'手机号码格式不正确'
}).ajaxValidator({
    url : "<?php echo U('public_checkphone_ajax');?>",
    datatype:'JSON',
    async:false,
    success:function(ret) {
        if(ret.status == 1) {
        	$('.getverify').addClass('btn_s');
        	$('.getverify').removeClass('dasied');
			$('.getverify').removeAttr('disabled');

            return true;
        } else {
        	$('.getverify').removeClass('btn_s');
        	$('.getverify').addClass('dasied');
			$('.getverify').attr('disabled','disabled');
            return false;
        }
    },
    onerror:'该手机已被占用'
});

var errmsg = '';
$("#sms").formValidator({
    empty:false,
    onshow:true,
    onfocus:'请输入手机短信验证码'
}).inputValidator({
   min:6,
   max:6,
   onerror:'验证码只能为6位'
}).ajaxValidator({
    url:"<?php echo U('public_check_sms');?>",
    datatype:'JSON',
    async:false,
    getdata:{mobile:'phone'},
    success:function(ret) {
        if(ret.status == 1) {
            return true;
        } else {
            return false;
        }
    },
    onerror:'手机短信验证码输入错误'
});

//获取手机短信验证码
var InterValObj;
var curCount = 60;
$(".getverify").click(function(){
  
    tou_submit();

    return false;

});

function set_sme(key){

	    var mobile = $("#phone").val();
	    var modelid = $('#modelid').val();
		$('.getverify').removeClass('btn_s');
		$('.getverify').addClass('dasied');
		$('.getverify').attr('disabled','disabled');
		$("#get_sns").val("正在发送..");  

	    if(mobile == '') {
	        $("#phone").focus();
	        return false;
	    }
	    
	    if($("getverify").hasClass('disabled') == false){
	    	$.getJSON("<?php echo U('v2_send_sms');?>", {mobile:mobile,modelid:modelid,key:key}, function(ret) {
			        if(ret.status == 1) {
			        	$("#get_sns").val("发送成功");  	
			          InterValObj = window.setInterval(SetRemainTime, 1000);
			        } else {
			            alert(ret.info);
			            return false;
			        }
		    });
	    }

}

function SetRemainTime() {

    if (curCount == 1) {
    	curCount = 60;          
        window.clearInterval(InterValObj);//停止计时器
        $("#get_sns").val("重发验证码").removeClass('disabled');  
    	$('.getverify').addClass('btn_s');
    	$('.getverify').removeClass('dasied');
		$('.getverify').removeAttr('disabled');

    }
    else {
        curCount--;
        $("#get_sns").val("" + curCount + "秒后重发").addClass('disabled');
        $('.getverify').removeClass('btn_s');
    	$('.getverify').addClass('dasied');
		$('.getverify').attr('disabled','disabled');

    }
}

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


</script>
 <script type='text/javascript' charset='utf-8' src='http://js.touclick.com/js.touclick?b=184ba28b-a241-4f29-8f8c-5b2968af0e79&pf=api&v=v2-2'></script>
 <script type="text/javascript">
        var is_checked = false; //表示是否验证成功
        function tou_submit()
        {
            if (is_checked === true)
            {
                return true;
            }
            else
            {
                window.TouClick.Start({
                    website_key: '184ba28b-a241-4f29-8f8c-5b2968af0e79',
                    position_code: 0,//位置标记(范围：10<position_code<100 ,如不在此范围内,则为0)
                    args: { 'this_form': this },//事件onInit、onLoading、onLoaded、onSuccess、onFail、onError 的共有第一参数
                    captcha_style: { 'margin-left': '-50px', 'margin-top': '-50px' },//设置验证码外框的css样式
                    onSuccess: function (args, check_obj)
                    {
                    	 //执行后台验证码发送请求
                        //check_obj = {'check_key':'','check_address':''} 二次验证口令check_key与二次验证地址check_address
                        is_checked = true;
                        //获取form对象
/*                      var this_form = args.this_form;
                        var hidden_input_key = document.createElement('input');
                        hidden_input_key.name = 'check_key';
                        hidden_input_key.value = check_obj.check_key;
                        hidden_input_key.type = 'hidden';
                        //将二次验证口令赋值到隐藏域
                        this_form.appendChild(hidden_input_key);
                        var hidden_input_address = document.createElement('input');
                        hidden_input_address.name = 'check_address';
                        hidden_input_address.value = check_obj.check_address;
                        hidden_input_address.type = 'hidden';
                        //将二次验证地址赋值到隐藏域
                        this_form.appendChild(hidden_input_address);
                        //再次执行 tou_submit 函数
                        this_form.submit();*/
                        $.post("/index.php?m=Member&c=Index&a=sms_appkey",{key:check_obj.check_key},function(data){
                                         
                                         if(data.status==1){
                                             set_sme(check_obj.check_key); 
                                         }					
                        					},'json');
                        


                    },
                    onError: function (args)
                    {
                        //启用备用方案
                    }
                });	
                return false;
            }
        }
    </script>