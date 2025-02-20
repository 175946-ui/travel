<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>首页--旅游网站</title>
    <link rel="stylesheet" href="css/style.css">
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
            <li><a href="./admin/login.html">登录/注册</a></li>
        </ul>
    </nav>
</header>
<?php 
    include "connectSQL.php";
    $keyword = '';
    $where = '';
    if(!empty($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $where = ' where location like ?';
    }
    try {
        $sql = "select * from content $where order by id desc";
        $stmt = $pdo->prepare($sql);
        if (!empty($where)) {
            $stmt->execute(array("%".$_GET['keyword']."%"));
        } else {
            $stmt->execute();
        }
        // var_dump($stmt->queryString);
        // var_dump($result);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo '数据库操作异常：' . $e->getMessage();
        exit;
    }
?>
<div class="search">
<form action="" method="get">
    <div class="center"></div>
    <input class="input" type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="请输入陆游景点或城市">
    <button class="button">搜索</button>
</form>
</div>
<div class="tour">
    <section class="news">
        <h2>热门旅游</h2>
        <p>国内旅游、国外旅游、自助旅游、自驾旅游、油轮签证、主题旅游等各种最新热门旅游推荐</p>
    </section>
<?php 
    foreach ($result as $row){
?>
    <figure>
        <a href="detail.php?id=<?php echo $row['id']; ?>">
            <img src="./admin/uploads/<?php echo $row['image']; ?>" alt="">
        </a>
        <figcaption>
        <span class="item-t">
            <a href="detail.php?id=<?php echo $row['id']; ?>">
                <strong class="title"> &lt;<?php echo $row['location']; ?>&gt;</strong> <?php echo $row['introduce']; ?>
            </a>
        </span>
        <div class="info">
            <em class="sat">满意度 <?php echo $row['manyidu']; ?>%</em>
            <span class="price">￥ <strong><?php echo $row['price']; ?></strong> 起</span>
        </div>
        <div class="type">国内长线</div>

        </figcaption>
    </figure>
 <?php } ?>
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