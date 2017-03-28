<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>﻿<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?>试用专区_红包试用_精选万件商品免费试用--<?php echo $SEO['site_title'];?></title>
  <meta name="keywords" content="免费试用,试用网,试客,试客网,试客网站,红包试用,佣金试用,<?php echo $SEO['site_title'];?>" />
  <meta name="description" content="欢迎来<?php echo $SEO['site_title'];?>:<?php echo $SEO['site_title'];?>—是全国领先的免费试用网和试客网,深的消费者信赖的免费试用网和试客网站,是试客免费试用网和试客网站的首选,<?php echo $SEO['site_title'];?>免费试用网为试客提供最优质和实用的优秀免费试用商品,每天更新,还有红包任务等你来拿" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/list.css" />
  </head>
  <body>
    <style>
      #content .list_2_tab .l2_content .li_2_wrap .li_2_filter dd img{ height:20px; vertical-align:middle; margin-right:8px; margin-top:-2px; }
    </style>
    <?php include template('toper','common'); ?>
    <!-- logo和搜索部分 -->
    <?php include template('header','common'); ?> 

    <div id="content">
      
      <div class="wrap">
        <p class="hint-wz clear">
          当前位置：
          <b>首页 > </b>
          <b>商品总汇</b>
        </p>
      </div>

      <script type="text/javascript">
              $(function(){
                $('.list-wrap .title .al a').on('click',function(){
                  $(this).addClass('active').siblings('a').removeClass('active');
                    getContent();

                });

                $('.list-wrap .title .a2 a').on('click',function(){
                  $(this).addClass('active').siblings('a').removeClass('active');
                    getContent();

                });
                /* 兼容 */
                $('.list-wrap .list .box:nth-child(3n),.l2_box_wrap .l2_box:nth-child(6n)').css('margin-right','0');
                
                /* 如用ajax刷新数据此处tab选项卡可删除  */
                $('.list_2_tab .l2_title a').on('click',function(){
                  $(this).addClass('active').siblings('a').removeClass('active');
                        getContent();

                  /*$(this).parents('.list_2_tab').find('.li_2_wrap').eq($(this).index()).removeClass('dn').siblings('.li_2_wrap').addClass('dn');*/
                });
              });
      </script>   
      
      <div class="list_2_tab wrap list-wrap">
        
        <div class="l2_title clear">
          <a href="javascript:;" class="fl active" data-status="1">正在进行</a>
          <a href="javascript:;" class="fl" data-status="3">往期回顾</a>
        </div>

        

        
        <script type="text/javascript">
          $(function(){         
            $('.li_2_filter dt,.li_2_filter dd').on('click',function(){
              $(this).addClass('active').siblings().removeClass('active');
              getContent();

            });
          });
        </script>
        
        <div class="l2_content">
          <div class="li_2_wrap">
            <dl class="li_2_filter clear">
              <dt class="<?php if($catid==0) { ?>active<?php } ?>"><a href="javascript:;" data-catid="0">全部试品</a></dt>
              <?php require_once('E:\WWW\klz168.com/Application/Product\Taglib\product.class.php');$product_tag = new product();if(method_exists($product_tag, 'category')) {$data = $product_tag->category(array('catid'=>'0','limit'=>'8',));} ?>
              <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
              <dd class="<?php if($catid==$r[catid]||in_array($catid, explode(',', $r[arrchildid]))) { ?>active<?php } ?>" >
                <img src="<?php echo $r['image'];?>"><a href="javascript:;" data-catid="<?php echo $r['catid'];?>"><?php echo $r['catname'];?></a></dd>
              <?php $n++;}unset($n); ?>
              
              <!-- <dd class="i2"><a href="javascript:;">手机数码</a></dd>
              <dd class="i3"><a href="javascript:;">家用电器</a></dd>
              <dd class="i4"><a href="javascript:;">美妆饰品</a></dd>
              <dd class="i5"><a href="javascript:;">母婴用品</a></dd>
              <dd class="i6"><a href="javascript:;">家居建材</a></dd>
              <dd class="i7"><a href="javascript:;">百货食品</a></dd>
              <dd class="i8"><a href="javascript:;">运动户外</a></dd>
              <dd class="i9"><a href="javascript:;">文化娱乐</a></dd> -->
            </dl>


            
            <div class="title clear">

              <div class="fl clear a2">
                <a href="javascript:;" class="active" data-mod="">全部</a><b></b>

                <?php if(C('TRIAL_ISOPEN') == 1) { ?>
                <a href="javascript:;" data-mod="trial"><?php echo C('TRIAL_NAME');?></a><b></b>
                <?php } ?>

                <?php if(C('COMMISSION_ISOPEN') == 1) { ?>
                <a href="javascript:;" data-mod="commission"><?php echo C('COMMISSION_NAME');?></a><b></b>
                <?php } ?>


              </div>
              <div class="fl clear al" style="margin-left:10px;">
              <a href="javascript:;" class="active" data-orderby="id" data-orderway="desc">按时间<b></b></a>
                <a href="javascript:;" data-orderby="goods_price" data-orderway="desc">按价格<b></b></a>

              <a href="javascript:;"  data-orderby="already_num" data-orderway="desc">按份数<b></b></a>
              

              </div>

              



              <div class="fr clear page-num">
                <!-- <span class="fl pn"><b class="cc">1</b>/<b>66</b></span>
                <span class="fr btn">
                  <a href="javascript:;" class="prev"><</a>
                  <a href="javascript:;" class="next">></a>
                </span> -->
              </div>
              <!--  搜索  -->
              <div class="fr list_2_search">
                <div class="insert fl"><input type="text" placeholder="宝贝名称的关键词" id="title"/></div>
                <div class="l2_btn fl"><button>GO</button></div>
              </div>
            </div>
            <script type="text/javascript">
              $('button').click(function(){
                getContent();
              });

            </script>
            <div class="l2_box_wrap clear" id="js_lists">loading...
              <!-- <div class="l2_box fl">
                <div class="b_img"><a href="#"><img src="img/11.png" alt="" /></a></div>
                <dl class="b_m">
                  <dt class="b_title txt-flow">创诺华男士长袖衬衫暗创诺华男士长袖衬衫暗</dt>
                  <dd class="b_mon clear">
                    <span class="fl yj">￥140</span>
                    <span class="fr">限量<b class="cc">10</b>份</span>
                  </dd>
                </dl>
                <a href="#" class="b_btn">我要试用</a>
              </div> -->
              
            </div>
          
            <div id="page" class="mt30">
              
            </div>
            
          </div>

        
        </div>
        
      </div>
      
    </div>


    <!-- 底部  -->
        <?php include template('footer','common'); ?>

    
    <!--  侧边栏  -->
    
  
                    
                  
              
    
  </body>
</html>
<script type="text/javascript">
      getContent(1);
      function getContent(page) {
          var page = page || 1;
          var catid = $(".li_2_filter .active a").attr('data-catid');
          var sort = $(".al a[class~='active']"); 
          var status = $(".l2_title .active").attr('data-status');
          var title = $('#title').val();


          var param = {
            catid : catid,
            mod   : $("a[data-mod][class='active']").attr('data-mod'),
            orderby  :sort.attr('data-orderby'),
            orderway : sort.attr('data-orderway'),
            status:status,
            keyword:"<?php echo $_GET['keyword'];?>",
            title:title,
            num:'30',
            page:page
          };
          $.getJSON(site.site_root + '/index.php?m=product&c=api&a=v2_getlists', param, function(ret) {

             var _html = '';
             if(ret.status == 1) {
                 $.each(ret.data.lists, function(i, n) {
                    var _ul_margin = ((i+1) % 6 == 0) ? 'style="margin-right: 0px;"' : '';
                     _html += '<div class="l2_box fl" '+_ul_margin+'>';
                     _html += '<div class="b_img"><a href="'+n.url+'"><img src="'+n.thumb+'" alt="'+n.title+'" width="184px" height="180px"/></a></div>';
                     _html += '<dl class="b_m">';
                            _html += '<dt class="b_title txt-flow">'+n.title+'</dt>';
                           _html += '<dd class="b_mon clear">';

                    _html += '<span class="fl yj">￥'+n.goods_price+'</span>';
                    _html += '<span class="fr">限量<b class="cc">'+n.goods_number+'</b>份</span>';
                    _html += '</dd></dl>';
                     _html += '<a href="'+n.url+'" class="b_btn" target="_bank">我要试用</a></div>';
                    
                 });
                 $("#js_lists").html(_html);
                $("#page").html(ret.data.pages);
                $(".page-num").html(ret.data.pages2);
                if (ret.data.count <= 30) {
                    $('#page').find('.all').hide().eq(0).show();
                };

             } else {
                 $("#js_lists").html(ret.info);
                $("#page").html('');
                 return false;
             }
          });
      }
      
      $('#page a').live('click', function() {
          var urlstr = $(this).attr('href').toString();
          var page = $.urlParam('page', urlstr);
          if(page != false) {
            getContent(page);
          }
          return false;
      });

      $('.page-num a').live('click', function() {
          var urlstr = $(this).attr('href').toString();
          var page = $.urlParam('page', urlstr);
          if(page != false) {
            getContent(page);
          }
          return false;
      });


      $("#js_page").live('click',function(){
        var page = $("#js_page_num").val();
        if (page != false) {
          getContent(page);
        };
        
      });

      $.urlParam = function(name, url){
          var url = url || window.location.href;
          var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url);
          if(!results) return false;
          return results[1] || 0;
      }
</script>