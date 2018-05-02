<?php
session_start();
// create a 100*30 image
header("Content-type: image/png");
$code="";
$_SESSION["securitycode"] = rand(11111,99999);
$code	=	$_SESSION["securitycode"];
$im 			=	imagecreate(80, 26);
// white background and blue text
$bg 			=	imagecolorallocate($im, 235, 235, 235);
$red			=	imagecolorallocate($im, 254, 195, 0);
$textcolor  = imagecolorallocate($im, rand(40,150), rand(0,30), 8);
// write the string at the top left
for($i=1;$i<=5;$i++){
	$red			=	imagecolorallocate($im, 254, rand(50,100), rand(0,255));
	imageline($im,rand(0,80),rand(0,30),rand(0,80),rand(0,30),$red);	
}
imageline($im,0,18,80,rand(0,30),$textcolor);
imagestring($im, 30, 20, 5,$code, $textcolor);
imagepng($im);
?>