/**
 * Created by htzhanglong on 2015/8/2.
 */
// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic','ngFileUpload','starter.controllers','starter.config','starter.services','starter.directive','starter.filter','ngResource','ionic-native-transitions'])

.run(['$rootScope','$location','$state','$ionicPlatform','$timeout','$ionicHistory','$ionicPopup','$ionicLoading','ENV','configFactory','jpushService',function($rootScope,$location,$state,$ionicPlatform,$timeout,$ionicHistory,$ionicPopup,$ionicLoading,ENV,configFactory,jpushService) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleLightContent();
    }
 

  });

//inject angular file upload directives and service.angular.module('myApp', ['angularFileUpload']);var MyCtrl = [ '$scope', '$upload', function($scope, $upload) {



/*          window.onerror = function(msg, url, line) {  
             var idx = url.lastIndexOf("/");  
             if(idx > -1) {  
              url = url.substring(idx+1);  
             }  
             alert("ERROR in " + url + " (line #" + line + "): " + msg);  
             return false;  
          };  */
       

       //分享
      function fenxiang_init(){
          $sharesdk.open("iosv1101", true);

          var sinaConf = {};
          sinaConf["app_key"] = "568898243";
          sinaConf["app_secret"] = "38a4f8204cc784f81f9f0daaf31e02e3";
          sinaConf["redirect_uri"] = "http://www.sharesdk.cn";
          $sharesdk.setPlatformConfig($sharesdk.platformID.SinaWeibo, sinaConf);
       }
       
}])


    .config(['$stateProvider', '$urlRouterProvider','$ionicConfigProvider','$ionicNativeTransitionsProvider',function($stateProvider, $urlRouterProvider,$ionicConfigProvider,$ionicNativeTransitionsProvider) {
      
      $ionicNativeTransitionsProvider.setDefaultOptions({
          duration: 180, // in milliseconds (ms), default 400,
          slowdownfactor: 4, // overlap views (higher number is more) or no overlap (1), default 4
          iosdelay: -1, // ms to wait for the iOS webview to update before animation kicks in, default -1
          androiddelay: -1, // same as above but for Android, default -1
          winphonedelay: -1, // same as above but for Windows Phone, default -1,
          fixedPixelsTop: 0, // the number of pixels of your fixed header, default 0 (iOS and Android)
          fixedPixelsBottom: 0, // the number of pixels of your fixed footer (f.i. a tab bar), default 0 (iOS and Android)
          triggerTransitionEvent: '$ionicView.afterEnter', // internal ionic-native-transitions option
          backInOppositeDirection: false // Takes over default back transition and state back transition to use the opposite direction transition to go back
      });

      $ionicNativeTransitionsProvider.setDefaultTransition({
          type: 'slide',
          direction: 'left'
      });

      $ionicNativeTransitionsProvider.setDefaultBackTransition({
          type: 'slide',
          direction: 'right'
      });

        $stateProvider

            // setup an abstract state for the tabs directive
            .state('tab', {
                url: "/tab",
                abstract: true,
                templateUrl: "templates/tabs.html"
            })

            // Each tab has its own nav history stack:

            .state('tab.home', {
                url: '/home',
                views: {
                    'tab-home': {
                        templateUrl: 'templates/home/home.html',
                        controller: 'HomeCtrl'
                    }
                }
            })
           
           
            .state('tab.trial', {
                url: '/trial',
                views: {
                    'tab-trial': {
                        templateUrl: 'templates/trial/list.html',
                        controller: 'trial_list'
                    }
                }
            })


          .state('tab.trial_red', {
              url: '/trial_red',
              views: {
                  'tab-trial': {
                      templateUrl: 'templates/trial/list-red.html',
                      controller: 'trial_list-red'
                  }
              }
          })




            // .state('tab.trial_rebate_catid', {
            //     url: '/trial/:catid',
            //     views: {
            //         'tab-trial': {
            //             templateUrl: 'templates/trial/list.html',
            //             controller: 'trial_list'
            //         }
            //     }
            // })


            .state('tab.show_trial', {
                url: '/trial/:id',             //试用活动详情
                views: {
                    'tab-trial': {
                        templateUrl: 'templates/trial/show.html',
                         controller: 'show_trial'
                    }
                }
            })

            .state('tab.rebate', {
                url: '/rebate',
                views: {
                    'tab-rebate': {
                        templateUrl: 'templates/rebate/list.html',
                        controller: 'rebate_list'
                    }
                }
            })

            .state('tab.rebate_show', {
                url: '/rebate/:id',      //购物返利详情页
                 views: {
                     'tab-rebate': {
                        templateUrl: 'templates/rebate/show.html',
                         controller: 'rebate_show'
                     }
                 }

            })

            .state('tab.rebate_rebate_catid', {
                url: '/rebate/:catid',
                views: {
                    'tab-rebate': {
                        templateUrl: 'templates/rebate/list.html',
                        controller: 'rebate_list'
                    }
                }
            })


            .state('tab.duo', {
                url: '/duo',
                views: {
                    'tab-duo': {
                        templateUrl: 'templates/duo.html',
                        controller: 'duo'
                    }
                }
            })

            
             .state('article_catid_list', {
                            url: '/article/:catid',
                    templateUrl: 'templates/article/article_catid_list.html',
                     controller: 'article_catid_helplist'

            })

            .state('article_catid_show_list', {
                                url: '/article/catid/:catid',
                        templateUrl: 'templates/article/article_catid_show_list.html',
                         controller: 'article_catid_show_list'
 
            })

            .state('article_show', {
                                url: '/article/show/:id',
                        templateUrl: 'templates/article/article_show.html',
                         controller: 'article_show'
            })

            .state('tab.user', {
                url: '/user',          //会员中心
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user.html',
                        controller: 'Userhome'
                    }
                }
            })
			
            .state('tab.user_login', {  //登录
                url: '/user/login',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/login.html',
                         controller: 'User_login'
                    }
                }
            })

            .state('tab.user_forget', {   //找回密码
                url: '/user/forget',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_forget.html',
                        controller: 'Userforget'
                    }
                }
            })

            .state('tab.user_forget2', {   //重置密码
                url: '/user/forget_2',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_forget_2.html',
                        controller: 'Userforget'
                    }
                }
            })

            .state('tab.user_profile_password', {   //修改密码
                url: '/user/profile/password',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_profile_password.html',
                        controller: 'UserProfilePassword'
                    }
                }
            })


            .state('tab.register', {
                url: '/register',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/register.html',
                         controller: 'User_register'
                                }
                       }
            })

            .state('tab.rebate_order', {
                url: '/user/rebate_order',   //我的返利订单
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/rebate_order.html',
                          controller: 'rebate_order'
                    }
                }
            })

            .state('tab.rebate_order_id', {
                url: '/user/rebate_order/:id/:goodid',   //返利填写订单号 
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/rebate_order_add.html',
                          controller: 'rebate_order_add'
                    }
                }
            })

            .state('tab.commission_order', {
                url: '/user/commission_order',   //我的试用订单
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/commission_order.html',
                          controller: 'commission_order'
                    }
                }
            })

            .state('tab.trial_order', {
                url: '/user/trial_order',   //我的闪电试用订单
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/trial_order.html',
                          controller: 'trial_order'
                    }
                }
            })


            .state('tab.trial_order_id', {
                url: '/user/trial_order/:id/:goodid',   //试用填写订单号 
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/trial_order_add.html',
                          controller: 'trial_order_add'
                    }
                }
            })



            .state('tab.commission_order_id', {
                url: '/user/commission_order/:id/:goodid',   //闪电试用填写订单号 
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/commission_order_add.html',
                          controller: 'commission_order_add'
                    }
                }
            })


            .state('tab.order_appeal', {
                url: '/user/order_appeal/:id/:aid',   //订单申诉
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/order_appeal.html',
                          controller: 'order_Appeal'
                    }
                }
            })


            .state('tab.order_log', {
                url: '/user/order_log/:id',   //订单日志
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/order_log.html',
                          controller: 'Userorder_log'
                    }
                }
            })


            .state('tab.trial_order_report', {
                url: '/user/trial_order/report/:id/:goodid',   //填写试用报告
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/trial_order_add_report.html',
                          controller: 'trial_order_add'
                    }
                }
            })



            .state('tab.rebate_The_sun', {
                url: '/user/rebate_The_sun/report/:id/:goodid',   //晒单分享
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/rebate_The_sun.html',
                          controller: 'rebate_order_add'
                    }
                }
            })


     .state('tab.user_announcement_list', {
                url: '/user/user_announcement_list',   //官方公告列表
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_announcement_list.html',
                          controller: 'user_announcement_list'
                    }
                }
            })

			 //invite_award_error
			 .state('tab.user_announcement',{
				url: '/user/user_announcement',
                views: {                        //官方公告列表里面的重要公告
                    'tab-user': {
                        templateUrl: 'templates/user/user_announcement.html',
                        controller: 'user_announcement'
                    }
                }
				
			})

    //invite_award_error
			 .state('tab.user_announcement_vip',{
				url: '/user/user_announcement_vip',
                views: {                        //官方公告列表里面的vip公告
                    'tab-user': {
                        templateUrl: 'templates/user/user_announcement_vip.html',
                        controller: 'user_announcement'
                    }
                }
				
			})
			 
			 .state('tab.user_announcement_notice',{
				url: '/user/user_announcement_notice',
                views: {                        //官方公告列表里面的新通知
                    'tab-user': {
                        templateUrl: 'templates/user/user_announcement_notice.html',
                        controller: 'user_announcement'
                    }
                }
				
			})
			 
			 .state('tab.user_announcement_new',{
				url: '/user/user_announcement_new',
                views: {                        //官方公告列表里面的新通知
                    'tab-user': {
                        templateUrl: 'templates/user/user_announcement_new.html',
                        controller: 'user_announcement'
                    }
                }
				
			})


            .state('tab.task_order', {
                url: '/user/task_order',   //我的日赚任务
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/task_order.html',
                          controller: 'task_order'
                    }
                }
            })



            .state('tab.task', {
                url: '/task',   //我的日赚任务列表
                views: {
                    'tab-duo': {
                         templateUrl: 'templates/task/list.html',
                          controller: 'task_list'
                    }
                }
            })


            .state('tab.task_show', {
                url: '/task/:id',   //日赚任务详情
                views: {
                    'tab-duo': {
                         templateUrl: 'templates/task/show.html',
                          controller: 'task_show'
                    }
                }
            })

            .state('tab.user_deposite', {
                url: '/user/deposite',   //申请提现
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_deposite.html',
                          controller: 'UserDeposite'
                    }
                }
            })


            .state('tab.user_deposite_record', {
                url: '/user/deposite_record',   //提现记录
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_deposite_record.html', 
                          controller: 'UserDeposite'
                    }
                }
            })

            .state('tab.user_log', {
                url: '/user/log',   //账户明细
                cache:'false',
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_log.html', 
                          controller: 'UserLog'
                    }
                }
            })

            .state('tab.user_yeb', {
                url: '/user/yeb',   //淘金呗--列表
                cache:'false',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_yeb.html',
                        controller: 'UserYeb'
                    }
                }
            })

            .state('tab.user_yeb_index', {
                url: '/user/yeb_index',   //淘金呗
                cache:'false',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_yeb_index.html',
                        controller: 'UserYebIndex'
                    }
                }
            })

            .state('tab.user_money_transfer_index', {
                url: '/user/money_transfer_index',   //转帐
                cache:'false',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_money_transfer_index.html',
                        controller: 'MoneyTransferIndex'
                    }
                }
            })


            .state('tab.user_profile', {
                url: '/user/profile',  //个人信息 用户设置
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile.html',
                         controller: 'UserPersonal'
                    }
                }
            })


            .state('tab.user_profile_nickname', {
                url: '/user/profile/nickname',  //我的昵称
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_nickname.html',
                         controller: 'UserProfileNiknname'
                    }
                }
            })
			
			.state('tab.user_upvip', {
                url: '/user/upvip',  //会员升级
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_upvip.html',
                         controller: 'UserProfileNiknname'
                    }
                }
            })
			
			.state('tab.user_payment', {
                url: '/user/payment',  //会员支付
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_payment.html',
                         controller: 'UserProfileNiknname'
                    }
                }
            })
			
            .state('tab.user_profile_phone', {
                url: '/user/profile/phone',  //我的手机
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_phone.html',
                         controller: 'UserProfilePhone'
                    }
                }
            })

            .state('tab.user_profile_qq', {
                url: '/user/profile/qq',  //我的QQ
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_qq.html',
                         controller: 'UserProfileQQ'
                    }
                }
            })

            .state('tab.user_profile_email', {
                url: '/user/profile/email',  //我的邮箱
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_email.html',
                         controller: 'UserProfileEmail'
                    }
                }
            })

            .state('tab.user_profile_taobao', {
                url: '/user/profile/taobao',  //我的淘宝帐号绑定
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_taobao.html',
                          controller: 'UserProfiletaobao'
                    }
                }
            })

            .state('tab.user_profile_card', {
                url: '/user/profile/card',  //身份证实名认证
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_card.html',
                         controller: 'UserProfileCard'
                    }
                }
            })

            .state('tab.user_profile_alipay', {
                url: '/user/profile/alipay',  //支付宝绑定
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_alipay.html',
                         controller: 'UserProfileAllpay'
                    }
                }
            })

            .state('tab.user_profile_bankcard', {
                url: '/user/profile/bankcard',  //银行卡绑定
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_bankcard.html',
                         controller: 'UserProfileBankCard'
                    }
                }
            })

            .state('tab.user_profile_address', {
                url: '/user/profile/address',  //收货地址
                views: {
                    'tab-user': {
                         templateUrl: 'templates/user/user_profile_address.html',
                         controller: 'UserProfileAddress'
                    }
                }
            })

            .state('tab.user_announce', {
                url: '/user/announce',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_announce.html',
                        controller: 'user_announce'
                    }
                }
            }) 


            .state('tab.user_announce_show', {
                url: '/user/announce/:type/:id',
                views: {
                    'tab-user': {
                        templateUrl: 'templates/user/user_announce_show.html',
                        controller: 'announce_show'
                    }
                }
            }) 

            .state('tab.jifenduihuan', {
                url: '/jifenduihuan',
                views: {                        //积分兑换
                    'tab-duo': {
                        templateUrl: 'templates/Integral/list.html',
                         controller: 'integral_list'
                    }
                }
            })  


            .state('tab.jifen_show', {
                url: '/jifen/:id',
                views: {                        //积分兑换详情页面
                    'tab-duo': {
                        templateUrl: 'templates/Integral/show.html',
                        controller: 'integral_show'
                    }
                }
            })

            .state('tab.user_jifen_order', {
                url: '/user/jifen_order',
                views: {                        //我的积分兑换记录
                    'tab-user': {
                        templateUrl: 'templates/user/jifen_oeder.html',
                        controller: 'jifen_order'
                    }
                }
            })

            .state('tab.invitation', {
                url: '/invitation',
                views: {                        //推荐好友
                    'tab-duo': {
                        templateUrl: 'templates/user/invitation.html',
                        controller: 'invitation'
                    }
                }
            })


            .state('tab.invitation_log', {
                url: '/invitation_log',
                views: {                        //推荐好友记录
                    'tab-user': {
                        templateUrl: 'templates/user/invitation.log.html',
                        controller: 'Userhome'
                    }
                }
            })

            .state('tab.trial_help_se', {
                url: '/trial_help_search',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/trial/help.html',
                        controller: 'help'
                    }
                }
            })

            .state('tab.fenxiang', {
                url: '/fenxiang',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'index.2.html',
                        controller: 'help'
                    }
                }
            })


            .state('tab.help_order_sn', {
                url: '/help/order_sn',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/article/order_help.html',
                        controller: 'help'
                    }
                }
            })

            .state('tab.help_so', {
                url: '/help/so',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/article/so_help.html',
                        controller: 'help'
                    }
                }
            })

            .state('tab.help_apply', {
                url: '/help/apply',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/article/apply_help.html',
                        controller: 'help'
                    }
                }
            })

            .state('tab.help_commission', {
                url: '/help/commission',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/article/commission_help.html',
                        controller: 'help'
                    }
                }
            })

            .state('tab.help_about', {
                url: '/help/about',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/article/about_help.html',
                        controller: 'help'
                    }
                }
            })
            
            .state('tab.apply', {
                url: '/apply',
                views: {                        //搜索下单指引
                    'tab-duo': {
                        templateUrl: 'templates/tab-apply.html',
                        controller: 'help'
                    }
                }
            })

            .state('tab.article_index', {
              url: '/article',
              views: {
                'tab-duo': {
                  templateUrl: 'templates/article/article_index.html',
                  controller: 'help'
                }
              }

            })

            .state('tab.trial_help', {
                url: '/trial_help',
                views: {                        //试用新手指引
                    'tab-duo': {
                        templateUrl: 'templates/article/trial_help.html',
                         controller: 'help'
                    }
                }
            })

            .state('tab.jiang', {
                url: '/jiang',
                views: {                        //天天大转盘
                    'tab-duo': {
                        templateUrl: 'templates/user/jiang.html',
                         controller: 'jiang'
                    }
                }
            })

            .state('tab.jiang_log', {
                url: '/jiang_log',
                views: {                        //天天大转盘
                    'tab-duo': {
                        templateUrl: 'templates/user/jiang_log.html',
                         controller: 'jiang'
                    }
                }
            })

            .state('tab.commission', {
                url: '/commission',
                views: {                        //闪电试用
                    'tab-duo': {
                        templateUrl: 'templates/commission/list.html',
                         controller: 'commission_list'
                    }
                }
            })

            .state('tab.commission_show', {
                url: '/commission/:id',
                views: {                        //闪电试用
                    'tab-duo': {
                        templateUrl: 'templates/commission/show.html',
                         controller: 'commission_show'
                    }
                }
            })


           .state('tab.so', {
               url: '/so',
               views: {                        //闪电试用
                   'tab-duo': {
                       templateUrl: 'templates/so/list.html',
                        controller: 'so_list'
                   }
               }
            })
           
           
           
			.state('tab.direct_push',{
				url: '/help/direct_push',
                views: {                        //直接推广
                    'tab-duo': {
                        templateUrl: 'templates/article/direct_push.html',
                        controller: 'help'
                    }
                }
				
			})
		   .state('tab.account_error',{
				url: '/help/account_error',
                views: {                        //账号错误
                    'tab-duo': {
                        templateUrl: 'templates/article/account_error.html',
                        controller: 'help'
                    }
                }
				
			})
            .state('tab.order_error',{
				url: '/help/order_error',
                views: {                        //APP去下单的时候错误
                    'tab-duo': {
                        templateUrl: 'templates/article/order_error.html',
                        controller: 'help'
                    }
                }
				
			})
			 .state('tab.reputably_error',{
				url: '/help/reputably_error',
                views: {                        //第几天好评错误
                    'tab-duo': {
                        templateUrl: 'templates/article/reputably_error.html',
                        controller: 'help'
                    }
                }
				
			})
			
			 .state('tab.fooget_reputably_error',{
				url: '/help/fooget_reputably_error',
                views: {                        //好评时忘记截图了怎么办？
                    'tab-duo': {
                        templateUrl: 'templates/article/fooget_reputably_error.html',
                        controller: 'help'
                    }
                }
				
			})
			 .state('tab.change_klzname_error',{
				url: '/help/change_klzname_error',
                views: {                        //修改不了快乐挣的昵称是为什么？
                    'tab-duo': {
                        templateUrl: 'templates/article/change_klzname_error.html',
                        controller: 'help'
                    }
                }
				
			})
			 .state('tab.order_show_error',{
				url: '/help/order_show_error',
                views: {                        //快乐挣订单状态显示被关闭？
                    'tab-duo': {
                        templateUrl: 'templates/article/order_show_error.html',
                        controller: 'help'
                    }
                }
				
			})
			 .state('tab.invite_frient',{
				url: '/help/invite_frient',
                views: {                        //看到我的直推有多少人
                    'tab-duo': {
                        templateUrl: 'templates/article/invite_frient.html',
                        controller: 'help'
                    }
                }
				
			})
			 .state('tab.invite_award_error',{
				url: '/help/invite_award_error',
                views: {                        //为什么，我推荐了好友看不到推荐奖励？
                    'tab-duo': {
                        templateUrl: 'templates/article/invite_award_error.html',
                        controller: 'help'
                    }
                }
				
			})
  
            ;

        // if none of the above states are matched, use this as the fallback
      $urlRouterProvider.otherwise('/tab/home');

}]);
