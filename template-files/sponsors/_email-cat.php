 <?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');
  
//Category Members
$db = new DBconnect();
$queryCat = '
  SELECT 
    exp_member_data.member_id,
    exp_members.username,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name

    FROM exp_members
      INNER JOIN exp_user_category_posts
      ON exp_members.member_id = exp_user_category_posts.member_id
      
      INNER JOIN exp_member_data
      ON exp_members.member_id = exp_member_data.member_id
      
      WHERE exp_user_category_posts.cat_id = {segment_3}
        AND ( exp_member_data.m_field_id_26 = {embed:sponsor_number} OR exp_member_data.m_field_id_7 = {embed:sponsor_zipcode} )
  
UNION DISTINCT

  SELECT 
    exp_member_data.member_id,
    exp_members.username,
    exp_member_data.m_field_id_3 AS first_name,
    exp_member_data.m_field_id_4 AS last_name
    
    FROM exp_members
      INNER JOIN member_relations
      ON exp_members.member_id = member_relations.member_id
      
      INNER JOIN exp_user_category_posts
      ON exp_members.member_id = exp_user_category_posts.member_id
      
      INNER JOIN exp_weblog_titles
      ON member_relations.related_id = exp_weblog_titles.entry_id
      
      INNER JOIN exp_category_posts
      ON exp_weblog_titles.entry_id = exp_category_posts.entry_id
      
      JOIN exp_member_data
      ON exp_member_data.member_id = exp_members.member_id
      
    WHERE exp_category_posts.cat_id = {embed:sponsor_number}
    AND exp_user_category_posts.cat_id = {segment_3}
    
    ORDER BY member_id DESC
      ';

$queryResultsCat = $db->fetch($queryCat);
$queryCountCat = count($queryResultsCat);

if (isset($_POST['custom_message']))
{
  send_emails($queryResultsCat, $_POST['email_subject'], $_POST['custom_message'], $_POST['interest'], $_POST['interest_line']);
} 

function send_emails($mailing_list, $subject, $custom_message, $interest, $interest_line)
{
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: {exp:user:stats dynamic="off"}{exp:weblog:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories} <{username}>{/exp:user:stats}' . "\r\n";
  
  //Add club@newstart.com so that we can see all e-mails sent out.
  array_push($mailing_list, 'club@newstart.com');
  
for ($i = 0; $i < count($mailing_list); $i++)
  {
    // message
    $message = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=610">
    <title>Email Members Template</title>
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
                  <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Announcement</span>
                </td>
              </table>
              <table width="550" cellpadding="0" cellspacing="0">
                <tr>
                  <td bgcolor="#FFFFFF" valign="top" style="font-size:16px;color:#000000;line-height:150%;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; border-bottom-left-radius: 15px; -moz-border-radius-bottomleft: 15px; -webkit-border-bottom-left-radius: 15px; -khtml-border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; -moz-border-radius-bottomright: 15px; -webkit-border-bottom-right-radius: 15px; -khtml-border-bottom-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25); padding:30px;">
        ';
      $message .= 'Dear '. $mailing_list[$i][2] .' '. $mailing_list[$i][3] .',<br /><br />';
      $message .= nl2br($custom_message);
      $message .= '
                    <br /><br />
                    {exp:user:stats dynamic="off"}{firstName} {lastName}<br />{exp:weblog:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories}{/exp:user:stats}<br />
                    <a href="http://newstartclub.com" style="color:#87A621;">newstartclub.com</a></span>
                  </td>
                </tr>
              </table>
              <table width="550" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="background-color:transparent; text-align:center; padding-top:10px;" valign="top">
                    <span style="font-size:10px;color:#FFFFFF;font-family:verdana;">';
      $message .= $interest;
      $message .= $interest_line;
      $message .= '</span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </body>
    </html>';
  
    // Mail it
    //$headers .= 'To: $member' . "\n";
    mail($mailing_list[$i][1], stripslashes($subject), stripslashes($message), $headers);
  }

}

function show_form($listTotal)
{
  print '<div class="heading clearafter">
            <h1>{exp:weblog:categories weblog="sponsors" style="linear" show="{segment_3}"}{category_name}{/exp:weblog:categories} (&nbsp;'. $listTotal .'&nbsp;)</h1>
        </div>
        <div class="grid23 clearafter">
          <div class="left">
            <form method="post" action="">
              <table>
                <tr>
                  <th scope="row"><label for="email_subject">Subject</label></th>
                  <td><input type="text" name="email_subject" class="input" size="32" /></td>
                </tr>
                <tr>
                  <th scope="row"><label for="custom_message">Message</label></th>
                  <td><textarea class="input" cols="40" rows="10" name="custom_message"></textarea></td>
                </tr>
                <tr>
                  <th></th>
                  <td>
                    <input type="hidden" name="interest" value="You are receiving this e-mail because you are interested in &ldquo;{exp:weblog:categories weblog="sponsors" style="linear" show="{segment_3}"}{category_name}{/exp:weblog:categories}&rdquo;." />
                    <textarea name="interest_line" class="hide"><br />You can update your preferences <a href="{path=settings}" style="font-size:10px;color:#FFFFFF;font-family:verdana;">here</a>.</textarea>
                    <p class="button-wrap">
                      <button type="submit" class="super green button"><span>Send Email</span></button>
                    </p>
                  </td>
                </tr>
              </table>
            </form>
          </div><!-- /.left -->
          <div class="sidebar right">
            <div class="bar">Email Signature</div>
            <p>The following digital signature will be added to your message:</p>
            <p><strong>{exp:user:stats dynamic="off"}{firstName} {lastName}{/exp:user:stats}</strong><br />
            {exp:weblog:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories}<br />
            <a href="http://newstartclub.com/">newstartclub.com</a></p>
          </div>
        </div><!-- /.grid23 -->';
}

function show_done($listRecipients)
{

  print '<div class="heading clearafter">
          <h1>Email sent</h1>
        </div>
        <div class="grid23 clearafter">
          <div class="left">
            <p>Your email was sent to the following members:</p>
            <ul id="sent-members-list">';
            
            for ($i = 0; $i < count($listRecipients); $i++)
            {
              print '<li><strong>'. $listRecipients[$i][2] .' '. $listRecipients[$i][3] .'</strong> ('. $listRecipients[$i][1] .')</li>';
            }
            
      print '</ul>
        <p class="button-wrap">
          <a href="/sponsors/email-members" class="super red button"><span>Back to Member List</span></a>
        </p>
        </div><!-- /.left -->
          <div class="sidebar right">
          </div>
        </div><!-- /.grid23 -->';
}

if (isset($_POST['custom_message'])) { show_done($queryResultsCat); } else { show_form($queryCountCat); }

?>