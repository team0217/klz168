<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
		<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
		<meta name="description" content="<?php echo $SEO['description'];?>">
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
        <script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/validate.js"></script>


	</head>
	<style type="text/css" media="screen">
	.user_pass_box_form .js_css div {
		float: left;
		height: 36px;
		line-height: 36px;
	}
	.user_pass_box_form{
		border-left:solid 1px #eee;
		width:400px;
	}
	.user_pass_box_form{ position:relative; }

	.user_pass_box_form .js_css .onError{
		color:red;
	}
	.user_pass_box_form .js_css .onShow{
		color:green;
	}
	.user_pass_box_form .js_css .onCorrect{
		color:green;
	}

	.user_pass_box_form dd label{ width:100px; }

	</style>
	
	<body>

		<link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" /> 
<script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>
<script type="text/javascript">
//图片上传功能
$(document).ready(function() {
	$(".add_receiving_address_ico").click(function(){
		$(this).siblings("div").show();
	});
	//$('.onCorrect').attr('style','display:none;');
	var goods_album = $("#goods_albums").find('a  img');
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
		    	"filetype_post":"jpg|jpeg|gif|bmp|png",
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
				$(pickid).find('img').attr('src', arr[1]);
				$(pickid).find('input[type=hidden]').eq(0).attr('value', arr[1]);
			}

			$.post("<?php echo U('Member/profile/update_avatar');?>",{
                    avatar:arr[1]
                },function(data){
                    //location.reload();
                },'json')
		}

		uploader.onUploadError = function(file, reason) {
			alert('文件上传错误：' + reason);
		}
	}
})


</script>
		<style type="text/css" media="screen">
			.user_file_btn{ width:98%;text-align:center; padding:0; background:#ccc; border:solid 1px #999 !important; position:absolute; border-radius:3px; bottom:0px;left:0;height:26px; font-size:12px; line-height:26px; }
			.user_file_btn:active{ background:#ccc;}
		</style>


		
		<?php include template('v2_header','member/common'); ?>

		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>个人资料</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
									<?php include template('v2_member_left','member/common'); ?>

				<style type="text/css" media="screen">
					body .webuploader-pick{ height:146px; }
				</style>
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">个人资料</h2>
					
					<dl class="user_pass_box_form" id="goods_albums">
						<form id="myform">
						
		 				<a style="position:absolute;left:-142px;top:40px;" href="javascript:;" name="uploadify"  id="img1">
							<img style="border-radius:50%;" src="<?php echo $this->userinfo['avatar'];?>" width="112px" height="112px"/>
							<!-- <div>
								
							
								<input type="hidden" id="file_url" name="avatar" />
							

							</div> --><!-- / -->
							
							<span class="user_file_btn" id="logo" style="">请点击上传头像</span>


						</a>


							<dt></dt>
							<dd class="clear js_css">
								<label for="identity_name" class="fl">昵称</label>
								<input type="text" id="nickname" name="nickname" value="<?php echo $userinfo['nickname'];?>" class="txt fl" />
								
							</dd>
							<dd class="clear js_css">
								<label for="new_pass" class="fl">性别</label>
								<span><input type="radio" name="sex" value="2" <?php if($sex == '2') { ?>checked="checked"<?php } ?>/></span>
								<span>男</span>&nbsp; 
								<span><input type="radio" name="sex" <?php if($sex == '1') { ?>checked="checked"<?php } ?> value="1" /></span>
								<span>女</span>&nbsp;
								<span><input type="radio" name="sex" <?php if(!$sex) { ?>checked="checked"<?php } ?> value="0" /></span>
								<span>保密</span>
							</dd>
							<dd class="clear js_css">
								<label for="new_pass" class="fl">生日</label>
								<select name="year" id="year" class="c999999" onchange="getDates()" >
									<script language="javascript" type="text/javascript"> 
										var date=new Date(); 
										var year=date.getFullYear();
										var years = "<?php echo $year; ?>";
										for(var i=year;i>=year-50;i--){ 
											if (years != '') {
												if (i == years) {
													document.write("<option value="+years+" selected>"+years+"</option>"); 
												}else{
													document.write("<option value="+i+">"+i+"</option>"); 
												}
											}else{
											document.write("<option value="+i+">"+i+"</option>"); 
											}
										} 
										function append(o,v){ 

										var option=new Option(v,v); 
										o.options.add(option); 
										}
										function getDates(){
										var y=document.getElementsByName("year")[0].value; 
										var m=document.getElementsByName("month")[0].value;
										var day=document.getElementsByName("day")[0]; 
										day.innerHTML="";
										if(m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12){ 
										for(var j=1;j<=31;j++){ 
										append(day,j); 
										} 
										} 
										else if(m==4 || m==6 || m==9 || m==11){ 
										for(var j=1;j<=30;j++){ 
										append(day,j); 
										} 
										} 
										else if(m==2){ 
										var flag=true; 
										flag=y%4==0&&y%100!=0||y%400==0; 
										if(flag){ 
										for(var j=1;j<=29;j++){ 
										append(day,j); 
										} 
										} 
										else{ 
										for(var j=1;j<=28;j++){ 
										append(day,j); 
										} 
										} 
										}
										} 
										</script> 
								</select>
								<select name="month" class="c999999" onchange="getDates()" >
								<script language="javascript" type="text/javascript">
										var month = "<?php echo $month; ?>";
										for(var i=1;i<=12;i++){ 
											if (month != '') {
											if (i == month) {
												document.write("<option value="+month+" selected>"+month+"</option>"); 
											}else{
												document.write("<option value="+i+">"+i+"</option>"); 
											};

										}else{
											document.write("<option value="+i+">"+i+"</option>"); 

											}
										} 
									</script>
								</select>
								<select name="day" class="c999999">
									<script language="javascript" type="text/javascript">
										var day = "<?php echo $day; ?>";
										for(var i=1;i<=31;i++){ 
											if (day != '') {
											if (i == day) {
												document.write("<option value="+day+" selected>"+day+"</option>"); 
											}else{
												document.write("<option value="+i+">"+i+"</option>"); 
											}

										}else{
												document.write("<option value="+i+">"+i+"</option>"); 
										}
											
										} 
									</script>
								</select>

							</dd>

							<dd class="clear js_css">
								<label for="new_pass" class="fl">所在地</label>
								<select name="province" class="c999999" id="province">
									<option value="-1">请选择</option>
									<?php $n=1;if(is_array($region)) foreach($region AS $v) { ?>
									<option <?php if($v['linkageid'] == $provice) { ?>selected<?php } ?> value="<?php echo $v['linkageid'];?>"><?php echo $v['name'];?></option>
									<?php $n++;}unset($n); ?>
								</select>

							</dd>
							<dd class="clear js_css">
								<label for="new_pass" class="fl">收货地址</label>
								<input type="text" id="r_address" name="receives[r_address]" value="<?php echo $r_address;?>" class="txt fl"/>

							</dd>
							<dd class="clear js_css">
								<label for="new_pass" class="fl">收货人</label>
								<input type="text" id="r_name" name="receives[r_name]" value="<?php echo $r_name;?>" class="txt fl"/>

							</dd>
							<dd class="clear js_css">
								<label for="new_pass" class="fl">联系QQ</label>
								<input type="text"  id="qq" name="qq" value="<?php echo $userinfo['qq'];?>" class="txt fl"/>

							</dd>
							<dd class="clear js_css">
								<label for="new_pass" class="fl">联系电话</label>
								<input type="text"  id="r_phone" name="receives[r_phone]" value="<?php echo $r_phone;?>" class="txt fl"/>

							</dd>
<!-- 
							<dd class="clear">
								<label for="new_pass_repeat" class="fl">用户头像</label>
								<div class="posi float_left">
									<a href="javascript:;" name="uploadify" id="img1">
										<img src="<?php echo $this->userinfo['avatar'];?>" width="112px" height="117px"/>
										<input type="hidden" id="file_url" name="avatar" />
									</a>
								</div>
							</dd>
 -->

							




							<dd class="clear" style="padding-left:147px;padding-top:80px;">
								<input type="button"  value="提交"  id="js_submit" class="submit fl "/>
							</dd>
						
						</form>
					</dl>
					
				</div>
			</div>

		</div>
		
			<?php include template('footer','common'); ?>

	</body>
</html>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js" charset="UTF-8"></script>
	<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>formvalidatorregex.js" charset="UTF-8"></script>
<script type="text/javascript">
	$(function(){
		$.formValidator.initConfig({
		formid:"myform",
		autotip:true,
		onerror:function(msg,obj){
			$(obj).focus();
		}
		});
		/* 用户名昵称 */
		<?php if(empty($userinfo[nickname])) { ?>
		$("#nickname").formValidator({
			empty:false,
			onempty:'用户昵称不能为空',
			onshow:true,
			onfocus:'请输入用户昵称'
		}).functionValidator({
			fun:function(val,elem){
				if(val.length < 2 || val.length >20){
					return '请输入2-20个字符，使用字母数字加上下划线';
				}
				return true;
			}
		}).regexValidator({
			regexp:'ps_username',
			datatype:'enum',
			onerror:'用户名只能是数字或字母'
		})
		<?php } else { ?>
		$("#nickname").formValidator({
			empty:false,
			onempty:'用户昵称不能为空',
			onshow:true,
			oncorrect:true,

			onfocus:'请输入用户昵称',
		}).functionValidator({
			fun:function(val,elem){
				if(val.length < 2 || val.length >20){
					return '请输入2-20个字符，使用字母数字加上下划线';
				}
				return true;
			}
		}).regexValidator({
			regexp:'ps_username',
			datatype:'enum',
			onerror:'用户名只能是数字或字母'
		}).defaultPassed();
		<?php } ?>
		
		/*收货地址*/
		<?php if(empty($r_address)) { ?>
		$("#r_address").formValidator({
			empty:false,
			onempty:'收货地址不能为空',
			onshow:true,
			onfocus:'请输入收货地址'
		}).inputValidator({
			min:2,
			max:100,
			onerror:'收货地址字符为2到100个字符' 
		});
		<?php } else { ?>
		$("#r_address").formValidator({
			empty:false,
			onempty:'收货地址不能为空',
			onshow:true,
			oncorrect:true,
			onfocus:'请输入收货地址'
		}).inputValidator({
			min:2,
			max:100,
			onerror:'收货地址字符为2到100个字符' 
		}).defaultPassed();
		<?php } ?>
		/*收货人*/
		<?php if(empty($r_name)) { ?>
		$("#r_name").formValidator({
			empty:false,
			onempty:'收货人不能为空',
			onshow:true,
			onfocus:'请输入收货人'
		}).inputValidator({
			min:2,
			max:20,
			onerror:'收货人字符为2到20个字符' 
		});
		<?php } else { ?>
		$("#r_name").formValidator({
			empty:false,
			onempty:'收货人不能为空',
			onshow:true,
			oncorrect:true,
			onfocus:'请输入收货人'
		}).inputValidator({
			min:2,
			max:20,
			onerror:'收货人字符为2到20个字符' 
		}).defaultPassed();
		<?php } ?>


		/*联系qq*/
		<?php if(empty($userinfo['qq'])) { ?>
		$("#qq").formValidator({
			empty:false,
			onempty:'联系qq不能为空',
			onshow:true,
			onfocus:'请输入联系qq'
		}).regexValidator({
			regexp:'qq',
			datatype:'enum',
			onerror:'联系qq输入错误'
		});
		<?php } else { ?>
		$("#qq").formValidator({
			empty:false,
			onempty:'联系qq不能为空',
			onshow:'请输入联系qq',
			oncorrect:true,
			onfocus:'请输入联系qq'
		}).regexValidator({
			regexp:'qq',
			datatype:'enum',
			onerror:'联系qq输入错误'
		}).defaultPassed();
		<?php } ?>	
		/*联系电话*/
		<?php if(empty($r_phone)) { ?>
		$("#r_phone").formValidator({
			empty:false,
			onempty:'联系电话不能为空',
			onshow:true,
			onfocus:'请输入联系电话'
		}).regexValidator({
			regexp:'mobile',
			datatype:'enum',
			onerror:'联系电话输入错误'
		});
		<?php } else { ?>
		$("#r_phone").formValidator({
			empty:false,
			onempty:'联系电话不能为空',
			onshow:true,
			oncorrect:true,
			onfocus:'请输入联系电话'
		}).regexValidator({
			regexp:'mobile',
			datatype:'enum',
			onerror:'联系电话输入错误'
		}).defaultPassed();
		<?php } ?>	
	})
</script>
<script type="text/javascript">
		$(document).ready(function(){
			//查询省市
			$("#province").change(function(){
				$("#city").remove();
				var _this = $(this).val();
				$.ajax({
					url:'<?php echo U('Member/Profile/get_area');?>',
					type:'post',
					dataType:'json',
					data:{'id':_this},
					success:function(data){
						var html = '';
						html += '&nbsp;<select name="city" class="c999999" id="city">';
						$.each(data ,function(i,item){
							html += '<option value="'+item.linkageid+'">'+item.name+'</option>';
						});
						html += '</select>';
						$("#province").after(html);
					}
				});
			});
			//查询城镇
			$(document).on('change','#city',function(){
				$("#area").remove();
				var _this = $(this).val();
				$.ajax({
					url:'<?php echo U('Member/Profile/get_area');?>',
					type:'post',
					dataType:'json',
					data:{'id':_this},
					success:function(data){
						var html = '';
						html += '&nbsp;<select name="area" class="c999999" id="area">';
						$.each(data ,function(i,item){
							html += '<option value="'+item.linkageid+'">'+item.name+'</option>';
						});
						html += '</select>';
						$("#city").after(html);
					}
				});
			});
			
			//默认地址 取得选中的省市id
			var city = "<?php echo $city;?>"; 
			var proid = $("#province").find("option:selected").val();
			$.ajax({
				url:'<?php echo U('Member/Profile/get_area');?>',
				type:'post',
				dataType:'json',
				data:{'id':proid},
				success:function(data){
					var html = '';
					html += '&nbsp;<select name="city" class="c999999" id="city">';
					$.each(data ,function(i,item){
						if(item.linkageid == city){
							html += '<option value="'+item.linkageid+'" selected>'+item.name+'</option>';
						}else{
							html += '<option value="'+item.linkageid+'">'+item.name+'</option>';
						}
					});
					html += '</select>';
					$("#province").after(html);
				}
			});
			//alert(city);
			//默认的乡镇
			$.ajax({
				url:'<?php echo U('Member/Profile/get_area');?>',
				type:'post',
				dataType:'json',
				data:{'id':city},
				success:function(data){
					var html = '';
					html += '&nbsp;<select name="area" class="c999999" id="area">';
					var area = "<?php echo $area;?>";//乡镇
					$.each(data ,function(i,item){
						if(item.linkageid == area){
							html += '<option value="'+item.linkageid+'" selected>'+item.name+'</option>';
						}else{
							html += '<option value="'+item.linkageid+'">'+item.name+'</option>';
						}
					});
					html += '</select>';
					$("#city").after(html);
				}
			});
		});						
	</script>
<script type="text/javascript">
	$("#js_submit").click(function(){
		var nickname = $("#nickname").val();
		var sex = $("input[name='sex']:checked").val()
		var province = $("#province  option:selected").val();
		var city = $("#city  option:selected").val();
		var area = $("#area  option:selected").val();
		var year = $("#year  option:selected").val();
		var month = $("#month  option:selected").val();
		var day = $("#day  option:selected").val();
		var r_address = $("#r_address").val();
		var r_name = $("#r_name").val();
		var qq = $("#qq").val();
		var r_phone = $("#r_phone").val();
		var receives = {
			r_address:r_address,
			r_name:r_name,
			r_phone:r_phone
		};

		
		

		if (nickname == '') {
			$("#nickname").focus();
			return false;
		};
		if (city < 0 || province < 0) {
			art.dialog({
						lock: true,
						fixed: true,
						icon: 'face-smile',
						title: '提示',
						content: '请选择所在地',
						okVal: '确定',
						ok:true
						});
			return false;

		};

		if (r_address == '') {
			$("#r_address").focus();
			return false;
		};
		if (r_name == '') {
			$("#r_name").focus();
			return false;
		};
		if (qq == '') {
			$("#qq").focus();
			return false;
		};
		if (r_phone == '') {
			$("#r_phone").focus();
			return false;
		};

		$.post("<?php echo U('Member/profile/infomation');?>",{nickname:nickname,sex:sex,year:year,month:month,day:day,province:province,city:city,area:area,qq:qq,receives:receives},function(data){
						if (data.status == 1) {
							art.dialog({
							lock: true,
							fixed: true,
							icon: 'face-smile',
							title: '提示',
							content: data.info,
							okVal: '确定',
							ok:function() { 
								location.href=data.url;
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

							};
											
					},'json');
							});
	
</script>