<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>{if embed:title}{embed:title} | {site_name}{if:else}{site_name}{/if}</title>
  <![if !IEMobile]>
  <meta name="viewport" content="width=860;" />
  <![endif]>
  
  <meta name="author" content="{site_name}">
  {if segment_1 == ""}<meta name="description" content="Based on the world-famous NEWSTART® principles that have helped millions live well naturally without the use of drugs, the NEWSTART® Lifestyle Club features streaming video, expert health advice, wellness tips, tools and more. " />{/if}
{if segment_1 == "news"}<link rel="alternate" type="application/rss+xml" title="{site_name} News" href="/news/rss" />{/if}
{if segment_1 == "questions" && segment_2 != "detail"}<link rel="alternate" type="application/rss+xml" title="{site_name} News" href="/questions/rss" />{/if}
{if segment_1 == "resources" && segment_2 != "detail"}<link rel="alternate" type="application/rss+xml" title="{site_name} Resources" href="/resources/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}" />{/if}
{if segment_1 == "events" && segment_2 != "detail"}<link rel="alternate" type="application/rss+xml" title="{site_name} Events" href="/events/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" />{/if}

  <link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
  <link rel="stylesheet" href="{stylesheet='site/default'}" type="text/css" />
{if embed:add}
  <?php 
    $splitcontents = explode('|', '{embed:add}');
    foreach($splitcontents as $file) {
      echo "\t".'<link rel="stylesheet" href="/assets/css/'.$file.'.css" type="text/css" />'."\n";
    } 
  ?>
{/if}

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  <script src="/assets/js/jquery.reveal.js"></script>
  <script src="/assets/js/common.js"></script>
{!-- BEGIN Sponsor Google Maps Javascript --}
{if (segment_1 =="locations" || segment_1 == "events") && segment_2 == "detail" && segment_3 != ""}
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
  <script src="/assets/js/libs/modernizr-2.0.6.min.js"></script>
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
<body{if (segment_1 =="locations" || segment_1 == "events") && segment_2 == "detail" && segment_3 != ""} onload="initialize()"{/if}>
    <header class="header">
    {if embed:nav == ""}
      <nav id="super-nav">
        <ul>
          {if logged_in}<li><h5>Hi, <strong>{exp:user:stats dynamic="off"}<?php echo ucwords(strtolower("{firstName} {lastName}")); ?>{/exp:user:stats}</strong></h5></li>{/if}
          {if group_id == '1' && embed:channel == "sponsors"}<li><h5>{exp:user:stats dynamic="off"}{sponsor_number} | {exp:weblog:entries weblog='locations' category='{sponsor_number}' limit='1' dynamic='off' status='open|closed' disable="categories|member_data|pagination|trackbacks"}{sponsor_zip}{/exp:weblog:entries}{/exp:user:stats}</h5></li>{/if}
          {if member_id == "1"}<li><a href="http://admin.newstartclub.com" target="_blank">Control Panel</a></li>{/if}
          {if embed:channel != "sponsors" && (member_group == 1 || member_group == 13)}<li><a href="/sponsors">Sponsor Admin</a></li>{/if}
          {if embed:channel == "sponsors" && (member_group == 1 || member_group == 13)}<li><a href="/">Main Site</a></li>{/if}
          <li>
            {if logged_out}<a href="/{if segment_1 == 'sponsors'}sponsors/{/if}signin" data-reveal-id="signin-modal-mini" id="sign-in">Sign In</a>{/if}
            {if logged_in}<a href="{path=logout}">Sign Out</a>{/if}
          </li>
          <li>
            {if logged_out}<a href="{if segment_1 == 'sponsors'}/sponsors/apply{if:else}/register{/if}">{if segment_1 == 'sponsors'}Apply{if:else}Register{/if}</a>{/if}
            {if logged_in}<a href="/settings">Settings</a>{/if}
          </li>
        </ul>
      </nav>
    {/if}
    {if embed:header == ""}
      {if logged_out}
        <div id="free-mem-ribbon">
          <a href="/register"></a>
        </div>
      {/if}
      <div id="masthead"></div>
      <nav id="main-nav"{if embed:channel == "sponsors" && (member_group == 1 || member_group == 13)} class="sponsors"{/if}>
        <ul>
        {if embed:channel == "sponsors" && (member_group == 1 || member_group == 13)}
          <li{if embed:channel == "sponsors" && segment_2 == ""} class="current"{/if}><a href="/sponsors">Home</a><i></i></li>
          <li{if segment_2 == "add-event"} class="current"{/if}><a href="/sponsors/add-event">Add Events</a><i></i></li>
          <li{if segment_2 == "edit-event"} class="current"{/if}><a href="/sponsors/edit-event">Edit Events</a><i></i></li>
          <li{if segment_2 == "invite"} class="current"{/if}><a href="/sponsors/invite">Invite Members</a><i></i></li>
          <li{if segment_2 == "email-members" || segment_2 == "send-email"} class="current"{/if}><a href="/sponsors/email-members">Email Members</a><i></i></li>
          <li{if segment_2 == "resources"} class="current"{/if}><a href="/sponsors/resources">Resources</a><i></i></li>
        {if:else}
          <li{if embed:channel=="home"} class="current"{/if}><a href="/">Home</a><i></i></li>
          <li{if embed:channel=="my_health"} class="current"{/if}><a href="/my_health">My Health</a><i></i></li>
          <li{if embed:channel=="resources"} class="current"{/if}><a href="/resources">Resources</a><i></i></li>
          <li{if embed:channel=="partners"} class="current"{/if}><a href="/partners">Partners</a><i></i></li>
          <li{if embed:channel=="events"} class="current"{/if}><a href="/events">Events</a><i></i></li>
          <li{if embed:channel=="locations"} class="current"{/if}><a href="/locations">Locations</a><i></i></li>
          <li{if embed:channel=="questions"} class="current"{/if}><a href="/questions">Q&amp;A</a><i></i></li>
          <li{if embed:channel=="news"} class="current"{/if}><a href="/news">News</a><i></i></li>
        {/if}
        </ul>
      </nav>
    {/if}
      <div id="shadow-left"></div>
      <div id="shadow-right"></div>
    </header>
    <div class="body{if embed:channel} {embed:channel}{/if}{if segment_2 == 'detail'} detail{/if}">