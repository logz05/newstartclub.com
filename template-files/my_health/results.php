<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');

function resultsPieChart($low, $high) {
	$db = new DBconnect();
	
	if ($low == 0) {
		$querySubTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 < '. $high .' AND m_field_id_24 != ""';
	} else {
		$querySubTotal = 'SELECT * FROM exp_member_data WHERE m_field_id_24 < '. $high .' AND m_field_id_24 >= '. $low;
	}
	
	$subTotal = count($db->fetch($querySubTotal));
	
	print $subTotal;
}

?>
{embed="embeds/_doc-top" 
	class="my_health"
	title="My Health"
}
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
		$hsDiet = "{memberDiet}";
		$hsNutrition = "{memberNutrition}";
		$hsEmotional = "{memberEmotional}";
		
		$hsHeightTotal = ($hsHeightFeet*12)+$hsHeightInches;
		
		$hsWaistPoints = 11 - ( abs(( $hsWaistSize / $hsHeightTotal ) - .45 ) * 60 );
		
		$hsHealthyWeightLow = round((18.5/703)*($hsHeightTotal*$hsHeightTotal));
		$hsHealthyWeightHigh = round((24.9/703)*($hsHeightTotal*$hsHeightTotal));
		
		$bmi = ($hsWeight/($hsHeightTotal*$hsHeightTotal))*703;
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
	{if memberScoreTotal == ""}
		{redirect="my_health/calculator"}
	{/if}
{/exp:user:stats}
{if logged_out}
<?php
	if (isset($_POST['memberAge']))
	{
		$hsAge = $_POST['memberAge'];
		$hsWeight = $_POST['memberWeight'];
		$hsHeightFeet = $_POST['memberHeightFeet'];
		$hsHeightInches = $_POST['memberHeightInches'];
		$hsWaistSize = $_POST['memberWaistSize'];
		$hsSleep = $_POST['memberSleep'];
		$hsExercise = $_POST['memberExercise'];
		$hsSmoking = $_POST['memberSmoking'];
		$hsAlcohol = $_POST['memberAlcohol'];
		$hsDiet = $_POST['memberDiet'];
		$hsNutrition = $_POST['memberNutrition'];
		$hsEmotional = $_POST['memberEmotional'];
		
		$hsHeightTotal = ($hsHeightFeet*12)+$hsHeightInches;
		
		$hsWaistPoints = 11 - ( abs(( $hsWaistSize / $hsHeightTotal ) - .45 ) * 60 );
		
		$hsHealthyWeightLow = round((18.5/703)*($hsHeightTotal*$hsHeightTotal));
		$hsHealthyWeightHigh = round((24.9/703)*($hsHeightTotal*$hsHeightTotal));
		
		$bmi = ($hsWeight/($hsHeightTotal*$hsHeightTotal))*703;
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

<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/my_health">My Health</a></li>
</ul>
<div class="heading clearfix">
	<h1>Health Score Results</h1>
</div>

<div class="grid23 clearfix">
	<div class="main left">
		{exp:user:stats}
			
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
						
						$score_history = unserialize( '{memberScoreHistory}' );

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
					<h2 id="total-score" class="{if memberScoreTotal > '90'}one{if:elseif memberScoreTotal < '90' AND memberScoreTotal >= '80'}two{if:elseif memberScoreTotal >= '70' AND memberScoreTotal < '80'}three{if:elseif memberScoreTotal >= '60' AND	memberScoreTotal < '70'}four{if:elseif memberScoreTotal < '60'}five{/if}">{memberScoreTotal}</h2>
					<p class="button-wrap">
						<a href="/my_health/calculator" class="super secondary button"><span>Recalculate</span></a>
					</p>
				</li>
				<li id="history">
					<div id="health-score-history"></div>
				</li>
			</ul>
			<div id="entry">
			<h3>Summary</h3>
			<p>According to your health score, you have a	 <?php echo round(100 - {memberScoreTotal}, 1); ?>% risk of developing a lifestyle related disease such as heart disease, cancer, or diabetes.</p>
				
			<h2>Recommendations</h2>
			<ul id="recommendations">
				{if memberSleep != "11"}<li><a href="/resources/living-better/rest">Get 7-8 hours of sleep nightly</a></li>{/if}
				{if memberExercise != "13"}<li><a href="/resources/living-better/exercise">Exercise regularly</a></li>{/if}
				{if memberSmoking != "11"}<li><a href="/resources/health-conditions/addictions">Don&rsquo;t smoke</a></li>{/if}
				{if memberAlcohol != "11"}<li><a href="/resources/health-conditions/addictions">Don&rsquo;t drink alcohol</a></li>{/if}
				{if memberDiet != "11"}<li><a href="/recipes">Eat whole plant foods every day</a></li>{/if}
				{if memberNutrition != "10"}<li><a href="/recipes">Avoid refined sugars and oils</a></li>{/if}
				{if memberEmotional != "11"}<li><a href="/resources/living-better/emotional-wellbeing">Boost your EQ</a></li>{/if}
				<?php if ( $hsWeight > $hsHealthyWeightHigh || $hsWeight < $hsHealthyWeightLow ) { ?>
					<li><a href="/resources/health-conditions/obesity">Maintain a healthy weight between <?php echo $hsHealthyWeightLow . '-' . $hsHealthyWeightHigh . ' lbs.'; ?></a></li>
				<?php } ?>
				<?php if ( ($hsWaistSize / $hsHeightTotal ) < 0.4 || ($hsWaistSize / $hsHeightTotal ) > 0.5 ) { ?>
					<li><a href="/resources/health-conditions/obesity">Maintain a healthy waist size between <?php echo round($hsHeightTotal * 0.4) . '-' . round($hsHeightTotal * 0.5) . ' in.'; ?></a></li>
				<?php } ?>
				<?php if ( {memberScoreTotal} < 70 ) { ?>
					<li><a href="http://www.newstart.com">Consider attending a NEWSTART&reg; Lifestyle Program</a></li>
				<?php } ?>
					<li><a href="/resources/detail/newstart-lifestyle/">Continue following the NEWSTART&reg; Lifestyle</a></li>
			</ul>
					
			<p class="button-wrap">
				<a href="/my_health/tell-me-more" class="super green button"><span>Tell me more</span></a>
			</p>
			</div>
		{/exp:user:stats}
		{if logged_out}
		<?php 
			
			if (isset($_POST['memberAge']))
			{ ?>
			<dl class="tabs">
				<dd><a class="default" rel="current">Current Score</a></dd>
				<dd><a rel="history">Score History</a></dd>
			</dl>
			<ul class="tabs-content">
				<li id="current">
					<h2 id="total-score" class="<?php totalScore($hsTotal); ?>"><?php echo $hsTotal; ?></h2>
					<p class="button-wrap">
						<a href="/my_health/calculator" class="super secondary button"><span>Recalculate</span></a>
					</p>
				</li>
				<li id="history">
					<p><em>You must save your score to view score history.</em></p>
					<div id="health-score-history"></div>
				</li>
			</ul>
			<div id="entry">
			<h3>Summary</h3>
			<p>According to your health score, you have a	 <?php echo round((100 - $hsTotal), 1); ?>% risk of developing a lifestyle related disease such as heart disease, cancer, or diabetes.</p>
				
			<h2>Recommendations</h2>
			<p><em>Save your score to your profile to view a list of personalized recommendations.</em></p>
			
			<form action="/register" method="post">
				<div class="hidden">
					<input class="hidden" type="hidden" name="memberAge" value="<?php echo $_POST['memberAge']; ?>" />
					<input class="hidden" type="hidden" name="memberWeight" value="<?php echo $_POST['memberWeight']; ?>" />
					<input class="hidden" type="hidden" name="memberHeightFeet" value="<?php echo $_POST['memberHeightFeet']; ?>" />
					<input class="hidden" type="hidden" name="memberHeightInches" value="<?php echo $_POST['memberHeightInches']; ?>" />
					<input class="hidden" type="hidden" name="memberWaistSize" value="<?php echo $_POST['memberWaistSize']; ?>" />
					<input class="hidden" type="hidden" name="memberSleep" value="<?php echo $_POST['memberSleep']; ?>" />
					<input class="hidden" type="hidden" name="memberExercise" value="<?php echo $_POST['memberExercise']; ?>" />
					<input class="hidden" type="hidden" name="memberAlcohol" value="<?php echo $_POST['memberAlcohol']; ?>" />
					<input class="hidden" type="hidden" name="memberSmoking" value="<?php echo $_POST['memberSmoking']; ?>" />
					<input class="hidden" type="hidden" name="memberDiet" value="<?php echo $_POST['memberDiet']; ?>" />
					<input class="hidden" type="hidden" name="memberNutrition" value="<?php echo $_POST['memberNutrition']; ?>" />
					<input class="hidden" type="hidden" name="memberEmotional" value="<?php echo $_POST['memberEmotional']; ?>" />
					<input class="hidden" type="hidden" name="memberScoreTotal" value="<?php echo $hsTotal; ?>" />
					<input class="hidden" type="hidden" name="memberScoreHistory" value='<?php echo $scoreHistory; ?>' />
				</div>
				<div class="button-wrap">
					<button type="submit" class="super green button" id="calculate"><span>Save Score</span></button>
				</div>
			</form>
			</div>
				
		<?php } else { ?>
			<div id="entry">
			<h2>Your Health Score is empty!</h2>
			<p>It appears that you haven&rsquo;t calculated your health score yet. Click the button below to calculate your health score.</p>
			
			<p class="button-wrap">
				<a href="/my_health/calculator" class="super giant green button"><span>Calculate</span></a>
			</p>
			</div>
		<?php } ?>
		{/if}
	</div>
	<div class="sidebar right">
		<div class="bar">Member Scores</div>
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
					['Very Low',	 <?php resultsPieChart(90, 100) ?>],
					['Low',				 <?php resultsPieChart(80, 90) ?>],
					['Medium',		 <?php resultsPieChart(70, 80) ?>],
					['High',			 <?php resultsPieChart(60, 70) ?>],
					['Very High',	 <?php resultsPieChart(0, 60) ?>]
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
		<h2>Risk Level</h2>
		<ul id="chart-legend">
		{exp:user:stats}
			<li{if memberScoreTotal >= '90'} class="strong"{/if}><span class="bullet one">&bull;</span> 90-100 = Very Low</li>
			<li{if memberScoreTotal >= '80' AND memberScoreTotal < '90'} class="strong"{/if}><span class="bullet two">&bull;</span> 80-89 = Low</li>
			<li{if memberScoreTotal >= '70' AND memberScoreTotal < '80'} class="strong"{/if}><span class="bullet three">&bull;</span> 70-79 = Medium</li>
			<li{if memberScoreTotal >= '60' AND memberScoreTotal < '70'} class="strong"{/if}><span class="bullet four">&bull;</span> 60-69 = High</li>
			<li{if memberScoreTotal < '60'} class="strong"{/if}><span class="bullet five">&bull;</span> 59 and lower = Very High</li>
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