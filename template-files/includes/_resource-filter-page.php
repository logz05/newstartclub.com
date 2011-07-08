{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="{segment_3_category_name}"}
{assign_variable:channel="resources"}
{assign_variable:section="Resources"}
<div class="body">
	<div class="heading clearafter">
		{if segment_3 == ''}
			<h1>No resources here!</h1>
		{/if}
		{if segment_3_category_id == ''}
			<h1>No resources here!</h1>
		{if:else}
			<h1>{segment_3_category_name}</h1>
		{/if}
	</div>
	<div class="grid23 clearafter">
		<div class="list left">
			{if segment_3 == '' || segment_3_category_id == ''}
				<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
				<p>Please choose from a category on the right or click <a href="{path='{channel}'}">here</a> to see our latest resources.</p>
			{if:else}
				<ul>
					{exp:weblog:entries weblog="{channel}" limit="9" orderby="title" sort="asc" paginate="bottom" dynamic="off" category="{segment_3_category_id}"}
					{if no_results}
						<p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
						<p>Please choose from a category on the right or click <a href="{path='{channel}'}">here</a> to see our latest resources.</p>
					{/if}
						<li class="resource {resource_display_style} clearafter">
							<h1><a href="{url_title_path='resources/detail'}">{title}</a></h1>
						{if resource_thumb != ''}
							<a href="{url_title_path='resources/detail'}">
								{exp:ce_img:single src="{resource_thumb}" max="100" attributes='alt="{title}" title="{title}"'}
							</a>
						{if:else}
							<a href="{url_title_path='resources/detail'}"><div class="resource-placeholder"></div></a>
						{/if}
							<div class="details">
								<p class="description">
									{exp:html_strip}
										{exp:char_limit total="200"}{resource_excerpt}{/exp:char_limit}
									{/exp:html_strip}<a class="link-more" href="{url_title_path='resources/detail'}">more&raquo;</a>
								</p>
								<ul class="tags">
									<li><span>Tags:</span></li>
									{categories}<li><a href="{site_url}{channel}/{partners_path}{living_better_path}{media_path}{language_path}{series_path}{condition_path}/{category_url_title}/">{category_name}</a></li>
									{/categories}
								</ul>
							</div>
						</li>
						{paginate}
							{if "{total_pages}" > 1}
								<div class="pagination">
									<p>{pagination_links}</p>
								</div>
							{/if}
						{/paginate}
					{/exp:weblog:entries}
				</ul>
			{/if}
		</div><!--/.list-->
		<div class="sidebar right">
			{embed="includes/_resource-sidebar" channel="{channel}"}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}