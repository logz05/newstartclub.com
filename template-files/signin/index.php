{embed="includes/_doc-top" 
	channel="{channel}"
	header="no"
	nav="no"
	title="{section}"}
{assign_variable:channel="members"}
{assign_variable:section="Sign In"}
<div class="body">
{if logged_out}
		<div class="grid12 clearafter">
		<div class="left">
		<h1>Sign In</h1>
		{exp:member:login_form error_page="members/error" return="/"}
		<table>
			<tr>
				<th scope="row"><label for="username">Email</label></th>
				<td><input type="email" class="input" id="email" name="username" value="" size="23" autocapitalize="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="password">Password</label></th>
				<td><input type="password" class="input" id="password" name="password" size="23" /></td>
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
				</td>
			</tr>
			<tr>
				<th></th>
				<td><a href="/members/forgot-password/">Forgot your password?</a></td>
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
			<div class="button-wrap">
				<a href="/members/register/" class="super red button"><span>Register</span></a>
			</div>
		</div>
	</div>{/if}
{if logged_in}
	<h1>You&rsquo;re already signed in!</h1>
	<p>Click the link below to view your member settings or you can go to the home page.</p>
	<p class="button-wrap">
		<a class="super green button" href="/"><span>Home</span></a>
		<a class="super secondary button" href="/members/settings/"><span>Member Settings</span></a>
	</p>
{/if}
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="yes"}