<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

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
  
/*   return($history); */
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
  
/*   return($history); */
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
  
/*   return($history); */
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

  print "['$rangeLow-$rangeHigh', $count]";
}




?>

{embed="embeds/_doc-top" 
  title="{section}"
  section="{section}"
  channel="{channel}"
}
{assign_variable:channel="super-admin"}
{assign_variable:section="Super Admin"}
<div class="heading clearfix">
  <h1>{section} Statistics</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <h2>Top 200 Geographical Locations</h2>
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
        SELECT CONCAT(m_field_id_9, ', ', m_field_id_10) AS location, COUNT(*) AS total FROM exp_member_data
          WHERE m_field_id_10 != ''
          AND m_field_id_10 != '--'
          AND m_field_id_9 != ''
          
          GROUP BY location
          ORDER BY total DESC
          LIMIT 200"}
        ["{location}", {total}],{/exp:query}
      ]);
  
      var options = {
        width: '530', height: '320',
        region: 'US', 
        resolution: 'provinces',
        displayMode: 'markers', 
        colorAxis: {colors: ['green', 'yellow', 'orange', 'red']},
        backgroundColor: 'transparent'
      };
  
      var chart = new google.visualization.GeoChart(document.getElementById('member-map'));
      chart.draw(data, options);
    };
    </script>
    <div id="member-map"></div>
<!--     <iframe width="490px" height="300px" scrolling="no" src="{path='{channel}/member-map'}"></iframe> -->
<!--     <p>Map last updated on June 28<sup>th</sup>, 2011</p> -->
  
    <h2 id="total-members">
      {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_members WHERE group_id = '9'"}
        {total} Total Members
      {/exp:query}
    </h2>
    
    <h2>Monthly Overview</h2>
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
            <?php
              $db = new DBconnect();
              $query = 'SELECT member_id AS total FROM exp_members WHERE join_date > '. (strtotime("today -30 days") + 25200);
              
              echo count($db->fetch($query));
              
              $db = null;
            
            ?> <span>Members</span>
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
            <?php
              $db = new DBconnect();
              $query = 'SELECT comment_id AS total FROM exp_comments WHERE comment_date > '. (strtotime("today -30 days") + 25200);
              
              echo count($db->fetch($query));
              
              $db = null;
            
            ?>
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
                {exp:weblog:categories weblog="sponsors" style="linear" show="{interest}"}['{category_name}', {total}],{/exp:weblog:categories}{/exp:query}
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
            <tr>{exp:weblog:categories weblog="sponsors" style="linear" show="{interest}"}
              <td>{category_name}</td>
              <td class="total">{total}</td>{/exp:weblog:categories}
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
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 20 AND m_field_id_13 >= 13"}['13-20',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 30 AND m_field_id_13 >= 21"}['21-30',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 40 AND m_field_id_13 >= 31"}['31-40',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 50 AND m_field_id_13 >= 41"}['41-50',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 60 AND m_field_id_13 >= 51"}['51-60',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 70 AND m_field_id_13 >= 61"}['61-70',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 80 AND m_field_id_13 >= 71"}['71-80',{total}]{/exp:query},
              {exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 100 AND m_field_id_13 >= 81"}['81-100',{total}]{/exp:query}
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
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 20 AND m_field_id_13 >= 13"}<td>13-20</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 30 AND m_field_id_13 >= 21"}<td>21-30</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 40 AND m_field_id_13 >= 31"}<td>31-40</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 50 AND m_field_id_13 >= 41"}<td>41-50</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 60 AND m_field_id_13 >= 51"}<td>51-60</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 70 AND m_field_id_13 >= 61"}<td>61-70</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 80 AND m_field_id_13 >= 71"}<td>71-80</td><td class="total">{total}</td>{/exp:query}</tr>
            <tr>{exp:query sql="SELECT COUNT(member_id) AS total FROM exp_member_data WHERE m_field_id_13 <= 100 AND m_field_id_13 >= 81"}<td>81-100</td><td class="total">{total}</td>{/exp:query}</tr>
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
                SELECT m_field_id_31 AS referral, COUNT(*) AS total FROM exp_member_data
                  WHERE m_field_id_31 != ''
                  AND m_field_id_31 != 'Select One'
                  
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
              SELECT COUNT(m_field_id_31) AS total FROM exp_member_data
                WHERE m_field_id_31 != ''
                AND m_field_id_31 != 'Select One'"}{total}{/exp:query}
          <span>Referrals</span></h3>
        </a>
        <div class="table-stats">
          <table>
          {exp:query sql="
            SELECT m_field_id_31 AS referral, COUNT(*) AS total FROM exp_member_data
              WHERE m_field_id_31 != ''
              AND m_field_id_31 != 'Select One'
              
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
  
    <h2><strong>Locations - {exp:query sql="SELECT COUNT(*) AS total FROM exp_weblog_titles WHERE exp_weblog_titles.weblog_id = 31"}{total}{/exp:query}</strong></h2>
    <table>
      <thead>
        <tr>
          <td>Sponsor #</td>
          <td>Location Name</td>
          <td>Total Members</td>
        </tr>
      </thead>
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
          <tr class="{switch='odd|even'}">
            <td>{categories}{category_id}{/categories}</td>
            <td><a href="{url_title_path='locations/detail'}">{title}</a></td>
            <td class="total">{total}</td>
          </tr>
        {/exp:query}
      {/exp:weblog:entries}
    </table>
    
    <h2>Events</h2>
    <ul>
    {exp:weblog:entries weblog="events" show_expired="no" show_future_entries="yes"}
        <li>{entry_id} - <a href="{url_title_path='events/detail'}">{title}</a>
      {exp:query sql="
        SELECT count(*) AS total
          FROM member_relations
          WHERE member_relations.related_id = {entry_id} ORDER BY related_id asc"}
          (&nbsp;{total}&nbsp;)</li>
      {/exp:query}
    {/exp:weblog:entries}
    </ul>
    
    
    
    <h2>Pages Shared on Facebook</h2>
    
    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <fb:recommendations site="www.newstartclub.com" width="480" height="400" header="true"></fb:recommendations>
    
  </div>
  <div class="sidebar right">
    <div class="bar">{section}</div>
    {!--<h2>Interests</h2>
    <ul>
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
          OR exp_user_category_posts.cat_id = '315'
          
          GROUP BY interest
          ORDER BY total DESC, interest ASC"}
        <li>{exp:weblog:categories weblog="sponsors" style="linear" show="{interest}"}{category_name} (&nbsp;{total}&nbsp;) {/exp:weblog:categories}</li>
      {/exp:query}
    </ul>
    
    <h2>More Info</h2>
    <ul>
      {exp:query 
      sql="
        SELECT cat_id AS interest, COUNT(*) AS total 
          FROM exp_user_category_posts

          WHERE exp_user_category_posts.cat_id = '112'
          OR exp_user_category_posts.cat_id = '113'
          OR exp_user_category_posts.cat_id = '114'
          OR exp_user_category_posts.cat_id = '115'
          OR exp_user_category_posts.cat_id = '116'
          
          GROUP BY interest
          ORDER BY total DESC, interest ASC"}
        <li>{exp:weblog:categories weblog="sponsors" style="linear" show="{interest}"}{category_name} (&nbsp;{total}&nbsp;) {/exp:weblog:categories}</li>
      {/exp:query}
    </ul>--}
      
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
          <li><a href="http://www.google.com/search?q={m_field_id_7}" title="Google search {m_field_id_7}">{m_field_id_7} (&nbsp;{total}&nbsp;)</a></li>
        {/exp:query}
      </ul>
      <h2>Referral</h2>
      <ul>
        {exp:query sql="
          SELECT m_field_id_31 AS referral, COUNT(*) AS total FROM exp_member_data
            WHERE m_field_id_31 != ''
            AND m_field_id_31 != 'Select One'
            
            GROUP BY referral 
            ORDER BY total DESC, referral ASC"}
            <li>{referral} (&nbsp;{total}&nbsp;)</li>
        {/exp:query}
      </ul>
      
      <h2>Newsletter</h2>
      <ul>
        <li><a href="http://newsletter.foxepractice.com/reports/wv/r/C1DEF0ABEB2C3FD3">Fall 2011</a></li>
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
  </div>
</div>
{embed="embeds/_doc-bottom" script_add="super-admin"}