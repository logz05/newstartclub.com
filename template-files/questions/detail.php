{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="
    {exp:weblog:entries channel="{channel}" limit="1" disable="member_data|categories"}
      {title}
    {/exp:weblog:entries}"
}
{assign_variable:channel="questions"}
{assign_variable:section="Questions"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry" class="clearfix">
      {exp:weblog:entries weblog="{channel}" limit="1" orderby="title" sort="asc" url_title="{segment_3}" dynamic="off"}
        <div id="question">
          <div class="drop-cap">Q.</div>
          <h1>{qa_question}</h1>
        </div>
        <div id="answer">
          <div class="drop-cap">A.</div>
            {qa_answer}
            <p>Response by {related_entries id="qa_author"}<a href="{url_title_path='partners/detail'}">{title}</a>{/related_entries}</p>
        </div>
      {/exp:weblog:entries}
    </div>
    {embed="embeds/_comments" channel="{channel}"}
  </div>
  <div class="sidebar right">
    {exp:weblog:entries weblog="{channel}" limit="1" url_title="{segment_3}"}
      {related_entries id="qa_author"}
      <div class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></div>
      <p>{partner_bio}</p>
      {/related_entries}
    {/exp:weblog:entries}
    {embed="embeds/_share" channel="{channel}"}
  </div>
</div><!--/.grid23-->
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
{embed="embeds/_doc-bottom" sim="comments"}