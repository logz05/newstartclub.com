{exp:channel:entries channel="services" sort="asc" limit="9" orderby="service_last_name" paginate="bottom" disable="member_data|trackbacks" dynamic="no" {embed:parameters}}
{if count == 1}
	<ul class="listing">
{/if}
		<li class="partner clearfix">
			<a href="{url_title_path='services/detail'}" class="image">
				{exp:ce_img:single src="{service_image}" max_width="100" max_height="100" crop="yes" attributes='alt="{title}" title="{title}"'}
			</a>
			<div class="info">
				<h2><a href="{url_title_path='services/detail'}">{title}{if service_credentials}, {service_credentials}{/if}</a>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}</h2>
				<p class="bio">
					{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='services/detail'}'>more&raquo;</a>"}
						{service_bio}
					{/exp:eehive_hacksaw}
				</p>
			</div>
		</li>
{if count == total_results}
	</ul>
{/if}

{paginate}
	<p class="pagination">{pagination_links}</p>
{/paginate}
{/exp:channel:entries}