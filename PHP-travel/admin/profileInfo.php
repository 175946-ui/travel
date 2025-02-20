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
<title></title>
<link rel="stylesheet" href="./css/pintuer.css">
<link rel="stylesheet" href="./css/admin.css">
<script src="./js/jquery.js"></script>
<script src="./js/pintuer.js"></script>
</head>
<body>
<?php 
include "../connectSQL.php";
try{
  $query = "SELECT * FROM about";
  $stmt = $pdo->query($query);
  $result = $stmt->fetchAll();

  $companyName='';$address='';$code='';$telephone='';$fax='';$about='';
  foreach ($result as $row){
    if (isset($row['fieldName'])) {
      ${$row['fieldName']} = $row['content']; //动态变量赋值
    }
  }
}catch(PDOException $e){
  echo '数据库操作出现异常：<br/><br/>';
  echo '错误出现的位置：' . $e->getFile() . $e->getLine() . '<br/><br/>';
  echo '错误原因：' . $e->getMessage();
  echo "<pre>";
  var_dump($e->getTrace());//获取完整的错误数据
  exit;
}
?>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-file-o"></span> 更新公司简介</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="doProfileInfo.php">  
      <div class="form-group">
        <div class="label">
          <label for="sitename">公司名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" name="companyName" value="<?php echo $companyName; ?>" placeholder="请输入公司名称" data-validate="required:请输入公司名称" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">公司地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" name="address" value="<?php echo $address; ?>" placeholder="请输入公司地址" data-validate="required:请输入公司地址" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">邮编：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="code" value="<?php echo $code; ?>" placeholder="请输入邮编" data-validate="required:请输入邮编" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="telephone" value="<?php echo $telephone; ?>" placeholder="请输入公司电话" data-validate="required:请输入公司电话" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">传真：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="fax" value="<?php echo $fax; ?>" placeholder="请输入公司传真" data-validate="required:请输入公司传真" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">关于我们：</label>
        </div>
        <div class="field">
          <textarea name="about" class="input" style="height: 150px;" placeholder="请输入关于我们的介绍" data-validate="required:请输入关于我们的介绍"><?php echo $about; ?></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 保存更新</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
</body></html>