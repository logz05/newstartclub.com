<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');

class Interest
{
	public $active_class = '';
	public $path = '';
	public $category_name = '';
	public $total = 0;
	
	public function __construct($active_class, $path, $category_name, $total)
	{
		$this->active_class = $active_class;
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

//Set date to Pacific Time
date_default_timezone_set('US/Pacific');
	
function listMembers($name = "all") {

	//Create new database connection
	$db = new DBconnect();
	
	$query = '';
	
	switch ($name) {
		case "interest":
			$query = '
				SELECT 
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
				FROM exp_members
					INNER JOIN exp_user_category_posts
					ON exp_members.member_id = exp_user_category_posts.member_id
					
					INNER JOIN exp_member_data
					ON exp_members.member_id = exp_member_data.member_id
					
					WHERE exp_user_category_posts.cat_id = {segment_4}
						AND ( exp_member_data.m_field_id_26 = {embed:sponsor_number} OR exp_member_data.m_field_id_6 = {embed:sponsor_zipcode} )
				
			UNION DISTINCT
			
				SELECT DISTINCT
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
					
				FROM exp_members
					INNER JOIN member_relations
					ON exp_members.member_id = member_relations.member_id
					
					INNER JOIN exp_user_category_posts
					ON exp_members.member_id = exp_user_category_posts.member_id
					
					INNER JOIN exp_channel_titles
					ON member_relations.related_id = exp_channel_titles.entry_id
					
					INNER JOIN exp_category_posts
					ON exp_channel_titles.entry_id = exp_category_posts.entry_id
					
					JOIN exp_member_data
					ON exp_member_data.member_id = exp_members.member_id
						
					WHERE exp_category_posts.cat_id = {embed:sponsor_number}
					AND exp_user_category_posts.cat_id = {segment_4}
					
					ORDER BY member_id DESC';
		break;
		
		case "more-info":
			$query = '
				SELECT 
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
				FROM exp_members
					INNER JOIN exp_user_category_posts
					ON exp_members.member_id = exp_user_category_posts.member_id
					
					INNER JOIN exp_member_data
					ON exp_members.member_id = exp_member_data.member_id
					
					WHERE exp_user_category_posts.cat_id = {segment_4}
						AND ( exp_member_data.m_field_id_26 = {embed:sponsor_number} OR exp_member_data.m_field_id_6 = {embed:sponsor_zipcode} )
				
			UNION DISTINCT
			
				SELECT DISTINCT
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
					
				FROM exp_members
					INNER JOIN member_relations
					ON exp_members.member_id = member_relations.member_id
					
					INNER JOIN exp_user_category_posts
					ON exp_members.member_id = exp_user_category_posts.member_id
					
					INNER JOIN exp_channel_titles
					ON member_relations.related_id = exp_channel_titles.entry_id
					
					INNER JOIN exp_category_posts
					ON exp_channel_titles.entry_id = exp_category_posts.entry_id
					
					JOIN exp_member_data
					ON exp_member_data.member_id = exp_members.member_id
						
					WHERE exp_category_posts.cat_id = {embed:sponsor_number}
					AND exp_user_category_posts.cat_id = {segment_4}
					
					ORDER BY member_id DESC';
		break;
		
		case "event":
			$query = '
				SELECT 
					exp_member_data.member_id,
						exp_member_data.m_field_id_1 AS first_name,
						exp_member_data.m_field_id_2 AS last_name,
						exp_member_data.m_field_id_3 AS address,
						exp_member_data.m_field_id_4 AS city,
						exp_member_data.m_field_id_5 AS state,
						exp_member_data.m_field_id_6 AS zip_code,
						exp_member_data.m_field_id_7 AS phone_number,
						exp_member_data.m_field_id_22 AS health_score,
						exp_member_data.m_field_id_23 AS score_history,
						exp_members.username,
						exp_members.join_date
					
				FROM exp_members
					INNER JOIN member_relations
					ON exp_members.member_id = member_relations.member_id
					
					INNER JOIN exp_member_data
					ON exp_members.member_id = exp_member_data.member_id
					
				WHERE member_relations.related_id = {segment_4}
				AND member_relations.cat_id = {embed:sponsor_number}
				ORDER BY member_id DESC';
		break;
		
		case "deal":
			$query = '
				SELECT 
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
					
				FROM exp_members
					JOIN member_relations
					ON exp_members.member_id = member_relations.member_id
					
					JOIN exp_member_data
					ON exp_members.member_id = exp_member_data.member_id
					
				WHERE member_relations.related_id = {segment_4}
				AND member_relations.cat_id = {embed:sponsor_number}
				
				ORDER BY member_id DESC';
		break;
		
		default:
			$query = '
				SELECT DISTINCT 
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
					
					FROM exp_member_data
					
						INNER JOIN exp_category_posts
						ON exp_category_posts.cat_id = exp_member_data.m_field_id_26
						
						JOIN exp_members
						ON exp_members.member_id = exp_member_data.member_id
				
					WHERE exp_member_data.m_field_id_26 = {embed:sponsor_number}
				
			UNION DISTINCT
									
				SELECT DISTINCT 
					member_relations.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
					
				FROM member_relations
				
					INNER JOIN exp_category_posts
					ON exp_category_posts.entry_id = member_relations.related_id
					
					JOIN exp_members
					ON exp_members.member_id = member_relations.member_id
					
					JOIN exp_member_data
					ON exp_member_data.member_id = exp_members.member_id
			
				WHERE exp_category_posts.cat_id = {embed:sponsor_number}
									
			UNION DISTINCT
									
				SELECT 
					exp_member_data.member_id,
					exp_member_data.m_field_id_1 AS first_name,
					exp_member_data.m_field_id_2 AS last_name,
					exp_member_data.m_field_id_3 AS address,
					exp_member_data.m_field_id_4 AS city,
					exp_member_data.m_field_id_5 AS state,
					exp_member_data.m_field_id_6 AS zip_code,
					exp_member_data.m_field_id_7 AS phone_number,
					exp_member_data.m_field_id_22 AS health_score,
					exp_member_data.m_field_id_23 AS score_history,
					exp_members.username,
					exp_members.join_date
			
				FROM exp_member_data
					
					JOIN exp_members
					ON exp_members.member_id = exp_member_data.member_id
					WHERE exp_member_data.m_field_id_6 = {embed:sponsor_zipcode}
					OR exp_member_data.m_field_id_26 = {embed:sponsor_number}
											
			ORDER BY member_id DESC';	
			
	}
	
	$results = $db->fetch($query);
	$count = count($results);

	//Member List is empty
	$memberList = array();
	
	//Add all emails to Member List separated by a comma
	for ($i = 0; $i < $count; $i++)
	{
		array_push($memberList, $results[$i][0]);
	}
	
	$buffer = '';

	for ($i = 0; $i < $count; $i++)
	{
	
		$buffer .= '
			<li id="'. $results[$i][0] .'">
				<h2>'. $results[$i][10] .'</h2>
				<div class="date" data-icon="Y">
					<span class="timeago">'. distanceOfTimeInWords( $results[$i][11] , {current_time}, true) .'</span>
					<span class="join-date">'. date( "D, M j, Y	 g:ia T", ( $results[$i][11] - 21600 ) ) .'</span>
				</div>
				<div class="details">
					<p>'. ucwords(strtolower( $results[$i][1] )) .' '. ucwords(strtolower( $results[$i][2] )) .'<br />';
					//Street Address
					if ($results[$i][3])
					{
						$buffer .= ucwords(strtolower( $results[$i][3] )) .'<br />';
					}
					
					// City
					if ($results[$i][4])
					{
						$buffer .= ucwords(strtolower( $results[$i][4] )) .', ';
					}
					
					//State
					if ($results[$i][5] != "--")
					{
						$buffer .= $results[$i][5] .' ';
					}
					
					//Zip Code
					$buffer .= $results[$i][6] . '</p>';
					
					if ($results[$i][7])
					{ 
						$buffer .= '<p><strong>Phone:</strong> '. $results[$i][7] .'</p>';
					}
					if ($results[$i][8])
					{
						if ($scoreHistory = unserialize($results[$i][9])) {
						
							krsort($scoreHistory);
						
							$buffer .= '<p><strong>Health Score:</strong> ';
							foreach ($scoreHistory as $key => $value)
							{
								$date = explode("-", $key);
								$buffer .= '<span class="has-tip"><span class="tooltip top health-score"><i class="nub"></i>'. date( "F j, Y", mktime(0, 0, 0, $date[1], $date[2], $date[0]) ) .'</span>'. $value .'</span>';
							}
							$buffer .= '</p>';
						}
						
					}
				$buffer .= '</div>
			</li>';
	}
	
	return array("member-list" => $buffer, "member-count" => $count);

}

?>
{!-- Select the correct query based on segment --}
<?php $memberData = listMembers("{segment_3}"); ?>
<!-- {if (segment_3 == 'interest' || segment_3 == 'more-info')}category{if:else}{segment_3}{/if} -->




		{if (segment_3 == 'interest' || segment_3 == 'more-info')}
			{exp:channel:categories channel='sponsors' style='linear' show='{segment_4}'}
				<a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&catname={category_url_title}&cat={segment_4}" title="Export CSV file of {category_name}" class="link-icon csv-file" data-icon="m">Export CSV</a>
			{/exp:channel:categories}
			
		{if:elseif segment_3 == "event"}
			{exp:channel:entries channel='events' entry_id='{segment_4}' limit='1' show_future_entries='yes' dynamic='off' status='open|closed'}
				<a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&entry_id={entry_id}&entry_name={url_title}" title="Export CSV file of {title}" class="link-icon csv-file" data-icon="m">Export CSV</a>
			{/exp:channel:entries}
			
		{if:elseif segment_3 == "deal"}
			{exp:channel:entries channel='deals' entry_id='{segment_4}' limit='1' show_future_entries='yes' dynamic='off' status='open'}
				<a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&entry_id={entry_id}&entry_name={url_title}" title="Export CSV file of {title}" class="link-icon csv-file" data-icon="m">Export CSV</a>
			{/exp:channel:entries}
			
		{if:else}
			<a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&all" title="Export CSV file of this list" class="link-icon csv-file" data-icon="m">Export CSV</a>
		{/if}
		
		
		
		<div class="heading clearfix"> 
			{if (segment_3 == 'interest' || segment_3 == 'more-info') && segment_4}
				<h1>{exp:channel:categories channel="sponsors" style="linear" show="{segment_4}"}{category_name}{/exp:channel:categories} (&nbsp;<?php print $memberData["member-count"]; ?>&nbsp;)</h1>
				
			{if:elseif segment_3 == 'event' && segment_4}
				<h1>{exp:channel:entries channel="events" category="{embed:sponsor_number}" entry_id="{segment_4}" limit="1" show_future_entries="yes" dynamic="no" status="open|closed"}{title}{/exp:channel:entries} (&nbsp;<?php print $memberData["member-count"]; ?>&nbsp;)</h1>
				
			{if:elseif segment_3 == 'deal' && segment_4}
				<h1>{exp:channel:entries channel="deals" category="{embed:sponsor_number}" entry_id="{segment_4}" limit="1" show_future_entries="yes" dynamic="no" status="open"}{title}{/exp:channel:entries} (&nbsp;<?php print $memberData["member-count"]; ?>&nbsp;)</h1>
				
			{if:else}
				<h1>Member List (&nbsp;<?php print $memberData["member-count"]; ?>&nbsp;)</h1>
			{/if}
		</div>
		 
	<div class="grid23 clearfix">
		<div class="main left">
			<p>Click on a member to see more information about them or click <a href="{path='sponsors/invite'}">here</a> to invite new members.</p>
			<p>To email your members, click the button below or choose one of the filters on the right.</p>
			<p class="button-wrap">
				<a href="{path='sponsors/send-email/{segment_3}/{segment_4}'}" class="super secondary button"><span>Email Members</span></a>
			</p>
			<div class="row-header clearfix">
				<div class="left"><strong>Username</strong> ( <span class="exp-col exp">show details</span><span class="exp-col col" style="display:none;">hide details</span> )</div>
				<div class="right"><strong>Join Date</strong></div>
			</div>
			<ul class="listing">
				<?php print $memberData["member-list"]; ?>
			</ul>
		</div>
		
		<div class="sidebar right">
			<section class="section">
				<header class="bar">Filter Members</header>
			
				{exp:channel:entries channel="deals" category="{embed:sponsor_number}" show_future_entries="yes" dynamic="no" orderby="date" sort="asc" status="open"}
					{if count == 1}
					<h2 class="filter-heading deal">Deals<span class="arrow up"></span><span class="arrow down"></span></h2>
					<ul class="filter-list deal">
					{/if}
					
					{exp:query sql="SELECT COUNT(*) AS total FROM member_relations WHERE related_id = {entry_id} AND cat_id = {embed:sponsor_number}"}
						<li{if segment_4 == entry_id} class="active"{/if}><a href="{path='sponsors/email-members/deal/{entry_id}'}" title="{title}">{title}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
					{/exp:query}
					
					{if count == total_results}
					</ul>
					{/if}
				{/exp:channel:entries}
				
				{exp:channel:entries channel="events" category="{embed:sponsor_number}" show_future_entries="yes" dynamic="no" orderby="date" sort="asc" status="open"}
					{if count == 1}
					<h2 class="filter-heading event">Events<span class="arrow up"></span><span class="arrow down"></span></h2>
					<ul class="filter-list event">
					{/if}
					{exp:query sql="SELECT COUNT(*) AS total FROM member_relations WHERE related_id = {entry_id} AND cat_id = {embed:sponsor_number}"}
						<li{if segment_4 == entry_id} class="active"{/if}><a href="{path='sponsors/email-members/event/{entry_id}'}" title="{title}">{title}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
					{/exp:query}
					
					{if count == total_results}
					</ul>
					{/if}
				{/exp:channel:entries}
				
				<h2 class="filter-heading interest">Interests<span class="arrow up"></span><span class="arrow down"></span></h2>
				<ul class="filter-list interest"><?php $interests = array(); ?>
				{exp:channel:categories channel="sponsors" style="linear" category_group="14|15"}
				{exp:query 
				sql="SELECT count(member_id) AS total FROM (
							SELECT exp_members.member_id
									FROM exp_members
										INNER JOIN exp_user_category_posts
										ON exp_members.member_id = exp_user_category_posts.member_id
										
										INNER JOIN exp_member_data
										ON exp_members.member_id = exp_member_data.member_id
										
										WHERE exp_user_category_posts.cat_id = {category_id}
											AND ( exp_member_data.m_field_id_26 = {embed:sponsor_number} 
											OR exp_member_data.m_field_id_6 = {embed:sponsor_zipcode} )
								
							UNION DISTINCT
							
								SELECT exp_members.member_id
									FROM exp_members
										JOIN member_relations
										ON exp_members.member_id = member_relations.member_id
										
										JOIN exp_user_category_posts
										ON exp_members.member_id = exp_user_category_posts.member_id
										
										JOIN exp_channel_titles
										ON member_relations.related_id = exp_channel_titles.entry_id
										
										JOIN exp_category_posts
										ON exp_channel_titles.entry_id = exp_category_posts.entry_id
										
									WHERE exp_category_posts.cat_id = {embed:sponsor_number}
									AND exp_user_category_posts.cat_id = {category_id}
						) a"}
				<?php if ("{total}" != "0") { $interests[] = new Interest('{if segment_4 == category_id} class="active"{/if}', '{path=\'sponsors/email-members/interest/{category_id}\'}', '{category_name}', '{total}'); } ?>
				{/exp:query}
				{/exp:channel:categories}
					<?php
					usort($interests, "Interest::compare");
					for ($i = (count($interests) - 1); $i > -1; $i--)
					{
						$interest =& $interests[$i];
						
						print '<li'. $interest->active_class .'><a href="'. $interest->path .'" title="'. $interest->category_name .'">'. $interest->category_name .'</a><span class="count">&nbsp;(&nbsp;'. $interest->total .'&nbsp;)</span></li>'. "\n";
						
					}
					?>
				</ul>
				<h2 class="filter-heading more-info">More Info<span class="arrow up"></span><span class="arrow down"></span></h2>
				<ul class="filter-list more-info"><?php $more_info = array(); ?>
				{exp:channel:categories channel="sponsors" style="linear" category_group="16"}
				{exp:query 
				sql="SELECT count(member_id) AS total FROM (
							SELECT exp_members.member_id
									FROM exp_members
										INNER JOIN exp_user_category_posts
										ON exp_members.member_id = exp_user_category_posts.member_id
										
										INNER JOIN exp_member_data
										ON exp_members.member_id = exp_member_data.member_id
										
										WHERE exp_user_category_posts.cat_id = {category_id}
											AND ( exp_member_data.m_field_id_26 = {embed:sponsor_number} 
											OR exp_member_data.m_field_id_6 = {embed:sponsor_zipcode} )
								
							UNION DISTINCT
							
								SELECT exp_members.member_id
									FROM exp_members
										INNER JOIN member_relations
										ON exp_members.member_id = member_relations.member_id
										
										INNER JOIN exp_user_category_posts
										ON exp_members.member_id = exp_user_category_posts.member_id
										
										INNER JOIN exp_channel_titles
										ON member_relations.related_id = exp_channel_titles.entry_id
										
										INNER JOIN exp_category_posts
										ON exp_channel_titles.entry_id = exp_category_posts.entry_id
										
									WHERE exp_category_posts.cat_id = {embed:sponsor_number}
									AND exp_user_category_posts.cat_id = {category_id}
						) a"}
						<?php if ("{total}" != "0") { $more_info[] = new Interest('{if segment_4 == category_id} class="active"{/if}', '{path=\'sponsors/email-members/more-info/{category_id}\'}', '{category_name}', '{total}'); } ?>
					{/exp:query}
				{/exp:channel:categories}
					<?php
					usort($more_info, "Interest::compare");
					for ($i = (count($more_info) - 1); $i > -1; $i--)
					{
						$interest =& $more_info[$i];
						
						print '<li'. $interest->active_class .'><a href="'. $interest->path .'" title="'. $interest->category_name .'">'. $interest->category_name .'</a><span class="count">&nbsp;(&nbsp;'. $interest->total .'&nbsp;)</span></li>'. "\n";
						
					}
					?>
				</ul>
			</section>
		</div>
	</div>