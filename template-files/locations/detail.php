{embed="includes/_doc-top"
  section="{section}"
  channel="{channel}"
  title="
      {exp:weblog:entries weblog='{channel}' url_title='{segment_3}' limit='1'}
        {title}
      {/exp:weblog:entries}"
}
{assign_variable:channel="locations"}
{assign_variable:section="Locations"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>{exp:weblog:entries weblog="{channel}" limit="1"}{title}{/exp:weblog:entries}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="single left">
      {exp:weblog:entries weblog="{channel}" limit="1"}
        <dl>
          {if sponsor_address != ""}<dt>Address:</dt>
          <dd>{sponsor_address}<br />{sponsor_city}, {sponsor_state} {sponsor_zip}</dd>{/if}
          {if sponsor_telephone != ""}<dt>Phone:</dt>
          <dd>{sponsor_telephone}</dd>{/if}
          {if sponsor_website != ""}<dt>Website:</dt>
          <dd><a href="http://{sponsor_website}/">{sponsor_website}</a></dd>{/if}
        </dl>
        <p class="button-wrap directions">
          {if logged_out}
            <a href="/members/signin/" class="super secondary button" data-reveal-id="signin-modal-directions"><span>Get Directions</span></a>
          {if:else}
            <a id="get-directions" class="super secondary button" onclick="calcRoute();"><span>Get Directions</span></a>
          {/if}
        </p>
      {/exp:weblog:entries}
      {if logged_out}
        <p>Directions are based on your <a href="/members/signin/" data-reveal-id="signin-modal">member profile</a>.</p>
      {if:else}
        <p>Directions are based on your <a href="/members/settings/">member profile</a>.</p>
      {/if}
    </div>
    <div class="sidebar right">
      <div class="bar">Contact Person</div>
      {if logged_out}
        <p class="button-wrap">
          <a href="/members/signin/" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
        </p>
      {/if}
      {if logged_in}
        {exp:weblog:entries weblog="{channel}" limit="1"}
          <dl>
            <dt>Name:</dt>
            <dd>{sponsor_contact_name}</dd>
            <dt>Phone:</dt>
            <dd>{sponsor_contact_phone}</dd>
            <dt>Email:</dt>
            <dd><a href="mailto:{sponsor_contact_email}" title="{sponsor_contact_email}">{sponsor_contact_email}</a></dd>
          </dl>
        {/exp:weblog:entries}
      {/if}
      <div class="bar">Upcoming Events</div>
      {exp:weblog:entries weblog="events" dynamic="off" limit="1" category="{segment_3_category_id}"}
        {if no_results}
          <p><em>No upcoming events.</em></p>
        {/if}
        <p class="button-wrap">
          <a href="/events/{segment_3}/" class="super small secondary button"><span>View Events</span></a>
        </p>
      {/exp:weblog:entries}
    </div>
  </div><!--/.grid23-->
  <div id="map-area">
  <div id="canvas">
    <span>loading map&hellip;</span>
  </div>
  <div id="directions"></div>
  {exp:weblog:entries weblog="{channel}" limit="1"}
  <input id="map-end" value="{sponsor_address} {sponsor_city}, {sponsor_state} {sponsor_zip}" />
  {/exp:weblog:entries}
  {exp:member:custom_profile_data}<input id="map-start" value="{address} {city}, {state} {zipCode}" />{/exp:member:custom_profile_data}
  </div>
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="contact" modal-msg="You must be signed in to view contact information."}
{embed="includes/_signin-modal modal-role="directions" modal-msg="You must be signed in to get directions."}
{embed="includes/_doc_bottom"}