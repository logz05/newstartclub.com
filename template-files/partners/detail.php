{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="
    {exp:weblog:entries weblog='{channel}' url_title='{segment_3}' limit='1'}
      {title}{if partner_cred != ""}, {partner_cred}{/if}
    {/exp:weblog:entries}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>
    {exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
      {title}{if partner_cred != ""}, {partner_cred}{/if}
    {/exp:weblog:entries}
  </h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    {exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
    {if no_results}
      {redirect="404"}
    {/if}
    <div id="entry">
      {exp:ce_img:single src="{partner_photo}" max_width="200" max_height="200" crop="yes" attributes='alt="{title}" title="{title}"'}
      <div class="bio">
        {partner_bio}
      </div>
    </div>
    {/exp:weblog:entries}
  </div>
  <div class="sidebar right">
    <div class="bar">Contact Information</div>
    {if logged_out}
      <p class="button-wrap">
        <a href="/signin" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
      </p>
    {/if}
    {if logged_in}
      <dl>
        {exp:weblog:entries weblog="{channel}" sort="asc" limit="1"}
          {if partner_phone != ""}
            <dt>Phone:</dt>
            <dd>{partner_phone}</dd>
          {/if}
          {if partner_address != ""}
            <dt>Address:</dt>
            <dd>{partner_address}<br />
          {partner_city}, {partner_state} {partner_zip}</dd>
          {/if}
            <dt>Specialty:</dt>
            <dd>{categories backspace="1"}<a href="/{channel}/specialty/{category_url_title}/">{category_name}</a>, {/categories}</dd>
        {/exp:weblog:entries}
      </dl>
    {/if}
    {if segment_3_category_id}
    {exp:weblog:entries weblog="resources" dynamic="off" limit="1" category="{segment_3_category_id}"}
      <p>
        <a href="/resources/partners/{segment_3}">View Resources by {segment_3_category_name}</a>
      </p>
    {/exp:weblog:entries}
    {/if}
  </div>
</div>
{embed="embeds/_doc-bottom" sim="contact"}