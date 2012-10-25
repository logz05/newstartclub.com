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
				Hello, <?php echo ucwords(strtolower("{member_first_name}")); ?>
			{/exp:user:stats}
		{/if}
		{if logged_out}
			Live Well Naturally
		{/if}
"}
	{if logged_out}
		<div id="intro-heading" class="clearfix">
			<p class="button-wrap">
				<a href="{path='join'}" class="giant super green button"><span>Get Started &raquo;</span></a>
			</p>
			<h1>Live Well Naturally.</h1>
		</div>
	{if:else}
		{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub"}
		<div class="heading clearfix">
			{exp:user:stats dynamic="off"}
				<h1>Welcome home, <span><?php echo ucwords(strtolower("{member_first_name}")); ?></span></h1>
			{/exp:user:stats}
		</div>
	{/if}
	<div class="grid23 clearfix">
		<div class="main left">
			<section class="section resources">
				<header class="bar" data-icon="d"><a href="{path='resources'}">Featured Resources</a></header>
				{embed="site/featured-resources"}
			</section>
			
			{embed="site/local-events" member_id="{exp:user:stats dynamic="no"}{member_id}{/exp:user:stats}"}
			
			<section class="section news">
				<header class="bar" data-icon="h"><a href="{path='news'}">Latest Updates</a></header>
				<ul class="listing">
					{exp:channel:entries channel="resources|events|services|locations|questions|recipes|deals" limit="5" orderby="date" sort="desc" dynamic="no" show_expired="yes"}
					<li class="entry {channel_short_name}">
						{if channel_short_name == "resources"}<h2 data-icon="d">{/if}
						{if channel_short_name == "services" }<h2 data-icon="a">{/if}
						{if channel_short_name == "events"   }<h2 data-icon="e">{/if}
						{if channel_short_name == "locations"}<h2 data-icon="f">{/if}
						{if channel_short_name == "recipes"  }<h2 data-icon="g">{/if}
						{if channel_short_name == "questions"}<h2 data-icon="i">{/if}
						{if channel_short_name == "deals"    }<h2 data-icon="n">{/if}
							
							{if channel_short_name == "questions"}
								<a href="{path='questions/detail/{url_title}'}">{exp:eehive_hacksaw chars="48" append="&hellip;"}{question_question}{/exp:eehive_hacksaw}</a>
							{if:else}
								<a href="{path='{channel_short_name}/detail/{url_title}'}">{exp:eehive_hacksaw chars="48" append="&hellip;"}{title}{/exp:eehive_hacksaw}</a>
							{/if}
						</h2>
						<div class="date">
							<span class="timeago"><?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?></span>
							<span class="entry-date">{entry_date format="%D, %M %j, %Y	%g:%i%a %T"}</span>
						</div>
					</li>
					{/exp:channel:entries}
				</ul>
			</div>
		</section>

		<div class="right sidebar">
			<section class="section my-health">
				{if logged_out}
					<header class="bar" data-icon="c"><a href="{path='my-health'}">The HealthGauge<sup>&trade;</sup></a></header>
					<a href="{path='my-health/calculator'}">
						<div id="gauge"></div>
					</a>
					<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
					<p class="button-wrap">
						<a href="{path='my-health/calculator'}" class="super small secondary button"><span>Calculate</span></a>
					</p>
				{/if}
				
				{exp:user:stats dynamic="off"}
				{if member_score_total == ""}
					<header class="bar" data-icon="c"><a href="{path='my-health'}">The HealthGauge<sup>&trade;</sup></a></header>
					<a href="{path='my-health/calculator'}">
						<div id="gauge"></div>
					</a>
					<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
					<p class="button-wrap">
						<a href="{path='my-health/calculator'}" class="super small secondary button"><span>Calculate</span></a>
					</p>
				{if:else}
				<header class="bar" data-icon="c"><a href="{path='my-health'}">My Health</a></header>
					<h2 class="my-health">Health Score Results</h2>
					<h3 class="total-score">
						<a href="{path='my-health/results'}">{member_score_total}</a>
					</h3>
					<p class="center"><a href="{path='my-health/calculator'}">Recalculate</a></p>
					<p class="button-wrap center">
						<a href="{path='my-health/results'}" class="super small secondary button"><span>View Recommendations</span></a>
					</p>
				{/if}
				{/exp:user:stats}
			</section>
			
		{if logged_in}
		
			<section class="section deals">
				<header class="bar" data-icon="n"><a href="{path='deals'}">Featured Deal</a></header>
				{exp:channel:entries channel="deals" limit="1" show_future_entries="yes"}
				<a href="{url_title_path='deals/detail'}" class="image">
				{deal_location}
					{exp:ce_img:single src="{location_image}" max_width="180" max_height="125" crop="yes" attributes='alt="{title}" title="{title}"'}
				{/deal_location}
				</a>
				<a class="title" href="{url_title_path='deals/detail'}">{title}</a>
				{/exp:channel:entries}
			</section>
			
			<section class="section members">
				<header class="bar" data-icon="j"><a href="{path='settings'}">My Interests</a></header>
					<ul>
						{exp:user:stats}{categories group_id="14|15"}
							{category_body}<li><a href="{path='resources/{reg1_path}{reg2_path}'}">&raquo; {category_description}</a></li>
							{/category_body}{/categories}
						{/exp:user:stats}
					</ul>
					<p class="button-wrap">
						<a href="{path='settings'}" class="super small secondary button"><span>Update my interests</span></a>
					</p>
			</section>
			<section class="section events">
				<header class="bar" data-icon="e"><a href="{path='events'}">RSVP List</a></header>
				{embed="events/_rsvp-list"}
			</section>
		{/if}
		
		{if logged_out}
			<section class="section deals">
				<header class="bar" data-icon="n"><a href="{path='deals'}">Featured Deal</a></header>
				{exp:channel:entries channel="deals" limit="1" show_future_entries="yes"}
				<a href="{url_title_path='deals/detail'}" class="image">
				{categories show_group="24"}
					{exp:ce_img:single src="{category_image}" max_width="180" max_height="125" crop="yes" attributes='alt="{title}" title="{title}"'}
				{/categories}
				</a>
				<a class="title" href="{url_title_path='deals/detail'}">{title}</a>
				{/exp:channel:entries}
			</section>
			
			<section class="section resources">
				<header class="bar" data-icon="d"><a href="{path='resources'}">Resource Topics</a></header>
				<h2>Health Conditions</h2>
				<ul>
					<?php
						$categories = array(
						{exp:channel:categories channel="resources" style="linear" show_empty="no" category_group="17" backspace="1"}
							'{count}' => '<li><a href="{path=\'resources/health-condition/{category_url_title}\'}">{category_name}</a></li>',
						{/exp:channel:categories}
						);
						for ($i = 1; $i <= 8; $i++) {
							echo $categories[$i] . "\n";
						};
					?>
					<li class="see-more"><a href="{path='resources'}">See more &raquo;</a></li>
				</ul>
				<h2>Living Better</h2>
				<ul>
					<?php
						$categories = array(
						{exp:channel:categories channel="resources" style="linear" show_empty="no" category_group="19" backspace="1"}
							'{count}' => '<li><a href="{path=\'resources/living-better/{category_url_title}\'}">{category_name}</a></li>',
						{/exp:channel:categories}
						);
						for ($i = 1; $i <= 8; $i++) {
							echo $categories[$i] . "\n";
						};
					?>
					<li class="see-more"><a href="{path='resources'}">See more &raquo;</a></li>
				</ul>
				<h2>Recipes</h2>
				<ul>
					<?php
						$categories = array(
						{exp:channel:categories channel="recipes" style="linear" show_empty="no" category_group="39" backspace="1"}
							'{count}' => '<li><a href="{path=\'recipes/type/{category_url_title}\'}">{category_name}</a></li>',
						{/exp:channel:categories}
						);
						for ($i = 1; $i <= 8; $i++) {
							echo $categories[$i] . "\n";
						};
					?>
					<li class="see-more"><a href="{path='resources'}">See more &raquo;</a></li>
				</ul>
			</section>
		{/if}
		
			<section class="section social-links news">
				<header class="bar" data-icon="u">Share</header>
				
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
			</section>
			
			{exp:user:stats dynamic="off"}
			
			<?php

			$zipCode = "{exp:channel:entries channel="locations" search:location_zip="{member_zip}" limit="1"}{location_zip}{/exp:channel:entries}";
			$promoCode = "{exp:channel:entries channel="locations" category="{member_promo_code}" limit="1"}{url_title}{/exp:channel:entries}";

			if ($zipCode) { ?>
			
			{exp:channel:entries channel="locations" search:location_zip="{member_zip}" limit="1"}
				<section class="section locations">
					<header class="bar" data-icon="f"><a href="{path='locations'}">Featured Location</a></header>
					<a href="{url_title_path='locations/detail'}" title="{title}">
						<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
					</a>
					<p><a href="{url_title_path='locations/detail'}" title="{title}">{title}</a></p>
				</section>
			{/exp:channel:entries}
			
		<?php } else if ($promoCode) { ?>
			{exp:channel:entries channel="locations" category="{promo_code}" limit="1"}
				<section class="section locations">
					<header class="bar" data-icon="f"><a href="{path='locations'}">Featured Location</a></header>
					<a href="{url_title_path='locations/detail'}" title="{title}">
						<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
					</a>
					<p><a href="{url_title_path='locations/detail'}" title="{title}">{title}</a></p>
				</section>
			{/exp:channel:entries}
		<?php } ?>
			
		
			{if member_group == "1" || member_group == "6"}
				<section class="section sponsor-admin">
					<header class="bar" data-icon="O"><a href="{path='sponsors'}">Sponsor Admin</a></header>
						<ul>
						{exp:channel:categories show="{member_admin_id}" channel="locations" style="linear"}
						{if sponsor_type == "profit"}
							<li><a href="{path='sponsors/add-deal'}">&raquo; Add Deals</a></li>
							<li><a href="{path='sponsors/edit-deals'}">&raquo; Edit Deals</a></li>
						{if:else}
							<li><a href="{path='sponsors/add-event'}">&raquo; Add Events</a></li>
							<li><a href="{path='sponsors/edit-events'}">&raquo; Edit Events</a></li>
						{/if}
						{/exp:channel:categories}
							<li><a href="{path='sponsors/invite'}">&raquo; Invite Members</a></li>
							<li><a href="{path='sponsors/email-members'}">&raquo; Email Members</a></li>
							<li><a href="{path='sponsors/resources'}">&raquo; Get Resources</a></li>
						</ul>
				</section>
			{/if}
			
			{/exp:user:stats}
		
		</div>
	</div>
{embed="embeds/_doc-bottom" script_add="jquery.orbit-1.3.0|home"}