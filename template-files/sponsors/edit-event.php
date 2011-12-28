{embed="embeds/_doc-top" 
  channel="sponsors"
  title="Sponsorship Program | Edit Events"}
<div class="heading clearfix">
  <h1>Edit Events</h1>
</div>
<div class="grid23 clearfix">
  {exp:user:stats dynamic="off"}
  <div class="main events left">
  <form method="post" action="/sponsors/edit-event" class="hidden">
    <select name="orderby" class="input">
      <option value="date">Sort By:</option>
      <option value="event_start_date">Start Date</option>
      <option value="title">Title</option>
    </select>
    
    <select name="sort" class="input">
      <option value="asc">Order In:</option>
      <option value="asc">Ascending</option>
      <option value="desc">Descending</option>
    </select>
    
    <select name="limit" class="input">
      <option value="10">Result Limit:</option>
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="40">40</option>
    </select>
    
    <button type="submit" class="super small green button"><span>Sort</span></button>
  
  </form>
  
  {embed="sponsors/_event-list" sponsor_number="{sponsor_number}"}
  
  </div><!-- /.left -->
  <div class="right sidebar">
    <div class="bar">Edit Events</div>
    <p>To see more about an event click on the event title.</p>
    <p>To add a new event, click <a href="/sponsors/add-event">here</a>.</p>
    <p>Click {exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}<a href="/events/sponsors/{category_url_title}">here</a>{/exp:weblog:categories} to see your active events.</p>
  </div>
  {/exp:user:stats}
</div><!-- /.grid23 -->
{embed="embeds/_doc-bottom" script_add="sponsors"}