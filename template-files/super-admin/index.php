<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');

class Interest
{
	public $path = '';
	public $category_name = '';
	public $total = 0;
	
	public function __construct($path, $category_name, $total)
	{
		$this->path = $path;
		$this->category_name = $category_name;
		$this->total = $total;
	}
	
	public static function compare(&$interest1, &$interest2)
	{
		if ($interest1->total > $interest2->total)
		{
			return 1;
		}
		elseif ($interest1->total < $interest2->total)
		{
			return -1;
		}
		
		return 0;
	}
}

function membersJoined($day)
{
	$db = new DBconnect();
	
	if (!isset($day)) {
		$query = 'SELECT * FROM exp_members WHERE join_date > '. (strtotime("today") + 25200);
	} elseif ($day == 1) {
		$query = 'SELECT * FROM exp_members WHERE join_date > '. (strtotime("today -1 day") + 25200) .' AND join_date < '. (strtotime("today") + 25200);
	} else {
		$dayBegin = (strtotime("today -$day days") + 25200);
		$dayMinus = $day - 1;
		$dayEnd = (strtotime("today -$dayMinus days") + 25200);
		$query = 'SELECT * FROM exp_members WHERE join_date > '. $dayBegin .' AND join_date < '. $dayEnd;
	}
	
	$members = $db->fetch($query);
	$membersCount = count($members);
	
	print $membersCount;
}

function memberAges($rangeLow, $rangeHigh)
{
	$db = new DBconnect();
	
	$query = 'SELECT * FROM exp_member_data WHERE m_field_id_13 <= '. $rangeHigh .' AND m_field_id_13 >= '. $rangeLow;
	$queryTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 != ""';
	
	$members = $db->fetch($query);
	$count = count($members);
	
	$membersTotal = $db->fetch($queryTotal);
	$total = count($membersTotal);
	
	$percent = ($count / $total)*100;

	print '<li>
				<a href="#" title="'. $rangeLow .'-'. $rangeHigh .': '. $count .'">
					<span class="label">'. $rangeLow .'-'. $rangeHigh .'</span>
					<span class="count" style="width: '. $percent .'%">('. $count .')</span>
				</a>
			</li>';
}

?>

{embed="includes/_doc-top" 
	title="{section}"
	section="{section}"
	channel="{channel}"
}
{assign_variable:channel="super-admin"}
{assign_variable:section="Super Admin"}
<div class="body">
<div class="heading clearafter">
	<h1>{section}</h1>
</div>
<div class="grid23 clearafter">
	<div class="single left">
	
		<iframe width="490px" height="300px" scrolling="no" src="{path='{channel}/member-map'}"></iframe>
		<p>Map last updated on June 28<sup>th</sup>, 2011</p>
	
		<h2><strong>Member Statistics</strong></h2>
		<p>
			{exp:query sql="SELECT COUNT(*) AS total FROM exp_members WHERE group_id = '9'"}
				Total Lifestyle Club Members: <strong>{total}</strong><br />
			{/exp:query}
		</p>
		
		<ul>
			<li><?php echo date('M d', strtotime("today")) ?><sup><?php echo date('S', strtotime("today")) ?></sup> <strong><?php membersJoined() ?></strong></li>
			<li><?php echo date('M d', strtotime("today -1 day")) ?><sup><?php echo date('S', strtotime("today -1 day")) ?></sup> <strong><?php membersJoined(1) ?></strong></li>
			<li><?php echo date('M d', strtotime("today -2 days")) ?><sup><?php echo date('S', strtotime("today -2 days")) ?></sup> <strong><?php membersJoined(2) ?></strong></li>
			<li><?php echo date('M d', strtotime("today -3 days")) ?><sup><?php echo date('S', strtotime("today -3 days")) ?></sup> <strong><?php membersJoined(3) ?></strong></li>
			<li><?php echo date('M d', strtotime("today -4 days")) ?><sup><?php echo date('S', strtotime("today -4 days")) ?></sup> <strong><?php membersJoined(4) ?></strong></li>
			<li><?php echo date('M d', strtotime("today -5 days")) ?><sup><?php echo date('S', strtotime("today -5 days")) ?></sup> <strong><?php membersJoined(5) ?></strong></li>
			<li><?php echo date('M d', strtotime("today -6 days")) ?><sup><?php echo date('S', strtotime("today -6 days")) ?></sup> <strong><?php membersJoined(6) ?></strong></li>
		</ul>
		
		<p><strong>Age Ranges</strong></p>
		<ul class="timeline clearafter">
			<?php memberAges(13, 20) ?>
			<?php memberAges(21, 30) ?>
			<?php memberAges(31, 40) ?>
			<?php memberAges(41, 50) ?>
			<?php memberAges(51, 60) ?>
			<?php memberAges(61, 70) ?>
			<?php memberAges(71, 80) ?>
			<?php memberAges(81, 90) ?>
			<?php memberAges(91, 100) ?>
		</ul>
	
		<h2><strong>Locations - {exp:query sql="SELECT COUNT(*) AS total FROM exp_weblog_titles WHERE exp_weblog_titles.weblog_id = 31"}{total}{/exp:query}</strong></h2>
		<p>
			{exp:weblog:entries weblog="locations" sort="asc"}
				{exp:query
					sql="
						SELECT count(member_id) AS total FROM (
							SELECT exp_member_data.member_id AS member_id
								FROM exp_member_data
							
										INNER JOIN exp_category_posts
										ON exp_category_posts.cat_id = exp_member_data.m_field_id_26
							
									WHERE exp_category_posts.cat_id = {categories}{category_id}{/categories}
							
								UNION DISTINCT
							
									SELECT member_relations.member_id AS member_id
									FROM member_relations
							
											LEFT JOIN exp_category_posts
											ON exp_category_posts.entry_id = member_relations.related_id
							
										WHERE exp_category_posts.cat_id = {categories}{category_id}{/categories}
							
								UNION DISTINCT
							
									SELECT member_id
									FROM exp_member_data
										WHERE m_field_id_26 = {categories}{category_id}{/categories}
							
								UNION DISTINCT
							
									SELECT member_id
									FROM exp_member_data
										WHERE m_field_id_7 = {sponsor_zip}
						) a" limit="1"}
				<strong>{categories}{category_id}{/categories}</strong> - <a href="{url_title_path='locations/detail'}">{title}</a> (&nbsp;{total}&nbsp;)<br />
				{/exp:query}
			{/exp:weblog:entries}
		</p>
		
		<h2><strong>Events</strong></h2>
		<p><strong>Expired Events with RSVPs</strong><br />
		
			{exp:query sql="
				SELECT DISTINCT member_relations.related_id, exp_weblog_titles.title
					FROM member_relations, exp_weblog_titles
					WHERE exp_weblog_titles.expiration_date < {current_time}
					AND member_relations.related_id = exp_weblog_titles.entry_id"}{!--">--}{related_id} - {title}<br />
			{/exp:query}
		</p>
		<p><strong>Future Events</strong><br />
		{exp:weblog:entries weblog="events" show_expired="no"}
				{entry_id} - <a href="{url_title_path='events/detail'}">{title}</a>
			{exp:query sql="
				SELECT count(*) AS total
					FROM member_relations
					WHERE member_relations.related_id = {entry_id} ORDER BY related_id asc"}
					(&nbsp;{total}&nbsp;)<br />
			{/exp:query}
		{/exp:weblog:entries}
		</p>
		
		<h2><strong>Comments - {exp:comment:entries weblog="resources|questions" sort="desc" limit="1" dynamic="off"}{total_comments}{/exp:comment:entries}</strong></h2>
		
		{exp:comment:entries weblog="resources|questions" sort="desc" limit="20" dynamic="off"}
		<p><a href="{path='{comment_auto_path}/{url_title}'}#c_{comment_id}">{title}</a> <br />by {firstName} {lastName} on {comment_date format="%M %j, %Y, %g:%i %A %T"}</p>
		{/exp:comment:entries}
		
		<h2><strong>Pages Shared on Facebook</strong></h2>
		
		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<fb:recommendations site="www.newstartclub.com" width="480" height="500" header="true"></fb:recommendations>
		
	</div><!--/.single-->
	<div class="sidebar right">
		<div class="bar">{section}</div>
		<h2>Interests</h2>
			<ul><?php $interests = array(); ?>
			{exp:weblog:categories weblog="sponsors" style="linear" category_group="14|15"}
				{exp:query 
				sql="SELECT COUNT(*) AS total
						FROM exp_members
							INNER JOIN exp_user_category_posts
							ON exp_members.member_id = exp_user_category_posts.member_id
							
							INNER JOIN exp_member_data
							ON exp_members.member_id = exp_member_data.member_id
							
						WHERE exp_user_category_posts.cat_id = {category_id}"}
					<?php if ("{total}" == "0") {  } else { $interests[] = new Interest("", "{category_name}", "{total}"); } ?>
				{/exp:query}
			{/exp:weblog:categories}
			
			<?php
			usort($interests, "Interest::compare");
			for ($i = (count($interests) - 1); $i > -1; $i--)
			{
				$interest =& $interests[$i];
				print "\t\t\t\t".'<li>'.$interest->category_name.' (&nbsp;'.$interest->total.'&nbsp;)</li>'."\n";
			}
			?>

			</ul>
			<h2>More Info</h2>
			<ul><?php $more_info = array(); ?>
			{exp:weblog:categories weblog="sponsors" style="linear" category_group="16"}
				{exp:query 
					sql="SELECT COUNT(*) AS total
					FROM exp_members, exp_user_category_posts, exp_member_data 
					WHERE exp_members.member_id = exp_user_category_posts.member_id 
					AND exp_members.member_id = exp_member_data.member_id 
					AND exp_user_category_posts.cat_id = {category_id} 
					ORDER BY total ASC"}
					<?php if ("{total}" == "0") {  } else { $more_info[] = new Interest("", "{category_name}", "{total}"); } ?>
				{/exp:query}
			{/exp:weblog:categories}
			
			<?php
			usort($more_info, "Interest::compare");
			for ($i = (count($more_info) - 1); $i > -1; $i--)
			{
				$interest =& $more_info[$i];
				print "\t\t\t\t".'<li>'.$interest->category_name.' (&nbsp;'.$interest->total.'&nbsp;)</li>'."\n";
			}
			?>

			</ul>
			
			<h2>Top 10 Zip Codes</h2>
			<ul>
				{exp:query sql="
					SELECT m_field_id_7,COUNT(*) as total 
						FROM exp_member_data 
						
						WHERE m_field_id_7 != '' 
						AND m_field_id_7 != '00000'
						
					GROUP BY m_field_id_7 
					ORDER BY total DESC
					
					LIMIT 10 
				" limit="10"}
					<li><a href="http://www.google.com/search?q={m_field_id_7}" title="Google search {m_field_id_7}">{m_field_id_7}</a> (&nbsp;{total}&nbsp;)</li>
				{/exp:query}
			</ul>
			
			<h2>Site Time</h2>
				<ul>
					<li>{current_time format="%D, %M %j, %Y  %g:%i%a %T"}</li>
				</ul>
				
			<h2>Server Time</h2>
				<ul>
					<li><?php echo time() ?></li>
				</ul>
				
			<h2>Local Time</h2>
				<ul>
					<li>Now {current_time}</li>
				</ul>
	</div><!--/.sidebar-->
</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}