{embed="embeds/_doc-top" 
	class="events"
	title="Events in <?php echo ucwords("{segment_4}"); ?>, <?php echo strtoupper("{segment_3}"); ?>"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='events'}">Events</a></li>
</ul>
<div class="heading clearfix">
	<h1><?php echo ucwords("{segment_4}"); ?>, <?php echo strtoupper("{segment_3}"); ?></h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="events/_page-listing" parameters='search:event_state="={segment_3}" search:event_city="={segment_4}"'}
	</div>
	<div class="sidebar right">
		{embed="events/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}