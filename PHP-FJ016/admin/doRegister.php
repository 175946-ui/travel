<?php
header("content-type:text/html;charset=utf-8");
session_start();
include "../connectSQL.php";

// 1.接收注册用户填写的用户名和用户密码
$userName = $_POST['userName'];
$password = $_POST['userPwd'];
$password2 = $_POST['userPwd2'];
if ($password2 != $password) {
    echo "<script>alert('两次密码不一致，请重新输入！');history.back()</script>";
    exit;
}
try{
    //验证数据库里是否已经存在
    $stmt = $pdo->prepare("select * from chat_user where userName=?");
    $stmt->execute(array($userName));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        echo "<script>alert('该用户名已存在，请重新输入！');history.back()</script>";
        exit;
    }

    // 插入数据库
    $insert = "insert into chat_user(userName,userPass) values(:userName, :password)";
    $stmt = $pdo->prepare($insert);
    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    echo "<script>alert('注册成功');window.location.href='login.html'</script>";
}catch(PDOException $e){
    echo "<script>alert(\"注册失败".$e->getMessage()."\");history.back()</script>";
}