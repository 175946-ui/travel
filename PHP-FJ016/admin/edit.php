<?php
  if (!isset($_SESSION)) {
      session_start();//开启session
  }
  if(!isset($_SESSION['admin_users'])){
    echo "<script>window.top.location.href='./login.html'</script>";
    exit;
  }
  $uid = $_SESSION['admin_users']['Id']; //只能发布修改自己的信息
  if (empty($_GET['id'])) {
    echo "<script>alert('参数错误');history.go(-1)</script>";
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
<title>修改信息</title>
<link rel="stylesheet" href="./css/pintuer.css">
<link rel="stylesheet" href="./css/admin.css">
<script src="./js/jquery.js"></script>
<script src="./js/pintuer.js"></script>
<script src="./js/wangEditor.min.js"></script>
<style>
  [class*='icon-']:before {
   font-family: 'w-e-icon' !important;
  }
</style>
</head>
<body>
<?php 
  include "../connectSQL.php";
  try {
      //查询
      $stmt = $pdo->prepare("select * from content where uid=? and id=?");
      $stmt->execute(array($uid,$_GET['id']));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      echo '数据库操作异常：' . $e->getMessage();
      exit;
  }
?>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span></span> 修改信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=update" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" name="location" value="<?php echo $row['location']; ?>" data-validate="required:请输入标题" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>简介：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" name="introduce" value="<?php echo $row['introduce']; ?>" data-validate="required:请输入简介" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="price" value="<?php echo $row['price']; ?>" data-validate="required:请输入价格" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>满意度：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="manyidu" value="<?php echo $row['manyidu']; ?>" data-validate="required:请输入满意度" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>原封面图：</label>
        </div>
        <div class="field">
          <a href="./uploads/<?php echo $row['image'];?>" target="_blank">
            <img src="./uploads/<?php echo $row['image'];?>" width="100" alt="封面图">
          </a>
          <div class="tips">(点击图片查看大图)</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>封面图：</label>
        </div>
        <div class="field">
          <input type="hidden" class="input w50" name="oldImg" value="<?php echo $row['image'];?>" />
          <input type="file" class="input w50" name="image" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>详情：</label>
        </div>
        <div class="field">
          <input type="hidden" name="content" id="content" data-validate="required:请输入详情">
          <div id="editor"></div>
          <div style="display: none;" id="detail"><?php echo $row['content'];?></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main " type="submit" id="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
<script src="./wangeditor/edit.js"></script>