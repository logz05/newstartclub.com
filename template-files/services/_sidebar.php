<section class="section">
	<header class="bar">Services</header>
	<p>These health professionals offer credible and practical health services based on NEWSTART&reg; principles such as:</p>
	<ul class="bullets">
		<li>Seminar presentations</li>
		<li>Lifestyle counseling</li>
		<li>Natural treatments</li>
	</ul> 
	<p>To find out how your practice can be listed as a {site_name} service, <a href="{path='partners'}">click here</a>.</p>
</section>

<section class="section filters">
	<header class="bar">Filter</header>
	<h2 class="filter-heading">Specialties<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list specialty">
	{exp:channel:categories channel="services" style="linear" show_empty="no" category_group="40"}
		{exp:query sql="
			SELECT COUNT(cat_id) AS total FROM exp_category_posts
			JOIN exp_channel_titles
			ON exp_category_posts.entry_id = exp_channel_titles.entry_id
			WHERE cat_id = {category_id} AND channel_id = 8
			AND exp_channel_titles.status = 'open'
			"}
		<li><a href="{path='services/specialty/{category_url_title}'}">{category_name}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
		{/exp:query}
	{/exp:channel:categories}
	</ul>
	
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
</section>