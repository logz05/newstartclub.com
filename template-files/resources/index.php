{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"}
{assign_variable:channel="resources"}
{assign_variable:section="Resources"}
<div id="{channel}" class="body">
	<div class="heading clearafter">
		<div class="icon"></div>
		<h1>{section}</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="list left">
			{embed="{channel}/_page-listing" orderby="date" sort="desc"}
		</div><!--/.list-->
		<div class="sidebar right">
			{embed="{channel}/_sidebar" channel="{channel}"}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}