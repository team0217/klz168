<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动管理-商家个人中心-缴纳保证金-<?php echo C('WEBNAME');?></title>
<meta name="keywords" content="活动管理,商家个人中心,缴纳保证金,<?php echo C('WEBNAME');?>" />
<meta name="description" content="活动管理,商家个人中心,缴纳保证金,<?php echo C('WEBNAME');?>" />   
<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/s_user_style.css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/n_businessman.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>

</head>
<body>

      <?php include template('v2_merchant_header','member/common'); ?>


<div class="i_businessman">
 
  <!--s_nav-->
  <div class="ibody">
    <div class="s_weiz"> 当前位置：<a href="<?php echo __APP__;?>">首页</a> > <a href="<?php echo U('member/profile/index');?>">商家管理中心</a> > 活动担保金
 </div>
    <!--s_weiz-->
         <?php include template('v2_merchant_left','member/common'); ?>

    <!--s_left-->
    <div class="s_right">
      <div  class="title"> 存入活动担保金 </div>
      <div class="s_tryout2">
        <div class="part1"><img src="<?php echo THEME_STYLE_PATH;?>style/images/a4.jpg" alt=""/></div>
        <div class="part2"> <span class="a1">商品名称</span><span class="a2">商品下单价(元)</span><span class="a3">数量</span><span class="a4">平台损耗费（元）</span><span class="a5">合计</span> </div>
        <!--part2-->
        <div class="part3"> <span class="a1"><img src="<?php echo $thumb;?>" alt="" /><?php echo str_cut($title,55);?></span><span class="a2">￥<?php echo $goods_price;?> /<?php echo $goods_discount;?>折</span><span class="a3"><?php echo $goods_number;?></span><span class="a4">￥<?php echo sprintf("%.2f",$goods_price*$service/100);?></span><span class="a5" id="totalmoney"></span> </div>

      <div class="part5">
         <?php if($service_type ==2) { ?>
         保证金计算方式 =( (下单价 ) -(折扣部分 ) + （单份平台服务费)) * 数量<BR/>
         示例：某商品 下单价100元 折扣4折 数量10件 平台服务费为5%  那么总缴纳保证金为 (100-(100/10*4) +(100 * 0.05) ) * 10 = 650 <BR/>
         <span>当前保证金缴纳方式为(返还部分缴纳) 只需缴纳返还给会员部分即可。</span>
         <?php } ?>
 						平台损耗费=下单价×<?php echo $service;?>%
 					<br />
         <span>每次计算结果只取小数点后2位，不四舍五入</span>
        </div>
         <!--part5--> 
        <div class="part6">
        <span id="btn">确认支付</span>
        </div>
         <!--part6--> 
         <div class="part7">
        *说明：担保金款项部分作为本次活动返还给购买者的扣除款项。剩余部分将在活动结束之后退还到您的会员账户；平台损耗费为成交的笔数逐笔收取；其余未售出商品担保金及平台损耗费，将在活动结束后退还到您的网站账户。
         </div>
         <!--part7--> 
      </div>
      <!--s_tryout2--> 
    </div>
    <!--s_right-->
    <div class="clear"></div>
  </div>
  <!--ibody--> 
</div>
<!--i_businessman-->

<script type="text/javascript">
$(document).ready(function(){
	var id = '<?php echo $id;?>';
	$.get('<?php echo U('Member/MerchantProduct/product_total');?>',{'id':id},function(data){
		$("#totalmoney").text(data.toFixed(2));
	},'json');
	
	//点击确认按钮
	$("#btn").click(function(){
		var total = $("#totalmoney").html();
		artDialog({
			title:'提示',
			icon: 'question',
			fixed: true,
			lock: true,
			okVal : '确定支付',
			content:'您确认支付？该操作不可逆转，你确定吗？',
			ok : function(){
				$.ajax({
					url:'<?php echo U('Member/MerchantProduct/bailbond');?>',
					type:'post',
					dataType:'json',
					data:{'id':id},
					success:function(data){
						if(data.status == 1){
							art.dialog(data.info);
							location.href='<?php echo U('Member/MerchantProduct/check');?>';
						}else{
							artDialog({
								title:'提示',
								icon: 'warning',
								fixed: true,
								lock: true,
								okVal : '去充值',
								content:data.info,
								ok : function(){
									window.open('<?php echo U('Pay/Index/pay',array('userid'=>$this->userid));?>');
								},
								cancel:true
							});									
						}
					}
				});
			},
			cancel:true
		});
	});
});
</script>
         <?php include template('footer','common'); ?>

</body>
</html>