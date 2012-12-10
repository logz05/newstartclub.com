{embed="embeds/_doc-top" 
	class="resources"
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
				<li class="resource {resource_type} clearfix">
					<h2><a href="{url_title_path='resources/detail'}">{title}</a>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}</h2>
				{if resource_image}
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_type == "video"}<span class="play"><i></i></span>{/if}
						{if resource_type == "product"}
							{exp:ce_img:single src="{resource_image}" max_width="100" attributes='alt="{title}" title="{title}" class="product"'}
						{if:else}
							{exp:ce_img:single src="{resource_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}" class="{resource_type}"'}
						{/if}
					</a>
				{if:else}
					<a href="{url_title_path='resources/detail'}"><div class="resource-placeholder"></div></a>
				{/if}
					<div class="details">
						<p class="description">
							{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='/resources/detail/{url_title}'>more&raquo;</a>"}
								{resource_body}
							{/exp:eehive_hacksaw}
						</p>
						<ul class="tags">
							<li data-icon="r">Tags:</li>
							{categories show_group="not 22"}
								{if category_group == "17"}<li><a href="{site_url}/resources/health-condition/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "18"}<li><a href="{site_url}/resources/series/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "19"}<li><a href="{site_url}/resources/living-better/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "20"}<li><a href="{site_url}/resources/media/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "21"}<li><a href="{site_url}/resources/partner/{category_url_title}">{category_name}</a></li>{/if}
								{if category_group == "22"}<li><a href="{site_url}/resources/language/{category_url_title}">{category_name}</a></li>{/if}
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
			{embed="resources/_sidebar" channel="resources"}
		</div>
	</div>
{embed="embeds/_doc-bottom"}