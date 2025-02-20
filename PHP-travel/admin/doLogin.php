<?php
header("content-type:text/html;charset=utf-8");
session_start();
include "../connectSQL.php";

if ($_POST['code'] != $_SESSION['verify_code']) {
    echo "<script>alert('验证码错误，请重新输入！');history.back()</script>";
    exit;
}
// 1.接收用户post方式传递过来的用户名和密码
$userName = $_POST['userName'];
$userPwd = $_POST['userPwd'];
// 2.去数据库中查询有没有这样的用户名和密码，如果有就表示账户密码没有问题，就登录成功

//验证数据库里的账号 密码
try{
    $stmt = $pdo->prepare("SELECT * FROM chat_user where userName=? and userPass=?");
    $stmt->execute(array($userName,$userPwd));
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$arr) {
        echo "<script>alert('账号或者密码错误，请重新登录！');history.back()</script>";
    }else{
        $_SESSION['admin_users'] = $arr;
        echo "<script>window.location.href='index.php'</script>";
    }
}catch(PDOException $e){
    echo "<script>alert(\"登录失败！".$e->getMessage()."\");window.history.back()</script>";
}
