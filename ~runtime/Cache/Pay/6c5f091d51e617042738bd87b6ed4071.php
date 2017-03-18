<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>用户提现-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="用户提现,商家会员中心,<?php echo C('WEBNAME');?>" />
		<meta name="Description" content="用户提现,商家会员中心,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
		
	</head>

	<style>
	.bs_btn{
	    height: 42px;
	    border-radius: 3px;
	    cursor: pointer;
	    width: 176px;
	    background: #e9e9e9;
	    color: #777;
	    border: none;
	}
	.suc{
		color:green !important;
	}
	.wxqbao img{border-radius:15px;float:left;margin-left:20px; margin-right:5px;}
	</style>

<body>
	<?php if($userinfo['modelid'] == 1) { ?>
		    <?php include template('v2_header','member/common'); ?>
			<?php } else { ?>
	        <?php include template('v2_merchant_header','member/common'); ?>
		<?php } ?>

		<?php if($userinfo['modelid'] != 1) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />	
	<?php } ?>
	<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b>用户提现</b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php if($userinfo['modelid'] == 1) { ?>
				    <?php include template('v2_member_left','member/common'); ?>
					<?php } else { ?>
			        <?php include template('v2_merchant_left','member/common'); ?>

					<?php } ?>
			<div class="fr u_index_mess user_pd_1">
				<form action="" method="post">
					<h2 class="user_page_title">提现</h2>
					<p>
						可提现金额 :
						<span class="cc"><?php echo $money;?>元</span>
					</p>
					<div class="tixian_fs_wrap">
						<p class="tx_fs_t">选择提现方式:</p>
						<div class="tixian_list">
							<?php if(in_array('bank',$type)) { ?>
							<div class="list clear">
								<input id="bank_bind" type="radio" name="type" <?php if($bank['status'] != 1 || !$bank) { ?> disabled="disabled"<?php } ?> value="1" class="fl tx_mt_1"/> <strong class="fl tx_dd">提现到银行卡</strong>
								<div class="status clear">
									<div class="gs fl">
										<div class="fl" style="height:100%;overflow:hidden;">
											<img src="<?php echo THEME_STYLE_PATH;?>style/images/user/gs_ico.png" alt=""/>	
										</div>
										<div class="fl">
											<?php echo $bankinfos['sub_branch'];?>
											<span class="zf_wh">
												尾号 :
												<b><?php echo substr($bankinfos[account], -4);?></b>
											</span>
										</div>
									</div>
									<?php if(!$bank) { ?>
									<p class="fl null" id="#bankmsg">
										您还未绑定银行卡号,
										<a href="<?php echo U('Member/Attesta/bank_attesta');?>" class="cc">现在绑定>></a>
									</p>
									<?php } elseif ($bank['status'] == -1) { ?>
									<p class="fl null" id="#bankmsg">
										审核失败，请重新绑定银行卡号,
										<a href="<?php echo U('Member/Attesta/bank_attesta');?>" class="cc">现在绑定>></a>
									</p>
									<?php } elseif ($bank[status] == 0) { ?>
									<p class="fl null" id="#bankmsg">审核中</p>
									<?php } ?>
								</div>
							</div>
							<?php } ?>
								
						    <?php if(in_array('alipay',$type)) { ?>
							<div class="list clear">
								<input id='alipay_bind'  type="radio" name="type" value="2" <?php if($arr['alipay']['status'] != 1) { ?>disabled="disabled"<?php } ?>  class="fl tx_mt_1"/> <strong class="fl tx_dd">提现到支付宝</strong>
								<div class="status clear">
									<div class="gs fl">
										<div class="fl" style="height:100%;overflow:hidden;">
											<img src="<?php echo THEME_STYLE_PATH;?>style/images/user/zfb_ico.png" alt=""/>	
											<?php echo substr_replace($alipays['alipay_account'],'*****',3,5);?>
										</div>
									</div>
									<?php if(!$alipay) { ?>
									<p class="fl null" id="#bankmsg">
										您还未绑定支付宝,
										<a href="<?php echo U('Member/Attesta/alipay_attesta');?>" class="cc">现在绑定>></a>
									</p>
									<?php } elseif ($alipay['status'] == -1) { ?>
									<p class="fl null" id="#bankmsg">
										审核失败，请重新绑定支付宝,
										<a href="<?php echo U('Member/Attesta/alipay_attesta');?>" class="cc">现在绑定>></a>
									</p>
									<?php } elseif ($alipay[status] == 0) { ?>
									<p class="fl null" id="#bankmsg">审核中</p>
									<?php } ?>
								</div>
							</div>
							<?php } ?>

                            <?php if(in_array('weixin',$type) && $modelid ==1 ) { ?>
								<div class="list clear">
									<input id='wx_bind'  type="radio" name="type" value="3"   class="fl tx_mt_1"/> <strong class="fl tx_dd">提现到微信钱包</strong>
									<div class="status clear">
										<div class="gs fl">
											<div class="fl" style="height:100%;overflow:hidden;">
												<img height="40" src="/static/images/weixin_72.png" alt=""/>	
											</div>
										</div>
										<p class="fl null" id="#bankmsg">
											无需审核 10秒极速到账,
										</p>
									</div>
								</div>
							<?php } ?>

						</div>
						<ul class="tx_form_list" id="_oid">
							<li class="clear">
								<strong class="fl">提现金额:</strong>
								<div class="fl">
									<input id="money" placeholder="输入金额" class="txt_input"  style="color: red;"  type="text"  />	
									元
								</div>
								<p class="fl err dn">请输入0.01元以上的金额</p>
							</li>
							<li class="clear">
								<strong class="fl">提现模式:</strong>
								<div class="fl btn clear" id="btn_radio">
									<a href="javascript:;" data-id="1" class="active">普通提现</a>
									<a href="javascript:;" data-id="2">快速提现</a>	
									<input type="hidden" name="paypal" id="paypal" value="1"/>	
								</div>
							</li>

							<li class="clear js_show1">到帐时间: 最快<?php echo $common['time'];?>到帐,无手续费用</li>
							<li class="clear js_show2" style="display: none;">
								到帐时间: 最快<?php echo $quick['time'];?>到账，<?php if($fee >0) { ?><?php echo $fee;?>%<?php } else { ?>无<?php } ?>手续费，实际到账
								<span class="totalmoney"></span>
								元
							</li>
						</ul>
					<?php if(in_array('weixin',$type) &&  $modelid ==1) { ?>	
                       <?php if(!$opens) { ?> 
                         <ul class="tx_form_list" style="display:none" id="_wx">
                             <li class="clear cc" >您还没有关注 微信公众服务号 关注之后绑定平台帐号 才能申请微信提现</li>
                             <img style="margin-left:100px;" src="<?php echo C('weixin_logo');?>">
                             <p style="margin-left:60px;">(打开微信手机端 扫一扫二维码 即可关注成功) </p>
                             <li class="clear js_show1"> 温馨提示：
	                         <p>1.关注微信公众号之后 请绑定平台帐号</p>	             
                            </li>
                         </ul>
                      <?php } ?>

                       <?php if($opens) { ?>
	                    <ul class="tx_form_list" style="display:none" id="_wx">
	                       	<li class="clear">
	                       		<strong class="fl">提现金额:</strong>
	                       		<div class="fl">
	                       			<input id="wx_money" placeholder="输入金额" class="txt_input"  style="color: red;"  type="text"  />	
	                       			元
	                       		</div>
	                       		<p class="fl err dn">请输入1元以上的金额</p>
	                       	</li>
	                        
	                        <li class="clear">
	                        	<strong class="fl">微信钱包:</strong>
	                        	<div class="fl wxqbao">
	                               <img height="30" src="<?php echo $opens['headimgurl'];?>" > <?php echo $opens['nickname'];?>
	                        	</div>
	                        	<p class="fl err dn">请输入0.01元以上的金额</p>
	                        </li>

	                       	<li class="clear">
	                       		<strong class="fl">提现模式:</strong>
	                       		<div class="fl btn clear" id="btn_radio">
	                       			<a href="javascript:;" data-id="1" class="active">微信实时提现</a>
	                       			<input type="hidden" name="paypal" id="paypal" value="3"/>	
	                       		</div>
	                       	</li>

	                       	<li class="clear js_show2" >
	                       		到帐时间: 最快10秒到账，<?php if($wx_fee >0 ) { ?><i class="cc"><?php echo $wx_fee;?>%</i><?php } else { ?>无<?php } ?> 手续费，实际到账
	                       		<span class="cc totalmoney" ></span>
	                       		元
	                       	</li>
	                     </ul>
                       <?php } ?>
                    <?php } ?>   
                       <p style="margin-top:30px;">
                       	<input id="js_button" type="button" value="提交"  onclick="sumbit();"  class="submit"/>	
                       </p>
					</div>
				</form>
			</div>
		</div>

	</div>
	<?php include template('footer','common'); ?>
</body>
<script type="text/javascript">
	$(function(){
		/*计算提现手续费*/
		$("#money,#wx_money").blur(function(){
			var _money = $(this).val();
			var type = $('input[name="type"]:checked').val();
			if(!chek_money(_money)) return false;
			$.get('<?php echo U('Pay/Index/total_money');?>',{money:_money,'type':type },function(data){
				$(".totalmoney").text(data);
			},'json');
		});

		if($('#bank_bind').length < 1 && $('#alipay_bind').length < 1 && $('#wx_bind').length >0 ){
            $('#wx_bind').attr("checked",'checked');
			$('#_wx').show();
			$('#_oid').hide();
		}
	});



	/*提现金额检测*/
	function chek_money(money){
		var multiple_money = "<?php echo $pay_setting['multiple_money'];?>";
		var min_money = "<?php echo $pay_setting['min_money'];?>";
		var type = $('input[name="type"]:checked').val();
		var q = type ==1 || type==2 ? 0 : 1;
	    var n = parseInt(money);
		if(!/^(0|[1-9]\d*|(0|[1-9]\d*)\.\d*[1-9])$/.test(money)){
			$('.err').eq(q).removeClass('dn').html('请输入一个正确的金额'); 
			return false;
		}else if(n < parseInt(min_money)){
			$('.err').eq(q).removeClass('dn').html("提现金额不能小于" + min_money+'元'); 
			return false;
		}else if(n % parseInt(multiple_money) != 0){
			$('.err').eq(q).addClass('dn').html("提现金额需是" + multiple_money + "倍数"); 
			return false;
		}else{
			$('.err').eq(q).removeClass('dn').addClass('suc').html("输入正确"); 
			return true;
		}
	}

    <?php if($arr['alipay']['status'] == 1) { ?>
       $('#alipay_bind').attr("checked",'checked');
      <?php } else { ?>
       $('#bank_bind').attr("checked",'checked');
    <?php } ?>

	$('#btn_radio a').on('click',function(){
		$(this).addClass('active').siblings('a').removeClass('active').parents('#btn_radio').find('input').val($(this).attr('data-id'));
		if ($(this).attr('data-id') == 2) {
			$(".js_show1").hide();
			$(".js_show2").show();
		}else{
			$(".js_show1").show();
			$(".js_show2").hide();
		};
	});

    /*切换银行卡和支付宝*/
	$('input[name="type"]').click(function(){
	  var type = $('input[name="type"]:checked').val();
	  if(type == 1 || type == 2){
        $('#_wx').hide();
        $('#_oid').show();
	  }

	  if(type == 3){
	  	$('#_wx').show();
	  	$('#_oid').hide();
	  }

	})


	function sumbit(){
		var _money = $("#money").val();
		var type = $('input[name="type"]:checked').val();
		if(type==3) _money = $("#wx_money").val();
		var paypal = $('#paypal').val();
		if(!chek_money(_money)) return false;
		//正在处理
		$('#js_button').attr('disabled',true).addClass('bs_btn').val('正在处理');

		$.post("<?php echo U('Pay/Index/deposite');?>",{money:_money,type:type,paypal:paypal},function(data){
			if (data.status == 1) {
				art.dialog({
				lock: true,
				fixed: true,
				icon: 'face-smile',
				title: '提示',
				content: data.info,
				okVal: '确定',
				ok:function() { 
					location.reload();
				}
			});
			}else{
				art.dialog({
				lock: true,
				fixed: true,
				icon: 'face-sad',
				title: '错误提示',
				content: data.info,
				ok:function() { 
					location.reload();
				}
			});

		};
								
		},'json');
	}
</script>
				
</html>