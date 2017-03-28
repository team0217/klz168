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
	</head>
	<body>
		<?php include template('v2_header','member/common'); ?>
		
		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>发布试用报告</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
								<?php include template('v2_member_left','member/common'); ?>

				
				<script type="text/javascript">
					$(function(){
						$('#grade li').on('mouseover',function(){
							$(this).parents('#grade').find('li').removeClass('now');
							$(this).parents('#grade').find('li:lt('+($(this).index()+1)+')').addClass('now');
							$('#star').attr('value',($(this).index()+1));

						});

					var index = $("#star").val();
					
					});
				</script>
				
				<div class="fr u_index_mess user_pd_1">
					<form action="#" method="post">
						
					
					<dl class="u_i_form">
						<dt>发布试用报告</dt>
						<dd>
							<strong>试用内容：</strong>
							<span><?php echo $product['title'];?></span>
						</dd>
						<dd class="clear">
							<strong class="fl">试用打分:</strong>
							<ul id="grade" class="grade clear fl">
								<li class="now"></li>
								<li class="now"></li>
								<li class="now"></li>
								<li class="now"></li>
								<li class="now"></li>
							</ul>
							<input type="hidden" id="star" name="report[star]" value="<?php if($trial_report['id']) { ?><?php echo $trial_report['star'];?><?php } else { ?>5<?php } ?>" />
							<input type='hidden' name='order_id' value="<?php echo $order_id;?>" id="order_id"/>
							<input type='hidden' name='id' value="<?php echo $trial_report['id'];?>" id="id"/>

						</dd>
						<dd class="clear" id="user_index_photo">
							<strong class="fl title">上传试用图:</strong>
							<div class="fl box_wrap clear" id="picker">
<!-- 								<a href="javascript:;" class="up"></a>
 -->								<div class="p_wrap">
									<div class="box"><img src="<?php if($trial_report['id']) { ?><?php echo $trial_report['thumb'];?><?php } else { ?><?php echo THEME_STYLE_PATH;?>style/images/user/user_up_btn.png<?php } ?>" alt="" /></div>
									<input type="hidden" name="report[thumb]" value="<?php if($trial_report['id']) { ?><?php echo $trial_report['thumb'];?><?php } ?>" id="file_url" />
									
							</div>
						</dd>
						<dd>试用过程和体验:</dd>
						<dd>
							<div id="content_js_content" style="display:none;"></div>
							<textarea  name="report[content]" id="report[content]" class="js_content">
							<?php echo stripslashes($trial_report['content']);?></textarea>
							<?php echo $form::editor("report[content]"); ?>
						</dd>

						<dd>
							<input type="button" value="提交" class="submit" id="js_submit"/>
						</dd>
					</dl>
					
					</form>
				</div>
			</div>
			
		</div>
		
		<?php include template('footer','common'); ?>

	</body>
</html>
<link href="<?php echo JS_PATH;?>webuploader/webuploader.css" rel="stylesheet" /> 
<script src="<?php echo JS_PATH;?>webuploader/webuploader.js" type="text/javascript"></script>
<script type="text/javascript">
	


	//图片上传功能
	$(document).ready(function() {
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
			    	"args":"10,,",
			    	"filetype_post":"jpg|jpeg|gif|png",
			    	"swf_auth_key":"57a39f6f7415ec2cdd2b8afd77b57c3f",
			    	"isadmin":"1",
			    	"groupid":"2"
			    },
			    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
			    pick: {
			    	id: '#picker',
			    	multiple:true
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
			    fileNumLimit: 10,
			    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
			    resize: false
			});
			uploader.onUploadSuccess = function( file, response ) {
				var pickid = this.options.pick.id;
				var data = response._raw;
				var arr = data.split(',');
				var html = '';
				if(arr[0] > 0) {
				$(pickid).find('img').attr('src', arr[1]);
				$(pickid).find('input[type=hidden]').eq(0).attr('value', arr[1]);
			}
				/*if(arr[0] > 0) {
					html += '<div class="box">';
					html += '<img src="'+arr[1]+'" alt="" /><input type="hidden" name="report[thumb]" value="'+arr[1]+'" />';
					html += '</div>';
					$(".p_wrap").append(html);
				}*/
			}
	
			uploader.onUploadError = function(file, reason) {
				alert('文件上传错误：' + reason);
			}
	})
</script>

<script type="text/javascript">
	$("#js_submit").click(function(){
		// $('#content_js_content').html($('.js_content').html());



		var star = $("#star").val();
		var thumb = $("#file_url").val();
		var id = $("#id").val();
		var order_id = $("#order_id").val();
		
		var content = document.getElementById('ueditor_0').contentWindow.document.body.innerHTML;

		if (thumb == '') {
			art.dialog({
					lock: true,
					fixed: true,
					icon: 'face-smile',
					title: '提示',
					content: '请上传试用图',
					okVal: '确定',
					ok:true
					});
			return false;
		};

        $('#js_submit').attr("disabled", true).val('正在提交');
		$.post("<?php echo U('order/v2_trial_report');?>",{star:star,thumb:thumb,content:content,id:id,order_id:order_id},function(data){
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
							},
							cancel:function(){
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
							ok:function() { 
								location.href=data.url;
							},
							cancel:function(){
                                location.href=data.url;
							}
						});

							};
											
					},'json');
							});
	
</script>