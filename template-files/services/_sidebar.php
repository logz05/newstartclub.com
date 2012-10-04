<section class="section">
	<header class="bar">Services</header>
	<p>These health professionals offer credible and practical health services based on NEWSTART&reg; principles such as:</p>
	<ul class="bullets">
		<li>Seminar presentations</li>
		<li>Lifestyle counseling</li>
		<li>Natural treatments</li>
	</ul> 
	<p>If you are interested in becoming a club partner, <a href="{path='partners/apply'}">apply here</a>.</p>
</section>

<section class="section filters">
	<header class="bar">Filter</header>
		<h2 class="filter-heading">State<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list state">
	<?php
	
		$state_list = array(
			{exp:channel:entries channel="services" sort="asc" dynamic="no" orderby="service_state" backspace="1"}
				"{service_state}" => "{service_state:label}", 
			{/exp:channel:entries}
			);
	
		foreach ($state_list as $key => $state) {
			print('<li><a href="{path="services/state/'. $key . '"}">'. $state .'</a></li>');
		}
	
	
	?>
	</ul>
	<h2 class="filter-heading">Specialty<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list specialty">
	{exp:channel:categories channel="services" style="linear" show_empty="no" category_group="40"}
		<li><a href="{path='services/specialty/{category_url_title}'}">{category_name}</a></li>
	{/exp:channel:categories}
	</ul>
</section>