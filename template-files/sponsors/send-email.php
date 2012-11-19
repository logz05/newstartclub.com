{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program | Email{if segment_3} {segment_3_category_name}{/if}"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}
<ul class="trail">
	<li><a href="{path='sponsors'}">Home</a></li>
	<li><a href="{path='sponsors/email-members'}">Member List</a></li>
</ul>
{preload_replace:sponsor_zipcode="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}' limit='1' status='open|closed' dynamic='off'}{location_zip}{/exp:channel:entries}{/exp:user:stats}"}

{if (segment_3 == 'interest' || segment_3 == 'more-info') && segment_4}{!-- Category Member Listing --}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-interest" sponsor_number="{member_sponsor_id}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}
	
{if:elseif segment_3 == 'event' && segment_4}{!-- Event Member Listing --}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-event" sponsor_number="{member_sponsor_id}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}
	
{if:elseif segment_3 == 'deal' && segment_4}{!-- Deal Member Listing --}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-deal" sponsor_number="{member_sponsor_id}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}
	
{if:else}{!-- All Member Listing --}
	{exp:user:stats dynamic="off"}
		{embed="sponsors/_email-all" sponsor_number="{member_sponsor_id}" sponsor_zipcode="{sponsor_zipcode}"}
	{/exp:user:stats}

{/if}

{embed="embeds/_doc-bottom" script_add="sponsors"}