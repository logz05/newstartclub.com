<div class="bar">Search</div>

{exp:search:advanced_form result_page="/resources/search-results" weblog="resources" results="9"}

<p>
	<input id="query" name="keywords" type="search" class="input" placeholder="Search Resources">

	<input type="hidden" name="search_in" value="everywhere">
</p>

<p><a href="#" class="advanced-search">Advanced Search</a></p>

<div id="advanced-search">
	<table>	
		<tr>
			<th scope="row">Words:</th>
			<td>
				<input type="radio" name="where" class="input radio" value="all" checked="checked" />&nbsp;<span>All</span>
				<input type="radio" name="where" class="input radio" value="any" />&nbsp;<span>Any</span>
			</td>
		</tr>
		<tr>
			<th scope="row">Order by:</th>
			<td>
				<input type="radio" name="orderby" class="input radio" value="title" checked="checked" />&nbsp;<span>Title</span>
				<input type="radio" name="orderby" class="input radio" value="date" />&nbsp;<span>Date</span>
			</td>
		</tr>
		<tr>
			<th scope="row">Sort:</th>
			<td>
				<input type="radio" name="sort_order" class="input radio" value="asc" checked="checked" />&nbsp;<span>Up</span>
				<input type="radio" name="sort_order" class="input radio" value="desc" />&nbsp;<span>Down</span>
			</td>
		</tr>
	</table>
</div>

{/exp:search:advanced_form}

<div class="bar">Resource Topics</div>
<h2 class="health-conditions">Health Conditions<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list health-conditions">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="17"}
	<li><a href="/resources/health-conditions/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>

<h2 class="living-better">Living Better<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list living-better">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="19"}
	<li><a href="/resources/living-better/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>

<h2 class="recipes">Recipes<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list recipes">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="39"}
	<li><a href="/resources/recipes/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>

<h2 class="media">Media Type<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list media">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="20"}
	<li><a href="/resources/media/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>

<h2 class="series">Series<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list series">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="18"}
	<li><a href="/resources/series/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>

<h2 class="partners">Partners<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list partners">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="21"}
	<li><a href="/resources/partners/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>
{!--
<h2 class="language">Languages<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list language">
{exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="22"}
	<li><a href="/embed:channel}/language/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>
--}