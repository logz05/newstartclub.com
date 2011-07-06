<ul>
{exp:weblog:entries weblog="resources" limit="12" orderby="{embed:orderby}" sort="{embed:sort}" paginate="bottom" dynamic="off" {if embed:category}category="{segment_3_category_id}"{/if}}
	{if no_results}
		<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
		<p>Please choose from a category on the right or click <a href="{path='resources'}">here</a> to see our latest resources.</p>
	{/if}
	<li class="resource {resource_display_style} clearafter">
		<h1><a href="{url_title_path='resources/detail'}">{title}</a>{embed="includes/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}"}</h1>
	{if resource_thumb != ''}
		<a href="{url_title_path='resources/detail'}" class="image">
			{if resource_display_style == "video"}<span class="play"></span>{/if}
			{exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
		</a>
	{if:else}
		<a href="{url_title_path='resources/detail'}"><div class="resource-placeholder"></div></a>
	{/if}
		<div class="details">
			<p class="description">
				{exp:html_strip}
					{exp:char_limit total="200"}{resource_description}{/exp:char_limit}
				{/exp:html_strip}<a class="link-more" href="{url_title_path='resources/detail'}">more&raquo;</a>
			</p>
			<ul class="tags">
				<li><span>Tags:</span></li>
				{categories show_group="not 22"}<li><a href="{site_url}resources/{partners_path}{living_better_path}{recipe_path}{media_path}{language_path}{series_path}{condition_path}/{category_url_title}/">{category_name}</a></li>
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