<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript" src="script/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<!-- <script type="text/javascript" src="mapapi.js"></script> -->
<script type="text/javascript" src="script/gmap_index.js"></script>
<script type="text/javascript" src="script/excanvas.js"></script>
<script type="text/javascript" src="script/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">

</script>
</head>
<body onload="initialize()">
	<div id="map_canvas" style="width:100%; height:100%"></div>
	<div id="map_float" style="position:absolute; background:#fff;left:30px; top:280px; width:200px; height:300px; z-index:2;">
		
		<!--时间选择框-->
		<div style="margin-top:10px;margin-bottom:10px;margin-left:5px;">
		<input class="Wdate" type="text" id="datetimeinner_box" value="<?=date("Y-m-d H:00");?>" style="font-size:14px;width:170px;cursor:pointer；" onClick="WdatePicker({isShowClear:false,firstDayOfWeek:1,skin:'ext',dateFmt:'yyyy-MM-dd HH:00'})">
		</div>

		<div id="select_time" style="width:190px; height:50px;font-size:12px;">
		<a href="#" onclick="change_time(-1);">8前一时次</a> <a href="#" onclick="change_time(0);">最新时次</a> 
		<?
			if($datetimeinner == date('YmdH'))
			{
			echo "<span style=\"color:#999999\">后一时次</span>";
			}
			else
			{
			echo "<a href=\"#\" onclick=\"change_time(1);\">后一时次</a>";
			}
		?>
		</div>

		<div id="zdzh_control_panel" style="width:180px; height:150px; z-index:50">
			<label class="lab_class_box_red" id="lab_box0"><input name="checkbox_ele" type="checkbox" id="box0" value="wind_s" onclick="javascript: if(this.checked){ fShowElement('wind_s')}else{fHideElement('wind_s')}">十分风速</label>
			<br />
			<label id="lab_box1"><input name="checkbox_ele" type="checkbox" id="box1" value="wind_d" checked=true onclick="javascript: if(this.checked){ fShowElement('wind_d')}else{fHideElement('wind_d')}">十分风向</label>
			<br />
			<label id="lab_box2"><input name="checkbox_ele" type="checkbox" id="box2" value="temp" checked=true onclick="javascript: if(this.checked){ fShowElement('temp')}else{fHideElement('temp')}">空气温度</label>
			<br />
			<label id="lab_box3"><input name="checkbox_ele" type="checkbox" id="box3" value="rain" onclick="javascript: if(this.checked){ fShowElement('rain')}else{fHideElement('rain')}">小时雨量</label>
			<br />
			<label id="lab_box4"><input name="checkbox_ele" type="checkbox" id="box4" value="name" onclick="javascript: if(this.checked){ fShowElement('name')}else{fHideElement('name')}">站点名称</label>
		</div>
	</div>
</body>
</html>
