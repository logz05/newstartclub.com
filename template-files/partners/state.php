{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section} in {exp:weblog:entries weblog="{channel}" limit="1" search:partner_state="={segment_3}" dynamic="off"}{partner_state:label}{/exp:weblog:entries}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
{embed="embeds/_rss-feed"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>{exp:weblog:entries weblog="{channel}" limit="1" search:partner_state="={segment_3}" dynamic="off"}{partner_state:label}{/exp:weblog:entries}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    {embed="partners/_page-listing" parameters="search:partner_state='={segment_3}'"}
  </div><!--/.list-->
  <div class="sidebar right">
    {embed="partners/_sidebar"}
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="includes/_doc-bottom"}