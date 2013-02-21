{exp:channel:entries channel="deals" orderby="expiration_date" sort="asc" paginate="bottom" dynamic="no" show_future_entries="yes"}
	
	{exp:playa:children channel="locations" dynamic="no" search:location_type="=profit" search:location_state="={segment_3}"}
	
		{if count == 1}
			<ul class="listing">
		{/if}
				<li class="deal independant clearfix">
					<h2><a href="{path='deals/detail/{parent:url_title}'}">{parent:title}</a>{embed="embeds/_edit-this" channel_id="{parent:channel_id}" entry_id="{parent:entry_id}" title="{parent:title}"}</h2>
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
		{if count == total_results}
			</ul>
		{/if}
		
		{paginate}
			<p class="pagination">{pagination_links}</p>
		{/paginate}
	
	{/exp:playa:children}
	
{/exp:channel:entries}