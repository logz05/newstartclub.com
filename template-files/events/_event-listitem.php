{exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" show_future_entries="yes" limit="9" paginate="bottom" dynamic="off" {embed:parameters}}
  <li class="event">
    {assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
    {assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
    <h1>
      <a href="{url_title_path='events/detail'}">{title}</a>
      <div class="date">
        <span class="day">{exp:nice_date date="{event_start_date}" format="%d"}</span>
        <span class="month">{exp:nice_date date="{event_start_date}" format="%M"}</span>
        <span class="year">{exp:nice_date date="{event_start_date}" format="%Y"}</span>
        <span class="time">
          {!-- Check if event is only on one date and time is set --}
          {if event_start_date == event_end_date && event_start_time !=""}
            {exp:nice_date date="{event_start_time}" format="%g:%i %a"} - {exp:nice_date date="{event_end_time}" format="%g:%i %a"}
          {/if}
          
          {!-- Check if event is only on one date and time is NOT set --}
          {if event_start_date == event_end_date && event_start_time == ""}
            All Day
          {/if}
          
          {!-- Check to see if repeating event --}
          {if (event_start_date != event_end_date)}
            {exp:nice_date date="{event_start_date}" format="%M %j"} - {exp:nice_date date="{event_end_date}" format="%M %j"}
          {/if}
        </span>
      </div>
    </h1>
    <h2 class="location"><a href="/events/{event_state}/{event_city}/">{event_city}, {event_state}</a></h2>
    <div class="details">
      {exp:trunchtml chars="140" inline="&hellip;" ending="<a class='link-more' href='/events/detail/{url_title}'>more&raquo;</a>"}
        {event_description}
      {/exp:trunchtml}
    </div>
  </li>
  {paginate}
    {if "{total_pages}" > 1}
      <div class="pagination">
        <p>{pagination_links}</p>
      </div>
    {/if}
  {/paginate}
{/exp:weblog:entries}