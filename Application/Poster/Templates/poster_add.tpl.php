<?php 
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = $show_validator = 1; 
include $this->admin_tpl('header', 'admin');
?>
<form method="post" action="<?php echo U('add');?>" id="myform">
<table class="table_form" width="100%" cellspacing="0">
<tbody>
	<tr>
		<th width="100">广告位名称：</th>
		<td><input name="poster[name]" id="name" class="input-text" type="text" size="25"></td>
	</tr>
	<tr>
    	<th align="right"  valign="top">广告类型：</th>
        <td valign="top" colspan="2"><?php echo $form::select($types, '', 'name="poster[type]" id="type" onchange="AdsType(this.value)"', $default);?>
        </td>
    </tr>
	<tr>
		<th>上线时间：</th>
		<td><?php echo $form::date('poster[start_time]',date('Y-m-d H:i:s', NOW_TIME),1)?></td>
	</tr>
	<tr>
		<th>下线时间：</th>
		<td><?php echo $form::date('poster[end_time]', '',1)?></td>
	</tr>
	</tbody>
	</table>

	<div class="pad-10 poster_type" id="imagediv">
		<fieldset>
			<legend>图片设置</legend>
			<table width="100%"  class="table_form">
				<tbody>
					<tr>
						<th width="80">链接地址：</th>
						<td class="y-bg">
						<input type="text" class="input-text" name="setting[image][linkurl]" id="linkurl3" size="30" value="http://" /></td>
						<td rowspan="2"><a href="javascript:flashupload('imgurl_images', '<?php echo L('upload_photo')?>','imgurl',preview,'1,<?php echo $this->M['ext']?>,1','poster', '', '<?php echo $authkey?>');void(0);"><img src="<?php echo IMG_PATH;?>icon/upload-pic.png" id="imgurl_s" width="105" height="88"></a><input type="hidden" id="imgurl" name="setting[image][imageurl]"></td>
					</tr>
					<tr>
						<th>图片说明：</th>
						<td class="y-bg"><input type="text" class="input-text" name="setting[image][alt]" id="alt3" size="30" /></td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>
	
	<div class="pad-10 poster_type" id="textdiv" style="display:none">
	<fieldset>
		<legend>文字链接</legend>
		<table width="100%"  class="table_form">
		<tbody>
			<tr>

				<th width="80">链接标题：</th>
				<td class="y-bg"><input type="text" class="input-text" name="setting[text][title]" value="" id="title" size="30" /></td>
			</tr>
			<tr>
				<th>链接地址：</th>
				<td class="y-bg"><input type="text" class="input-text" name="setting[text][linkurl]" id="link" size="30" value=""  /></td>
			</tr>
		</tbody>
		</table>
	</fieldset>
	</div>

	<div class="pad-10 poster_type" id="codediv" style="display:none">
	<fieldset>
		<legend>代码广告</legend>
		<table width="100%"  class="table_form">
		<tbody>
			<tr>
				<th width="80">代码内容：</th>
				<td class="y-bg"><textarea name="setting[code]" id="code" cols="55" rows="6"></textarea></td>
			</tr>
		</tbody>
		</table>
	</fieldset>
	</div>

<div class="bk15" style="margin-left:10px; line-height:30px;">
	<input type="submit" name="dosubmit" id="dosubmit" value="提交" class="button">&nbsp;
	<input type="reset" value=" 返回上页 " class="button" onclick="history.go(-1)">
</div>	
</form>
</body>
</html>
<script type="text/javascript">
function AdsType(type) {
	$('.poster_type').hide();
	$('#'+type+'div').show();
}
$(document).ready(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){$(obj).focus();}});
	$('#name').formValidator({
		onshow:"请输入广告位名称",
		onfocus:"请输入广告位名称"
	}).inputValidator({
		min:1,
		onerror:"广告位名称不能为空"
	});

	$('#type').formValidator({
		onshow:"请选择广告位类型",
		onfocus:"请选择广告位类型",
		defaultvalue:"image"
	}).inputValidator({
		min:0,
		onerror: "请选择广告位类型"
	});

	$('#start_time').formValidator({
		empty:true,
		onshow:"请选择广告上线时间",
		onfocus:"请选择广告上线时间"
	}).functionValidator({
		fun:isDateTime
	});

	$('#end_time').formValidator({
		empty:true,
		onshow:"请选择广告下线时间",
		onfocus:"请选择广告下线时间"
	}).functionValidator({
		fun:isDateTime
	});
});

function preview(uploadid,returnid){
	var d = window.top.art.dialog({id:uploadid}).data.iframe;
	var in_content = d.$("#att-status").html().substring(1);
	$('#'+returnid).val(in_content);
	$('#'+returnid+'_s').attr('src', in_content);
}
</script>
<script type="text/javascript" src="<?php echo JS_PATH?>swfupload/swf2ckeditor.js"></script>