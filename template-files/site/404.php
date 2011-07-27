<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">	
	<title>404 | {site_name}</title>
	<style type="text/css">
	
	body {
		background: url(/assets/css/images/html_bkg.png) repeat-x #A7C7EF;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		color: #222;
		margin: 0;
		padding: 0;
		font-size: 75%;
		-webkit-font-smoothing: antialiased;
		text-rendering: optimizelegibility;
	}
	
	.container {
		margin: 0 auto;
		margin-top: 100px;
		width: 500px;
		position: relative;
	}
	
	.body {
		background: url(/assets/css/images/site-offline.png) no-repeat 65px 40px white;
		border-radius: 15px;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		padding: 160px 40px 40px;
		text-align: center;
		position: relative;
		box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.35);
		-webkit-box-shadow: 0 1px 8px rgba(0,0,0,0.35);
		-moz-box-shadow: 0 1px 8px rgba(0,0,0,0.25);
	}
	
	h1 {
		font-size: 32px;
		color: #87A621;
		border-top: 1px dashed #ddd;
		font-weight: bold;
		padding-top: 16px;
		margin-bottom: 8px;
	}
	
	p {
		font-size: 16px;
		color: #333;
		line-height: 22px;
		margin: 6px 0;
	}
	
	</style>
</head>
<body>
<div class="container">
	<div class="body">
		<h1>404</h1>
		<p>We could not find the page you requested.</p>
		{if segment_1 == "sponsor_admin"}
			<p>Perhaps you were looking for this page:</p>
			<a href="/sponsors/">{site_url}sponsors/</a>
		{/if}
	</div>
</div>
</body>
</html>