{embed="embeds/_doc-top" 
	class="sponsors"
	title="Email Members"}
{assign_variable:sponsor_zipcode="{exp:user:stats dynamic='off'}{exp:weblog:entries weblog='locations' category='{sponsor_number}' limit='1' dynamic='off' status='open|closed'}{location_zip}{/exp:weblog:entries}{/exp:user:stats}"}
	{if segment_3 != ""}
		<ul id="trail">
			<li><a href="/sponsors">Home</a></li>
			<li><a href="/sponsors/email-members">Member List</a></li>
		</ul>
	{/if}
{exp:user:stats dynamic="off"}
	{embed="sponsors/_members-list" sponsor_number="{sponsor_number}" channel="sponsors" sponsor_zipcode="{sponsor_zipcode}"}
{/exp:user:stats}
{embed="embeds/_doc-bottom" script_add="jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}