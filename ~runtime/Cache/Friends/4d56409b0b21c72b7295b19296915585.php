<?php defined('IN_TPCMS') or exit('No permission resources.'); ?>
<!DOCTYPE html >
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
  <meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src  'self' 'unsafe-inline' *">
  <title>邀请好友成功</title>
  <link href="/static/lib/css/ionic.css" rel="stylesheet">
  <!-- ionic/angularjs js -->
  <script src="/static/lib/js/ionic.bundle.js"></script>
  <!-- your app's js -->
  <script src="/static/lib/js/angular/angular.min.js"></script>
  <script language="javascript" type="text/javascript" src="/static/js/jquery.min.js"></script>

</head>

  <style>
  .cc {
    color:red;
  }
  </style>

  <div class="bar bar-header bar-color ">
    <a href="#/tab/trial" style="color:#ffffff;" class="button icon ion-ios-arrow-back button-clear head_button1">返回</a>
    <h1 class="title">您已成功完成注册</h1>
  </div>

<body ng-app="MyApp">
  <div class="mainv3">
    <div class="banner3">
    <img width="100%" src="<?php echo IMG_PATH;?>banner.png"/>
    </div>
    <div class="main3">
      <p>恭喜您！注册成功！</p>
      <p>注册成功 您可以直接下载app 免费领取试用商品</p>
      <div class="row">
        <div class="col col-50 ">
          <a href="">
            <img width="60%" src="/static/images/iphone.png"/>
          </a>
        </div>
        <div class="col col-50">
          <a href="">
            <img width="60%" src="/static/images/android.png"/>
          </a>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
      var app = angular.module("MyApp", ['ionic'] );

</script>