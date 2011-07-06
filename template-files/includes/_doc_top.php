<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	
{if logged_in && segment_1 == "" && "{embed:title}" == ""}
{exp:user:stats dynamic="off"}
	<title>{site_name} | Hello, <?php echo ucwords(strtolower("{firstName}")); ?></title>
{/exp:user:stats}
{if:elseif logged_out && segment_1 == ""}
	<title>{site_name} | Join the club!</title>
{if:elseif segment_1 == "" || "{embed:title}" == ""}
	<title>{site_name}</title>
{if:elseif "{embed:title}" != ""}
	<title>{site_name} | {embed:title}</title>
{/if}

	<meta name="viewport" content="width=860;" />

	<link rel="shortcut icon" href="favicon.ico" >
	<link rel="apple-touch-icon" href="{site_url}apple-touch-icon-precomposed.png">
{if segment_2 == "detail"}
	<meta name="title" content="{exp:weblog:entries weblog='{embed:channel}' url_title='{segment_3}'}{title}{/exp:weblog:entries} - {site_name}" />
	<meta name="author" content="{site_name}">
{/if}{if segment_1 == "resources" && segment_2 == "detail"}
	<meta name="description" content="{exp:weblog:entries weblog='{embed:channel}' url_title='{segment_3}'}{exp:html_strip}{exp:char_limit total='200'}{resource_description}{/exp:char_limit}{/exp:html_strip}{/exp:weblog:entries} " />
	<link rel="image_src" href="{exp:weblog:entries weblog='{embed:channel}' limit='1' url_title='{segment_3}'}{resource_thumb}{/exp:weblog:entries}" />
{/if}{if segment_1 == "events" && segment_2 == "detail"}
	<meta name="description" content="{exp:weblog:entries weblog='{embed:channel}' url_title='{segment_3}'}{exp:char_limit total='100'}{exp:html_strip}{event_description}{/exp:html_strip}{/exp:char_limit}{/exp:weblog:entries} " />
	<link rel="image_src" href="{site_url}assets/css/images/icon-large-events.png" />
{/if}{if segment_1 == "questions" && segment_2 != ""}
	<link rel="image_src" href="{site_url}assets/css/images/icon-large-qa.png" />
{/if}
{if segment_1 == "news"}<link rel="alternate" type="application/rss+xml" title="{site_name} News" href="{path='news'}" />{/if}

	<link rel="stylesheet" href="/assets/css/nsc.css" type="text/css" />
{if "{embed:add}" != ""}
	<?php 
		$splitcontents = explode('|', '{embed:add}');
		foreach($splitcontents as $file) {
			echo "\t".'<link rel="stylesheet" href="/assets/css/'.$file.'.css" type="text/css" />'."\n";
		} 
	?>
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
<body id="{embed:channel}"{if embed:standalone == "yes"} class="standalone"{/if}{if segment_1 == "sponsors" && segment_2 != ""} onload="initialize()"{/if}>
	<div class="container">
		<header role="banner">
			<nav id="super-nav">
				<ul>
					{if logged_in}<li><h5>Hi, <strong>{exp:user:stats dynamic="off"}<?php echo ucwords(strtolower("{firstName} {lastName}")); ?>{/exp:user:stats}</strong></h5></li>{/if}
					{if group_id == "1"}<li><a href="http://admin.newstartclub.com" target="_blank">Control Panel</a></li>{/if}
					<li>
						{if logged_out}<a href="{if segment_1 == 'sponsor_admin'}{path='{segment_1}/signin'}{if:else}{path='members/signin'}{/if}">Sign In</a>{/if}
						{if logged_in}<a href="{path=logout}">Sign Out</a>{/if}
					</li>
					<li>
						{if logged_out}<a href="{path='members/register'}">Register</a>{/if}
						{if logged_in}<a href="{path='members/settings'}">Settings</a>{/if}
					</li>
				</ul>
			</nav>
		{if logged_out}
			<div id="free-mem-ribbon">
				<a href="{path='members/register'}"></a>
			</div>
		{/if}
			<div id="masthead">
				<a href="{site_url}"></a>
			</div>
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
		</header>
		<div class="body">