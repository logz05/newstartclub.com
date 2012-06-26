<ul id="listing">
{exp:weblog:entries weblog="recipes" limit="12" orderby="{embed:orderby}" sort="{embed:sort}" paginate="bottom" dynamic="off" cache="yes" refresh="10" {if embed:category}category="{segment_3_category_id}"{/if}}
	{if no_results}
		<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
		<p>Please choose from a category on the right or click <a href="/resources">here</a> to see our latest resources.</p>
	{/if}
	<li class="recipe clearfix">
		<h2><a href="{url_title_path='recipes/detail'}">{title}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
	{if resource_thumb != ''}
		<a href="{url_title_path='recipes/detail'}" class="image">
			{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
			{exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
		</a>
	{if:else}
		<a href="{url_title_path='recipes/detail'}"><div class="resource-placeholder"></div></a>
	{/if}
		<div class="details">
			<p class="description">
				{exp:trunchtml chars="200" inline="&hellip; <a class='link-more' href='/recipes/detail/{url_title}'>more&raquo;</a>"}
					{exp:html_strip}{resource_description}{/exp:html_strip}
				{/exp:trunchtml}
			</p>
			<ul class="tags">
				<li><span>Tags:</span></li>
				{categories show_group="not 22"}
					{if category_group == "22"}<li><a href="{site_url}recipes/language/{category_url_title}/">{category_name}</a></li>{/if}
					{if category_group == "39"}<li><a href="{site_url}recipes/type/{category_url_title}/">{category_name}</a></li>{/if}
					{if category_group == "42"}<li><a href="{site_url}recipes/sensitivity/{category_url_title}/">{category_name}</a></li>{/if}
					{if category_group == "43"}<li><a href="{site_url}recipes/ethnic/{category_url_title}/">{category_name}</a></li>{/if}
				{/categories}
			</ul>
		</div>
	</li>
	{paginate}
		{if "{total_pages}" > 1}
			<li class="pagination">
				<p>{pagination_links}</p>
			</li>
		{/if}
	{/paginate}
{/exp:weblog:entries}
</ul>