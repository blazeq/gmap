//画风杆
function fDrawWind()
{
	for(var i=0;i<wind_arr.length;i++)
	{
		var myLatLng1 = new google.maps.LatLng(wind_arr[i][1],wind_arr[i][0]);
		var url = "./build_wind.php?id="+wind_arr[i][2];
		var marker1 = new google.maps.Marker({
			position: myLatLng1,                                              
			shadow: new google.maps.MarkerImage(url,new google.maps.Size(80, 80),new google.maps.Point(0,0),new google.maps.Point(40, 40)),
			icon: "./images/12px.gif",//images/weifang_empty_l.gif
			map:map,
			visible:false
		});
		arrayWind.push(marker1);
	}
}

//画温度
function fDrawTemp()
{
	for(var i=0;i<arrElement2.length;i++)
	{
		var myLatLng1 = new google.maps.LatLng(arrElement2[i][1],arrElement2[i][0]);
		var url = "./build_temp.php?id="+arrElement2[i][2];
		var marker2 = new google.maps.Marker({
			position: myLatLng1,                                              
			shadow: new google.maps.MarkerImage(url,new google.maps.Size(80, 80),new google.maps.Point(0,0),new google.maps.Point(40, 40)),
			icon: "./images/12px.gif",//images/weifang_empty_l.gif
			map:map,
			visible:false
			//title: ny_image[0][2]
		});
		arrayTemp.push(marker2);
	}
}

/*
	//图像标注  农业气象图标
	var ny_image = Array(["36.434542","119.196167","anqiu"],["36.697053","118.855591","changle"],["36.359375","119.778442","gaomi"],["36.489765","118.583679","linqu"],["36.699255","118.476563","qingzhou"],["36.875227","118.797913","shouguang"],["36.771892","119.198914","weixian"],["37.151561","119.045105","yanchang"],["36.026889","119.396667","zhucheng"]);
	for(var i=0;i<ny_image.length;i++)
	{
		var contentString = ny_image[i][2];
		var myLatLng = new google.maps.LatLng(ny_image[i][0],ny_image[i][1]);
		var image = "images/" + ny_image[i][2] + ".gif";
		var beachMarker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image
		});

		fListener(beachMarker,contentString);
	}
*/

//google地图中起作用，ie不支持<script type="text/javascript" src="script/maplabel.js"></script>
//画MapLabel
function fDrawMapLabel()
{
	var mapLabel = new MapLabel({
		text: 'Test',
		position: new google.maps.LatLng(36.693, 119.078),
		map: map,
		fontSize: 12,
		align: 'center'
		});
	mapLabel.set('position', new google.maps.LatLng(36.693, 119.078));
	var marker = new google.maps.Marker;
			marker.bindTo('map', mapLabel);
			marker.bindTo('position', mapLabel);
			marker.setDraggable(true);

}
//google.maps.event.addDomListener(window, 'load', initialize);
























