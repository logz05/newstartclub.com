<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once 'dbconnect.php';

$db = new DBconnect();

function send_emails($fname, $lname, $email)
{
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: NEWSTART Lifestyle Club <club@newstart.com>' . "\r\n";

  // message
  $message = '
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=610">
  <title>Welcome Email</title>
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
                <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Welcome to the</span> <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;font-weight:bold;">Club</span>
              </td>
            </table>
            <table width="550" cellpadding="0" cellspacing="0">
              <tr>
                <td bgcolor="#FFFFFF" valign="top" style="font-size:16px;color:#000000;line-height:150%;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; border-bottom-left-radius: 15px; -moz-border-radius-bottomleft: 15px; -webkit-border-bottom-left-radius: 15px; -khtml-border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; -moz-border-radius-bottomright: 15px; -webkit-border-bottom-right-radius: 15px; -khtml-border-bottom-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25); padding:30px;">
                  <span>Hi ';
            $message .= $fname .' '. $lname;
            $message .= ',</span><br /><br />
                  <span>As a registered member, you now have access to:</span>
                   <ul>
                    <li>Live streaming videos</li>
                    <li>Local seminars & events</li>
                    <li>Expert health advice</li>
                    <li>Wellness tips & tools</li>
                    <li>FREE membership</li>
                   </ul>
                   <span>To get started, log in to <a href="http://newstartclub.com/signin">http://newstartclub.com/signin</a> using your e-mail address ('. $email .') and the password you chose at signup.</span><br /><br />
                   <span>If you ever forget your password, you can reset it at <a href="http://newstartclub.com/forgot-password">http://newstartclub.com/forgot-password</a>.</span><br /><br />
                  <span>Enjoy,<br />
                  The NEWSTART Lifestyle Club Team<br />
                  <a href="http://newstartclub.com/" style="">newstartclub.com</a></span><br /><br />
                  <span>P.S. As our way of saying thank you for joining, please click <a href="http://newstartclub.com/downloads/sponsor-resources/common-files/NEWSTART-Planner.pdf" style="color:#87A621;">here</a> to download your free NEWSTART&reg; Daily Planner.</span>
                </td>
              </tr>
            </table>
            <table width="550" cellpadding="0" cellspacing="0">
              <tr>
                <td style="background-color:transparent; text-align:center; padding-top:10px;" valign="top">
                  <span style="font-size:10px;color:#548DEA;font-family:verdana;">A FREE community service of <a href="http://newstart.com/" style="color:#548DEA;text-decoration:underline;">NEWSTART&reg;</a>. &copy;  2011. All Rights Reserved</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
  </html>';

  // Mail it
  mail($email, 'Welcome to the Club!', stripslashes($message), $headers);
}
?>
{exp:user:stats dynamic="off"}

<?php
  $email_sent = {welcome_email_sent};
  
  //Update member profile to show that email has been sent.
  $query = "UPDATE exp_member_data SET m_field_id_32 = 1 WHERE member_id = {member_id}";
  
  $db->query($query);
  
  $db = null; // force the class destructor to run
  
  echo '<!-- '. $email_sent .' -->';
  
  if ($email_sent != 1) {
     send_emails('{firstName}', '{lastName}', '{username}');
  }

?>

{/exp:user:stats}

{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"}
{assign_variable:channel="members"}
{assign_variable:section="Update Profile"}
  <div class="heading">
    <h1>{section}</h1>
  </div>
  <div class="grid23 clearfix">
    <div class="main left">
  
      <h2 class="first">To better serve your health needs, please take a moment to indicate the areas you&rsquo;re interested in.</h2>
      
    {exp:user:edit return="/my_health" form:class="clearfix" form:id="update-profile"}
      <h2>Check the subjects you are interested in</h2>
      <div class="grid12-23 clearfix">
        <div class="left">
          <ul>
            {categories group_id="14" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
            {category_body}<li><label><input type="checkbox" name="category[]" class="input checkbox" value="{category_id}" {selected} /><span>{category_description}</span></label></li>
            {/category_body}{/categories}
          </ul>
        </div>
        <div class="right">
          <h3>Emotional and spiritual health:</h3>
          <ul>
            {categories group_id="15" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
            {category_body}<li><label><input type="checkbox" name="category[]" class="input checkbox" alue="{category_id}" {selected} /><span>{category_description}</span></label></li>
            {/category_body}{/categories}
          </ul>
        </div>
      </div>

      <h3>I would like information on:</h3>
      <ul>
        {categories group_id="16" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
        {category_body}<li><label><input type="checkbox" name="category[]" class="input checkbox" value="{category_id}" {selected} /><span>{category_description}</span></label></li>
        {/category_body}{/categories}
      </ul>

      <input type="hidden" class="hidden" name="firstName" id="firstName" value="{firstName}" size="25" autocomplete="off" />
      <input type="hidden" pattern="[0-9]*" class="hidden" id="zipCode" name="zipCode" value="{zipCode}" size="7" autocomplete="off" />
      <input type="hidden" name="terms_and_conditions" value="on" />
      
      <p><button type="submit" class="super green button"><span>Save</span></button></p>
      {/exp:user:edit}
    </div><!--/.left-->
    <div class="sidebar right">
      <div class="bar">{section}</div>
      <p>To view or change your completed profile at anytime as well as update your password, click on &ldquo;Settings&rdquo; at the top of the page.</p>
      <div class="update-profile"></div>
    </div>
  </div><!--/.grid23-->
{embed="embeds/_doc-bottom"}