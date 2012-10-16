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
	
		{embed="sponsors/_event-list" sponsor_number="{member_admin_id}"}
	
	</div>
	<div class="right sidebar">
		<header class="bar" data-icon="e">Edit Events</header>
		<p>To see more about an event click on the event title.</p>
		<p>To add a new event, click <a href="{path='sponsors/add-event'}">here</a>.</p>
		<p>Click {exp:channel:categories show="{member_admin_id}" channel="locations" style="linear"}<a href="/events/sponsor/{category_url_title}">here</a>{/exp:channel:categories} to see your active events.</p>
	</div>
	{/exp:user:stats}
</div>
{embed="embeds/_doc-bottom" script_add="sponsors"}