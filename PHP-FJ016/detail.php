<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>详情--旅游网站</title>
	<link rel="stylesheet" href="css/column.css">
	<link rel="stylesheet" href="css/basic.css">
</head>
<body>
<header>
	<nav id="nav">
	<div id="logo"><img src="img/logo.png" alt="" height="70px"></div> 
	<ul>
		<li class="active"><a href="index.php">首页</a></li>
		<li><a href="informations.html">旅游资讯</a></li>
        <li><a href="https://www.ctrip.com/" target="_blank">机票订购</a></li>
        <li><a href="about.php">公司简介</a></li>
        <li><a href="./admin/login.html" target="_blank">登录/注册</a></li>
	</ul>
	</nav>
</header>
<div id="headline">
    <div class="headline">
    <hgroup>
        <h2>旅游资讯</h2>
        <p>介绍各种最新旅游信息、资讯要闻、景点攻略等</p>
        </hgroup>
    </div>
</div>
<div id="container">
<article class="list about">
<?php 
if (empty($_GET['id'])) {
    echo "<script>alert('参数错误');history.go(-1)</script>";
    exit;
  }
include "./connectSQL.php";
try {
  //查询
  $stmt = $pdo->prepare("select * from content where id=?");
  $stmt->execute(array($_GET['id']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo '数据库操作异常：' . $e->getMessage();
  exit;
}
?>
<section>
    <h2><?php echo $row['location']; ?><span class="price">￥ <?php echo $row['price']; ?> 起</span></h2>
    <p style="text-indent:0;margin:0;"><?php echo $row['introduce']; ?></p>
</section>
<section class="content" style="margin-top: 10px;">
    <!-- <h2>详情</h2> -->
    <img src="admin/uploads/<?php echo $row['image']; ?>" alt="" style="max-width: 100%;">
    <pre>
    <?php echo str_replace('./uploads/images/','./admin/uploads/images/',$row['content']); ?>
    </pre>
</section>
</article>
<aside class="sidebar">
    <div class="recommend sidebox">
    <h3>景点推荐</h3>
    <div class="tag">
    <ul>
		<li><a href="###">曼谷(12)</a></li>
		<li><a href="###">东京(5)</a></li>
		<li><a href="###">西双版纳(8)</a></li>
		<li><a href="###">漓江(16)</a></li>
		<li><a href="###">呼伦贝尔(4)</a></li>
		<li><a href="###">首尔(9)</a></li>
		<li><a href="###">巴厘岛(15)</a></li>
		<li><a href="###">土耳其(22)</a></li>
		<li><a href="###">夏威夷(5)</a></li>
		<li><a href="###">巴厘岛(11)</a></li>
		<li><a href="###">毛里求斯(7)</a></li>
		<li><a href="###">吉普岛(4)</a></li>
		<li><a href="###">希腊(18)</a></li>
		<li><a href="###">法瑞意(8)</a></li>
		<li><a href="###">马尔代夫(9)</a></li>
		<li><a href="###">新西兰(16)</a></li>
		<li><a href="###">埃及(11)</a></li>
		<li><a href="###">迪拜(14)</a></li>
		<li><a href="###">斯里兰卡(7)</a></li>
		<li><a href="###">麦哈顿(3)</a></li>
		<li><a href="###">大阪(15)</a></li>
	</ul>
</div>
    </div>
    <div class="hot sidebox">
    <h3>热门旅游</h3>
    <div class="figure">
    <figure>
    <img src="img/hot1.jpg" alt="曼谷-芭提雅6日游">
    <figcaption>曼谷-芭提雅6日游</figcaption>
</figure>
<figure>
    <img src="img/hot2.jpg" alt="马尔代夫双鱼6日游">
    <figcaption>马尔代夫双鱼6日游</figcaption>
</figure>
<figure>
    <img src="img/hot3.jpg" alt="海南双飞5日游">
    <figcaption>海南双飞5日游</figcaption>
</figure>
<figure>
    <img src="img/hot4.jpg" alt="富山大阪东京8日游">
    <figcaption>富山大阪东京8日游</figcaption>
    </div>
    </div>
    <div class="treasure sidebox">
    <h3>旅游百宝箱</h3>
    <div class="box">
    <a href="" class="trea1">天气预报</a>
    <a href="" class="trea2">火车票查询</a>
    <a href="" class="trea3">航空查询</a>
    <a href="" class="trea4">地铁线路查询</a>
    </div>
    </div>
</aside>
</div>

	<footer id="footer">
	<div class="top">
	<div class="block left">
	<h3>合作伙伴</h3>
	<hr>
	<ul>
		<li>途牛旅游网</li>
		<li>驴妈妈旅游网</li>
		<li>携程旅游</li>
		<li>中国去青年旅行社</li>
	</ul>

	</div>
	<div class="block middle">
	<h3>旅游FAQ</h3>
	<hr>
	<ul>
		<li>旅游合同签订方式？</li>
		<li>儿童价是基于什么制定的？</li>
		<li>旅游的线路品质怎么界定的？</li>
		<li>单房差是什么？</li>
		<li>旅游保险有那些种类？</li>
	</ul>
	</div>
	<div class="block right">
	<h3>联系方式</h3>
	<hr>
	<ul>
		<li>微博：weibo.com/xuehua</li>
		<li>邮件：xuehua@xuehua.com</li>
		<li>地址：江苏盐城无名路123 号</li>

	</ul>
	</div>
	
	</div>
	<div class="bottom">Copyright © XUEHUA 雪花旅行社| 苏ICP 备120110119 号| 旅行社经营许可证：L-YC-BK12345</div>
	</footer>
</body>
</html>