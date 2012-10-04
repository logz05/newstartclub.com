{embed="embeds/_doc-top" 
	class="deals"
	title="{segment_3_category_name} Deals"
"}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='deals'}">Deals</a></li>
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
	show-coupons='{exp:channel:entries channel="deals" limit="12" orderby="expiration_date" sort="asc" paginate="bottom" dynamic="no" show_future_entries="yes" category="{segment_3_category_id}"}{entry_id}|{/exp:channel:entries}'
}