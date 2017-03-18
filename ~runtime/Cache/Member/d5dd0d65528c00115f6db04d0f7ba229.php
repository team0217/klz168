<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title> 
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">
	<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/base.css" />
	<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/user_style.css" />
	<link rel="stylesheet" type="text/css" href="/templates/cloud3/style/css/s_user_style.css" />
	<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>

	<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
	<link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" />
	<script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>

</head>
	<style type="text/css" media="screen">
	.user_pass_box_form .js_css div {
	float: left;
	height: 36px;
	line-height: 36px;
	}

	.user_pass_box_form .js_css .onError{
		color:red;
	}
	.user_pass_box_form .js_css .onShow{
		color:green;
	}
	.user_pass_box_form .js_css .onCorrect{
		color:green;
	}
	</style>
<body>
	<?php include template('v2_header','member/common'); ?>
	<div id="content">
		<div class="wrap">
			<p class="hint-wz clear hint_wz_2">
				当前位置： <b>首页 ></b> <b>实名认证</b>
			</p>
		</div>

		<div class="user_index_content wrap-and clear">
			<?php include template('v2_member_left','member/common'); ?>
			<div class="fr u_index_mess user_pd_1">
				<h2 class="user_page_title">实名认证</h2>

				<dl class="user_pass_box_form" id="goods_albums">
					<form id="myform">
						<?php if($rs) { ?>
						<input type="hidden" name="id" value="<?php echo $rs['id'];?>" id="id">
						<?php } ?>
						<dt>注意，实名认证后不可修改！ 采用联网认证！</dt>
						<dd class="clear js_css">
							<label for="identity_name" class="fl">身份证姓名：</label>
							<input type="text" name="name" value="<?php echo $identity['name'];?>" id="name"  class="txt fl"/>
						</dd>
						<dd class="clear js_css">
							<label for="new_pass" class="fl">身份证号码：</label>
							<input type="text" name="id_number" value="<?php echo $identity['id_number'];?>" id="id_number" class="txt fl"/>
						</dd>
						<!-- 							
										<dd class="clear">
						<label for="new_pass_repeat" class="fl">正面证照：</label>
						<div class="posi float_left">
							<a href="javascript:;" name="uploadify" id="img1">
								<?php if($identity[img_url]) { ?>
								<img src="<?php echo $identity['img_url']['0'];?>" width="112px" height="117px"/>
								<?php } else { ?>
								<img src="<?php echo THEME_STYLE_PATH;?>style/images/idcard_image.jpg" width="112px" height="117px"/>
								<?php } ?>
								<input type="hidden" name="img_url[0]" value="<?php echo $identity['img_url']['0'];?>"  id="img_url1" />
							</a>
						</div>

					</dd>

					<dd class="clear" style="padding-top:65px;">
						<label for="new_pass_repeat" class="fl">反面证照：</label>
						<div class="posi float_left">
							<a href="javascript:;" name="uploadify" id="img2">
								<?php if($identity[img_url]) { ?>
								<img src="<?php echo $identity['img_url']['1'];?>" width="112px" height="117px"/>
								<?php } else { ?>
								<img src="<?php echo THEME_STYLE_PATH;?>style/images/idcard_image.jpg" width="112px" height="117px"/>
								<?php } ?>
								<input type="hidden" name="img_url[1]" value="<?php echo $identity['img_url']['1'];?>" id="img_url2" />
							</a>
						</div>

					</dd>
					-->
					<dd class="clear" style="padding-left:147px;padding-top:50px;">
						<input type="button" disabled style="color: #777;background: #e9e9e9;"  value="提交"  id="js_submit" class="submit  "/>
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

			$.formValidator.initConfig({
				formid:"myform",
				autotip:true,
				onerror:function(msg,obj){
					$(obj).focus();
				}
			});
			/*身份证姓名/^\s*[\u4e00-\u9fa5]{1,}[\u4e00-\u9fa5.·]{0,15}[\u4e00-\u9fa5]{1,}\s*$/*/
			$("#name").formValidator({
				onshow:true,
				onfocus:"请输入身份证姓名"
			}).inputValidator({
				min:2,
				max:50,
				onerrormin: "身份证不能为空",
			    onerrormax: "不超过50个字符，汉字算两个字符"
			}).regexValidator({
				regexp:'chinese',
				datatype:'enum',
				onerror:"姓名输入错误"
			});
			/*身份证号验证*/
			$("#id_number").formValidator({
				empty:false,
				onempty:'身份证号不能为空',
				onshow:true,
				onfocus:"请输入身份证号码" 
			}).regexValidator({
				regexp:'idcard',
				datatype:'enum',
				onerror:'身份证号码错误'
			}).ajaxValidator({
			    url : "<?php echo U('idservice');?>",
			    datatype:'json',
			    async:false,
			    success:function(ret) {
			        if(ret == 0) {
			        	$("#js_submit").removeAttr("disabled");
			        	$("#js_submit").css({"background":"#FF6C00","border-color":"#FF6C00","color":"#fff"});
			            return true;
			        } else{
			            return false;
			            $("#js_submit").css({"color":"#777","background":"#e9e9e9"});


			        }
			    },
			    onerror:'身份证号码联网认证不通过'
			});

			</script>
<link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" />
<script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>
<script type="text/javascript">
			//图片上传功能
			$(document).ready(function() {
				var goods_album = $("#goods_albums").find('.posi');
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
					}

					uploader.onUploadError = function(file, reason) {
						alert('文件上传错误：' + reason);
					}
				}
			})
			</script>
<script type="text/javascript">
				$("#js_submit").click(function(){
					var name = $("#name").val();
					var id_number = $("#id_number").val();
					var img_url1 = $("#img_url1").val();
					var img_url2 = $("#img_url2").val();
					var rs = "<?php echo $rs['id']; ?>";
					if (rs != '') {
						var id = rs;
					};
					var img_url=new Array()
						img_url[0] = img_url1;
						img_url[1] = img_url2;

					if (name == '') {
						$("#name").focus();
						return false;
					};
					if (id_number == '') {
						$("#id_number").focus();
						return false;
					};

			$.post("<?php echo U('Member/Attesta/name_attesta');?>",{name:name,id_number:id_number,img_url:img_url,id:id},function(data){
									if (data.status == 1) {


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