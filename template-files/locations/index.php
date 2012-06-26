{embed="embeds/_doc-top" 
	class="locations"
	title="Locations"
}
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-locations"}
<div class="heading clearfix">
	<i>6</i>
	<h1>Locations</h1>
</div>		
<div class="grid23 clearfix">
	<div class="main left">
	<ul id="listing">
	{exp:weblog:entries weblog="locations" orderby="location_city" sort="asc" limit="9" paginate="bottom" disable="member_data" dynamic="off"}
		<li class="location clearfix">
			<a href="{url_title_path='locations/detail'}" class="image"><div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
			</div></a>
			<h2><a href="{url_title_path='locations/detail'}">{title}</a></h2>
			<h3>{location_address}<br />{if location_address2}{location_address2}<br />{/if}{location_city}, {location_state}</h3>
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
	<div class="sidebar right">
		{embed="locations/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}