{embed="includes/_doc-top" 
	channel="{channel}"
	sponsor_admin="yes"
	header="no"
	title="{section}"}
{assign_variable:channel="sponsors"}
{assign_variable:section="Sponsor Tour"}
<div class="body">
	<h1>{section}</h1>
	<div class="grid23 clearafter">
		<div class="single left">
			<iframe src="http://player.vimeo.com/video/17569582" width="490" height="276" frameborder="0"></iframe>
			{exp:weblog:entries weblog="{channel}" entry_id="477" limit="1"}
				{body}
			{/exp:weblog:entries}
		</div><!--/.single-->
	<div class="sidebar right">
		<div class="bar">Become a sponsor</div>
			{exp:weblog:entries weblog="{channel}" entry_id="478" limit="1"}
				{body}
			{/exp:weblog:entries}
		<p class="button-wrap"><a href="{path='sponsors/register'}" class="super giant green button"><span>Get Started</span></a></p>
	</div>
	</div>
</div><!-- /.body -->
{embed="includes/_doc_bottom"}