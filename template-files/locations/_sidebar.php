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
		{exp:weblog:entries weblog="locations" sort="asc" dynamic="off" orderby="location_state" backspace="1"}
			strtolower("{location_state}") => "{location_state:label}", 
		{/exp:weblog:entries}
		);

	foreach ($state_list as $key => $state) {
		print('<li><a href="{path="locations/state/'. $key . '"}">'. $state .'</a></li>');
	}


?>
			</ul>