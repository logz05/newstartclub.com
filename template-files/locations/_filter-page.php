{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Locations in {segment_3_category_name}"
		section=""
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

<body>

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>
	
	<div class="body  locations">
	
		{embed="embeds/_rss-feed"}
		
		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='locations'}">Locations</a></li>
		</ul>
		
		<header class="heading">
			{if segment_3 == ''}
				<h1 class="post__title">No locations here!</h1>
			{/if}
			{if segment_3_category_id == ''}
				<h1 class="post__title">No locations here!</h1>
			{if:else}
				<h1 class="post__title">{segment_3_category_name}</h1>
			{/if}
		</header>
		
		<div class="grid23	clearfix">
		
			<div class="main	 left">
			
				{if segment_3 == '' || segment_3_category_id == ''}
				
					<p>We could not find any locations at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
					<p>Please choose from a filter on the right or <a href="{path='locations'}">view all locations</a>.</p>
					
				{if:else}
				
					{embed="locations/_page-listing" parameters="category='{segment_3_category_id}'"}
					
				{/if}
				
			</div>

			<div class="sidebar  right">
			
				{embed="locations/_sidebar"}
				
			</div>
			
		</div>
	
	</div><!-- /body -->

{sn_footer}
{sn_scripts}

<script type="text/javascript">
$(document).ready(function(){
	
	//Hide all lists except the one for the current section
	$(".sidebar h2").children(".arrow").toggle();
	$(".sidebar ul.filter-list").not(".filter-list.{segment_2}").hide();
	$(".sidebar h2.{segment_2}").children(".arrow").toggle();

});
</script>

{gv_analytics}
</body>
</html>