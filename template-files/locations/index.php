{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title=""
		section="Locations"
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

<body>

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>
	
	<div class="body  locations">
	
		{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-locations"}
		
		<header class="heading">
			<h1 class="post__title" data-icon="f">Locations</h1>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">

				{embed="locations/_page-listing"}
				
			</div>

			<div class="sidebar  right">
			
				{embed="locations/_sidebar"}
				
			</div>
			
		</div>
	
	</div><!-- /body -->

{sn_footer}
{sn_scripts}

{gv_analytics}
</body>
</html>