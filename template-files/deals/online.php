{exp:weblog:entries weblog="deals" entry_id="{segment_3}" show_expired="yes" show_future_entries="yes"}

<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';

$db = new DBconnect();

global $SESS;
$member = $SESS->userdata['member_id'];

$results = Member_Relations::get("SELECT * FROM member_relations WHERE relation_type='deal' AND member_id=$member AND cat_id={categories show_group='24'}{category_id}{/categories} AND related_id={entry_id}");

if ( count($results) == 0) {
	Member_Relations::add(new Member_Relation('deal', $member, {entry_id}, {categories show_group="24"}{category_id}{/categories}));
}

?>

<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]>		 <html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]>		 <html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]>		 <html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<title>Deals | {site_name}</title>
	
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
	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />

	<script>

		//function to fix height of iframe!
		var calcHeight = function() {
			var headerDimensions = $('.header-bar').height();
			$('.preview-frame').height($(window).height() - headerDimensions);
		}

		$(document).ready(function() {
			calcHeight();
		});

		$(window).resize(function() {
			calcHeight();
		}).load(function() {
			calcHeight();
		});
	</script>
<style type="text/css">
body, .header-bar, .preview-frame {
	width: 100%;
}
.header-bar {
	background: url(/assets/css/images/deals-website-preview-bar-logo.png) right center no-repeat #A7C7EF;
	box-shadow: 0 -20px 8px 20px rgba(17, 42, 86,0.7);
	z-index: 2;
	position: relative;
	border-bottom: 2px solid #D1DCEC;
	height: 80px;
}
</style>
</head>
	<body>
		{related_entries id="deal_location"}
		<div class="header-bar">
			<div class="close-header">
				<a href="http://{location_website}" class="close-button close" >&times;</a>
			</div>
			
			<p class="meta-data">
				<a href="http://{location_website}" class="close">Close Frame</a>
			</p>
		</div>
		<iframe class="preview-frame" src="http://{location_website}" name="preview-frame" frameborder="0" noresize="noresize"></iframe>
		{/related_entries}
	{/exp:weblog:entries}
	</body>
</html>
