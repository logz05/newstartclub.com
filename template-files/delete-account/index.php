<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		 <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		 <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		 <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />
 
	<title>Delete Account | {site_name}</title>

	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>
<body class="small">
	<div class="body">
		<h1>Delete Account</h1>
		<p>This will delete all comments and other content associated with your account.</p>
		<p>WARNING: THIS ACTION CANNOT BE UNDONE!</p>
	{exp:user:delete_form return="delete-feedback" form:class="clearfix" form:id="delete-account"} 
		<h2>Delete account: {email}</h2>	
		<table>
			<tr>
				<th scope="row"><label for="password">Your Password:</label></th>
				<td>
					<input type="password" class="input" name="password" />
					<input type="hidden" class="hidden" name="delete-account-email" value="{email}" />
					<input type="hidden" class="hidden" name="delete-account-name" value="{exp:user:stats}{member_first_name} {member_last_name}{/exp:user:stats}" />
				</td>
			</tr>
		</table>
		<p class="button-wrap">
			<a href="{path='settings'}" class="super green button"><span>&laquo; Back to Settings</span></a>
			<button type="submit" class="super red button"><span>Delete Account</span></button>
		</p>
	{/exp:user:delete_form}
	</div>
</body>
</html>