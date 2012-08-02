<section class="section">
	<header class="bar">Search</header>
	
	{exp:search:advanced_form result_page="/recipes/search" weblog="recipes" results="9"}
	<input type="hidden" name="search_in" value="everywhere">
	<input id="query" name="keywords" type="search" class="input" placeholder="Search Recipes">
	<p><a href="#" class="advanced-search">Advanced Search</a></p>
	
	<div id="advanced-search">
		<table> 
			<tr>
				<th scope="row">Words:</th>
				<td>
					<input type="radio" name="where" class="input radio" value="all" checked="checked" />&nbsp;<span> All</span>
					<input type="radio" name="where" class="input radio" value="any" />&nbsp;<span> Any</span>
				</td>
			</tr>
			<tr>
				<th scope="row">Order by:</th>
				<td>
					<input type="radio" name="orderby" class="input radio" value="title" checked="checked" />&nbsp;<span> Title</span>
					<input type="radio" name="orderby" class="input radio" value="date" />&nbsp;<span> Date</span>
				</td>
			</tr>
			<tr>
				<th scope="row">Sort:</th>
				<td>
					<input type="radio" name="sort_order" class="input radio" value="asc" checked="checked" />&nbsp;<span> Up</span>
					<input type="radio" name="sort_order" class="input radio" value="desc" />&nbsp;<span> Down</span>
				</td>
			</tr>
		</table>
	</div>
	{/exp:search:advanced_form}
</section>

<section class="section filters">
	<header class="bar">Filter</header>
	
	<h2 class="type filter-heading">Recipe Type<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list type">
	{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="39"}
		<li><a href="/recipes/type/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
	</ul>
	<h2 class="sensitivity filter-heading">Food Sensitivity<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list sensitivity">
	{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="42"}
		<li><a href="/recipes/sensitivity/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
	</ul>
	<h2 class="ethnic filter-heading">Ethnic<span class="arrow up"></span><span class="arrow down"></span></h2>
	<ul class="filter-list ethnic">
	{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="43"}
		<li><a href="/recipes/ethnic/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
	</ul>
</section>