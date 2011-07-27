{embed="includes/_doc-top" 
  channel="{channel}"
  title="{title}"}
{assign_variable:channel="sponsors"}
{assign_variable:title="Sponsorship Program
{if segment_2 == 'events' && segment_3 == 'add'} | Create a new event{/if}
{if segment_2 == 'events' && segment_3 == 'edit'} | Edit Events{/if}
{if segment_2 == 'invite-members'} | Invite Members{/if}
{if segment_2 == 'email-members' || segment_3 == 'email'} | Email Members{/if}
{if segment_2 == 'resources'} | Resources{/if}
"}
<div class="body">
{if logged_out || (member_group != 1 && member_group != 13)}
  <div class="heading clearafter">
    <h1>Sponsorship Program</h1>
  </div>
      <div class="grid23 clearafter">
        <div class="single left">
          <iframe src="http://player.vimeo.com/video/17569582" width="490" height="276" frameborder="0"></iframe>
          {exp:weblog:entries weblog="{channel}" entry_id="477" limit="1"}
            {body}
          {/exp:weblog:entries}
        </div><!--/.single-->
        <div class="sidebar right">
          <div class="bar">Become a Sponsor</div>
            {exp:weblog:entries weblog="{channel}" entry_id="478" limit="1"}
              {body}
            {/exp:weblog:entries}
          <p class="button-wrap"><a href="{path='sponsors/register'}" class="super giant green button"><span>Get Started</span></a></p>
          <div class="quotes">
            <blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has made a huge difference in my health outreach.&rdquo;</blockquote>
            <cite>&mdash;Todd D. Armstrong, <br><span>Speaker/Director, Family Health &amp; Education Services</span></cite>
            <blockquote>&ldquo;This is the best thing I&rsquo;ve seen in a long, long time.&rdquo;</blockquote>
            <cite>&mdash;James Redfield, <br><span>Pastor, Colfax SDA Church</span></cite>
            <blockquote>&ldquo;This is JUST what we have needed to make it easy to network with the people who come to our health programs and to easily get others to join.&rdquo;</blockquote>
            <cite>&mdash;Debbie Cox, <br><span>Health Ministries Leader, Buskirk SDA Church</span></cite>
            <blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has added a whole new dimension to our approach in regards to outreach. Utilizing the club will be a permanent addition to our ministry.&rdquo;</blockquote>
            <cite>&mdash;Mike Mudd, <br><span>Evangelism Coordinator, ASI Youth For Jesus</span></cite>
          </div>
          <a href="http://www.nadhealthministries.org/article.php?id=75" title="NAD Adventist Health Ministries Official Resource" target="_blank"><img class="logo" src="/assets/images/sponsor_admin/NAD_choose_full_life_logo.png" width="170" /></a>
          <p id="NAD-Logo-text">NAD Adventist Health Ministries Official Resource</p>
        </div>
      </div>
    {/if}
{if logged_in && (group_id == '1' || group_id == '13')}
  {assign_variable:sponsor_zipcode="{exp:user:stats dynamic='off'}{exp:weblog:entries weblog='locations' category='{sponsor_number}' limit='1'}{sponsor_zip}{/exp:weblog:entries}{/exp:user:stats}"}

  {if segment_2 == ''}
    {embed="{channel}/_landing-page" channel="{channel}"}
  {/if}
  
  {if segment_2 == "events" && segment_3 == "add"}
    {exp:user:stats dynamic="off"}
      {embed="{channel}/_add-event" channel="{channel}" return="/{channel}/{segment_2}/edit/" categories="{sponsor_number}" sponsor_zip="{sponsor_zipcode}"}
    {/exp:user:stats}
  {/if}
  
  {if segment_2 == "events" && segment_3 == "edit"}
    {exp:user:stats dynamic="off"}
      {embed="{channel}/_edit-event" channel="{channel}" sponsor_number="{sponsor_number}" categories="{sponsor_number}"}
    {/exp:user:stats}
  {/if}
  
  {if segment_2 == "invite-members"}
    {exp:user:stats dynamic="off"}
      {embed="{channel}/_invite-members" sponsor_number="{sponsor_number}" channel="{channel}"}
    {/exp:user:stats}
  {/if}
  
  {if segment_2 == "email-members"}
      {if segment_3 != ""}
        <ul id="trail">
          <li><a href="{site_url}">Home</a></li>
          <li><a href="{path='{channel}/email-members'}">Member List</a></li>
        </ul>
      {/if}
    {exp:user:stats dynamic="off"}
      {embed="{channel}/_email-members" sponsor_number="{sponsor_number}" channel="{channel}" sponsor_zipcode="{sponsor_zipcode}"}
    {/exp:user:stats}
  {/if}
  
  {if segment_2 == "email"}
    {!--<h2>This page is under construction. Sorry for the inconvenience.</h2>
    {if member_id == 1}--}
    {exp:user:stats dynamic="off"}
      {embed="{channel}/_email" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}" channel="{channel}"}
    {/exp:user:stats}
    {!--{/if}--}
  {/if}
  
  {if segment_2 == "resources"}
    {exp:user:stats dynamic="off"}
      {embed="{channel}/_resources" sponsor_number="{sponsor_number}" channel="{channel}"}
    {/exp:user:stats}
  {/if}
  
{/if}
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|jquery.prettyPhoto_3.0|sponsor-admin"}