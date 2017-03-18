<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>活动管理-商家个人中心-添加<?php echo C('rebate_name');?>-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="活动管理,商家个人中心,添加<?php echo C('rebate_name');?>,<?php echo C('WEBNAME');?>" />
        <meta name="description" content="活动管理,商家个人中心,添加<?php echo C('rebate_name');?>,<?php echo C('WEBNAME');?>" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
	    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/n_businessman.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/shops_vip_style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/release_shop.css" /> 
		<script type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/activity.js"></script>
		<link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" />
		<script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>
		
	</head>

	<style type="text/css">
	.prompt li {
	    height: 20px;
	    line-height: 12px;
	    padding-left: 100px;
	}
	</style>
	<body>
	 <?php include template('v2_merchant_header','member/common'); ?>
	<div class="i_businessman">
		<!--s_nav-->
		<div class="ibody">
			<div class="s_weiz">
				当前位置：
		<a href="<?php echo U('Member/Profile/index');?>" class="nav_active">商家中心</a>&nbsp;>发布<?php echo C('rebate_name');?>商品
			</div>
			<!--s_weiz-->
      <?php include template('v2_merchant_left','member/common'); ?>
			<div class="s_right" >
				<div  class="title">发布<?php echo C('rebate_name');?>商品</div>
				<div class="s_tryout5">
					<div class="part1">您发布的活动一旦系统审批，您将不能对此试用活动进行删除,，请慎重！</div>
					<div  class="part2">
						<div class="part">填写活动信息</div>
						<div class="jg3"></div>
						<div class="part sel">填写任务信息</div>
						<div class="jg1"></div>
						<div class="part">存入活动担保金</div>
						<div class="jg2"></div>
						<div class="part">发布成功</div>
					</div>
					<!--part2-->
					<div class="clear"></div>
					<div class="part3" >
					<script type="text/javascript">
						$(document).ready(function(){
							var oSet = 0;
							//商品来源点击
							$('input[type="radio"][name="info[source]"]').click(function(){
								oSet = 1;
								$('.activity_mold_hint').css('display','none');
								if($(this).val() > 2) {
									$(this).addClass('set_radio');
								}else{
									$('.set_radio').attr('checked',false);
								}
							});
							$(document).on('click','.set_radio',function(){
								$(this).attr('checked',true);
							}); 
							
							/*$('input[type="radio"][name="info[type]"]').each(function(i,n){
								$(this).attr('index',i);
							});*/
							$('input[type="radio"][name="info[type]"]').click(function(){
								$('.activity_mold_hint').css('display','none');
								$('.activity_mold_hint:eq('+$(this).attr("index")+')').css('display','block');
								$(this).next().css('display','block');
									if($('.set_radio').attr('checked') || oSet != 1){
										$('.activity_mold_hint:eq(0)').css('display','none');
									}
							});
						});
					</script>
					<!-- radio_set_add -->
					<form action="<?php echo U('Member/MerchantProduct/add');?>" name="myform" method="post" id="myform">
					<input type="hidden" name="mod" value="rebate" />
					<input type="hidden" name="nojinlai" value="1" />
						<ul class="right_release height_auto">
                            <li class="shop_soure set_line_height width_100 float_left">
								<span class="js_set_input font_size14 shop_value_name text_align_right">招商专员：</span>
								<?php if($attach[username]) { ?>
								<input type="text" class="float_left input_width_2 height_100"  value="<?php echo $attach['username'];?>"  size="6" disabled/>&nbsp;
								<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $attach['qq'];?>&site=qq&menu=yes">
									<img border="0" src="http://wpa.qq.com/pa?p=2:644278217:51" alt="点击这里给我发消息" title="点击这里给我发消息"  style="width:12%;"/>
								</a>
								<?php } else { ?>
                                <input type="text" class="float_left input_width_2 height_100 "  value="" name="info[attract]" placeholder="招商专员id 选填"  />&nbsp;
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C("site_contact_qq1");?>&site=qq&menu=yes">
									<img border="0" src="http://wpa.qq.com/pa?p=2:644278217:51" alt="点击这里给我发消息" title="点击这里给我发消息"  style="width:12%;"/>
								</a>
								<?php } ?>
							</li>

                            <li class="shop_soure width_100 float_left">
                                <span class="font_size14 shop_value_name text_align_right">获取信息：</span>
                                <input type="text" name="info[go_link]" class="input-text" style="width:300px" />
                                (请输入商品链接 支持淘宝 天猫 京东)
                                <input type="button" value="一键获取" class="button keyget" name="keyget"></td>
                            </li>
                            <script>
                                $(".keyget").click(function(){
                                    var go_link = $("input:text[name='info[go_link]']").val();
                                    if(!go_link){
                                        art.dialog({
                                            lock: true,
                                            fixed: true,
                                            title: '错误提示',
                                            content: '请输入地址',
                                            ok: true
                                        });
                                        return false;
                                    }

                                    $.post('/index.php?m=Product&c=Api&a=go_link', {
                                        go_link : go_link
                                    }, function(ret) {
                                        if(ret.status == 1) {
                                            $("input:text[name='info[title]']").val(ret.title);
                                            $("input:text[name='info[keyword]']").val(ret.keyword);
                                            $("input:text[name='info[goods_price]']").val(ret.goods_price);
                                            $("input:text[name='info[goods_url]']").val(ret.url);

                                            $("input[name='goods_albums_url[1]']").val(ret.img);
                                            $("input[name='goods_albums_url[1]']").prev().attr("src",ret.img);
                                        }else{
                                            art.dialog({
                                                lock: true,
                                                fixed: true,
                                                icon: 'face-sad',
                                                title: '错误提示',
                                                content: ret.info,
                                                ok: true
                                            });
                                        }
                                        return false;
                                    }, 'JSON');
                                })
                            </script>

							<li class="shop_soure width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">商品来源：</span>
								<?php echo $form::radio('info[source]', 1, $this->source);?>
							</li>
							<li class="shop_soure setspan width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">下单方式：</span>
								<?php if($activity['seller_general_order'] == 1 && in_array(1,$ordertype)) { ?>
								<span>
									<label><input type="radio" class=" float_left margin_left_right_5"  name="info[type]" value="general" checked index="0"/>普通下单</label>
								</span>
								<?php } ?>
								
								<?php if($activity['seller_search_order'] == 1  && in_array(2,$ordertype)) { ?>
								<span>
									<label><input type="radio" class=" float_left margin_left_right_5"  name="info[type]" value="search" index="1" />搜索下单</label>					
								</span>
								<?php } ?>
								
								<?php if($activity['seller_answer_order'] == 1  && in_array(3,$ordertype)) { ?> 
								<span>
									<label><input type="radio" class=" float_left margin_left_right_5"  name="info[type]" value="ask" index="2"/>答案下单</label>
								</span>
								<?php } ?>
								
								<?php if($activity['seller_qrcode_order'] == 1  && in_array(4,$ordertype)) { ?> 
								<span>
									<label><input type="radio" class=" float_left margin_left_right_5"  name="info[type]" value="qrcode" index="3"/>二维码下单</label>						
								</span>
								 <?php } ?> 
							</li>
							<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/ajaxfileupload.js"></script>
							<script type="text/javascript">
							$(document).ready(function(){
								$("#image").click(function (){
									$("#file_upload").click();
								});
							});
							function ajaxFileUpload(){
								$.ajaxFileUpload ({
									 url:'<?php echo U('Member/MerchantProduct/code');?>',
									 secureuri:false,//是否启用安全提交
									 fileElementId:'file_upload',
									 dataType: 'json',
									 success: function (data){
										 $("#product_code").html("<img src='"+data+"' width='10' height='10' />");
										 $('#file_url').val(data);
									 },
									 error:function(data){
										 alert(data);
									 }
								 }); 
								 return false; 
							}
							</script>
							
							<li class="position_relative set_line_height float_left set_display_index">
								<p class="padding_left_right_10  border_dddddd activity_mold_hint" id="field_taobaoke">
									<img src="<?php echo THEME_STYLE_PATH;?>style/images/activity_mold_bg.jpg" alt="" />
									<span>店铺或商品是否正在做淘宝推广</span>
 									<span><label><input type="radio" class="float_left margin_left_right_5 margin_top_8" name="info[taobaoke]" value="1" onclick="goods.taoke_tip()"/>是</label></span>
									<span><label><input type="radio" class="float_left margin_left_right_5 margin_top_8" name="info[taobaoke]" value="0" onclick="goods.taoke_tip()"/>否</label></span>
								</p>							
								<p class="activity_mold_hint border_dddddd" id="search">
									<img src="<?php echo THEME_STYLE_PATH;?>style/images/activity_mold_bg.jpg" style="left:70px;top:-6px;" alt=""  />										
									<input type="text" name="info[goods_rule][keyword]" class="margin_top_5 margin_left_5 border_dddddd search_value text_indent_10 border_none" placeholder="请输入淘宝关键词，例如：韩版春装，韩版女装 用 ， 分隔"/>
									<input type="text" name="info[goods_rule][keyword2]" class="margin_top_5 margin_left_5 border_dddddd search_value text_indent_10 border_none" placeholder="例如：用ctr/ + f 查找店铺关键字，找到活动商品。"/>
								</p>	
								<p class="activity_mold_hint  border_dddddd" id="question">
									<img src="<?php echo THEME_STYLE_PATH;?>style/images/activity_mold_bg.jpg" alt="" style="left:145px;"/>
									<span class="input_issue width_100"><font class="display_inline_block height_100 text_align_right">请输入问题</font><input type="text" name="info[goods_rule][ask][question]"/></span>
									<span class="input_issue width_100"><font class="display_inline_block height_100 text_align_right">请输入答案</font><input type="text" name="info[goods_rule][ask][answer]"/></span>
									<span class="input_issue width_100"><font class="display_inline_block height_100 text_align_right">问题提示</font><input type="text" class="input_length" name="info[goods_rule][ask][cues]" /></span>
								</p>
								<p class="background_dddddd activity_mold_hint activity_mold_hint2" id="code">
									<img src="<?php echo THEME_STYLE_PATH;?>style/images/activity_mold_bg.jpg" alt="" style="top:-6px;"/>
									<span class="padding_left_right_10 border_dddddd" id="product_code">请上传二维码</span>
									<input  id="file_upload"  name="Filedata" type="file" style="display:none;" onchange = "return ajaxFileUpload()"/>
									<input type="hidden" id="file_url" name="info[goods_rule][qrcode]"  value=""/>
									<a href="javascript:;" id="image"  class="hint_search_btn display_inline_block border_dddddd text_align_center border_radius_3 margin_left_5">上传</a>
								</p>				
							</li> 
							
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="js_set_input font_size14 shop_value_name text_align_right">商品标题：</span>
								<input type="text" class="float_left input_width_1 height_100 " name="info[title]" id="title" />
							</li>		
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">商品关键字：</span>
								<input type="text" class="float_left input_width_1 height_100" name="info[keyword]"   />
							</li>	
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">下单地址：</span>
								<input type="text" class="float_left input_width_1 height_100" name="info[goods_url]" />
							</li>	
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">产品分类：</span>
								<?php echo $form::select_product_category("catid", 0);?>
							</li>
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="float_left font_size14 shop_value_name text_align_right">商品图片：</span>
								<input type="hidden" name="info[goods_albums]" value="1" />
								<ul id="goods_albums" class="shop_img">
									<li class="big_small_img float_left">
										<span class="border_dddddd"><img src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" /><input type="hidden" name="goods_albums_url[1]" /><input type="hidden" name="goods_albums_alt[1]" /></span>
										<a href="javascript:;" name="uploadify" class="display_block float_left color_ffffff background_666666 text_align_center" id="img1">上传</a>
									</li>
									<li class="float_left">
										<span class="border_dddddd"><img src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" /><input type="hidden" name="goods_albums_url[2]" /><input type="hidden" name="goods_albums_alt[2]" /></span>
										<a href="javascript:;" name="uploadify" class="display_block float_left color_ffffff background_666666 text_align_center" id="img2">上传</a>
									</li>
									<li class="float_left">
										<span class="border_dddddd"><img src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" /><input type="hidden" name="goods_albums_url[3]" /><input type="hidden" name="goods_albums_alt[3]" /></span>
										<a href="javascript:;" name="uploadify" class="display_block float_left color_ffffff background_666666 text_align_center" id="img3">上传</a>
									</li>
									<li class="float_left">
										<span class="border_dddddd"><img src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" /><input type="hidden" name="goods_albums_url[4]" /><input type="hidden" name="goods_albums_alt[4]" /></span>
										<a href="javascript:;" name="uploadify" class="display_block float_left color_ffffff background_666666 text_align_center" id="img4">上传</a>
									</li>
									<li class="float_left">
										<span class="border_dddddd"><img src="<?php echo THEME_STYLE_PATH;?>style/images/signIn_14.jpg" alt="" /><input type="hidden" name="goods_albums_url[5]" /><input type="hidden" name="goods_albums_alt[5]" /></span>
										<a href="javascript:;" name="uploadify" class="display_block float_left color_ffffff background_666666 text_align_center" id="img5">上传</a>
									</li>
									
								</ul>
							</li>
							<!-- 商品发布件数 -->			
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">发布份数：</span>
								<input type="text" class="float_left input_width_2 height_100 " name="info[goods_number]" id="goods_number" />件
							</li>	
							<!-- 商品价格判断 -->	
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">下单价格：</span>
								<span class=""><input type="text" name="info[goods_price]" class="shop_cost1 float_left input_width_2 height_100 " id="goods_price"/>元</span>
								<span class="color_red margin_left_right_5"></span>
							</li>
							<!-- 折扣范围 -->
							<?php if($mod == 'rebate') { ?>
							<?php $value = string2array($this->discount);?>
							<li class="shop_soure set_line_height width_100 float_left"><!-- <?php echo $value['min'];?>-<?php echo $value['max'];?> -->
								<span class="font_size14 shop_value_name text_align_right">折扣：</span>
								<input type="text" value="" data-min="<?php echo $value['min'];?>"  data-max="<?php echo $value['max'];?>" class="shop_cost2 float_left input_width_2 height_100 " name="info[goods_discount]" id="goods_discount"/>折
							</li>	
							
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">划算价：</span>
								<input type="text" value=""  class="shop_cost2 float_left input_width_2 height_100 " id="remal_price"  />
							</li>
							<?php } ?>		
							
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">返还金：：</span>
								<span class="color_ff6600 margin_left_right_5 shop_cost3" >0.00</span>元
							</li>	
							<script type="text/javascript">
								/* 点击淘宝 天猫 */
								$(document).ready(function(){
									$('.shop_cost2 ').blur(function(){
										var oShopRental = parseFloat($('.shop_cost1').val());
										var oStarter = parseFloat($('.shop_cost2').val());									
										var oDiscount = oStarter/10;
										$('.shop_cost3').text( (oShopRental - oShopRental * oDiscount).toFixed(2) );
									});	
								});
								$("#goods_discount").on('keypress keyup blur', function(){
									var remal_price = ($('#goods_price').val() * $(this).val() / 10).toFixed(2);
									$("#remal_price").attr('value', remal_price);//划算价
								});
							
								$("#remal_price").on('keypress keyup blur', function(){
									var goods_discount = (($(this).val() / $('#goods_price').val())  * 10).toFixed(1);
									$("#goods_discount").attr('value', goods_discount); 
								});
							</script>
							
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">活动时间：</span>
								<input type="text" class="float_left input_width_2 height_100 " name="info[activity_days]" id="activity_days"/>天
							</li>
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">温馨提示：</span>
								<ul class="float_left prompt font_size14  "  >
									<li><input type="checkbox" class="float_left" name="info[goods_tips][order_tip][]" value="1" />请不要使用淘金币下单</li>
									<li><input type="checkbox" class="float_left" name="info[goods_tips][order_tip][]" value="2" />请不要催促商家返款</li>
									<li><input type="checkbox" class="float_left" name="info[goods_tips][order_tip][]" value="3" />请不要使用手机下单</li>
									<li><input type="checkbox" class="float_left" name="info[goods_tips][order_tip][]" value="4" />请不要使用店铺优惠券</li>
									<li>默认快递<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][kuaidi]"/></li>
									<li>套餐包含<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][package]"/></li>
									<li>拍下须知<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][remark]"/></li>
								</ul>
							</li>	
							<li class="shop_soure set_line_height width_100 float_left w800">
								<span class="font_size14 shop_value_name text_align_right">商品介绍：</span>
								<div style="width:652px;float:left;">
									<textarea name="info[goods_content]" id="info[goods_content]"></textarea>
									<?php echo $form::editor("info[goods_content]");?>
								</div>
							</li>
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right"></span>
								<input type="submit" class="color_ffffff submit_btn border_none background_ff6600 border_radius_3 cursor_pointer" value="提交"/>
							</li>
						</ul>
					</form>					
				</div>				
			</div>
		</div>
		<div class="clear"></div>
		</div>
	</div>
<style type="text/css">
	.onFocus,.onError,.onCorrect,.onLoad,.onTime{display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline; vertical-align:middle;background:url(<?php echo IMG_PATH;?>msg_bg.png) no-repeat;	color:#444;line-height:18px;padding:2px 10px 2px 23px; margin-left:10px;_margin-left:5px}
	.onShow{background-position:3px -147px;border-color:#40B3FF;color:#959595}
	.onFocus{background-position:3px -147px;border-color:#40B3FF;}
	.onError{background-position:3px -47px;border-color:#40B3FF; color:red}
	.onCorrect{background-position:3px -247px;border-color:#40B3FF;}
	.onLamp{background-position:3px -200px}
	.onTime{background-position:3px -1356px}
</style>
<script type="text/javascript"> 
<!--
$(document).ready(function(){
	linkage_catid.onChange(function() {
		var _cat_arr = this.getSelectedArr();
		$("#linkage_input_catid").attr("value", this.getSelectedValue());
		if(isNaN(parseInt(_cat_arr[_cat_arr.length - 1])) == true) {
			$("#linkage_input_catid").unFormValidator(false);//恢复校验
			$("#linkage_input_catidTip").attr('class', 'onError').text('请选择产品分类').show();
		} else {
			$("#linkage_input_catid").show().unFormValidator(true); //解除校验
			$("#linkage_input_catidTip").attr('class', 'onCorrect').text('分类选择正确').show();
		}
	});
});

$.formValidator.initConfig({
	formid:"myform",
	autotip:true,
	onerror:function(msg,obj){
		$(obj).focus();
	}
});
/*产品分类*/
$("#linkage_input_catid").formValidator({
	empty:false,
	onshow: true,
    onfocus: "请选择产品分类"
}).inputValidator({
    min: 1,
    onerror: "产品分类不能不选择"
}).regexValidator({
	regexp:'intege1',
	datatype:'enum',
	onerror:'请选择产品分类'
});

//商品件数判断
<?php if($goods_number['radio'] == 1) { ?>
	$("#goods_number").formValidator({
		onshow:true ,
		onfocus:"请输入商品份数,范围<?php echo $goods_number['min'];?>~<?php echo $goods_number['max'];?>" 
	}).functionValidator({
		fun:function(val,elem){
			if(val < Number('<?php echo $goods_number['min'];?>') || val > Number('<?php echo $goods_number['max']?>')){
				return '请输入商品份数,范围<?php echo $goods_number['min'];?>~<?php echo $goods_number['max'];?>';
			}else{
				return true;
			}
		}
	}).regexValidator({
		regexp:'intege1',
		datatype:'enum',
		onerror:'商品份数只能为正数'
	});
<?php } else { ?>
	$("#goods_number").formValidator({
		empty:false,
		onempty:'商品份数不能为空',
		onshow:true,
		onfocus:"请输入商品份数" 
	}).regexValidator({
		regexp:'intege1',
		datatype:'enum',
		onerror:'商品份数只能为正数'
	});
<?php } ?>


$("#title").formValidator({
	empty:false,
	onshow:true,
	onfocus:"请输入商品标题"
}).inputValidator({
	min:1,
	onerror:"请输入商品标题"
});
//下单价 
<?php if($price_range['radio'] == 1) { ?>
	$("#goods_price").formValidator({
		empty:false,
		onshow:true,
		onfocus:"请输入用户购买时的下单价,价格范围<?php echo $price_range['min']?>~<?php echo $price_range['max']?>" 
	}).functionValidator({
		fun:function(val,elem){
			if(val < Number('<?php echo $price_range['min'];?>') || val > Number('<?php echo $price_range['max']?>')){
				return '请输入价格,范围<?php echo $price_range['min'];?>~<?php echo $price_range['max'];?>';
			}else{
				return true;
			}
		}
	}).regexValidator({
		regexp:'decmal1',
		datatype:'enum',
		onerror:'下单价只能为正数'
	});
<?php } else { ?>
	$("#goods_price").formValidator({
		empty:false,
		onempty:'下单价不能为空',
		onshow:true,
		onfocus:"请输入用户购买时的下单价" 
	}).regexValidator({
		regexp:'decmal1',
		datatype:'enum',
		onerror:'下单价只能为正数'
	});
<?php } ?>
// 折扣 
$("#goods_discount").formValidator({
	onshow:true,
	onfocus:'请输入商品折扣,范围' + $("#goods_discount").attr('data-min') + '~' + $("#goods_discount").attr('data-max')
}).functionValidator({
	fun:function(val,elem){
		
		if(val < $("#goods_discount").attr('data-min') || val > $("#goods_discount").attr('data-max')){
			return '请输入商品折扣,范围'+$("#goods_discount").attr('data-min') + '~' + $("#goods_discount").attr('data-max');
		}else{
			//	return val.length;
			return true;
		}
	}
}).inputValidator({
	min:1,
	max:3,
	onerror:"商品折扣只有一位小数"
}).regexValidator({
	regexp:'decmal1',
	datatype:'enum',
	onerror:'商品折扣只能为正数'
});
/* 返还金 */
$("#remal_price").formValidator({
	empty:false,
	onempty:'返还金不能为空',
	onshow:true,
	onfocus:'请输入返还金'
}).regexValidator({
	regexp:'decmal1',
	datatype:'enum',
	onerror:'返还金只能为正数'
});
/* 活动天数 */
var activitydays = <?php echo (int) $activitydays ?>;
$("#activity_days").formValidator({
	empty:false,
	onempty:'活动天数不能为空',
	onshow:true,
	onfocus:'请输入活动天数'	
}).functionValidator({
	fun:function(val,elem){
		if(activitydays > 0 && (val > activitydays || val < 1)){
			return '活动时间的范围是1~' + activitydays;
		}
		return true;
	}
}).regexValidator({
	regexp:'intege1',
	datatype:'enum',
	onerror:'活动天数只能为正整数'	
})

$("#goods_content").formValidator({
	onshow:true,
	onfocus:"内容不能为空"
}).functionValidator({
	fun:function(val,elem){
		var oEditor = CKEDITOR.instances.content;
		var data = oEditor.getData();
		if($('#islink').attr('checked')){
			return true;
		} else if(($('#islink').attr('checked')==false) && (data=='')){
			return "内容不能为空";
		} else if (data=='' || $.trim(data)=='') {
			return "内容不能为空";
		}
		return true;
	}
});

</script>
<script type="text/javascript">
//图片上传功能
$(document).ready(function() {
	var goods_album = $("ul#goods_albums").find('li');
	for(var i=0; i < goods_album.length; i++) {
		var uploader = WebUploader.create({
			auto:true,
			fileVal:'Filedata',
		    // swf文件路径
		    swf: '<?php echo JS_PATH;?>webuploader/webuploader.swf',
		    // 文件接收服务端。
		    server: "<?php echo U('Attachment/Attachment/swfupload');?>",
		    // 选择文件的按钮。可选
		    formData:{
		    	"module":"",
		    	"catid":"",
		    	"userid":"1",
		    	"dosubmit":"1",
		    	"thumb_width":"0",
		    	"thumb_height":"0",
		    	"watermark_enable":"1",
		    	"filetype_post":"jpg|jpeg|gif|png",
		    	"swf_auth_key":"57a39f6f7415ec2cdd2b8afd77b57c3f",
		    	"isadmin":"1",
		    	"groupid":"2"
		    },
		    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
		    pick: {
		    	id: '#img' + (i+1),
		    	multiple:false
		    },
		    accept:{
				title: '图片文件',
				extensions: 'gif,jpg,jpeg,bmp,png',
				mimeTypes: 'image/*'
		    },
		    thumb:{
		    	width: '110',
		    	height: '110'
		    },
		    chunked: false,
		    chunkSize:1000000,
		    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		    resize: false
		});

		uploader.onUploadSuccess = function( file, response ) {
			var pickid = this.options.pick.id;
			var data = response._raw;
			var arr = data.split(',');
			if(arr[0] > 0) {
				$(pickid).parent('li').find('img').attr('src', arr[1]);
				$(pickid).parent('li').find('input[type=hidden]').eq(0).attr('value', arr[1]);
				$(pickid).parent('li').find('input[type=hidden]').eq(1).attr('value', arr[3]);
			}
		}

		uploader.onUploadError = function(file, reason) {
			alert('文件上传错误：' + reason);
		}
	}
})

function changeTwoDecimal(num){
	num += '';  
    num = num.replace(/[^0-9|\.]/g, ''); //清除字符串中的非数字非.字符  
    if(/^0+/) //清除字符串开头的0  
        num = num.replace(/^0+/, '');  
    if(!/\./.test(num)) //为整数字符串在末尾添加.00  
        num += '.00';  
    if(/^\./.test(num)) //字符以.开头时,在开头添加0  
        num = '0' + num;  
    num += '00';        //在字符串末尾补零  
    num = num.match(/\d+\.\d{2}/)[0];  
    return num;
}
</script>
<?php include template('footer','common'); ?>