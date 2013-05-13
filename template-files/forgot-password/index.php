{!--{exp:http_header status="302" location="{path='1ktd3RT4b43K573/forgot_password'}" terminate="yes"}--}



<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<title>Forgot Password | {site_name}</title>
	
	<meta name="author" content="{site_name}">

	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>

<body class="small">
	<div class="body">
	
		{if logged_out}
		
			<h1>Forgot your password?</h1>
			<p>If you've forgotten your password, just enter your email address you registered with and you will receive an email with instructions for resetting your password.<br></p>
			
			{exp:user:forgot_password}
			
				<table class="modal">
					<tr>
						<th scope="row"><label for="email">Email</label></th>
						<td><input type="email" class="input" id="email" name="email" value="" size="23" /></td>
					</tr>
				</table>
				<div class="button-wrap">
					<button type="submit" class="super green button"><span>Reset Password</span></button>
				</div>
				
			{/exp:user:forgot_password}
			
		{if:else}
		
			<h1>You&rsquo;re already signed in!</h1>
			<p>If you&rsquo;d like to change your password go to <a href="{path='settings'}">settings</a> and use the new password form under the Account section.</p>
			
		{/if}
		
	</div>
</body>
</html>

