{if logged_out}
<div id="signin-modal-mini" class="reveal-modal mini">
	<h2>Sign In</h2>
	{exp:member:login_form return=""}
	<table>
		<tr>
			<th scope="row"><label for="email-mini">Email</label></th>
			<td><input type="email" class="input" id="email-mini" name="username" value="" size="20" autocapitalize="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="password">Password</label></th>
			<td><input type="password" class="input" id="password" name="password" size="20" /></td>
		</tr>
		{if auto_login}<tr>
			<th></th>
			<td>
				<p>
					<label><input class="checkbox" type="checkbox" name="auto_login" value="1" /><span>Keep me logged in</span></label>
				</p>
			</td>
		</tr>{/if}
		<tr>
			<th scope="row">&nbsp;</th>
			<td>
				<div class="button-wrap">
					<button type="submit" class="super green button"><span>Sign In</span></button>
					<a class="forgot-pass" href="{path='forgot-password'}">Forgot your password?</a>
				</div>
			</td>
		</tr>
	</table>
	{/exp:member:login_form}
	<a class="close-modal close">&times;</a>
</div>
{/if}