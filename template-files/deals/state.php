{embed="embeds/_doc-top" 
	class="deals"
	title="Deals in {exp:weblog:entries weblog="locations" limit="1" search:location_state="={segment_3}" dynamic="off"}{location_state:label}{/exp:weblog:entries}"
"}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/deals">Deals</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:weblog:entries weblog="locations" limit="1" search:location_state="={segment_3}" dynamic="off"}{location_state:label}{/exp:weblog:entries}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
		{exp:weblog:entries weblog="locations" limit="12" sort="asc" paginate="bottom" dynamic="off" search:location_type="=profit" search:location_state="={segment_3}" search:location_city="={segment_4}"}
			<li class="business clearfix">
				<h2><a href="/deals/detail/{url_title}">{location_slogan}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{location_slogan}"}</h2>
				<a href="{url_title_path='deals/detail'}" class="image">
					{exp:ce_img:single src="{location_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
				</a>
				<div class="details">
					<p class="description">
						{exp:trunchtml chars="200" inline="&hellip; <a class='link-more' href='/deals/detail/{url_title}'>more&raquo;</a>"}
							{exp:html_strip}{location_description}{/exp:html_strip}
						{/exp:trunchtml}
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
		{/exp:weblog:entries}
		</ul>
	</div>
	{embed="deals/_sidebar"}
</div>
{embed="embeds/_doc-bottom"}