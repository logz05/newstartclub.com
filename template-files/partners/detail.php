{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="
    {exp:weblog:entries weblog='{channel}' url_title='{segment_3}' limit='1'}
      {title}{if partner_cred != ""}, {partner_cred}{/if}
    {/exp:weblog:entries}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>
      {exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
        {title}{if partner_cred != ""}, {partner_cred}{/if}
      {/exp:weblog:entries}
    </h1>
  </div>
  <div class="grid23 clearafter">
    <div class="single left">
      {exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
      {if no_results}
        {redirect="404"}
      {/if}
      <div class="partner">
        <div>
          {exp:ce_img:single src="{partner_photo}" max_width="200" max_height="200" crop="yes" attributes='alt="{title}" title="{title}"'}
        </div>
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
          {exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
            {if partner_phone != ""}
              <dt>Phone:</dt>
              <dd>{partner_phone}</dd>
            {/if}
            {if partner_address != ""}
              <dt>Address:</dt>
              <dd>{partner_address}<br />
            {partner_city}, {partner_state} {partner_zip}</dd>
            {/if}
            {if partner_specialty != ""}
              <dt>Specialty:</dt>
              <dd>{partner_specialty}</dd>
            {/if}
          {/exp:weblog:entries}
        </dl>
      {/if}
      {exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
        <p>
          <a href="/resources/partners/{url_title}">View Resources by {title}</a>
        </p>
      {/exp:weblog:entries}
    </div>
  </div>
</div>
{embed="includes/_signin-modal modal-role="contact" modal-msg="You must be signed in to view contact information."}
{embed="includes/_doc_bottom"}