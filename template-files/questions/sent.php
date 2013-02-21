{if segment_3 == "" || segment_3_category_id == ""}
	{redirect="404"}
{/if}

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<title>Question Sent | {site_name}</title>
	
	<meta name="author" content="{site_name}">
	
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
	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />	
</head>
<body class="small">
	<div class="body">
		<h1>Question Sent!</h1>
		<p>Your question has been sent to {segment_3_category_name}.</p>
		<p>Your personal information will not be shared with any third party. If we use your question on our site your information will remain anonymous.</p>
		<p class="button-wrap">
			<a href="{path='questions'}" class="super green button"><span>Back to Questions</span></a>
		</p>
	</div>
</div>
</body>
</html>