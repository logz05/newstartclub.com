{embed="includes/_doc-top" 
  channel="my_health"
  title="{exp:weblog:entries weblog="resources" status="my health" entry_id="957"}{title}{/exp:weblog:entries}"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>{exp:weblog:entries weblog="resources" status="my health" entry_id="957"}{title}{/exp:weblog:entries}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="single left">
      {exp:weblog:entries weblog="{channel}" entry_id="961"}
        <iframe src="http://player.vimeo.com/video/6306214" width="490" height="276" frameborder="0"></iframe>
        {body}
      {/exp:weblog:entries}
    </div><!--/.single-->
    <div class="sidebar right">
      <div class="bar">Have a Question?</div>
      <p>Our NEWSTART&reg; partnering staff and physicians can answer your questions.</p>
      <p class="button-wrap">
        <a href="/questions/ask" class="super secondary button"><span>Ask Now</span></a>
      </p>
      <div class="bar">Need Help?</div>
      <p>Changing your lifestyle can be hard. That's why we offer support from NEWSTART&reg; sponsoring schools, churches, and health care organizations to help you succeed. Contact your local sponsor for nutritional counseling, NEWSTART&reg; book and DVD offers, and help with your exercise program.</p>
      <p class="button-wrap">
        <a href="/locations/{exp:user:stats dynamic="off"}{exp:weblog:entries weblog="locations" search:sponsor_zip="{zipCode}" limit="1"}detail/{url_title}{/exp:weblog:entries}{/exp:user:stats}" title="{title}" class="super secondary button"><span>Get Help</span></a>
      </p>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}