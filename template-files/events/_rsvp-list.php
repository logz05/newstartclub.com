<?php

global $SESS;
$member = $SESS->userdata['member_id'];

?>
<ul id="rsvp-list">
{exp:query sql="SELECT member_id, related_id, title, url_title, entry_date
		FROM member_relations, exp_weblog_titles, exp_weblog_data
		WHERE related_id = exp_weblog_data.entry_id
			AND related_id = exp_weblog_titles.entry_id
			AND member_id = <?php echo $member; ?>
			AND relation_type = 'rsvp'
			AND exp_weblog_titles.expiration_date > {current_time}
			ORDER BY entry_date ASC"}
{if no_results}<li class="rsvp"><em>No events added.</em></li>{/if}
	<li class="rsvp">
		{if segment_2 == "detail"}
		<form action="" method="post">
			<input type="hidden" id="delete_rsvp" name="delete_rsvp" value="{related_id}" />
			<button type="submit" name="submit" title="Remove this event from your RSVP list.">&times;</button>
		</form>
		{/if}
			<span class="date">{entry_date format="%F %j"}</span>
			<span class="title"><a href="/events/detail/{url_title}">{exp:html_strip}{exp:textile}{title}{/exp:textile}{/exp:html_strip}</a></span>
	</li>
{/exp:query}
</ul>