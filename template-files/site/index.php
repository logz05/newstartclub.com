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
				<div class="bar">
					<a href="/resources">Featured Resources</a><i>3</i>
				</div>
				{embed="site/featured-resources"}
			</div>
			{embed="site/local-events"}
			
			<div class="news">
				<div class="bar"><a href="/news">Latest Updates</a><i>8</i></div>
				<ul id="listing">
					{exp:weblog:entries weblog="resources|events|partners|locations|questions|recipes" limit="5" orderby="date" sort="desc" dynamic="off" show_expired="yes"}
					<li class="entry {weblog_short_name}">
						<h2>
							{if weblog_short_name == "resources"}<i>3</i>{/if}
							{if weblog_short_name == "partners"}<i>4</i>{/if}
							{if weblog_short_name == "events"}<i>5</i>{/if}
							{if weblog_short_name == "locations"}<i>6</i>{/if}
							{if weblog_short_name == "recipes"}<i>7</i>{/if}
							{if weblog_short_name == "questions"}<i>9</i>{/if}
							<a href="/{weblog_short_name}/detail/{url_title}">
								{if weblog_short_name == 'questions'}
									{exp:char_limit total="35"}{qa_question}{/exp:char_limit}
								{if:else}
									{exp:char_limit total="35"}{title}{/exp:char_limit}
								{/if}
							</a>
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
				<div class="bar"><a href="/settings">My Interests</a><i>0</i></div>
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
				<div class="bar"><a href="/events">RSVP List</a><i>5</i></div>
				{embed="events/_rsvp-list"}
			</div>
		{/if}
		
		{if logged_out}
			<div class="resources">
				<div class="bar"><a href="/resources">Resource Topics</a><i>3</i></div>
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
					<div class="bar"><a href="/locations/">Featured Location</a><i>6</i></div>
					<a href="/locations/detail/{url_title}" title="{title}">
						<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
					</a>
					<p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
				</div>
			{/exp:weblog:entries}
			
		<?php } else if ($promoCode) { ?>
			{exp:weblog:entries weblog="locations" category="{promo_code}" limit="1"}
				<div class="locations">
					<div class="bar"><a href="/locations/">Featured Location</a><i>6</i></div>
					<a href="/locations/detail/{url_title}" title="{title}">
						<div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
					</a>
					<p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
				</div>
			{/exp:weblog:entries}
		<?php } ?>
		
		{/exp:user:stats}
		
		{if member_group == "1" || member_group == "13"}
			<div class="sponsor-admin">
				<div class="bar"><a href="/sponsors">Sponsor Admin</a></div>
					<ul>
						<li><a href="/sponsors/add-event">&raquo; Add Event</a></li>
						<li><a href="/sponsors/edit-event">&raquo; Edit Events</a></li>
						<li><a href="/sponsors/invite">&raquo; Invite Members</a></li>
						<li><a href="/sponsors/email-members">&raquo; Email Members</a></li>
						<li><a href="/sponsors/resources">&raquo; Get Resources</a></li>
					</ul>
			</div>
		{/if}
		
		<div class="social-links news">
			<div class="bar">Share<i>8</i></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.facebook.com/newstart" data-via="newstartweimar">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like" data-href="http://www.facebook.com/newstart" data-send="false" data-layout="button_count" data-width="190" data-show-faces="false" data-font="lucida grande"></div>
			<div class="fb-send" data-font="lucida grande"></div>
		</div>
		
		</div>
	</div>
{embed="embeds/_doc-bottom" script_add="jquery.orbit-1.3.0|home"}