<header class="bar">RSVP List</header>
		{embed="events/_rsvp-list" member_id="{logged_in_member_id}"}
		<header class="bar">Filter</header>
{exp:channel:calendar channel="events" show_future_entries="yes" switch="calendarToday|calendarCell"}
	<table class="calendar-month" id="event-calendar">
		<tr class="calendarHeader">
			<th></th>
			<th colspan="5">{date format="%F %Y"}</th>
			<th></th>
		</tr>
		<tr>
		{calendar_heading}
			<td class="weekday">{lang:weekday_abrev}</td>
		{/calendar_heading}
		</tr>
		{calendar_rows }
			{row_start}<tr>{/row_start}
		
			{if entries}
				<td class="{switch} filled">
					{if segment_2 == 'date' && segment_4}
						<a href="#{exp:low_nice_date date='{segment_3}-{segment_4}-{day_number}' format='%Y-%m-%d'}">{day_number}</a>
					{if:else}
						<a href="#{exp:low_nice_date date='{current_time format='%Y-%m'}-{day_number}' format='%Y-%m-%d'}">{day_number}</a>
					{/if}
				</td>
			{/if}
		
			{if not_entries}
				<td class="{switch}">{day_number}</td>
			{/if}
		
			{if blank}
				<td class="calendarBlank"></td>
			{/if}
				
			{row_end}</tr>{/row_end}
		{/calendar_rows}
	</table>
{/exp:channel:calendar}
	<div id="dates">
		<ul>
			{exp:channel:month_links channel="events" limit="50" show_expired="no" show_future_entries="yes" sort="asc"}
			
			{year_heading}
			<h2 class="month-heading">{year}</h2>
			{/year_heading}
			<li><a href="{path='events/date/{year}/{month_num}'}" title="View events in {month} {year}">{month}</a></li>
			{/exp:channel:month_links}
		</ul>
	</div>

		<h2 class="filter-heading">Locations<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list location">
<?php
	$location_list = array(
		{exp:channel:entries channel="events" sort="asc|asc" dynamic="no" orderby="event_state|event_city" backspace="1" show_future_entries="yes"}
			strtolower("{event_state}/{event_city}") => "{event_city}, {event_state}", 
		{/exp:channel:entries}
		);

	foreach ($location_list as $key => $location) {
		print('<li><a href="{path="events/location/'. $key .'"}">'. $location .'</a></li>');
	}
?>
		</ul>
		<h2 class="filter-heading">Event Types<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list type">
			{exp:channel:categories channel="events" style="linear" show_empty="no" show_future_entries="yes" category_group="41"}
				<li><a href="{path='events/type/{category_url_title}'}">{category_name}</a></li>
			{/exp:channel:categories}
		</ul>
		
		<h2 class="filter-heading">Sponsors<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list sponsor">
<?php 
	$sponsor_list = array(
		{exp:channel:entries channel="events" dynamic="no" show_future_entries="yes"}
			{categories show_group="24"} "{category_url_title}" => "{category_name}", {/categories}
		{/exp:channel:entries}
	);
	
	foreach ($sponsor_list as $key => $sponsor) {
		print('<li><a href="{path="events/sponsor/'. $key .'"}">'. $sponsor .'</a></li>');
	}
?>
		</ul>