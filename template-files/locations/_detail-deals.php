{exp:weblog:entries weblog="deals" dynamic="off" limit="1" category="{segment_3_category_id}" show_future_entries="yes"}
	{if no_results}
		<p><em>No active deals.</em></p>
	{/if}
	<p class="button-wrap">
		<a href="/deals/detail/{segment_3}" class="super small secondary button"><span>View Deals</span></a>
	</p>
{/exp:weblog:entries}