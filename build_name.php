<?
$name = $_GET['name'];
$name = mb_convert_encoding($name,"UTF-8","gb2312"); 
//$name = "港";
$len = $_REQUEST['len'];
$datetimeinner_y = substr($datetimeinner,0,4);
$datetimeinner_m = substr($datetimeinner,4,2);
$datetimeinner_d = substr($datetimeinner,6,2);
$datetimeinner_h = substr($datetimeinner,8,2);

$destination = "images/weifang_empty.gif";
$image_weifang = imagecreatefromgif($destination);
$color_red_dot = imagecolorallocate($image_weifang, 255, 0, 0);
$color_green_dot = imagecolorallocate($image_weifang,0,255,0);
$color_blue_dot = imagecolorallocate($image_weifang,0,0,255);
$color_black_dot = imagecolorallocate($image_weifang,0,0,0);
$font = "script/SIMHEI.ttf";


//imagefilledellipse($image_weifang, 40, 40, 6, 6, $color_green_dot);
imagettftext($image_weifang, 9, 0, 25,60, $color_black_dot, $font, $name);

imagepng($image_weifang);
imagedestroy($image_weifang);//释放与 image 关联的内存


?>