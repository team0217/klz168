<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新手指引-<?php echo C('WEBNAME');?></title>
<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/task.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include template('toper','common'); ?>
        <?php include template('header','common'); ?> 
<div class="i_weiz">
  <div class="ibody">当前位置：<a href="<?php echo __APP__;?>">首页</a> > 新手指引</div>
</div>
<div class="i_help">
  <div class="ibody"> 
  <div class="s_part1"><img src="<?php echo THEME_STYLE_PATH;?>style/images/a29.jpg"/></div>
   <div class="s_part2">
        <div class="part1">
           <div class="h1">申请试用资格</div>
            <div class="h2">选择自己喜欢的试用商品,点击"免费试用"，获得试用资格。</div>
        </div>
        <!--part1-->
          <div class="part2">
           <div class="h1">立即下单</div>
            <div class="h2">待卖家审核获得试用资格后，进入用户中心-试用参与-已通过的试用活动， 点击"现在去下单"，进入下单规则操作介绍， 按照商家要求到指定平台</div>
        </div>
        <!--part1-->
        <div class="part3">
           <div class="h1">填写单号</div>
            <div class="h2">付款成功后，回到用户中心-试用参与-已通过的试用活动-找到填写订单号，然后填写订单。</div>
        </div>
        <!--part3-->
          <div class="part4">
           <div class="h1">填写试用报告</div>
            <div class="h2">填写订单号后，您需要在<?php echo C_READ('buyer_write_talk_time','trial');?>天内上传您的关于这份商品的试用报告，报告必须图文结合，由商家在<?php $times =string2array(C_READ('seller_trialtalk_check','trial'));echo $times[value];?>天内进行审核。</div>
        </div>
        <!--part4-->
          <div class="part5">
           <div class="h1">获取单品使用担保金</div>
            <div class="h2">试用报告通过后商家就会返还试用担保金，买家就可以在账单明细处可以见到</div>
        </div>
        <!--part5-->
    </div>
   <!--s_part2-->
 </div>
  <!--ibody-->
 </div>
<!--i_help-->

        <?php include template('footer','common'); ?> 

</body>
</html>
<style type="text/css">
  
body #header .logo img{ width:176px; height:52px; position:relative; top:50%; margin-top:-26px; }

</style>
<style type="text/css" media="screen">

.i_help .s_part1{}
.i_help .s_part1 img{ width:1210px;}
.i_help .s_part2{ padding:0px 10px; padding-top:80px;}
.i_help .s_part2 .part1{ background:url(<?php echo THEME_STYLE_PATH;?>style/images/a30.jpg) right top no-repeat; height:318px; }
.i_help .s_part2 .part1 .h1{ font-size:24px; line-height:28px; }
.i_help .s_part2 .part1 .h2{ line-height:30px; width:270px;}

.i_help .s_part2 .part2{ background:url(<?php echo THEME_STYLE_PATH;?>style/images/a31.jpg) left top no-repeat; height:318px; padding-left:850px; }
.i_help .s_part2 .part2 .h1{ font-size:24px; line-height:28px; padding-bottom:10px; }
.i_help .s_part2 .part2 .h2{ line-height:30px;}


.i_help .s_part2 .part3{ background:url(<?php echo THEME_STYLE_PATH;?>style/images/a32.jpg) right top no-repeat; height:318px; }
.i_help .s_part2 .part3 .h1{ font-size:24px; line-height:28px; padding-bottom:10px; }
.i_help .s_part2 .part3 .h2{ line-height:30px; width:270px;}

.i_help .s_part2 .part4{ background:url(<?php echo THEME_STYLE_PATH;?>style/images/a33.jpg) left top no-repeat; height:318px; padding-left:850px; }
.i_help .s_part2 .part4 .h1{ font-size:24px; line-height:28px; padding-bottom:10px; }
.i_help .s_part2 .part4 .h2{ line-height:30px;}

.i_help .s_part2 .part5{ background:url(<?php echo THEME_STYLE_PATH;?>style/images/a34.jpg) right top no-repeat; height:318px; }
.i_help .s_part2 .part5 .h1{ font-size:24px; line-height:28px; padding-bottom:10px; }
.i_help .s_part2 .part5 .h2{ line-height:30px; width:270px;}
  
</style>