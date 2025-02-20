<?php 
if (!isset($_SESSION)) {
    session_start();//开启session
}
if(!isset($_SESSION['admin_users'])){
  echo "<script>window.top.location.href='./login.html'</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="./css/pintuer.css">
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
      <div class="form-group" style="padding-left: 20px;">
        <div class="label">
          <label>使用域名：</label>
          <span class="info"> <?php echo $_SERVER['HTTP_HOST'];?></span>
        </div>
      </div>
  </div>
</div>
</body></html>