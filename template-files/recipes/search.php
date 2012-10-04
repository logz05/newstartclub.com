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
				<ul class="listing">
			{/if}
				<li class="recipe clearfix">
					<h2><a href="{url_title_path='recipes/detail'}">{title}</a>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}</h2>
				{if recipe_image}
					<a href="{url_title_path='recipes/detail'}" class="image">
						{exp:ce_img:single src="{recipe_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
					</a>
				{if:else}
					<a href="{url_title_path='recipes/detail'}"><div class="resource-placeholder"></div></a>
				{/if}
					<div class="details">
						<p class="description">
							{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='/recipes/detail/{url_title}'>more&raquo;</a>"}
								{recipe_instructions}
							{/exp:eehive_hacksaw}
						</p>
						<ul class="tags">
							<li data-icon="r">Tags:</li>
							{categories show_group="not 22"}
								{if category_group == "22"}<li><a href="{site_url}recipes/language/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "39"}<li><a href="{site_url}recipes/type/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "42"}<li><a href="{site_url}recipes/sensitivity/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "43"}<li><a href="{site_url}recipes/ethnic/{category_url_title}">{category_name}</a></li>{/if}
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