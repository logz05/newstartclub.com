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
{embed="includes/_doc-top" 
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

<div class="body">

{!--<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load('visualization', '1.1', {packages: ['controls']});
</script>
<script type="text/javascript">
  function drawVisualization() {
    // Prepare the data
    var data = google.visualization.arrayToDataTable([
      ['Name', 'Donuts eaten'],
      {exp:query sql="SELECT m_field_id_24 FROM exp_member_data WHERE m_field_id_24 > '0'" backspace="2"}
        ['Michael' , {m_field_id_24}],
      {/exp:query}
    ]);
  
    // Define a slider control for the 'Donuts eaten' column
    var slider = new google.visualization.ControlWrapper({
      'controlType': 'NumberRangeFilter',
      'containerId': 'control1',
      'options': {
        'filterColumnLabel': 'Donuts eaten',
        'ui': {'labelStacking': 'vertical'}
      }
    });
  
    // Define a pie chart
    var piechart = new google.visualization.ChartWrapper({
      'chartType': 'PieChart',
      'containerId': 'chart1',
      'options': {
        'width': 600,
        'height': 300,
        'legend': 'bottom',
        'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
        'pieSliceText': 'value'
      }
    });
  
    // Create the dashboard.
    new google.visualization.Dashboard(document.getElementById('dashboard')).
      // Configure the slider to affect the piechart
      bind(slider, piechart).
      // Draw the dashboard
      draw(data);
  }
  

  google.setOnLoadCallback(drawVisualization);
</script>--}
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>Health Score Results</h1>
  </div>
  
  <div class="grid23 clearafter">
    <div class="list left">
    {exp:user:stats}

    <h2>My Health Score:</h2>
    <h1 id="total-score" class="{if memberScoreTotal > '90'}one{if:elseif memberScoreTotal < '90' AND memberScoreTotal >= '80'}two{if:elseif memberScoreTotal >= '70' AND memberScoreTotal < '80'}three{if:elseif memberScoreTotal >= '60' AND  memberScoreTotal < '70'}four{if:elseif memberScoreTotal < '60'}five{/if}">{memberScoreTotal}</h1>
    <p class="button-wrap clear">
      <a href="/{channel}/calculator/" class="super secondary button"><span>Recalculate</span></a>
    </p>
    
    <div class="clear" id="recommendations">
      
        <h2>Recommendations</h2>
        <ul>
          {if memberSleep != "11"}
            <li>
              <a href="{site_url}resources/living-better/rest/">Get 7-8 hours of sleep nightly</a>
            </li>
          {/if}
          {if memberExercise != "13"}
            <li>
              <a href="{site_url}resources/living-better/exercise/">Exercise regularly</a>
            </li>
          {/if}
          {if memberSmoking != "11"}
            <li>
              <a href="{site_url}resources/health-conditions/addictions/">Don&rsquo;t smoke</a>
            </li>
          {/if}
          {if memberAlcohol != "11"}
            <li>
              <a href="{site_url}resources/health-conditions/addictions/">Don&rsquo;t drink alcohol</a>
            </li>
          {/if}
          {if memberBreakfast != "10"}
            <li>
              <a href="{site_url}resources/media/recipe/">Eat breakfast daily</a>
            </li>
          {/if}
          {if memberSnacking != "11"}
            <li>
              <a href="{site_url}resources/living-better/temperance/">Don&rsquo;t eat between meals</a>
            </li>
          {/if}
          {if memberEmotional != "11"}
            <li>
              <a href="{path='resources/living-better/emotional-wellbeing'}">Boost your EQ</a>
            </li>
          {/if}
          <?php if ( $hsWeight > $hsHealthyWeightHigh || $hsWeight < $hsHealthyWeightLow ) { ?>
            <li><a href="{site_url}resources/health-conditions/obesity/">Maintain a healthy weight between <?php echo $hsHealthyWeightLow . '-' . $hsHealthyWeightHigh . ' lbs.'; ?></a></li>
          <?php } ?>
          <?php if ( ($hsWaistSize / $hsHeightTotal ) < 0.4 || ($hsWaistSize / $hsHeightTotal ) > 0.5 ) { ?>
            <li><a href="{site_url}resources/health-conditions/obesity/">Maintain a healthy waist size between <?php echo round($hsHeightTotal * 0.4) . '-' . round($hsHeightTotal * 0.5) . ' in.'; ?></a></li>
          <?php } ?>
          <?php if ( $hsTotal < 70 ) { ?>
            <li><a href="http://www.newstart.com">Consider attending NEWSTART's 18-day lifestyle program</a></li>
          <?php } ?>
        </ul>
        
        {if memberSleep != "11" || memberExercise != "13" || memberSmoking != "11" || memberAlcohol != "11" || memberBreakfast != "10" || memberSnacking != "11" || memberEmotional != "11"}
          <p class="button-wrap">
            <a href="/my_health/request-more-info/" class="super green button"><span>Tell me more</span></a>
          </p>
      {/if}
      {if memberSleep == "11" AND memberExercise == "13" AND memberSmoking == "11" AND memberAlcohol == "11" AND memberBreakfast == "10" AND memberSnacking == "11" AND memberEmotional == "11"}
      <?php if ( $hsWeight < $hsHealthyWeightHigh && $hsWeight > $hsHealthyWeightLow ) { ?>
        <p>Congratulations! Your health score is excellent. Keep up the good work!</p>
      <?php } ?>
      {/if}
    
    </div>
    {/exp:user:stats} 
    
    </div><!--/.list-->
    <div class="sidebar right">
      <div class="bar">Member Scores</div>
<div id="dashboard">
      <table>
        <tr style='vertical-align: top'>
          <td style='width: 300px; font-size: 0.9em;'>
            <div id="control1"></div>
            <div id="control2"></div>
            <div id="control3"></div>
          </td>
          <td style='width: 600px'>
            <div style="float: left;" id="chart1"></div>
            <div style="float: left;" id="chart2"></div>
            <div style="float: left;" id="chart3"></div>
          </td>
        </tr>
      </table>
    </div>
      <img src="https://chart.googleapis.com/chart?cht=p&chs=180x180&chd=t:<?php resultsPieChart(90, 100) ?>,<?php resultsPieChart(80, 90) ?>,<?php resultsPieChart(70, 80) ?>,<?php resultsPieChart(60, 70) ?>,<?php resultsPieChart(0, 60) ?>&chp=4.712389&chco=89B95A|5D83DA|ECE90E|F2B32F|D24C4D" />
      {exp:user:stats}
        <p><span class="one">&bull;</span> {if memberScoreTotal >= '90'}<strong>{/if}90-100 = Excellent{if memberScoreTotal >= '90'}</strong>{/if}</p>
        <p><span class="two">&bull;</span> {if memberScoreTotal >= '80' AND memberScoreTotal < '90'}<strong>{/if} 80-89 = Very Good{if memberScoreTotal >= '80' AND memberScoreTotal < '90'}</strong>{/if}</p>
        <p><span class="three">&bull;</span> {if memberScoreTotal < '80' AND memberScoreTotal >= '70'}<strong>{/if}70-79 = Good{if memberScoreTotal < '80' AND memberScoreTotal >= '70'}</strong>{/if}</p>
        <p><span class="four">&bull;</span> {if memberScoreTotal < '70' AND memberScoreTotal >= '60'}<strong>{/if}60-69 = Fair{if memberScoreTotal < '70' AND memberScoreTotal >= '60'}</strong>{/if}</p>
        <p><span class="five">&bull;</span> {if memberScoreTotal < '60'}<strong>{/if}59 and lower = Poor{if memberScoreTotal < '60'}</strong>{/if}</p>
      {/exp:user:stats}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="{if logged_out}yes{if:else}{/if}}