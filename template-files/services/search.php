{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Search Results"
		section="Services"
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
	
	<div class="body  services">
	
		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='services'}">Services</a></li>
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
				
						<li class="clearfix">
			
							{embed="embeds/_post-actions" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}
							<figure class="post__figure  figure">
								<a href="{url_title_path='services/detail'}">
									{exp:ce_img:single src="{service_image}" max_width="100" max_height="100" crop="yes" attributes='alt="{title}" title="{title}"'}
								</a>
							</figure>
							
							<h2 class="post__title"><a href="{url_title_path='services/detail'}">{title}{if service_credentials}, {service_credentials}{/if}</a></h2>
							
							<div class="post__excerpt">
								<p>
									{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='services/detail'}'>more&raquo;</a>"}
										{service_bio}
									{/exp:eehive_hacksaw}
								</p>
								
								<ul class="tags">
									<li data-icon="r">Tags:</li>
									{categories show_group="40"}
										<li><a href="{site_url}/services/specialty/{category_url_title}">{category_name}</a></li>
									{/categories}
										<li><a href="{site_url}/services/state/{service_state}">{service_state:label}</a></li>
								</ul>
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
				{embed="services/_sidebar"}
			</div>
			
		</div>
	
	</div><!-- /body -->

{sn_footer}
{sn_scripts}

{gv_analytics}
</body>
</html>