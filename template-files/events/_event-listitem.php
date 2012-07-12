{exp:weblog:entries weblog="events" sort="asc" orderby="date" show_future_entries="yes" limit="9" paginate="bottom" dynamic="off" {embed:parameters}}
{if no_results}
	<p>There are currently no upcoming events.</p>
{/if}
	<li class="event" id="{entry_date format='%Y-%m-%d'}">
		<h2>
			<a href="{url_title_path='events/detail'}">{title}</a>
			<span class="date">
				<span class="day">{entry_date format="%d"}</span>
				<span class="month">{entry_date format="%M"}</span>
				<span class="year">{entry_date format="%Y"}</span>
				<span class="time">
					{!-- Check if event is only on one date and time is set --}
					{if "{entry_date format='%d'}" == "{expiration_date format='%d'}" && "{event_start_time}"}
						{exp:nice_date date="{event_start_time}" format="%g:%i %a"}{if event_end_time} - {exp:nice_date date="{event_end_time}" format="%g:%i %a"}{/if}
					{/if}
					
					{!-- Check if event is only on one date and time is NOT set --}
					{if "{entry_date format='%d'}" == "{expiration_date format='%d'}" && "{event_start_time}" == ""}
						All Day
					{/if}
					
					{!-- Check to see if repeating event --}
					{if "{entry_date format='%d'}" != "{expiration_date format='%d'}"}
						{entry_date format="%M %j"} - {expiration_date format="%M %j"}
					{/if}
				</span>
			</span>
		</h2>
		<h3><a href="/events/location/<?php echo strtolower("{event_state}/{event_city}"); ?>">{event_city}, {event_state}</a></h3>
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