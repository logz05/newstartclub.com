{exp:channel:entries channel="deals" show_future_entries="yes" show_expired="yes" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}

{embed="embeds/_doc-top" 
	class="deals"
	map="yes"
	title="{title}"
	microdata="offer"
	meta='
			<meta property="og:title" content="{title}"/>
			<meta property="og:url" content="{title_permalink='deals/detail'}"/>
			<meta property="og:type" content="article"/>
			<meta property="og:image" content="{deal_location}{location_image}{/deal_location}"/>
			<meta property="og:description" content="{exp:eehive_hacksaw chars="200" append="&hellip;"}{deal_instructions}{/exp:eehive_hacksaw}"/>
			<meta name="description" content="{exp:eehive_hacksaw chars="200" append="&hellip;"}{deal_instructions}{/exp:eehive_hacksaw}"/>
	'
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='deals'}">Deals</a></li>
</ul>

<div class="heading">
	<h1 itemprop="name">{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
	<h2>Valid from {entry_date format="%F %j%S, %Y"}{if expiration_date} to {expiration_date format="%F %j%S, %Y"}{/if} at {categories show_group="24"}<a href="/locations/detail/{category_url_title}">{category_name}</a>{/categories}</h2>
</div>

<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			{if expiration_date < current_time }
				<div class="alert-box warning">
					<i class="i"></i><p>This deal has expired. <a href="{path='deals'}">View active deals</a></p>
				</div>
			{/if}
			{deal_location}
			<figure class="figure  figure--main  right">
				{exp:ce_img:single src="{location_image}" max_width="200" attributes='alt="{title}" itemprop="image"'}
			</figure>
			
			<div class="deal__description" itemprop="description">{location_description}</div>
			{/deal_location}
			
			<dl class="post-details">
				<dt>Offer:</dt>
				<dd class="deal-instructions">{deal_instructions}</dd>
			</dl>
			
			{if expiration_date > current_time }
				{if logged_out}
					<a class="show-coupon" href="{path='signin'}" data-reveal-id="signin-modal-coupon"><span data-icon="p">Show coupon code</span></a>
				{if:else}
					<a class="show-coupon" href="{url_title_path='deals/detail'}" data-reveal-id="modal-coupon-{entry_id}"><span data-icon="p">Show coupon code</span></a>
				{/if}
			{/if}
			<dl>
				<dt>Location:</dt>
				{deal_location}
				<dd itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					<p><a href="{url_title_path='locations/detail'}">{title}</a><br />
						<span itemprop="streetAddress">{location_address}</span><br />
						<span itemprop="addressLocality">{location_city}</span>, <span itemprop="addressRegion">{location_state}</span> <span itemprop="postalCode">{location_zip}</span>
					</p>
					{if location_phone || location_website}
					<p>{if location_telephone}<span itemprop="telephone">{location_telephone}</span><br>{/if}{if location_website}<span itemprop="url">{location_website}</span>{/if}</p>
					{/if}
				</dd>
				{/deal_location}
			</dl>
			<div class="button-wrap clearfix">
				{if logged_out}
					<a href="/signin" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
				{if:else}
					<a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
				{/if}
			</div>
			<p class="directions-comment">Directions are based on your <a href="/settings">member profile</a>.</p>
		</div>
	</div>
	<div class="sidebar right">
		{embed="deals/_more-deals" entry_id="{entry_id}" cat_id="{categories show_group='24'}{category_id}{/categories}"}
		{embed="embeds/_share" channel="deals" image="{deal_location}{deal_location:location_image}{/deal_location}"}
	</div>
</div>
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
{deal_location}
<input id="map-end" value="{location_address} {location_city}, {location_state} {location_zip}" />{/deal_location}
{/exp:channel:entries}
{exp:user:stats dynamic="no"}<input id="map-start" value="{member_address} {member_city}, {member_state} {member_zip}" />{/exp:user:stats}
{embed="embeds/_doc-bottom"
	sim="coupon|directions"
	show-coupons='{exp:channel:entries channel="deals" show_future_entries="yes"}{entry_id}{/exp:channel:entries}'
}