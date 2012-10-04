{exp:channel:entries channel="deals" dynamic="no" limit="1" category="{segment_3_category_id}" show_future_entries="yes"}
	{if no_results}
		<p><em>No active deals.</em></p>
	{/if}
	<p class="button-wrap">
		<a href="/deals/sponsor/{segment_3}" class="super small secondary button"><span>View Deals</span></a>
	</p>
{/exp:channel:entries}