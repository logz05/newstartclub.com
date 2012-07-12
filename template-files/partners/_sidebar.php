<div class="bar">Partners</div>
<p>These health professionals offer credible and practical health services based on NEWSTART&reg; principles such as:</p>
<ul class="bullets">
  <li>Seminar presentations</li>
  <li>Lifestyle counseling</li>
  <li>Natural treatments</li>
</ul> 
<p>If you are interested in becoming a club partner, <a href="/partners/apply">apply here</a>.</p>
<div class="bar">Filter</div>
  <h2 class="filter-heading">State<span class="arrow up"></span><span class="arrow down"></span></h2>
  <ul class="filter-list state">
<?php

  $state_list = array(
    {exp:weblog:entries weblog="partners" sort="asc" dynamic="off" orderby="partner_state" backspace="1"}
      "{partner_state}" => "{partner_state:label}", 
    {/exp:weblog:entries}
    );

  foreach ($state_list as $key => $state) {
    print('<li><a href="{path="partners/state/'. $key . '"}">'. $state .'</a></li>');
  }


?>
</ul>
<h2 class="filter-heading">Specialty<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list specialty">
{exp:weblog:categories weblog="partners" style="linear" show_empty="no" category_group="40"}
	<li><a href="/partners/specialty/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>