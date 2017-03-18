<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="日赚任务,<?php echo C('WEBNAME');?>" />
<meta name="description" content="日赚任务,<?php echo C('WEBNAME');?>" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_STYLE_PATH;?>style/css/task.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<style type="text/css" media="screen">
#header .logo img {
width: auto;
height: 52px;
position: relative;
top: 50% !important;
margin-top: -26px;

}
@-moz-document url-prefix() {#header .logo img { top:0% !important;
    margin-top:0 !important;}}
.ibody{font-size: 12px;}
.i_happyTask .s_list .part .h1{line-height: 30px;font-size: 16px;height: 60px;} 
.i_happyTask .s_list .part .h2 .L .p1{font-size: 16px; }

.i_happyTask .s_list .part .h2 .L .p2{font-size:16px;}
 .i_happyTask .s_list .part .h2 .R{ font-size: 18px; }
</style>

<?php include template('toper','common'); ?>
<!-- logo和搜索部分 -->
<?php include template('header','common'); ?> 
<div class="i_weiz">
   <div class="ibody">当前位置：<a href="<?php echo __APP__;?>">首页</a> > 开心任务</div>
</div>
<div class="i_happyTask"> 
 <div class="ibody"> 
   <div class="s_ti">
    <div class="L">
       <a href="<?php echo U('Task/Index/broke',array('order'=>'inputtime'));?>" class="<?php if(I('order')=='inputtime' || I('order') == '') { ?>sel<?php } ?>">按时间</a>
       <a href="<?php echo U('Task/Index/broke',array('order'=>'already_num'));?>" class="<?php if(I('order')=='already_num') { ?>sel<?php } ?>">按份数</a>
     </div>
    <div class="L">
       <a href="<?php echo U('Task/Index/broke',array('status'=>99));?>" class="<?php if(I('status')==99) { ?>sel<?php } ?>">全部</a>
        <a href="<?php echo U('Task/Index/broke',array('status'=>1));?>" class="<?php if(I('status')==1) { ?>sel<?php } ?>">进行中</a>
        <a href="<?php echo U('Task/Index/broke',array('status'=>2));?>" class="<?php if(I('status')==2) { ?>sel<?php } ?>">已结束</a>
     </div> 
     <div class="clear"></div>
  </div>
  <!--s_ti-->
  <div class="s_list">
      <!--循环-->
    <?php 
        $order = I('order');
        $status = I('status');
        if($status){if($status == 99){$_where = "`status` > 0";}else{$_where = "`status`=$status";}}
        if(!empty($order)) $_order = $order. " DESC";
    ?>
    <?php require_once('E:\WWW\klz168.com/Application/Task\Taglib\task.class.php');$task_tag = new task();if(method_exists($task_tag, 'lists')) {$count = $task_tag->count(array('order'=>$_order,'where'=>$_where,'limit'=>'30','page'=>$page,));$pages = pages($count, 30, $page);$data = $task_tag->lists(array('order'=>$_order,'where'=>$_where,'limit'=>'30','page'=>$page,));} ?>
      <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
          <a href="<?php echo U('Task/Index/broke_show',array('id'=>$r[id]));?>" class="part">
             <div class="h1"><?php echo $r['title'];?>?</div>
             <div class="h2">
               <div class="L">
                 <div class="p1">回答奖励:<span><?php echo $r['goods_price'];?>元</span></div>
                 <div class="p2">剩余：<span><?php echo $r['goods_number'] - $r['already_num'];?></span>份 <span><?php echo $r['already_num'];?></span>人已完成</div>
               </div>
                 <?php if($r['state'] == 0 && $r[status] != 2) { ?>
                       <div class="R">回答问题</div>
                  <?php } elseif ($r['state'] == 1) { ?>
                       <div class="R2">已经参与</div>
                  <?php } elseif (($r['state'] == 0 && $r[status] == 2 )|| $r[goods_number] == $r[already_num]) { ?>
                       <div class="R3">已经结束</div>

                 <?php } ?>
                <div class="clear"></div>
              </div>
          </a>
      <?php $n++;}unset($n); ?>
   

  <script type="text/javascript">
    for(i=0;i<$('.i_happyTask .s_list .part').length;i++){
        if( (i+1)%3==0 ){
            $('.i_happyTask .s_list .part:eq('+i+')').css('float','right');
            $('.i_happyTask .s_list .part:eq('+i+')').css('margin-right',0);
            }
        }
  </script>  

  <div class="clear"></div>
  </div>
  <!--s_list-->
  </div>
    <!--ibody-->
</div>
<!--i_happyTask-->
        <?php include template('footer','common'); ?> 

</body>

</html>