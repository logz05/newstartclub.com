{embed="embeds/_doc-top" 
	class="sponsors"
	title="Edit Deals"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{sponsor_type}{/exp:weblog:categories}{/exp:user:stats}"
}

<div class="heading clearfix">
	<h1>Edit Deals</h1>
</div>
{exp:user:stats dynamic="off"}

<div class="grid23 clearfix">
	<div class="main deals left">
	<noscript>
		<div class="alert-box warning">
			<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
		</div>
	</noscript>

	{embed="sponsors/_deal-list" sponsor_number="{sponsor_number}"}

	</div>

	<div class="right sidebar">
		<header class="bar" data-icon="n">Edit Deals</header>
		<p>To see more about a deal click on the deal title.</p>
		<p>To add a new deal, click <a href="/sponsors/add-deal">here</a>.</p>
		<p>Click {exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}<a href="/deals/detail/{category_url_title}">here</a>{/exp:weblog:categories} to see your active deals.</p>
	</div>
</div>
{/exp:user:stats}
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|sponsors" scripts="sponsors/sponsors"}