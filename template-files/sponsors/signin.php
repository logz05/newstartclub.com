{embed="includes/_html_head" 
	channel="{channel}"
	title="{section}"}
{assign_variable:channel="sponsors"}
{assign_variable:section="Sign In"}
<body class="standalone">
<div class="container">
{if logged_out}
	<div class="signin body">
		<div class="grid12 clearafter">
		<div class="left">
		<h1>Sign In</h1>
		{exp:member:login_form error_page="members/error" return="{channel}"}
		<table>
			<tr>
				<th scope="row"><label for="username">Email</label></th>
				<td><input type="text" class="input" id="email" name="username" value="" size="23" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="password">Password</label></th>
				<td><input type="password" class="input" id="password" name="password" size="23" autocomplete="off" /></td>
			</tr>
			{if auto_login}<tr>
				<th></th>
				<td><input class='checkbox' type='checkbox' name='auto_login' value='1' />Keep me logged in</td>
			</tr>{/if}
			<tr>
				<th></th>
				<td>
					<p class="button-wrap">
						<button type="submit" class="super green button"><span>Sign In</span></button>
					</p>
					<a href="{path='members/forgot-password'}">Forgot your password?</a>
				</td>
			</tr>
		</table>		
		{/exp:member:login_form}
		</div>
		
		<div class="right">
			<h1>Not a Member?</h1>
			<p>Here's some of the benefits:</p>
			<ul>
				<li>Live streaming videos</li>
				<li>Local seminars &amp; events</li>
				<li>Expert health advice</li>
				<li>Wellness tips &amp; tools</li>
				<li>FREE membership</li>
			</ul>
			<a href="{path='members/register'}" class="super red button"><span>Register</span></a>
		</div>
	</div>
{/if}
{if logged_in}
<div class="body">
	<h1>You're already signed in!</h1>
	<p>You have already signed in. Click the link below to go the sponsor admin home.</p>
	
	<p class="button-wrap">
		<a class="super green button" href="{path='{channel}'}"><span>Sponsor Admin Home</span></a>
	</p>
{/if}
</div><!--/#body-->
</div><!--/#container-->}
{doc_bottom}