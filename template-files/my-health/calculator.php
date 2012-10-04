<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );
?>

{if logged_in}
<?php
if (isset($_POST['member_age']))
{
	global $SESS;
	$user_id = $SESS->userdata['member_id'];
	$member_id = $user_id;
	
	$fields = array(
			"member_age" => "m_field_id_8",
			"member_weight" => "m_field_id_9",
			"member_height_in" => "m_field_id_11",
			"member_waist_in" => "m_field_id_13",
			"member_score_sleep" => "m_field_id_15",
			"member_score_exercise" => "m_field_id_16",
			"member_score_smoking" => "m_field_id_17",
			"member_score_alcohol" => "m_field_id_18",
			"member_score_diet" => "m_field_id_19",
			"member_score_nutrition" => "m_field_id_20",
			"member_score_emotional" => "m_field_id_21",
			"member_score_total" => "m_field_id_22",
			"member_score_history" => "m_field_id_23"
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


	// fmvalues['member_score_total']
	$dbvalues["m_field_id_22"] = $hsTotal; // Calculated result
	
	//Get correct date format for Google Chart
	$currentDate = date( 'Y-n-j' );
	
	$score_history = '{exp:user:stats dynamic="off"}{member_score_history}{/exp:user:stats}';
	if ($score_history) {
		$previousResults = unserialize( $score_history );
	} else {
		$previousResults = array();
	}
	
	$previousResults[$currentDate] = $hsTotal;

	$dbvalues["m_field_id_23"] = serialize( $previousResults ); // Add calculated result to history
	
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
	
	header("Location: http://newstartclub.com/my-health/results"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
}
?>
{/if}
{embed="embeds/_doc-top" 
	class="my-health"
	title="Health Score Calculator"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='my-health'}">My Health</a></li>
</ul>
<div class="heading clearfix">
	<h1>Health Score Calculator</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<noscript>
			<div class="alert-box warning">
				<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
			</div>
		</noscript>
			<form id="calculator" method="post" action="{if logged_in}{path='my-health/calculator'}{if:else}{path='my-health/results'}{/if}">
				<div class="hiddenFields">
				<input type="hidden" name="error_page" value="{path='my-health/calculator-error'}" />
				</div>
						<table>
						<tr>
							<th scope="row"><label for="member_age">Age</label></th>
							<td><input type="text" pattern="[0-9]*" class="input" name="member_age" id="member_age" value="" size="3" onblur="healthcalc(this.form)" /><span> yrs</span></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_weight">Weight</label></th>
							<td><input type="text" pattern="[0-9]*" class="input" name="member_weight" id="member_weight" value="" size="5" onblur="healthcalc(this.form)" /><span> lbs</span></td>
						</tr>
					</table>
					<table>
						<tr>
							<th scope="row"><label for="member_height_in">Height</label></th>
							<td>
								<select class="input" name="member_height_in" id="member_height_in" onblur="healthcalc(this.form)">
									<option value="">ft./in.</option>
									<optgroup label="3 foot">
										<option value="36">3' 0"</option>
										<option value="37">3' 1"</option>
										<option value="38">3' 2"</option>
										<option value="39">3' 3"</option>
										<option value="40">3' 4"</option>
										<option value="41">3' 5"</option>
										<option value="42">3' 6"</option>
										<option value="43">3' 7"</option>
										<option value="44">3' 8"</option>
										<option value="45">3' 9"</option>
										<option value="46">3' 10"</option>
										<option value="47">3' 11"</option>
									</optgroup>
									<optgroup label="4 foot">
										<option value="48">4' 0"</option>
										<option value="49">4' 1"</option>
										<option value="50">4' 2"</option>
										<option value="51">4' 3"</option>
										<option value="52">4' 4"</option>
										<option value="53">4' 5"</option>
										<option value="54">4' 6"</option>
										<option value="55">4' 7"</option>
										<option value="56">4' 8"</option>
										<option value="57">4' 9"</option>
										<option value="58">4' 10"</option>
										<option value="59">4' 11"</option>
									</optgroup>
									<optgroup label="5 foot">
										<option value="60">5' 0"</option>
										<option value="61">5' 1"</option>
										<option value="62">5' 2"</option>
										<option value="63">5' 3"</option>
										<option value="64">5' 4"</option>
										<option value="65">5' 5"</option>
										<option value="66">5' 6"</option>
										<option value="67">5' 7"</option>
										<option value="68">5' 8"</option>
										<option value="69">5' 9"</option>
										<option value="70">5' 10"</option>
										<option value="71">5' 11"</option>
									</optgroup>
									<optgroup label="6 foot">
										<option value="72">6' 0"</option>
										<option value="73">6' 1"</option>
										<option value="74">6' 2"</option>
										<option value="75">6' 3"</option>
										<option value="76">6' 4"</option>
										<option value="77">6' 5"</option>
										<option value="78">6' 6"</option>
										<option value="79">6' 7"</option>
										<option value="80">6' 8"</option>
										<option value="81">6' 9"</option>
										<option value="82">6' 10"</option>
										<option value="83">6' 11"</option>
									</optgroup>
									<optgroup label="7 foot">
										<option value="84">7' 0"</option>
										<option value="85">7' 1"</option>
										<option value="86">7' 2"</option>
										<option value="87">7' 3"</option>
										<option value="88">7' 4"</option>
										<option value="89">7' 5"</option>
										<option value="90">7' 6"</option>
										<option value="91">7' 7"</option>
										<option value="92">7' 8"</option>
										<option value="93">7' 9"</option>
										<option value="94">7' 10"</option>
										<option value="95">7' 11"</option>
									</optgroup>
									<optgroup label="8 foot">
										<option value="96">8' 0"</option>
										<option value="97">8' 1"</option>
										<option value="98">8' 2"</option>
										<option value="99">8' 3"</option>
										<option value="100">8' 4"</option>
										<option value="101">8' 5"</option>
										<option value="102">8' 6"</option>
										<option value="103">8' 7"</option>
										<option value="104">8' 8"</option>
										<option value="105">8' 9"</option>
										<option value="106">8' 10"</option>
										<option value="107">8' 11"</option>
									</optgroup>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="member_waist_in">Waist Size</label></th>
							<td><input type="text" pattern="[0-9]*" class="input" name="member_waist_in" id="member_waist_in" value="" size="3" onblur="healthcalc(this.form)" /><span> in</span></td>
						</tr>
					</table>
				<div class="grid12-23 clearfix">
					<div class="left">
						
						<h2>Sleep</h2>
						<p>How many hours do you usually sleep per night?</p>
						<ul>
							<li><label><input type="radio" name="member_score_sleep" class="member_score_sleep" value="5" onclick="healthcalc(this.form)" /> <span>5 hours or less</span></label></li>
							<li><label><input type="radio" name="member_score_sleep" class="member_score_sleep" value="9" onclick="healthcalc(this.form)" /> <span>6 hours</span></label></li>
							<li><label><input type="radio" name="member_score_sleep" class="member_score_sleep" value="11" onclick="healthcalc(this.form)" /> <span>7-8 hours</span></label></li>
							<li><label><input type="radio" name="member_score_sleep" class="member_score_sleep" value="7" onclick="healthcalc(this.form)" /> <span>9 hours or more</span></label></li>
						</ul>
						
						<h2>Exercise</h2>
						<p>How often do you get vigorous physical activity for at least 20-30 minutes? (Examples: Brisk walking, gardening, jogging, sports, swimming, or cycling.)</p>
						<ul>
							<li><label><input type="radio" name="member_score_exercise" class="member_score_exercise" value="13" onclick="healthcalc(this.form)" /> <span>Daily</span></label></li>
							<li><label><input type="radio" name="member_score_exercise" class="member_score_exercise" value="11" onclick="healthcalc(this.form)" /> <span>Most every day</span></label></li>
							<li><label><input type="radio" name="member_score_exercise" class="member_score_exercise" value="7" onclick="healthcalc(this.form)" /> <span>Less than 3 times a week</span></label></li>
							<li><label><input type="radio" name="member_score_exercise" class="member_score_exercise" value="5" onclick="healthcalc(this.form)" /> <span>Rarely</span></label></li>
						</ul>
						
						<h2>Alcohol Use</h2>
						<p>How many servings of alcohol do you drink in a week?</p>
						<ul>
							<li><label><input type="radio" name="member_score_alcohol" class="member_score_alcohol" value="11" onclick="healthcalc(this.form)" /> <span>None</span></label></li>
							<li><label><input type="radio" name="member_score_alcohol" class="member_score_alcohol" value="9" onclick="healthcalc(this.form)" /> <span>1-2 Servings</span></label></li>
							<li><label><input type="radio" name="member_score_alcohol" class="member_score_alcohol" value="5" onclick="healthcalc(this.form)" /> <span>3-10 Servings</span></label></li>
							<li><label><input type="radio" name="member_score_alcohol" class="member_score_alcohol" value="1" onclick="healthcalc(this.form)" /> <span>Over 10 Servings</span></label></li>
						</ul>
					</div>
				
					<div class="right">
						<h2>Smoking History</h2>
						<ul>
							<li><label><input type="radio" name="member_score_smoking" class="member_score_smoking" value="11" onclick="healthcalc(this.form)" /> <span>I have never smoked</span></label></li>
							<li><label><input type="radio" name="member_score_smoking" class="member_score_smoking" value="9" onclick="healthcalc(this.form)" /> <span>I have quit smoking</span></label></li>
							<li><label><input type="radio" name="member_score_smoking" class="member_score_smoking" value="3" onclick="healthcalc(this.form)" /> <span>I smoke less than 1 pack a day</span></label></li>
							<li><label><input type="radio" name="member_score_smoking" class="member_score_smoking" value="0" onclick="healthcalc(this.form)" /> <span>I smoke more than 1 pack a day</span></label></li>
						</ul>
					
						<h2>Diet</h2>
						<p>How often do you eat only plant-based foods? (No meat or dairy products.)</p>
						<ul>
							<li><label><input type="radio" name="member_score_diet" class="member_score_diet" value="11" onclick="healthcalc(this.form)" /> <span>Almost Every Day</span></label></li>
							<li><label><input type="radio" name="member_score_diet" class="member_score_diet" value="9" onclick="healthcalc(this.form)" /> <span>Sometimes</span></label></li>
							<li><label><input type="radio" name="member_score_diet" class="member_score_diet" value="5" onclick="healthcalc(this.form)" /> <span>Rarely or never</span></label></li>
						</ul>
					
						<h2>Nutrition</h2>
						<p>How often do you eat foods containing refined sugar or oil?</p>
						<ul>
							<li><label><input type="radio" name="member_score_nutrition" class="member_score_nutrition" value="6" onclick="healthcalc(this.form)" /> <span>Almost every day</span></label></li>
							<li><label><input type="radio" name="member_score_nutrition" class="member_score_nutrition" value="8" onclick="healthcalc(this.form)" /> <span>Once in a while</span></label></li>
							<li><label><input type="radio" name="member_score_nutrition" class="member_score_nutrition" value="10" onclick="healthcalc(this.form)" /> <span>Rarely or never</span></label></li>
						</ul>
						
						<h2>Emotional Well-being</h2>
						<p>How was your sense of emotional well-being this past week?</p>
						<ul>
							<li><label><input type="radio" name="member_score_emotional" class="member_score_emotional" value="11" onclick="healthcalc(this.form)" /> <span>Happy</span></label></li>
							<li><label><input type="radio" name="member_score_emotional" class="member_score_emotional" value="9" onclick="healthcalc(this.form)" /> <span>Up and down</span></label></li>
							<li><label><input type="radio" name="member_score_emotional" class="member_score_emotional" value="7" onclick="healthcalc(this.form)" /> <span>Sad</span></label></li>
							<li><label><input type="radio" name="member_score_emotional" class="member_score_emotional" value="5" onclick="healthcalc(this.form)" /> <span>Depressed</span></label></li>
						</ul>
						
					</div>
					<input type="text" name="member_score_total" value="" class="hidden" />
				</div>
				
				<div class="center">
					<button type="submit" class="super secondary button" id="calculate"><span>Calculate</span></button>
				</div>
				
				<!-- Javascript inputs -->
				<input type="text" name="jsMemberSleep" class="hidden" value="" />
				<input type="text" name="jsMemberExercise" class="hidden" value="" />
				<input type="text" name="jsMemberSmoking" class="hidden" value="" />
				<input type="text" name="jsMemberAlcohol" class="hidden" value="" />
				<input type="text" name="jsMemberDiet" class="hidden" value="" />
				<input type="text" name="jsMemberNutrition" class="hidden" value="" />
				<input type="text" name="jsMemberEmotional" class="hidden" value="" />
				<input type="text" name="jsHeightTotal" class="hidden" value="" />
				<input type="text" name="jsWaistPoints" class="hidden" value="" />
				<input type="text" name="jsWeightLow" class="hidden" value="" />
				<input type="text" name="jsWeightHigh" class="hidden" value="" />
				<input type="text" name="jsBMI" class="hidden" value="" />
				<input type="text" name="jsBMIPoints" class="hidden" value="" />
				<input type="text" name="jsScoreTotal" class="hidden" value="" />
				
			</form>

	</div>
	<div class="sidebar right">
		<header class="bar">My Information</header>
		<p>The information provided will only be used to calculate your health score and will not be shared with third parties.</p>
		<div id="messageBox">
			<p></p>
			<ul class="bullets"></ul>
		</div>
	</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|healthcalc"}