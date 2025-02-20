<?php
	if (!isset($_SESSION)) {
		session_start(); //开启session
	}
	/**
	*功能 产生随机数
	*@param int $length 随机数长度
	*@param int $type 随机数的类型  1:只出数字, 2:数字+小写 否则:数字+小写+大写
	*@return string $code 产生的随机数
	*/
	function getcode($length,$type){
		//验证码元素
		$str ="0123456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		//1 调节验证码模式 只出数字 数字+小写 数字+小写+大写
		switch($type){
			 case 1:$len = 9; break;
			 case 2:$len = 33;break;
			 default:$len = strlen($str)-1;
		}

		//2 输出多长的验证码
		$code = "";
		for($i=0;$i<$length;$i++){
			$code .=$str[rand(0,$len)];
		}

		return $code;
	}
	
	// 设置验证码的参数
	$length   =  4; //验证码长度
	$width    =  50*$length; //画布的宽度-即验证码图片宽度
	$height   =  50; //画布的高度-即验证码图片高度
	$fontsize =  32; //验证码字体大小
	$font 	  =  dirname(__FILE__)."/verdanaz.ttf"; //验证码字体，必须使用绝对路径
	$spots 	  =  50;  //验证码干扰点数量
	$lines    =  10;  //验证码干扰线数量
	$code     =  getcode($length,2);//获取验证码
	$_SESSION['verify_code'] = $code; //验证码存入session，验证使用

	//1 把验证码放到画布资源中
	$im = imagecreatetruecolor($width,$height); //创建画布 
	$bg = imagecolorallocate($im,245,245,245); //背景色

	//2画图-填充画布
	imagefill($im,0,0,$bg);

	//2.1 文本放到画布资源中
	/**imagettftext 参数说明
	*参数1：画布
	*参数2：字体大小
	*参数3：字体倾斜的角度
	*参数4、5：文字的x、y坐标
	*参数6：文字的颜色
	*参数7：字体文件
	*参数8：绘制的文字
	*/
	for($i=0;$i<$length;$i++){
		$tilt = rand(-10,10); //字体的倾斜度
		$x = ($i*$width/$length)+rand(0,5); //x坐标
    	$y = $height/1.5+rand(5,10);  //y坐标
		$fontColor = imagecolorallocate($im,rand(0,200),rand(0,200),rand(0,200)); //字体颜色
		// imagestring($im,$fontsize,$x,$y,$code[$i],$fontColor); //水平地画一行字符串,不支持中文，此处的fontsize是 1-5
		imagettftext($im,$fontsize,$tilt,$x,$y,$fontColor,$font,$code[$i]); //支持中文
	}

	//2.2 加干扰点
	for($i=0;$i<$spots;$i++){
		$spotColor = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)); //干扰点颜色
		imagesetpixel($im,rand(0,$width),rand(0,$height),$spotColor);
	}

	//2.3 加干扰线
	for($i=0;$i<$lines;$i++){
		$lineColor = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)); //干扰线颜色
		imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$lineColor);
	}
	//3 输出
	ob_clean();
	header("Content-Type:image/png");
	imagepng($im);
	imagedestroy($im);