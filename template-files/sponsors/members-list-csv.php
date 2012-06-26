<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');
$db = new DBconnect();

$number = $_GET['number'];
$zip = $_GET['zip'];
$cat = $_GET['cat'];
$catname = $_GET['catname'];
$entry_id = $_GET['entry_id'];
$event_name = $_GET['event_name'];

//All Members
if(isset($_GET['all'])){

$filename = $number."-member-list";
$queryAll = '
  SELECT DISTINCT 
    exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8,
    exp_member_data.m_field_id_9,
    exp_member_data.m_field_id_10,
    exp_member_data.m_field_id_7,
    exp_member_data.m_field_id_11,
    exp_member_data.m_field_id_24 AS health_score,
    exp_members.username,
    exp_members.join_date
    
    FROM exp_member_data
    
      INNER JOIN exp_category_posts
      ON exp_category_posts.cat_id = exp_member_data.m_field_id_26
      
      JOIN exp_members
      ON exp_members.member_id = exp_member_data.member_id
  
    WHERE exp_member_data.m_field_id_26 = '.$number.'
  
UNION DISTINCT
            
  SELECT DISTINCT 
    member_relations.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8,
    exp_member_data.m_field_id_9,
    exp_member_data.m_field_id_10,
    exp_member_data.m_field_id_7,
    exp_member_data.m_field_id_11,
    exp_member_data.m_field_id_24 AS health_score,
    exp_members.username,
    exp_members.join_date
    
  FROM member_relations
  
    INNER JOIN exp_category_posts
    ON exp_category_posts.entry_id = member_relations.related_id
    
    JOIN exp_members
    ON exp_members.member_id = member_relations.member_id
    
    JOIN exp_member_data
    ON exp_member_data.member_id = exp_members.member_id

  WHERE exp_category_posts.cat_id = '.$number.'
            
UNION DISTINCT
            
  SELECT 
    exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8,
    exp_member_data.m_field_id_9,
    exp_member_data.m_field_id_10,
    exp_member_data.m_field_id_7,
    exp_member_data.m_field_id_11,
    exp_member_data.m_field_id_24 AS health_score,
    exp_members.username,
    exp_members.join_date

  FROM exp_member_data
    
    JOIN exp_members
    ON exp_members.member_id = exp_member_data.member_id
    WHERE exp_member_data.m_field_id_7 = '.$zip.'
    OR exp_member_data.m_field_id_26 = '.$number.'
                
ORDER BY member_id DESC
      ';

$results = $db->fetch($queryAll);
}
if($_GET['cat'] != ""){
//Category Members
$filename = $number."-".$catname;
$queryCat = '
  SELECT 
    exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8,
    exp_member_data.m_field_id_9,
    exp_member_data.m_field_id_10,
    exp_member_data.m_field_id_7,
    exp_member_data.m_field_id_11,
    exp_member_data.m_field_id_24 AS health_score,
    exp_members.username,
    exp_members.join_date
  FROM exp_members
    INNER JOIN exp_user_category_posts
    ON exp_members.member_id = exp_user_category_posts.member_id
    
    INNER JOIN exp_member_data
    ON exp_members.member_id = exp_member_data.member_id
    
    WHERE exp_user_category_posts.cat_id = '.$cat.'
      AND ( exp_member_data.m_field_id_26 = '.$number.' OR exp_member_data.m_field_id_7 = '.$zip.' )
  
UNION DISTINCT

  SELECT DISTINCT
  	exp_member_data.member_id,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name,
    exp_member_data.m_field_id_8,
    exp_member_data.m_field_id_9,
    exp_member_data.m_field_id_10,
    exp_member_data.m_field_id_7,
    exp_member_data.m_field_id_11,
    exp_member_data.m_field_id_24 AS health_score,
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
      
    WHERE exp_category_posts.cat_id = '.$number.'
    AND exp_user_category_posts.cat_id = '.$cat.'
    
    ORDER BY member_id DESC
      ';

$results = $db->fetch($queryCat);
}
if($_GET['entry_id'] != ""){
	//Event Members
	$filename = $number."-".$event_name;
	$queryEvent = '
	SELECT 
	  exp_member_data.member_id,
	  exp_member_data.m_field_id_3 AS first_name,
	  exp_member_data.m_field_id_4 AS last_name,
	  exp_member_data.m_field_id_8,
	  exp_member_data.m_field_id_9,
	  exp_member_data.m_field_id_10,
	  exp_member_data.m_field_id_7,
	  exp_member_data.m_field_id_11,
	  exp_member_data.m_field_id_24 AS health_score,
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
	  
	WHERE member_relations.related_id = '.$entry_id.'
	AND exp_category_posts.cat_id = '.$number.'
	ORDER BY member_id DESC
	      ';
	      
	$results = $db->fetch($queryEvent);
}
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=".$filename.".csv");
header("Pragma: no-cache");
header("Expires: 0");


outputCSV($results);

function outputCSV($data) {
    $outstream = fopen("php://output", "w");
    function __outputCSV(&$vals, $key, $filehandler) {
        fputcsv($filehandler, $vals); // add parameters if you want
    }
    array_walk($data, "__outputCSV", $outstream);
    fclose($outstream);
}

?>