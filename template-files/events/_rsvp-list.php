{exp:channel:entries channel="member-relations" dynamic="no" search:relation_type="=event" orderby="expiration_date" sort="asc" author_id="CURRENT_USER"}

	{if no_results}
		<p>No events added.</p>
	{/if}
	
	{if count == 1}
	<ul class="rsvp-list">
	{/if}
	
		{exp:playa:children field="related_entry" show_future_entries="yes" var_prefix="rsvp"}
			<li class="rsvp">
				<a class="close" href="{path='events/remove-rsvp/{entry_id}'}" title="Remove&hellip;">&times;</a>
				<span class="date">{rsvp:entry_date format="%F %j"}</span>
				<span class="title"><a href="{url_title_path='events/detail'}">{rsvp:title}</a></span>
			</li>
		{/exp:playa:children}
		
	{if count == total_results}
		</ul>
	{/if}
	
{/exp:channel:entries}