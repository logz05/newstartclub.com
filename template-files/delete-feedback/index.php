<?php 

if (isset($_POST['reason']))
{
$reason = $_POST['reason'];

$subject = "Account Deleted Feedback";

$message = '<p><strong>From:</strong> '. $_SESSION['delete-account-name'] .'</p>';
$message .= '<p><strong>Email:</strong> '. $_SESSION['delete-account-email'] .'</p>';
$message .= '<p><strong>Message:</strong> '. nl2br($reason) .'</p>';

$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$headers .= 'From: '. $_SESSION['delete-account-name'] .' <'. $_SESSION['delete-account-email'] . '>'. "\r\n";

mail("club@newstart.com", stripslashes($subject), stripslashes($message), $headers);
}

?>

<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=860;" />
 
  <title>Account Deleted | {site_name}</title>

  <link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
  <link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>
<body class="small">
  <div class="body">
    <?php if (isset($_POST['reason'])) { ?>
    <h1>Thank You!</h1>
    <h3>Your feedback is appreciated!</h3>
    <script type="text/javascript">
      setTimeout("location.href = '{site_url}';", 2000);
    </script>
  <?php } else { ?>
    <h1>Account Deleted</h1>  
    <p>Could you let us know what we did wrong?</p>
    <p>Your feedback will really help us improve the {site_name}.</p>
    <form action="" method="post">
     <textarea name="reason" class="input" rows="8"></textarea></td>
      <div class="button-wrap clearfix">
        <button type="submit" class="super green button"><span>Send</span></button>
        <a href="/" class="super red button"><span>No Thanks</span></a>
      </div>
    </form>
  <?php } ?>
  </div>
</body>
</html>