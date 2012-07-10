{embed="embeds/_doc-top" 
	class="events"
	title="Events in <?php echo ucwords("{segment_4}"); ?>, <?php echo strtoupper("{segment_3}"); ?>"
}
{embed="embeds/_rss-feed"}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/events">Events</a></li>
</ul>
<div class="heading clearfix">
	<h1><?php echo ucwords("{segment_4}"); ?>, <?php echo strtoupper("{segment_3}"); ?></h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
	{embed="events/_event-listitem" parameters='search:event_state="={segment_3}" search:event_city="={segment_4}"'}
		</ul>
	</div>
	<div class="sidebar right">
		{embed="events/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}