{embed="embeds/_doc-top" 
	class="events"
	title="Events in {exp:low_nice_date date="{segment_3}-{segment_4}" format="%F %Y"}"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='events'}">Events</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:low_nice_date date="{segment_3}-{segment_4}" format="%F %Y"}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="events/_page-listing" parameters='year="{segment_3}" month="{segment_4}"'}
	</div>
	<div class="sidebar right">
		{embed="events/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}