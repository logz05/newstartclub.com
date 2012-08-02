{embed="embeds/_doc-top" 
	class="deals"
	title="Deals"
"}
{if segment_3}
	{redirect="404"}
{/if}
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-deals"}
<div class="heading clearfix">
	<h1 data-icon="n">Deals</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
	
		{embed="deals/_page-listing"}
	
	</div>
	{embed="deals/_sidebar"}
</div>
{embed="embeds/_doc-bottom"
	sim="coupon"
	show-coupons='{exp:weblog:entries weblog="deals" dynamic="off" show_future_entries="yes" show_expired="yes" backspace="1"}{entry_id}|{/exp:weblog:entries}'
}