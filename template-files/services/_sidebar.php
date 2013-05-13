<section class="section">

	<header class="bar">Search</header>
	
	{exp:search:advanced_form result_page="services/search" channel="services" results="9"}
	
		<input type="hidden" name="search_in" value="everywhere">
		<input id="query" name="keywords" type="search" class="input" placeholder="Search Services" />
		<p><a href="#" class="advanced-search">Advanced Search</a></p>
		
		<div id="advanced-search">
			<table>
			
				<tr>
					<th scope="row">Words:</th>
					<td>
						<input type="radio" name="where" class="input radio" value="all" checked="checked">&nbsp;<span>All</span>
						<input type="radio" name="where" class="input radio" value="any">&nbsp;<span>Any</span>
					</td>
				</tr>
				
				<tr>
					<th scope="row">Order by:</th>
					<td>
						<input type="radio" name="orderby" class="input radio" value="title" checked="checked">&nbsp;<span>Title</span>
						<input type="radio" name="orderby" class="input radio" value="date">&nbsp;<span>Date</span>
					</td>
				</tr>
				
				<tr>
					<th scope="row">Sort:</th>
					<td>
						<input type="radio" name="sort_order" class="input radio" value="asc" checked="checked">&nbsp;<span>Up</span>
						<input type="radio" name="sort_order" class="input radio" value="desc">&nbsp;<span>Down</span>
					</td>
				</tr>
				
			</table>
		</div>
	
	{/exp:search:advanced_form}
	
</section>

<section class="section">

	<header class="bar">Services</header>
	
	<p>These health professionals offer credible and practical health services based on NEWSTART&reg; principles such as:</p>
	
	<ul class="bullets">
		<li>Seminar presentations</li>
		<li>Lifestyle counseling</li>
		<li>Natural treatments</li>
		<li>Personal and group support</li>
	</ul>
	
	<p>To find out how your practice can be listed as a {site_name} service, <a href="{path='partners'}">click here</a>.</p>
	
</section>

<section class="section">

	<header class="bar">Filter</header>
	
	<h2 class="filter-heading">Specialties<span class="arrow up"></span><span class="arrow down"></span></h2>
	
	<ul class="filter-list  specialty">
	{exp:channel:categories channel="services" style="linear" show_empty="no" status="open" category_group="40"}
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
	
	<h2 class="state  filter-heading">States &amp; Provinces<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="state  filter-list">
	{exp:channel:categories channel="services" style="linear" show_empty="no" status="open" category_group="46"}
		{exp:query sql="
			SELECT COUNT(cat_id) AS total FROM exp_category_posts
			JOIN exp_channel_titles
			ON exp_category_posts.entry_id = exp_channel_titles.entry_id
			WHERE cat_id = {category_id} AND channel_id = 8
			AND exp_channel_titles.status = 'open'
			"}
		<li><a href="{path='services/state/{category_url_title}'}">{category_name}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
		{/exp:query}
	{/exp:channel:categories}
	</ul>
	
	<h2 class="country  filter-heading">Countries<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="country  filter-list">
	{exp:channel:categories channel="services" style="linear" show_empty="no" status="open" category_group="47"}
		{exp:query sql="
			SELECT COUNT(cat_id) AS total FROM exp_category_posts
			JOIN exp_channel_titles
			ON exp_category_posts.entry_id = exp_channel_titles.entry_id
			WHERE cat_id = {category_id} AND channel_id = 8
			AND exp_channel_titles.status = 'open'
			"}
		<li><a href="{path='services/country/{category_url_title}'}">{category_name}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
		{/exp:query}
	{/exp:channel:categories}
	</ul>
	
</section>