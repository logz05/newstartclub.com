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
      <h1>Member List (&nbsp;<?php print $count; ?>&nbsp;){/exp:query}</h1>
    {if:elseif segment_4 != 'event' AND segment_3 != ''}
      <h1>{exp:weblog:categories weblog="{embed:channel}" style="linear" show="{segment_3}"}{category_name}{/exp:weblog:categories}
      {exp:query 
        sql="SELECT count(member_id) AS total FROM (
            SELECT exp_members.member_id
                FROM exp_members
                  INNER JOIN exp_user_category_posts
                  ON exp_members.member_id = exp_user_category_posts.member_id
                  
                  INNER JOIN exp_member_data
                  ON exp_members.member_id = exp_member_data.member_id
                  
                  WHERE exp_user_category_posts.cat_id = {segment_3}
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
                AND exp_user_category_posts.cat_id = {segment_3}
          ) a"}(&nbsp;{total}&nbsp;){/exp:query}</h1>
    {if:elseif segment_4 == 'event'}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" entry_id="{segment_3}" limit="1"}
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
            
          WHERE member_relations.related_id = {segment_3}
          AND exp_category_posts.cat_id = {embed:sponsor_number}"}<h1>{title} (&nbsp;{total}&nbsp;)</h1>
          {/exp:query}
      {/exp:weblog:entries}
    {/if}
  </div>
  <div class="grid23 clearafter">
    <div class="left">
      <p>Click on a member to see more information about them or click <a href="{path='{embed:channel}/invite-members'}">here</a> to invite new members.</p>
      <p>To email your members, click the button below or choose one of the filters on the right.</p>
      <p class="button-wrap">
        <a href="{path='{embed:channel}/email/{segment_3}/{segment_4}'}" class="super secondary button"><span>Email Members</span></a>
      </p>
      {if segment_3 == '' && (segment_3 >= 'P0' && segment_3 <= 'P9999') && segment_4 != 'event' }<form method="post" action="{path='{embed:channel}/{segment_2}/{segment_3}/{segment_4}/'}" class="clear">
       
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
              
            {exp:user:users limit="1" orderby="join_date" sort="asc" dynamic_parameters="yes" member_id="{member_id}"}
              
              <li class="row">
                <h1 class="username">{username}</h1>
                <div class="date">
                  <span class="timeago"><?php echo distanceOfTimeInWords('{join_date}', '{current_time}', true); ?></span>
                  <span class="join-date">{join_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
                </div>
                <div class="details">
                  <p><?php echo ucwords(strtolower("{firstName} {lastName}")); ?><br />
                  {if address != ""}<?php echo ucwords("{address}"); ?><br />
                  {/if}{if city != ""}<?php echo ucwords(strtolower("{city}")); ?>,{/if}{if state != "--"} {state}{/if} {zipCode}</p>
                  {if phone != ""}<p>Phone: {phone}</p>{/if}
                  {if memberScoreTotal}<p>Health Score: {memberScoreTotal}</p>{/if}
                  {if logged_in_group_id == "1"}
                    <div class="admin_info">
                      <p><strong>Admin Information</strong></p>
                      <p>
                        <strong>Member ID:</strong> {member_id}{if group_id == "1"} <em>Administrator</em>{/if}{if group_id == "13"} <em>Club Sponsor</em>{/if}<br />
                        {if sponsor_number_credit != ''}<strong>Sponsor Credit:</strong> 
                        {exp:weblog:categories category_group="24" weblog="locations" show="{sponsor_number_credit}" style="linear"}
                          {category_name}, {category_id}
                        {/exp:weblog:categories}<br />{/if}
                        <strong>In this list because of:</strong> 
                        {if sponsor_number_credit == '{embed:sponsor_number}'}matching sponsor number{/if}
                        {if zipCode == '{embed:sponsor_zipcode}'}matching zip code{/if}<br />
                        <strong>Interests:</strong>
                        {categories group_id="14|15|16" backspace="2"}
                        {category_body}{category_name}, {/category_body}
                        {/categories}
                      </p>
                    </div>
                  {/if}
                </div>
              </li>
              
              {paginate}
                {if "{total_pages}" > 1}
                  <li class="pagination">
                    <p>{pagination_links}</p>
                  </li>
                {/if}
              {/paginate}
            {/exp:user:users}
          {/exp:query}
          </ul>
    {if:elseif segment_3 != '' AND segment_4 == 'event'}{!-- Event Member Listing --}
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
                
              WHERE member_relations.related_id = {segment_3}
              AND exp_category_posts.cat_id = {embed:sponsor_number}
              ORDER BY member_id DESC" limit="5000" paginate="bottom"}

            {exp:user:users limit="1" orderby="join_date" sort="asc" dynamic_parameters="yes" member_id="{member_id}"}
              
              <li class="row">
                <h1 class="username">{username}</h1>
                <div class="date">
                  <span class="timeago"><?php echo distanceOfTimeInWords('{join_date}', '{current_time}', true); ?></span>
                  <span class="join-date">{join_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
                </div>
                <div class="details">
                  <p><?php echo ucwords(strtolower("{firstName} {lastName}")); ?><br />
                  {if address != ""}<?php echo ucwords("{address}"); ?><br />
                  {/if}{if city != ""}<?php echo ucwords(strtolower("{city}")); ?>,{/if}{if state != "--"} {state}{/if} {zipCode}</p>
                  {if phone != ""}<p>Phone: {phone}</p>{/if}
                  {if logged_in_group_id == "1"}
                    <div class="admin_info">
                      <p><strong>Admin Information</strong></p>
                      <p>
                        <strong>Member ID:</strong> {member_id}{if group_id == "1"} <em>Administrator</em>{/if}{if group_id == "13"} <em>Club Sponsor</em>{/if}<br />
                        {if sponsor_number_credit != ''}<strong>Sponsor Credit:</strong> 
                        {exp:weblog:categories category_group="24" weblog="locations" show="{sponsor_number_credit}" style="linear"}
                          {category_name}, {category_id}
                        {/exp:weblog:categories}<br />{/if}
                        <strong>In this list because of:</strong> 
                        {if sponsor_number_credit == '{embed:sponsor_number}'}matching sponsor number{/if}
                        {if zipCode == '{embed:sponsor_zipcode}'}matching zip code{/if}<br />
                        <strong>Interests:</strong>
                        {categories group_id="14|15|16" backspace="2"}
                        {category_body}{category_name}, {/category_body}
                        {/categories}
                      </p>
                    </div>
                  {/if}
                </div>
              </li>
              
              {paginate}
                {if "{total_pages}" > 1}
                  <div class="pagination">
                    <p>{pagination_links}</p>
                  </div>
                {/if}
              {/paginate}
            {/exp:user:users}
            
          {/exp:query}
          </ul>
    {if:elseif segment_3 != ''}{!-- Category Member Listing --}
          <ul>
        {exp:query 
        sql="SELECT exp_members.member_id
              FROM exp_members
                INNER JOIN exp_user_category_posts
                ON exp_members.member_id = exp_user_category_posts.member_id
                
                INNER JOIN exp_member_data
                ON exp_members.member_id = exp_member_data.member_id
                
                WHERE exp_user_category_posts.cat_id = {segment_3}
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
              AND exp_user_category_posts.cat_id = {segment_3}
              
              ORDER BY member_id DESC" limit="5000" paginate="bottom"}
          {exp:user:users limit='1' dynamic_parameters='yes' member_id='{member_id}'}
            <li class="row">
              <h1 class="username">{username}</h1>
              <div class="date">
                <span class="timeago"><?php echo distanceOfTimeInWords('{join_date}', '{current_time}', true); ?></span>
                <span class="join-date">{join_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
              </div>
              <div class="details">
                <p><?php echo ucwords(strtolower("{firstName} {lastName}")); ?><br />
                {if address != ""}<?php echo ucwords("{address}"); ?><br />
                {/if}{if city != ""}<?php echo ucwords(strtolower("{city}")); ?>,{/if}{if state != "--"} {state}{/if} {zipCode}</p>
                {if phone != ""}<p>Phone: {phone}</p>{/if}
                {if logged_in_group_id == "1"}
                  <div class="admin_info">
                    <p><strong>Admin Information</strong></p>
                    <p>
                      <strong>Member ID:</strong> {member_id}{if group_id == "1"} <em>Administrator</em>{/if}{if group_id == "13"} <em>Club Sponsor</em>{/if}<br />
                      {if sponsor_number_credit != ''}<strong>Sponsor Credit:</strong> 
                      {exp:weblog:categories category_group="24" weblog="locations" show="{sponsor_number_credit}" style="linear"}
                        {category_name}, {category_id}
                      {/exp:weblog:categories}<br />{/if}
                      <strong>In this list because of:</strong> 
                      {if sponsor_number_credit == '{embed:sponsor_number}'}matching sponsor number{/if}
                      {if zipCode == '{embed:sponsor_zipcode}'}matching zip code{/if}<br />
                      <strong>Interests:</strong>
                      {categories group_id="14|15|16" backspace="2"}
                      {category_body}{category_name}, {/category_body}
                      {/categories}
                    </p>
                  </div>
                {/if}
              </div>
            </li>
            
            {paginate}
              {if "{total_pages}" > 1}
                <div class="pagination">
                  <p>{pagination_links}</p>
                </div>
              {/if}
            {/paginate}
          {/exp:user:users}
        {/exp:query}
        </ul>
        {/if}
      </div>
    </div><!-- /.left -->
    
    <div class="sidebar right">
      <div class="bar">Filter Members</div>
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" limit="1"}
        <h2>Events</h2>
        <ul>
      {/exp:weblog:entries}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}"}
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
          <?php if ("{total}" == "0") {  } else { ?><li><a href="{path='{embed:channel}/{segment_2}/{entry_id}/event/'}" title="{title}">{exp:char_limit total="15"}{title}{/exp:char_limit} (&nbsp;{total}&nbsp;)</a></li><?php } ?>
        {/exp:query}
      {/exp:weblog:entries}
      {exp:weblog:entries weblog="events" category="{embed:sponsor_number}" limit="1"}
        </ul>
      {/exp:weblog:entries}
      
      <h2>Interests</h2>
      <ul><?php $interests = array(); ?>
      {exp:weblog:categories weblog="{embed:channel}" style="linear" category_group="14|15"}
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
      <?php if ("{total}" == "0") {  } else { $interests[] = new Interest("{path='{embed:channel}/{segment_2}/{category_id}/'}", "{category_name}", "{total}"); } ?>
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
      {exp:weblog:categories weblog="{embed:channel}" style="linear" category_group="16"}
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
          <?php if ("{total}" == "0") {  } else { $more_info[] = new Interest("{path='{embed:channel}/email-members/{category_id}/'}", "{category_name}", "{total}"); } ?>
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