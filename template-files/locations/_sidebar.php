<header class="bar">Locations</header>
		<p>These schools, churches, and health care organizations share our interest in helping you achieve true wellness. They provide locations and facilities for club events and services such as: 
			<ul class="bullets">
				<li>Vegetarian cooking classes</li>
				<li>Natural remedies classes</li>
				<li>Reversing disease seminars</li>
				<li>Health screenings</li>
				<li>Hydrotherapy and massage</li>
				<li>Personal and group support</li>
			</ul>
		</p>
		<p>To find out how your organization can be listed as a {site_name} location, <a href="{path='sponsors'}">click&nbsp;here</a>.</p>
			<header class="bar">Filter</header>
			<h2 class="filter-heading">State<span class="arrow up"></span><span class="arrow down"></span></h2>
			<ul>
<?php

	$state_list = array(
		{exp:channel:entries channel="locations" sort="asc" dynamic="no" orderby="location_state" backspace="1"}
			strtolower("{location_state}") => "{location_state:label}", 
		{/exp:channel:entries}
		);

	foreach ($state_list as $key => $state) {
		print('<li><a href="{path="locations/state/'. $key . '"}">'. $state .'</a></li>');
	}


?>
			</ul>