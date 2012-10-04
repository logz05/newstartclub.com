<ul id="rsvp-list">
{exp:query sql="SELECT member_id, related_id, title, url_title, entry_date
		FROM member_relations, exp_channel_titles, exp_channel_data
		WHERE related_id = exp_channel_data.entry_id
			AND related_id = exp_channel_titles.entry_id
			AND member_id = '{embed:member_id}'
			AND relation_type = 'rsvp'
			AND exp_channel_titles.expiration_date > {current_time}
			ORDER BY entry_date ASC"}
{if no_results}<li class="rsvp"><em>No events added.</em></li>{/if}
	<li class="rsvp">
		{if segment_2 == "detail"}
		<form action="" method="post">
			<input type="hidden" id="delete_rsvp" name="delete_rsvp" value="{related_id}" />
			<input type="hidden" id="cat_id" name="cat_id" value="{categories show_group='24'}{category_id}{/categories}" />
			<button type="submit" name="submit" title="Remove this event from your RSVP list.">&times;</button>
		</form>
		{/if}
			<span class="date">{entry_date format="%F %j"}</span>
			<span class="title"><a href="{url_title_path='events/detail'}">{title}</a></span>
	</li>
{/exp:query}
</ul>