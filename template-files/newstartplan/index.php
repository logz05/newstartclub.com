{embed="embeds/_doc-top" 
  channel="my_health"
  title="{exp:weblog:entries weblog="{channel}" entry_id="961"}{title}{/exp:weblog:entries}"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>{exp:weblog:entries weblog="{channel}" entry_id="961"}{title}{/exp:weblog:entries}</h1>
</div>
<div class="grid23 clearfix">
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
      <a href="/newstartplan/dashboard" class="super secondary button"><span>Get Started</span></a>
    </p>
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}