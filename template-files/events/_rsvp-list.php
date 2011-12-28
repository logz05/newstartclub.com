<?php
$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once 'dbconnect.php';

$db = new DBconnect();
$today = time();

//Remove RSVPs for expired events from the member_relation table
//$query = "DELETE member_relations FROM member_relations, exp_weblog_titles WHERE member_relations.related_id = exp_weblog_titles.entry_id AND exp_weblog_titles.expiration_date < $today";

//$db->query($query);

//$db = null; // force the class destructor to run

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
<ul id="rsvp-list">
{exp:query sql="SELECT member_id, related_id, title, url_title, field_id_25
    FROM member_relations, exp_weblog_titles, exp_weblog_data
    WHERE related_id = exp_weblog_data.entry_id
      AND related_id = exp_weblog_titles.entry_id
      AND member_id = <?php echo $member; ?>
      AND relation_type = 'rsvp'
      AND exp_weblog_titles.expiration_date > {current_time}
      ORDER BY field_id_25 ASC"}
{if no_results}<li class="rsvp"><em>No events added.</em></li>{/if}
  <li class="rsvp">
    {if segment_1}
    <form action="" method="post">
      <input type="hidden" id="delete_rsvp" name="delete_rsvp" value="{related_id}" />
      <button type="submit" name="submit" title="Remove this event from your RSVP list.">&times;</button>
    </form>
    {/if}
      <span class="date">{exp:nice_date date="{field_id_25}" format="%F %j"}</span>
      <span class="title"><a href="/events/detail/{url_title}">{exp:html_strip}{exp:textile}{title}{/exp:textile}{/exp:html_strip}</a></span>
  </li>
{/exp:query}
</ul>
{if segment_2 == "detail"}
  {if logged_in}
    {exp:weblog:entries weblog="events" require_entry="yes" limit="1" url_title="{segment_3}" show_future_entries="yes"}
      {exp:query}{if no_results} {/if}{/exp:query}
      {exp:query sql="SELECT member_relations.member_id, member_relations.related_id FROM member_relations WHERE member_id = '<?php echo $member; ?>' AND related_id = '{entry_id}' AND relation_type = 'rsvp' "}
      {if no_results}
      <div class="button-wrap">
        <form id="rsvp" action="" method="post">
          <input type="hidden" id="process_rsvp" name="process_rsvp" value="{entry_id}" />
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
{/if}