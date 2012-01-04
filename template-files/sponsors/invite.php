<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once('dbconnect.php');
require_once('utilities.php');

$db = new DBconnect();
$min_time = time() - 1814400; //This is the amount of seconds in 21 days

$query = "DELETE FROM exp_user_keys WHERE date < $min_time";

$db->query($query);

?>
{embed="embeds/_doc-top" 
  channel="sponsors"
  title="Sponsorship Program | Invite Members"
}
{assign_variable:sponsor_title="{exp:user:stats dynamic='off'}{exp:weblog:categories show='{sponsor_number}' weblog='locations' style='linear'}{category_name}{/exp:weblog:categories}{/exp:user:stats}"}
  <div class="heading clearfix">
    <h1>Invite Members</h1>
  </div>
  <div class="grid23 clearfix">
    
    <div class="main invite left">
      <h2>Contact Information</h2>
      {exp:user:key template="sponsors/invite_template" html="yes" return="sponsors/invite"}
        <noscript>
          <div class="alert-box warning">
            <p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
          </div>
        </noscript>
        <table>
          <tr>
            <th scope="row"><label for="message" class="req"><span class="req">* </span>Name</label></th>
            <td><input type="text" class="input" id="message" name="message" size="32" autocomplete="off" /></td>
          </tr>
          <tr>
            <th scope="row"><label for="to" class="req"><span class="req">* </span>Email</label></th>
            <td><input type="text" class="input" id="to" name="recipient_email" value="" size="32" autocomplete="off" /></td>
          </tr>
          <tr>
            <th></th>
            <td>
            <input type="hidden" name="sender_name" id="sender_name" value="{sponsor_title}" />
          {exp:user:stats dynamic="off"}
            <input type="hidden" class="input" name="sender_email" value="club@newstart.com" />
            <input type="hidden" class="input" name="subject" id="subject" value="You're invited to join the {site_name}!" />
            <input type="hidden" name="group_id" value="{sponsor_number}" />
          {/exp:user:stats}
              <p class="button-wrap">
                <button type="submit" class="super secondary button"><span>Invite Member</span></button>
              </p>
            </td>
          </tr>
        </table>
      {/exp:user:key}
      {exp:user:stats dynamic="off"}
      <h2>Pending Invitations ( {exp:query sql="SELECT COUNT(*) AS total FROM exp_user_keys WHERE group_id = {sponsor_number} AND member_id = 0"}{total}{/exp:query} )</h2>
      {exp:query limit="50" paginate="both" sql="SELECT date, email AS invite_email FROM exp_user_keys WHERE group_id = {sponsor_number} AND member_id = 0 ORDER BY date DESC"}
        {if count==1}
          <ul id="listing">
        {/if}
        <li>
          <h2>{invite_email}</h2>
          <div class="date">
            <span class="timeago"><?php echo distanceOfTimeInWords('{date}', '{current_time}', true); ?></span>
            <span class="invite-date">{date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
          </div>
        </li>
        {if count==total_results}
          </ul>
        {/if}
        {paginate}
          {if "{total_pages}" > 1}
            <li class="pagination">
              <p>{pagination_links}</p>
            </li>
          {/if}
        {/paginate}
      {/exp:query}
    </div><!-- /.left -->
    <div class="sidebar right">
      <div class="bar">Invite Members</div>
      <p>You can invite members to join the club by sending a personal message from your email client or by using the form provided.</p>
      <p>Members will be added to your <a href="/sponsors/email-members">member list</a> when they use the following link or when they use promo code <strong>{sponsor_number}</strong>:
      <p><a href="/register/{sponsor_number}">{site_url}<br />register/{sponsor_number}</a></p>
      <p>Alternatively, contacts can be added to your member list when they RSVP to one of your events. Invitations with no response will expire after 21 days.</p>
    </div>
    {/exp:user:stats}
  </div><!-- /.grid23 -->
{embed="embeds/_doc-bottom" script_add="sponsors"}