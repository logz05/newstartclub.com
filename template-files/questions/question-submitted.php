{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Question Submitted"}
{assign_variable:channel="questions"}
{assign_variable:section="Questions"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>Question Submitted</h1>
  </div>
    
  <div class="grid23 clearafter">
    <div class="list left">
    <p>Your question has been submitted. A copy of your message has been sent to your email. One of our {site_name} <a href="/partners/">partners</a> will review it shortly.</p>
  </div><!--/.list-->
  <div class="sidebar right">
    <div class="bar">Privacy</div>
    <p>Your personal information will not be shared with any third party. If we use your question on our site your information will remain anonymous.</p>
  </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="{if logged_out}yes{if:else}{/if}"}