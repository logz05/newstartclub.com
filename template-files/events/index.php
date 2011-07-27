{embed="includes/_doc-top" 
  channel="{channel}"
  title="
    {if segment_2 == ''}
      {section}
    {if:elseif segment_2 && segment_3 == '' || (segment_3 <= 'P9999' && segment_3 >= 'P0')}
      {section} sponsored by {segment_2_category_name}
    {if:elseif segment_2 && segment_3 && segment_4 == '' || (segment_4 <= 'P9999' && segment_4 >= 'P0') }
      {section} in {segment_3}, {segment_2}
    {/if}
"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
<div class="body">
  {if segment_3 != ""}
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  {/if}
  <div class="heading clearafter">
    {if segment_2 == "" || (segment_2 >= "P0" && segment_2 <= "P9999") }
      <div class="icon"></div>
      <h1>{section}</h1>
    {if:elseif segment_2 && segment_3 == '' || (segment_3 <= 'P9999' && segment_3 >= 'P0') }
      <h1>{segment_2_category_name}</h1>
    {if:elseif segment_2 && segment_3 && segment_4 == '' || (segment_4 <= 'P9999' && segment_4 >= 'P0') }
      <h1>{segment_3}, {segment_2}</h1>
    {/if}
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <ul>
  {if segment_2 == '' || (segment_2 <= 'P9999' && segment_2 >= 'P0') }
    {embed="events/_event-listitem"}
  {if:elseif segment_2 && segment_3 == '' || (segment_3 <= 'P9999' && segment_3 >= 'P0') }
    {embed="events/_event-listitem" parameters='category="{segment_2_category_id}"'}
  {if:elseif segment_2 && segment_3 && segment_4 == '' || (segment_4 <= 'P9999' && segment_4 >= 'P0')}
    {embed="events/_event-listitem" parameters='search:event_state="={segment_2}" search:event_city="={segment_3}"'}
  {/if}
      </ul>
    </div>
    <div class="sidebar right">
      <div class="bar">RSVP List</div>
      {embed="{channel}/_rsvp-list"}
      <div class="bar">Filter</div>
      <h2>Location</h2>
      <ul>
  <?php
    $location_list = array(
      {exp:weblog:entries weblog="{channel}" sort="asc|asc" dynamic="off" orderby="event_state|event_city" backspace="1"}
        "/{event_state}/{event_city}" => "{event_city}, {event_state}", 
      {/exp:weblog:entries}
      );
  
    foreach ($location_list as $key => $location) {
      print('<li><a href="{path="{channel}'. $key . '"}">'. $location .'</a></li>');
    }
  ?>
      </ul>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}