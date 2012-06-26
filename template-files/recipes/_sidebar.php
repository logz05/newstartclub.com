<div class="bar">Search</div>

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

<div class="bar">Filter</div>

<h2 class="type">Recipe Type<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list type">
{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="39"}
	<li><a href="/recipes/type/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>
<h2 class="sensitivity">Food Sensitivity<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list sensitivity">
{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="42"}
	<li><a href="/recipes/sensitivity/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>
<h2 class="ethnic">Ethnic<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="filter-list ethnic">
{exp:weblog:categories weblog="recipes" style="linear" show_empty="no" category_group="43"}
	<li><a href="/recipes/ethnic/{category_url_title}">{category_name}</a></li>{/exp:weblog:categories}
</ul>

{if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0")}
	<script type="text/javascript">
	$(document).ready(function(){
		//Toggle list
		$(".sidebar h2").click(function(){
			$(this).next("ul").slideToggle(400)
			$(this).children(".arrow").toggle()
			return false;
		});
	});
	</script>
{if:else}
	<script type="text/javascript">
	$(document).ready(function(){
		
		//Hide all lists except the one for the current section
		$(".sidebar h2").children(".arrow").toggle();
		$(".sidebar ul.filter-list").not(".filter-list.{segment_2}").hide();
		$(".sidebar h2.{segment_2}").children(".arrow").toggle();
		
		//Toggle lists
		$(".sidebar h2").click(function(){
			$(this).next("ul").slideToggle(400)
			$(this).children(".arrow").toggle()
			return false;
		});
	
	});
	</script>
{/if}