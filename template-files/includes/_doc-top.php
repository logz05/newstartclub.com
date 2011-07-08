<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		 <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		 <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		 <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<!-- Facebook Meta Tags -->
	<meta property="fb:page_id" content="122876001070562" />
	
{if embed:title}
	<title>{embed:title} | {site_name}</title>
{if:else}
	<title>{site_name}</title>
{/if}
	
	<meta name="author" content="{site_name}">
{if embed:meta=="yes"}
	{embed="includes/_meta-info"}
{/if}
{if segment_1 == "events" && segment_2 == "detail"}
	<meta name="description" content="{exp:weblog:entries weblog='events' url_title='{segment_3}'}{exp:char_limit total='100'}{exp:html_strip}{event_description}{/exp:html_strip}{/exp:char_limit}{/exp:weblog:entries} " />
	<meta name="title" content="{exp:weblog:entries weblog='events' url_title='{segment_3}'}{title}{/exp:weblog:entries} - {site_name}" />
{/if}
{if segment_1 == "questions" && segment_2 == "detail"}
	<meta name="description" content="{exp:weblog:entries weblog='questions' url_title='{segment_3}'}{exp:char_limit total='100'}{exp:html_strip}{qa_answer}{/exp:html_strip}{/exp:char_limit}{/exp:weblog:entries} " />
	<meta name="title" content="{exp:weblog:entries weblog='questions' url_title='{segment_3}'}{exp:char_limit total='100'}{exp:html_strip}{qa_question}{/exp:html_strip}{/exp:char_limit}{/exp:weblog:entries} - {site_name}" />
{/if}
{if segment_1 == "news"}<link rel="alternate" type="application/rss+xml" title="{site_name} News" href="/news/rss/" />{/if}

	<link rel="stylesheet" href="/assets/css/nsc.css" type="text/css" />
{if embed:add}
	<?php 
		$splitcontents = explode('|', '{embed:add}');
		foreach($splitcontents as $file) {
			echo "\t".'<link rel="stylesheet" href="/assets/css/'.$file.'.css" type="text/css" />'."\n";
		} 
	?>
{/if}
{!-- BEGIN Sponsor Google Maps Javascript --}
{if (segment_1 =="sponsors" || segment_1 == "events") && segment_2 == "detail" && segment_3 != ""}
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
			setTimeout("location.href = '#get-directions';", 500);
		}
		
		function loadScript() {
			var script = document.createElement("script");
			script.type = "text/javascript";
			script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
			document.body.appendChild(script);
		}
			
		window.onload = loadScript;
	
	</script>
{/if}
	<script src="/assets/js/libs/modernizr-1.6.min.js"></script>
	<!--Google Analytics-->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-12179773-3']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body id="{embed:channel}"{if embed:header == "no" && segment_1 != "sponsor_admin"} class="standalone"{/if}{if (segment_1 =="sponsors" || segment_1 == "events") && segment_2 == "detail" && segment_3 != ""} onload="initialize()"{/if}{if logged_out} class="logged-out"{/if}>
	<div class="container">
		<header role="banner">
		{if embed:nav == ""}
			<nav id="super-nav">
				<ul>
					{if logged_in}<li><h5>Hi, <strong>{exp:user:stats dynamic="off"}<?php echo ucwords(strtolower("{firstName} {lastName}")); ?>{/exp:user:stats}</strong></h5></li>{/if}
					{if member_id == "1"}<li><a href="http://admin.newstartclub.com" target="_blank">Control Panel</a></li>{/if}
					<li>
						{if logged_out}<a href="{if segment_1 == 'sponsor_admin'}/sponsor_admin/signin/{if:else}/members/signin/{/if}">Sign In</a>{/if}
						{if logged_in}<a href="{path=logout}">Sign Out</a>{/if}
					</li>
					<li>
						{if logged_out}<a href="/members/register/">Register</a>{/if}
						{if logged_in}<a href="/members/settings/">Settings</a>{/if}
					</li>
				</ul>
			</nav>
		{/if}
		{if embed:header == ""}
			{if logged_out}
				<div id="free-mem-ribbon">
					<a href="{path='members/register'}"></a>
				</div>
			{/if}
			<div id="masthead"></div>
			<nav id="nav">
				<ul>
					<li{if embed:channel=="home"} class="current"{/if}><a href="/">Home</a><span></span></li>
					<li{if embed:channel=="my_health"} class="current"{/if}><a href="/my_health/">My Health</a><span></span></li>
					<li{if embed:channel=="resources"} class="current"{/if}><a href="/resources/">Resources</a><span></span></li>
					<li{if embed:channel=="partners"} class="current"{/if}><a href="/partners/">Partners</a><span></span></li>
					<li{if embed:channel=="events"} class="current"{/if}><a href="/events/">Events</a><span></span></li>
					<li{if embed:channel=="sponsors"} class="current"{/if}><a href="/sponsors/">Sponsors</a><span></span></li>
					<li{if embed:channel=="questions"} class="current"{/if}><a href="/questions/">Q&amp;A</a><span></span></li>
					<li{if embed:channel=="news"} class="current"{/if}><a href="/news/">News</a><span></span></li>
				</ul>
			</nav>
		{/if}
		{if embed:sponsor_admin == "yes"}
			<div id="masthead">
				{if logged_out}
				<p class="button-wrap tour">
					<a href="http://vimeo.com/17569582&amp;width=800&amp;height=450" rel="prettyPhoto" class="super giant secondary button">
						<img alt="Health Evangelism Made Simple" style="display:none;" width="0" height="0"/>
						<span>Play Video</span>
					</a>
				</p>
				{/if}
			</div>
			{if logged_in}
			<nav id="nav">
				<ul>
					<li{if embed:channel == "sponsor_admin" && segment_2 == ""} class="current"{/if}><a href="/sponsor_admin/">Home</a><span></span></li>
					<li{if segment_2 == "events" && segment_3 == "add"} class="current"{/if}><a href="/sponsor_admin/events/add/">Add Events</a><span></span></li>
					<li{if segment_2 == "events" && segment_3 == "edit"} class="current"{/if}><a href="/sponsor_admin/events/edit/">Edit Events</a><span></span></li>
					<li{if segment_2 == "invite-members"} class="current"{/if}><a href="/sponsor_admin/invite-members/">Invite Members</a><span></span></li>
					<li{if segment_2 == "email-members" || segment_2 == "email"} class="current"{/if}><a href="/sponsor_admin/email-members/">Email Members</a><span></span></li>
					<li{if segment_2 == "resources"} class="current"{/if}><a href="/sponsor_admin/resources/">Resources</a><span></span></li>
				</ul>
			</nav>
			{/if}
		{/if}
		</header>