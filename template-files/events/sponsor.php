{embed="embeds/_doc-top" 
	class="events"
	title="Events sponsored by {segment_3_category_name}"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='events'}">Events</a></li>
</ul>
<div class="heading clearfix">
	<h1>{segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="events/_page-listing" parameters='category="{segment_3_category_id}"'}
	</div>
	<div class="sidebar right">
		{embed="events/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}