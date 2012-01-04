{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<div class="heading clearfix">
  <div class="icon"></div>
  <h1>How is Your Health?</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry">
      {exp:weblog:entries weblog="{channel}" entry_id="641" limit="1"}
        {body}
      {/exp:weblog:entries}
    </div>
  </div>
  <div class="sidebar right">
    {if logged_out}
      <div class="bar">The HealthGauge<sup>&trade;</sup></div>
      <a href="/my_health/calculator">
        <div id="gauge"></div>
      </a>
      <p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
      <p class="button-wrap">
        <a href="/my_health/calculator" class="super small secondary button"><span>Calculate</span></a>
      </p>
    {/if}
    {exp:user:stats}
      {if memberScoreTotal == ""}
        <div class="bar">The HealthGauge<sup>&trade;</sup></div>
        <a href="/my_health/calculator/">
          <div id="gauge"></div>
        </a>
        <p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
        <p class="button-wrap">
          <a href="/my_health/calculator" class="super small secondary button"><span>Calculate</span></a>
        </p>
      {if:else}
        <div class="bar">My Health</div>
        <h2 class="center">Health Score Results</h2>
        <h3 class="total-score"><a href="/my_health/results" title="Go to my results">{memberScoreTotal}</a></h3>
        <p class="center">
          <a href="/my_health/calculator"><span>Recalculate</span></a>
        </p>
        <p class="button-wrap center">
          <a href="/my_health/results" class="super small secondary button"><span>View Recommendations</span></a>
        </p>
      {/if}
    {/exp:user:stats}
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}