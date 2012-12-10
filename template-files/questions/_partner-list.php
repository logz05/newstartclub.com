<ul class="entry-grid three-wide clearfix">
{exp:channel:entries channel="services" orderby="service_last_name" sort="asc" category="{embed:cat_ids}" dynamic="no"}
	<li class="media {switch='one|two|three'}">
		{categories show_group="21"}<a href="{site_url}/questions/ask/{category_url_title}/{category_id}" class="image">{/categories}
			{exp:ce_img:single src="{service_image}" max_width="137" max_height="137" crop="yes" attributes='alt="Ask {title}" title="Ask {title}"'}
		</a>
		<div class="title">
			<a class="head" href="{url_title_path='services/detail'}" title="View Profile">{title}{if service_credentials}, {service_credentials}{/if}</a>
			<a class="subhead" href="{path='questions/partner/{url_title}'}">Answers (&nbsp;{exp:playa:total_parents channel="questions"}&nbsp;)</a>
		</div>
		
	</li>
{/exp:channel:entries}
</ul>