<?

$con_dajian = odbc_connect('weifang','wfqxj','baoyu');//30服务器

if($con_dajian)
{
	echo "odbc ok";
}
//通常如果发现“体系结构不匹配”的字样，说明我们使用的是64位建立的odbc。
//解决方法：运行“C:\Windows\SysWOW64\odbcad32.exe” ，利用这个32位的“数据源(ODBC)”来创建SQL Server 2000 的JDBC连接即可。 


$connection_yj = odbc_connect("Driver={SQL Server Native Client 10.0};Server=(local);Database=swmw;","swmw","ms2008");
//odbc连接mssql2008数据库

//iconv("utf-8","gb2312",$yj_tc);


$serverName = "(local)";
$uid = "SWMW";
$pwd = "ms2008";
$connectionInfo =  array("UID"=>$uid,"PWD"=>$pwd,"Database"=>"SWMW");
$con_yj = sqlsrv_connect( $serverName,$connectionInfo);

//$query = "SELECT top 12 * FROM yj_tab order by pd desc , id desc";
//$result = mssql_query($query, $con_yj);
$result = sqlsrv_query($con_yj, $query);
$yj_select_id = 0;//自动id编号
//while($row = mssql_fetch_array($result))
while($row = sqlsrv_fetch_array($result))
{
$yj_type = $row["yjtype"];



?>