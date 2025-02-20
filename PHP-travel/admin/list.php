<?php 
  if (!isset($_SESSION)) {
      session_start();//开启session
  }
  if(!isset($_SESSION['admin_users'])){
    echo "<script>window.top.location.href='./login.html'</script>";
    exit;
  }
  $uid = $_SESSION['admin_users']['Id'];
  // var_dump($uid);
  include "../connectSQL.php";

  $keyword = '';
  if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
  }
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="./css/pintuer.css">
    <link rel="stylesheet" href="./css/admin.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/pintuer.js"></script>  
</head>
<body>
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 信息列表</strong></div>
    <div class="padding border-bottom">
    <form method="get" action="">
      <ul class="search" style="padding-left:10px;">  
        <li>关键词：</li>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keyword" value="<?php echo $keyword; ?>" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <input type="submit" value="查询" class="button border-main icon-search">
        </li>
      </ul>
      </form>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>标题</th>       
        <th>简介</th>       
        <th>价格</th>
        <th>满意度</th>
        <th>图片</th>
        <th>添加时间</th>
        <th>操作</th>    
      </tr>  
      <?php
        $where = "";//搜索条件给数据库
            $url = "";//搜索条件给url 实现url的状态维持
            //判断搜索条件是否存在
            if (!empty($_GET['keyword'])) {
                $where = " where uid=? and (location like ? or introduce like ?) ";
                $url = "&keyword={$_GET['keyword']}";
            }

            $page = !empty($_GET['p']) ? $_GET['p'] : 1;//具体的页码
            $pagesize = 4;//每页显示多少条
            $maxrow = 0;//一共有多少条信息
            $maxpage = 0;//一共显示多少页

            try {
                //  一共有多少条信息
                $sql = "select id from content " . $where;
                $stmt = $pdo->prepare($sql);

                if (!empty($_GET['keyword'])) {
                    $stmt->execute(array($uid, "%".$_GET['keyword']."%", "%".$_GET['keyword']."%"));
                } else {
                    $stmt->execute();
                }

                $maxrow = $stmt->rowCount();
            } catch (PDOException $e) {
                echo '数据库操作异常：' . $e->getMessage();
                exit;
            }

            $maxpage = ceil($maxrow / $pagesize);  //一共分多少页
            //  判断一下页码的有效
            if ($page > $maxpage) {
                $page = $maxpage;
            }
            if ($page < 1) {
                $page = 1;
            }
            if ($maxpage < 1) {
                $maxpage = 1;
            }

            try {
                //拼接搜索和分页的功能
                $sql = "select * from content " . $where . " order by id desc limit " . ($page - 1) * $pagesize . "," . $pagesize;
                $stmt = $pdo->prepare($sql);

                if (!empty($_GET['keyword'])) {
                    $stmt->execute(array($uid, "%".$_GET['keyword']."%", "%".$_GET['keyword']."%"));
                }else{
                    $stmt->execute();
                }

                // var_dump($stmt->queryString);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo '数据库操作异常：' . $e->getMessage();
                exit;
            }

            $index = 1;
            foreach ($result as $row) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['location']}</td>
              <td>{$row['introduce']}</td>
              <td>￥{$row['price']}起</td>
              <td>{$row['manyidu']}%</td>
              <td><img src=\"./uploads/{$row['image']}\" alt=\"图片\" width=\"100\"></td>
              <td>{$row['addtime']}</td>
              <td>
                <div class=\"button-group\"> 
                  <a class=\"button border-green\" href=\"../detail.php?id={$row['id']}\" target=\"_blank\"><span class=\"icon-reorder\"></span> 查看</a> 
                  <a class=\"button border-main\" href=\"edit.php?id={$row['id']}\"><span class=\"icon-edit\"></span> 修改</a> 
                  <a class=\"button border-red\" href=\"javascript:del({$row['id']},'{$row['image']}')\"><span class=\"icon-trash-o\"></span> 删除</a>
               </div>
              </td>
            </tr>";
          }
        ?> 
      <tr>
        <td colspan="8">
          <div class="pagelist"> 
            <a href='?p=1<?php echo $url; ?>'>首页</a> &nbsp; 
            <a href='?p=<?php echo ($page - 1) . $url; ?>'> 上一页 </a> &nbsp; 
            <span class='current'>共<?php echo $maxrow; ?>条 <?php echo $page; ?>/<?php echo $maxpage; ?> 页</span>
            <a href='?p=<?php echo ($page + 1) . $url; ?>'> 下一页 </a> &nbsp; 
            <a href='?p=<?php echo $maxpage . $url; ?>'> 尾页</a> 
        </div>
        </td>
      </tr>
    </table>
  </div>
<script type="text/javascript">
function del(id,img){
  if(confirm("您确定要删除吗?")){
    window.location.href='action.php?a=del&id='+id+'&img='+img;
  }
}
</script>
</body>
</html>