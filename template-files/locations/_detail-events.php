{exp:weblog:entries weblog="events" dynamic="off" limit="1" category="{segment_3_category_id}" show_future_entries="yes"}
	{if no_results}
		<p><em>No upcoming events.</em></p>
	{/if}
	<p class="button-wrap">
		<a href="/events/sponsors/{segment_3}" class="super small secondary button"><span>View Events</span></a>
	</p>
{/exp:weblog:entries}