{embed="embeds/_doc-top" 
	class="recipes"
	title="&ldquo;{exp:search:keywords}&rdquo; Search Results"
}
	<div class="heading clearfix">
		<h1>Search Results</h1>
	</div>
	<div class="post">
		<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
			{exp:search:search_results}
			{if count == 1}
				<ul class="post-list">
			{/if}
					<li class="clearfix">
					
					{embed="embeds/_post-actions" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}
					
					<h2 class="post__title">
						<a href="{url_title_path='recipes/detail'}">{title}</a>
					</h2>
					
					<figure class="post__figure  figure">
						{if recipe_image}
							<a href="{url_title_path='recipes/detail'}">
								{if recipe_video}<span class="play"><i></i></span>{/if}
								{exp:ce_img:single src="{recipe_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
							</a>
						{if:else}
							<a href="{url_title_path='recipes/detail'}"><div class="resource-placeholder"></div></a>
						{/if}
					</figure>
					
					<div class="post__excerpt">
						<p>
							{if recipe_description}
								{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='recipes/detail'}'>more&raquo;</a>"}
									{recipe_description}
								{/exp:eehive_hacksaw}
							{if:else}
								{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='recipes/detail'}'>more&raquo;</a>"}
									{recipe_instructions}
								{/exp:eehive_hacksaw}
							{/if}
						</p>
						<ul class="tags">
							<li data-icon="r">Tags:</li>
							{categories show_group="not 22"}
								{if category_group == "39"}<li><a href="{site_url}/recipes/type/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "42"}<li><a href="{site_url}/recipes/sensitivity/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "43"}<li><a href="{site_url}/recipes/ethnic/{category_url_title}">{category_name}</a></li>{/if}
							{/categories}
							{categories show_group="21"}
								<li><a href="{site_url}/recipes/partner/{category_url_title}/">{category_name}</a></li>
							{/categories}
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
		<div class="sidebar right">
			{embed="recipes/_sidebar" channel="recipes"}
		</div>
	</div>
{embed="embeds/_doc-bottom"}