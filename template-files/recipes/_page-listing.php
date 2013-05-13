{exp:channel:entries channel="recipes" limit="20" orderby="{embed:orderby}" sort="{embed:sort}" paginate="bottom" dynamic="no" cache="yes" refresh="10" {if embed:category}category="{segment_3_category_id}"{/if}}

	{if no_results}
		<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
		<p>Please choose from a category on the right or click <a href="{path='resources'}">here</a> to see our latest resources.</p>
	{/if}
	
	{if count == 1}
		<ul class="entry-grid  two-wide  clearfix">
	{/if}
	
			<li class="media  {switch='one|two'}">
				
				<figure class="figure  figure__grid">
				
					<a href="{url_title_path='recipes/detail'}">
						{exp:ce_img:single src="{recipe_image}" max_width="210" max_height="210" crop="yes" attributes='alt="View {title}" title="View {title}"'}
					</a>
					
					<figcaption class="title">
						{embed="embeds/_post-actions" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}
						<a class="head" href="{url_title_path='recipes/detail'}" title="View Recipe">{title}</a>
					</figcaption>
					
				</figure>
				
				{!--
				
				{embed="embeds/_post-actions" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}
				
				<h2 class="post__title">
					<a href="{url_title_path='recipes/detail'}">{title}</a>
				</h2>
				
				<figure class="figure  post__figure">
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
							{if category_group == "43"}<li><a href="{site_url}/recipes/ethnicity/{category_url_title}">{category_name}</a></li>{/if}
						{/categories}
						{categories show_group="21"}
							<li><a href="{site_url}/recipes/partner/{category_url_title}/">{category_name}</a></li>
						{/categories}
					</ul>
				</div>
				
				--}
				
			</li>
			
	{if count == total_results}
		</ul>
	{/if}

	{paginate}
		<p class="pagination">{pagination_links}</p>
	{/paginate}

{/exp:channel:entries}