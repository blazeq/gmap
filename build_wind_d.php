<?
//$datetimeinner = $_REQUEST["ymdh"];
//$datetimeinner = date("YmdH");
$id = $_REQUEST[id];
//$id= "d2001";
//$datetimeinner_y = substr($datetimeinner,0,4);
//$datetimeinner_m = substr($datetimeinner,4,2);
//$datetimeinner_d = substr($datetimeinner,6,2);
//$datetimeinner_h = substr($datetimeinner,8,2);
//$ymdh = $datetimeinner_y."-".$datetimeinner_m."-".$datetimeinner_d." ".$datetimeinner_h.":00:00";
$ymdh = $_REQUEST["dt"];
$con_dajian = odbc_connect('weifang','wfqxj','baoyu');//30������
$query_autosta = "select ʮ�ַ���,ʮ�ַ��� from stasync WHERE ʮ�ַ��� is not null and ��վ�� = '$id' and ����ʱ�� = '$ymdh'";//WHERE ʮ�ַ��� is not null and ��վ�� = 'D2001' and ����ʱ�� = '$ymdh'
$result = odbc_do($con_dajian,$query_autosta);
$num=0;
while(odbc_fetch_row($result))
{
	$temp = odbc_result($result, "ʮ�ַ���");
	$temp1 = odbc_result($result, "ʮ�ַ���");
	$wind_text = round($temp/20) + "61472";
	$text = '&#'.$wind_text.';';
	//$array_temp[$stationid] = array($text,$temp1);
	$num++;
}

$destination = "images/weifang_empty.gif";
$image_weifang = imagecreatefromgif($destination);
$color_red_dot = imagecolorallocate($image_weifang, 255, 0, 0);
$color_green_dot = imagecolorallocate($image_weifang,0,255,0);
$color_blue_dot = imagecolorallocate($image_weifang,0,0,255);
//$color_black_dot = imagecolorallocate($image_weifang,0,0,0);
$font = "script/wind_vane.ttf";

//imagefilledellipse($image_weifang, 50, 50, 6, 6, $color_green_dot);
//imagettftext($image_weifang, 18, 90-180, 50, 50, $color_blue_dot, $font, $text);
if($num > 0)
{
	imagefilledellipse($image_weifang, 40, 40, 6, 6, $color_green_dot);
	imagettftext($image_weifang, 20, 90-$temp1, 40,40, $color_blue_dot, $font, $text);
	//imagettftext($image_weifang, 20, 90-$temp1, 41,40, $color_blue_dot, $font, $text);
}
else
{
	imagefilledellipse($image_weifang, 40, 40, 6, 6, $color_red_dot);
}
imagepng($image_weifang);
imagedestroy($image_weifang);//�ͷ��� image �������ڴ�

?>