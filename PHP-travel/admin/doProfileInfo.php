<?php
header("content-type:text/html;charset=utf-8");
session_start();
include "../connectSQL.php";
	
//接收传值
$info = array(
	'companyName' => $_POST['companyName'],
	'address' => $_POST['address'],
	'code' => $_POST['code'],
	'telephone' => $_POST['telephone'],
	'fax' => $_POST['fax'],
	'about' => $_POST['about'],
);

try{
	foreach ($info as $fieldName => $content) {
		$sql = "insert into about(fieldName,content) VALUES(:fieldName,:content) on DUPLICATE KEY UPDATE content=:content";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':fieldName', $fieldName);
		$stmt->bindParam(':content', $content);
		$stmt->execute();
	}
	echo "<script>alert('修改成功！');window.location.href='profileInfo.php'</script>";
}catch(PDOException $e){
	echo "<script>alert(\"修改失败！".$e->getMessage()."\");window.location.href='profileInfo.php'</script>";
}