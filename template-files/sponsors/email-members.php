{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Email Members"
		section=""
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

{preload_replace:pr_sponsor_type="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_type}{/exp:channel:entries}{/exp:user:stats}"}
{preload_replace:pr_sponsor_zip="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_zip}{/exp:channel:entries}{/exp:user:stats}"}
{preload_replace:pr_sponsor_id="{exp:user:stats dynamic='off'}{member_sponsor_id}{/exp:user:stats}"}

<body>

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		
		{if "{pr_sponsor_type}" == "profit"}
		
			{sn_nav-sponsors-profit}
			
		{if:else}
		
			{sn_nav-sponsors}
			
		{/if}
		
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>

	<div class="body  sponsors">
	
		{if segment_3 != ""}
			<ul class="trail">
				<li><a href="{path='site_index'}">Home</a></li>
				<li><a href="{path='sponsors'}">Sponsors</a></li>
				<li><a href="{path='sponsors/email-members'}">Member List</a></li>
			</ul>
		{/if}

	{embed="sponsors/_members-list" sponsor_number="{pr_sponsor_id}" sponsor_zipcode="{pr_sponsor_zip}"}

	</div><!-- /body -->

{sn_footer}
{sn_scripts}

<script src="{path='js/sponsors'}"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	{if segment_3}
	
	//Hide all lists except the one for the current section
	$(".sidebar h2").children(".arrow").toggle();
	$(".sidebar ul.filter-list").not(".filter-list.{segment_3}").hide();
	$(".sidebar h2.{segment_3}").children(".arrow").toggle();
	
	{/if}

});
</script>
		
{gv_analytics}
</body>
</html>