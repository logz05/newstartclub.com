{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Partnership Program"
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

	<div class="body  services">
		
		<header class="heading">
			<h1 class="post__title" data-icon="a">Partnership Program</h1>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">
			
				<div class="post">
				
					<figure class="figure  figure--main">
						<img src="{site_url}/assets/images/partner-tour/partnership-tour.jpg">
					</figure>
				
					<h2>Health Evangelism Made Simple</h2>
					<h3>Become a NEWSTART&reg; Lifestyle Club partner and harness the power of NEWSTART in your health outreach.</h3>
					<p>The NEWSTART Lifestyle Club partnership program provides a way for you to connect with local churches in your area who are interested in offering seminar presentations, lifestyle counseling, and natural treatments. It&rsquo;s based on the world famous NEWSTART principles that have helped millions live well naturally without the use of drugs.</p>
					
					<h2>As a partner, you&rsquo;ll get:</h2>
					<h3>Health outreach support</h3>
					<p>Whether you decide to speak at a church-based Reversing Disease seminar or volunteer at a NEWSTART Free Clinic, you&rsquo;ll have a wide selection of health outreach opportunities to choose from. You will also have full permission to use the NEWSTART acronym in your presentations and patient education.</p>
	
					<h3>Health services profile</h3>
					<p>With 80% of U.S. patients seeking health information online, having your profile on the NEWSTART Lifestyle Club website will mean higher visibility for your practice. And with a club that is growing by more than 15 new members everyday, there's no better place to be.</p>
	
					<h3>Discounts on health products and resources</h3>
					<p>Gain access to additional resources to help your patients stay fit and strong. As a NEWSTART Lifestyle Club partner, you&rsquo;ll receive discounts on health related products and resources from NEWSTART.</p>
	
					<p>So what are you waiting for?</p>
					
					<p class="button-wrap">
						{if logged_out}
							<a href="{path='signin'}" class="super  green  button" data-reveal-id="signin-modal-partner-apply"><span>Apply Now</span></a>
						{if:else}
							<a href="{path='partners/apply'}" class="super  green  button"><span>Apply Now</span></a>
						{/if}
					</p>
					
				</div>
				
			</div>
			
			<div class="sidebar  right">
				
				<header class="bar">Become a Partner</header>
				<p>To become a NEWSTART&reg; Lifestyle Club partner, click &ldquo;Get Started&rdquo; below or contact Richard Ramont for more information.</p>
				<p>Phone: 530-422-7993<br>
					Email: <a href="mailto:club@newstart.com"></a><a href="mailto:club@newstart.com">club@newstart.com</a></p>
				<p><strong>IMPORTANT:</strong> You must sign in as a NEWSTART Lifestyle Club member to apply for partnership.</p>
				<p class="button-wrap">
					{if logged_out}
						<a href="{path='signin'}" class="super  giant  green  button" data-reveal-id="signin-modal-partner-apply"><span>Get Started</span></a>
					{if:else}
						<a href="{path='partners/apply'}" class="super  giant  green  button"><span>Get Started</span></a>
					{/if}
				</p>
				
			</div>
			
		</div>
	
	</div><!-- /body -->

{sn_footer}
{sn_scripts}

{embed="embeds/_signin-modal modal-role="partner-apply"}

{gv_analytics}
</body>
</html>