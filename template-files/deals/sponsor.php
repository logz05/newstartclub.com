{embed="embeds/_doc-top" 
	class="deals"
	title="Deals sponsored by {segment_3_category_name}"
"}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/deals">Deals</a></li>
</ul>
<div class="heading clearfix">
	<h1>{segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
	
		{embed="deals/_page-listing" parameters='category="{segment_3_category_id}"'}
	
	</div>
	{embed="deals/_sidebar"}
</div>
{embed="embeds/_doc-bottom"
	sim="coupon"
	show-coupons='{exp:weblog:entries weblog="deals" dynamic="off" category="{segment_3_category_id}" show_future_entries="yes" show_expired="yes" backspace="1"}{entry_id}|{/exp:weblog:entries}'
}