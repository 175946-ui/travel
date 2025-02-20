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
    <title>网站后台管理系统</title>

    <link rel="stylesheet" href="./css/pintuer.css">
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1>后台管理中心</h1>
  </div>
  <div class="head-l">
    <a class="button button-little bg-green" href="../" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;
    <a class="button button-little bg-red" href="./doLogout.php"><span class="icon-power-off"></span> 退出登录</a> &nbsp;&nbsp;
    <span style="color: #fff;">欢迎您，
    <?php
      if(isset($_SESSION['admin_users'])){
        echo $_SESSION['admin_users']['userName'];
      }
    ?></span>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
<!--   <h2><span class="icon-user"></span>会员管理</h2>
  <ul style="display:block">
    <li><a href="./user/users.php" target="right"><span class="icon-caret-right"></span>会员管理</a></li>
  </ul> -->

  <h2><span class="icon-file-o"></span>首页管理</h2>
  <ul style="display:block">
    <li><a href="./list.php" target="right"><span class="icon-caret-right"></span>首页管理</a></li>      
    <li><a href="./add.php" target="right"><span class="icon-caret-right"></span>发布信息</a></li>      
  </ul> 

  <h2><span class="icon-file-o"></span>公司简介管理</h2>
  <ul style="display:block">
    <li><a href="profileInfo.php" target="right"><span class="icon-caret-right"></span>公司简介管理</a></li>    
  </ul> 
  <h2><span class="icon-gear"></span>修改密码</h2>
  <ul style="display:block">
    <li><a href="updatePwd.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>      
  </ul>  

</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
  $(".bread .icon-home").click(function(){
      $("#a_leader_txt").text('网站信息');
  })
});
</script>
<ul class="bread">
  <li><a href="info.php" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>