{embed="embeds/_doc-top" 
	class="events"
	microdata="event"
	map="yes"
	title="
		{exp:weblog:entries weblog="events" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes" show_expired="yes"}
			&ldquo;{title}&rdquo; in {event_city}, {event_state}
		{/exp:weblog:entries}
"}
<ul class="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/events">Events</a></li>
</ul>
{exp:weblog:entries weblog="events" require_entry="yes" limit="1" show_future_entries="yes" show_expired="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">

	<h1 id="event-title" itemprop="name">{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
	<h2>
		{!-- Check if event is only on one date and time is set --}
		{if ("{entry_date format='%d'}" == "{expiration_date format='%d'}") && "{event_start_time}"}
			<span class="start-time">{exp:nice_date date="{event_start_time}" format="%g:%i %a"}</span>{if event_end_time ==""},{/if}
			{if event_end_time} to <span class="end-time">{exp:nice_date date="{event_end_time}" format="%g:%i %a"}</span>,{/if}
			<span class="month">{entry_date format="%F"}</span>
			<span class="day">{entry_date  format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 1 -->
		{/if}
		
		{!-- Check if event is only on one date and time is NOT set --}
		{if ("{entry_date format='%d'}" == "{expiration_date format='%d'}") && "{event_start_time}" ==""}
			<span class="month">{entry_date  format="%F"}</span>
			<span class="day">{entry_date  format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 2 -->
		{/if}
		
		{!-- Check to see if repeating event --}
		{if ("{entry_date format='%d'}" != "{expiration_date format='%d'}") && "{event_start_time}"}
			<span class="start-time">{exp:nice_date date="{event_start_time}" format="%g:%i %a"}</span>{if event_end_time ==""},{/if}
			{if event_end_time} to <span class="end-time">{exp:nice_date date="{event_end_time}" format="%g:%i %a"}</span>,{/if}
			<span class="month">{entry_date format="%F"}</span>
			<span class="day">{entry_date format="%j"}</span> to 
			<span class="month">{entry_date format="%F"}</span>
			<span class="day">{expiration_date format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 3 -->
		{/if}
		
		{!-- Check to see if repeating event and time is NOT set --}
		{if ("{entry_date format='%d'}" != "{expiration_date format='%d'}") && "{event_start_time}" == "" && ("{entry_date format='%Y'}" == "{expiration_date format='%Y'}")}
			<span class="month">{entry_date  format="%F"}</span>
			<span class="day">{entry_date  format="%j"}</span> to 
			<span class="month">{expiration_date format="%F"}</span>
			<span class="day">{expiration_date format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 4 -->
		{/if}
		
		{!-- Check to see if repeating event, time is NOT set, and event spans years --}
		{if ("{entry_date format='%d'}" != "{expiration_date format='%d'}") && "{event_start_time}" == "" && ("{entry_date format='%Y'}" != "{expiration_date format='%Y'}")}
			<span class="month">{entry_date  format="%F"}</span>
			<span class="day">{entry_date  format="%j"}</span>,
			<span class="year">{entry_date  format="%Y"}</span> to 
			<span class="month">{expiration_date format="%F"}</span>
			<span class="day">{expiration_date format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 5 -->
		{/if}in <?php echo '<a href="/events/location/' . strtolower("{event_state}/{event_city}") . '">{event_city}, {event_state}</a>'; ?>
	</h2>
	<meta itemprop="startDate" content="{entry_date format="%Y-%m-%d"}{if event_start_time}T{exp:nice_date date='{event_start_time}' format='%H:%i'}{/if}">
	<a href="http://newstartclub.com" rel="publisher"></a>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{if expiration_date < current_time }
			<div class="alert-box warning">
				<p>This event has already passed. To see a list of upcoming events click <strong><a href="{path='events'}">here</a></strong></p>
			</div>
		{/if}
		<div class="post">
			
			<span itemprop="description">{event_description}</span>
			{if current_time < expiration_date}<p><em>Add this event to your <a href="#event-title">RSVP list</a> to attend!</em></p>{/if}
			{if current_time < expiration_date}{embed="events/_add-event-button"}{/if}
			<dl>
				<dt>Sponsored by:</dt>
				<dd>
					{categories show_group="24"}
						<a href="{site_url}locations/detail/{category_url_title}/" title="{cateogry_name}">{category_name}</a>
					{/categories}
				</dd>
				<dt>Location:</dt>
				<dd itemprop="location" itemscope itemtype="http://schema.org/Place">
					<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{if event_location_name}{event_location_name}<br />{/if}
						<span itemprop="streetAddress">{event_address}</span><br />
						<span itemprop="addressLocality">{event_city}</span>, <span itemprop="addressRegion">{event_state}</span> <span itemprop="postalCode">{event_zip}</span>
					</p>
				</dd>
			</dl>
			<div class="button-wrap clearfix">
				{if logged_out}
					<a href="/signin" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
				{if:else}
					<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
				{/if}
			</div>
			<p>Directions are based on your <a href="/settings">member profile</a>.</p>
			
		</div><!--/#entry-->
	</div>
	<div class="sidebar right">
		<header class="bar">RSVP List</header>
		{embed="events/_rsvp-list"}
		{embed="embeds/_share" channel="events" image=""}
		</div>
	</div>
{/exp:weblog:entries}
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
{exp:weblog:entries weblog="events" limit="1" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes" show_expired="yes"}
<input id="map-end" value="{event_address} {event_city}, {event_state} {event_zip}" />{/exp:weblog:entries}
{exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
{embed="embeds/_doc-bottom" sim="rsvp|directions"}