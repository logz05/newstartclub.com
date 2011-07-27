{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="
    {exp:weblog:entries channel="{channel}" limit="1" disable="member_data|categories"}
      {title}
    {/exp:weblog:entries}"
}
{assign_variable:channel="questions"}
{assign_variable:section="Questions"}
<div id="{channel}" class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="grid23 clearafter">
    <div class="single left">
      {exp:weblog:entries weblog="{channel}" limit="1" orderby="title" sort="asc" url_title="{segment_3}" dynamic="off"}
      <div class="question">
        <div class="q_block clearafter">
          <div class="drop-cap">Q.</div>
          <h1 id="question">{qa_question}</h1>
        </div>
        <div class="a_block clearafter">
          <div class="drop-cap">A.</div>
            <div id="answer">{qa_answer}</div>
            <p>Response by {related_entries id="qa_author"}<a href="{url_title_path='partners/detail'}">{title}</a>{/related_entries}</p>
        </div>
      </div>
    {/exp:weblog:entries}
    
    {embed="includes/_comments" channel="{channel}"}
    
    </div><!--/.single-->
    <div class="sidebar right">
      {exp:weblog:entries weblog="{channel}" limit="1" url_title="{segment_3}"}
        {related_entries id="qa_author"}
        <div class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></div>
        <p>{partner_bio}</p>
        {/related_entries}
      {/exp:weblog:entries}
      {embed="includes/_share" channel="{channel}"}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="comments" modal-msg="You must be signed in to leave a comment."}
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
{embed="includes/_doc_bottom" script_add="comments"}