<?php
$dsn = "mysql:dbname=tour;host=localhost;charset=utf8";
$user = "root";
$pwd = "root";//数据库密码
try{
    $pdo = new PDO($dsn,$user,$pwd);
}catch (PDOException $e){
    echo "数据链接失败".$e->getMessage();
}