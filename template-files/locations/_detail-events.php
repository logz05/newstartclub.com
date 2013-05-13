{exp:channel:entries channel="events" require_entry="yes" dynamic="no" limit="1" category="{segment_3_category_id}" show_future_entries="yes"}
	{if no_results}
		<p><em>No upcoming events.</em></p>
	{/if}
	<p class="button-wrap">
		<a href="{path='events/sponsor/{segment_3}'}" class="super  small  green  button"><span>View Events</span></a>
	</p>
{/exp:channel:entries}