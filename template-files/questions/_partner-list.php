<ul class="entry-grid three-wide clearfix">
{exp:channel:entries channel="services" orderby="service_last_name" sort="asc" category="{embed:cat_ids}" dynamic="no"}
	<li class="media {switch='one|two|three'}">
	
		<figure class="figure  figure__grid">
		
			{categories show_group="21"}
				<a href="{site_url}/questions/ask/{category_url_title}/{category_id}">
			{/categories}
				{exp:ce_img:single src="{service_image}" max_width="137" max_height="137" crop="yes" attributes='alt="Ask {title}" title="Ask {title}"'}
			</a>
			
			<figcaption class="title">
				<a class="head" href="{url_title_path='services/detail'}" title="View Profile">{title}{if service_credentials}, {service_credentials}{/if}</a>
					{if {exp:playa:total_parents channel="questions"} == 0}
						<span class="subhead">Answers (&nbsp;{exp:playa:total_parents channel="questions"}&nbsp;)</span>
					{if:else}
						<a class="subhead" href="{path='questions/partner/{url_title}'}">Answers (&nbsp;{exp:playa:total_parents channel="questions"}&nbsp;)</a>
					{/if}
			</figcaption>
			
		</figure>
		
	</li>
{/exp:channel:entries}
</ul>