<?php
$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';
require_once 'dbconnect.php';

$db = new DBconnect();

$member = '{embed:member_id}';

global $_POST;
if (isset($_POST['process_rsvp']))
{
	Member_Relations::add(new Member_Relation('rsvp', '{embed:member_id}', $_POST['process_rsvp'], $_POST['cat_id']));
	echo $_POST['process_rsvp'];
	echo $_POST['cat_id'];
	echo $member;
}
elseif (isset($_POST['delete_rsvp']))
{
	Member_Relations::remove(new Member_Relation('rsvp', '{embed:member_id}', $_POST['delete_rsvp'], $_POST['cat_id']));
}

?>

{exp:query
	sql="
		SELECT 
			member_relations.member_id,
			member_relations.related_id
		FROM member_relations 
		WHERE member_id = '{embed:member_id}'
		AND related_id = '{embed:entry_id}' 
		AND relation_type = 'rsvp'
	"}
	{if no_results}
	<div class="button-wrap">
		<form id="rsvp" action="" method="post">
			<input type="hidden" id="process_rsvp" name="process_rsvp" value="{embed:entry_id}" />
			<input type="hidden" id="cat_id" name="cat_id" value="{embed:cat_id}" />
			<button type="submit" id="rsvp-submit" class="super small secondary button"><span>Add Event</span></button>
		</form>
	</div>
	{/if}
	<div class="button-wrap">
		<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-rsvp"><span>Add Event</span></a>
	</div>
{/exp:query}