{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program | Referral Sent"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}
<ul class="trail">
	<li><a href="{path='sponsors'}">Home</a></li>
	<li><a href="{path='sponsors/email-members'}">Member List</a></li>
</ul>
<div class="heading clearfix">
	<h1>Referral Sent</h1>
</div>
<div class="grid23 clearfix">
	<div class="left">
		<div class="post">
		
		{exp:user:stats dynamic="off"}
		
		{exp:freeform:entries
				form_id="6"
				sort="desc"
				orderby="entry_date"
				author_id="{member_id}"
				search:ff_sponsor_id="{member_sponsor_id}"
				limit="1"
			}
				<p>A referral email for {freeform:field:ff_first_name} {freeform:field:ff_last_name} was sent to NEWSTART.</p>
			
			{/exp:freeform:entries}
			
		{/exp:user:stats}
		
		<p class="button-wrap">
			<a href="{path='sponsors/email-members'}" class="super red button"><span>Back to Member List</span></a>
		</p>
	</div>
</div>
	<div class="sidebar right">
	</div>
</div>


{embed="embeds/_doc-bottom" script_add="sponsors"}