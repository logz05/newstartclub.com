{exp:channel:entries channel="member-relations" dynamic="no" search:related_entry="{embed:entry_id}" search:relation_type="=event" author_id="CURRENT_USER" disable="categories|category_fields|pagination"}

{if no_results}
	<p><em>Add this event to your <a href="#event-title">RSVP list</a> to attend!</em></p>
	{exp:safecracker channel="member-relations" return="{segment_1}/{segment_2}/{segment_3}"}
		<input type="hidden" name="title" value="event-{embed:entry_id}-{logged_in_member_id}" readonly="readonly">
		<input type="hidden" name="expiration_date" value="{embed:expiration_date}" maxlength="23" size="25" readonly="readonly">
		<input type="hidden" name="field_id_49[selections][]" value="{embed:entry_id}" readonly="readonly">
		<input type="hidden" name="relation_type" value="event" readonly="readonly">
		<div class="button-wrap">
			<button type="submit" id="rsvp-submit" class="super small secondary button"><span>Add Event</span></button>
		</div>
	{/exp:safecracker}
{/if}

{/exp:channel:entries}

{if logged_out}
	<div class="button-wrap">
		<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-rsvp"><span>Add Event</span></a>
	</div>
{/if}