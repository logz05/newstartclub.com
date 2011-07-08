{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="Health Score Calculator"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<div class="body">
{embed="includes/_breadcrumbs" channel="{channel}" section="{section}"}
<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );

if (isset($_POST['memberAge']))
{
	global $SESS;
	$user_id = $SESS->userdata['member_id'];
	$member_id = $user_id;
	
	$fields = array(
			"memberAge" => "m_field_id_13",
			"memberWeight" => "m_field_id_14",
			"memberHeightFeet" => "m_field_id_15",
			"memberHeightInches" => "m_field_id_16",
			"memberSleep" => "m_field_id_17",
			"memberExercise" => "m_field_id_18",
			"memberSmoking" => "m_field_id_19",
			"memberAlcohol" => "m_field_id_20",
			"memberBreakfast" => "m_field_id_21",
			"memberSnacking" => "m_field_id_22",
			"memberWaistSize" => "m_field_id_23",
			"memberScoreTotal" => "m_field_id_24",
			"memberEmotional" => "m_field_id_29"
			);

	// Retrieve posted values
	$dbvalues = array();
	$fmvalues = array();
	foreach ($fields as $realname => $dbname)
	{
		$dbvalues[$dbname] = $_POST[$realname];
		$fmvalues[$realname] = $_POST[$realname];
	}
	
	// Calculate totals
	$hsAge = $fmvalues["memberAge"];
	$hsWeight = $fmvalues["memberWeight"];
	$hsHeightFeet = $fmvalues["memberHeightFeet"];
	$hsHeightInches = $fmvalues["memberHeightInches"];
	$hsWaistSize = $fmvalues["memberWaistSize"];
	$hsSleep = $fmvalues["memberSleep"];
	$hsExercise = $fmvalues["memberExercise"];
	$hsSmoking = $fmvalues["memberSmoking"];
	$hsAlcohol = $fmvalues["memberAlcohol"];
	$hsBreakfast = $fmvalues["memberBreakfast"];
	$hsSnacking = $fmvalues["memberSnacking"];
	$hsEmotional = $fmvalues["memberEmotional"];
	
	$hsHeightTotal = ($hsHeightFeet*12)+$hsHeightInches;
	
	$hsWaistPoints = 11 - ( abs(( $hsWaistSize / $hsHeightTotal ) - .45 ) * 60 );
	
	$hsHealthyWeightLow = round((18.5/703)*($hsHeightTotal*$hsHeightTotal));
	$hsHealthyWeightHigh = round((24.9/703)*($hsHeightTotal*$hsHeightTotal));
	
	$bmi = ($hsWeight/($hsHeightTotal*$hsHeightTotal))*703;
	$bmiPoints = 11 - abs($bmi - 21.7);
	$hsTotal = round(($hsSleep + $hsExercise + $hsSmoking + $hsAlcohol + $hsBreakfast + $hsSnacking + $hsEmotional + $bmiPoints + $hsWaistPoints), 1);

	// fmvalues['memberScoreTotal']
	$dbvalues["m_field_id_24"] = $hsTotal; // Calculated result
	
	// Save results to DB
	$sql = "update exp_member_data set ";
	$i = 0;
	foreach ($dbvalues as $name => $value)
	{
		if ($i++ > 0)
		{
			$sql .= ',';
		}
		$sql .= "$name='$value'";
	}
	$sql .= " where member_id=$member_id;";
	
	$db = new DBconnect();
	
	$db->query($sql);
	
	$db = null; // force the class destructor to run
	
	header("Location: /my_health/results/"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
}

?>
<div class="heading clearafter">
	<h1>Health Score Calculator</h1>
</div>

<div class="grid23 clearafter">
	<div class="list left">
	
		<noscript>
			<div class="no-script">
				<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
			</div>
		</noscript>

		<form id="health_score" method="post" action="/{channel}/calculator/">
			<div class="hiddenFields">
			<input type="hidden" name="error_page" value="my_health/calculator_error" />
			</div>
					<table>
						<tr>
							<th scope="row"><label for="memberAge">Age</label></th>
							<td><input type="text" class="input" name="memberAge" id="memberAge" value="" size="3" onblur="healthcalc(this.form)" /> yrs</td>
						</tr>
						<tr>
							<th scope="row"><label for="memberWeight">Weight</label></th>
							<td><input type="text" class="input" name="memberWeight" id="memberWeight" value="" size="5" onblur="healthcalc(this.form)" /> lbs</td>
						</tr>
					</table>
					<table>
						<tr>
							<th scope="row"><label for="memberHeightFeet">Height</label></th>
							<td>
								<input type="text" class="input" name="memberHeightFeet" id="memberHeightFeet" value="0" size="1" onblur="healthcalc(this.form)" /> ft&nbsp;
								<input type="text" class="input" name="memberHeightInches" id="memberHeightInches" value="0" size="2" onblur="healthcalc(this.form)" /> in
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="memberWaistSize">Waist Size</label></th>
							<td><input type="text" class="input" name="memberWaistSize" id="memberWaistSize" value="" size="3" onblur="healthcalc(this.form)" /> in</td>
						</tr>
					</table>
			<div class="grid12-23 clearafter">
				<div class="left">
					
					<h2>Sleep</h2>
					<p>How many hours do you usually sleep per night?</p>
					<label><input type="radio" name="memberSleep" class="memberSleep" value="5" onclick="healthcalc(this.form)" /> <span>5 hours or less</span></label>{if member_group == "1"}<sup>5</sup>{/if}<br />
					<label><input type="radio" name="memberSleep" class="memberSleep" value="9" onclick="healthcalc(this.form)" /> <span>6 hours</span></label>{if member_group == "1"}<sup>9</sup>{/if}<br />
					<label><input type="radio" name="memberSleep" class="memberSleep" value="11" onclick="healthcalc(this.form)" /> <span>7-8 hours</span></label>{if member_group == "1"}<sup>11</sup>{/if}<br />
					<label><input type="radio" name="memberSleep" class="memberSleep" value="7" onclick="healthcalc(this.form)" /> <span>9 hours or more</span></label>{if member_group == "1"}<sup>7</sup>{/if}<br />
					
					<h2>Exercise</h2>
					<p>How often do you get vigorous physical activity for at least 20-30 minutes? (Examples: Brisk walking, gardening, jogging, sports, swimming, or cycling.)</p>
					<label><input type="radio" name="memberExercise" class="memberExercise" value="13" onclick="healthcalc(this.form)" /> <span>Daily</span></label>{if member_group == "1"}<sup>13</sup>{/if}<br />
					<label><input type="radio" name="memberExercise" class="memberExercise" value="11" onclick="healthcalc(this.form)" /> <span>Most every day</span></label>{if member_group == "1"}<sup>11</sup>{/if}<br />
					<label><input type="radio" name="memberExercise" class="memberExercise" value="7" onclick="healthcalc(this.form)" /> <span>Less than 3 times a week</span></label>{if member_group == "1"}<sup>7</sup>{/if}<br />
					<label><input type="radio" name="memberExercise" class="memberExercise" value="5" onclick="healthcalc(this.form)" /> <span>Rarely</span></label>{if member_group == "1"}<sup>5</sup>{/if}<br />
					
					<h2>Alcohol Use</h2>
					<p>How many servings of alcohol do you drink in a week?</p>
					<label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="11" onclick="healthcalc(this.form)" /> <span>None</span></label>{if member_group == "1"}<sup>11</sup>{/if}<br />
					<label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="9" onclick="healthcalc(this.form)" /> <span>1-2 Servings</span></label>{if member_group == "1"}<sup>9</sup>{/if}<br />
					<label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="5" onclick="healthcalc(this.form)" /> <span>3-10 Servings</span></label>{if member_group == "1"}<sup>7</sup>{/if}<br />
					<label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="1" onclick="healthcalc(this.form)" /> <span>Over 10 Servings</span></label>{if member_group == "1"}<sup>1</sup>{/if}<br />
				</div>
			
				<div class="right">
					<h2>Smoking History</h2>
					<label><input type="radio" name="memberSmoking" class="memberSmoking" value="11" onclick="healthcalc(this.form)" /> <span>I have never smoked</span></label>{if member_group == "1"}<sup>11</sup>{/if}<br />
					<label><input type="radio" name="memberSmoking" class="memberSmoking" value="9" onclick="healthcalc(this.form)" /> <span>I have quit smoking</span></label>{if member_group == "1"}<sup>9</sup>{/if}<br />
					<label><input type="radio" name="memberSmoking" class="memberSmoking" value="3" onclick="healthcalc(this.form)" /> <span>I smoke less than 1 pack a day</span></label>{if member_group == "1"}<sup>3</sup>{/if}<br />
					<label><input type="radio" name="memberSmoking" class="memberSmoking" value="0" onclick="healthcalc(this.form)" /> <span>I smoke more than 1 pack a day</span></label>{if member_group == "1"}<sup>0</sup>{/if}<br />
				
					<h2>Breakfast</h2>
					<p>How often do you eat a good breakfast? (Including fruits, cereals, bread or more.)</p>
					<label><input type="radio" name="memberBreakfast" class="memberBreakfast" value="10" onclick="healthcalc(this.form)" /> <span>Almost Every Day</span></label>{if member_group == "1"}<sup>10</sup>{/if}<br />
					<label><input type="radio" name="memberBreakfast" class="memberBreakfast" value="8" onclick="healthcalc(this.form)" /> <span>Sometimes</span></label>{if member_group == "1"}<sup>8</sup>{/if}<br />
					<label><input type="radio" name="memberBreakfast" class="memberBreakfast" value="6" onclick="healthcalc(this.form)" /> <span>Rarely or never</span></label>{if member_group == "1"}<sup>6</sup>{/if}<br />
				
					<h2>Snacking</h2>
					<p>How often do you eat between meals?</p>
					<label><input type="radio" name="memberSnacking" class="memberSnacking" value="5" onclick="healthcalc(this.form)" /> <span>Almost every day</span></label>{if member_group == "1"}<sup>5</sup>{/if}<br />
					<label><input type="radio" name="memberSnacking" class="memberSnacking" value="9" onclick="healthcalc(this.form)" /> <span>Once in a while</span></label>{if member_group == "1"}<sup>9</sup>{/if}<br />
					<label><input type="radio" name="memberSnacking" class="memberSnacking" value="11" onclick="healthcalc(this.form)" /> <span>Rarely or never</span></label>{if member_group == "1"}<sup>11</sup>{/if}<br />
					
					<h2>Emotional Well-being</h2>
					<p>How was your sense of emotional well-being this past week?</p>
					<label><input type="radio" name="memberEmotional" class="memberEmotional" value="11" onclick="healthcalc(this.form)" /> <span>Happy</span></label>{if member_group == "1"}<sup>11</sup>{/if}<br />
					<label><input type="radio" name="memberEmotional" class="memberEmotional" value="9" onclick="healthcalc(this.form)" /> <span>Up and down</span></label>{if member_group == "1"}<sup>9</sup>{/if}<br />
					<label><input type="radio" name="memberEmotional" class="memberEmotional" value="7" onclick="healthcalc(this.form)" /> <span>Sad</span></label>{if member_group == "1"}<sup>7</sup>{/if}<br />
					<label><input type="radio" name="memberEmotional" class="memberEmotional" value="5" onclick="healthcalc(this.form)" /> <span>Depressed</span></label>{if member_group == "1"}<sup>5</sup>{/if}<br />
					
					<input type="text" name="memberScoreTotal" class="hide" value="" />
				</div>
				
			</div>
			
			<button type="submit" class="super secondary button" id="calculate"><span>Calculate</span></button>
			
			<!-- Javascript inputs -->
			<input type="text" name="jsMemberSleep" class="hide" value="" />
			<input type="text" name="jsMemberExercise" class="hide" value="" />
			<input type="text" name="jsMemberSmoking" class="hide" value="" />
			<input type="text" name="jsMemberAlcohol" class="hide" value="" />
			<input type="text" name="jsMemberBreakfast" class="hide" value="" />
			<input type="text" name="jsMemberSnacking" class="hide" value="" />
			<input type="text" name="jsMemberEmotional" class="hide" value="" />
			<input type="text" name="jsHeightTotal" class="hide" value="" />
			<input type="text" name="jsWaistPoints" class="hide" value="" />
			<input type="text" name="jsWeightLow" class="hide" value="" />
			<input type="text" name="jsWeightHigh" class="hide" value="" />
			<input type="text" name="jsBMI" class="hide" value="" />
			<input type="text" name="jsBMIPoints" class="hide" value="" />
			<input type="text" name="jsScoreTotal" class="hide" value="" />
			
		</form>

	</div><!--/.list-->
	<div class="sidebar right">
		<div class="bar">My Information</div>
		<p>The information provided will only be used to calculate your health score and will not be shared with third parties.</p>
		<div id="messageBox">
			<p></p>
			<ul></ul>
		</div>
		
	</div><!--/.sidebar-->
</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|healthcalc" standalone="{if logged_out}yes{if:else}{/if}"}