{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program | Email{if segment_3} {segment_3_category_name}{/if}"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{sponsor_type}{/exp:weblog:categories}{/exp:user:stats}"
}
<ul class="trail">
	<li><a href="/sponsors">Home</a></li>
	<li><a href="/sponsors/email-members">Member List</a></li>
</ul>
{assign_variable:sponsor_zipcode="{exp:user:stats dynamic='off'}{exp:weblog:entries weblog='locations' category='{sponsor_number}' limit='1' status='open|closed' dynamic='off'}{location_zip}{/exp:weblog:entries}{/exp:user:stats}"}

{if segment_3 == 'interest' && segment_4}{!-- Category Member Listing --}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-interest" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}
	
{if:elseif segment_3 == 'event' && segment_4}{!-- Event Member Listing --}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-event" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}
	
{if:elseif segment_3 == 'deal' && segment_4}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-deal" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}
	
{if:else}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-all" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}

{/if}

{embed="embeds/_doc-bottom" script_add="sponsors"}