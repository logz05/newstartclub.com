<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');


function send_emails($mailing_list, $subject, $custom_message, $interest, $interest_line, $event, $rsvp_list, $full_list, $full_list_settings)
{
  // message
  $message = '
  <html>
  <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#4DA6EC" >
    <STYLE> a { color:#87A621; } </STYLE>
    <table width="100%" cellpadding="30" cellspacing="0" class="backgroundTable" bgcolor="#4DA6EC">
      <tr>
        <td valign="top" align="center">
          <table width="550" cellpadding="0" cellspacing="0">
            <tr>
              <td style="background-color:#4DA6EC;border-top:0px solid #333333;border-bottom:10px solid #000000;">
                <center><a href="http://newstartclub.com/"><img src="http://newstartclub.com/assets/images/email/invites/header-email.jpg" border="0" title="NEWSTART&reg; Lifestyle Club"  alt="NEWSTART&reg; Lifestyle Club" align="center" /></a></center>
              </td>
            </tr>
          </table>
          <table width="550" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td style="background-color:#000000;color:#FFFFFF;border-bottom:10px solid #000000;text-align:right;"><span style="font-size:30px;font-weight:bold;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;line-height:110%;padding-right:20px;">Announcement</span></td>
            </tr>
          </table>
          <table width="550" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td bgcolor="#FFFFFF" valign="top" style="padding-left:40px;padding-right:40px;padding-top:30px;padding-bottom:0px;font-size:16px;color:#000000;line-height:150%;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">
    ';
  $message .= nl2br($custom_message);
  $message .= '
                <br /><br />
                {exp:user:stats dynamic="off"}{firstName} {lastName}<br />{exp:weblog:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories}{/exp:user:stats}<br />
                <a href="http://newstartclub.com/">newstartclub.com</a></span>
              </td>
            </tr>
          </table>
          <table width="550" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td style="background-color:#4da6ec;border-top:0px solid #333333;">
                <center><img src="http://newstartclub.com/assets/images/email/invites/footer-email.png" border="0" title="Email Footer"  alt="Email Footer" align="center" /></center>
              </td>
            </tr>
            <tr>
              <td style="background-color:#4DA6EC;text-align:center;" valign="top"><br />
                <span style="font-size:10px;color:#FFFFFF;font-family:verdana;">'; 
  $message .= $interest;
  $message .= $interest_line;
  $message .= $event;
  $message .= $rsvp_list;
  $message .= $full_list;
  $message .= $full_list_settings;
  $message .= '</span>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
  ';
  
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: {exp:user:stats dynamic="off"}{exp:weblog:categories show="{embed:embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories} <{username}>{/exp:user:stats}' . "\r\n";
  
  array_push($mailing_list, 'club@newstart.com');
  
  
foreach ($mailing_list as $member)
  {
    // Mail it
    //$headers .= 'To: $member' . "\n";
    mail($member, stripslashes($subject), stripslashes($message), $headers);
  }

}

if (isset($_POST['custom_message']))
{ ?>
    {exp:query sql="
      SELECT exp_member_data.member_id AS member_id
        FROM exp_member_data

            INNER JOIN exp_category_posts
            ON exp_category_posts.cat_id = exp_member_data.m_field_id_26

          WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_relations.member_id AS member_id
          FROM member_relations

              LEFT JOIN exp_category_posts
              ON exp_category_posts.entry_id = member_relations.related_id

            WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_26 = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_7 = {embed:sponsor_zipcode}
            
        ORDER BY member_id ASC
      "}
<?php $members = '{exp:user:users limit="1" member_id="{member_id}"}{username},{/exp:user:users}'; ?>
    {/exp:query}

<?php
  
  $member_list = explode(',', $members);
  
  //The following list was used for testing purposes
  //$member_list = array('me@cavellblood.com','cblood@weimar.org','rramont@weimar.org','rramont@gmail.com');
  
  send_emails($member_list, $_POST['email_subject'], $_POST['custom_message'], $_POST['interest'], $_POST['interest_line'], $_POST['event'], $_POST['rsvp_list'], $_POST['full_list'], $_POST['full_list_settings']);
  //print $member_list;
}

function show_form()
{
  print '<div class="heading clearafter">
            {exp:query sql="
              SELECT count(member_id) AS total FROM (
                SELECT exp_member_data.member_id AS member_id
                  FROM exp_member_data
        
                      INNER JOIN exp_category_posts
                      ON exp_category_posts.cat_id = exp_member_data.m_field_id_26
        
                    WHERE exp_category_posts.cat_id = {embed:sponsor_number}
        
                  UNION DISTINCT
        
                    SELECT member_relations.member_id AS member_id
                    FROM member_relations
        
                        LEFT JOIN exp_category_posts
                        ON exp_category_posts.entry_id = member_relations.related_id
        
                      WHERE exp_category_posts.cat_id = {embed:sponsor_number}
        
                  UNION DISTINCT
        
                    SELECT member_id
                    FROM exp_member_data
                      WHERE m_field_id_26 = {embed:sponsor_number}
        
                  UNION DISTINCT
        
                    SELECT member_id
                    FROM exp_member_data
                      WHERE m_field_id_7 = {embed:sponsor_zipcode}
                ) a"}
            <h1>Member List (&nbsp;{total}&nbsp;)</h1>
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
                    <input type="hidden" name="full_list" value="This email was sent to you because you are member of the NEWSTART Lifestyle Club" />
                    <textarea name="full_list_settings" class="hide"><br />You can update your preferences in <a href="{path=settings}" style="font-size:10px;color:#FFFFFF;font-family:verdana;">Settings</a>.</textarea>
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
        </div><!-- /.grid23 -->'; ?>
        
        {!--{exp:query sql="
      SELECT exp_member_data.member_id AS member_id
        FROM exp_member_data

            INNER JOIN exp_category_posts
            ON exp_category_posts.cat_id = exp_member_data.m_field_id_26

          WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_relations.member_id AS member_id
          FROM member_relations

              LEFT JOIN exp_category_posts
              ON exp_category_posts.entry_id = member_relations.related_id

            WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_26 = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_7 = {embed:sponsor_zipcode}
            
        ORDER BY member_id ASC
      "}{/exp:query}--}
<?php 
$db = new DBconnect();
$query = 'SELECT exp_member_data.member_id AS member_id
        FROM exp_member_data

            INNER JOIN exp_category_posts
            ON exp_category_posts.cat_id = exp_member_data.m_field_id_26

          WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_relations.member_id AS member_id
          FROM member_relations

              LEFT JOIN exp_category_posts
              ON exp_category_posts.entry_id = member_relations.related_id

            WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_26 = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_7 = {embed:sponsor_zipcode}
            
        ORDER BY member_id ASC
      ';
$memberList = $db->fetch($query);
      
 $members = '<li>{exp:user:stats limit="1" member_id="{member_id}" dynamic="off"}<strong>{firstName} {lastName}</strong> ({username}){/exp:user:stats}</li>';


  print '<ul id="sent-members-list" class="hide">';
  foreach ($memberList as $member) {
    print '<li>{exp:user:stats limit="1" member_id="'. $member .'" dynamic="off"}<strong>{firstName} {lastName}</strong> ({username}){/exp:user:stats}</li>';
  }
  print '</ul>';
}

function show_done()
{
  $members = '

    {exp:query sql="
      SELECT exp_member_data.member_id AS member_id
        FROM exp_member_data

            INNER JOIN exp_category_posts
            ON exp_category_posts.cat_id = exp_member_data.m_field_id_26

          WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_relations.member_id AS member_id
          FROM member_relations

              LEFT JOIN exp_category_posts
              ON exp_category_posts.entry_id = member_relations.related_id

            WHERE exp_category_posts.cat_id = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_26 = {embed:sponsor_number}

        UNION DISTINCT

          SELECT member_id
          FROM exp_member_data
            WHERE m_field_id_7 = {embed:sponsor_zipcode}
            
        ORDER BY member_id ASC
      "}
    <li>{exp:user:users limit="1" member_id="{member_id}"}<strong>{firstName} {lastName}</strong> ({username}){/exp:user:users}</li>
    {/exp:query}';

  print '<div class="heading clearafter">
          <h1>Email sent</h1>
        </div>
        <div class="grid23 clearafter">
          <div class="left">
            <p>Your email was sent to the following members:</p>
            <ul id="sent-members-list">';
  print $members;
  print '</ul>
        <p class="button-wrap">
          <a href="{path=\'sponsors/email-members\'}" class="super red button"><span>Back to Member List</span></a>
        </p>
        </div><!-- /.left -->
          <div class="sidebar right">
          </div>
        </div><!-- /.grid23 -->';
}
?>
<?php if (isset($_POST['custom_message'])) { show_done(); } else { show_form(); } ?>