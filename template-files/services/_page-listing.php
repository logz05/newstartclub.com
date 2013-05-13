{exp:channel:entries channel="services" sort="asc" limit="9" orderby="service_last_name" paginate="bottom" disable="member_data|trackbacks" dynamic="no" {embed:parameters}}

	{if count == 1}
		<ul class="post-list">
	{/if}
	
			<li class="clearfix">
			
				{embed="embeds/_post-actions" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}
				<figure class="post__figure  figure">
					<a href="{url_title_path='services/detail'}">
						{exp:ce_img:single src="{service_image}" max_width="100" max_height="100" crop="yes" attributes='alt="{title}" title="{title}"'}
					</a>
				</figure>
				
				<h2 class="post__title"><a href="{url_title_path='services/detail'}">{title}{if service_credentials}, {service_credentials}{/if}</a></h2>
				
				<div class="post__excerpt">
					<p>
						{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='services/detail'}'>more&raquo;</a>"}
							{service_bio}
						{/exp:eehive_hacksaw}
					</p>
					
					<ul class="tags">
						<li data-icon="r">Tags:</li>
						{categories show_group="40|46"}
							<li><a href="{site_url}/services/specialty/{category_url_title}">{category_name}</a></li>
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