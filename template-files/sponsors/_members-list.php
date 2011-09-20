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


$db = new DBconnect();
$query = 'SELECT exp_member_data.member_id AS member_id
          FROM exp_member_data

              INNER JOIN exp_category_posts
              ON exp_category_posts.cat_id = exp_member_data.m_field_id_26

            WHERE exp_category_posts.cat_id = {embed:sponsor_number}

          UNION DISTINCT

            SELECT member_relations.member_id AS member_id
            FROM member_relations

                LEFT JOIN exp_category_posts
                ON exp_category_posts.entry_id = member_relations.related_id

              WHERE exp_category_posts.cat_id = {embed:sponsor_number}

          UNION DISTINCT

            SELECT member_id
            FROM exp_member_data
              WHERE m_field_id_26 = {embed:sponsor_number}

          UNION DISTINCT

            SELECT member_id
            FROM exp_member_data
              WHERE m_field_id_7 = {embed:sponsor_zipcode}
      ';

$ml = $db->fetch($query);
$count = count($ml);



?>
    <div class="heading clearafter"> 
    {if segment_3 == '' || (segment_3 >= 'P0' && segment_3 <= 'P9999')}
      <h1>Member List (&nbsp;<?php print $count; ?>&nbsp;)</h1>
    {if:elseif segment_4 != 'event' AND segment_3 != ''}
      <h1>{exp:weblog:categories weblog="sponsors" style="linear" show="{segment_3_category_id}"}{category_name}{/exp:weblog:categories}
      {exp:query 
        sql="SELECT count(member_id) AS total FROM (
            SELECT exp_members.member_id
                FROM exp_members
                  INNER JOIN exp_user_category_posts
                  ON exp_members.member_id = exp_user_category_posts.member_id
                  
                  INNER JOIN exp_member_data
                  ON exp_members.member_id = exp_member_data.member_id
                  
                  WHERE {if segment_3}exp_user_category_posts.cat_id = {segment_3_category_id}
                    AND {/if}( exp_member_data.m_field_id_26 = {embed:sponsor_number} 
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
                {if segment_3}AND exp_user_category_posts.cat_id = {segment_3_category_id}{/if}
          ) a"}(&nbsp;{total}&nbsp;){/exp:query}</h1>
    {if:elseif segment_4 == 'event'}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" entry_id="{segment_3}" limit="1" dynamic="off"}
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
            
          WHERE {if segment_3}member_relations.related_id = {segment_3}
          AND {/if}exp_category_posts.cat_id = {embed:sponsor_number}"}<h1>{title} (&nbsp;{total}&nbsp;)</h1>
          {/exp:query}
      {/exp:weblog:entries}
    {/if}
  </div>
  <div class="grid23 clearafter">
    <div class="left">
      <p>Click on a member to see more information about them or click <a href="/sponsors/invite">here</a> to invite new members.</p>
      <p>To email your members, click the button below or choose one of the filters on the right.</p>
      <p class="button-wrap">
        <a href="/sponsors/email{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" class="super secondary button"><span>Email Members</span></a>
      </p>
      {if segment_3 == '' && (segment_3 >= 'P0' && segment_3 <= 'P9999') && segment_4 != 'event' }<form method="post" action="/sponsors/{segment_2}/{segment_3}/{segment_4}" class="clear">
       
      <select name="user_orderby">
        <option value="username">Username</option>
        <option value="join_date">Join Date</option>
      </select>
       
      <select name="user_sort">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
      </select>
       
      <input type="submit" value="Sort" />
       
      </form>
      {/if}
      <div class="list">
        <div class="row-header clearafter">
          <div class="cell-left left"><strong>Username</strong> ( <span class="exp_col exp">show details</span><span class="exp_col col" style="display:none;">hide details</span> )</div>
          <div class="cell-right right"><strong>Join Date</strong></div>
        </div>
      
        {if segment_3 == '' || (segment_3 <= 'P9999' && segment_3 >= 'P0')}{!-- Main Member Listing --}
          <ul>
          {exp:query sql="
              SELECT exp_member_data.member_id AS member_id, exp_members.join_date AS join_date
              FROM exp_member_data
                INNER JOIN exp_category_posts
                ON exp_category_posts.cat_id = exp_member_data.m_field_id_26

                INNER JOIN exp_members
                ON exp_member_data.member_id = exp_members.member_id

              WHERE exp_category_posts.cat_id = {embed:sponsor_number}

            UNION DISTINCT

              SELECT member_relations.member_id AS member_id, exp_members.join_date AS join_date
              FROM member_relations
                INNER JOIN exp_category_posts
                ON exp_category_posts.entry_id = member_relations.related_id

                INNER JOIN exp_members
                ON member_relations.member_id = exp_members.member_id

              WHERE exp_category_posts.cat_id = {embed:sponsor_number}

            UNION DISTINCT

              SELECT exp_member_data.member_id AS member_id, exp_members.join_date AS join_date
              FROM exp_member_data
                INNER JOIN exp_members
                ON exp_member_data.member_id = exp_members.member_id
                
              WHERE m_field_id_26 = {embed:sponsor_number}
              
            UNION DISTINCT
            
              SELECT exp_member_data.member_id AS member_id, exp_members.join_date AS join_date
              FROM exp_member_data
                INNER JOIN exp_members
                ON exp_member_data.member_id = exp_members.member_id
                
              WHERE m_field_id_7 = {embed:sponsor_zipcode}
                  
            ORDER BY join_date desc" 
            
            limit="5000" paginate="bottom"
          }
              
            {embed="sponsors/_member-details" member_id="{member_id}"}
            
          {/exp:query}
          </ul>
    {if:elseif segment_3 && segment_4 == 'event'}{!-- Event Member Listing --}
          <ul>
          {exp:query sql="
            SELECT exp_members.member_id
              FROM exp_members
                INNER JOIN member_relations
                ON exp_members.member_id = member_relations.member_id
                
                INNER JOIN exp_member_data
                ON exp_members.member_id = exp_member_data.member_id
                
                INNER JOIN exp_weblog_titles
                ON member_relations.related_id = exp_weblog_titles.entry_id
                
                INNER JOIN exp_category_posts
                ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
                
              WHERE {if segment_3}member_relations.related_id = {segment_3}
              AND {/if}exp_category_posts.cat_id = {embed:sponsor_number}
              ORDER BY member_id DESC" limit="5000" paginate="bottom"}
              
              {embed="sponsors/_member-details" member_id="{member_id}"}
              
          {/exp:query}
          </ul>
    {if:elseif segment_3 && segment_4 == ""}{!-- Category Member Listing --}
          <ul>
        {exp:query 
        sql="SELECT exp_members.member_id
              FROM exp_members
                INNER JOIN exp_user_category_posts
                ON exp_members.member_id = exp_user_category_posts.member_id
                
                INNER JOIN exp_member_data
                ON exp_members.member_id = exp_member_data.member_id
                
                WHERE {if segment_3}exp_user_category_posts.cat_id = {segment_3_category_id}
                  AND {/if}( exp_member_data.m_field_id_26 = {embed:sponsor_number} 
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
              {if segment_3}AND exp_user_category_posts.cat_id = {segment_3_category_id}{/if}
              
              ORDER BY member_id DESC" limit="5000" paginate="bottom"}
          {embed="sponsors/_member-details" member_id="{member_id}"}
        {/exp:query}
        </ul>
        {/if}
      </div>
    </div><!-- /.left -->
    
    <div class="sidebar right">
      <div class="bar">Filter Members</div>
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" limit="1" show_future_entries="yes" dynamic="off"}
        <h2>Events</h2>
        <ul>
      {/exp:weblog:entries}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" show_future_entries="yes" dynamic="off"}
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
          <?php if ("{total}" == "0") {  } else { ?><li><a href="/sponsors/email-members/{entry_id}/event" title="{title}">{exp:char_limit total="15"}{title}{/exp:char_limit} (&nbsp;{total}&nbsp;)</a></li><?php } ?>
        {/exp:query}
      {/exp:weblog:entries}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" limit="1" show_future_entries="yes" dynamic="off"}
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
      <?php if ("{total}" == "0") {  } else { $interests[] = new Interest("/sponsors/email-members/{category_url_title}", "{category_name}", "{total}"); } ?>
      {/exp:query}
      {/exp:weblog:categories}
<?php
usort($interests, "Interest::compare");
for ($i = (count($interests) - 1); $i > -1; $i--)
{
  $interest =& $interests[$i];
  print "\t\t\t\t".'<li><a href="'.$interest->path.'" title="'.$interest->category_name.'">'.$interest->category_name.' (&nbsp;'.$interest->total.'&nbsp;)</a></li>'."\n";
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
          <?php if ("{total}" == "0") {  } else { $more_info[] = new Interest("/sponsors/email-members/{category_url_title}", "{category_name}", "{total}"); } ?>
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
      {if group_id == '1'}
        <h2>Admin Information</h2>
        <p><em>This informations is used for debugging purposes only.</em></p>
        <p>
        <strong>Sponsor Number:</strong> {embed:sponsor_number}<br />
        <strong>Sponsor Zip Code:</strong> {embed:sponsor_zipcode}
        </p>
      {/if}
    </div>
  </div><!-- /.grid23 -->