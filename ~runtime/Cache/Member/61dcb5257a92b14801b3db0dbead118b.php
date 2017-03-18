<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>活动管理-商家个人中心-添加28元包邮-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="活动管理,商家个人中心,添加9.9包邮产品,<?php echo C('WEBNAME');?>" />
        <meta name="description" content="活动管理,商家个人中心,添加9.9包邮产品,<?php echo C('WEBNAME');?>" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
    	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
	    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
		<link href="<?php echo THEME_STYLE_PATH;?>style/css/n_businessman.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/shops_vip_style.css" /> 
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/release_shop.css" /> 
		<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
		<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
		
	</head>
	<body>
	 <?php include template('v2_merchant_header','member/common'); ?>
	<div class="i_businessman">
		<!--s_nav-->
		<div class="ibody">
			<div class="s_weiz">
				当前位置：
		<a href="<?php echo U('Member/Profile/index');?>" class="nav_active">商家中心</a>&nbsp;>发布9.9包邮商品
			</div>
			<!--s_weiz-->
      <?php include template('v2_merchant_left','member/common'); ?>
			<div class="s_right" >
				<div  class="title">发布28元包邮商品</div>
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
							
							$('input[type="radio"][name="info[type]"]').each(function(i,n){
								$(this).attr('index',i);
							});
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
					<input type="hidden" name="mod" value="postal" />
					<input type="hidden" name="nojinlai" value="1" />
						<ul class="right_release height_auto">

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
							
							<li class="shop_soure set_line_height width_100 float_left"  id="field_taobaoke">
								<span class="js_set_input font_size14 shop_value_name text_align_right">淘宝客佣金：</span>
								<input type="text" class="float_left input_width_2 height_100 " name="info[taobao_charge]"  id="taobao" />
							</li>
							<script type="text/javascript">
							$("input[name='info[source]']").click(function() {
								if($(this).val() <= 2) {
									$("#field_taobaoke").show();
								} else {
									$("#field_taobaoke").hide();
								}
							})
						</script>
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
								<input type="text" class="float_left input_width_1 height_100" name="info[goods_url]" id="goods_url"/>
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
							<script type="text/javascript">
								/* 点击淘宝 天猫 */
								$(document).ready(function(){
									$('.shop_cost2 ').blur(function(){
										var oShopRental = parseFloat($('.shop_cost1').val());
										var oStarter = parseFloat($('.shop_cost2').val());									
										var oDiscount = oStarter/10;
										$('.shop_cost3').text( oShopRental - oShopRental * oDiscount );
									});	
								});
							</script>
							<!-- 商品发布件数 -->			
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">发布份数：</span>
								<input type="text" class="float_left input_width_2 height_100 " name="info[goods_number]" id="goods_number" />
							</li>	
							<!-- 商品价格判断 -->	
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">下单价格：</span>
								<span class=""><input type="text" name="info[goods_price]" class="shop_cost1 float_left input_width_2 height_100 " id="goods_price"/></span>
								<span class="color_red margin_left_right_5"></span>
							</li>
							<!-- 活动时间 -->
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">活动时间：</span>
								<input type="text" class="float_left input_width_2 height_100 " name="info[activity_days]" id="activity_days"/>天
							</li>
							
							<li class="shop_soure set_line_height width_100 float_left">
								<span class="font_size14 shop_value_name text_align_right">温馨提示：</span>
								<ul class="float_left prompt">
									<!-- <li><input type="checkbox" class="float_left" name="info[goods_tips][order_tip][]" value="1" />请不要使用信用卡下单</li>
									<li><input type="checkbox" class="float_left" name="info[goods_tips][order_tip][]" value="2" />请不要催促商家返款</li> -->
									<li>默认快递<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][kuaidi]"/></li>
									<li>拍下须知<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][remark]"/></li>
									<li>原价为<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][price][cost]"/>元，拍下后价格为
									<input type="text" class="set_input_width_3" name="info[goods_tips][goods_order][price][after]" style="width:50px;" />元
									</li>
								</ul>
							</li>	
							<li class="shop_soure set_line_height width_100 float_left w800" >
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
					<!--part3-->
				</div>
				<!--s_tryout3-->
			</div>
			<!--s_right-->

			<!--s_right-->
			<div class="clear"></div>
		</div>
	</div>
<style type="text/css">
.onShow,.onFocus,.onError,.onCorrect,.onLoad,.onTime{display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline; vertical-align:middle;background:url(<?php echo IMG_PATH;?>msg_bg.png) no-repeat;	color:#444;line-height:18px;padding:2px 10px 2px 23px; margin-left:10px;_margin-left:5px}
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
		onshow:"请输入商品份数,范围<?php echo $goods_number['min'];?>~<?php echo $goods_number['max'];?>" ,
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
		regexp:'num1',
		datatype:'enum',
		onerror:'商品份数只能为正数'
	});
<?php } else { ?>
	$("#goods_number").formValidator({
		empty:false,
		onempty:'商品份数不能为空',
		onshow:true ,
		onfocus:"请输入商品份数" 
	}).regexValidator({
		regexp:'decmal1',
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
		regexp:'decmal3',
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
		regexp:'decmal3',
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
			return true;
		}
	}
}).regexValidator({
	regexp:'decmal1',
	datatype:'enum',
	onerror:'商品折扣只能为正数'
});
/* 返还金 */
$("#goods_url").formValidator({
	empty:false,
	onempty:'下单地址不能为空',
	onshow:true,
	onfocus:'请输入下单地址'
}).regexValidator({
	regexp:'url',
	datatype:'enum',
	onerror:'下单地址输入错误'
});
/* 活动天数 */
$("#activity_days").formValidator({
	empty:false,
	onempty:'活动天数不能为空',
	onshow:true,
	onfocus:'请输入活动天数'	
}).functionValidator({
	fun:function(val,elem){
		if('<?php echo $activitydays;?>' != '' && (val > Number('<?php echo $activitydays;?>') || val < 1)){
			return '活动时间的范围是1~<?php echo $activitydays;?>';
		}
		return true;
	}
}).regexValidator({
	regexp:'intege1',
	datatype:'enum',
	onerror:'活动天数只能为正整数'	
});

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
/*淘宝佣金*/
$("#taobao").formValidator({
	empty:true,
	onempty:'淘宝佣金必须大于<?php echo $activity_set["seller_charge_money"];?>%才能审核成功',
	onshow:true,
	onfocus:'请输入淘宝佣金'
}).functionValidator({
	fun:function(val,elem){
		if('<?php echo $activity_set["seller_charge_money"];?>' != '' && val <Number( '<?php echo $activity_set["seller_charge_money"];?>')){
			return '淘宝佣金必须大于<?php echo $activity_set["seller_charge_money"];?>%才能审核成功';
		}
		return true;
	}
}).regexValidator({
	regexp:'decmal1',
	datatype:'enum',
	onerror:'淘宝佣金输入错误'	
});
</script>
<link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" />
<script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>
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
</script>
<?php include template('footer','common'); ?>