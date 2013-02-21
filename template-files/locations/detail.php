{embed="embeds/_doc-top"
	class="locations"
	map="yes"
	title="
			{exp:channel:entries channel='locations' url_title='{segment_3}' limit='1'}
				{title}
			{/exp:channel:entries}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='locations'}">Locations</a></li>
</ul>
{exp:channel:entries channel="locations" limit="1" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
				<dl>
					<dt>Address:</dt>
					<dd>{location_address}<br />{location_city}, {location_state} {location_zip}</dd>
					{if location_telephone}<dt>Phone:</dt>
					<dd>{location_telephone}</dd>{/if}
					{if location_website}<dt>Website:</dt>
					<dd><a href="http://{location_website}/">{location_website}</a></dd>{/if}
				</dl>
				<p class="button-wrap directions">
					{if logged_out}
						<a href="{path='signin'}" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
					{if:else}
						<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
					{/if}
				</p>
			{/exp:channel:entries}
			{if logged_out}
				<p>Directions are based on your <a href="{path='signin'}" data-reveal-id="signin-modal">member profile</a>.</p>
			{if:else}
				<p>Directions are based on your <a href="{path='settings'}">member profile</a>.</p>
			{/if}
		</div>
	</div>
	<div class="sidebar right">
		<header class="bar">Contact Person</header>
		{if logged_out}
			<p class="button-wrap">
				<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
			</p>
		{/if}
		{if logged_in}
			{exp:channel:entries channel="locations" limit="1"}
				<dl>
					<dt>Name:</dt>
					<dd>{location_contact_name}</dd>
					<dt>Phone:</dt>
					<dd>{location_contact_phone}</dd>
					<dt>Email:</dt>
					<dd><a href="mailto:{location_contact_email}" title="{location_contact_email}">{location_contact_email}</a></dd>
				</dl>
			{/exp:channel:entries}
		{/if}
		{exp:channel:entries channel="locations" limit="1"}
			{if location_type=="profit"}
				<header class="bar">Active Deals</header>
				{embed="locations/_detail-deals"}
			{if:else}
				<header class="bar">Upcoming Events</header>
				{embed="locations/_detail-events"}
			{/if}
		{/exp:channel:entries}
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
{exp:channel:entries channel="locations" limit="1"}
<input id="map-end" value="{location_address} {location_city}, {location_state} {location_zip}" />
{/exp:channel:entries}
{exp:user:stats dynamic="no"}<input id="map-start" value="{member_address} {member_city}, {member_state} {member_zip} {member_country}" />{/exp:user:stats}
{embed="embeds/_doc-bottom" sim="contact|directions"}