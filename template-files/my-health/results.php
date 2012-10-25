<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');

function resultsPieChart($low, $high) {
	$db = new DBconnect();
	
	if ($low == 0) {
		$querySubTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_22 < '. $high .' AND m_field_id_22 != ""';
	} else {
		$querySubTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_22 < '. $high .' AND m_field_id_22 >= '. $low;
	}
	
	$subTotal = count($db->fetch($querySubTotal));
	
	print $subTotal;
}

?>
{embed="embeds/_doc-top" 
	class="my-health"
	title="My Health"
}
{exp:user:stats}
<?php
		$hsAge = "{member_age}";
		$hsWeight = "{member_weight}";
		$hsHeightInches = "{member_height_in}";
		$hsWaistSize = "{member_waist_in}";
		$hsSleep = "{member_score_sleep}";
		$hsExercise = "{member_score_exercise}";
		$hsSmoking = "{member_score_smoking}";
		$hsAlcohol = "{member_score_alcohol}";
		$hsDiet = "{member_score_diet}";
		$hsNutrition = "{member_score_nutrition}";
		$hsEmotional = "{member_score_emotional}";
		
		$hsWaistPoints = 11 - ( abs(( $hsWaistSize / $hsHeightInches ) - .45 ) * 60 );
		
		$hsHealthyWeightLow = round((18.5/703)*($hsHeightInches*$hsHeightInches));
		$hsHealthyWeightHigh = round((24.9/703)*($hsHeightInches*$hsHeightInches));
		
		$bmi = ($hsWeight/($hsHeightInches*$hsHeightInches))*703;
		$bmiPoints = 11 - abs($bmi - 21.7);
		$hsTotal = round(($hsSleep + $hsExercise + $hsSmoking + $hsAlcohol + $hsDiet + $hsNutrition + $hsEmotional + $bmiPoints + $hsWaistPoints), 1);

function graphColor($score) {

	if ( $score >= 90 ) {
		echo "#8DBE38";
	} else if ( $score >= 80 && $score < 90 ) {
		echo "#5D83DA";
	} else if ( $score >= 70 && $score < 80 ) {
		echo "#ECE90E";
	} else if ( $score >= 60 && $score < 70 ) {
		echo "#F2B32F";
	} else if ( $score < 60 ) {
		echo "#D24C4D";
	}

}

?>
	{if member_score_total == ""}
		{redirect="my-health/calculator"}
	{/if}
{/exp:user:stats}
{if logged_out}
<?php
	if (isset($_POST['member_age']))
	{
		$hsAge = $_POST['member_age'];
		$hsWeight = $_POST['member_weight'];
		$hsHeightInches = $_POST['member_height_in'];
		$hsWaistSize = $_POST['member_waist_in'];
		$hsSleep = $_POST['member_score_sleep'];
		$hsExercise = $_POST['member_score_exercise'];
		$hsSmoking = $_POST['member_score_smoking'];
		$hsAlcohol = $_POST['member_score_alcohol'];
		$hsDiet = $_POST['member_score_diet'];
		$hsNutrition = $_POST['member_score_nutrition'];
		$hsEmotional = $_POST['member_score_emotional'];
		
		$hsWaistPoints = 11 - ( abs(( $hsWaistSize / $hsHeightInches ) - .45 ) * 60 );
		
		$hsHealthyWeightLow = round((18.5/703)*($hsHeightInches*$hsHeightInches));
		$hsHealthyWeightHigh = round((24.9/703)*($hsHeightInches*$hsHeightInches));
		
		$bmi = ($hsWeight/($hsHeightInches*$hsHeightInches))*703;
		$bmiPoints = 11 - abs($bmi - 21.7);
		$hsTotal = round(($hsSleep + $hsExercise + $hsSmoking + $hsAlcohol + $hsDiet + $hsNutrition + $hsEmotional + $bmiPoints + $hsWaistPoints), 1);
		
		//Save score history for Google chart
		$currentDate = date( 'Y-n-j' );
		
		$currentResults = array();
		
		$currentResults[$currentDate] = $hsTotal;
	
		$scoreHistory = serialize( $currentResults ); // Add calculated result to history
	}
	
function totalScore($score) {

	if ( $score >= 90 ) {
		echo "one";
	} else if ( $score >= 80 && $score < 90 ) {
		echo "two";
	} else if ( $score >= 70 && $score < 80 ) {
		echo "three";
	} else if ( $score >= 60 && $score < 70 ) {
		echo "four";
	} else if ( $score < 60 ) {
		echo "five";
	}

}

?>
{/if}

<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='my-health'}">My Health</a></li>
</ul>
<div class="heading clearfix">
	<h1>Health Score Results</h1>
</div>

<div class="grid23 clearfix">
	<div class="main left">
		{exp:user:stats dynamic="off"}

			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
				google.load("visualization", "1", {packages:["corechart"]});
				google.setOnLoadCallback(drawChart);
				function drawChart() {
					
					var data = new google.visualization.DataTable();
					data.addColumn('date', 'Date');
					data.addColumn('number', 'Score');
					data.addRows([
						<?php
						
						$score_history = unserialize( '{member_score_history}' );

						if ( count($score_history) > 1 ) {
						
							foreach($score_history as $key => $value) {
								$date = explode("-", $key);
								echo "[new Date(" . $date[0] . ", " . ($date[1] - 1) . ", " . $date[2] . "), " . $value . "]," . "\n";
							}
						
						} elseif ( count($score_history) == 1 ) {
						
							foreach($score_history as $key => $value) {
								$date = explode("-", $key);
								echo "[new Date(" . $date[0] . ", " . ($date[1] - 1) . ", " . $date[2] . "), " . $value . "]," . "\n";
							}
							
						} elseif ( count($score_history) < 1 ) {
						
							echo "[new Date(" . date( 'Y' ) . ", " . ( date( 'm' ) - 1 ) . ", " . ( date( 'd' ) - 1 ) . "), " . $hsTotal . "]," . "\n";
							echo "[new Date(" . date( 'Y' ) . ", " . ( date( 'm' ) - 1 ) . ", " . date( 'd' ) . "), " . $hsTotal . "]," . "\n";
						
						}
						
						?>
					]);
			
					var options = {
						width: 490, height: 250,
						hAxis: {format: 'MMM dd, yyyy'},
						vAxis: {maxValue: 100, viewWindowMode: 'explicit', viewWindow: {max: 100}},
						colors: ['<?php graphColor($hsTotal); ?>'],
						chartArea: {height: '75%', width: '90%'},
						legend: {position: 'none'},
						pointSize: 7,
						lineWidth: 4,
						backgroundColor: 'white'
					};
			
					// Create and draw the visualization.
					var chart= new google.visualization.LineChart(document.getElementById('health-score-history'));
					chart.draw(data, options);
				}
			</script>			
			<dl class="tabs">
				<dd><a class="default" rel="current">Current Score</a></dd>
				<dd><a rel="history">Score History</a></dd>
			</dl>
			<ul class="tabs-content">
				<li id="current">
					<h2 id="total-score" class="{if member_score_total > '90'}one{if:elseif member_score_total < '90' AND member_score_total >= '80'}two{if:elseif member_score_total >= '70' AND member_score_total < '80'}three{if:elseif member_score_total >= '60' AND	member_score_total < '70'}four{if:elseif member_score_total < '60'}five{/if}">{member_score_total}</h2>
					<p class="button-wrap">
						<a href="{path='my-health/calculator'}" class="super secondary button"><span>Recalculate</span></a>
					</p>
				</li>
				<li id="history">
					<div id="health-score-history"></div>
				</li>
			</ul>
			<div class="post">
			<h3>Summary</h3>
			<p>According to your health score, you have a	 <?php echo round(100 - {member_score_total}, 1); ?>% risk of developing a lifestyle related disease such as heart disease, cancer, or diabetes.</p>
				
			<h2>Recommendations</h2>
			<ul id="recommendations">
				{if member_score_sleep != "11"    }<li><a href="{path='resources/living-better/rest'}">Get 7-8 hours of sleep nightly</a></li>{/if}
				{if member_score_exercise != "13" }<li><a href="{path='resources/living-better/exercise'}">Exercise regularly</a></li>{/if}
				{if member_score_smoking != "11"  }<li><a href="{path='resources/health-condition/addictions'}">Don&rsquo;t smoke</a></li>{/if}
				{if member_score_alcohol != "11"  }<li><a href="{path='resources/health-condition/addictions'}">Don&rsquo;t drink alcohol</a></li>{/if}
				{if member_score_diet != "11"     }<li><a href="{path='resources/detail/10-day-meal-plan'}">Eat whole plant foods every day</a></li>{/if}
				{if member_score_nutrition != "10"}<li><a href="{path='resources/detail/10-day-meal-plan'}">Avoid refined sugars and oils</a></li>{/if}
				{if member_score_emotional != "11"}<li><a href="{path='resources/living-better/emotional-wellbeing'}">Boost your EQ</a></li>{/if}
				<?php if ( $hsWeight > $hsHealthyWeightHigh || $hsWeight < $hsHealthyWeightLow ) { ?>
					<li><a href="{path='resources/health-conditions/obesity'}">Maintain a healthy weight between <?php echo $hsHealthyWeightLow . '-' . $hsHealthyWeightHigh . ' lbs.'; ?></a></li>
				<?php } ?>
				<?php if ( ($hsWaistSize / $hsHeightInches ) < 0.4 || ($hsWaistSize / $hsHeightInches ) > 0.5 ) { ?>
					<li><a href="{path='resources/health-conditions/obesity'}">Maintain a healthy waist size between <?php echo round($hsHeightInches * 0.4) . '-' . round($hsHeightInches * 0.5) . ' in.'; ?></a></li>
				<?php } ?>
				<?php if ( {member_score_total} < 70 ) { ?>
					<li><a href="http://www.newstart.com">Consider attending a NEWSTART&reg; Lifestyle Program</a></li>
				<?php } ?>
					<li><a href="{path='resources/detail/newstart-lifestyle/'}">Continue following the NEWSTART&reg; Lifestyle</a></li>
			</ul>
					
			<p class="button-wrap">
				<a href="{path='my-health/tell-me-more'}" class="super green button"><span>Tell me more</span></a>
			</p>
			</div>
		{/exp:user:stats}
		{if logged_out}
		<?php 
			
			if (isset($_POST['member_age']))
			{ ?>
			<dl class="tabs">
				<dd><a class="default" rel="current">Current Score</a></dd>
				<dd><a rel="history">Score History</a></dd>
			</dl>
			<ul class="tabs-content">
				<li id="current">
					<h2 id="total-score" class="<?php totalScore($hsTotal); ?>"><?php echo $hsTotal; ?></h2>
					<p class="button-wrap">
						<a href="{path='my-health/calculator'}" class="super secondary button"><span>Recalculate</span></a>
					</p>
				</li>
				<li id="history">
					<p><em>You must save your score to view score history.</em></p>
					<div id="health-score-history"></div>
				</li>
			</ul>
			<div class="post">
			<h3>Summary</h3>
			<p>According to your health score, you have a	 <?php echo round((100 - $hsTotal), 1); ?>% risk of developing a lifestyle related disease such as heart disease, cancer, or diabetes.</p>
				
			<h2>Recommendations</h2>
			<p><em>Save your score to your profile to view a list of personalized recommendations.</em></p>
			
			<form action="{path='join'}" method="post">
				<div class="hidden">
					<input class="hidden" type="hidden" name="member_age" value="<?php echo $_POST['member_age']; ?>" />
					<input class="hidden" type="hidden" name="member_weight" value="<?php echo $_POST['member_weight']; ?>" />
					<input class="hidden" type="hidden" name="memberHeightFeet" value="<?php echo $_POST['memberHeightFeet']; ?>" />
					<input class="hidden" type="hidden" name="member_height_in" value="<?php echo $_POST['member_height_in']; ?>" />
					<input class="hidden" type="hidden" name="member_waist_in" value="<?php echo $_POST['member_waist_in']; ?>" />
					<input class="hidden" type="hidden" name="member_score_sleep" value="<?php echo $_POST['member_score_sleep']; ?>" />
					<input class="hidden" type="hidden" name="member_score_exercise" value="<?php echo $_POST['member_score_exercise']; ?>" />
					<input class="hidden" type="hidden" name="member_score_alcohol" value="<?php echo $_POST['member_score_alcohol']; ?>" />
					<input class="hidden" type="hidden" name="member_score_smoking" value="<?php echo $_POST['member_score_smoking']; ?>" />
					<input class="hidden" type="hidden" name="member_score_diet" value="<?php echo $_POST['member_score_diet']; ?>" />
					<input class="hidden" type="hidden" name="member_score_nutrition" value="<?php echo $_POST['member_score_nutrition']; ?>" />
					<input class="hidden" type="hidden" name="member_score_emotional" value="<?php echo $_POST['member_score_emotional']; ?>" />
					<input class="hidden" type="hidden" name="member_score_total" value="<?php echo $hsTotal; ?>" />
					<input class="hidden" type="hidden" name="memberScoreHistory" value='<?php echo $scoreHistory; ?>' />
				</div>
				<div class="button-wrap">
					<button type="submit" class="super green button" id="calculate"><span>Save Score</span></button>
				</div>
			</form>
			</div>
				
		<?php } else { ?>
			<div class="post">
			<h2>Your Health Score is empty!</h2>
			<p>It appears that you haven&rsquo;t calculated your health score yet. Click the button below to calculate your health score.</p>
			
			<p class="button-wrap">
				<a href="{path='my-health/calculator'}" class="super giant green button"><span>Calculate</span></a>
			</p>
			</div>
		<?php } ?>
		{/if}
	</div>
	<div class="sidebar right">
		<header class="bar">Member Scores</header>
		<p>Below is a chart of how your score compares with other lifestyle club members who have taken the HealthGauge&trade; test. Move your mouse over the chart to see the percentages.</p>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1", { packages:["corechart"] });
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Task');
				data.addColumn('number', 'Hours per Day');
				data.addRows([
					['Very Low',   <?php resultsPieChart(90, 100) ?>],
					['Low',        <?php resultsPieChart(80, 90) ?>],
					['Medium',     <?php resultsPieChart(70, 80) ?>],
					['High',       <?php resultsPieChart(60, 70) ?>],
					['Very High',  <?php resultsPieChart(0, 60) ?>]
				]);
			
				var options = {
					width: 325, height: 280,
					colors: ['#8dbe38','#5D83DA','#ECE90E','#F2B32F','#D24C4D'],
					pieSliceText: 'none',
					legend: 'none',
					tooltip: {textStyle: {fontSize: 12}, text: 'percentage'},
					chartArea: {top:40, left:-10},
					backgroundColor: 'transparent'
				};
			
				var chart = new google.visualization.PieChart(document.getElementById('results-chart'));
				chart.draw(data, options);
			}
		</script>
		<div id="results-chart"></div>
		{!--
		
		<style>
#results-chart iframe {
	position: absolute;
	top: -30px;
}
#chart-legend {
	position: absolute;
	top: -30px;
}
.section {
	position: relative;
}
</style>

<div class="sidebar right">
		<header class="bar">Member Scores</header>
		<p>Below is a chart of how your score compares with other lifestyle club members who have taken the HealthGauge&trade; test. Move your mouse over the chart to see the percentages.</p>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Task');
				data.addColumn('number', 'Hours per Day');
				data.addRows([
					['Very Low',	 438],
					['Low',				 909],
					['Medium',		 753],
					['High',			 474],
					['Very High',	 572]
				]);
			
				var options = {
					width: 325, height: 280,
					colors: ['#8dbe38','#5D83DA','#ECE90E','#F2B32F','#D24C4D'],
					pieSliceText: 'none',
					legend: 'none',
					tooltip: {textStyle: {fontSize: 12}, text: 'percentage'},
					chartArea: {top:40, left:0},
					backgroundColor: 'transparent'
				};
			
				var chart = new google.visualization.PieChart(document.getElementById('results-chart'));
				chart.draw(data, options);
			}
		</script>
		<div id="results-chart" style="width:230px; height:250px; overflow:hidden;"></div>
		<section class="section">
		<table id="chart-legend">
			<thead>
				<tr>
					<td><h2>Risk Level</h2></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span class="bullet one">&bull;</span> 90-100 = Very Low</td>
				</tr>
				<tr>
					<td><span class="bullet two">&bull;</span> 80-89 = Low</td>
				</tr>
				<tr>
					<td><span class="bullet three">&bull;</span> 70-79 = Medium</td>
				</tr>
				<tr>
					<td><span class="bullet four">&bull;</span> 60-69 = High</td>
				</tr>
				<tr>
					<td><span class="bullet five">&bull;</span> 59 and lower = Very High</td>
				</tr>
			</tbody>
		</table>
		</section>
	</div>
		
		<table id="chart-legend">
			<thead>
				<tr>
					<td><h2>Risk Level</h2></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td{if member_score_total >= '90'} class="strong"{/if}><span class="bullet one">&bull;</span> 90-100 = Very Low</td>
				</tr>
				<tr>
					<td{if member_score_total >= '80' AND member_score_total < '90'} class="strong"{/if}><span class="bullet two">&bull;</span> 80-89 = Low</td>
				</tr>
				<tr>
					<td{if member_score_total >= '70' AND member_score_total < '80'} class="strong"{/if}><span class="bullet three">&bull;</span> 70-79 = Medium</td>
				</tr>
				<tr>
					<td{if member_score_total >= '60' AND member_score_total < '70'} class="strong"{/if}><span class="bullet four">&bull;</span> 60-69 = High</td>
				</tr>
				<tr>
					<td{if member_score_total < '60'} class="strong"{/if}><span class="bullet five">&bull;</span> 59 and lower = Very High</td>
				</tr>
			</tbody>
		</table>
		--}
		<h2>Risk Level</h2>
		<ul id="chart-legend">
		{exp:user:stats}
			<li{if member_score_total >= '90'} class="strong"{/if}><span class="bullet one">&bull;</span> 90-100 = Very Low</li>
			<li{if member_score_total >= '80' AND member_score_total < '90'} class="strong"{/if}><span class="bullet two">&bull;</span> 80-89 = Low</li>
			<li{if member_score_total >= '70' AND member_score_total < '80'} class="strong"{/if}><span class="bullet three">&bull;</span> 70-79 = Medium</li>
			<li{if member_score_total >= '60' AND member_score_total < '70'} class="strong"{/if}><span class="bullet four">&bull;</span> 60-69 = High</li>
			<li{if member_score_total < '60'} class="strong"{/if}><span class="bullet five">&bull;</span> 59 and lower = Very High</li>
		{/exp:user:stats}
		{if logged_out}
			<li<?php if ( $hsTotal >= 90) { echo ' class="strong"'; } ?>><span class="bullet one">&bull;</span> 90-100 = Very Low</li>
			<li<?php if ( $hsTotal >= 80 && $hsTotal < 90 ) { echo ' class="strong"'; } ?>><span class="bullet two">&bull;</span> 80-89 = Low</li>
			<li<?php if ( $hsTotal >= 70 && $hsTotal < 80 ) { echo ' class="strong"'; } ?>><span class="bullet three">&bull;</span> 70-79 = Medium</li>
			<li<?php if ( $hsTotal >= 60 && $hsTotal < 70 ) { echo ' class="strong"'; } ?>><span class="bullet four">&bull;</span> 60-69 = High</li>
			<li<?php if ( $hsTotal < 60 && $hsTotal != '') { echo ' class="strong"'; } ?>><span class="bullet five">&bull;</span> 59 and lower = Very High</li>
		{/if}
		</ul>
	</div>
</div>
{embed="embeds/_doc-bottom"}