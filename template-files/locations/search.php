{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Search Results"
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
	
		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='locations'}">Locations</a></li>
		</ul>
		
		<header class="heading">
			<h1 class="post__title">Search Results</h1>
			<h2>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</h2>
		</header>
		
		<div class="grid23	clearfix">
		
			<div class="main	 left">
			
				{exp:search:search_results}
					
					{if count == 1}
						<ul class="post-list">
					{/if}
				
						<li class="location  clearfix">
							
							<figure class="post__figure  figure">
								<a href="{url_title_path='locations/detail'}" class="image">
									<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
									</div>
								</a>
							</figure>
							
							<h2 class="post__title"><a href="{url_title_path='locations/detail'}">{title}</a></h2>
								
							<div class="location__address">
								{location_address}<br>
								{location_city}, {location_state}<br />
								{location_country:label}
							</div>
							
						</li>
					
					{if count == total_results}
						</ul>
					{/if}
					
					{paginate}
						<p class="pagination">{pagination_links}</p>
					{/paginate}
					
				{/exp:search:search_results}
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