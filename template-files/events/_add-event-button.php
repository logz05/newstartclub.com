<?php
$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';
require_once 'dbconnect.php';

$db = new DBconnect();


global $SESS;
$member = $SESS->userdata['member_id'];

global $_POST;
if (isset($_POST['process_rsvp']))
{
	Member_Relations::add(new Member_Relation('rsvp', $member, $_POST['process_rsvp'], $_POST['cat_id']));
}
elseif (isset($_POST['delete_rsvp']))
{
	Member_Relations::remove(new Member_Relation('rsvp', $member, $_POST['delete_rsvp'], $_POST['cat_id']));
}

?>

{if logged_in}
	{exp:weblog:entries weblog="events" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes"}
		{exp:query}{if no_results} {/if}{/exp:query}
		{exp:query sql="SELECT member_relations.member_id, member_relations.related_id FROM member_relations WHERE member_id = '<?php echo $member; ?>' AND related_id = '{entry_id}' AND relation_type = 'rsvp' "}
		{if no_results}
		<div class="button-wrap">
			<form id="rsvp" action="" method="post">
				<input type="hidden" id="process_rsvp" name="process_rsvp" value="{entry_id}" />
				<input type="hidden" id="cat_id" name="cat_id" value="{categories show_group='24'}{category_id}{/categories}" />
				<button type="submit" id="rsvp-submit" class="super small secondary button"><span>Add Event</span></button>
			</form>
		</div>{/if}
		{/exp:query}
	{/exp:weblog:entries}
{if:elseif logged_out}
<div class="button-wrap">
	<a href="/signin" class="super small secondary button" data-reveal-id="signin-modal-rsvp"><span>Add Event</span></a>
</div>
{/if}