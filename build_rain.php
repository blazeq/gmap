<?
//$datetimeinner = $_REQUEST["ymdh"];
$datetimeinner = date("YmdH");
$id = $_REQUEST[id];
//$id= "d2001";
$datetimeinner_y = substr($datetimeinner,0,4);
$datetimeinner_m = substr($datetimeinner,4,2);
$datetimeinner_d = substr($datetimeinner,6,2);
$datetimeinner_h = substr($datetimeinner,8,2);
$ymdh = $datetimeinner_y."-".$datetimeinner_m."-".$datetimeinner_d." ".$datetimeinner_h.":00:00";

$con_dajian = odbc_connect('weifang','wfqxj','baoyu');//30服务器
$query_autosta = "select 一小时雨量 from stasync WHERE 区站号 = '$id' and 日期时间 = '$ymdh'";//WHERE 十分风速 is not null and 区站号 = 'D2001' and 日期时间 = '$ymdh'
$result = odbc_do($con_dajian,$query_autosta);
$num=0;
while(odbc_fetch_row($result))
{
	$temp = odbc_result($result, "一小时雨量")/10;
	//$temp1 = odbc_result($result, "十分风向");
	//$wind_text = round($temp/20) + "61472";
	//$text = '&#'.$wind_text.';';
	//$array_temp[$stationid] = array($text,$temp1);
	$num++;
}

$destination = "images/weifang_empty.gif";
$image_weifang = imagecreatefromgif($destination);
$color_red_dot = imagecolorallocate($image_weifang, 255, 0, 0);
$color_green_dot = imagecolorallocate($image_weifang,0,255,0);
$color_blue_dot = imagecolorallocate($image_weifang,0,0,255);
$color_black_dot = imagecolorallocate($image_weifang,0,0,0);
$font = "script/SIMHEI.ttf";

if($num > 0)
{
	imagefilledellipse($image_weifang, 40, 40, 6, 6, $color_green_dot);
	imagettftext($image_weifang, 9, 0, 45,50, $color_black_dot, $font, $temp);
	//imagettftext($image_weifang, 9, 0, 46,50, $color_black_dot, $font, $temp);
}
else
{
	imagefilledellipse($image_weifang, 40, 40, 6, 6, $color_red_dot);
}
imagepng($image_weifang);
imagedestroy($image_weifang);//释放与 image 关联的内存


?>