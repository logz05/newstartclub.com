{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Your request has been sent!"
  add="pp/prettyPhoto|vimeo"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
{exp:user:stats}
  <?php
  
  if (isset($_POST['location']))
  {
  $memberName = $_POST['name']; 
  $memberAge = "{memberAge}"; 
  $memberAddress = "{address}, {city}, {state} {zipCode}"; 
  $memberPhone = $_POST['phone']; 
  $memberEmail = "{username}"; 
  $memberHS = "{memberScoreTotal}"; 
  $customMessage = $_POST['custom-message'];
  
  $location = $_POST['location'];
  
  $todayis = date("l, F j, Y, g:i a") ;
  
  $subject = "Tell me more about your NEWSTART Lifestyle Program";
  
  $message = "
Name: $memberName\n
Age: $memberAge\n
Address: $memberAddress\n
Phone: $memberPhone\n
Email: $memberEmail\n
My Health Score: $memberHS\n
Message: $customMessage

---------------------------
Sent from www.newstartclub.com";
  
  $from = "From: {username}\r\n";
  
  mail("club@newstart.com, $location", $subject, $message, $from);
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
      <div class="bar">Locations</div>
      <p><strong>Weimar Center of Health &amp; Education</strong><br />20601 West Paoli Lane<br />Weimar, CA 95736</p>
      <p>(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;">www.newstart.com</a></p>
      
      <p><strong>Wildwood Lifestyle Center &amp; Hospital</strong><br />435 Lifestyle Ln<br />Wildwood, GA 30757</p>
      <p>(800) 634-9355<br /><a href="http://www.wildwoodhealth.org/" title="Wildwood Lifestyle Center &amp; Hospital">www.wildwoodhealth.org</a></p>
      
      <p><strong>Uchee Pines Institute</strong><br />30 Uchee Pines Road<br />Seale, AL 36875</p>
      <p>(877) 824-3374<br /><a href="http://www.ucheepines.org/" title="Uchee Pines Institute">www.ucheepines.org</a></p>
      
      <p><strong>Eden Valley Institute</strong><br />6263 North County Road 29<br />Loveland, CO 80538</p>
      <p>(800) 637-9355<br /><a href="http://www.eden-valley.org/" title="Eden Valley Institute">www.eden-valley.org</a></p>
      
      <p><strong>Black Hills Health &amp; Education Center</strong><br />3815 Battle Creek Road<br />Hermosa, SD 57744</p>
      <p>(800) 658-5433<br /><a href="http://www.bhhec.org/" title="Black Hills Health &amp; Education Center">www.bhhec.org</a></p>
      
      <p><strong>Living Springs Retreat</strong><br />1768 County Road 628<br />Roanoke, AL 36274</p>
      <p>(256) 449-2628<br /><a href="http://www.livingspringsretreat.com/" title="Living Springs Retreat">www.livingspringsretreat.com</a></p>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.prettyPhoto_3.0"}