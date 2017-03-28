<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>个人资料-会员中心-<?php echo C('WEBNAME');?></title>
		<meta name="Keywords" content="个人资料,会员中心,<?php echo C('WEBNAME');?>" />
		<meta name="Description" content="个人资料,会员中心,<?php echo C('WEBNAME');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/base.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo THEME_STYLE_PATH;?>style/css/user_style.css"/>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
		<script type="text/javascript" src="<?php echo THEME_STYLE_PATH;?>style/js/taobao.js"></script>
	</head>
	<body>
		<?php include template('v2_header','member/common'); ?>
		
		<div id="content">
			<div class="wrap">
				<p class="hint-wz clear hint_wz_2">
					当前位置：
					<b>首页 > </b>
					<b>会员升级</b>
				</p>
			</div>
			
			<div class="user_index_content wrap-and clear">
				<?php include template('v2_member_left','member/common'); ?>
				
				<div class="fr u_index_mess user_pd_1">
					<h2 class="user_page_title">会员升级</h2>
					<p class="vip_status"><span class="name">账号：<?php echo nickname($this->userinfo['userid']);?></span>,
					</p>
					<dl class="vip_tq">
						<dt>
						<?php
						if ($this->userinfo['groupid'] == 2){
							echo '您已是贵宾会员，可享受';
						}
						else if ($this->userinfo['groupid'] == 4){
							echo '您已是代理商，可享受';
						}
						else if ($this->userinfo['groupid'] == 5){
							echo '您已是总经销，可享受';
						}
						else{
							echo '您是普通用户，不能享受';
						}
						?>
						以下五大特权</dt>
						<dd>
							<ul class="vip_ico_wrap clear">
								<li>
									<p class="vip_ico vip_qd"></p>
									<p class="vip_txt">签到积分加倍</p>
								</li>
								<li>
									<p class="vip_ico vip_cs"></p>
									<p class="vip_txt">抢购次数不限</p>
								</li>
								<li>
									<p class="vip_ico vip_qg"></p>
									<p class="vip_txt">专属抢购</p>
								</li>
								<li>
									<p class="vip_ico vip_sy"></p>
									<p class="vip_txt">专属试用</p>
								</li>
								<li>
									<p class="vip_ico vip_hd"></p>
									<p class="vip_txt">专属活动</p>
								</li>
							</ul>
						</dd>
					</dl>
					
					<hr />
					
					 	<!--总运营商-->
					 <div  class="Member">
					 	<div class="rank_box float_left">
						
							<table  class="suss"  >
                 <thead class="ThTitle">
                 <tr>
                   	<th>会员等级</th>
                   	<th>项目规则</th>
                   	<th>奖金规则</th>
                   	 <th>费用</th>
                   	<th>立刻申请</th>
                   </tr>
                   </thead>
                   <tr>
                  	<td>VIP会员</td>
                  <td>佣金費用<br>奖励(1元-300元)</td>
                   <td>推荐奖励1%</td>
                    <td>168元</td>                         
                     <td><ul class="referral border_efefef">
								
								<li class="vip_name_btn">
										<a href="javascript:;" data-type="2" data-money="<?php echo get_member_vip(2);?>" data-url="<?php echo U('Member/Profile/check_money');?>" onclick="bind.member_vip(this)" class="border_radius_3 font_size14 font_weight_700 display_block width_100 height_100 color_ffffff text_align_center btn_background_ff6600">成为vip会员</a>
																	</li>
							</ul></td>
                   </tr>
                   <tr>
                   	<td>代理商</td>
                   <td>佣金費用<br>奖励(1元-300元)</td>
                   <td>推荐奖励1%<br>推荐费用100元</td>
                    <td>1688元</td>
                     <td><ul class="referral border_efefef">
								
								
								<li class="vip_name_btn">
										<a href="javascript:;" data-type="4" data-money="<?php echo get_member_vip(4);?>" data-url="<?php echo U('Member/Profile/check_money');?>" onclick="bind.zmerchant(this)" class="border_radius_3 font_size14 font_weight_700 display_block width_100 height_100 color_ffffff text_align_center Common_background_ff6600">成为代理商联系客服</a>
																	</li>
							</ul></td>
                   </tr>
                    <tr>
                   	<td>总经销商</td>
                    <td>佣金費用<br>奖励(1元-500元)</td>
                   <td>推荐奖励1%<br>合作伙伴2级</td>
                    <td>16888元</td>
                     <td><ul class="referral border_efefef">
								
								
								<li class="vip_name_btn">
										<a href="javascript:;" data-type="5" data-money="<?php echo get_member_vip(5);?>" data-url="<?php echo U('Member/Profile/check_money');?>" onclick="bind.hmerchant(this)" class="border_radius_3 font_size14 font_weight_700 display_block width_100 height_100 color_ffffff text_align_center Common_background_ff6600">成为总经销商联系客服</a>
																	</li>
							</ul></td>
                   </tr>
                    <tr>
                   	<td>总运营商</td>
                    <td>佣金費用<br>奖励(1元-500元)</td>
                   <td>推荐奖励1%<br>合作伙伴3级</td>
                    <td>168888元</td>
                     <td><ul class="referral border_efefef">
	
								<li class="vip_name_btn">
										<a href="javascript:;" data-type="6" data-money="<?php echo get_member_vip(5);?>" data-url="<?php echo U('Member/Profile/check_money');?>" onclick="bind.operate(this)"  class="border_radius_3 font_size14 font_weight_700 display_block width_100 height_100 color_ffffff text_align_center  Common_background_ff6600">成为运营商联系客服</a>
																	</li>
							</ul></td>
                   </tr>
              
							</table>
							
						</div>
                         
					
						
					</div>
					
	
					
					<div class="wrap2" id="wrap2">
    <ul class="tabClick">
        <li class="active">成为总运营商详情</li>
        <li>成为总经销商详情</li>
        <li>成为代理商详情</li>
        <li>成为vip会员详情</li>
    </ul>
    <div class="lineBorder">
        <div class="lineDiv"><!--移动的div--></div>
    </div>
    <div class="tabCon">
        <div class="tabBox">
        	<!--
            	作者：1033410988@qq.com
            	时间：2017-01-06
            	描述：总运营商
            -->
            <div class="tabList">
            	
            	
         <div class="teaminvitez clearFix">
				<div class="teaminviteztitle">
					<p class="pp1">团队奖励机制</p>
					<p class="pp2">
						奖励<span>即时到账</span>直接发放到您的账户余额
					</p>
				</div>
				<div class="teaminvitezmainz">
				
					 <p>项目规则：每天消费额度 <span>不能超过5000元</span>;每天最高奖励佣金 <span>1-500元</span>;</p>
					   </p>
					   	<p >奖励规则：作为团队的组织者，您邀请的用户继续邀请其他合作伙伴成功参与，您将额外获得<span>最高3个层级</span>的现金奖励
						。</p>
					<p>举个栗(例)子：</p>

										<p>
						您邀请了A，您获得A完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span>;
					</p>
					 					<p>
						A邀请了B 您可以获得B完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span> ;
					</p>
					 					<p>
						B邀请了C 您可以获得C完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span> ;
					</p>
					

					<p>这些团队成员将源源不断的为您赢取现金奖励。</p>

					<div class="picturez">
						<div class="jiangli8 picd1">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
						<div class="jiangli8 picd2">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
						<div class="jiangli8 picd3">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
					</div>
				</div>
			</div>
            	
            
            
            </div>
            <!--
            	作者：1033410988@qq.com
            	时间：2017-01-06
            	描述：总经销商
            -->
            <div class="tabList">
              <div class="teaminvitez clearFix">
				<div class="teaminviteztitle">
					<p class="pp1">团队奖励机制</p>
					<p class="pp2">
						奖励<span>即时到账</span>直接发放到您的账户余额
					</p>
				</div>
				<div class="teaminvitezmainz">
					<p>项目规则：每天消费额度 <span>不能超过5000元</span>;每天最高奖励佣金 <span>1-500元</span>;</p>
					   </p>
					   	<p >奖励规则：作为团队的组织者，您邀请的用户继续邀请其他合作伙伴成功参与，您将额外获得<span>最高2个层级</span>的现金奖励
						。</p>
					<p>举个栗(例)子：</p>

										<p>
						您邀请了A，您获得A完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span>;
					</p>
					 					<p>
						A邀请了B 您可以获得B完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span> ;
					</p>
					 					<p>
						B邀请了C 您可以获得C完成的每笔任务的商品价格 <span><b>0%</b>元的现金</span> ;
					</p>
					

					<p>这些团队成员将源源不断的为您赢取现金奖励。</p>

					<div class="picturez">
						<div class="jiangli8 picd1">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
						<div class="jiangli8 picd2">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
						<div class="jiangli8 picd3">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>0</b>%
							</p>
						</div>
					</div>
				</div>
			</div></div>
			<!--
            	作者：1033410988@qq.com
            	时间：2017-01-06
            	描述：代理商
            -->
			
            <div class="tabList">
            
            <div class="teaminvitez clearFix">
				<div class="teaminviteztitle">
					<p class="pp1">团队奖励机制</p>
					<p class="pp2">
						奖励<span>即时到账</span>直接发放到您的账户余额
					</p>
				</div>
				<div class="teaminvitezmainz">
					<p>项目规则：每天消费额度 <span>不能超过3000元</span>;每天最高奖励佣金 <span>1-300元</span>;</p>
					   </p>
					   	<p >奖励规则：作为团队的组织者，您邀请的用户继续邀请其他合作伙伴成功参与，您将额外获得<span>最高1个层级</span>的奖励;且获得第二级好友奖励推荐费用100元
						。</p>
					<p>举个栗(例)子：</p>

										<p>
						您邀请了A，您获得A完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span>;
					</p>
					 					<p>
						奖励推荐人 <span><b>100</b>元的现金</span> ;
					</p>
					 				
					 

					<p>这些团队成员将源源不断的为您赢取现金奖励。</p>

					<div class="picturez">
						<div class="jiangli8 picd1">
							<p>奖励</p>
							<p class="qianfuhao">
								<b>100</b>元
							</p>
						</div>
						<div class="jiangli8 picd2">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
						<div class="jiangli8 picd3">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>0</b>%
							</p>
						</div>
					</div>
				</div>
			</div>
            
            </div>
            <!--
            	作者：1033410988@qq.com
            	时间：2017-01-06
            	描述：vip
            -->
            <div class="tabList">
             <div class="teaminvitez clearFix">
				<div class="teaminviteztitle">
					<p class="pp1">团队奖励机制</p>
					<p class="pp2">
						奖励<span>即时到账</span>直接发放到您的账户余额
					</p>
				</div>
				<div class="teaminvitezmainz">
				<p>项目规则：每天消费额度 <span>不能超过3000元</span>;每天最高奖励佣金 <span>1-300元</span>;</p>
					   </p>
					   	<p >奖励规则：作为团队的组织者，您邀请的用户继续邀请其他合作伙伴成功参与，您将额外获得<span>最高1个层级</span>的现金奖励
						。</p>
					<p>举个栗(例)子：</p>

										<p>
						您邀请了A，您获得A完成的每笔任务的商品价格 <span><b>1%</b>元的现金</span>;
					</p>
					 				
					 				
					 

					<p>这些团队成员将源源不断的为您赢取现金奖励。</p>

					<div class="picturez">
						<div class="jiangli8 picd1">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>0</b>%
							</p>
						</div>
						<div class="jiangli8 picd2">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>1</b>%
							</p>
						</div>
						<div class="jiangli8 picd3">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b>0</b>%
							</p>
						</div>
					</div>
				</div>
			</div>
            
            </div>
        </div>
    </div>
</div>
<!--
	作者：1033410988@qq.com
	时间：2017-01-06
	描述：添加的选项卡的js
-->
 

<script>
window.onload = function (){
        var windowWidth = document.body.clientWidth; //window 宽度;
		var wrap = document.getElementById('wrap2');
        var tabClick = wrap.querySelectorAll('.tabClick')[0];
        var tabLi = tabClick.getElementsByTagName('li');
        
        var tabBox =  wrap.querySelectorAll('.tabBox')[0];
        var tabList = tabBox.querySelectorAll('.tabList');
        
        var lineBorder = wrap.querySelectorAll('.lineBorder')[0];
        var lineDiv = lineBorder.querySelectorAll('.lineDiv')[0];
        
        var tar = 0;
        var endX = 0;
        var dist = 0;
        
        tabBox.style.overflow='hidden';
        tabBox.style.position='relative';
        tabBox.style.width=windowWidth*tabList.length+"px";
        
        for(var i = 0 ;i<tabLi.length; i++ ){
              tabList[i].style.width=windowWidth+"px";
              tabList[i].style.float='left';
              tabList[i].style.float='left';
              tabList[i].style.padding='0';
              tabList[i].style.margin='0';
              tabList[i].style.verticalAlign='top';
              tabList[i].style.display='table-cell';
        }
        
        for(var i = 0 ;i<tabLi.length; i++ ){
            tabLi[i].start = i;
            tabLi[i].onclick = function(){
                var star = this.start;
                for(var i = 0 ;i<tabLi.length; i++ ){
                    tabLi[i].className='';
                };
                tabLi[star].className='active';
                init.lineAnme(lineDiv,(windowWidth/tabLi.length)*star)

                init.translate(tabBox,windowWidth,star);
                endX= -star*windowWidth;
            }
        }
        
        function OnTab(star){
            if(star<0){
                star=0;
            }else if(star>=tabLi.length){
                star=tabLi.length-1
            }
            for(var i = 0 ;i<tabLi.length; i++ ){
                tabLi[i].className='';
            };
            
             tabLi[star].className='active';
            init.translate(tabBox,windowWidth,star);
            endX= -star*windowWidth;
        };
        
        tabBox.addEventListener('touchstart',chstart,false);
        tabBox.addEventListener('touchmove',chmove,false);
        tabBox.addEventListener('touchend',chend,false);
        //按下
        function chstart(ev){
            ev.preventDefault;
            var touch = ev.touches[0];
            tar=touch.pageX;
            tabBox.style.webkitTransition='all 0s ease-in-out';
            tabBox.style.transition='all 0s ease-in-out';
        };
        //滑动
        function chmove(ev){
            var stars = wrap.querySelector('.active').start;
            ev.preventDefault;
            var touch = ev.touches[0];
            var distance = (touch.pageX)-tar;
            dist = distance;
            init.touchs(tabBox,windowWidth,tar,distance,endX);
            init.lineAnme(lineDiv,-dist/tabLi.length-endX/4);
        };
        //离开
        function chend(ev){
            var str= tabBox.style.transform;
            var strs = JSON.stringify(str.split(",",1));  
            endX = Number(strs.substr(14,strs.length-18)); 
            
            if(endX>0){
                init.back(tabBox,windowWidth,tar,0,0,0.3);
                endX=0
            }else if(endX<-windowWidth*tabList.length+windowWidth){
                endX=-windowWidth*tabList.length+windowWidth
                init.back(tabBox,windowWidth,tar,0,endX,0.3);
            }else if(dist<-windowWidth/3){
                 OnTab(tabClick.querySelector('.active').start+1);
                 init.back(tabBox,windowWidth,tar,0,endX,0.3);
            }else if(dist>windowWidth/3){
                 OnTab(tabClick.querySelector('.active').start-1);
            }else{
                 OnTab(tabClick.querySelector('.active').start);
            }
            var stars = wrap.querySelector('.active').start;
            init.lineAnme(lineDiv,stars*windowWidth/4);
            
        };
	};
	<!---选项卡的js-->
    var init={
        translate:function(obj,windowWidth,star){
            obj.style.webkitTransform='translate3d('+-star*windowWidth+'px,0,0)';
            obj.style.transform='translate3d('+-star+windowWidth+',0,0)px';
            obj.style.webkitTransition='all 0.3s ease-in-out';
            obj.style.transition='all 0.3s ease-in-out';
        },
        touchs:function(obj,windowWidth,tar,distance,endX){
            obj.style.webkitTransform='translate3d('+(distance+endX)+'px,0,0)';
            obj.style.transform='translate3d('+(distance+endX)+',0,0)px';
        },
        lineAnme:function(obj,stance){
            obj.style.webkitTransform='translate3d('+stance+'px,0,0)';
            obj.style.transform='translate3d('+stance+'px,0,0)';
            obj.style.webkitTransition='all 0.1s ease-in-out';
            obj.style.transition='all 0.1s ease-in-out';
        },
        back:function(obj,windowWidth,tar,distance,endX,time){
            obj.style.webkitTransform='translate3d('+(distance+endX)+'px,0,0)';
            obj.style.transform='translate3d('+(distance+endX)+',0,0)px';
            obj.style.webkitTransition='all '+time+'s ease-in-out';
            obj.style.transition='all '+time+'s ease-in-out';
        },
    }
    
</script>
					
			</div>

		</div>
		
		<?php include template('footer','common'); ?>
	</body>
</html>