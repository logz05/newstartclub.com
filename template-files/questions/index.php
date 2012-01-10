{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"
}
{assign_variable:channel="questions"}
{assign_variable:section="Health Questions"}
{embed="embeds/_rss-feed"}
<div class="heading clearfix">
  <div class="icon"></div>
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <ul id="listing">
    {exp:weblog:entries weblog="{channel}" limit="9" orderby="date" sort="desc" paginate="bottom" dynamic="off"}
      <li class="question">
        <h2>Q.</h2>
        <h3><a href="{url_title_path='{channel}/detail'}">{qa_question}</a></h3>
        <p class="answer">
          {exp:trunchtml chars="120" inline="&hellip; <a class='link-more' href='{url_title_path='{channel}/detail'}'>more&raquo;</a>"}
            {exp:html_strip}{qa_answer}{/exp:html_strip}
          {/exp:trunchtml}
        </p>
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
    <div class="bar">Health Questions</div>
    <a href="http://newstartclub.com/questions">
      <img src="http://newstartclub.com/assets/images/questions/ask-doctor.jpg" width="190" />
    </a>
    <h2>Have a health concern?</h2>
    <p>Ask one of our {site_name} <a href="/partners">health professionals</a>.</p>
    <p class="button-wrap">
      {if logged_out}
        <a href="/signin" class="super secondary button" data-reveal-id="signin-modal-question"><span>Ask Now</span></a>
      {if:else}
        <a href="/questions/ask" class="super secondary button"><span>Ask Now</span></a>
      {/if}
    </p>
  </div>
</div>
{embed="embeds/_doc-bottom" sim="comments|question"}