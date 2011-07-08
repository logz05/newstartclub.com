<!DOCTYPE html> 
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	
	<title>{site_name} | Member Map</title> 
	
	<link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" /> 
	<style type="text/css">
		gmnoprint {visibility:hidden;}
	</style>
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
	<script type="text/javascript"> 

		function initialize() {

			var centerOfMap = new google.maps.LatLng(37.92686760148135, -94.921875);

			map = new google.maps.Map(document.getElementById('map_canvas'), {
				center: centerOfMap,
				zoom: 3,
				mapTypeId: 'roadmap',
				panControl: false,
				scrollwheel: false,
				zoomControl: true,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false
			});

			layer = new google.maps.FusionTablesLayer(806130);
			layer.setMap(map);

			google.maps.event.addListener(map, 'zoom_changed', 
			function() { 
				
				if (map.getZoom() < 2) { 
					map.setZoom(2); 
				}; 
			});	
		}
	</script> 
</head> 
<body onload="initialize()"> 
	<div id="map_canvas"></div> 
</body> 
</html>