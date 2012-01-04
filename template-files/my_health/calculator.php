<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );
?>

{if logged_in}
<?php
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
{/if}
{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Health Score Calculator"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
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
    <div id="entry">
      <form id="calculator" method="post" action="/my_health/{if logged_in}calculator{if:else}results{/if}">
        <div class="hiddenFields">
        <input type="hidden" name="error_page" value="/my_health/calculator-error" />
        </div>
            <table>
            <tr>
              <th scope="row"><label for="memberAge">Age</label></th>
              <td><input type="text" class="input" name="memberAge" id="memberAge" value="" size="3" onblur="healthcalc(this.form)" /><span> yrs</span></td>
            </tr>
            <tr>
              <th scope="row"><label for="memberWeight">Weight</label></th>
              <td><input type="text" class="input" name="memberWeight" id="memberWeight" value="" size="5" onblur="healthcalc(this.form)" /><span> lbs</span></td>
            </tr>
          </table>
          <table>
            <tr>
              <th scope="row"><label for="memberHeightFeet">Height</label></th>
              <td>
                <select class="input" name="memberHeightFeet" id="memberHeightFeet" onblur="healthcalc(this.form)">
                  <option value="">Feet</option>
                  <option value="3">3'</option>
                  <option value="4">4'</option>
                  <option value="5">5'</option>
                  <option value="6">6'</option>
                  <option value="7">7'</option>
                  <option value="8">8'</option>
                </select>
                <select class="input" name="memberHeightInches" id="memberHeightInches" onblur="healthcalc(this.form)">
                  <option value="">Inches</option>
                  <option value="0">0"</option>
                  <option value="1">1"</option>
                  <option value="2">2"</option>
                  <option value="3">3"</option>
                  <option value="4">4"</option>
                  <option value="5">5"</option>
                  <option value="6">6"</option>
                  <option value="7">7"</option>
                  <option value="8">8"</option>
                  <option value="9">9"</option>
                  <option value="10">10"</option>
                  <option value="11">11"</option>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row"><label for="memberWaistSize">Waist Size</label></th>
              <td><input type="text" class="input" name="memberWaistSize" id="memberWaistSize" value="" size="3" onblur="healthcalc(this.form)" /><span> in</span></td>
            </tr>
          </table>
        <div class="grid12-23 clearfix">
          <div class="left">
            
            <h2>Sleep</h2>
            <p>How many hours do you usually sleep per night?</p>
            <ul>
              <li><label><input type="radio" name="memberSleep" class="memberSleep" value="5" onclick="healthcalc(this.form)" /> <span>5 hours or less</span></label></li>
              <li><label><input type="radio" name="memberSleep" class="memberSleep" value="9" onclick="healthcalc(this.form)" /> <span>6 hours</span></label></li>
              <li><label><input type="radio" name="memberSleep" class="memberSleep" value="11" onclick="healthcalc(this.form)" /> <span>7-8 hours</span></label></li>
              <li><label><input type="radio" name="memberSleep" class="memberSleep" value="7" onclick="healthcalc(this.form)" /> <span>9 hours or more</span></label></li>
            </ul>
            
            <h2>Exercise</h2>
            <p>How often do you get vigorous physical activity for at least 20-30 minutes? (Examples: Brisk walking, gardening, jogging, sports, swimming, or cycling.)</p>
            <ul>
              <li><label><input type="radio" name="memberExercise" class="memberExercise" value="13" onclick="healthcalc(this.form)" /> <span>Daily</span></label></li>
              <li><label><input type="radio" name="memberExercise" class="memberExercise" value="11" onclick="healthcalc(this.form)" /> <span>Most every day</span></label></li>
              <li><label><input type="radio" name="memberExercise" class="memberExercise" value="7" onclick="healthcalc(this.form)" /> <span>Less than 3 times a week</span></label></li>
              <li><label><input type="radio" name="memberExercise" class="memberExercise" value="5" onclick="healthcalc(this.form)" /> <span>Rarely</span></label></li>
            </ul>
            
            <h2>Alcohol Use</h2>
            <p>How many servings of alcohol do you drink in a week?</p>
            <ul>
              <li><label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="11" onclick="healthcalc(this.form)" /> <span>None</span></label></li>
              <li><label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="9" onclick="healthcalc(this.form)" /> <span>1-2 Servings</span></label></li>
              <li><label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="5" onclick="healthcalc(this.form)" /> <span>3-10 Servings</span></label></li>
              <li><label><input type="radio" name="memberAlcohol" class="memberAlcohol" value="1" onclick="healthcalc(this.form)" /> <span>Over 10 Servings</span></label></li>
            </ul>
          </div>
        
          <div class="right">
            <h2>Smoking History</h2>
            <ul>
              <li><label><input type="radio" name="memberSmoking" class="memberSmoking" value="11" onclick="healthcalc(this.form)" /> <span>I have never smoked</span></label></li>
              <li><label><input type="radio" name="memberSmoking" class="memberSmoking" value="9" onclick="healthcalc(this.form)" /> <span>I have quit smoking</span></label></li>
              <li><label><input type="radio" name="memberSmoking" class="memberSmoking" value="3" onclick="healthcalc(this.form)" /> <span>I smoke less than 1 pack a day</span></label></li>
              <li><label><input type="radio" name="memberSmoking" class="memberSmoking" value="0" onclick="healthcalc(this.form)" /> <span>I smoke more than 1 pack a day</span></label></li>
            </ul>
          
            <h2>Breakfast</h2>
            <p>How often do you eat a good breakfast? (Including fruits, cereals, bread or more.)</p>
            <ul>
              <li><label><input type="radio" name="memberBreakfast" class="memberBreakfast" value="10" onclick="healthcalc(this.form)" /> <span>Almost Every Day</span></label></li>
              <li><label><input type="radio" name="memberBreakfast" class="memberBreakfast" value="8" onclick="healthcalc(this.form)" /> <span>Sometimes</span></label></li>
              <li><label><input type="radio" name="memberBreakfast" class="memberBreakfast" value="6" onclick="healthcalc(this.form)" /> <span>Rarely or never</span></label></li>
            </ul>
          
            <h2>Snacking</h2>
            <p>How often do you eat between meals?</p>
            <ul>
              <li><label><input type="radio" name="memberSnacking" class="memberSnacking" value="5" onclick="healthcalc(this.form)" /> <span>Almost every day</span></label></li>
              <li><label><input type="radio" name="memberSnacking" class="memberSnacking" value="9" onclick="healthcalc(this.form)" /> <span>Once in a while</span></label></li>
              <li><label><input type="radio" name="memberSnacking" class="memberSnacking" value="11" onclick="healthcalc(this.form)" /> <span>Rarely or never</span></label></li>
            </ul>
            
            <h2>Emotional Well-being</h2>
            <p>How was your sense of emotional well-being this past week?</p>
            <ul>
              <li><label><input type="radio" name="memberEmotional" class="memberEmotional" value="11" onclick="healthcalc(this.form)" /> <span>Happy</span></label></li>
              <li><label><input type="radio" name="memberEmotional" class="memberEmotional" value="9" onclick="healthcalc(this.form)" /> <span>Up and down</span></label></li>
              <li><label><input type="radio" name="memberEmotional" class="memberEmotional" value="7" onclick="healthcalc(this.form)" /> <span>Sad</span></label></li>
              <li><label><input type="radio" name="memberEmotional" class="memberEmotional" value="5" onclick="healthcalc(this.form)" /> <span>Depressed</span></label></li>
            </ul>
            
          </div>
          <input type="text" name="memberScoreTotal" value="" class="hidden" />
        </div>
        
        <div class="center">
          <button type="submit" class="super secondary button" id="calculate"><span>Calculate</span></button>
        </div>
        
        <!-- Javascript inputs -->
        <input type="text" name="jsMemberSleep" class="hidden" value="" />
        <input type="text" name="jsMemberExercise" class="hidden" value="" />
        <input type="text" name="jsMemberSmoking" class="hidden" value="" />
        <input type="text" name="jsMemberAlcohol" class="hidden" value="" />
        <input type="text" name="jsMemberBreakfast" class="hidden" value="" />
        <input type="text" name="jsMemberSnacking" class="hidden" value="" />
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

  </div>
  <div class="sidebar right">
    <div class="bar">My Information</div>
    <p>The information provided will only be used to calculate your health score and will not be shared with third parties.</p>
    <div id="messageBox">
      <p></p>
      <ul class="bullets"></ul>
    </div>
  </div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|healthcalc"}