{embed="embeds/_doc-top" 
  channel="{channel}"
  title="
    {exp:weblog:entries channel="{channel}" limit="1" disable="member_data|categories|custom_fields" limit="1" require_entry="yes"}
      {if no_results}About{/if}
      {title}
    {/exp:weblog:entries}
"}
{assign_variable:channel="about"}
{assign_variable:section="About"}
{if segment_2 == ""}
  {redirect="/"}
{/if}
<div class="heading clearfix">
  <h1>
    {exp:weblog:entries channel="{channel}" disable="member_data|categories" limit="1" require_entry="yes"}
      {if no_results}No Results{/if}
      {title}
    {/exp:weblog:entries}
  </h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry">
      {exp:weblog:entries channel="{channel}" disable="member_data|categories" limit="1" require_entry="yes"}
        {if no_results}
          <p>Sorry, you&rsquo;ve reached a page that doesn&rsquo;t exist or that has been moved. Please try one of the links to the right.</p>
        {/if}
        {body}
      {/exp:weblog:entries}
    </div>
  </div>
  <div class="sidebar right">
    <div class="bar">{section}</div>
    <ul>
    {exp:weblog:entries weblog="{channel}" disable="member_data" dynamic="off"}
      <li><a href="{url_title_path='{channel}'}">{title}</a></li>
    {/exp:weblog:entries}
    </ul>
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}