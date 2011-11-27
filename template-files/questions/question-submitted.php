{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Question Submitted"}
{assign_variable:channel="questions"}
{assign_variable:section="Questions"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>Question Submitted</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry">
      <p>Your question has been submitted. A copy of your message has been sent to your email. One of our {site_name} <a href="/partners">health professionals</a> will review it shortly.</p>
      <div class="button-wrap">
        <a href="/questions" class="super green button"><span>&laquo; Back to Questions</span></a>
      </div>
    </div>
  </div>
  <div class="sidebar right">
    <div class="bar">Privacy</div>
    <p>Your personal information will not be shared with any third party. If we use your question on our site your information will remain anonymous.</p>
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}