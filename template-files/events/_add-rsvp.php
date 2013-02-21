{if logged_in}
{exp:channel:entries channel="member-relations" dynamic="no" search:related_entry="{embed:entry_id}" search:relation_type="=event" author_id="CURRENT_USER" disable="categories|category_fields|pagination"}

{if no_results}
<dt>Register:</dt>
	<dd>
	<p>RSVP to attend this event.</p>
	{exp:safecracker channel="member-relations" return="{segment_1}/{segment_2}/{segment_3}"}
		<input type="hidden" name="title" value="event-{embed:entry_id}-{logged_in_member_id}" readonly="readonly">
		<input type="hidden" name="expiration_date" value="{embed:expiration_date}" maxlength="23" size="25" readonly="readonly">
		<input type="hidden" name="field_id_49[selections][]" value="{embed:entry_id}" readonly="readonly">
		<input type="hidden" name="relation_type" value="event" readonly="readonly">
		<button type="submit" id="rsvp-submit" class="super  small  secondary  button  rsvp-button"><span>RSVP</span></button>
	{/exp:safecracker}
	</dd>
{/if}

{/exp:channel:entries}
{/if}

{if logged_out}
<dt>Register:</dt>
	<dd>
		<p>RSVP to attend this event.</p>
		<a href="{path='signin'}" class="super  small  secondary  button  rsvp-button" data-reveal-id="signin-modal-rsvp"><span>RSVP</span></a>
	</dd>
{/if}