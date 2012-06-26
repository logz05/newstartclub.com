<div class="bar">Search</div>
{exp:search:advanced_form result_page="faq/search" weblog="questions" results="9"}
<input type="hidden" name="search_in" value="everywhere" />
<input id="query" name="keywords" type="search" class="input" placeholder="Search Questions" />
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