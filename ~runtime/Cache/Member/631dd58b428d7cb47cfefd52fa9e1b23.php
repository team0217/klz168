<?php defined('IN_TPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>邀请好友-<?php echo C('WEBNAME');?></title>
<meta name="keywords" content="邀请好友,推荐好友,推广系统,推荐人系统,<?php echo C('WEBNAME');?>">
<meta name="description" content="邀请好友得现金,推荐好友来,<?php echo C('WEBNAME');?>">
<link rel="stylesheet" type="text/css"
	href="<?php echo THEME_STYLE_PATH;?>/style/css/stylezzz.css" />
<script type="text/javascript"
	src="<?php echo THEME_STYLE_PATH;?>style/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo JS_PATH;?>dialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript"
	src="<?php echo JS_PATH;?>dialog/plugins/iframeTools.js"></script>
</head>
<body>
	<?php include template('toper','common'); ?>
	<!--封面-->
	<div class="banner-boxz">
		<div class="bannerz">
			<img src="<?php echo C('SITE_LOGO_ZHU');?>" alt="<?php echo C('WEBNAME');?>" /> <img
				src="<?php echo THEME_STYLE_PATH;?>/style/img/images/noup.jpg" / class="noup">
			<div class="renshu">
				<p class="rsp1">累计已发放奖励金额</p>
				<p class="rsp2"><?php echo $z_num;?> 元</p>
			</div>
			<div class="haoyou5">
				<span class="hyb1"><b>每</b></span> <span class="hyb2"><b>邀</b></span>
				<span class="hyb3"><b>请</b></span> <span class="hyb4"><b>1</b></span>
				<span class="hyb5"><b>位</b></span> <span class="hyb6"><b>好</b></span>
				<span class="hyb7"><b>友</b></span>
			</div>
			<div class="zuigao">
				<p class="zuigaop1">
					<b>可获得</b>
				</p>
				<p class="zuigaop2" style="font-size: 50px;">
					<b>无上限</b><span><b>奖励<b></span>
				</p>
			</div>
		</div>
	</div>
	<!--页面内容-->
	<div class="main_boxz" style="height: auto;">
		<div class="mainz">
			<p class="makemoneyzzz clearFix">
				你还没有邀请好友! 第一名都赚了<span> <?php $n=1; if(is_array($friend_list)) foreach($friend_list AS $k => $f) { ?> <?php if($k ==0) { ?>
					<?php echo $f['num'];?> <?php } ?> <?php $n++;}unset($n); ?> </span>元了!快行动吧！么么哒
			</p>
			<div class="clearFix"></div>
			<!-- //推荐方式start -->
			<?php if($this->userid > 0) { ?>
			<div class="link_sharing-boxz clearFix">
				<div class="linkz">
					<div class="linkz-topz clearFix">
						<p class="ltp1">
							选择<br />
							<span>A</span>
						</p>
						<p class="ltp2">复制您的专属邀请链接</p>
						<?php if(!$this->userid) { ?>
						<p class="ltp3">
							<a href="<?php echo U('Member/index/login');?>">登录</a>
						</p>
						<?php } else { ?>
						<p class="ltp3">
							<a href="javascript:;" id="d_clip_button"
								data-clipboard-target="fe_text">一键复制</a>
						</p>
						<?php } ?>
					</div>
					<div class="linkz-bottomz">
						<textarea id="yq_text" name="" rows="" cols=""><?php echo $siteTitle;?><?php echo $weixin_url;?></textarea>
						<p>可以复制到贴吧，各大论坛，博客等社交平台去邀请同道中人来一起玩转领啦</p>
					</div>
				</div>
				<div class="sharz">
					<div class="sharz-topz">
						<p class="stp1">
							选择<br />
							<span>B</span>
						</p>
						<p class="stp2">分享到社交平台 更多人看到</p>
					</div>
					<div class="sharz-bottomz" id="sharzbottomz">
						<div class="sharz-type clearFix" id="sharztype">
							<div class="bdsharebuttonbox" data-tag="share_1">
								<a target="_bank"
									href="http://www.jiathis.com/send/?webid=qzone&url=<?php echo $siteUrl;?>&}&summary=<?php echo $summary;?>"
									data-cmd="qzone bds_qzone" class="sta1" id="abc"><img
									src="<?php echo THEME_STYLE_PATH;?>style/img/qqroom.jpg" /></a> <a
									target="_bank"
									href="http://www.jiathis.com/send/?webid=tsina&url=<?php echo $siteUrl;?>&}&summary=<?php echo $summary;?>"><img
									src="<?php echo THEME_STYLE_PATH;?>style/img/sian.jpg" /></a> <a target="_bank"
									href="http://www.jiathis.com/send/?webid=cqq&url=<?php echo $siteUrl;?>&}&summary=<?php echo $summary;?>"><img
									src="<?php echo THEME_STYLE_PATH;?>style/img/qq.jpg" /></a> <a target="_bank"
									href="http://www.jiathis.com/send/?webid=weixin&url=<?php echo $siteUrl;?>&}&summary=<?php echo $summary;?>"><img
									src="<?php echo THEME_STYLE_PATH;?>style/img/weix11.png" /></a>
							</div>
						</div>
						<p class="qqroomz">直接发到QQ空间更容易邀请到好友哟~</p>
					</div>
				</div>
			</div>
			<div class="phone_invitez clearFix">
				<div class="phonez">
					<div class="phonez-topz">
						<p class="pht1">
							选择<br />
							<span>C</span>
						</p>
						<p class="pht2">通过手机邀请</p>
					</div>
					<div class="phonez-bottomz">
						<span id="code" /></span>
						<div class="tishiz">
							<p>
								扫扫我吧！<br />用手机扫描二维码邀请也很方便哦 ~
							</p>
						</div>
						<div class="jiao jtr"></div>
						<div class="jiao jtl"></div>
						<div class="jiao jbr"></div>
						<div class="jiao jbl"></div>
					</div>
				</div>
				<div class="notopz">
					<p class="nzp1">要求朋友一起来吧</p>
					<p class="nzp2">邀请无上限</p>
				</div>
			</div>
			<?php } ?>
			<!-- //推荐方式end -->
			<div class="clearFix"></div>
			<!-- //排行榜start -->
			<div class="invitez-infoz clearFix" >
				<div class="invitez-recordz" >
					<p>接受邀请的好友记录</p>
					<div class="recordz-mainz">
						<?php if(!$agent || !$this->userid ) { ?> <?php if(!$this->userid) { ?>
						<p style="margin: 0 auto; text-align: center;">亲
							您还没有登录，登录之后可以查看邀请记录和推荐好友</p>
						<p class="ltp3">
							<a href="javascript:;" onclick="member.login()">登录</a><span></span>
						</p>
						<?php } else { ?>
						<p style="margin: 0 auto; text-align: center;">你还没有邀请记录,看看人家→_→</p>
						<?php } ?> <?php } else { ?>
						<table border="" cellspacing="" cellpadding="">
							<tr>
								<th class="thz1">好友昵称</th>
								<th class="thz2">注册时间</th>
								<th class="thz3">完成试用或赚佣金</th>
								<th class="thz4">绑定手机</th>
								<th class="thz5">您获得的金钱</th>
								<th class="thz5">您获得的积分</th>
							</tr>
							<?php $n=1;if(is_array($agent)) foreach($agent AS $v) { ?>
							<tr>
								<td class="tdz1"><span><?php echo substr_replace(nickname($v[userid]),'***',6);?></span></td>
								<td class="tdz2">
									<?php echo date('Y-m-d',$v['regdate']);?>
								</td>
								<td class="tdz3"><?php echo $v['order_count'];?></td>
								<td class="tdz4"><?php if($v[phone_status] == 1) { ?><font
									color="green"><?php echo substr_replace(nickname($v[phone]),'***',5);?></font><?php } else { ?>未认证<?php } ?>
								</td>
								<td class="tdz5"><?php echo $v['total_money'];?>元</td>
								<td class="tdz5"><?php echo $v['total_point'];?> 积分</td>
							</tr>
							<?php $n++;}unset($n); ?>
						</table>
						<div class="fenyez"><?php echo $pages;?></div>
						<?php } ?>
					</div>
				</div>
				<div class="invitez-rankingz">
					<p>获奖励排行榜</p>
					<div class="rankingz-mainz">
						<table border="" cellspacing="" cellpadding="">
							<?php $n=1;if(is_array($friend_list)) foreach($friend_list AS $f) { ?>
							<tr>
								<td class="rmtd1 <?php if($n >3) { ?>rmtdhui<?php } ?>"><?php echo $n;?></td>
								<td class="rmtd2"><?php echo substr_replace($f[nickname],'***',6);?></td>
								<td class="rmtd3"><?php echo $f['num'];?>元</td>

							</tr>
							<?php $n++;}unset($n); ?>
						</table>
					</div>
				</div>
			</div>
			<!-- //排行榜end -->
			<div class="clearFix"></div>
			<!-- //个人奖励开始 -->
			<div class="personinvitez clearFix"
				<?php if(!$money1 ) { ?> style="display: none;"<?php } ?>>
				<div class="personztitlez">
					<p class="pp1">个人奖励机制</p>
					<p class="pp2">
						每邀请<span>1</span>位好友可获得<span> <?php if($money1) { ?><b><?php echo $money1;?></b>元现金
							<?php } ?><?php if($print1) { ?> <b><?php echo $print1;?></b>积分<?php } ?>
						</span>奖励
					</p>
				</div>
				<div class="personztitlez-mainz">
					<div class="pmainzleft ">
						<div class="imgzzz">
							<img src="<?php echo THEME_STYLE_PATH;?>style/img/goodfrind.png" />
							<p>好友</p>
						</div>
						<p class="gpp1">邀请一位好友完成<?php echo $setting['0']['num'];?>次免费试用或赚佣金活动
						<p>
						<p class="gpp1 gpp2">累计完成<?php echo $setting['1']['num'];?>次免费试用或赚佣金活动</p>
						<p class="gpp1 gpp3">累计完成<?php echo $setting['2']['num'];?>次免费试用或赚佣金活动</p>
						<p class="gpp1 gpp3">累计完成<?php echo $setting['3']['num'];?>次免费试用或赚佣金活动</p>
					</div>
					<div class="pmainzmiddle">
						<div class="jiangli8">
							<p>奖励</p>
							<p class="bayuan">
								<span class="pspan1">￥</span><span><b><?php echo $money1;?></b></span>
							</p>
						</div>
					</div>
					<div class="pmainzright">
						<div class="imgzzz">
							<img src="<?php echo THEME_STYLE_PATH;?>style/img/me.png" />
							<p>你</p>
						</div>
						<div class="pmaindiv">
							<p class="pmp1 clearFix">
								<span id="" class="gpp1 gppm1"> 奖励<b><?php echo $setting['0']['cost'];?></b><?php if($setting[0]['type'] == "point") { ?>积分<?php } else { ?>元<?php } ?>
								</span> <span id="" class="gppm2"> 奖励即时到账，可无限邀请 </span>
							</p>
							<div class="gpp2div clearFix">
								<p class="gpp1 gpp21">再奖<?php echo $setting['1']['cost'];?><?php if($setting[1]['type'] == "point") { ?>积分<?php } else { ?>元<?php } ?></p>
								<p class="gpp1 gpp22">再奖<?php echo $setting['2']['cost'];?><?php if($setting[2]['type'] == "point") { ?>积分<?php } else { ?>元<?php } ?></p>
								<p class="gpp1 gpp22">再奖<?php echo $setting['3']['cost'];?><?php if($setting[2]['type'] == "point") { ?>积分<?php } else { ?>元<?php } ?></p>
								<p class="gpp2divab">
									完成相应标准一次性发放奖励。<br /> 满足条件即可即时到账（直接发放到您的 <br />
									<?php echo C('WEBNAME');?>账户余额）
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearFix"></div>
			<!-- //个人奖励结束 -->
			<!-- //团队奖励开始 -->
			<div class="teaminvitez clearFix">
				<div class="teaminviteztitle">
					<p class="pp1">团队奖励机制</p>
					<p class="pp2">
						奖励<span>即时到账</span>直接发放到您的账户余额
					</p>
				</div>
				<div class="teaminvitezmainz">
					<p class="tzmzp1">作为团队的组织者，您邀请的用户继续邀请其他用户成功参与，您将额外获得最高3个层级的现金奖励
						。</p>
					<p>举个栗(例)子：</p>

					<?php if($levels[1] ) { ?>
					<p>
						您邀请了A，您获得A完成的每笔任务的商品价格 <span><b><?php echo $levels['1']['cost'];?>%</b><?php if($levels[1]['type'] == "point") { ?>积分<?php } else { ?>元的现金<?php } ?></span>;
					</p>
					<?php } ?> <?php if($levels[2] ) { ?>
					<p>
						A邀请了B 您可以获得B完成的每笔任务的商品价格 <span><b><?php echo $levels['2']['cost'];?>%</b><?php if($levels[2]['type'] == "point") { ?>积分<?php } else { ?>元的现金<?php } ?></span> ;
					</p>
					<?php } ?> <?php if($levels[3] ) { ?>
					<p>
						B邀请了C 您可以获得C完成的每笔任务的商品价格 <span><b><?php echo $levels['3']['cost'];?>%</b><?php if($levels[3]['type'] == "point") { ?>积分<?php } else { ?>元的现金<?php } ?></span> ;
					</p>
					<?php } ?> <?php if($levels[4] ) { ?>
					<p>
						C邀请了D 您可以获得 D完成的每笔任务的商品价格<span><b><?php echo $levels['4']['cost'];?>%</b><?php if($levels[4]['type'] == "point") { ?>积分<?php } else { ?>元的现金<?php } ?></span> ;
					</p>
					<?php } ?>


					<p>这些团队成员将源源不断的为您赢取现金奖励。</p>

					<div class="picturez">
						<div class="jiangli8 picd1">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b><?php echo $levels['1']['cost'];?></b>%
							</p>
						</div>
						<div class="jiangli8 picd2">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b><?php echo $levels['3']['cost'];?></b>%
							</p>
						</div>
						<div class="jiangli8 picd3">
							<p>奖励</p>
							<p class="qianfuhao">
								￥<b><?php echo $levels['2']['cost'];?></b>%
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- //团队奖励结束 -->
			<div class="clearFix"></div>
			<!-- //其它说明开始 -->
			<div class="otherinvitez clearFix" <?php if(!$friend_setting['info']['friend_detail_desc'] ) { ?> style="display:none;" <?php } ?>>
					<div class="otherinvitetitlez">
						<p>其他规则</p>
					</div>
					<style type="text/css" media="screen">
					.otherinvitez .otherinvitezmainz{
						height: 332px;
					}
					</style>
					<div class="otherinvitezmainz">
						<?php echo stripslashes(htmlspecialchars_decode($friend_setting['info']['friend_detail_desc'])); ?>
					</div>
				</div>
			<div class="clearFix"></div>
			<!-- //其它说明结束 -->
		</div>
		<!-- // wrap end-->
	</div>

	<!-- end of file -->
	<script type="text/javascript"
		src="<?php echo THEME_STYLE_PATH;?>style/js/jquery.zclip.min.js"></script>
	<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.qrcode.min.js"></script>
	<script type="text/javascript" charset="utf-8" async defer>
		$(function() {
			var count = "<?php echo $count;?>";
			if (count < 10) {
				$('.fenyez').find('.fl').hide().eq(0).show();
			}
			;

			jQuery('#code').qrcode({
				width : 135,
				height : 135,
				correctLevel : 0,
				text : '<?php echo $weixin_url;?>'
			});

			$("#d_clip_button").zclip({
				path : "<?php echo THEME_STYLE_PATH;?>style/js/ZeroClipboard.swf",
				copy : function() {
					art.dialog({
						lock : true,
						fixed : true,
						icon : 'face-smile',
						title : '提示',
						content : '复制成功2',
						ok : true
					});
					return $("#yq_text").val();
				}
			});
		});
	</script>
	<?php include template('footer','common'); ?>