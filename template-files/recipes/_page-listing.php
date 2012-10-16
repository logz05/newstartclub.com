{exp:channel:entries channel="recipes" limit="12" orderby="{embed:orderby}" sort="{embed:sort}" paginate="bottom" dynamic="no" cache="yes" refresh="10" {if embed:category}category="{segment_3_category_id}"{/if}}
	{if no_results}
		<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
		<p>Please choose from a category on the right or click <a href="{path='resources'}">here</a> to see our latest resources.</p>
	{/if}
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
				{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='recipes/detail'}'>more&raquo;</a>"}
					{recipe_instructions}
				{/exp:eehive_hacksaw}
			</p>
			<ul class="tags">
				<li data-icon="r">Tags:</li>
				{categories show_group="not 22"}
					{if category_group == "22"}<li><a href="{site_url}/recipes/language/{category_url_title}">{category_name}</a></li>{/if}
					{if category_group == "39"}<li><a href="{site_url}/recipes/type/{category_url_title}">{category_name}</a></li>{/if}
					{if category_group == "42"}<li><a href="{site_url}/recipes/sensitivity/{category_url_title}">{category_name}</a></li>{/if}
					{if category_group == "43"}<li><a href="{site_url}/recipes/ethnic/{category_url_title}">{category_name}</a></li>{/if}
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