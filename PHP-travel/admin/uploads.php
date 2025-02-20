<?php 
function getImageUrl($tmp_name){
    //生成图片名
    $savename = date('YmdHis',time()).mt_rand(0,9999).'.jpg';//localResizeIMG压缩后的图片都是jpeg格式
    //生成文件夹
    $imgdirs = "./uploads/images/".date('Y-m-d',time()).'/';
    mkdirs($imgdirs);
    //图片保存的路径
    $url = './uploads/images/'.date('Y-m-d' ,time()).'/'.$savename;
    //图片文件移动。
    move_uploaded_file($tmp_name, $url);
    //返回数据
    return $url;
}
    //创建文件夹 权限问题
function mkdirs($dir, $mode = 0777){
    if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
    if (!mkdirs(dirname($dir), $mode)) return FALSE;
    return @mkdir($dir, $mode);
}

$images = array();
foreach ($_FILES['files']['tmp_name'] as $tmp_name) {
    $images[] = getImageUrl($tmp_name);
}

//返回数据。wangeditor3 需要用到的数据 json格式的
$data = array();
$data["errno"] = 0;
$data["data"] = $images;
echo json_encode($data);