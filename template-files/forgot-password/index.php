<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Forgot Password | {site_name}</title>
  <![if !IEMobile]>
  <meta name="viewport" content="width=860;" />
  <![endif]>
<?php

function fileModTime($filename) {

  $file = '/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content' . $filename;
  
  if (file_exists($file)) {
    echo "?v=" . date("YmdHis", filemtime($file));
  }

}

?>

  <link rel="stylesheet" href="/assets/css/standalone.css<?php fileModTime('/assets/css/standalone.css'); ?>" type="text/css" />
</head>
<body>
<div class="container">
  <div class="body">
    {if logged_out}
      <h1>Forgot your password?</h1>
      <p>If you've forgotten your password, just enter your email address you registered with and you will receive an email with instructions for resetting your password.<br></p>
      {exp:user:forgot}
        <table>
          <tr>
            <th scope="row"><label for="email">Email</label></th>
            <td><input type="text" class="input" id="email" name="email" value="" size="23" /></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>
              <div class="button-wrap">
                <button type="submit" class="super green button"><span>Reset Password</span></button>
              </div>
            </td>
          </tr>
        </table>
      {/exp:user:forgot}
    {if:else}
      <h1>You&rsquo;re already signed in!</h1>
      <p>If you&rsquo;d like to change your password go to <a href="/settings/">settings</a> and use the new password form under the Account section.</p>
    {/if}
  </div>
</div>
</body>
</html>