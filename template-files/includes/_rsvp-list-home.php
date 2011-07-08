<?php
$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once 'dbconnect.php';

$db = new DBconnect();
$today = time();

//Remove RSVPs for expired events from the member_relation table
$query = "DELETE member_relations FROM member_relations, exp_weblog_titles WHERE member_relations.related_id = exp_weblog_titles.entry_id AND exp_weblog_titles.expiration_date < $today";

$db->query($query);

$db = null; // force the class destructor to run

global $SESS;
$member = $SESS->userdata['member_id'];

global $_POST;
if (isset($_POST['process_rsvp']))
{
	Member_Relations::add(new Member_Relation('rsvp', $member, $_POST['process_rsvp']));
}
elseif (isset($_POST['delete_rsvp']))
{
	Member_Relations::remove(new Member_Relation('rsvp', $member, $_POST['delete_rsvp']));
}

?>
<ul>
{exp:query sql="SELECT member_id, related_id, title, field_id_25
		FROM member_relations, exp_weblog_titles, exp_weblog_data
		WHERE related_id = exp_weblog_data.entry_id
			AND related_id = exp_weblog_titles.entry_id
			AND member_id = <?php echo $member; ?>
			AND relation_type = 'rsvp'
			ORDER BY field_id_25 ASC"}
{if no_results}<li class="event"><em>No events added.</em></li>{/if}
	<li class="event">
		{exp:weblog:entries weblog="events" show_future_entries="yes" show_expired="yes" dynamic="off" limit="1" entry_id="{related_id}"}
			<div class="date">{exp:nice_date date="{event_start_date}" format="%F %j"}</div>
			<div class="title">{title}</div>
		{/exp:weblog:entries}
		{if segment_1 == ""}
		<form id="rsvp" action="" method="post">
			<input type="hidden" id="delete_rsvp" name="delete_rsvp" value="{related_id}" />
			<button type="submit" name="submit" title="Click to remove from your RSVP list.">&times;</button>
		</form>
		{/if}
	</li>
{/exp:query}
</ul>