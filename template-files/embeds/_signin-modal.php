{if logged_out}
<div id="signin-modal-{embed:modal-role}" class="reveal-modal">
	<div class="grid12 clearfix">
		<div class="left">
			<h2>Sign In</h2>
			{if embed:modal-role == "recipe"}
				<h3>You must sign in to view the ingredients.</h3>
			{/if}
			
			{if embed:modal-role == "meal-plan"}
				<h3>You must sign in to view the meal plan.</h3>
			{/if}
			
			{if embed:modal-role == "video"}
				<h3>You must sign in to watch &ldquo;{exp:channel:entries channel="{segment_1}" limit="1" url_title="{segment_3}"}{title}{/exp:channel:entries}&rdquo;</h3>
			{/if}
			
			{if embed:modal-role == "comments"}
				<h3>You must sign in to leave a comment.</h3>
			{/if}
			
			{if embed:modal-role == "question"}
				<h3>You must sign in to ask a question.</h3>
			{/if}
			
			{if embed:modal-role == "contact"}
				<h3>You must sign in to view contact information.</h3>
			{/if}
			
			{if embed:modal-role == "directions"}
				<h3>You must sign in to get directions.</h3>
			{/if}
			
			{if embed:modal-role == "rsvp"}
				<h3>You must sign in to RSVP to this event.</h3>
			{/if}
			
			{if embed:modal-role == "coupon"}
				<h3>You must sign in to view this coupon code.</h3>
			{/if}
			
			{if embed:modal-role == "partner-apply"}
				<h3>You must sign in to apply for partnership.</h3>
			{/if}
			
			{if embed:modal-role == "sponsor-apply"}
				<h3>You must sign in to apply for sponsorship.</h3>
			{/if}
			
			{exp:member:login_form return=""}
				<table>
					<tr>
						<th scope="row"><label for="email">Email</label></th>
						<td><input type="email" class="input" id="email" name="username" value="" placeholder="example@me.com" size="23" autocapitalize="off" autocorrect="off" autocomplete="off"/></td>
					</tr>
					<tr>
						<th scope="row"><label for="password">Password</label></th>
						<td><input type="password" class="input" id="password" name="password" size="23" /></td>
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
		</div>
		
		<div class="right">
			<h2>Not a Member?</h2>
			<h3>Here&rsquo;s some of the benefits:</h3>
			<ul>
				<li>Live streaming videos</li>
				<li>Local seminars &amp; events</li>
				<li>Expert health advice</li>
				<li>Wellness tips &amp; tools</li>
				<li>FREE membership</li>
			</ul>
			<p class="button-wrap">
				<a href="{path='join'}" class="super red button"><span>Join</span></a>
			</p>
		</div>
	</div>
	<a class="close-modal close">&times;</a>
</div>
{/if}