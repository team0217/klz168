<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>绑定账号-买家个人中心-<?php echo C('WEBNAME');?></title>
		<meta name="keywords" content="推荐好友,<?php echo C('WEBNAME');?>" />
		<meta name="description" content="推荐好友,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
		<link rel="stylesheet" href="<?php echo THEME_STYLE_PATH;?>style/css/personal_member_bindtaobao.css" />
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery.zclip.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
		<script type="text/javascript" src="/static/js/jquery.shCircleLoader-min.js"></script>
	</head>
	<body>
	<?php include template('v2_header','member/common'); ?>
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>好友推荐</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				
			 <?php include template('v2_member_left','member/common'); ?>


				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">绑定账号</h2>

				<div class="content_right_main">
					<div class="main_content">
						<div class="avatar">
							<span class="avatar_avatar">
								<img src="<?php echo THEME_STYLE_PATH;?>style/images/user_botton_icon.png" width="100" height="100" alt="" />
							</span>
							<span><img src="<?php echo THEME_STYLE_PATH;?>style/images/arrow.png" alt="" /></span>
							<span><img src="<?php echo THEME_STYLE_PATH;?>style/images/goshangdian.png" alt="" /></span>
						</div>
						<div class="input" style="height:auto;" >
							<dl>
								<dt><span>账号：</span>请填写您需要认证的账号</dt>
								<dd><input type="text" name="taobao" id="taobao" /></dd>

							</dl>

							<dl>
								
		<!--						<dt class="tbxyTitle" ><span>淘宝信誉:</span>请选择您的账号信誉等级</dt>
								<dd>
									<div  class="taobaoxyz">
										<div class="selectzzz" id="selectzzz">
										  <img data-taobao ="1" src="<?php echo THEME_STYLE_PATH;?>style/images/b_red_1.gif" alt="心1">
									   </div>
										<ul id="ulli" style="display:none;" >
										  	 <li><img data-taobao ="1" src="<?php echo THEME_STYLE_PATH;?>style/images/b_red_1.gif" alt="心1"></li>
										  	 <li><img data-taobao ="2" src="<?php echo THEME_STYLE_PATH;?>style/images/b_red_2.gif" alt="心2"></li>
										  	 <li><img data-taobao ="3" src="<?php echo THEME_STYLE_PATH;?>style/images/b_red_3.gif" alt="心3"></li>
										  	 <li><img data-taobao ="4" src="<?php echo THEME_STYLE_PATH;?>style/images/b_red_4.gif" alt="心4"></li>
										  	 <li><img data-taobao ="5" src="<?php echo THEME_STYLE_PATH;?>style/images/b_red_5.gif" alt="心5"></li>
										     <li><img data-taobao ="6" src="<?php echo THEME_STYLE_PATH;?>style/images/b_blue_1.gif" alt="钻石1"></li>
										     <li><img data-taobao ="7" src="<?php echo THEME_STYLE_PATH;?>style/images/b_blue_2.gif" alt="钻石2"></li>
										     <li><img data-taobao ="8" src="<?php echo THEME_STYLE_PATH;?>style/images/b_blue_3.gif" alt="钻石3"></li>
										     <li><img data-taobao ="9" src="<?php echo THEME_STYLE_PATH;?>style/images/b_blue_4.gif" alt="钻石4"></li>
										     <li><img data-taobao ="10" src="<?php echo THEME_STYLE_PATH;?>style/images/b_blue_5.gif" alt="钻石5"></li>
										     <li><img data-taobao ="11" src="<?php echo THEME_STYLE_PATH;?>style/images/s_cap_1.gif" alt="皇冠1"></li>
										     <li><img data-taobao ="12" src="<?php echo THEME_STYLE_PATH;?>style/images/s_cap_2.gif" alt="皇冠2"></li>
										     <li><img data-taobao ="13" src="<?php echo THEME_STYLE_PATH;?>style/images/s_cap_3.gif" alt="皇冠3"></li>
										     <li><img data-taobao ="14" src="<?php echo THEME_STYLE_PATH;?>style/images/s_cap_4.gif" alt="皇冠4"></li>
										     <li><img data-taobao ="15" src="<?php echo THEME_STYLE_PATH;?>style/images/s_cap_5.gif" alt="皇冠5"></li>
										</ul>
										
									</div>
									
								</dd>
     -->       								
								<input type="hidden" name="bLevel" id="tbxy"  value="1" />
								<input type="hidden" name="account_level" id="tbxy_img"  value="<?php echo THEME_STYLE_PATH;?>style/images/b_red_1.gif" />
							</dl>
               
                            <?php if(C('bind_tb_img') ==1) { ?>
							<dl >
								<dt class="tbxyTitle"><span>信誉截图：</span>请上传您淘宝账号的信誉截图<a href="#" class="help">如何上传?</a></dt>
								
								<dd class="clear ">
									<div class="posi float_left">
										<a href="javascript:;" name="uploadify" id="img1">
											<img  src="<?php echo THEME_STYLE_PATH;?>style/images/idcard_image.jpg" width="112px" height="117px"/>
											<input type="hidden" name="img_url[0]" value="" id="img_url1" />
										</a>
									</div>
								</dd>
							</dl>
                            <?php } ?>

							<dl class="order_id" style="font-size:12px">
								<dt><span>温馨提示：</span></dt>
								<dd>1、只有用绑定过的账号下单,才能获得返利</dd>
								<dd>2、每个<?php echo C('webname');?>会员仅限绑定<?php echo C('bind_tb_nums');?>个账号</dd>
								<dd>3、如果发现自己帐号,被其它人绑定,请联系平台客服更换</dd>
							</dl>
							<span class="msg"></span>
						</div>
						<div>
							<a href="javascript:;" class="aut_push" id="aut_push">立即绑定</a>
						</div>
					</div>
					<!-- 绑定列表 start -->
			<div class="bind_taobao_lists">
				<dl>
					<dt>已绑定账号</dt>
					<dd>
						<table>
							<tr>
								<th style="width: 155px;">账号</th>
								<th style="width: 146px;">买家信用</th>
								<th style="width: 146px;">绑定时间</th>
								<th style="border: none;">操作</th>
							</tr>
							<?php $n=1;if(is_array($infos)) foreach($infos AS $info) { ?>
								<tr>
									<td><?php echo $info['account'];?></td>
									<td>
									<?php if($info['account_level'] !="") { ?>
									<img src="<?php echo $info['account_level'];?>" title="<?php echo $info['bLevel'];?>级" />
									<?php } ?>
									</td>
									<td><?php echo dgmdate($info['inputtime']);?></td>
									<td style="border: none;">
									    <?php if($info['is_default'] == 0) { ?>
									    	<a href="javascript:;" data-id="<?php echo $info['id'];?>" onclick="taobao_setdefault(<?php echo $info['id'];?>)">设为默认</a>
									       <?php } else { ?>
									        <span style="color:red;">【默认】</span>
									    <?php } ?>
										<a href="javascript:;" data-id="<?php echo $info['id'];?>" data-url="<?php echo U('Member/Attesta/bind_del');?>" data-account="<?php echo $info['account'];?> " class="bind_del">删除绑定</a>
                                        <?php if($info['taobao_img']) { ?>
										 <a href="javascript:;" onclick="(get_toabao_img('<?php echo $info['taobao_img'];?>'))">查看信誉截图</a>
                                        <?php } ?>
									</td>
								</tr>
							<?php } ?>
						</table>
					</dd>
				</dl>
			</div>
			<!-- 绑定列表 end -->
				</div>
			</div>
		</div>
	</div>
	<?php include template('footer','common'); ?>
   <script type="text/javascript" src="<?php echo JS_PATH;?>tool/tool.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#taobao").focus(function(){
		$(".msg").html("请输入账号");
	});
	$("#taobao").blur(function(){
		var _this = $(this).val();
		if(_this == ''){
			$(".msg").html("账号不能为空");
		}else{
			$(".msg").html("<font color='green'>账号输入正确</font>");
		}
	});
	
	/*绑定淘宝帐号*/
	$("#aut_push").click(function(){
		if("" == $("#taobao").val()){
			$(".msg").html("请输入账号");
			return false;
		}

		if($('#img_url1').val() == ''){
			$(".msg").html("请上传淘宝帐号截图");
			return false;

		}

			$(".msg").html("<font  color='green'>输入正确</font>");
			var data ={
				'account': $("#taobao").val(),
                'bLevel':  $("#tbxy").val(),
                'account_level': $("#tbxy_img").val(),
                'taobao_img' : $("#img_url1").val()
			}
			$.post("<?php echo U('Member/Attesta/bindtaobao');?>",{'data':data},function(data){
				if(data.status == 1){
					art.dialog({lock: true,fixed: true,icon: 'succeed',title: '绑定成功',time:3,content: data.info,ok: function (){location.reload();}});
				}else{
					art.dialog({lock: true,fixed: true,icon: 'error',title: '绑定失败',content: data.info,ok: function (){location.reload();}});
				}
			},"json");
		
	});

	//绑定列表样式
	$(".bind_taobao_lists tr:odd").css("background-color","#eeeeee");

    /*信誉图片上传*/
	uploader('#img1','#img_url1','#img1 img');
});


//删除
 $(".bind_del").click(function(){
	var id = $(this).attr('data-id');
	$.post("<?php echo U('Member/Attesta/bind_del');?>",{id:id,again:true},function(data){
		if(data.status == 1){
			art.dialog({lock: true,fixed: true,icon: 'succeed',title: '删除成功',time:3,content: data.info,ok: function (){location.reload();}});
		}else{
			art.dialog({lock: true,fixed: true,icon: 'error',title: '操作失误,请稍后再操作',content: data.info,ok: function (){location.reload();}});
		}
	},"json");

});

 /*设为默认帐号*/

 function taobao_setdefault(id){

 	$.getJSON("<?php echo U('Member/Attesta/setdefault');?>",{'id':id},function(s){

 		if(s.status == 1){
 			art.dialog({
 				lock: true,fixed: true,icon: 'succeed',title: '设为默认成功',time:3,content: s.info,
 				ok: function (){
	 				location.reload();
	 			}
	 		});
 		}else{
 			art.dialog({lock: true,fixed: true,icon: 'error',title: '设为默认失败',content: s.info,ok: function (){location.reload();}});
 		}

 	})
 }

 /*查看已上传的信誉截图*/
 function get_toabao_img(img){
	art.dialog({
		lock: true,fixed: true,
		title: '已上传的信誉截图',
		time:5,
		content:'<img src="'+img+'" />',
		ok: function (){

			}
		});
 }


 /*解除绑定*/
 $("#unbind").click(function(){
	var id = parseInt($(this).attr('data-id'));

	$.post("<?php echo U('Member/Attesta/unbind');?>",{id:id,again:true},function(data){
		if(data.status == 1){
			art.dialog({lock: true,fixed: true,icon: 'succeed',title: '解绑成功',time:3,content: data.info,ok: function (){location.reload();}});
		}else{
			art.dialog({lock: true,fixed: true,icon: 'error',title: '操作失误,请稍后再操作',content: data.info,ok: function (){location.reload();}});
		}
	},"json");

});
	

$("#ulli li").click(function(){
	$('#ulli').hide();
	$("#tbxy").val($(this).find('img').attr('data-taobao'));
	$("#tbxy_img").val($(this).find('img').attr('src'));
	$("#selectzzz img").attr('src',$(this).find('img').attr('src'))
})

$("#selectzzz ").click(function(){
	if($("#ulli").is(":hidden")){
		$('#ulli').show();
	}else{
		$('#ulli').hide();
	}
	
})

/*上传帮助提示*/

$('.help').click(function(){

	var html = "第一步 打开淘宝，登录进去之后，进入个人中心<br/>";
	    html += '<img width="500" src="<?php echo THEME_STYLE_PATH;?>style/img/tao_help1.png" /><br/>';
        html += '第二步 截取以下选中区域上传<br/>';
        html += '<img width="500" src="<?php echo THEME_STYLE_PATH;?>style/img/tao_help2.png" /><br/>';
	art.dialog({
		lock: true,fixed: true,
		title: '上传帮助提示',
		content:html,
		ok: function (){

			}
		});

})

/*




 */

</script>