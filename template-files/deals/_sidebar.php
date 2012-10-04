<div class="sidebar right">
	<section class="section">
		<header class="bar">Deals</header>
		<p>Looking for discounts on products and services to keep you fit and strong? As a NEWSTART&reg; Lifestyle Club member, you'll get discounts to local businesses so you can start saving and continue living the NEWSTART Lifestyle.</p>
		<p>To find out how your organization can sponsor local NEWSTART Lifestyle Club deals, <a href="http://newstartclub.com/sponsors">click here</a>.</p>
	</section>
	
	<section class="section">
		<header class="bar">Filter</header>
		<h2 class="filter-heading state">State<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list state">
	<?php
	
		$state_list = array(
			
			{exp:channel:entries channel="deals" sort="asc" dynamic="no"}
				{deal_location}
					strtolower("{location_state}") => "{location_state:label}",
				{/deal_location}
			{/exp:channel:entries}
			);
	
		foreach ($state_list as $key => $state) {
			print('<li><a href="{path="deals/state/'. $key . '"}">'. $state .'</a></li>');
		}
	
	?>
		</ul>
		
		
		<h2 class="filter-heading type">Deal Type<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list type">
	<?php 
		$sponsor_list = array(
			{exp:channel:categories channel="deals" style="linear" show_empty="no" category_group="45"}
				"{category_url_title}" => "{category_name}",
			{/exp:channel:categories}
		);
		
		foreach ($sponsor_list as $key => $sponsor) {
			print('<li><a href="{path="deals/type/'. $key .'"}">'. $sponsor .'</a></li>');
		}
	?>
		</ul>
		
		<h2 class="filter-heading sponsors">Sponsors<span class="arrow up"></span><span class="arrow down"></span></h2>
		<ul class="filter-list sponsor">
	<?php 
		$sponsor_list = array(
			{exp:channel:entries channel="deals" dynamic="no" show_future_entries="yes"}
				{categories show_group="24"} "{category_url_title}" => "{category_name}", {/categories}
			{/exp:channel:entries}
		);
		
		foreach ($sponsor_list as $key => $sponsor) {
			print('<li><a href="{path="deals/sponsor/'. $key .'"}">'. $sponsor .'</a></li>');
		}
	?>
		</ul>
	</section>
</div>