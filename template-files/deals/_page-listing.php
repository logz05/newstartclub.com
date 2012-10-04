<ul class="listing">
{exp:channel:entries channel="deals" limit="12" orderby="expiration_date" sort="asc" paginate="bottom" dynamic="no" show_future_entries="yes" {embed:parameters}}
{if no_results}
	<li>
		<p><em>{segment_3_category_name} has no active deals.</em></p>
		<div class="button-wrap">
			<a href="{path='deals'}" class="super secondary button"><span>View All Deals</span></a>
		</div>
	</li>
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
		{if "{total_pages}" > 1}
			<li class="pagination">
				<p>{pagination_links}</p>
			</li>
		{/if}
	{/paginate}
{/exp:channel:entries}
</ul>