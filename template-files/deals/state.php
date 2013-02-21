{embed="embeds/_doc-top" 
	class="deals"
	title="Deals in {exp:channel:entries channel="locations" limit="1" search:location_state="={segment_3}" dynamic="no"}{location_state:label}{/exp:channel:entries}"
"}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='deals'}">Deals</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:channel:entries channel="locations" limit="1" search:location_state="={segment_3}" dynamic="no"}{location_state:label}{/exp:channel:entries}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">

{exp:channel:entries channel="deals" limit="12" sort="desc" paginate="bottom" dynamic="no" search:deal_state="={segment_3}"}
	{if count == 1}
		<ul class="listing">
	{/if}
		<li class="deal independant clearfix">
			<h2><a href="{url_title_path='deals/detail'}">{title}</a>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}</h2>
			<a href="{url_title_path='deals/detail'}" class="image">
			{deal_location}
				{exp:ce_img:single src="{location_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
			{/deal_location}
			</a>
			<div class="details">
				<p>
					{exp:eehive_hacksaw chars="125" append="&hellip;"}
						{deal_instructions}
					{/exp:eehive_hacksaw}
					<a class='link-more' href="{url_title_path='deals/detail'}">more&raquo;</a>
				</p>
				<p class="expires">{if expiration_date}Expires: {expiration_date format="%m/%d/%y"}{/if}</p>
				{if logged_out}
					<a class="show-coupon" href="{path='signin'}" data-reveal-id="signin-modal-coupon"><span data-icon="p">Show coupon code</span></a>
				{if:else}
					<a class="show-coupon" href="{url_title_path='deals/detail'}" data-reveal-id="modal-coupon-{entry_id}"><span data-icon="p">Show coupon code</span></a>
				{/if}
			</div>
		</li>
	{paginate}
		<p class="pagination">{pagination_links}</p>
	{/paginate}
	{if count == total_results}
		</ul>
	{/if}
{/exp:channel:entries}

	</div>
	{embed="deals/_sidebar"}
</div>
{embed="embeds/_doc-bottom"
	sim="coupon"
	show-coupons='{exp:channel:entries channel="deals" limit="12" sort="desc" dynamic="no" search:deal_state="={segment_3}"}
									{entry_id}|
								{/exp:channel:entries}'
}