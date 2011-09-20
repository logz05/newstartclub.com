<ul>
{exp:weblog:entries weblog="events" sort="asc" orderby="date" paginate="bottom" limit="10" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}" dynamic_parameters="orderby|limit|sort"}
  
{if no_results}<p>You don&rsquo;t have any current events. Click <a href="/sponsors/add-event">here</a> to add a new event.</p>{/if}

  {assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
  {assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
  <li class="row">
    <script type="text/javascript">
      function confirmation_{entry_id}() {
        var answer = confirm("Are you sure you want to delete this event?")
        if (answer){
          document.forms["entryform_{entry_id}"].submit();
        }
      }
    </script>
    <h1 class="title">{title}</h1>
    <p class="button-wrap">
      <a href="http://admin.newstartclub.com/index.php?C=edit&M=edit_entry&weblog_id={weblog_id}&entry_id={entry_id}" target="_blank" class="super small white button"><span>Edit</span></a>
      <a href="javascript: confirmation_{entry_id}()" class="super small white button"><span>Delete</span></a>
    </p>
    <div class="details">
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
      </dl>
    </div>
    <form id="entryform_{entry_id}" method="post" action="{path='{channel}/{segment_2}/{segment_3}'}"  >
      <div class='hiddenFields'>
        <input type="hidden" name="ACT" value="18" />
        <input type="hidden" name="RET" value="{path='{channel}/{segment_2}/{segment_3}'}" />
        <input type="hidden" name="PRV" value="" />
        <input type="hidden" name="URI" value="{path='{channel}/{segment_2}/{segment_3}'}" />
        <input type="hidden" name="return_url" value="{path='{channel}/{segment_2}/{segment_3}'}" />
        <input type="hidden" name="author_id" value="{author_id}" />
        <input type="hidden" name="weblog_id" value="28" />
        <input type="hidden" name="status" value="closed" />
        <input type="hidden" name="site_id" value="4" />
      </div>
      <input type="hidden" name="title" id="title" value="{title}" />
      <input type="hidden" name="url_title" id="url_title" value="{url_title}" />
      <input type="hidden" name="entry_id" value="{entry_id}" />
    </form>
  </li>
{paginate}{if "{total_pages}" != 1}<p>Page {current_page} of {total_pages} pages {pagination_links}</p>{/if}{/paginate}
{/exp:weblog:entries}
</ul>