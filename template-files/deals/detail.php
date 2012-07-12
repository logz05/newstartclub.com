{embed="embeds/_doc-top" 
	class="deals"
	map="yes"
	title="
		{exp:weblog:entries weblog="locations" require_entry="yes" limit="1"}
			{title} Deals
		{/exp:weblog:entries}
	"
	microdata="organization"
	meta='
		{exp:weblog:entries weblog="locations" url_title="{segment_3}"}
			<meta property="og:title" content="{title}"/>
			<meta property="og:site_name" content="{site_name}"/>
			<meta property="og:url" content="{title_permalink='deals/detail'}"/>
			<meta property="og:type" content="company"/>
			<meta property="og:image" content="{location_image}"/>
			<meta property="og:description" content="{exp:trunchtml chars="200"}{exp:html_strip}{location_description}{/exp:html_strip}{/exp:trunchtml}"/>
			<meta name="description" content="{exp:trunchtml chars="200"}{exp:html_strip}{location_description}{/exp:html_strip}{/exp:trunchtml}"/>
		{/exp:weblog:entries}
	'
}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/deals">Deals</a></li>
</ul>
{exp:weblog:entries weblog="locations" require_entry="yes" limit="1"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1 itemprop="name">{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{location_slogan}"}{location_slogan}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			<div class="clearfix">
				{exp:ce_img:single src="{location_image}" max_width="200" attributes='alt="{title}" title="{location_slogan}" class="image" itemprop="image"'}
				<span itemprop="description">{location_description}</span>
			</div>
		</div>
		{/exp:weblog:entries}
		<div class="bar" data-icon="n">Active Deals</div>
		<ul class="listing">
		{exp:weblog:entries weblog="deals" category="{segment_3_category_id}" dynamic="off" orderby="expiration_date|entry_date" sort="asc|asc"}
			{if no_results}
				<div class="post">
					<p><em>No active deals.</em></p>
				</div>
			{/if}
			<li class="deal dependant clearfix">
				<div class="details" data-icon="n">
					<h2>{title}{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
					{deal_instructions}
					<p class="expires">{if expiration_date}Expires: {expiration_date format="%m/%d/%y"}{/if}</p>
					{if logged_out}
						<a class="show-code" href="/signin" data-reveal-id="signin-modal-coupon"><span data-icon="p">Show coupon code</span></span></a>
					{if:else}
						<a class="show-code" href="{url_title_path='deals/coupon'}" target="_blank"><span data-icon="p">Show coupon code</span></a>
					{/if}
				</div>
			</li>
		{/exp:weblog:entries}
		</ul>
		{exp:weblog:entries weblog="locations" require_entry="yes" limit="1"}
		<div class="post">
			<dl>
				<dt>Location:</dt>
				<dd itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					<p><a href="{url_title_path='locations/detail'}">{title}</a><br />
						<span itemprop="streetAddress">{location_address}</span><br />
						<span itemprop="addressLocality">{location_city}</span>, <span itemprop="addressRegion">{location_state}</span> <span itemprop="postalCode">{location_zip}</span>
					</p>
					{if location_phone || location_website}
					<p>{if location_telephone}<span itemprop="telephone">{location_telephone}</span><br>{/if}{if location_website}<span itemprop="url">{location_website}</span>{/if}</p>
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
			
		</div><!--/.post-->
	</div>
	<div class="sidebar right">
		{embed="embeds/_share" channel="locations" image="{location_image}"}
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
{exp:weblog:entries weblog="locations" limit="1" require_entry="yes" limit="1" url_title="{segment_3}"}
<input id="map-end" value="{location_address} {location_city}, {location_state} {location_zip}" />{/exp:weblog:entries}
{exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
{embed="embeds/_doc-bottom" sim="coupon|directions"}