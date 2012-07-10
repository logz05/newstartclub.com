<div class="sidebar right">
	<div class="bar">Deals</div>
	<p>Looking for discounts on products and services to keep you fit and strong? As a NEWSTART&reg; Lifestyle Club member, you'll get discounts to local businesses so you can start saving and continue living the NEWSTART Lifestyle.</p>
	<p>To find out how your organization can sponsor local NEWSTART Lifestyle Club deals, <a href="http://newstartclub.com/sponsors">click here</a>.</p>
	
	<div class="bar">Filter</div>
	<h2 class="filter-heading">State<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul>
<?php

	$state_list = array(
		{exp:weblog:entries weblog="locations" sort="asc" dynamic="off" orderby="location_state" search:location_type="=profit" backspace="1"}
			strtolower("{location_state}") => "{location_state:label}", 
		{/exp:weblog:entries}
		);

	foreach ($state_list as $key => $state) {
		print('<li><a href="{path="deals/state/'. $key . '"}">'. $state .'</a></li>');
	}


?>
	</ul>
</div>