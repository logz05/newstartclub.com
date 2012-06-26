<?php 

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('dbconnect.php');

$db = new DBconnect();

global $SESS;
$member = $SESS->userdata['member_id'];

$zipSql = 'SELECT m_field_id_7 FROM exp_member_data WHERE member_id = "'.$member.'"';
$results = $db->fetch($zipSql);
$zip = $results['0']['0'];


$sponsID = 'SELECT m_field_id_26 FROM exp_member_data WHERE member_id = "'.$member.'"';
$sponsResults = $db->fetch($sponsID);
$promo = $sponsResults['0']['0'];

$zipResults = 'SELECT title, field_id_340, entry_date FROM exp_weblog_titles
 INNER JOIN exp_weblog_data
 ON exp_weblog_titles.entry_id = exp_weblog_data.entry_id
 
WHERE expiration_date > UNIX_TIMESTAMP()
AND field_id_340 = "'.$zip.'"';

$results = $db->fetch($zipResults);

$zipEntries = count($results);


$sponsQuery = 'SELECT DISTINCT title, field_id_340, entry_date, cat_id, exp_weblog_titles.entry_id FROM exp_weblog_titles
 INNER JOIN exp_weblog_data
 ON exp_weblog_titles.entry_id = exp_weblog_data.entry_id
 
 INNER JOIN exp_category_posts
 ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
 
WHERE expiration_date > UNIX_TIMESTAMP()
AND cat_id = '.$promo.'';

$results = $db->fetch($sponsQuery);

$sponsEntries = count($results);
?>


<div class="events">
				<div class="bar"><a href="/events">Upcoming Events</a><i>5</i></div>
				<ul>
				<?php
				
				if($zipEntries > 0){
				 
					echo '{exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" search:event_zip="'.$zip.'" show_future_entries="yes" limit="2"}';
				
				} elseif($sponsEntries > 0){
					echo '{exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" category="'.$promo.'" show_future_entries="yes" limit="2"}';
				} else {
					echo '{exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" show_future_entries="yes" limit="2"}';
				}
				?>
				

					<li class="event" id="{exp:nice_date date='{event_start_date}' format='%Y-%m-%d'}">
						{assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
						{assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
						<h2>
							<a href="{url_title_path='events/detail'}">{title}</a>
							<div class="date">
								<span class="day">{exp:nice_date date="{event_start_date}" format="%d"}</span>
								<span class="month">{exp:nice_date date="{event_start_date}" format="%M"}</span>
								<span class="year">{exp:nice_date date="{event_start_date}" format="%Y"}</span>
								<span class="time">
									{!-- Check if event is only on one date and time is set --}
									{if event_start_date == event_end_date && event_start_time !=""}
										{exp:nice_date date="{event_start_time}" format="%g:%i %a"} - {exp:nice_date date="{event_end_time}" format="%g:%i %a"}
									{/if}
									
									{!-- Check if event is only on one date and time is NOT set --}
									{if event_start_date == event_end_date && event_start_time == ""}
										All Day
									{/if}
									
									{!-- Check to see if repeating event --}
									{if (event_start_date != event_end_date)}
										{exp:nice_date date="{event_start_date}" format="%M %j"} - {exp:nice_date date="{event_end_date}" format="%M %j"}
									{/if}
								</span>
							</div>
						</h2>
						<h3><a href="/events/locations/{event_state}/{event_city}">{event_city}, {event_state}</a></h3>
						<p class="details">
							{exp:trunchtml chars="150" threshold="150" inline="&hellip; <a class='link-more' href='{url_title_path='events/detail'}'>more&raquo;</a>"}
								{exp:html_strip}{exp:textile}{event_description}{/exp:textile}{/exp:html_strip}
							{/exp:trunchtml}
						</p>
					</li>
				{/exp:weblog:entries}
				</ul>
			</div>
			