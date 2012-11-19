{embed="embeds/_doc-top" 
	class="sponsors"
	title="Edit Deals"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}

<div class="heading clearfix">
	<h1>Edit Deals</h1>
</div>
{exp:user:stats dynamic="off"}

<div class="grid23 clearfix">
	<div class="main deals left">
	{sn_no-script}

	{embed="sponsors/_deal-list" sponsor_number="{member_sponsor_id}"}

	</div>

	<div class="right sidebar">
		<header class="bar" data-icon="n">Edit Deals</header>
		<p>To see more about a deal click on the deal title.</p>
		<p>To add a new deal, click <a href="{path='sponsors/add-deal'}">here</a>.</p>
		<p>Click {exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}<a href="/deals/sponsor/{category_url_title}">here</a>{/exp:channel:categories} to see your active deals.</p>
	</div>
</div>
{/exp:user:stats}
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|sponsors" scripts="sponsors/sponsors"}