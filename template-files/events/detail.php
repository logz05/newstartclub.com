{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="
		{exp:weblog:entries weblog="{channel}" require_entry="yes" limit="1" url_title="{segment_3}"}
			{if no_results}Event Not Found{/if}
			&ldquo;{title}&rdquo; in {event_city}, {event_state}
		{/exp:weblog:entries}
"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
<div class="body">
{embed="includes/_breadcrumbs" channel="{channel}" section="{section}"}
	<div class="heading clearafter">
		{exp:weblog:entries weblog="{channel}" require_entry="yes" limit="1" url_title="{segment_3}"}{if no_results}<h1>We could not find this event</h1>{/if}<h1>{title}</h1>{/exp:weblog:entries}
	</div>
	<div class="grid23 clearafter">
		<div class="single left">
		{exp:weblog:entries weblog="{channel}" require_entry="yes" limit="1" url_title="{segment_3}"}
			{if no_results}
				<p>Sorry, we could not find this event. Either this event has not been created or has already passed. Click <strong><a href="{path='{channel}'}">here</a></strong> to see a list of upcoming events.</p>
			{/if}
			<div class="event">
				{assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
				{assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
				<dl>
					<dt>Date</dt>
					<dd>
						<p>
							{if event_start_time != ""}
								<span class="start-time">{exp:nice_date date="{event_start_time}" format="%g:%i %a"}</span> - 
								<span class="end-time">{exp:nice_date date="{event_end_time}" format="%g:%i %a"}</span>,
								<span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
								<span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span>,
								<span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
							{if:elseif "{e_start_date}" == "{e_end_date}"}
								<span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
								<span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span> - 
								<span class="day">{exp:nice_date date="{event_end_date}" format="%j"}</span>,
								<span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
							{if:elseif "{e_start_date}" != "{e_end_date}"}
								<span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
								<span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span> - 
								<span class="month">{exp:nice_date date="{event_end_date}" format="%F"}</span>
								<span class="day">{exp:nice_date date="{event_end_date}" format="%j"}</span>,
								<span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
							{/if}
						</p>
					</dd>
					<dt>Location</dt>
					<dd>
						<p>{if event_location_name}{event_location_name}<br />{/if}
							{event_address}<br />
							{event_city}, {event_state} {event_zip}
						</p>
					</dd>
					<dt>Details</dt>
					<dd>{exp:textile}{event_description}{/exp:textile}</dd>
					<dt>Sponsored by</dt>
					<dd>
						{categories show_group="24"}
							<a href="{site_url}sponsors/detail/{category_url_title}/" title="{cateogry_name}">{category_name}</a>
						{/categories}
					</dd>
				</dl>
				<div class="button-wrap clearafter">
					{if logged_out}
						<a href="{path='members/signin'}" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
					{if:else}
						<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
					{/if}
				</div>
				<p>Directions are based on your <a href="{path='members/settings'}">member profile</a>.</p>
				
			</div><!--/.event-->
			{/exp:weblog:entries}
		</div><!--/.single-->
		<div class="sidebar right">
			<div class="bar">RSVP List</div>
			{embed="{channel}/_rsvp-list"}
			{embed="includes/_share" channel="{channel}"}
			</div><!--/.sidebar-->
	</div><!--/.grid23-->
	
	<div id="map-area">
		<div id="canvas">
			<span>loading map&hellip;</span>
		</div>
		<div id="directions"></div>
		{exp:weblog:entries weblog="{channel}" limit="1" require_entry="yes" limit="1" url_title="{segment_3}"}
		<input id="map-end" value="{event_address} {event_city}, {event_state} {event_zip}" />{/exp:weblog:entries}
		{exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
	</div>
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="rsvp" modal-msg="You must be signed in to RSVP to this event."}
{embed="includes/_signin-modal modal-role="directions" modal-msg="You must be signed in to get directions."}
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
{embed="includes/_doc_bottom" script_add="maps"}