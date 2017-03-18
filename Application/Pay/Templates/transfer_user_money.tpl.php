<?php 
	defined('IN_ADMIN') or exit('No permission resources.');
	include $this->admin_tpl('header', 'admin');
?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});

	$("#unit").formValidator({onshow:"<?php echo L('input_price_to_change')?>",onfocus:"<?php echo L('number').L('empty')?>"}).inputValidator({min:1,max:999,onerror:"<?php echo L('number').L('empty')?>"}).regexValidator({regexp:"^(([1-9]{1}\\d*)|([0]{1}))(\\.(\\d){1,2})?$",onerror:"<?php echo L('must_be_price')?>"});

	//邮箱或者手机联合验证
	$("#form_email").formValidator({
		onshow:"输入邮箱或者手机",
		onfocus:"邮箱或手机不能为空",
		oncorrect:"正确"
	}).inputValidator({
		min:2,max:32,
		onerror:"邮箱或者手机格式错误"
	}).ajaxValidator({
	    type : "get",
		url : "<?php echo U('public_checkemail_ajax'); ?>",
		datatype : "json",
		async:'false',
		success : function(data){
            $("#form_balance").html('用户余额：￥'+data.info.rs[0].money);
            return (data.status == 1) ? true:false;
		},
		buttons: $("#dosubmit"),
		onerror : "<?php echo L('user_not_exist')?>",
		onwait : "<?php echo L('checking')?>"
	});
    $("#to_email").formValidator({
        onshow:"输入邮箱或者手机",
        onfocus:"邮箱或手机不能为空",
        oncorrect:"正确"

    }).inputValidator({
            min:2,max:32,
            onerror:"邮箱或者手机格式错误"
        }).ajaxValidator({
            type : "get",
            url : "<?php echo U('public_checkemail_ajax'); ?>",
            datatype : "json",
            async:'false',
            success : function(data){
                $("#to_balance").html('用户余额：￥'+data.info.rs[0].money);
                return (data.status == 1) ? true:false;
            },
            buttons: $("#dosubmit"),
            onerror : "<?php echo L('user_not_exist')?>",
            onwait : "<?php echo L('checking')?>"
        });
	
	$("#usernote").formValidator({onshow:"<?php echo L('input').L('reason_of_modify')?>",onfocus:"<?php echo L('usernote').L('empty')?>"}).inputValidator({min:1,max:999,onerror:"<?php echo L('usernote').L('empty')?>"});
})
//-->
</script>
<div class="pad-10">
<div class="common-form">
<form name="myform" action="<?php echo U('transfer_user_money');?>" method="post" id="myform">
<table width="100%" class="table_form">
<tr>
<td  width="120">金额类型</td>
<td>
	<input name="pay_type" value="2" type="radio" id="pay_type" checked> 余额</td>
</tr>
<tr>
<td  width="120">来源方用户</td>
<td><input type="text" name="form_email" placeholder="邮箱或手机" size="15" value="<?php echo $email?>" id="form_email"><span id="form_balance"><span></td>
</tr>
<tr>
<td  width="120">目标方用户</td>
<td><input type="text" name="to_email" size="15" placeholder="邮箱或手机" value="<?php echo $email?>" id="to_email"><span id="to_balance"><span></td>
</tr>
<tr>
<td  width="120">金额</td>
<td><input type="text" name="unit" size="10" value="<?php echo $unit?>" id="unit"></td>
</tr>
<tr>
<td  width="120"><?php echo L('trading').L('usernote')?></td> 
<td><textarea name="usernote"  id="usernote" rows="5" cols="50"></textarea></td>

</tr>
</table>
<div class="bk15"></div>
<input name="time" value="<?php echo time() ?>" type="hidden"  />
<input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="button" id="dosubmit">
</form>
</div>
</div>
</body>
</html>
<script type="text/javascript">
	var emailTip_onCorrect = $("#emailTip").hasClass("onCorrect");
	var unitTip_onCorrect = $("#unitTip").hasClass("onCorrect");
	var usernoteTip_onCorrect = $("#usernoteTip").hasClass("onCorrect");
	// var emailTip_onShow = $("#emailTip").hasClass("onShow");
	// var unitTip_onShow = $("#unitTip").hasClass("onShow");
	// var usernoteTip_onShow = $("#usernoteTip").hasClass("onShow");
	if(emailTip_onCorrect && unitTip_onCorrect && usernoteTip_onCorrect){
		$("form").submit(function() {
		$("#dosubmit").val("正在处理...");
  		$("#dosubmit").attr("disabled", "disabled");
	});
		
	}



$(document).ready(function() {
	$("#paymethod input[type='radio']").click( function () {
		if($(this).val()== 0){
			$("#rate").removeClass('hidden');
			$("#fix").addClass('hidden');
			$("#rate input").val('0');
		} else {
			$("#fix").removeClass('hidden');
			$("#rate").addClass('hidden');
			$("#fix input").val('0');
		}	
	});
});
function category_load(obj)
{
	var modelid = $(obj).attr('value');
	$.get('?m=admin&c=position&a=public_category_load&modelid='+modelid,function(data){
			$('#load_catid').html(data);
		  });
}
</script>


