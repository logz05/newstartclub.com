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
    
    echo $microDayBegin ."\n";
    
  }
  
  print_r($history);
  
}

?>

<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="/assets/css/nsc.css" />
<style type="text/css">
/*------------------------------------*\
    $CHART
\*------------------------------------*/
dl.chart{
    position:relative;
    height:150px;
    width: 100%;
}
dl.chart dt,
dl.chart dd{
    position:absolute;
    text-align:center;
}
dl.chart dt{
    top:100%;
}
dl.chart dd{
    bottom:0;
    color:#fff;
    background-color:#09f;
}
</style>
</head>
<body>
<?php

echo "<pre>";
membership(14);
echo "</pre>";
echo Chart::bar(membership(14));

?>
</body>
</html>