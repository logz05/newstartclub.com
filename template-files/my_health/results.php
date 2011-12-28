<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');

function resultsPieChart($low, $high) {
  $db = new DBconnect();
  
  if ($low == 0) {
    $querySubTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 < '. $high .' AND m_field_id_24 != ""';
  } else {
    $querySubTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 < '. $high .' AND m_field_id_24 >= '. $low;
  }
  $queryGrandTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 != ""';
  
  $subTotal = $db->fetch($querySubTotal);
  $subTotalCount = count($subTotal);
  
  $grandTotal = $db->fetch($queryGrandTotal);
  $grandTotalCount = count($grandTotal);
  
  $percent = ( $subTotalCount / $grandTotalCount ) * 100;
  
  print $percent;
}

?>
{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="{section}"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
{exp:user:stats}
  <?php
    $hsAge = "{memberAge}";
    $hsWeight = "{memberWeight}";
    $hsHeightFeet = "{memberHeightFeet}";
    $hsHeightInches = "{memberHeightInches}";
    $hsWaistSize = "{memberWaistSize}";
    $hsSleep = "{memberSleep}";
    $hsExercise = "{memberExercise}";
    $hsSmoking = "{memberSmoking}";
    $hsAlcohol = "{memberAlcohol}";
    $hsBreakfast = "{memberBreakfast}";
    $hsSnacking = "{memberSnacking}";
    $hsEmotional = "{memberEmotional}";
    
    $hsHeightTotal = ($hsHeightFeet*12)+$hsHeightInches;
    
    $hsWaistPoints = 11 - ( abs(( $hsWaistSize / $hsHeightTotal ) - .45 ) * 60 );
    
    $hsHealthyWeightLow = round((18.5/703)*($hsHeightTotal*$hsHeightTotal));
    $hsHealthyWeightHigh = round((24.9/703)*($hsHeightTotal*$hsHeightTotal));
    
    $bmi = ($hsWeight/($hsHeightTotal*$hsHeightTotal))*703;
    $bmiPoints = 11 - abs($bmi - 21.7);
    $hsTotal = round(($hsSleep + $hsExercise + $hsSmoking + $hsAlcohol + $hsBreakfast + $hsSnacking + $hsEmotional + $bmiPoints + $hsWaistPoints), 1);
  ?>
  {if memberScoreTotal == ""}
    {redirect="my_health/calculator"}
  {/if}
{/exp:user:stats}

<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>Health Score Results</h1>
</div>

<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry">
    {exp:user:stats}
      <h2>My Health Score:</h2>
      <h1 id="total-score" class="{if memberScoreTotal > '90'}one{if:elseif memberScoreTotal < '90' AND memberScoreTotal >= '80'}two{if:elseif memberScoreTotal >= '70' AND memberScoreTotal < '80'}three{if:elseif memberScoreTotal >= '60' AND  memberScoreTotal < '70'}four{if:elseif memberScoreTotal < '60'}five{/if}">{memberScoreTotal}</h1>
      <p class="button-wrap">
        <a href="/{channel}/calculator" class="super secondary button"><span>Recalculate</span></a>
      </p>
      <h3>Summary</h3>
      <p>According to your health score, you have a  <?php echo 100 - $hsTotal; ?>% risk of developing a lifestyle related disease such as heart disease, cancer, or diabetes.</p>
        
      <h2>Recommendations</h2>
      <ul id="recommendations">
        {if memberSleep != "11"}<li><a href="/resources/living-better/rest">Get 7-8 hours of sleep nightly</a></li>{/if}
        {if memberExercise != "13"}<li><a href="/resources/living-better/exercise">Exercise regularly</a></li>{/if}
        {if memberSmoking != "11"}<li><a href="/resources/health-conditions/addictions">Don&rsquo;t smoke</a></li>{/if}
        {if memberAlcohol != "11"}<li><a href="/resources/health-conditions/addictions">Don&rsquo;t drink alcohol</a></li>{/if}
        {if memberBreakfast != "10"}<li><a href="/resources/media/recipe">Eat breakfast daily</a></li>{/if}
        {if memberSnacking != "11"}<li><a href="/resources/living-better/temperance">Don&rsquo;t eat between meals</a></li>{/if}
        {if memberEmotional != "11"}<li><a href="/resources/living-better/emotional-wellbeing">Boost your EQ</a></li>{/if}
        <?php if ( $hsWeight > $hsHealthyWeightHigh || $hsWeight < $hsHealthyWeightLow ) { ?>
          <li><a href="/resources/health-conditions/obesity">Maintain a healthy weight between <?php echo $hsHealthyWeightLow . '-' . $hsHealthyWeightHigh . ' lbs.'; ?></a></li>
        <?php } ?>
        <?php if ( ($hsWaistSize / $hsHeightTotal ) < 0.4 || ($hsWaistSize / $hsHeightTotal ) > 0.5 ) { ?>
          <li><a href="/resources/health-conditions/obesity">Maintain a healthy waist size between <?php echo round($hsHeightTotal * 0.4) . '-' . round($hsHeightTotal * 0.5) . ' in.'; ?></a></li>
        <?php } ?>
        <?php if ( $hsTotal < 70 ) { ?>
          <li><a href="http://www.newstart.com">Consider attending a NEWSTART&reg; Lifestyle Program</a></li>
        <?php } ?>
          <li><a href="/resources/detail/what-is-newstart/">Continue following the NEWSTART&reg; Plan</a></li>
      </ul>
          
      <p class="button-wrap">
        <a href="/my_health/request-more-info" class="super green button"><span>Tell me more</span></a>
      </p>
    {/exp:user:stats} 
    </div>
  </div>
  <div class="sidebar right">
    <div class="bar">Member Scores</div>
    <img src="https://chart.googleapis.com/chart?cht=p&chs=180x180&chd=t:<?php resultsPieChart(90, 100) ?>,<?php resultsPieChart(80, 90) ?>,<?php resultsPieChart(70, 80) ?>,<?php resultsPieChart(60, 70) ?>,<?php resultsPieChart(0, 60) ?>&chp=4.712389&chco=89B95A|5D83DA|ECE90E|F2B32F|D24C4D" />
    <h2>Risk Level</h2>
    <ul id="chart-legend">
      {exp:user:stats}
        <li><span class="bullet one">&bull;</span> {if memberScoreTotal >= '90'}<strong>{/if}90-100 = Very Low{if memberScoreTotal >= '90'}</strong>{/if}</li>
        <li><span class="bullet two">&bull;</span> {if memberScoreTotal >= '80' AND memberScoreTotal < '90'}<strong>{/if} 80-89 = Low{if memberScoreTotal >= '80' AND memberScoreTotal < '90'}</strong>{/if}</li>
        <li><span class="bullet three">&bull;</span> {if memberScoreTotal < '80' AND memberScoreTotal >= '70'}<strong>{/if}70-79 = Medium{if memberScoreTotal < '80' AND memberScoreTotal >= '70'}</strong>{/if}</li>
        <li><span class="bullet four">&bull;</span> {if memberScoreTotal < '70' AND memberScoreTotal >= '60'}<strong>{/if}60-69 = High{if memberScoreTotal < '70' AND memberScoreTotal >= '60'}</strong>{/if}</li>
        <li><span class="bullet five">&bull;</span> {if memberScoreTotal < '60'}<strong>{/if}59 and lower = Very High{if memberScoreTotal < '60'}</strong>{/if}</li>
      {/exp:user:stats}
    </ul>
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}