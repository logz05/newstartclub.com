{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"
}
{assign_variable:channel="questions"}
{assign_variable:section="Health Questions"}
<div class="body">
	<div class="heading clearafter">
		<div class="icon"></div>
		<h1>{section}</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="list left">
			<ul>
			{exp:weblog:entries weblog="{channel}" limit="9" orderby="date" sort="desc" paginate="bottom" dynamic="off"}
				<li class="question">
					<h1>Q.</h1>
					<h2><a href="{url_title_path='{channel}/detail'}">{qa_question}</a></h2>
					{exp:char_limit total="150"}{qa_answer}{/exp:char_limit}<a class="link-more" href="{url_title_path='{channel}/detail'}">more&raquo;</a>
				</li>
				{paginate}
					{if "{total_pages}" > 1}
						<li class="pagination">
							<p>{pagination_links}</p>
						</li>
					{/if}
				{/paginate}
			{/exp:weblog:entries}
			</ul>
		</div>
		<div class="sidebar right">
			<div class="bar">Search</div>
			{exp:search:advanced_form result_page="{channel}/search-results" weblog="{channel}" results="9"}
			<p>
				<input id="query" name="keywords" type="search" class="input" placeholder="Search Questions" />
				<input type="hidden" name="search_in" value="everywhere" />
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
			<div class="bar">Ask Your Health Question</div>
			<p>Have a health concern? Ask one of our {site_name} <a href="/partners/">partners</a>.</p>
			<p class="button-wrap">
				{if logged_out}
					<a href="/members/signin/" class="super secondary button" data-reveal-id="signin-modal-question"><span>Start Here</span></a>
				{if:else}
					<a href="/questions/ask/" class="super secondary button"><span>Start Here</span></a>
				{/if}
			</p>
		</div>
	</div>
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="comments" modal-msg="You must be signed in to leave a comment."}
{embed="includes/_signin-modal modal-role="question" modal-msg="You must be signed in to submit a question."}
{embed="includes/_doc_bottom"}