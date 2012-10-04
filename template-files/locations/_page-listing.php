{exp:channel:entries channel="locations" orderby="location_city" sort="asc" limit="9" paginate="bottom" disable="member_data" dynamic="no" {embed:parameters}}
{if count == 1}
	<ul class="listing">
{/if}
	<li class="location clearfix">
		<a href="{url_title_path='locations/detail'}" class="image"><div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
		</div></a>
		<h2><a href="{url_title_path='locations/detail'}">{title}</a></h2>
		<div class="address">
			{location_address}<br>
			{location_city}, {location_state}
		</div>
	</li>
{if count == total_results}
	</ul>
{/if}

{paginate}
	<p class="pagination">{pagination_links}</p>
{/paginate}
{/exp:channel:entries}