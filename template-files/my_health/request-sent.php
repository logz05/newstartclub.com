{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Your request has been sent!"
  add="pp/prettyPhoto|vimeo"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
{exp:user:stats}
  <?php
  
  if (isset($_POST['name']))
  {
  $memberName = $_POST['name']; 
  $memberAge = "{memberAge}"; 
  $memberAddress = "{address}, {city}, {state} {zipCode}"; 
  $memberPhone = $_POST['phone']; 
  $memberEmail = "{username}"; 
  $memberHS = "{memberScoreTotal}"; 
  $customMessage = $_POST['custom-message'];
  
  $todayis = date("l, F j, Y, g:i a") ;
  
  $subject = "Tell me more about your NEWSTART® Lifestyle Program";
  
  $message = "
<p><strong>Name</strong>: $memberName</p>
<p><strong>Age</strong>: $memberAge</p>
<p><strong>Address</strong>: $memberAddress</p>
<p><strong>Phone</strong>: $memberPhone</p>
<p><strong>Email</strong>: $memberEmail</p>
<p><strong>My Health Score</strong>: $memberHS</p>
<p><strong>Message</strong>: $customMessage</p>

--------------------------- <br />
Sent from <a href='www.newstartclub.com'>www.newstartclub.com</a>";
  
  // To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: {firstName} {lastName} <{username}>' . "\r\n";
	$headers .= 'Bcc: ron.giannoni@newstart.com, ddennis@weimar.org, tbaril@weimar.org, development@weimar.org, info@wildwoodhealth.org, lifestylecenter@ucheepines.org, lifestyle@eden-valley.org, health@bhhec.org, reservations@livingspringsretreat.com' . "\r\n";
  
  mail("club@newstart.com", $subject, stripslashes($message), $headers);
  }
  
  ?>
{/exp:user:stats}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>Congratulations!</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <p>You have taken an important first step to improving your health naturally. A NEWSTART&reg; representative will contact you shortly. In the meantime, check out the following videos to find out how the NEWSTART&reg; Lifestyle Program has helped others get well or visit <a href="http://www.newstart.com/" title="www.newstart.com">www.newstart.com</a> to learn more.</p>
      <div class="vimeoBadge">
        <script type="text/javascript" src="http://vimeo.com/weimartv/badgeo/?stream=channel&amp;stream_id=39106&amp;count=12&amp;thumbnail_width=100&amp;show_titles=yes"></script>
      </div>
      <p><a href="{path='{channel}/results/'}">&laquo; Back to my results</a></p>
    </div><!--/.list-->
    <div class="sidebar right">
      <div class="bar">Contact Us</div>
      <img src="/assets/images/my_health/NEWSTART-lifestyle-program.jpg" width="190" />
      <p><strong>Corporate Headquarters</strong><br />20601 West Paoli Lane<br />Weimar, CA 95736</p>
      <p>(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;">www.newstart.com</a></p>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.prettyPhoto_3.0"}