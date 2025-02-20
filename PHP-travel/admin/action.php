<?php
header("content-type:text/html;charset=utf-8");
session_start();
include "../connectSQL.php";
include "./functions.php";
$uid = $_SESSION['admin_users']['Id']; //只能发布修改自己的信息

	switch($_GET['a']){
		case 'add':
			if (!$_POST['location']) {
				echo "<script>alert('请输入标题');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['introduce']) {
				echo "<script>alert('请输入简介');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['price']) {
				echo "<script>alert('请输入价格');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['manyidu']) {
				echo "<script>alert('请输入满意度');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['content']) {
				echo "<script>alert('请输入商品详情');history.go(-1)</script>";
				exit;
			}

			// 封面图上传
			$fileInfo = fileupload('./uploads/', $_FILES['image']); //调用include文件夹里面的functions文件里的上传函数
			if (!$fileInfo['error']) {
				echo "<script>alert('".$fileInfo['info']."');history.go(-1)</script>";
				exit;
			}
			$image = $fileInfo['info']; //上传后的图片名称
			
			try {
				$insert = "insert into content(uid,location,introduce,price,manyidu,image,content,addtime) values(:uid,:location,:introduce,:price,:manyidu,:image,:content,:addtime)";
				$stmt = $pdo->prepare($insert);
				$stmt->bindParam(':uid', $uid);
				$stmt->bindParam(':location', $_POST['location']);
				$stmt->bindParam(':introduce', $_POST['introduce']);
				$stmt->bindParam(':price', $_POST['price']);
				$stmt->bindParam(':manyidu', $_POST['manyidu']);
				$stmt->bindParam(':image', $image);
				$stmt->bindParam(':content', $_POST['content']);
				$stmt->bindParam(':addtime', date("Y-m-d H:i:s"));
				$stmt->execute();
				echo "<script>alert('发布成功！');window.location.href='list.php'</script>";
			} catch (Exception $e) {
				//如果上传了新图片，数据操作失败删除新图片
				@unlink("./uploads/".$image);
				var_dump($e->getTrace());//获取完整的错误数据
				echo "<script>alert(\"发布失败！".$e->getMessage()."\");window.history.go(-1)</script>";
			}
			break;
					
		case 'update':
			if (!$_POST['id']) {
				echo "<script>alert('参数缺失');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['location']) {
				echo "<script>alert('请输入标题');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['introduce']) {
				echo "<script>alert('请输入简介');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['price']) {
				echo "<script>alert('请输入价格');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['manyidu']) {
				echo "<script>alert('请输入满意度');history.go(-1)</script>";
				exit;
			}
			if (!$_POST['content']) {
				echo "<script>alert('请输入商品详情');history.go(-1)</script>";
				exit;
			}

			if ($_FILES['image']['size']>0) { //如果上传了新的图片
				$fileInfo = fileupload('./uploads/', $_FILES['image']); //调用include文件夹里面的functions文件里的上传函数
				if (!$fileInfo['error']) {
					echo "<script>alert('".$fileInfo['info']."');history.go(-1)</script>";
					exit;
				}
				$image = $fileInfo['info']; //上传后的图片名称
			}else{
				$image = $_POST['oldImg'];
			}

			try{
			 	$sql = "update content set location=:location,introduce=:introduce,price=:price,manyidu=:manyidu,image=:image,content=:content where uid=:uid and id=:id";
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':location', $_POST['location']);
				$stmt->bindParam(':introduce', $_POST['introduce']);
				$stmt->bindParam(':price', $_POST['price']);
				$stmt->bindParam(':manyidu', $_POST['manyidu']);
				$stmt->bindParam(':image', $image);
				$stmt->bindParam(':content', $_POST['content']);
				$stmt->bindParam(':uid', $uid);
				$stmt->bindParam(':id', $_POST['id']);
				$stmt->execute();
				if ($image != $_POST['oldImg']) { //如果上传了新图片，则删除原图片
					@unlink("./uploads/".$_POST['oldImg']);
				}
				echo "<script>alert('修改成功！');window.location.href='list.php'</script>";
			}catch(PDOException $e){
				if ($image != $_POST['oldImg']) { //如果上传了新图片，数据操作失败删除新图片
					@unlink("./uploads/".$image);
				}
				echo "<script>alert(\"修改失败！".$e->getMessage()."\");window.history.go(-1)</script>";
			}
			break;

		case 'del':
			try {
				$sql = "delete from content where uid=:uid and id=:id";
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':uid', $uid);
				$stmt->bindParam(':id', $_GET['id']);
				$stmt->execute(); 
				// var_dump($stmt->debugDumpParams());
				// die;
				@unlink("./uploads/".$_GET['img']);
				echo "<script>alert('删除成功！');history.go(-1)</script>";
			} catch (Exception $e) {
				echo "<script>alert(\"删除失败！".$e->getMessage()."\");window.history.go(-1)</script>";
			}
			break;
	}