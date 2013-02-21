<nav class="super-nav">
	<ul>
		{if logged_in}
			<li>Hi,
			{exp:user:stats dynamic="off"}
				<strong>{exp:stringy:upperfirst}{member_first_name} {member_last_name}{/exp:stringy:upperfirst}</strong>
			{/exp:user:stats}
			</li>
		{/if}
		{if segment_1 != "sponsors" && (member_group == 1 || member_group == 6)}<li><a href="{path='sponsors'}">Sponsor Admin</a></li>{/if}
		{if segment_1 == "sponsors" && (member_group == 1 || member_group == 6)}<li><a href="{path='site_index'}">Main Site</a></li>{/if}
		<li>
			{if logged_out}
				<a href="{path='signin'}" data-reveal-id="signin-modal-mini" id="sign-in">Sign In</a>
			{if:else}
				<a href="{path='logout'}">Sign Out</a>
			{/if}
		</li>
		<li>
			{if logged_out}
				<a href="{path='join'}">Join</a>
			{if:else}
				<a href="{path='settings'}">Settings</a>
			{/if}
		</li>
	</ul>
</nav>