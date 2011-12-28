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
 
  <title>Delete Account | {site_name}</title>

  <link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>
<body>
<div class="container">
  <div class="body">
    <h1>Delete Account</h1>
    <p>This will delete all entries, posts, comments, and other content associated with your account.</p>
    <p>WARNING: THIS ACTION CANNOT BE UNDONE!</p>
  {exp:user:delete_form return="delete-confirmation" form:class="clearfix" form:id="delete-account"} 
    <h2>Delete account: {email}</h2>  
    <table>
      <tr>
        <th scope="row"><label for="password">Your Password:</label></th>
        <td><input type="password" class="input" name="password" /></td>
      </tr>
    </table>
    <p class="button-wrap clearafter">
      <a href="{path='settings'}" class="super green button"><span>&laquo; Back</span></a>
      <button type="submit" class="super red right button"><span>Delete Account</span></button>
    </p>
  {/exp:user:delete_form}
  </div>
</div>
</body>
</html>