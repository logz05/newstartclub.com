{embed="embeds/_doc-top"
	class="locations"
	map="yes"
	title="
			{exp:weblog:entries weblog='locations' url_title='{segment_3}' limit='1'}
				{title}
			{/exp:weblog:entries}"
}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/locations">Locations</a></li>
</ul>
{exp:weblog:entries weblog="locations" limit="1" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div id="entry">
				<dl>
					{if location_address != ""}<dt>Address:</dt>
					<dd>{location_address}<br />{if location_address2}{location_address2}<br />{/if}{location_city}, {location_state} {location_zip}</dd>{/if}
					{if location_telephone != ""}<dt>Phone:</dt>
					<dd>{location_telephone}</dd>{/if}
					{if location_website != ""}<dt>Website:</dt>
					<dd><a href="http://{location_website}/">{location_website}</a></dd>{/if}
				</dl>
				<p class="button-wrap directions">
					{if logged_out}
						<a href="/signin" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
					{if:else}
						<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
					{/if}
				</p>
			{/exp:weblog:entries}
			{if logged_out}
				<p>Directions are based on your <a href="/signin" data-reveal-id="signin-modal">member profile</a>.</p>
			{if:else}
				<p>Directions are based on your <a href="/settings">member profile</a>.</p>
			{/if}
		</div>
	</div>
	<div class="sidebar right">
		<div class="bar">Contact Person</div>
		{if logged_out}
			<p class="button-wrap">
				<a href="/signin" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
			</p>
		{/if}
		{if logged_in}
			{exp:weblog:entries weblog="locations" limit="1"}
				<dl>
					<dt>Name:</dt>
					<dd>{location_contact_name}</dd>
					<dt>Phone:</dt>
					<dd>{location_contact_phone}</dd>
					<dt>Email:</dt>
					<dd><a href="mailto:{location_contact_email}" title="{location_contact_email}">{location_contact_email}</a></dd>
				</dl>
			{/exp:weblog:entries}
		{/if}
		<div class="bar">Upcoming Events</div>
		{exp:weblog:entries weblog="events" dynamic="off" limit="1" category="{segment_3_category_id}" show_future_entries="yes"}
			{if no_results}
				<p><em>No upcoming events.</em></p>
			{/if}
			<p class="button-wrap">
				<a href="/events/sponsors/{segment_3}" class="super small secondary button"><span>View Events</span></a>
			</p>
		{/exp:weblog:entries}
	</div>
</div>
<div id="map-area">
	<div id="canvas"><span id="loading"></span></div>
	<span class="shadow"></span>
</div>
<script type="text/javascript">
//Spin.js loading indicator

	var opts = {
		lines: 12,
		length: 4,
		width: 2,
		radius: 6,
		color: '#9f9e9b',
		speed: 1.3,
		trail: 70,
		shadow: false
	};
	var target = document.getElementById('loading');
	var spinner = new Spinner(opts).spin(target);
	
// End Spin.js parameters
</script>
<div id="directions"></div>
{exp:weblog:entries weblog="locations" limit="1"}
<input id="map-end" value="{location_address} {location_city}, {location_state} {location_zip}" />
{/exp:weblog:entries}
{exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
{embed="embeds/_doc-bottom" sim="contact|directions"}