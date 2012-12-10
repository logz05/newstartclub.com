{exp:channel:entries channel="deals" require_entry="yes" show_expired="yes" show_future_entries="yes"}

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<title>{title} | {site_name}</title>
	
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
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="/assets/js/libs/modernizr-2.0.6.min.js"></script>
	<script src="/assets/js/common.js"></script>
	<link rel="stylesheet" href="{stylesheet='site/default'}" type="text/css" />	
	<link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		window.onload = function() { window.print(); }
		//setTimeout("self.close();",500) 
	</script>
</head>
<body class="view-coupon">
	<div class="body deals">
		<noscript>
			<div class="alert-box warning">
				<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
			</div>
		</noscript>
		<div class="post">
			<div class="coupon">
				<div class="sponsor">{categories show_group="24"}{category_name}{/categories}</div>
				<div class="deal-title">{title}</div>
				<div class="code">Coupon code: <span>{deal_code}</span></div>
				<div class="deal-instructions">
					{deal_instructions}
					<p class="valid">Valid from {entry_date format="%F %j%S, %Y"}{if expiration_date} to {expiration_date format="%F %j%S, %Y"}{/if}</p>
				</div>
				<div class="terms">{deal_terms}</div>
				<div class="url"><span>newstartclub.com/deal/{entry_id}</span></div>
				<i>t</i>
			</div>
			<div class="button-wrap"><!-- Hi -->
				<a href="{site_url}/{exp:page_history:get page='1'}" class="super small secondary button print-coupon"><span>Back</span></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>

{/exp:channel:entries}