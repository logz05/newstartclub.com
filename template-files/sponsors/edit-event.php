{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program | Edit Events"}
<div class="heading clearfix">
	<h1>Edit Events</h1>
</div>
<div class="grid23 clearfix">
	{exp:user:stats dynamic="off"}
	<div class="main sponsor-events left">
	
	{embed="sponsors/_event-list" sponsor_number="{sponsor_number}"}
	
	</div>
	<div class="right sidebar">
		<div class="bar">Edit Events</div>
		<p>To see more about an event click on the event title.</p>
		<p>To add a new event, click <a href="/sponsors/add-event">here</a>.</p>
		<p>Click {exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}<a href="/events/sponsors/{category_url_title}">here</a>{/exp:weblog:categories} to see your active events.</p>
	</div>
	{/exp:user:stats}
</div><!-- /.grid23 -->
{embed="embeds/_doc-bottom" script_add="sponsors"}