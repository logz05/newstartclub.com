<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

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

//All Members
$db = new DBconnect();
$queryAll = '
  SELECT DISTINCT 
    exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8 AS address,
    exp_member_data.m_field_id_9 AS city,
    exp_member_data.m_field_id_10 AS state,
    exp_member_data.m_field_id_7 AS zip_code,
    exp_member_data.m_field_id_11 AS phone_number,
    exp_member_data.m_field_id_24 AS health_score,
    exp_member_data.m_field_id_34 AS score_history,
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
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8 AS address,
    exp_member_data.m_field_id_9 AS city,
    exp_member_data.m_field_id_10 AS state,
    exp_member_data.m_field_id_7 AS zip_code,
    exp_member_data.m_field_id_11 AS phone_number,
    exp_member_data.m_field_id_24 AS health_score,
    exp_member_data.m_field_id_34 AS score_history,
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
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8 AS address,
    exp_member_data.m_field_id_9 AS city,
    exp_member_data.m_field_id_10 AS state,
    exp_member_data.m_field_id_7 AS zip_code,
    exp_member_data.m_field_id_11 AS phone_number,
    exp_member_data.m_field_id_24 AS health_score,
    exp_member_data.m_field_id_34 AS score_history,
    exp_members.username,
    exp_members.join_date

  FROM exp_member_data
    
    JOIN exp_members
    ON exp_members.member_id = exp_member_data.member_id
    WHERE exp_member_data.m_field_id_7 = {embed:sponsor_zipcode}
    OR exp_member_data.m_field_id_26 = {embed:sponsor_number}
                
ORDER BY member_id DESC
      ';

$queryResultsAll = $db->fetch($queryAll);
$queryCountAll = count($queryResultsAll);

//Member List is empty
$memberListAll = array();
  
  //Add all emails to Member List separated by a comma
  for ($i = 0; $i < $queryCountAll; $i++)
  {
    array_push($memberListAll, $queryResultsAll[$i][0]);
  }
  
//Category Members
$db = new DBconnect();
$queryCat = '
  SELECT 
    exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8 AS address,
    exp_member_data.m_field_id_9 AS city,
    exp_member_data.m_field_id_10 AS state,
    exp_member_data.m_field_id_7 AS zip_code,
    exp_member_data.m_field_id_11 AS phone_number,
    exp_member_data.m_field_id_24 AS health_score,
    exp_member_data.m_field_id_34 AS score_history,
    exp_members.username,
    exp_members.join_date
  FROM exp_members
    INNER JOIN exp_user_category_posts
    ON exp_members.member_id = exp_user_category_posts.member_id
    
    INNER JOIN exp_member_data
    ON exp_members.member_id = exp_member_data.member_id
    
    WHERE exp_user_category_posts.cat_id = {segment_3}
      AND ( exp_member_data.m_field_id_26 = {embed:sponsor_number} OR exp_member_data.m_field_id_7 = {embed:sponsor_zipcode} )
  
UNION DISTINCT

  SELECT DISTINCT
  	exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8 AS address,
    exp_member_data.m_field_id_9 AS city,
    exp_member_data.m_field_id_10 AS state,
    exp_member_data.m_field_id_7 AS zip_code,
    exp_member_data.m_field_id_11 AS phone_number,
    exp_member_data.m_field_id_24 AS health_score,
    exp_member_data.m_field_id_34 AS score_history,
    exp_members.username,
    exp_members.join_date
    
  FROM exp_members
    INNER JOIN member_relations
    ON exp_members.member_id = member_relations.member_id
    
    INNER JOIN exp_user_category_posts
    ON exp_members.member_id = exp_user_category_posts.member_id
    
    INNER JOIN exp_weblog_titles
    ON member_relations.related_id = exp_weblog_titles.entry_id
    
    INNER JOIN exp_category_posts
    ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
    
    JOIN exp_member_data
  	ON exp_member_data.member_id = exp_members.member_id
      
    WHERE exp_category_posts.cat_id = {embed:sponsor_number}
    AND exp_user_category_posts.cat_id = {segment_3}
    
    ORDER BY member_id DESC
      ';

$queryResultsCat = $db->fetch($queryCat);
$queryCountCat = count($queryResultsCat);

//Member Category List is empty
$memberListCat = array();
  
  //Add all emails to Member Category List separated by a comma
  for ($i = 0; $i < $queryCountCat; $i++)
  {
    array_push($memberListCat, $queryResultsCat[$i][0]);
  }
  
//Event Members
$db = new DBconnect();
$queryEvent = '
SELECT 
  exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8 AS address,
    exp_member_data.m_field_id_9 AS city,
    exp_member_data.m_field_id_10 AS state,
    exp_member_data.m_field_id_7 AS zip_code,
    exp_member_data.m_field_id_11 AS phone_number,
    exp_member_data.m_field_id_24 AS health_score,
    exp_member_data.m_field_id_34 AS score_history,
    exp_members.username,
    exp_members.join_date
  
FROM exp_members
  INNER JOIN member_relations
  ON exp_members.member_id = member_relations.member_id
  
  INNER JOIN exp_member_data
  ON exp_members.member_id = exp_member_data.member_id
  
  INNER JOIN exp_weblog_titles
  ON member_relations.related_id = exp_weblog_titles.entry_id
  
  INNER JOIN exp_category_posts
  ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
  
WHERE member_relations.related_id = {segment_3}
AND exp_category_posts.cat_id = {embed:sponsor_number}
ORDER BY member_id DESC
      ';

$queryResultsEvent = $db->fetch($queryEvent);
$queryCountEvent = count($queryResultsEvent);

//Member Event List is empty
$memberListEvent = array();
  
  //Add all emails to Member Event List separated by a comma
  for ($i = 0; $i < $queryCountEvent; $i++)
  {
    array_push($memberListEvent, $queryResultsEvent[$i][0]);
  }

  date_default_timezone_set('US/Pacific');
  
function listMembers($count, $results) {

  for ($i = 0; $i < $count; $i++)
  {
  
  $scoreHistory = unserialize($results[$i][9]);
  
  krsort($scoreHistory);
  
    echo '<li>
            <h2>'. $results[$i][10] .'</h2>
            <div class="date">
              <span class="timeago">'. distanceOfTimeInWords( $results[$i][11] , {current_time}, true) .'</span>
              <span class="join-date">'. date( "D, M j, Y  g:ia T", ( $results[$i][11] - 21600 ) ) .'</span>
            </div>
            <div class="details">
              <p>'. ucwords(strtolower( $results[$i][1] )) .' '. ucwords(strtolower( $results[$i][2] )) .'<br />';
              //Street Address
              if ($results[$i][3])
              {
                echo ucwords(strtolower( $results[$i][3] )) .'<br />';
              }
              
              // City
              if ($results[$i][4])
              {
                echo ucwords(strtolower( $results[$i][4] )) .', ';
              }
              
              //State
              if ($results[$i][5] != "--")
              {
                echo $results[$i][5] .' ';
              }
              
              //Zip Code
              echo $results[$i][6] . '</p>';
              
              if ($results[$i][7])
              { 
                echo '<p><strong>Phone:</strong> '. $results[$i][7] .'</p>';
              }
              if ($results[$i][8])
              {
                echo '<p><strong>Health Score:</strong> ';
                foreach ($scoreHistory as $key => $value)
                {
                  $date = explode("-", $key);
                  echo '<span class="has-tip"><span class="tooltip top"><i class="nub"></i>'. date( "F j, Y", mktime(0, 0, 0, $date[1], $date[2], $date[0]) ) .'</span>'. $value .'</span>';
                }
                echo '</p>';
              }
            echo '</div>
          </li>';
  }

}

?>
    <div id="csv-file" class="icon">
      {if segment_4}
      <a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&entry_id={segment_3}&event_name={exp:weblog:entries weblog='events' entry_id='{segment_3}' limit='1' show_future_entries='yes' dynamic='off' status='open|closed'}{url_title}{/exp:weblog:entries}" title="Export CSV file of this list">
      	<div></div><span>Export CSV</span>
      </a>
      {if:elseif segment_3}
      	<a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&catname={exp:weblog:categories weblog='sponsors' style='linear' show='{segment_3}'}{category_url_title}{/exp:weblog:categories}&cat={segment_3}" title="Export CSV file of this list">
      	<div></div><span>Export CSV</span>
      </a>
      {if:else}
      	<a href="/lib/members-list-csv.php?number={embed:sponsor_number}&zip={embed:sponsor_zipcode}&all" title="Export CSV file of this list">
      	<div></div><span>Export CSV</span>
      </a>
      {/if}
    </div>
    <div class="heading clearfix"> 
    {if segment_3 == '' || (segment_3 >= 'P0' && segment_3 <= 'P9999')}
      <h1>Member List (&nbsp;<?php print $queryCountAll; ?>&nbsp;)</h1>
    {if:elseif segment_4 != 'event' AND segment_3 != ''}
      <h1>{exp:weblog:categories weblog="sponsors" style="linear" show="{segment_3}"}{category_name}{/exp:weblog:categories} (&nbsp;<?php print $queryCountCat; ?>&nbsp;)</h1>
    {if:elseif segment_4 == 'event'}
      <h1>{exp:weblog:entries weblog="events" category="{embed:sponsor_number}" entry_id="{segment_3}" limit="1" show_future_entries="yes" dynamic="off" status="open|closed"}{title}{/exp:weblog:entries} (&nbsp;<?php print $queryCountEvent; ?>&nbsp;)</h1>
    {/if}
  </div>
  <div class="grid23 clearfix">
    <div class="main left">
      <p>Click on a member to see more information about them or click <a href="/sponsors/invite">here</a> to invite new members.</p>
      <p>To email your members, click the button below or choose one of the filters on the right.</p>
      <p class="button-wrap">
        <a href="/sponsors/send-email{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" class="super secondary button"><span>Email Members</span></a>
      </p>
      <div class="row-header clearfix">
        <div class="left"><strong>Username</strong> ( <span class="exp-col exp">show details</span><span class="exp-col col" style="display:none;">hide details</span> )</div>
        <div class="right"><strong>Join Date</strong></div>
      </div>
      <ul id="listing">
      {if segment_3 == '' || (segment_3 <= 'P9999' && segment_3 >= 'P0')}{!-- Main Member Listing --}
        <?php listMembers($queryCountAll, $queryResultsAll); ?>
      {if:elseif segment_3 && segment_4 == ""}{!-- Category Member Listing --}
        <?php listMembers($queryCountCat, $queryResultsCat); ?>
      {if:elseif segment_3 && segment_4 == 'event'}{!-- Event Member Listing --}
        <?php listMembers($queryCountEvent, $queryResultsEvent); ?>
      {/if}
      </ul>
    </div>
    
    <div class="sidebar right">
      <div class="bar">Filter Members</div>
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" limit="1" show_future_entries="yes" dynamic="off" status="open|closed"}
        <h2>Events</h2>
        <ul>
      {/exp:weblog:entries}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" show_future_entries="yes" dynamic="off" orderby="event_start_date" sort="asc" status="open|closed"}
        {exp:query sql="
          SELECT COUNT(*) AS total
            FROM exp_members
              INNER JOIN member_relations
              ON exp_members.member_id = member_relations.member_id
              
              INNER JOIN exp_member_data
              ON exp_members.member_id = exp_member_data.member_id
              
              INNER JOIN exp_weblog_titles
              ON member_relations.related_id = exp_weblog_titles.entry_id
              
              INNER JOIN exp_category_posts
              ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
              
            WHERE member_relations.related_id = {entry_id}
            AND exp_category_posts.cat_id = {embed:sponsor_number}"}
          <?php if ("{total}" == "0") {  } else { ?><li>{if segment_3 == entry_id}<strong>{/if}<a href="/sponsors/email-members/{entry_id}/event" title="{title}">{title} (&nbsp;{total}&nbsp;)</a>{if segment_3 == entry_id}</strong>{/if}</li><?php } ?>
        {/exp:query}
      {/exp:weblog:entries}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" limit="1" show_future_entries="yes" dynamic="off" status="open|closed"}
        </ul>
      {/exp:weblog:entries}
      
      <h2>Interests</h2>
      <ul><?php $interests = array(); ?>
      {exp:weblog:categories weblog="sponsors" style="linear" category_group="14|15"}
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
                    OR exp_member_data.m_field_id_7 = {embed:sponsor_zipcode} )
              
            UNION DISTINCT
            
              SELECT exp_members.member_id
                FROM exp_members
                  INNER JOIN member_relations
                  ON exp_members.member_id = member_relations.member_id
                  
                  INNER JOIN exp_user_category_posts
                  ON exp_members.member_id = exp_user_category_posts.member_id
                  
                  INNER JOIN exp_weblog_titles
                  ON member_relations.related_id = exp_weblog_titles.entry_id
                  
                  INNER JOIN exp_category_posts
                  ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
                  
                WHERE exp_category_posts.cat_id = {embed:sponsor_number}
                AND exp_user_category_posts.cat_id = {category_id}
          ) a"}
      <?php if ("{total}" == "0") {  } else { $interests[] = new Interest("{category_id}", "{category_name}", "{total}"); } ?>
      {/exp:query}
      {/exp:weblog:categories}
<?php
usort($interests, "Interest::compare");
for ($i = (count($interests) - 1); $i > -1; $i--)
{
  $interest =& $interests[$i];
  print "\t\t\t\t".'<li>';
  if ( $interest->path == "{segment_3}" )
  {
    print '<strong>';
  }
  
  print '<a href="/sponsors/email-members/'.$interest->path.'" title="'.$interest->category_name.'">'.$interest->category_name.' (&nbsp;'.$interest->total.'&nbsp;)</a>';
  
  if ( $interest->path == "{segment_3}" )
  {
    print '</strong>';
  }
  print '</li>'."\n";
}
?>
      </ul>
      <h2>More Info</h2>
      <ul><?php $more_info = array(); ?>
      {exp:weblog:categories weblog="sponsors" style="linear" category_group="16"}
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
                    OR exp_member_data.m_field_id_7 = {embed:sponsor_zipcode} )
              
            UNION DISTINCT
            
              SELECT exp_members.member_id
                FROM exp_members
                  INNER JOIN member_relations
                  ON exp_members.member_id = member_relations.member_id
                  
                  INNER JOIN exp_user_category_posts
                  ON exp_members.member_id = exp_user_category_posts.member_id
                  
                  INNER JOIN exp_weblog_titles
                  ON member_relations.related_id = exp_weblog_titles.entry_id
                  
                  INNER JOIN exp_category_posts
                  ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
                  
                WHERE exp_category_posts.cat_id = {embed:sponsor_number}
                AND exp_user_category_posts.cat_id = {category_id}
          ) a"}
          <?php if ("{total}" == "0") {  } else { $more_info[] = new Interest("/sponsors/email-members/{category_id}", "{category_name}", "{total}"); } ?>
        {/exp:query}
      {/exp:weblog:categories}
<?php
usort($more_info, "Interest::compare");
for ($i = (count($more_info) - 1); $i > -1; $i--)
{
  $interest =& $more_info[$i];
  print "\t\t\t\t".'<li><a href="'.$interest->path.'" title="'.$interest->category_name.'">'.$interest->category_name.' (&nbsp;'.$interest->total.'&nbsp;)</a></li>'."\n";
}
?>
      </ul>
    </div>
  </div>