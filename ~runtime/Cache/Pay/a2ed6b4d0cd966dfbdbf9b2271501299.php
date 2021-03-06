<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户充值-<?php echo C('WEBNAME');?></title>
	<meta name="keywords" content="用户充值,<?php echo C('WEBNAME');?>" />
	<meta name="description" content="用户充值,<?php echo C('WEBNAME');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
	<link rel="stylesheet" href="/templates/cloud/style/css/shops_pay.css" />

	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

	<style>
	.right_title .a_link {
	    color: #009ee7;
	    border-bottom: solid 2px #30bbfe;
	    outline: none;
	}

	.right_title {
	    width: 780px;
	    height: 32px;
	    line-height: 32px;
	    font-size: 16px;
	}
	</style>
</head>
<body>
		<?php if($userinfo['modelid'] == 1) { ?>
		    <?php include template('v2_header','member/common'); ?>
			<?php } else { ?>
	        <?php include template('v2_merchant_header','member/common'); ?>
			<?php } ?>

    	<?php if($userinfo['modelid'] == 2) { ?>
	     <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
		<?php } ?>
	<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b>用户充值</b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php if($userinfo['modelid'] == 1) { ?>
			    <?php include template('v2_member_left','member/common'); ?>
				<?php } else { ?>
		        <?php include template('v2_merchant_left','member/common'); ?>
				<?php } ?>
			<script type="text/javascript">
					$(function(){
						$('#grade li').on('mouseover',function(){
							$(this).parents('#grade').find('li').removeClass('now');
							$(this).parents('#grade').find('li:lt('+($(this).index()+1)+')').addClass('now');
						});
					});
				</script>

			<div class="fr u_index_mess user_pd_1">

				<dl class="u_i_form">
					<dt>充值</dt>
					<h2 style="width: 780px;" class="right_title">
						<a href="javascript:;" class="a_link" >快速充值</a>
						<a href="javascript:;" >普通充值</a>
					</h2>
					<dd> <strong>可用金额：</strong>
						<span class="cc"><?php echo $minfo['money'];?>元</span>
					</dd>

					<div class="right_title_box">
						<form action="<?php echo U('Pay/Index/pay');?>" target="_blank" method="post" id="payform">

							<dd>

								<ul class="hint">
									<li>1.快速充值付款成功之后即时到账,如果没有到账,等待几分钟即可更新。</li>
									<li>2.快速充值支付平台会收取一定的手续费,请谅解！</li>
									<li>3.不同支付平台,收取手续费率不同。</li>
								</ul>
							</dd>
							<dd class="clear czje"> <strong class="fl">充值金额：</strong>
								<p class="fl">
									<input type="text" placeholder="输入充值金额" id="money" name="money"/>
									元
									<input type="hidden" name="total_money" id="total_money"/>
								</p>
							</dd>
							<dd>
							  <strong class="fl tab_list_ver">选择充值方式</strong>
								<ul class="tab_list clear">
								</ul>

							</dd>
							<dd>
								<div class="tab_wrap">
									<ul class="box clear active" id='pay_list'>
									<?php $n=1; if(is_array($pay_list)) foreach($pay_list AS $r => $v) { ?>
										<li>
											<input type="radio" value='<?php echo $v['pay_code'];?>' name="pay_code" <?php if($r == 0) { ?> checked="checked" <?php } ?> />
											<img src="<?php echo $v['logo'];?>" alt="<?php echo $v['name'];?>" />
										</li>
									<?php $n++;}unset($n); ?>

									</ul>
								</div>
							</dd>
							<dd>此操作为即时到账，请认真填写</dd>

							<span style="padding-left:0;background:none;color:red" id="set_note"></span>
							<dd id="jsdz">
								<input class="submit" type="submit" id="payform_submit" value="提交"/>
							</dd>
						</form>
					</div>

					<div class="right_title_box dn">
						<dd>
							<ul class="hint">
								<li>
									* 先去支付宝使用转账付款，将活动担保金转入&nbsp;&nbsp;
									<b><?php echo $alipay['alipay_account'];?></b>
									。
								</li>
								<li>* 然后输入您转账的交易号</li>
								<li>* 输入（本页面）充值金额且必须与（支付宝）转账金额一致，否则会付款失败！</li>
							</ul>
						</dd>
						<dd class="clear czje">
							<strong class="fl">充值金额：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<p class="fl">
								<input type="text" placeholder="输入充值金额" id="normal_money2" name="info[money]"/>
								元
								<span style="padding-left:0;background:none;margin-left:20px;" id="set_note"></span>
							</p>
						</dd>

						<dd class="clear czje">
							<strong class="fl">支付宝交易号：</strong>
							<p class="fl">
								<input style="width: 250px;" type="text" placeholder="输入支付宝成功的交易号" id="tran_number" name="info[tran_number]"/>
								<span style="padding-left:0;background:none;margin-left:20px;" id="set_note"></span>
							</p>
						</dd>

						<dd></dd>
						<dd>
							<div class="tab_wrap">
								<ul class="box clear active">
									<li>
										<input type="radio" name="zffs" checked="checked"/>
										<img src="<?php echo THEME_STYLE_PATH;?>style/images/user/zfb_ico.jpg" alt="" />
									</li>
								</ul>
							</div>
						</dd>
						<dd>提交成功之后,我们会在24小时审核。</dd>
						<dd>                                                                                           
							<input class="button1" disabled type="button" id="myform_submit" value="提交"/>
						</dd>

					</div>
				</dl>
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



function weixin_pay(){

    if($('#money').val() == ''){
        $('#money').focus();
    	return false;
    }


	$("#payform_submit").attr("disabled", true).addClass("button1").removeClass("submit").val('正在提交');

	var data ={
		 'money':$('#money').val(),
		 'pay_code':'Weixin',

	}

	$.getJSON("<?php echo U('Pay/Index/weixin_pay');?>",data,function(result){


		if(result['status'] ==1){
		  var html = '请使用微信手机端扫描以下二维码 <br/>';
		  html += '<div  style="text-align:center;"><img src='+result['src']+'> </div>';
		  html += '支付流程如下<br/>';
		  html += '1.打开手机微信app<br/>';
		  html += '2.点击右上角扫一扫 扫描以上二维码<br/>';
		  	art.dialog({
		  	lock: true,
		  	fixed: true,
		  	title: '提示',
		  	content: html,
			okVal:'完成付款',
			cancelVal:'返回重试',
			ok: function() {
				window.location.href = "<?php echo U('Member/Financial/pay_log', array('type' => 2));?>";
				return false;
			},
		  	cancel:function(){
		  		window.location.reload();
		  	}
		  });


		}else{
			  	art.dialog({
			  	lock: true,
			  	fixed: true,
			  	title: '失败提示',
			  	content:result.msg,
				cancelVal:'返回重试',
			  	cancel:function(){
			  		window.location.reload();
			  	}
			  });

	        
		}

	})	
}

</script>
<?php include template('footer','common'); ?>
<style type="text/css" media="screen">


	.u_index_mess .u_i_form .czje div {
	display: inline-block;
	margin-left: -36px;
	padding-left: 10px;
	}

	.u_index_mess .u_i_form .czje .onError{
		color:red;
		margin-left: 20px;

	}
	.u_index_mess .u_i_form .czje .onShow{
		  color:green;
		  margin-left: 20px;
	}
	.u_index_mess .u_i_form .czje .onCorrect{
		color:green;
		margin-left: 20px;

	}
	.u_index_mess .u_i_form .czje .onFocus{
       color:red;
       margin-left: 20px;
	}


    .button1 {
    width: 176px;
    height: 42px;
    line-height: 42px;
    border: none;
    /* background: #FF6C00; */
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    color: #fff;
     }
    }
	</style>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript">




    var sn_status =0;

	$('.right_title a').click(function(){							
		$(this).addClass('a_link').siblings('a').removeClass('a_link');
		$('.right_title_box').addClass('dn').eq($(this).index()).removeClass('dn');
	});


$.formValidator.initConfig({
	formid:"payform",
	autotip:true,
	validatorgroup:"1",
	buttons:"payform_submit",
	onerror:function(msg,obj){
		$(obj).focus();
		return false;
	},
	onsuccess:function() {
		paysubmit();
		return true;
	}
});

$("#money").formValidator({
	validatorgroup:"1",
	empty:false,
	onshow: true,
    onfocus: "请输入您要充值的金额！"
}).regexValidator({
	regexp:'intege1',
	datatype:'enum',
	onerror:'金额只能为正整数'
}).functionValidator({
	fun:function(val,elem){
		if(val){
			$.ajax({
				url:'<?php echo U('Pay/Index/check_money');?>',
				type:'get',
				dataType:'json',
				async: false,
				data:{'money':val},
				success : function(msg){
					//$("#quick").append('<p id="set_note"  style="display:block;color:#32CD32;padding-left:20px;margin-top:10px;">*当前手续费为(收取'+msg.fee+'%)：'+msg.pay_fee+'元;共需支付'+msg.total+'元</p>') ;
					$("#set_note").html('*当前手续费为(收取'+msg.fee+'%)：'+msg.pay_fee+'元;共需支付'+msg.total+'元');
					$("#moneyTip").hide();
					$("#total_money").val(msg.total);
				}
			});
		}
		return true;
	}
});


function paysubmit() {

	var dialog = art.dialog({
		id: 'paysubmit',
		title : '提示信息',
		icon: 'question',
		fixed: true,
		lock: true,
		content: '<p>请问您完成付款了吗?</p><p>如没有,请在新打开的页面进行付款的操作</p><p>如果遇到问题，请联系客服人员</p>',
		okVal:'完成付款',
		cancelVal:'返回重试',
		ok: function() {
			window.location.href = "<?php echo U('Member/Financial/pay_log', array('type' => 2));?>";
			return false;
		},
		cancel:function() {
			window.location.reload();
		}
	});
}

$("#money").formValidator({
	validatorgroup:"1",
	empty:false,
	onshow: true,
    onfocus: "请输入您要充值的金额！"
}).regexValidator({
	regexp:'intege1',
	datatype:'enum',
	onerror:'金额只能为正整数'
}).functionValidator({
	fun:function(val,elem){
        check_money(val);
		return true;
	}
});

var code = $('input[name="pay_code"]:checked').val();
if(code =='Weixin'){
	$('#jsdz').html('<input class="submit" id="payform_submit" type="button" onclick="weixin_pay()"  value="提交">');
}


/*计算充值手续费*/
function check_money(val){
	var code = $('input[name="pay_code"]:checked').val();

	console.log(code);
    /*当采用微信支付*/
    if(code =='Weixin'){
      $('#jsdz').html('<input class="submit" id="payform_submit" type="button" onclick="weixin_pay()"  value="提交">');
    }else{
       $('#jsdz').html('<input class="submit" type="submit" id="payform_submit" value="提交"/>');
    }


	if(val){
		$.ajax({
			url:'<?php echo U('Pay/Index/check_money');?>',
			type:'get',
			dataType:'json',
			async: false,
			data:{'money':val,'code':code},
			success : function(msg){
				$("#set_note").html('*当前支付平台收取手续费为(收取'+msg.fee+'%)：'+msg.pay_fee+'元;共需支付'+msg.total+'元');
				$("#moneyTip").hide();
				$("#total_money").val(msg.total);
			}
		});
	}

}

/* 选择支付平台之后 重新计算手续费*/

$('#pay_list li').click(function(){

    val = $('#money').val();
    check_money(val);

});







//正常充值
$.formValidator.initConfig({
	formid:"myform",
	validatorgroup:"2",
	autotip:true,
	onerror:function(msg,obj){
		$(obj).focus();
	}
});

$("#normal_money").formValidator({
	empty:false,
	validatorgroup:"2",
	onshow: true,
	onfocus: "请输入您要充值的金额！"
}).regexValidator({
	regexp:'decmal1',
	datatype:'enum',
	onerror:'输入的金额不可用'
});	 

$("#normal_money2").formValidator({
	empty:false,
	validatorgroup:"2",
	onshow: true,
	onfocus: "请输入您要充值的金额！"
}).regexValidator({
	regexp:'decmal1',
	datatype:'enum',
	onerror:'输入的金额不可用'
});	 

$("#tran_number").formValidator({
		empty:false,
	 	validatorgroup:"2",
	 	onshow: "请输入支付宝交易号",
	 	onfocus: "请输入支付宝交易号"
	}).regexValidator({
	 	regexp:'account',
	 	datatype:'enum',
	 	onerror:'支付宝交易号输入错误',
	}).ajaxValidator({
		    url:"<?php echo U('pay/index/check_trade');?>",
		    datatype:'JSON',
		    async:false,
		    success:function(ret) {
		        if(ret.status == 1) {
		       $("#myform_submit").attr("disabled", false); 
		       $("#myform_submit").addClass("submit").removeClass("button1");
                  sn_status=1;
		            return true;

		        } else {
		        	$("#myform_submit").attr("disabled", true); 
		        	$("#myform_submit").addClass("button1").removeClass("submit");
		            return false;


		        }
		    },
		    onerror:"支付宝交易号已存在"
		});


         $("#myform_submit").click(function(){

					var money2 = $("#normal_money2").val();
					var tran_number = $("#tran_number").val();

					if (money2 == '' ) {
						$("#money2").focus();
						return false;
					}

					 if (tran_number == '' ) {
					 	$("#tran_number").focus();
					 	return false;
					 }

					var info = {
						money:money2,
						tran_number:tran_number
					}

             $("#myform_submit").attr("disabled", true);

			$.post("<?php echo U('Pay/Index/ordinary');?>",{info:info},function(data){
									if (data.status == 1) {
										art.dialog({
										lock: true,
										fixed: true,
										icon: 'face-smile',
										title: '提示',
										content: data.info,
										okVal: '确定',
										ok:function() { 
										   //跳转充值记录页面
										   location.reload();  	
										},

										cancel:function(){
											window.location.reload();
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

								   $("#myform_submit").attr("disabled", false);

										};
														
								},'json');
										});
</script>