<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );

?>
{embed="embeds/_doc-top"
	class="home"
	add="orbit-1.3.0"
	meta='<meta name="description" content="Based on the world-famous NEWSTART® principles that have helped millions live well naturally without the use of drugs, the NEWSTART® Lifestyle Club features streaming video, expert health advice, wellness tips, tools and more." />'
	title="
		{if logged_in}
			{exp:user:stats dynamic='off'}
				Hello, <?php echo ucwords(strtolower("{firstName}")); ?>
			{/exp:user:stats}
		{/if}
		{if logged_out}
			Live Well Naturally
		{/if}
"}
	{if logged_out}
		<div id="intro-heading" class="clearfix">
			<p class="button-wrap">
				<a href="/register" class="giant super green button"><span>Get Started &raquo;</span></a>
			</p>
			<h1>Live Well Naturally.</h1>
		</div>
	{if:else}
		{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub"}
		<div class="heading clearfix">
			{exp:user:stats dynamic="off"}
				<h1>Welcome home, <span><?php echo ucwords(strtolower("{firstName}")); ?></span></h1>
			{/exp:user:stats}
		</div>
	{/if}
	<div class="grid23 clearfix">
		<div class="main left">
			<div class="resources">
				<div class="bar" data-icon="d"><a href="/resources">Featured Resources</a></div>
				{embed="site/featured-resources"}
			</div>
			{embed="site/local-events"}
			
			<div class="news">
				<div class="bar" data-icon="h"><a href="/news">Latest Updates</a></div>
				<ul class="listing">
					{exp:weblog:entries weblog="resources|events|partners|locations|questions|recipes|deals" limit="5" orderby="date" sort="desc" dynamic="off" show_expired="yes"}
					<li class="entry {weblog_short_name}">
						{if weblog_short_name == "resources"}<h2 data-icon="d">{/if}
						{if weblog_short_name == "partners" }<h2 data-icon="a">{/if}
						{if weblog_short_name == "events"   }<h2 data-icon="e">{/if}
						{if weblog_short_name == "locations"}<h2 data-icon="f">{/if}
						{if weblog_short_name == "recipes"  }<h2 data-icon="g">{/if}
						{if weblog_short_name == "questions"}<h2 data-icon="i">{/if}
						{if weblog_short_name == "deals"    }<h2 data-icon="n">{/if}
							
							{if weblog_short_name == "deals"}
								<a href="{path='deals/detail/{categories}{category_url_title}{/categories}'}">{exp:char_limit total="48"}{title}{/exp:char_limit}</a>
							{if:elseif weblog_short_name == "questions"}
								<a href="{path='faq/detail/{url_title}'}">{exp:char_limit total="48"}{qa_question}{/exp:char_limit}</a>
							{if:else}
								<a href="{path='{weblog_short_name}/detail/{url_title}'}">{exp:char_limit total="48"}{title}{/exp:char_limit}</a>
							{/if}
						</h2>
						<div class="date">
							<span class="timeago"><?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?></span>
							<span class="entry-date">{entry_date format="%D, %M %j, %Y	%g:%i%a %T"}</span>
						</div>
					</li>
					{/exp:weblog:entries}
				</ul>
			</div>
		</div>

		<div class="right sidebar">
			<div class="my_health">
				{if logged_out}
					<div class="bar"><a href="/my_health">The HealthGauge<sup>&trade;</sup></a></div>
					<a href="/my_health/calculator">
						<div id="gauge"></div>
					</a>
					<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
					<p class="button-wrap">
						<a href="/my_health/calculator" class="super small secondary button"><span>Calculate</span></a>
					</p>
				{/if}
				
				{exp:user:stats dynamic="off"}
				{if memberScoreTotal == ""}
					<div class="bar"><a href="/my_health">The HealthGauge<sup>&trade;</sup></a></div>
					<a href="/my_health/calculator">
						<div id="gauge"></div>
					</a>
					<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
					<p class="button-wrap">
						<a href="/my_health/calculator" class="super small secondary button"><span>Calculate</span></a>
					</p>
				{if:else}
				<div class="bar"><a href="/my_health">My Health</a></div>
					<h2 class="my_health">Health Score Results</h2>
					<h3 class="total-score">
						<a href="/my_health/results">{memberScoreTotal}</a>
					</h3>
					<p class="center"><a href="/my_health/calculator">Recalculate</a></p>
					<p class="button-wrap center">
						<a href="/my_health/results" class="super small secondary button"><span>View Recommendations</span></a>
					</p>
				{/if}
				{/exp:user:stats}
			</div>
		{if logged_in}
			<div class="members">
				<div class="bar" data-icon="j"><a href="/settings">My Interests</a></div>
					<ul>
						{exp:user:stats}{categories group_id="14|15"}
							{category_body}<li><a href="{path='resources/{reg1_path}{reg2_path}'}">&raquo; {category_description}</a></li>
							{/category_body}{/categories}
						{/exp:user:stats}
					</ul>
					<p class="button-wrap">
						<a href="/settings" class="super small secondary button"><span>Update my interests</span></a>
					</p>
			</div>
			<div class="events">
				<div class="bar" data-icon="e"><a href="/events">RSVP List</a></div>
				{embed="events/_rsvp-list"}
			</div>
		{/if}
		
		{if logged_out}
			<div class="resources">
				<div class="bar" data-icon="d"><a href="/resources">Resource Topics</a></div>
				<h2>Health Conditions</h2>
				<ul>
					{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="17"}
						<li><a href="{path='resources/health-conditions/{category_url_title}'}">{category_name}</a></li>
					{/exp:weblog:categories}
					<li class="see-more"><a href="/resources">See more &raquo;</a></li>
				</ul>
				<h2>Living Better</h2>
				<ul>
					{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="19"}
						<li><a href="{path='resources/living-better/{category_url_title}'}">{category_name}</a></li>
					{/exp:weblog:categories}
					<li class="see-more"><a href="/resources">See more &raquo;</a></li>
				</ul>
				<h2>Recipes</h2>
				<ul>
					{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="39"}
						<li><a href="{path='recipes/type/{category_url_title}'}">{category_name}</a></li>
					{/exp:weblog:categories}
					<li class="see-more"><a href="/recipes">See more &raquo;</a></li>
				</ul>
			</div>
		{/if}
		
		{exp:user:stats dynamic="off"}
		
		<?php
		
			$zipCode = "{exp:weblog:entries weblog="locations" search:location_zip="{zipCode}" limit="1"}{location_zip}{/exp:weblog:entries}";
			$promoCode = "{exp:weblog:entries weblog="locations" category="{promo_code}" limit="1"}{url_title}{/exp:weblog:entries}";
			
			if ($zipCode) { ?>
			
			{exp:weblog:entries weblog="locations" search:location_zip="{zipCode}" limit="1"}
				<div class="locations">
					<div class="bar" data-icon="f"><a href="/locations/">Featured Location</a></div>
					<a href="/locations/detail/{url_title}" title="{title}">
						<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
					</a>
					<p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
				</div>
			{/exp:weblog:entries}
			
		<?php } else if ($promoCode) { ?>
			{exp:weblog:entries weblog="locations" category="{promo_code}" limit="1"}
				<div class="locations">
					<div class="bar" data-icon="f"><a href="/locations/">Featured Location</a></div>
					<a href="/locations/detail/{url_title}" title="{title}">
						<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
					</a>
					<p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
				</div>
			{/exp:weblog:entries}
		<?php } ?>
		
		{if member_group == "1" || member_group == "13"}
			<div class="sponsor-admin">
				<div class="bar" data-icon="O"><a href="/sponsors">Sponsor Admin</a></div>
					<ul>
					{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}
					{if sponsor_type == "profit"}
						<li><a href="/sponsors/add-deal">&raquo; Add Deals</a></li>
						<li><a href="/sponsors/edit-deals">&raquo; Edit Deals</a></li>
					{if:else}
						<li><a href="/sponsors/add-event">&raquo; Add Event</a></li>
						<li><a href="/sponsors/edit-event">&raquo; Edit Events</a></li>
					{/if}
					{/exp:weblog:categories}
						<li><a href="/sponsors/invite">&raquo; Invite Members</a></li>
						<li><a href="/sponsors/email-members">&raquo; Email Members</a></li>
						<li><a href="/sponsors/resources">&raquo; Get Resources</a></li>
					</ul>
			</div>
		{/if}
		
		{/exp:user:stats}
		
		<div class="social-links news">
			<div class="bar" data-icon="u">Share</div>
			
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like" data-href="http://www.facebook.com/newstart" data-send="true" data-layout="button_count" data-width="190" data-show-faces="false" data-font="lucida grande"></div>
			
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.facebook.com/newstart" data-via="newstartweimar">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			
			<div class="g-plus-button">
				<!-- Place this tag where you want the +1 button to render. -->
				<div class="g-plusone" data-size="medium" data-href="http://newstartclub.com"></div>
				
				<!-- Place this tag after the last +1 button tag. -->
				<script type="text/javascript">
					(function() {
						var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						po.src = 'https://apis.google.com/js/plusone.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					})();
				</script>
			</div>
			<div class="pin-it">
				<a href="http://pinterest.com/pin/create/button/?url=http://newstartclub.com&media=http://newstartclub.com/assets/css/images/header.png" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
				<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
			</div>
		</div>
		
		</div>
	</div>
{embed="embeds/_doc-bottom" script_add="jquery.orbit-1.3.0|home"}