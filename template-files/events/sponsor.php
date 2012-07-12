{embed="embeds/_doc-top" 
	class="events"
	title="Events sponsored by {segment_3_category_name}"
}
{embed="embeds/_rss-feed"}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/events">Events</a></li>
</ul>
<div class="heading clearfix">
	<h1>{segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
	{embed="events/_event-listitem" parameters='category="{segment_3_category_id}"'}
		</ul>
	</div>
	<div class="sidebar right">
		{embed="events/_sidebar"}
	</div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}