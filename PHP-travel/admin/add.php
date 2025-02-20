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
<title>发布信息</title>
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
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span></span> 发布信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="action.php?a=add" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" name="location" data-validate="required:请输入标题" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>简介：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" name="introduce" data-validate="required:请输入简介" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="price" data-validate="required:请输入价格" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>满意度：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="manyidu" data-validate="required:请输入满意度" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>封面图：</label>
        </div>
        <div class="field">
          <input type="file" class="input w50" name="image" data-validate="required:请上传封面图" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>详情：</label>
        </div>
        <div class="field">
          <input type="hidden" name="content" id="content" data-validate="required:请输入详情">
          <div id="editor"></div>
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
<script src="./wangeditor/add.js"></script>