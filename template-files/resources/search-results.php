{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"}
{assign_variable:channel="resources"}
{assign_variable:section="&ldquo;{exp:search:keywords}&rdquo; Search Results"}
<div class="body">
	<div class="heading clearafter">
		<h1>Search Results</h1>
	</div>
	<p>Your search for <strong>{exp:search:keywords}</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
	<div class="grid23 clearafter">
		<div class="list left">
			<ul>
			{exp:search:search_results}
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
							{categories show_group="not 22"}<li><a href="{site_url}{channel}/{partners_path}{living_better_path}{recipe_path}{media_path}{language_path}{series_path}{condition_path}/{category_url_title}/">{category_name}</a></li>
							{/categories}
						</ul>
					</div>
				</li>
			{/exp:search:search_results}
			</ul>
			{if paginate}
				<div class="pagination">
					<p>{paginate}</p>
				</div>
			{/if}
		</div><!--/.list-->
		<div class="sidebar right">
			{embed="{channel}/_sidebar" channel="{channel}"}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="resources"}