{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="
        {if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }
          {section}
        {if:else}
          {section} in {exp:weblog:entries weblog="{channel}" limit="1" search:sponsor_state="={segment_3}" dynamic="off"}{sponsor_state:label}{/exp:weblog:entries}
        {/if}"
}
{assign_variable:channel="locations"}
{assign_variable:section="Locations"}
<div id="rss-feed">
  <a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
    <div class="icon"></div><span>RSS Feed</span>
  </a>
</div>
{if segment_2 == "state"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
{/if}
<div class="heading clearfix">
  {if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }
  <div class="icon"></div>
  <h1>{section}</h1>
  {if:else}
  <h1>{exp:weblog:entries weblog="{channel}" limit="1" search:sponsor_state="={segment_3}" dynamic="off"}{sponsor_state:label}{/exp:weblog:entries}</h1>
  {/if}
</div>    
<div class="grid23 clearfix">
  <div class="main left">
  <ul id="listing">
    {if segment_2 == "state" && segment_3}
      {exp:weblog:entries weblog="{channel}" orderby="sponsor_city" sort="asc" search:sponsor_state="={segment_3}" limit="9" paginate="bottom" disable="member_data" dynamic="off"}
        <li class="location clearfix">
          <a href="{url_title_path='{channel}/detail'}" class="image"><div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={sponsor_address}+{sponsor_city}+{sponsor_state}&zoom=7&markers=size:med%7C{sponsor_address}+{sponsor_city}+{sponsor_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
          </div></a>
          <h2><a href="{url_title_path='{channel}/detail'}">{title}</a></h2>
          <h3>{sponsor_address}<br />{if sponsor_address2}{sponsor_address2}<br />{/if}{sponsor_city}, {sponsor_state}</h3>
        </li>
        {paginate}
          {if "{total_pages}" > 1}
            <li class="pagination">
              <p>{pagination_links}</p>
            </li>
          {/if}
        {/paginate}
      {/exp:weblog:entries}
    {if:else}
      {exp:weblog:entries weblog="{channel}" orderby="sponsor_city" sort="asc" limit="9" paginate="bottom" disable="member_data" dynamic="off"}
        <li class="location clearfix">
          <a href="{url_title_path='{channel}/detail'}" class="image"><div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={sponsor_address}+{sponsor_city}+{sponsor_state}&zoom=7&markers=size:med%7C{sponsor_address}+{sponsor_city}+{sponsor_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
          </div></a>
          <h2><a href="{url_title_path='{channel}/detail'}">{title}</a></h2>
          <h3>{sponsor_address}<br />{if sponsor_address2}{sponsor_address2}<br />{/if}{sponsor_city}, {sponsor_state}</h3>
        </li>
        {paginate}
          {if "{total_pages}" > 1}
            <li class="pagination">
              <p>{pagination_links}</p>
            </li>
          {/if}
        {/paginate}
      {/exp:weblog:entries}
    {/if}
  </ul>
  </div><!--/.list-->
  <div class="sidebar right">
    <div class="bar">Local Club Events</div>
    <p>These schools, churches, and health care organizations share our interest in helping you achieve true wellness. They provide locations, facilities, and services for locally organized club events such as: 
      <ul class="bullets">
        <li>Vegetarian cooking classes</li>
        <li>Natural remedies classes</li>
        <li>Depression recovery programs</li>
        <li>Coronary health improvement programs</li>
        <li>Reversing diabetes and obesity seminars</li>
        <li>Health expos</li>
        <li>Personal and group support</li>
      </ul></p>
    <p>To find out how your organization can sponsor local {site_name} events, click&nbsp;<a href="/sponsors">here</a>.</p>
      <div class="bar">Filter</div>
      <h2>State</h2>
      <ul>
<?php

  $state_list = array(
    {exp:weblog:entries weblog="{channel}" sort="asc" dynamic="off" orderby="sponsor_state" backspace="1"}
      "{sponsor_state}" => "{sponsor_state:label}", 
    {/exp:weblog:entries}
    );

  foreach ($state_list as $key => $state) {
    print('<li><a href="{path="{channel}/state/'. $key . '"}">'. $state .'</a></li>');
  }


?>
      </ul>
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}