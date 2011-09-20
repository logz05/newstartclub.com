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
      <p class="button-wrap"><a href="/sponsors/apply" class="super giant green button"><span>Get Started</span></a></p>
      <div class="quotes">
        <blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has made a huge difference in my health outreach.&rdquo;</blockquote>
        <cite>&mdash;Todd D. Armstrong<br><a href="http://www.fhes.net/" target="_blank">Speaker/Director, Family Health &amp; Education Services</a></cite>
        <blockquote>&ldquo;This is the best thing I&rsquo;ve seen in a long, long time.&rdquo;</blockquote>
        <cite>&mdash;James Redfield<br><a href="http://colfaxcares.org" target="_blank">Pastor, Colfax SDA Church</a></cite>
        <blockquote>&ldquo;This is JUST what we have needed to make it easy to network with the people who come to our health programs and to easily get others to join.&rdquo;</blockquote>
        <cite>&mdash;Debbie Cox<br><a href="/locations/detail/buskirk-newstart-club/" target="_blank">Health Ministries Leader, Buskirk SDA Church</a></cite>
        <blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has added a whole new dimension to our approach in regards to outreach. Utilizing the club will be a permanent addition to our ministry.&rdquo;</blockquote>
        <cite>&mdash;Mike Mudd<br><a href="http://yfj.netasi.org/" target="_blank">Evangelism Coordinator, ASI Youth For Jesus</a></cite>
        <blockquote>&ldquo;I highly recommend this resource.&rdquo;</blockquote>
        <cite>&mdash;Katia Reinert<br><a href="http://www.nadhealthministries.org" target="_blank">Director, NAD Adventist Health Ministries</a></cite>
      </div>
    </div>
  </div>
{if:else}
  <div class="heading clearafter">
    <h1>{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories}{/exp:user:stats}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="left">
      <h2><a href="/sponsors/add-event">Add an event <span class="arrow">&rarr;</span></a></h2>
      <h2><a href="/sponsors/edit-event">Edit your events <span class="arrow">&rarr;</span></a></h2>
      <h2><a href="/sponsors/invite">Invite members to be part of the club <span class="arrow">&rarr;</span></a></h2>
      <h2><a href="/sponsors/email-members">Email your members <span class="arrow">&rarr;</span></a></h2>
      <h2><a href="/sponsors/resources">Get resources <span class="arrow">&rarr;</span></a></h2>
      <div class="button-wrap">
        <a href="/downloads/sponsor-resources/common-files/Quick-Start-Guide.pdf" class="super secondary button"><span>Quick Start Guide &raquo;</span></a>
      </div>
      {if group_id == "1"}
      <h2>Super Admin</h2>
      
        <label for="sponsor_number">Change Sponsor</label>
        
        {exp:user:edit form:name="sponsor_id_switch" form:id="sponsor_id_switch" return="sponsors" password_required="n" dynamic="off"}
          <input type="hidden" name="firstName" value="{firstName}" />
          <input type="hidden" name="lastName" value="{lastName}" />
          <input type="hidden" name="zipCode" value="{zipCode}" />
          <select name="sponsor_number" class="input">
            {exp:weblog:categories category_group="24" weblog="locations" style="linear"}
              <option value="{category_id}"{if category_id == sponsor_number} selected="selected"{/if}>{category_name}</option>
            {/exp:weblog:categories}
          </select>
          <button type="submit" class="super green button"><span>Go</span></button>
          
          {categories}
            {category_selected}<input type="hidden" name="category[]" value="{category_id}" />{/category_selected}
            {category_body}{selected}{/category_body}
          {/categories}
          
        {/exp:user:edit}
      
      {/if}
    </div>
    <div class="sidebar right">
      <div class="bar">Admin Home</div>
      <p>For questions or comments about this service, please call 530-422-7993 or email <a href="mailto:club@newstart.com">club@newstart.com</a></p>
      <div class="button-wrap">
        <a href="/" class="super red button"><span>Club Home</span></a>
      </div>
    </div><!--/.right-->
  </div>  
{/if}
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|sponsor-admin"}