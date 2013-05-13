<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

	var directionDisplay;
	var directionsService = new google.maps.DirectionsService();
	var geocoder;
	var map;

	function initialize() {
		geocoder = new google.maps.Geocoder();
		var address = document.getElementById("map-end").value;
		if (geocoder) {
			geocoder.geocode( { 
												"address": address 
												}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
							map: map, 
							position: results[0].geometry.location
					});
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
		
		directionsDisplay = new google.maps.DirectionsRenderer();
		var sponsor_location = new google.maps.LatLng(39.035776,-120.976749);
		var myOptions = {
			zoom:8,
			scrollwheel: false,
			navigationControl: true,
			navigationControlOptions: {
				style: google.maps.NavigationControlStyle.ZOOM_PAN
			},
			mapTypeControl: false,
			scaleControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById("canvas"), myOptions);
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById("directions"));
	}
	
	function calcRoute() {
		var start = document.getElementById("map-start").value;
		var end = document.getElementById("map-end").value;
		var request = {
				origin:start, 
				destination:end,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setDirections(response);
			}
		});
		$("#directions-panel").delay(500).slideDown('slow');
		$("#get-directions").delay(500).fadeOut();
/* 		setTimeout("location.href = '#get-directions';", 500); */
	}
	
	function loadScript() {
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
		document.body.appendChild(script);
	}
		
	window.onload = loadScript;

</script>
<script src="{site_url}/assets/js/spin.min.js"></script>