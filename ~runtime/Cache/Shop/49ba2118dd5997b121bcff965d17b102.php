<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo get_seo('score_seo','score_title','');?></title>
<meta name="keywords" content="<?php echo get_seo('score_seo','score_keyword','');?>">
<meta name="description" content="<?php echo get_seo('score_seo','score_description','');?>">
<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/task.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>

<style type="text/css">
  
body #header .logo img{ width:176px; height:52px; position:relative; top:50%; margin-top:-26px; }

</style>

</head>
<body>
        <!-- logo和搜索部分 -->
        <?php include template('toper','common'); ?>
        <?php include template('header','common'); ?> 
        <script type="text/javascript" charset="utf-8">
  $(function(){

/* 兼容 IE */
  var h = $('#nav .silde-nav-h').height();
  $('#nav .silde-nav-h,#nav .shadow').css('height', h);
  /* 收缩  */
    if(!$('#nav .silde').attr('stop')){
      $('#nav .silde-nav-h,#nav .shadow').css('height', 0);
      var timer = null;
      $('#nav .silde').mouseover(function() {
        clearTimeout(timer);
        $('#nav .silde-nav-h,#nav .shadow').css('height', h);
      }).mouseout(function() {
        timer = setTimeout(function() {
          $('#nav .silde-nav-h,#nav .shadow').css('height', 0);
        }, 200);
      });
    }

  });
</script>
<div class="i_weiz"><div class="ibody">当前位置：<a href="<?php echo __APP__;?>">首页</a> > 积分商城</div></div>
<div class="i_pointMall">
<div class="ibody">
    <div class="s_part1"><img src="<?php echo THEME_STYLE_PATH;?>style/images/a20.jpg" alt=""/></div>
    <div class="s_part2">
        <div class="ti">
          <div class="L">赚取积分</div>
          <div class="R"><a href="<?php echo U('task/index/index');?>">查看更多</a></div>
           <div class="clear"></div>
        </div>
        <!--ti-->
        <div class="co">
            <?php foreach ($task as $k => $v): ?>
          <div class="part">
             <div class="L">
              <?php if($v[type] == 'sign') { ?>
              <img src="<?php echo THEME_STYLE_PATH;?>style/images/sign.png" alt=""/>
              <?php } elseif ($v[type] == 'invite') { ?>
                 <img src="<?php echo THEME_STYLE_PATH;?>style/images/name.png" alt=""/>
              <?php } elseif ($v[type] == 'email') { ?>
               <img src="<?php echo THEME_STYLE_PATH;?>style/images/email.png" alt=""/>
               <?php } elseif ($v[type] == 'phone') { ?>
                   <img src="<?php echo THEME_STYLE_PATH;?>style/images/phone.png" alt=""/>
              <?php } ?>
            </div>
             <div class="L1">
               <div class="a1"><?php echo $v['task_name'];?></div>
               <div class="a2">可得 <span><?php echo $v['task_reward'];?></span> <?php if($v['task_type'] == 'point') { ?>积分<?php } elseif ($v['task_type'] == 'money') { ?>元<?php } elseif ($v['task_type'] == 'exp') { ?>经验值<?php } ?></div>
             </div>
             <div class="R"><a href="<?php echo $v['url'];?>">立即参与</a></div>
              <div class="clear"></div>
          </div>
        <?php endforeach ?>


         
          <!--part-->
           <div class="clear"></div>
        </div>
      <!--co-->
 </div>
<!--s_part2-->
<script type="text/javascript">
    $('.i_pointMall .s_part2 .co .part:even').addClass('odd')
</script>
  <div class="s_part3">
        <div class="ti">
          <div class="L">兑换积分</div>
<!--           <div class="R">查看更多</div>
 -->           <div class="clear"></div>
        </div>
        <!--ti-->
        <div class="co">


        <?php $n=1;if(is_array($shop)) foreach($shop AS $v) { ?>
          <div class="part">
              <div class="a1">
                <?php if($v['total_num'] - $v['sale_num'] == 0) { ?>
                  <a href="javascript:;"><img src="<?php echo $v['images'];?>" /></a>
                  <?php } else { ?>
                  <a href="<?php echo U('shop/index/show',array('id'=>$v['id']));?>"><img src="<?php echo $v['images'];?>"/></a>
                  <?php } ?>

              </div>
            <div class="a2">
                <?php if($v['total_num'] - $v['sale_num'] == 0) { ?>
                  <a href="javascript:;" ><?php echo str_cut($v[title],37);?></a>
                  <?php } else { ?>
                  <a href="<?php echo U('shop/index/show',array('id'=>$v['id']));?>"><?php echo str_cut($v[title],37);?></a>
                  <?php } ?>
            </div>
            <div class="a3">份数<span><?php echo ($v['total_num'] - $v['sale_num']) ?>/<?php echo $v['total_num'];?></span>份  <span><?php echo $v['point'];?></span>积分</div>
            <div class="a4">
              <?php if($v['total_num'] - $v['sale_num'] == 0) { ?>
                <a href="javascript:;">兑光了</a>
                <?php } else { ?>
               <a href="<?php echo U('shop/index/show',array('id'=>$v['id']));?>">立即兑换</a>
                <?php } ?>
            </div>
          </div>
          <?php $n++;}unset($n); ?>



        
          <!--part-->
          <div class="clear"></div>
           </div>
      <!--co-->
 </div>
<!--s_part3-->
   <script type="text/javascript">
     for(i=0;i<$('.i_pointMall .s_part3 .co .part').length;i++){
		 if( (i+1)%5==0 ){
			$('.i_pointMall .s_part3 .co .part:eq('+i+')').css('margin-right',0) 
 			 } 		 
  		 }
</script>






</div>
<!--i_pointMall-->


        <?php include template('footer','common'); ?> 

</body>
</html>