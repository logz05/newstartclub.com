{embed="embeds/_doc-top" 
	class="sponsors"
	title="Edit Deals"
	sponsor_type="
		{exp:user:stats dynamic='off'}
			{exp:channel:entries channel="locations" category='{member_sponsor_id}'}
				{location_type}
			{/exp:channel:entries}
		{/exp:user:stats}
		"
}

<div class="heading clearfix">
	<h1>Edit Deals</h1>
</div>
{exp:user:stats dynamic="off"}

<div class="grid23 clearfix">
	<div class="main deals left">
		{sn_no-script}
		
		{embed="sponsors/_deal-list-active" sponsor_number="{member_sponsor_id}"}
		
		{if member_id == "1"}
		<dl class="tabs">
			<dd><a class="default" rel="current">Active</a></dd>
			<dd><a rel="drafts">Drafts</a></dd>
		</dl>
		<ul class="tabs-content">
			<li id="current">
				{embed="sponsors/_deal-list-active" sponsor_number="{member_sponsor_id}"}
			</li>
			<li id="drafts">
				<p>Drafts are not visible to the public. To make a draft public, edit the deal and change the status to open.</p>
				{embed="sponsors/_deal-list-draft" sponsor_number="{member_sponsor_id}" status="draft"}
			</li>
		</ul>
		{/if}
	</div>

	<div class="right sidebar">
		<header class="bar" data-icon="n">Edit Deals</header>
		<p>Click on the deal title to view deal details.</p>
		<ul class="bullets">
			<li><a href="{path='sponsors/add-deal'}">Add a new deal</a></li>
			<li>{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}<a href="{site_url}/deals/sponsor/{category_url_title}">View my active deals</a>{/exp:channel:categories}</li>
		</ul>
	</div>
</div>
{/exp:user:stats}
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|sponsors" scripts="sponsors/sponsors"}