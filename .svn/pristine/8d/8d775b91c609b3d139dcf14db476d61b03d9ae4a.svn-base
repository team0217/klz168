<?php
namespace Member\Controller;
use \Admin\Controller\InitController;
/*  云划算试客系统与uc的通信处理接口   */
class UCenterController extends InitController{
	public function _initialize(){


    }

     //会员同步注册
    public function uc_register(){

        if(empty($_POST['submit'])) {
            //注册表单
            echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?example=register">';
            if($_GET['action'] == 'activation') {
                echo '激活:';
                list($activeuser) = explode("\t", uc_authcode($_GET['auth'], 'DECODE'));
                echo '<input type="hidden" name="activation" value="'.$activeuser.'">';
                echo '<dl><dt>用户名</dt><dd>'.$activeuser.'</dd></dl>';
            } else {
                echo '注册:';
                echo '<dl><dt>用户名</dt><dd><input name="username"></dd>';
                echo '<dt>密码</dt><dd><input name="password"></dd>';
                echo '<dt>Email</dt><dd><input name="email"></dd></dl>';
            }
            echo '<input name="submit" type="submit">';
            echo '</form>';
        } else {
            //在UCenter注册用户信息
            $username = '';
            if(!empty($_POST['activation']) && ($activeuser = uc_get_user($_POST['activation']))) {
                list($uid, $username) = $activeuser;
            } else {
                if(uc_get_user($_POST['username']) && !$db->result_first("SELECT uid FROM {$tablepre}members WHERE username='$_POST[username]'")) {
                    //判断需要注册的用户如果是需要激活的用户，则需跳转到登录页面验证
                    echo '该用户无需注册，请激活该用户<br><a href="'.$_SERVER['PHP_SELF'].'?example=login">继续</a>';
                    exit;
                }

                $uid = uc_user_register($_POST['username'], $_POST['password'], $_POST['email']);
                if($uid <= 0) {
                    if($uid == -1) {
                        echo '用户名不合法';
                    } elseif($uid == -2) {
                        echo '包含要允许注册的词语';
                    } elseif($uid == -3) {
                        echo '用户名已经存在';
                    } elseif($uid == -4) {
                        echo 'Email 格式有误';
                    } elseif($uid == -5) {
                        echo 'Email 不允许注册';
                    } elseif($uid == -6) {
                        echo '该 Email 已经被注册';
                    } else {
                        echo '未定义';
                    }
                } else {
                    $username = $_POST['username'];
                }
            }
            if($username) {
                $db->query("INSERT INTO {$tablepre}members (uid,username,admin) VALUES ('$uid','$username','0')");
                //注册成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
                setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
                echo '注册成功<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
                exit;
            }
        }
    }
   

   //会员同步登录
 public function uc_login(){
       if(empty($_POST['submit'])) {
        //登录表单
        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?example=login">';
        echo '登录:';
        echo '<dl><dt>用户名</dt><dd><input name="username"></dd>';
        echo '<dt>密码</dt><dd><input name="password" type="password"></dd></dl>';
        echo '<input name="submit" type="submit"> ';
        echo '</form>';
       } else {
        //通过接口判断登录帐号的正确性，返回值为数组
        list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);
        setcookie('Example_auth', '', -86400);
        if($uid > 0) {
            if(!$db->result_first("SELECT count(*) FROM {$tablepre}members WHERE uid='$uid'")) {
                //判断用户是否存在于用户表，不存在则跳转到激活页面
                $auth = rawurlencode(uc_authcode("$username\t".time(), 'ENCODE'));
                echo '您需要需要激活该帐号，才能进入本应用程序<br><a href="'.$_SERVER['PHP_SELF'].'?example=register&action=activation&auth='.$auth.'">继续</a>';
                exit;
            }
            //用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
            setcookie('Example_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
            //生成同步登录的代码
            $ucsynlogin = uc_user_synlogin($uid);
            echo '登录成功'.$ucsynlogin.'<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
            exit;
        } elseif($uid == -1) {
            echo '用户不存在,或者被删除';
        } elseif($uid == -2) {
            echo '密码错';
        } else {
            echo '未定义';
        }
       }

}


public function uc_logout(){
    setcookie('Example_auth', '', -86400);
    //生成同步退出的代码
    $ucsynlogout = uc_user_synlogout();
    echo '退出成功'.$ucsynlogout.'<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
    exit;

}




}