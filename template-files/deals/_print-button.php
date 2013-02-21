{exp:channel:entries channel="member-relations" dynamic="no" search:related_entry="{embed:entry_id}" search:relation_type="=deal" author_id="CURRENT_USER" disable="categories|category_fields|pagination"}
	{if no_results}
		{exp:safecracker channel="member-relations" return="{segment_1}/coupon/{embed:entry_id}"}
			<input type="hidden" name="title" value="deal-{embed:entry_id}-{logged_in_member_id}" readonly="readonly">
			<input type="hidden" name="field_id_49[selections][]" value="{embed:entry_id}" readonly="readonly">
			<input type="hidden" name="relation_type" value="deal" readonly="readonly">
			<div class="button-wrap">
				<button type="submit" id="print-deal" class="super small secondary button print-coupon"><span>Print</span></button>
			</div>
		{/exp:safecracker}
	{/if}
	
	<a href="{path='{segment_1}/coupon/{embed:entry_id}'}" id="print-deal" class="super small secondary button print-coupon" target="_blank"><span>Print</span></a>
	
{/exp:channel:entries}