{embed="embeds/_doc-top" 
	class="deals"
	map="yes"
	title="
		{exp:weblog:entries weblog="deals" require_entry="yes" limit="1"}
			{title}
		{/exp:weblog:entries}
"}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/deals">Deals</a></li>
</ul>
{exp:weblog:entries weblog="deals" require_entry="yes" limit="1"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1 id="event-title">{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div id="entry" class="deal">
			<div class="clearfix">
				{exp:ce_img:single src="{deal_image}" max_width="200" attributes='alt="{title}" title="{title}" class="image"'}
				{deal_description}
			</div>
			<div class="coupon">
				<div class="code">{deal_code}</div>
				{deal_instructions}
				{deal_terms}
				<div class="valid">Valid from {deal_begins format="%M %d, %Y"}{if deal_expires} to {deal_expires format="%M %d, %Y"}{/if}</div>
			</div>
			<dl>
				<dt>Sponsored by:</dt>
				<dd>
					{categories show_group="24"}
						<a href="{site_url}locations/detail/{category_url_title}/" title="{cateogry_name}">{category_name}</a>
					{/categories}
				</dd>
				<dt>Location:</dt>
				<dd>
					<p>{if deal_location_name}{deal_location_name}<br />{/if}
						{deal_address}<br />
						{deal_city}, {deal_state} {deal_zip}
					</p>
					{if deal_phone || deal_website}
					<p>{if deal_phone}{deal_phone}<br>{/if}{if deal_website}{deal_website}{/if}</p>
					{/if}
				</dd>
			</dl>
			<div class="button-wrap clearfix">
				{if logged_out}
					<a href="/signin" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
				{if:else}
					<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
				{/if}
			</div>
			<p>Directions are based on your <a href="/settings">member profile</a>.</p>
			
		</div><!--/#entry-->
		
	</div>
	<div class="sidebar right">
		{embed="embeds/_share" channel="deals"}
	</div>
</div>
{/exp:weblog:entries}
<div id="map-area">
	<div id="canvas"><span id="loading"></span></div>
	<span class="shadow"></span>
</div>
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
<div id="directions"></div>
{exp:weblog:entries weblog="deals" limit="1" require_entry="yes" limit="1" url_title="{segment_3}"}
<input id="map-end" value="{deal_address} {deal_city}, {deal_state} {deal_zip}" />{/exp:weblog:entries}
{exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
{embed="embeds/_doc-bottom" sim="directions"}