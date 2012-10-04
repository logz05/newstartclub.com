{embed="embeds/_doc-top" 
	class="sponsors"
	title="Email Members"
	admin_id="{exp:user:stats dynamic='off'}{member_admin_id}{/exp:user:stats}"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_admin_id}" weblog="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}
	{if segment_3 != ""}
		<ul class="trail">
			<li><a href="{path='sponsors'}">Home</a></li>
			<li><a href="{path='sponsors/email-members'}">Member List</a></li>
		</ul>
	{/if}
	
{exp:user:stats dynamic="off"}
	{embed="sponsors/_members-list"
		sponsor_number="{member_admin_id}"
		channel="sponsors" 
		sponsor_zipcode="
			{exp:channel:entries channel='locations' category='{member_admin_id}' limit='1' dynamic='off' status='open|closed'}
				{location_zip}
			{/exp:channel:entries}
		"
	}
{/exp:user:stats}

{embed="embeds/_doc-bottom" script_add="jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}