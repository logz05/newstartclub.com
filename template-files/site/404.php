<?php
	header("HTTP/1.0 404 Not Found");
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<title>404 | {site_name}</title>
	
	<meta name="author" content="{site_name}">

	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />	
</head>
<body class="small">
	<div class="body">
		{if segment_1 == "resources" && segment_2 == "recipes"}
			<h1>Our recipes have moved!</h1>
			<p>Please update your bookmark with the link below:<br><a href="/{segment_2}{if segment_3}/type/{segment_3}{/if}">{site_url}{segment_2}{if segment_3}/type/{segment_3}{/if}</a></p>
		{if:elseif segment_1 == "questions" && segment_2 == ""}
			<h1>Our questions have moved!</h1>
			<p>Please update your bookmark with the link below:<br><a href="{path='faq'}">{site_url}faq</a></p>
		{if:elseif segment_1 == "questions" && segment_2 == "detail"}
			<h1>Our questions have moved!</h1>
			<p>Please update your bookmark with the link below:<br><a href="{path='faq/detail/{segment_3}'}">{site_url}faq/detail/{segment_3}</a></p>
		{if:elseif segment_2 == "media" && segment_3 == "recipe"}
			<h1>Our recipes have moved!</h1>
			<p><strong>You can find all your recipes at this link:</strong><br><a href="{path='recipes'}">{site_url}recipes</a></p>
		{if:elseif segment_1 == "resources" && segment_2 == "detail"}
			<h1>Our recipes have moved!</h1>
			<p>But no worries! <strong>You can find your recipe at this link:</strong> <a href="{path='recipes/detail/{segment_3}'}">{site_url}recipes/detail/{segment_3}</a></p>
		{if:else}
			<h1>404</h1>
			<p>We could not find the page you requested.</p>
		{/if}
	</div>
</div>
</body>
</html>