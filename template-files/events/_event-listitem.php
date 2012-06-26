{exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" show_future_entries="yes" limit="9" paginate="bottom" dynamic="off" {embed:parameters}}
{if no_results}
	<p>There are currently no upcoming events.</p>
{/if}
	<li class="event" id="{exp:nice_date date='{event_start_date}' format='%Y-%m-%d'}">
		{assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
		{assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
		<h2>
			<a href="{url_title_path='events/detail'}">{title}</a>
			<span class="date">
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
			</span>
		</h2>
		<h3><a href="/events/locations/<?php echo strtolower("{event_state}/{event_city}"); ?>">{event_city}, {event_state}</a></h3>
		<p class="details">
			{exp:trunchtml chars="150" threshold="150" inline="&hellip; <a class='link-more' href='{url_title_path='events/detail'}'>more&raquo;</a>"}
				{exp:html_strip}{exp:textile}{event_description}{/exp:textile}{/exp:html_strip}
			{/exp:trunchtml}
		</p>
	</li>
	{paginate}
		{if "{total_pages}" > 1}
			<li class="pagination">
				<p>{pagination_links}</p>
			</li>
		{/if}
	{/paginate}
{/exp:weblog:entries}