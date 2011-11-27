{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="
    {exp:weblog:entries weblog="{channel}" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes"}
      {if no_results}Event Not Found{/if}
      &ldquo;{title}&rdquo; in {event_city}, {event_state}
    {/exp:weblog:entries}
"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/events">{section}</a></li>
</ul>
<div class="heading clearfix">
  {exp:weblog:entries weblog="{channel}" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes"}{if no_results}<h1>We could not find this event</h1>{/if}<h1>{title}</h1>{/exp:weblog:entries}
</div>
<div class="grid23 clearfix">
  <div class="main left">
  {exp:weblog:entries weblog="{channel}" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes"}
    {if no_results}
      <p>Sorry, we could not find this event. Either this event has not been created or has already passed. Click <strong><a href="{path='{channel}'}">here</a></strong> to see a list of upcoming events.</p>
    {/if}
    <div id="entry">
      {assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
      {assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
      {assign_variable:year_start_date="{exp:nice_date date='{event_start_date}' format='%Y'}"}
      {assign_variable:year_end_date="{exp:nice_date date='{event_end_date}' format='%Y'}"}
      {exp:textile}{event_description}{/exp:textile}
      <p><em>Add this event to your RSVP list to attend!</em></p>
      <dl>
        <dt>Sponsored by</dt>
        <dd>
          {categories show_group="24"}
            <a href="{site_url}locations/detail/{category_url_title}/" title="{cateogry_name}">{category_name}</a>
          {/categories}
        </dd>
        <dt>Date</dt>
        <dd>
          <p>
            {!-- Check if event is only on one date and time is set --}
            {if event_start_date == event_end_date && event_start_time !=""}
              <span class="start-time">{exp:nice_date date="{event_start_time}" format="%g:%i %a"}</span> to 
              <span class="end-time">{exp:nice_date date="{event_end_time}" format="%g:%i %a"}</span>,
              <span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span>,
              <span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
            {/if}
            
            {!-- Check if event is only on one date and time is NOT set --}
            {if event_start_date == event_end_date && event_start_time ==""}
              <span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span>,
              <span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
            {/if}
            
            {!-- Check to see if repeating event --}
            {if (event_start_date != event_end_date) && event_start_time !=""}
              <span class="start-time">{exp:nice_date date="{event_start_time}" format="%g:%i %a"}</span>,
              <span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span> to 
              <span class="end-time">{exp:nice_date date="{event_end_time}" format="%g:%i %a"}</span>,
              <span class="month">{exp:nice_date date="{event_end_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_end_date}" format="%j"}</span>,
              <span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
            {/if}
            
            {!-- Check to see if repeating event and time is NOT set --}
            {if (event_start_date != event_end_date) && event_start_time == "" && ('year_start_date' == 'year_end_date')}
              <span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span> to 
              <span class="month">{exp:nice_date date="{event_end_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_end_date}" format="%j"}</span>,
              <span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
              <!-- Year Start Date: {year_start_date} Year End Date: {year_end_date} -->
            {/if}
            
            {!-- Check to see if repeating event, time is NOT set, and event spans years --}
            {if (event_start_date != event_end_date) && event_start_time == "" && ('year_start_date' != 'year_end_date')}
              <span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
              <span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span>,
              <span class="year">{exp:nice_date date="{event_start_date}" format="%Y"}</span> to 
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
  {exp:weblog:entries weblog="{channel}" limit="1" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes"}
  <input id="map-end" value="{event_address} {event_city}, {event_state} {event_zip}" />{/exp:weblog:entries}
  {exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
</div>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
{embed="embeds/_doc-bottom" sim="rsvp|directions"}