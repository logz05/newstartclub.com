<ul class="listing">
	{exp:channel:entries channel="services" sort="asc" limit="9" orderby="partner_last_name" paginate="bottom" disable="member_data|trackbacks" dynamic="no" {embed:parameters}}
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
		{paginate}
			{if "{total_pages}" > 1}
				<li class="pagination">
					<p>{pagination_links}</p>
				</li>
			{/if}
		{/paginate}
	{/exp:channel:entries}
</ul>