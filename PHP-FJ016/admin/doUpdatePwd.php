<?php
header("content-type:text/html;charset=utf-8");
session_start();
include "../connectSQL.php";
	
//接收传值
$mpass = $_POST['mpass']; //原密码
$newpass = $_POST['newpass']; //新密码
$renewpass = $_POST['renewpass']; //重复新密码
if ($newpass!=$renewpass) {
	echo "<script>alert('两次输入的密码不一致，请重新输入！');history.go(-1)</script>";
	exit;
}

try{
	//验证原密码
	$stmt = $pdo->prepare("select userPass from chat_user where userName = ?");
	$stmt->execute(array($_SESSION['admin_users']['userName']));
 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
 	if($mpass != $row['userPass']){//判断密码
		echo "<script>alert('原密码错误，请重新输入！');history.go(-1)</script>";
		exit;			
	}

	$sql = "update chat_user set userPass=:userPass where userName=:userName";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':userPass', $newpass);
	$stmt->bindParam(':userName', $_SESSION['admin_users']['userName']);
	$stmt->execute();
	echo "<script>alert('密码修改成功！');window.location.href='updatePwd.php'</script>";
}catch(PDOException $e){
	echo "<script>alert(\"密码修改失败！".$e->getMessage()."\");window.history.go(-1)</script>";
}