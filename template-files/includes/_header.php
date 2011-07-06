<div class="header clearafter">
	<div class="nav">
		<ul>
		{if logged_in}
			<li>
				<h5>Hi, <strong>{exp:user:stats dynamic="off"}<?php echo ucwords(strtolower("{firstName} {lastName}")); ?>{/exp:user:stats}</strong></h5>
			</li>
		{/if}
			<li>
				{if logged_out}
					<a href="{if segment_1 == 'sponsor_admin'}{path='{segment_1}/signin'}{if:else}{path='members/signin'}{/if}">Sign In</a>
				{/if}
				{if logged_in}
					<a href="{path=logout}">Sign Out</a>
				{/if}
			</li>
			<li>
				{if logged_out}
					<a href="{path=members/register}">Register</a>
				{/if}
				{if logged_in}
					<a href="{path=members/settings}">Settings</a>
				{/if}
			</li>
		</ul>
	</div>
</div>