<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');

class Chart {
	
	function bar($data, $options = null) {
		
		if(!isset($options['percentage'])) {
			$options['percentage'] = false;
		}
		
		$bar = 
			'<dt style="left:%1$s%%; width: %5$s%%;">%4$s</dt>' .
			'<dd style="left:%1$s%%; width: %5$s%%; height:%3$s%%;">%2$s</dd>';
		
		$wrap = '<dl class=chart>%s</dl>';
		
		$output = '';
		$max = max($data);
		if($options['percentage'] && $max > 100) {
			trigger_error("The maximum value for a percentage based chart is 100.");
		}
				
		$i = 0;
		$total = count($data);
		
		foreach($data as $key => $val) {
			$spacing = $total / ($total ^ 2);
			$left = $spacing + ((100 / $total) * $i);
			$height = $options['percentage'] ? $val : (($val / $max) * 100);
			$width = (100 / $total) - ($spacing * 2);
			$output .= sprintf($bar, $left, $val, $height, $key, $width);
			$i ++;
		}
		return sprintf($wrap, $output);
	}
	
	
}

function membership($days)
{
	$db = new DBconnect();
	
	$history = array();
	
	for($i = $days; $i >= 0; $i--) {
		
		$dayMinus = $i - 1;
		
		if($i == 0){
			$microDayBegin = (strtotime("today") + 25200);
		} elseif($i == 1) {
			$microDayBegin = (strtotime("today -$i day") + 25200);
		} else {
			$microDayBegin = (strtotime("today -$i days") + 25200);
		}
		
		$microDayEnd = (strtotime("today -$dayMinus days") + 25200);
		$date = date('M d', strtotime("today -$i days"));
		
		$query = 'SELECT member_id FROM exp_members WHERE join_date > '. $microDayBegin .' AND join_date < '. $microDayEnd;
		$queryTotal = count($db->fetch($query));
		
		$history[$date] = $queryTotal;
	
	}
	
/*	 return($history); */
	foreach($history as $key => $value) {
		echo "['$key',$value],\n";
	}
	
}

function membershipTable($days)
{
	$db = new DBconnect();
	
	$history = array();
	
	for($i = 0; $i <= $days; $i++) {
		
		$dayMinus = $i - 1;
		
		if($i == 0){
			$microDayBegin = (strtotime("today") + 25200);
		} elseif($i == 1) {
			$microDayBegin = (strtotime("today -$i day") + 25200);
		} else {
			$microDayBegin = (strtotime("today -$i days") + 25200);
		}
		
		$microDayEnd = (strtotime("today -$dayMinus days") + 25200);
		$date = date('D M d, Y', strtotime("today -$i days"));
		
		$query = 'SELECT member_id FROM exp_members WHERE join_date > '. $microDayBegin .' AND join_date < '. $microDayEnd;
		$queryTotal = count($db->fetch($query));
		
		$history[$date] = $queryTotal;
	
	}
	
/*	 return($history); */
	foreach($history as $key => $value) {
		echo "<tr>
						<td>$key</td>
						<td class='total'>$value</td>
					</tr>";
	}
	
}

function commentHistory($days)
{
	$db = new DBconnect();
	
	$history = array();
	
	for($i = $days; $i >= 0; $i--) {
		
		$dayMinus = $i - 1;
		
		if($i == 0){
			$microDayBegin = (strtotime("today") + 25200);
		} elseif($i == 1) {
			$microDayBegin = (strtotime("today -$i day") + 25200);
		} else {
			$microDayBegin = (strtotime("today -$i days") + 25200);
		}
		
		$microDayEnd = (strtotime("today -$dayMinus days") + 25200);
		$date = date('M d', strtotime("today -$i days"));
		
		$query = 'SELECT comment_id FROM exp_comments WHERE comment_date > '. $microDayBegin .' AND comment_date < '. $microDayEnd;
		$queryTotal = count($db->fetch($query));
		
		$history[$date] = $queryTotal;
	
	}
	
/*	 return($history); */
	foreach($history as $key => $value) {
		echo "['$key',$value],\n";
	}
	
}

function commentsHistoryTable($days)
{
	$db = new DBconnect();
	
	$history = array();
	
	for($i = 0; $i <= $days; $i++) {
		
		$dayMinus = $i - 1;
		
		if($i == 0){
			$microDayBegin = (strtotime("today") + 25200);
		} elseif($i == 1) {
			$microDayBegin = (strtotime("today -$i day") + 25200);
		} else {
			$microDayBegin = (strtotime("today -$i days") + 25200);
		}
		
		$microDayEnd = (strtotime("today -$dayMinus days") + 25200);
		$date = date('D M d, Y', strtotime("today -$i days"));
		
		$query = 'SELECT comment_id AS total FROM exp_comments WHERE comment_date > '. $microDayBegin .' AND comment_date < '. $microDayEnd;
		$queryTotal = count($db->fetch($query));
		
		$history[$date] = $queryTotal;
	
	}
	
	foreach($history as $key => $value) {
		echo "<tr>
						<td>$key</td>
						<td class='total'>$value</td>
					</tr>";
	}
	
}

function member_ages($rangeLow, $rangeHigh)
{
	$db = new DBconnect();
	
	$query = 'SELECT * FROM exp_member_data WHERE m_field_id_13 <= '. $rangeHigh .' AND m_field_id_13 >= '. $rangeLow;
	$queryTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 != ""';
	
	$members = $db->fetch($query);
	$count = count($members);
	
	$membersTotal = $db->fetch($queryTotal);
	$total = count($membersTotal);
	
	$percent = ($count / $total)*100;

	print "['$rangeLow-$rangeHigh', $count]";
}




?>

{embed="embeds/_doc-top" 
	class="stats"
	title="Site Statistics"
}
<div class="heading">
	<h1 data-icon="w">Site Statistics</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<span id="total-members">
			{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_members WHERE group_id = '5' OR group_id = '6'"}
				{total} Total Members
			{/exp:query}
		</span>
		<div class="post">
			<p>{exp:query sql="SELECT CONCAT(m_field_id_1, ' ', m_field_id_2) AS full_name, CONCAT(m_field_id_4, ', ', m_field_id_5) AS location FROM exp_member_data
						
						INNER JOIN exp_members
						ON exp_member_data.member_id = exp_members.member_id
						
						ORDER BY join_date DESC LIMIT 1"}Welcome our newest member, <strong>{full_name}</strong> from {location}!{/exp:query}</p>
			<ul>
				<li>{exp:query sql="SELECT count(member_id) AS total FROM exp_members WHERE last_activity > (UNIX_TIMESTAMP()-2592000)"}In the last month <strong>{total} members have interacted with the site</strong>.{/exp:query}</li>
				<li>The <strong>average health score</strong> of the members is {exp:query sql="SELECT ROUND(AVG(m_field_id_22),2) AS average_health_score FROM exp_member_data WHERE m_field_id_22 !='' AND m_field_id_22 > -1000"}<strong>{average_health_score}</strong>{/exp:query}.</li>
				<li>The <strong>average age</strong> of the members is {exp:query sql="SELECT ROUND(AVG(m_field_id_8)) AS average_age FROM exp_member_data WHERE m_field_id_8 !=''"}<strong>{average_age}</strong>{/exp:query} years old.</li>
				<li>{exp:query sql="SELECT count(*) AS comments, (
															SELECT count(DISTINCT email) AS total FROM exp_comments 
																				
																	WHERE email !='tloo@weimar.org'
																	AND email !='rramont@weimar.org'
																	AND email !='club@newstart.com'
															) AS commenters FROM exp_comments AS a"}<strong>{comments} comments</strong> have been contributed by <strong>{commenters} commenters</strong>.{/exp:query}
				
				</li>
				<li>{exp:query sql="SELECT m_field_id_1 AS first_name, count(email) AS total FROM exp_comments 
	
						INNER JOIN exp_member_data
						ON exp_comments.author_id = exp_member_data.member_id
						
						WHERE email !='tloo@weimar.org'
						AND email !='rramont@weimar.org'
						AND email !='club@newstart.com'
						
						GROUP BY email ORDER BY total DESC LIMIT 1"}<strong>{first_name}</strong> has commented the most with a total of <strong>{total} comments</strong>.{/exp:query}</li>
			</ul>
		</div>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		 google.load('visualization', '1', {'packages': ['geochart']});
		 google.setOnLoadCallback(drawMarkersMap);
	
			function drawMarkersMap() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'State');
			data.addColumn('number', 'Members');
			data.addRows([
			{exp:query
				sql="
				SELECT CONCAT(m_field_id_4, ', ', m_field_id_5) AS location, COUNT(*) AS total FROM exp_member_data
					WHERE m_field_id_5 != ''
					AND m_field_id_5 != '--'
					AND m_field_id_4 != ''
					
					GROUP BY location
					ORDER BY total DESC, location ASC
					LIMIT 100" backspace="1"}
				["<?php echo ucwords(strtolower('{location}')); ?>", {total}],{/exp:query}
			]);
	
			var options = {
				width: '530', height: '320',
				region: 'US', 
				resolution: 'provinces',
				displayMode: 'markers', 
				colorAxis: {colors: ['#87a922', 'yellow', '#FF4B28']},
				backgroundColor: 'transparent',
				magnifyingGlass: {enable: true, zoomFactor: 12},
				sizeAxis: {minValue: 0,  maxSize: 18}
			};
	
			var chart = new google.visualization.GeoChart(document.getElementById('member-map-cities'));
			chart.draw(data, options);
		};
		</script>
		<script type="text/javascript">
		 google.load('visualization', '1', {'packages': ['geochart']});
		 google.setOnLoadCallback(drawMarkersMap);
	
			function drawMarkersMap() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'State');
			data.addColumn('number', 'Members');
			data.addRows([
			{exp:query
				sql="
				SELECT m_field_id_5, COUNT(*) AS total FROM exp_member_data
					WHERE m_field_id_5 != ''
					AND m_field_id_5 != '--'
					
					GROUP BY m_field_id_5
					ORDER BY total DESC" backspace="1"}
				["{m_field_id_5}", {total}],{/exp:query}
			]);
	
			var options = {
				width: '530', height: '320',
				region: 'US', 
				resolution: 'provinces',
				colorAxis: {colors: ['#EEEEEE', '#87a922', 'yellow', '#FF4B28']},
				backgroundColor: 'transparent'
			};
	
			var chart = new google.visualization.GeoChart(document.getElementById('member-map-states'));
			chart.draw(data, options);
		};
		</script>
		<script type="text/javascript">
		 google.load('visualization', '1', {'packages': ['geochart']});
		 google.setOnLoadCallback(drawMarkersMap);
	
			function drawMarkersMap() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Location');
			data.addColumn('number', 'Members');
			data.addRows([
			{exp:query
				sql="
				SELECT CONCAT(m_field_id_4, ', ', m_field_id_5) AS location, count(*) AS total FROM (
					SELECT member_id, m_field_id_4, m_field_id_5 FROM exp_member_data
					
					WHERE m_field_id_5 != ''
					AND m_field_id_5 != '--'
					AND m_field_id_4 != ''
					
					ORDER BY member_id DESC
					
					LIMIT 100
				) a
				
				GROUP BY location
				ORDER BY total DESC, location ASC" backspace="1"}
				["{location}", {total}],{/exp:query}
			]);
	
			var options = {
				width: '530', height: '320',
				region: 'US', 
				resolution: 'provinces',
				displayMode: 'markers', 
				colorAxis: {colors: ['#87a922', 'yellow', '#FF4B28']},
				backgroundColor: 'transparent',
				magnifyingGlass: {enable: true, zoomFactor: 12},
				sizeAxis: {minValue: 0,  maxSize: 18}
			};
	
			var chart = new google.visualization.GeoChart(document.getElementById('top-members'));
			chart.draw(data, options);
		};
		</script>
		
		<dl class="tabs">
			<dd><a class="default" rel="current">Top Cities</a></dd>
			<dd><a rel="states">Top States</a></dd>
			<dd><a rel="members">Top Members</a></dd>
		</dl>
		<ul class="tabs-content">
			<li id="current">
				<div id="member-map-cities"></div>
			</li>
			<li id="states">
				<div id="member-map-states"></div>
			</li>
			<li id="members">
				<div id="top-members"></div>
			</li>
		</ul>
		<h2>Monthly Activity</h2>
		<div class="clearfix">
			<div id="member-history" class="module left">
				<script type="text/javascript">
					google.load("visualization", "1", {packages:["corechart"]});
					google.setOnLoadCallback(drawChart);
					function drawChart() {
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Date');
						data.addColumn('number', 'Members');
						data.addRows([
							<?php print_r(membership(30)); ?>
						]);
		
						var options = {
							width: 235, height: 50,
							vAxis: {gridlines: {color: 'transparent'}, textPosition: 'none', baselineColor: 'transparent'},
							hAxis: {textPosition: 'none'},
							legend: {position: 'none'},
							colors: ['#87A621'],
							backgroundColor: 'transparent',
							tooltip: {trigger: 'none'},
							theme: 'maximized',
							enableInteractivity: false,
							areaOpacity: 0.3
						};
		
						var chart = new google.visualization.AreaChart(document.getElementById('member-history-chart'));
						chart.draw(data, options);
					}
				</script>
				<a class="graphic">
					<div id="member-history-chart"></div>
					<h3>
						{exp:query sql="SELECT count(member_id) AS total FROM exp_members WHERE join_date > (UNIX_TIMESTAMP()-2592000)"}
							{total}
						{/exp:query}
						<span>Members</span>
					</h3>
				</a>
				<div class="table-stats">
					<table>
						<tbody>
							<?php print_r(membershipTable(30)); ?>
						</tbody>
					</table>
				</div>
			</div>
			
			<div id="comment-history" class="module right">
				<script type="text/javascript">
					google.setOnLoadCallback(drawChart);
					function drawChart() {
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Date');
						data.addColumn('number', 'Members');
						data.addRows([
							<?php print_r(commentHistory(30)); ?>
						]);
		
						var options = {
							width: 235, height: 50,
							vAxis: {gridlines: {color: 'transparent'}, textPosition: 'none', baselineColor: 'transparent'},
							hAxis: {textPosition: 'none'},
							legend: {position: 'none'},
							colors: ['#63B3E1'],
							backgroundColor: 'transparent',
							tooltip: {trigger: 'none'},
							theme: 'maximized',
							enableInteractivity: false,
							areaOpacity: 0.3
						};
		
						var chart = new google.visualization.AreaChart(document.getElementById('comment-history-chart'));
						chart.draw(data, options);
					}
				</script>
				<a class="graphic">
					<div id="comment-history-chart"></div>
					<h3>
						{exp:query sql="SELECT count(comment_id) AS total FROM exp_comments WHERE comment_date > (UNIX_TIMESTAMP()-2617200)"}
							{total}
						{/exp:query}
					<span>Comments</span></h3>
				</a>
				<div class="table-stats">
					<table>
						<?php print_r(commentsHistoryTable(30)); ?>
					</table>
				</div>
			</div>
		</div>
		<div id="interests" class="module full">
			<script type="text/javascript">
				google.setOnLoadCallback(drawChart);
				function drawChart() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'Interest');
					data.addColumn('number', 'Total');
					data.addRows([
					{exp:query 
						sql="
							SELECT cat_id AS interest, COUNT(*) AS total 
								FROM exp_user_category_posts
			
								WHERE exp_user_category_posts.cat_id = '94'
								OR exp_user_category_posts.cat_id = '95'
								OR exp_user_category_posts.cat_id = '97'
								OR exp_user_category_posts.cat_id = '98'
								OR exp_user_category_posts.cat_id = '99'
								OR exp_user_category_posts.cat_id = '100'
								OR exp_user_category_posts.cat_id = '109'
								OR exp_user_category_posts.cat_id = '110'
								OR exp_user_category_posts.cat_id = '111'
								OR exp_user_category_posts.cat_id = '112'
								OR exp_user_category_posts.cat_id = '113'
								OR exp_user_category_posts.cat_id = '114'
								OR exp_user_category_posts.cat_id = '115'
								OR exp_user_category_posts.cat_id = '116'
								OR exp_user_category_posts.cat_id = '315'
								
								GROUP BY interest
								ORDER BY total DESC, interest ASC"}
								{exp:channel:categories channel="sponsors" style="linear" show="{interest}"}['{category_name}', {total}],{/exp:channel:categories}{/exp:query}
					]);
	
					var options = {
						width: 490, height: 150,
						vAxis: {baselineColor: 'transparent', gridlines: {color: 'transparent'}, textPosition: 'none'},
						hAxis: {textPosition: 'none'},
						legend: {position: 'none'},
						backgroundColor: 'transparent',
						tooltip: {text: 'percentage', textStyle: {fontSize: 12, fontName: 'Helvetica'}},
						theme: 'maximized',
						colors: ['#FFB637'],
						connectSteps: false,
						reverseCategories: true
					};
	
					var chart = new google.visualization.SteppedAreaChart(document.getElementById('interest-chart'));
					chart.draw(data, options);
				}
			</script>
			<a class="graphic">
				<div id="interest-chart"></div>
				<h3>Interests<span>by Popularity</span></h3>
			</a>
			<div class="table-stats">
				<table>
					{exp:query 
					sql="
						SELECT cat_id AS interest, COUNT(*) AS total 
							FROM exp_user_category_posts
		
							WHERE exp_user_category_posts.cat_id = '94'
							OR exp_user_category_posts.cat_id = '95'
							OR exp_user_category_posts.cat_id = '97'
							OR exp_user_category_posts.cat_id = '98'
							OR exp_user_category_posts.cat_id = '99'
							OR exp_user_category_posts.cat_id = '100'
							OR exp_user_category_posts.cat_id = '109'
							OR exp_user_category_posts.cat_id = '110'
							OR exp_user_category_posts.cat_id = '111'
							OR exp_user_category_posts.cat_id = '112'
							OR exp_user_category_posts.cat_id = '113'
							OR exp_user_category_posts.cat_id = '114'
							OR exp_user_category_posts.cat_id = '115'
							OR exp_user_category_posts.cat_id = '116'
							OR exp_user_category_posts.cat_id = '315'
							
							GROUP BY interest
							ORDER BY total DESC, interest ASC"}
						<tr>{exp:channel:categories channel="sponsors" style="linear" show="{interest}"}
							<td>{category_name}</td>
							<td class="total">{total}</td>{/exp:channel:categories}
						</tr>
					{/exp:query}
				</table>
			</div>
		</div>
		<div class="clearfix">
			<div id="age-range" class="module left">
				<script type="text/javascript">
					google.setOnLoadCallback(drawChart);
					function drawChart() {
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Age Range');
						data.addColumn('number', 'Total');
						data.addRows([
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 19 AND m_field_id_8 >= 13"}['13-19',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 29 AND m_field_id_8 >= 20"}['20-29',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 39 AND m_field_id_8 >= 30"}['30-39',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 49 AND m_field_id_8 >= 40"}['40-49',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 59 AND m_field_id_8 >= 50"}['50-59',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 69 AND m_field_id_8 >= 60"}['60-69',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 79 AND m_field_id_8 >= 70"}['70-79',{total}]{/exp:query},
							{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 100 AND m_field_id_8 >= 80"}['80-100',{total}]{/exp:query}
						]);
		
						var options = {
							width: 235, height: 150,
							vAxis: {baselineColor: 'transparent', gridlines: {color: 'transparent'}, textPosition: 'none'},
							hAxis: {textPosition: 'none'},
							legend: {position: 'none'},
							backgroundColor: 'transparent',
							tooltip: {text: 'percentage', textStyle: {fontSize: 12, fontName: 'Helvetica'}},
							theme: 'maximized',
							colors: ['#F438A5'],
							connectSteps: false
						};
		
						var chart = new google.visualization.SteppedAreaChart(document.getElementById('age-range-chart'));
						chart.draw(data, options);
					}
				</script>
				<a class="graphic">
					<div id="age-range-chart"></div>
					<h3>Age<span>Range</span></h3>
				</a>
				<div class="table-stats">
					<table>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 19 AND m_field_id_8 >= 13"}<td>13-19</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 29 AND m_field_id_8 >= 20"}<td>20-29</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 39 AND m_field_id_8 >= 30"}<td>30-39</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 49 AND m_field_id_8 >= 40"}<td>40-49</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 59 AND m_field_id_8 >= 50"}<td>50-59</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 69 AND m_field_id_8 >= 60"}<td>60-69</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 79 AND m_field_id_8 >= 70"}<td>70-79</td><td class="total">{total}</td>{/exp:query}</tr>
						<tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_8 <= 100 AND m_field_id_8 >= 80"}<td>80-100</td><td class="total">{total}</td>{/exp:query}</tr>
					</table>
				</div>
			</div>
			<div id="referrals" class="module right">
				<script type="text/javascript">
					google.setOnLoadCallback(drawChart);
					function drawChart() {
						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Referral');
						data.addColumn('number', 'Total');
						data.addRows([
							{exp:query sql="
								SELECT m_field_id_25 AS referral, COUNT(*) AS total FROM exp_member_data
									WHERE m_field_id_25 != ''
									AND m_field_id_25 != 'Select One'
									
									GROUP BY referral 
									ORDER BY total DESC, referral ASC"}
									['{referral}',{total}],{/exp:query}
						]);
		
						var options = {
							width: 235, height: 150,
							vAxis: {baselineColor: 'transparent', gridlines: {color: 'transparent'}, textPosition: 'none'},
							hAxis: {textPosition: 'none'},
							legend: {position: 'none'},
							backgroundColor: 'transparent',
							tooltip: {text: 'percentage', textStyle: {fontSize: 12, fontName: 'Helvetica'}},
							theme: 'maximized',
							colors: ['#00687A'],
							connectSteps: false
						};
		
						var chart = new google.visualization.SteppedAreaChart(document.getElementById('referral-chart'));
						chart.draw(data, options);
					}
				</script>
				<a class="graphic">
					<div id="referral-chart"></div>
					<h3>
						{exp:query sql="
							SELECT COUNT(m_field_id_25) AS total FROM exp_member_data
								WHERE m_field_id_25 != ''
								AND m_field_id_25 != 'Select One'"}{total}{/exp:query}
					<span>Referrals</span></h3>
				</a>
				<div class="table-stats">
					<table>
					{exp:query sql="
						SELECT m_field_id_25 AS referral, COUNT(*) AS total FROM exp_member_data
							WHERE m_field_id_25 != ''
							AND m_field_id_25 != 'Select One'
							
							GROUP BY referral 
							ORDER BY total DESC, referral ASC"}
							<tr>
								<td>{referral}</td>
								<td class="total">{total}</td>
							</tr>
					{/exp:query}
					</table>
				</div>
			</div>
		</div>
		
		<div class="locations">
			<h1>{exp:query sql="SELECT COUNT(*) AS total FROM exp_channel_titles WHERE exp_channel_titles.channel_id = 3"}{total}{/exp:query} Total Locations</h1>
			
			<script type="text/javascript">
			 google.load('visualization', '1', {'packages': ['geochart']});
			 google.setOnLoadCallback(drawMarkersMap);
		
				function drawMarkersMap() {
				var data = google.visualization.arrayToDataTable([
					['Sponsor Name',	'Location', 'Members'],
				{exp:channel:entries channel="locations" sort="asc"}
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
											WHERE m_field_id_7 = {location_zip}
							) a" limit="1"}
						['{title}', '{location_city}, {location_state}', {total}],{/exp:query}{/exp:channel:entries}
				]);
		
				var options = {
					width: '530', height: '320',
					region: 'US', 
					resolution: 'provinces',
					displayMode: 'markers', 
					colorAxis: {colors: ['#FF4B28', '#FF4B28']},
					sizeAxis: {minValue: 0,  maxSize: 3},
					backgroundColor: 'transparent',
					magnifyingGlass: {enable: true, zoomFactor: 12}
				};
		
				var chart = new google.visualization.GeoChart(document.getElementById('location-map-cities'));
				chart.draw(data, options);
			};
			</script>
			
			<dl class="tabs">
				<dd><a class="default" rel="location-cities">Top Cities</a></dd>
				<dd><a rel="location-states">Top States</a></dd>
			</dl>
			<ul class="tabs-content">
				<li id="location-cities">
					<div id="location-map-cities"></div>
				</li>
				<li id="location-states">
					<div id="location-map-states"></div>
				</li>
			</ul>
			
			<table>
				<thead>
					<tr>
						<td>Sponsor #</td>
						<td>Location Name</td>
						<td>Total Members</td>
					</tr>
				</thead>
				{exp:channel:entries channel="locations" sort="asc"}
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
											WHERE m_field_id_7 = {location_zip}
							) a" limit="1"}
						<tr class="{switch='odd|even'}">
							<td>{categories}{category_id}{/categories}</td>
							<td><a href="{url_title_path='locations/detail'}">{title}</a></td>
							<td class="total">{total}</td>
						</tr>
					{/exp:query}
				{/exp:channel:entries}
			</table>
		</div>
		
	{exp:channel:entries channel="events" show_future_entries="yes" dynamic="no" orderby="date" sort="asc" status="open"}
		{if count == 1}
		<h2>Events</h2>
		<table class="events">
			<thead>
				<tr>
					<td>ID</td>
					<td>Event Name</td>
					<td>RSVPs</td>
				</tr>
			</thead>
		{/if}
			<tr class="{switch='odd|even'}">
				<td>{entry_id}</td>
				<td><a href="{url_title_path='events/detail'}">{title}</a></td>
				<td class="total">{exp:playa:total_parents}</td>
			</tr>
		{if count == total_results}
		</table>
		{/if}
	{/exp:channel:entries}
		
		
		<h2>Pages Shared on Facebook</h2>
		
		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<fb:recommendations site="www.newstartclub.com" width="480" height="400" header="true"></fb:recommendations>
		
	</div>
	<div class="sidebar right">
		<header class="bar">Super Admin</header>
			
			<h2>Top 10 Cities</h2>
			<ul>
				{exp:query sql="
					SELECT CONCAT(m_field_id_4, ', ', m_field_id_5) AS location, COUNT(*) AS total FROM exp_member_data
					WHERE m_field_id_5 != ''
					AND m_field_id_5 != '--'
					AND m_field_id_4 != ''
					
					GROUP BY location
					ORDER BY total DESC, location ASC
					LIMIT 10"}
					<li><a href="http://maps.google.com/maps?q={location}" title="Google map of {location}" target="_blank">{location} (&nbsp;{total}&nbsp;)</a></li>
				{/exp:query}
			</ul>
			<h2>Top 10 States</h2>
			<ul>
				{exp:query sql="
					SELECT m_field_id_5, COUNT(*) AS total 
						FROM exp_member_data 
						
						WHERE m_field_id_5 != '' 
						AND m_field_id_5 != '--'
						
					GROUP BY m_field_id_5 
					ORDER BY total DESC
					
					LIMIT 10 
				" limit="10"}
					<li><a href="http://maps.google.com/maps?q={m_field_id_5}" title="Google map of {m_field_id_5}" target="_blank">{m_field_id_5} (&nbsp;{total}&nbsp;)</a></li>
				{/exp:query}
			</ul>
			<h2>Newsletters</h2>
			<style type="text/css">
			<!--
			.display_archive {font-family: verdana; font-size: 11px;}
			.campaign {margin: 5px;}
			//-->
			</style>
			<script language="javascript" src="http://us1.campaign-archive1.com/generate-js/?u=f62eb1c3def2a47eba065c05e&fid=47353&show=10" type="text/javascript"></script>
	</div>
</div>
{embed="embeds/_doc-bottom"}