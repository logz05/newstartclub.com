{embed="embeds/_doc-top" 
	class="recipes"
	title="&ldquo;{exp:search:keywords}&rdquo; Search Results"
}
	<div class="heading clearfix">
		<h1>Search Results</h1>
	</div>
	<div id="entry">
		<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
			<ul id="listing">
			{exp:search:search_results}
				<li class="recipe {resource_display_style} clearfix">
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
							{exp:html_strip}
								{exp:char_limit total="200"}{resource_description}{/exp:char_limit}
							{/exp:html_strip}<a class="link-more" href="{url_title_path='recipes/detail'}">more&raquo;</a>
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
			{/exp:search:search_results}
			{if paginate}
				<li class="pagination">
					<p>{paginate}</p>
				</li>
			{/if}
			</ul>
		</div><!--/.list-->
		<div class="sidebar right">
			{embed="recipes/_sidebar" channel="recipes"}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}