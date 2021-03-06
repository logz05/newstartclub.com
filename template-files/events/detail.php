{embed="embeds/_doc-top" 
	class="events"
	microdata="event"
	meta='
		{exp:channel:entries channel="events" url_title="{segment_3}" show_future_entries="yes" show_expired="yes"}
			<meta property="og:title" content="{title}"/>
			<meta property="og:site_name" content="{site_name}"/>
			<meta property="og:url" content="{url_title_path='events/detail'}"/>
			<meta property="og:type" content="article"/>
			{if event_image}
				<meta property="og:image" content="{event_image}"/>
			{if:else}
				<meta property="og:image" content="{site_url}/assets/css/images/icon-events.png"/>
			{/if}
			<meta property="og:description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{event_description}{/exp:eehive_hacksaw}"/>
			<meta name="description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{event_description}{/exp:eehive_hacksaw}"/>
		{/exp:channel:entries}
	'
	map="yes"
	title="
		{exp:channel:entries channel="events" url_title="{segment_3}" show_future_entries="yes" show_expired="yes" limit=1}
			&ldquo;{title}&rdquo; in {event_city}, {event_state}{if event_country}, {event_country:label}{/if}
		{/exp:channel:entries}
"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='events'}">Events</a></li>
</ul>
{exp:channel:entries channel="events" show_future_entries="yes" show_expired="yes" limit="1" require_entry="yes"}
{if no_results}
	{redirect="404"}
{/if}
{!--{if segment_4 != "delete-rsvp"}
	{redirect="404"}
{/if}--}
<hgroup class="heading clearfix">

	<h1 id="event-title" itemprop="name">{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
	<h2><time pubdate datetime="{gmt_entry_date format='{DATE_W3C}'}">
		{!-- Check if event is only on one date and time is set --}
		{if ('{entry_date format="%Y-%M-%d"}' == '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" != "0"}
			<span class="-time"></span>
			{event_start_time format="%g:%i %a"}{if event_end_time =="0"},{/if}
			
			{if event_end_time != "0"} to {event_end_time format="%g:%i %a"},{/if}
			{entry_date format="%F %j, %Y"}
			<!-- 1 -->
		{/if}
		
		{!-- Check if event is only on one date and time is NOT set --}
		{if ('{entry_date format="%Y-%M-%d"}' == '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" =="0"}
			
			{entry_date format="%F %j, %Y"}
			<!-- 2 -->
		{/if}
		
		{!-- Check to see if repeating event --}
		{if ('{entry_date format="%Y-%M-%d"}' != '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}"}
			<span class="start-time">{event_start_time format="%g:%i %a"}</span>{if event_end_time =="0"},{/if}
			{if event_end_time} to <span class="end-time">{event_end_time format="%g:%i %a"}</span>,{/if}
			<span class="month">{entry_date format="%F"}</span>
			<span class="day">{entry_date format="%j"}</span> to 
			<span class="month">{expiration_date format="%F"}</span>
			<span class="day">{expiration_date format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 3 -->
		{/if}
		
		{!-- Check to see if repeating event and time is NOT set and is in the same year--}
		{if ('{entry_date format="%Y-%M-%d"}' != '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" == "0" && ('{entry_date format="%Y"}' == '{expiration_date format="%Y"}')}
			<span class="month">{entry_date format="%F"}</span>
			<span class="day">{entry_date format="%j"}</span> to 
			<span class="month">{expiration_date format="%F"}</span>
			<span class="day">{expiration_date format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 4 -->
		{/if}
		
		{!-- Check to see if repeating event, time is NOT set, and event spans years --}
		{if ('{entry_date format="%Y-%M-%d"}' != '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" == "0" && ("{entry_date format='%Y'}" != "{expiration_date format='%Y'}")}
			<span class="month">{entry_date format="%F"}</span>
			<span class="day">{entry_date format="%j"}</span>,
			<span class="year">{entry_date format="%Y"}</span> to 
			<span class="month">{expiration_date format="%F"}</span>
			<span class="day">{expiration_date format="%j"}</span>,
			<span class="year">{expiration_date format="%Y"}</span>
			<!-- 5 -->
		{/if}</time>in <?php echo '<a href="{path="events/location/' . strtolower("{event_state}/{event_city}") . '"}">{event_city}, {event_state}</a>'; ?>{if logged_in_member_id == 1}, <a href="{path='events/country/{event_country}'}">{event_country:label}</a>{/if}
	</h2>
	<meta itemprop="startDate" content="{entry_date format="%Y-%m-%d"}{if event_start_time}T{exp:low_nice_date date='{event_start_time}' format='%H:%i'}{/if}">
	<a href="http://newstartclub.com" rel="publisher"></a>
</hgroup>
<div class="grid23 clearfix">
	<div class="main left">
		{if expiration_date < current_time }
			<div class="alert-box warning">
				<i class="i"></i><p>This event has already passed. <a href="{path='events'}">View upcoming events</a></p>
			</div>
		{/if}
		<div class="post">
			{if event_image}
				<figure class="figure  figure--main  right">
					{exp:ce_img:single src="{event_image}" max_width="200" attributes='alt="{title}" itemprop="image"'}
				</figure>
			{/if}
			<span class="event_description" itemprop="description">
				{event_description}
			</span>
	
			<dl class="post-details">
				{if expiration_date > current_time}
					{embed="events/_add-rsvp" entry_id="{entry_id}" expiration_date="{expiration_date}"}
				{/if}
				<dt>Sponsored by:</dt>
				<dd>
					{categories show_group="24"}
						<a href="{site_url}/locations/detail/{category_url_title}" title="View more information about {category_name}">{category_name}</a>
					{/categories}
				</dd>
				<dt>Location:</dt>
				<dd itemprop="location" itemscope itemtype="http://schema.org/Place">
					<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">{if event_location_name}{event_location_name}<br />{/if}
						<span itemprop="streetAddress">{event_address}</span><br />
						<span itemprop="addressLocality">{event_city}</span>, <span itemprop="addressRegion">{event_state}</span> <span itemprop="postalCode">{event_zip}</span>{if event_country}<br />
						<span itemprop="addressCountry">{event_country:label}</span>{/if}
					</p>
				</dd>
			</dl>
			<div class="button-wrap">
				{if logged_out}
					<a href="{path='signin'}" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
				{if:else}
					<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
				{/if}
			</div>
			<p class="directions-comment">Directions are based on your <a href="{path='settings'}">member profile</a>.</p>
			
		</div>
	</div>
	<div class="sidebar right">
		<header class="bar">RSVP List</header>
		{embed="events/_rsvp-list"}
		{embed="embeds/_share" channel="events" image=""}
		</div>
	</div>
{/exp:channel:entries}
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
{exp:channel:entries channel="events" limit="1" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes" show_expired="yes"}
<input id="map-end" value="{event_address} {event_city}, {event_state} {event_zip}" />{/exp:channel:entries}
{exp:user:stats dynamic="no"}<input id="map-start" value="{member_address} {member_city}, {member_state} {member_zip}" />{/exp:user:stats}
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
{embed="embeds/_doc-bottom" sim="rsvp|directions"}