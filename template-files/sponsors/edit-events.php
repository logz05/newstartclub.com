{embed="embeds/_doc-top" 
	class="sponsors"
	title="Edit Events"
}

<div class="heading clearfix">
	<h1>Edit Events</h1>
</div>
{exp:user:stats dynamic="off"}

<div class="grid23 clearfix">
	<div class="main sponsor-events left">
		<noscript>
			<div class="alert-box warning">
				<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
			</div>
		</noscript>
	
		{embed="sponsors/_event-list" sponsor_number="{member_sponsor_id}"}
	
	</div>
	<div class="right sidebar">
		<header class="bar" data-icon="e">Edit Events</header>
		<p>Click on the event title to view event details.</p>
		<ul class="bullets">
			<li><a href="{path='sponsors/add-event'}">Add a new event</a></li>
			<li>{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}<a href="{site_url}/events/sponsor/{category_url_title}">View my active events</a>{/exp:channel:categories}</li>
		</ul>
	</div>
	{/exp:user:stats}
</div>
{embed="embeds/_doc-bottom" script_add="sponsors"}