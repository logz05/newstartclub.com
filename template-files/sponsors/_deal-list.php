{exp:weblog:entries weblog="deals" sort="asc" orderby="date" dynamic="off" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}"}
	{if no_results}<p>You don&rsquo;t have any active deals. Click <a href="/sponsors/add-deal">here</a> to add a new deal.</p>{/if}
{/exp:weblog:entries}
<ul class="listing entries">
{exp:weblog:entries weblog="deals" sort="desc" orderby="edit_date" paginate="bottom" limit="10" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}" dynamic="off"}

	<li>
		<script type="text/javascript">
			function confirmation_{entry_id}() {
				var answer = confirm("Are you sure you want to delete this event?")
				if (answer){
					document.forms["entryform_{entry_id}"].submit();
				}
			}
		</script>
		<h2>{title}</h2>
		<div class="edit-entry">
			<a href="/sponsors/edit-deal/{url_title}" title="Edit &ldquo;{title}&rdquo;"><span>&#63490;</span></a>
			<a href="javascript: confirmation_{entry_id}()" title="Delete&hellip;"><span>&#10006;</span></a>
		</div>
		<div class="details">
			<dl>
				<dt>Coupon Code</dt>
				<dd>{deal_code}</dd>
				
				<dt>Instructions</dt>
				<dd>{deal_instructions}</dd>
				
				<dt>Dates</dt>
				<dd>Valid from {entry_date format="%F %j%S, %Y"}{if expiration_date} to {expiration_date format="%F %j%S, %Y"}{/if}</dd>
				
				<dt>Terms</dt>
				<dd>{deal_terms}</dd>
				
				<dt>Deal URL</dt>
				<dd><a href="http://newstartclub.com/deal/{entry_id}" target="_blank">http://newstartclub.com/deal/{entry_id}</a></dd>
			</dl>
		</div>
		<form id="entryform_{entry_id}" method="post" action="/sponsors/edit-deals"	 >
			<div class='hiddenFields'>
				<input type="hidden" name="ACT" value="18" />
				<input type="hidden" name="RET" value="/sponsors/edit-deals" />
				<input type="hidden" name="PRV" value="" />
				<input type="hidden" name="URI" value="/sponsors/edit-deals" />
				<input type="hidden" name="return_url" value="/sponsors/edit-deals" />
				<input type="hidden" name="author_id" value="{author_id}" />
				<input type="hidden" name="weblog_id" value="28" />
				<input type="hidden" name="status" value="closed" />
				<input type="hidden" name="site_id" value="4" />
			</div>
			<input type="hidden" name="title" id="title" value="{title}" />
			<input type="hidden" name="url_title" id="url_title" value="{url_title}" />
			<input type="hidden" name="entry_id" value="{entry_id}" />
		</form>
	</li>
{paginate}{if "{total_pages}" != 1}<p>Page {current_page} of {total_pages} pages {pagination_links}</p>{/if}{/paginate}
{/exp:weblog:entries}
</ul>