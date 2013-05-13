{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="{exp:low_title:entry url_title="{segment_3}" channel="locations"}"
		section="Locations"
	}
	
	{sn_styles}
	{gv_modernizr}
	
	{embed="embeds/_google-maps"}
	
</head>

<body onload="initialize()">

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>
	
	<div class="body  detail  locations">
	
		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='locations'}">Locations</a></li>
		</ul>
		
	{exp:channel:entries channel="locations" limit="1" require_entry="yes"}
	
		{if no_results}
			{redirect="404"}
		{/if}
		
		{if segment_4}
			{redirect="404"}
		{/if}
		
		<header class="heading">
			<h1 class="post__title">{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
			<h2 class="post__permalink">{categories show_group="24"}{site_url}/location/{category_id}{/categories}</h2>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">
			
			{sn_no-script}
			
				<article class="post">
				
					<dl class="location__meta">
					
						<dt>Address:</dt>
						<dd>{location_address}<br />{location_city}{if location_state}, {location_state}{/if} {location_zip}<br />{location_country:label}</dd>
						
						{if location_telephone}<dt>Phone:</dt>
						<dd>{location_telephone}</dd>{/if}
						
						{if location_website}<dt>Website:</dt>
						<dd><a href="http://{location_website}">{location_website}</a></dd>{/if}
						
						<dt>Directions:</dt>
						<dd>
							<div class="button-wrap">
								{if logged_out}
									<a href="{path='signin'}" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
								{if:else}
									<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
								{/if}
							</div>
							<p class="directions-comment">Directions are based on your <a href="{path='settings'}">member profile</a>.</p>
						</dd>
						
					</dl>
					
				</article>
					
				<div id="directions-panel" style="display:none;">
					
					<div id="directions"></div>
					
				</div>
				
			</div>
			
			<div class="sidebar  right">
			
				<header class="bar">Contact Person</header>
				
				{if logged_out}
				
					<p class="button-wrap">
						<a href="{path='signin'}" class="super  small  secondary  button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
					</p>
					
				{/if}
				
				{if logged_in}
				
					<dl>
						<dt>Name:</dt>
						<dd>{location_contact_name}</dd>
						<dt>Phone:</dt>
						<dd>{location_contact_phone}</dd>
						<dt>Email:</dt>
						<dd><a href="mailto:{location_contact_email}" title="{location_contact_email}">{location_contact_email}</a></dd>
					</dl>
					
				{/if}
				
				{if location_type=="profit"}
				
					<header class="bar">Active Deals</header>
					{embed="locations/_detail-deals"}
					
				{if:else}
				
					<header class="bar">Upcoming Events</header>
					{embed="locations/_detail-events"}
					
				{/if}
				
			</div>
			
		</div>
		
		<div id="map-area">
			<div id="canvas"><span id="loading"></span></div>
			<span class="shadow"></span>
		</div>
		
		{exp:user:stats dynamic="no"}
			<input id="map-start" value="{member_address} {member_city}, {member_state} {member_zip} {member_country}" />
		{/exp:user:stats}
		
		<input id="map-end" value="{location_address} {location_city}, {location_state} {location_zip} {location_country}" />
		
	{/exp:channel:entries}

	</div><!-- /body -->
	
{sn_footer}
{sn_scripts}

<script type="text/javascript">
//Spin.js loading indicator

	var opts = {
		lines: 12,
		length: 4,
		width: 2,
		radius: 6,
		color: '#9f9e9b',
		speed: 1.3,
		trail: 70,
		shadow: false
	};
	var target = document.getElementById('loading');
	var spinner = new Spinner(opts).spin(target);
	
// End Spin.js parameters
</script>

{embed="embeds/_signin-modal modal-role="contact"}
{embed="embeds/_signin-modal modal-role="directions"}

{gv_analytics}

</body>
</html>