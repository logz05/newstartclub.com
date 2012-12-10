<section class="section">
	<header class="bar">Health Questions</header>
	<a href="{path='questions'}">
		<img src="http://newstartclub.com/assets/images/questions/ask-doctor.jpg" width="190" />
	</a>
	<h2>Have a health concern?</h2>
	<p>Ask one of our {site_name} <a href="{path='services'}">health professionals</a>.</p>
	<p class="button-wrap">
		{if logged_out}
			<a href="{path='signin'}" class="super secondary button" data-reveal-id="signin-modal-question"><span>Ask Now</span></a>
		{if:else}
			<a href="{path='questions/ask'}" class="super secondary button"><span>Ask Now</span></a>
		{/if}
	</p>
</section>

<section class="section">
	<header class="bar">Search</header>
	{exp:search:advanced_form result_page="questions/search" channel="questions" results="9"}
	<input type="hidden" name="search_in" value="everywhere">
	<input id="query" name="keywords" type="search" class="input" placeholder="Search Questions" />
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

<section class="section filters">
	<header class="bar">Filter</header>
	<h2 class="health-conditions filter-heading">Health Conditions<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list health-condition">
	{exp:channel:categories channel="questions" style="linear" show_empty="no" category_group="17"}
		{exp:query sql="
			SELECT COUNT(cat_id) AS total FROM exp_category_posts
			JOIN exp_channel_titles
			ON exp_category_posts.entry_id = exp_channel_titles.entry_id
			WHERE cat_id = {category_id} AND channel_id = 5
			"}
		<li><a href="{path='questions/health-condition/{category_url_title}'}">{category_name}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
		{/exp:query}
	{/exp:channel:categories}
	</ul>
	
	<h2 class="living-better filter-heading">Living Better<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list living-better">
	{exp:channel:categories channel="questions" style="linear" show_empty="no" category_group="19"}
		{exp:query sql="
			SELECT COUNT(cat_id) AS total FROM exp_category_posts
			JOIN exp_channel_titles
			ON exp_category_posts.entry_id = exp_channel_titles.entry_id
			WHERE cat_id = {category_id} AND channel_id = 5
			"}
		<li><a href="{path='questions/living-better/{category_url_title}'}">{category_name}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
		{/exp:query}
	{/exp:channel:categories}
	</ul>
	
	<h2 class="partners filter-heading">Partners<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list partner">
	{exp:channel:categories channel="questions" style="linear" show_empty="no" category_group="21"}
	{exp:query sql="
		SELECT COUNT(cat_id) AS total FROM exp_category_posts
		JOIN exp_channel_titles
		ON exp_category_posts.entry_id = exp_channel_titles.entry_id
		WHERE cat_id = {category_id} AND channel_id = 5
		"}
		<li><a href="{path='questions/partner/{category_url_title}'}">{category_name}</a><span class="count">&nbsp;(&nbsp;{total}&nbsp;)</span></li>
		{/exp:query}
	{/exp:channel:categories}
	</ul>
</section>