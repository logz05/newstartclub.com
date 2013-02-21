{exp:channel:entries channel="resources" limit="12" orderby="{embed:orderby}" sort="{embed:sort}" paginate="bottom" dynamic="no" {if embed:category}category="{segment_3_category_id}"{/if} category_group=""}

	{if no_results}
		<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
		<p>Please choose from a category on the right or click <a href="{path='resources'}">here</a> to see our latest resources.</p>
	{/if}
	
	{if count == 1}
		<ul class="post-list">
	{/if}
	
			<li class="clearfix">
				
				{embed="embeds/_post-actions" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}
			
				<h2 class="post__title">
					<a href="{url_title_path='resources/detail'}">{title}</a>
				</h2>
				
				<figure class="post__figure  figure">
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_type == "video"}<span class="play"><i></i></span>{/if}
						{if resource_type == "product"}
							{exp:ce_img:single src="{resource_image}" max_width="100" attributes='alt="{title}" title="{title}" class="product"'}
						{if:else}
							{exp:ce_img:single src="{resource_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}" class="{resource_type}"'}
						{/if}
					</a>
				</figure>
				
				<div class="post__excerpt">
					<p>
						{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{site_url}/resources/detail/{url_title}'>more&raquo;</a>"}
							{resource_body}
						{/exp:eehive_hacksaw}
					</p>
					<ul class="tags">
						<li data-icon="r">Tags:</li>
						{categories show_group="not 22"}
							{if category_group == "17"}<li><a href="{site_url}/resources/health-condition/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "18"}<li><a href="{site_url}/resources/series/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "19"}<li><a href="{site_url}/resources/living-better/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "20"}<li><a href="{site_url}/resources/media/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "21"}<li><a href="{site_url}/resources/partner/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "22"}<li><a href="{site_url}/resources/language/{category_url_title}/">{category_name}</a></li>{/if}
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
{/exp:channel:entries}