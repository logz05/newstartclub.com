<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
<script type="text/javascript">

	function initialize() {
				
		var locations = [{exp:channel:entries channel="locations" status="open" backspace="1"}
			["{title}", "{location_address} {location_city}, {location_state} {location_zip}"],{/exp:channel:entries}
		];
		
		setTimeout( function() {
			for (i = 0; i < locations.length; i++) {
				document.write(i + ", ");
			}
		});
	}
</script>
</head>
<body onload="initialize()">
<div id="map_canvas" style="height:100%;"></div>
</body>
</html>