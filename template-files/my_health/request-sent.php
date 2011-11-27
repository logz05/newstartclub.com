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
  
  $message = '
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=610">
  <title>Information Request</title>
  <style>
  a {color:#87A621;}
  </style>
  </head>
    <body style="background: url(http://newstartclub.com/assets/css/images/background-gradient-texture.png) #A7C7EF repeat-x;" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#A7C7EF" >
      <table width="100%" cellpadding="30" cellspacing="0" class="backgroundTable">
        <tr>
          <td valign="top" align="center">
            <table width="550" cellpadding="0" cellspacing="0">
              <tr>
                <td style="border-top:0px solid #333333;">
                <center><a href="http://newstartclub.com/"><IMG SRC="http://newstartclub.com/assets/images/email/invites/header-email.jpg" BORDER="0" title="NEWSTART&reg; Lifestyle Club"  alt="NEWSTART&reg; Lifestyle Club" align="center" style="border-top-left-radius: 15px; -moz-border-radius-topleft: 15px; -webkit-border-top-left-radius: 15px; -khtml-border-top-left-radius: 15px; border-top-right-radius: 15px; -moz-border-radius-topright: 15px; -webkit-border-top-right-radius: 15px; -khtml-border-top-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);" /></a></center>
              </td>
              </tr>
            </table>
            <table width="550" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <td style="background: url(http://newstartclub.com/assets/images/email/newsletter/nav-texture.png) center center #000000; color:#FFFFFF; height: 60px; text-align:right; padding-right: 30px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);">
                <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Information Request</span>
              </td>
            </table>
            <table width="550" cellpadding="0" cellspacing="0">
              <tr>
                <td bgcolor="#FFFFFF" valign="top" style="font-size:16px;color:#000000;line-height:150%;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; border-bottom-left-radius: 15px; -moz-border-radius-bottomleft: 15px; -webkit-border-bottom-left-radius: 15px; -khtml-border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; -moz-border-radius-bottomright: 15px; -webkit-border-bottom-right-radius: 15px; -khtml-border-bottom-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25); padding:30px;">
                  <p><strong>Name</strong>: '. $memberName .'</p>
                  <p><strong>Age</strong>: '. $memberAge .'</p>
                  <p><strong>Address</strong>: '. $memberAddress .'</p>
                  <p><strong>Phone</strong>: '. $memberPhone .'</p>
                  <p><strong>Email</strong>: '. $memberEmail .'</p>
                  <p><strong>My Health Score</strong>: '. $memberHS .'</p>
                  <p><strong>Message</strong>: '. $customMessage .'</p>
                </td>
              </tr>
            </table>
            <table width="550" cellpadding="0" cellspacing="0">
              <tr>
                <td style="background-color:transparent; text-align:center; padding-top:10px;" valign="top">
                  
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
  </html>';
  
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
    <li><a href="/my_health">{section}</a></li>
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
      <p><a href="/my_health/results">&laquo; Back to my results</a></p>
    </div><!--/.list-->
    <div class="sidebar right">
      <div class="bar">Contact Us</div>
      <img src="/assets/images/my_health/NEWSTART-lifestyle-program.jpg" width="190" />
      <p><strong>Corporate Headquarters</strong><br />20601 West Paoli Lane<br />Weimar, CA 95736</p>
      <p>(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;">www.newstart.com</a></p>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.vimeoBadge .clip > a').attr('rel', 'prettyPhoto');
    $('.vimeoBadge a img').attr('alt', 'NEWSTART Now');
    $(".clip").each(function(){
          alt = $(this).find("img").attr("alt");
          title = $(this).find(".caption a").text();
          $(this).find("> a").attr("title", title);
      });
    $(".vimeoBadge a[rel^='prettyPhoto']")
    .prettyPhoto({
      theme:'dark_rounded',
      animationSpeed: 'slow'
    });
  });
</script>
{embed="includes/_doc_bottom" script_add="jquery.prettyPhoto_3.0"}