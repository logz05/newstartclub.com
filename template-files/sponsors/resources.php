{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Sponsor Resources"
		section=""
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

{preload_replace:pr_sponsor_type="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_type}{/exp:channel:entries}{/exp:user:stats}"}
{preload_replace:pr_sponsor_url="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{url_title}{/exp:channel:entries}{/exp:user:stats}"}
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
	
		<header class="heading">
			<h1 class="post__title">Sponsor Resources</h1>
		</header>

		<div class="grid23  clearfix">
		
			<div class="main  left  resource-list">
			
				<div class="post">
				
					<section class="module">
					
						<h2>Press Kit</h2>
						
						<ul>
							<li><a href="{site_url}/downloads/sponsor-resources/logos/NS-Lifestyle-Club-jpg.zip">{site_name} Logo (JPG)</a></li>
							<li><a href="{site_url}/downloads/sponsor-resources/logos/NS-Lifestyle-Club-ai.zip">{site_name} Logo (AI)</a></li>
							<li><a href="{site_url}/downloads/sponsor-resources/logos/NS-Lifestyle-Club-eps.zip">{site_name} Logo (EPS)</a></li>
						</ul>
						
					</section>
					
					<section class="module">
					
						<h2>Promotional Kit</h2>
						
						<ul>
							<li><h3>Print</h3>
							
								<ul>
									<li><a href="http://www.newstart.com/store/newstart-lifestyle-club-brochures/">Club Brochure</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/common-files/Door-Survey.pdf">Door Survey</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/common-files/Interest-Form-2UP.pdf">Interest Form</a></li>
									<li><a href="http://www.newstart.com/store/newstart-lifestyle-club-business-cards/">Business Cards</a></li>
									<li><a href="http://www.newstart.com/store/newstart-lifestyle-club-door-hangers/">Door Hangers</a></li>
									<li><a href="http://www.newstart.com/store/newstart-lifestyle-club-postcards/">Postcards</a></li>
									<li><a href="http://www.newstart.com/store/newstart-lifestyle-club-flyers/">Flyers</a></li>
									<li><a href="http://www.newstart.com/store/newstart-lifestyle-club-posters/">Posters</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/common-files/t-shirt-mockup-white.jpg">T-shirt Template</a></li>
									<li><a href="http://www.adventising.com/newstart/">Vehicle Window Decal (www.NEWSTARTClub.com)</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/common-files/BannerStand-M2.pdf">Banner (33.65&rdquo; x 94.88&rdquo;)</a></li>
								</ul>
								
							</li>
							
							<li><h3>Web</h3>
								<ul>
									<li>30 Second Web Video Commercial (Coming Soon)</li>
									<li>&nbsp;</li>
									<li class="clearfix">
										<figure class="figure  figure--main  left">
											<img src="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-174x119.jpg" />
											<figcaption>
												<a href="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-174x119.jpg">Web Banner (174px x 119px)</a>
											</figcaption>
										</figure>
										<p class="copy-instructions">Copy the code below to embed this banner on your website.</p>
										<textarea class="input" rows="4" onClick="select()" readonly="readonly">&lt;a href='{path='join/{pr_sponsor_id}'}'&gt;&lt;img src='{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-174x119.jpg' alt='{site_name} Web Banner' border='0' /&gt;&lt;/a&gt;</textarea>
									</li>
									
									<li>
										<figure class="figure  figure--main  left">
											<img src="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-728x90.jpg" width="450" />
											<figcaption>
												<a href="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-728x90.jpg">Web Banner (728px x 90px)</a> Preview above shown scaled down.
											</figcaption>
										</figure>
										<p class="copy-instructions">Copy the code below to embed this banner on your website.</p>
										<textarea class="input" rows="4" onClick="select()" readonly="readonly">&lt;a href='{path='join/{pr_sponsor_id}'}'&gt;&lt;img src='{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-728x90.jpg' alt='{site_name} Web Banner' border='0' /&gt;&lt;/a&gt;</textarea>
									</li>
									
									{if "{pr_sponsor_type}" == "profit"}
									
										<li>
											<figure class="figure  figure--main  left">
												<img src="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-deals-174x119.jpg" />
												<figcaption>
													<a href="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-deals-174x119.jpg">Web Banner (174px x 119px)</a>
												</figcaption>
											</figure>
											<p class="copy-instructions">Copy the code below to embed this banner on your website.</p>
											<textarea class="input" rows="4" onClick="select()" readonly="readonly">&lt;a href='{path='deals'}/sponsor/{pr_sponsor_url}'&gt;&lt;img src='{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-deals-174x119.jpg' alt='{site_name} Deals' border='0' /&gt;&lt;/a&gt;</textarea>
										</li>
										
										<li>
											<figure class="figure  figure--main  left">
												<img src="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-deals-728x90.jpg" width="450" />
												<figcaption>
													<a href="{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-deals-728x90.jpg">Web Banner (728px x 90px)</a> Preview above shown scaled down.
												</figcaption>
											</figure>
											<p class="copy-instructions">Copy the code below to embed this banner on your website.</p>
											<textarea class="input" rows="4" onClick="select()" readonly="readonly">&lt;a href='{path='deals'}/sponsor/{pr_sponsor_url}'&gt;&lt;img src='{site_url}/downloads/sponsor-resources/web-banners/newstart-lifestyle-club-deals-728x90.jpg' alt='{site_name} Deals' border='0' /&gt;&lt;/a&gt;</textarea>
										</li>
									
									{/if}
								</ul>
								
							</li>
							
						</ul>
						
					</section>
					
					<section class="module">
					
						<h2>NEWSTART Health Expo Kit</h2>
						<ul>
						
							<li><h3>Promotion</h3>
								<ul>
									<li><a href="http://www.newstart.com/store/newstart-health-expo-invitation-flyers/">Invitation Flyer</a></li>
									<li><a href="http://www.newstart.com/store/newstart-health-expo-invitation-banner/">Invitation Banner</a></li>
								</ul>
							</li>
							
							<li><h3>Station Banners</h3>
								<ul>
									<li><a href="http://www.newstart.com/store/newstart-health-expo-banners-english/">English</a></li>
									<li><a href="http://www.newstart.com/store/newstart-health-expo-banners-spanish/">Spanish</a></li>
								</ul>
							</li>
							
							<li><h3>Station Forms, Instructions, Signs and Handouts</h3>
								<ul>
									<li><a href="http://www.newstart.com/store/newstart-health-expo-personal-health-records/">Personal Health Records</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/Childrens-Activities.zip">Children&rsquo;s Activities</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/01-Welcome.zip">Welcome</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/02-Sunlight.zip">Sunlight</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/03-Nutrition.zip">Nutrition</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/04-Air.zip">Air</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/05-Exercise.zip">Exercise</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/06-Water.zip">Water</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/07-Rest.zip">Rest</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/08-Temperance.zip">Temperance</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/09-HealthGauge.zip">The HealthGauge&trade;</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/10-Trust.zip">Trust</a></li>
									<li><a href="{site_url}/downloads/sponsor-resources/expo-files/11-Resources.zip">Resources</a></li>
								</ul>
							</li>
							
						</ul>
						
					</section>
					
					<section class="module">
					
						<h2>Reversing Disease Seminars Kit</h2>
						<ul>
							<li><h3>Instructions and Handouts</h3>
								<ul>
									<li><a href="/downloads/sponsor-resources/common-files/RD-Instructions.zip">RD Instructions</a></li>
									<li><a href="/downloads/sponsor-resources/common-files/RD-Handouts.zip">RD Handouts</a></li>
								</ul>
							</li>
							<li><h3>Lectures</h3>
								<ul>
									<li><a href="http://www.newstart.com/store/category/reversing-disease/">Reversing Disease Seminars DVD Series</a></li>
								</ul>
							</li>
						</ul>
						
					</section>
					
					<section class="module">
					
						<h2>NEWSTART Free Clinic Kit</h2>
						<ul>
							<li><h3>Instructions and Handouts</h3>
								<ul>
									<li><a href="/downloads/sponsor-resources/common-files/Free-Clinic-Instructions.zip">Free Clinic Instructions</a></li>
									<li><a href="/downloads/sponsor-resources/common-files/Free-Clinic-Handouts.zip">Free Clinic Handouts</a></li>
									<li><a href="http://www.adventsource.org/as30/store-productDetails.aspx?ID=36191">Coaching Lasting Lifestyle Change (DVD Set & Facilitators Guide)</a></li>
								</ul>
							</li>
							<li><h3>Lectures</h3>
								<ul>
									<li><a href="http://www.newstart.com/store/the-newstart-lifestyle/">The NEWSTART Lifestyle DVD Series</a></li>
								</ul>
							</li>
						</ul>
						
					</section>
					
					<section class="module">
					
						<h2>Additional Links</h2>
						<ul>
							<li>
								<h3>
									Expos</h3>
								<ul>
									<li>
										NEWSTART&reg; Health Expo
										<ul>
											<li>
												<a href="http://www.newstartexpo.com">www.newstartexpo.com</a></li>
										</ul>
									</li>
									<li>
										Health Expo Banners
										<ul>
											<li>
												<a href="http://www.healthexpobanners.com/engl_generalinfo.php">www.healthexpobanners.com</a></li>
										</ul>
									</li>
									<li>
										LifeStyleEXPO from LifeStyleTV
										<ul>
											<li>
												<a href="http://www.lifestyleexpo.org">www.lifestyleexpo.org</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<h3>
									Programs</h3>
								<ul>
									<li>
										Reversing Disease Seminars
										<ul>
											<li>
												<a href="http://www.reversingdisease.org">www.reversingdisease.org</a></li>
										</ul>
									</li>
									<li>
										Nedley Depression Recovery Program
										<ul>
											<li>
												<a href="http://www.drnedley.com">www.drnedley.com</a></li>
										</ul>
									</li>
									<li>
										Adventist Coranary Health Improvement Project (<span class="caps">CHIP</span>)
										<ul>
											<li>
												<a href="http://www.sdachip.org">www.sdachip.org</a></li>
										</ul>
									</li>
									<li>
										Healthy 100 Churches
										<ul>
											<li>
												<a href="http://www.healthy100churches.org">www.healthy100churches.org</a></li>
										</ul>
									</li>
									<li>
										The Full Plate Diet
										<ul>
											<li>
												<a href="http://www.fullplatediet.org">www.fullplatediet.org</a></li>
										</ul>
									</li>
									<li>
										Food Studies Institute
										<ul>
											<li>
												<a href="http://www.foodstudies.org">www.foodstudies.org</a></li>
										</ul>
									</li>
									<li>
										StepFast Lifestyle Design
										<ul>
											<li>
												<a href="http://www.stepfast.org">www.stepfast.org</a></li>
										</ul>
									</li>
									<li>
										Lifestyle Matters
										<ul>
											<li>
												<a href="http://www.lifestylematters.com">www.lifestylematters.com</a></li>
										</ul>
									</li>
									<li>
										Win! Wellness
										<ul>
											<li>
												<a href="http://www.winwellness.org">www.winwellness.org</a></li>
										</ul>
									</li>
									<li>
										Abundant Living
										<ul>
											<li>
												<a href="http://www.healthexpobanners.com/Presentations/Main.htm">www.healthexpobanners.com</a></li>
										</ul>
									</li>
									<li>
										LifeLong Health
										<ul>
											<li>
												<a href="http://www.wellsource.org/llh_resources.htm">www.wellsource.org</a></li>
										</ul>
									</li>
									<li>
										The Daniel Challenge
										<ul>
											<li>
												<a href="http://www.thedanielchallenge.com">www.thedanielchallenge.com</a></li>
										</ul>
									</li>
									<li>
										What&rsquo;s the Connection?
										<ul>
											<li>
												<a href="http://connection.threeangels.org">connection.threeangels.org</a></li>
										</ul>
									</li>
									<li>
										The Empowered Church
										<ul>
											<li>
												<a href="http://www.empoweredchurch.com">www.empoweredchurch.com</a></li>
										</ul>
									</li>
									<li>
										Naturally Healthy Children&rsquo;s Presentation Series
										<ul>
											<li>
												<a href="http://store.youngdisciple.com/collections/evangelism-tools/products/naturally-healthy">www.youngdisciple.com</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<h3>
									Resources</h3>
								<ul>
									<li>
										<span class="caps">NAD</span> Health Ministries
										<ul>
											<li>
												<a href="http://www.nadhealthministries.org">www.nadhealthministries.org</a></li>
										</ul>
									</li>
									<li>
										Nedley Health Report
										<ul>
											<li>
												<a href="http://www.nedleyhealthreport.com">www.nedleyhealthreport.com</a></li>
										</ul>
									</li>
									<li>
										Northern Lights Health Education
										<ul>
											<li>
												<a href="http://northernlightshealtheducation.com/pages/Videos.html">www.northernlightshealtheducation.com</a></li>
										</ul>
									</li>
									<li>
										Healthy 100
										<ul>
											<li>
												<a href="http://www.healthy100.org">www.healthy100.org</a></li>
										</ul>
									</li>
									<li>
										Positive Choices
										<ul>
											<li>
												<a href="http://www.positivechoices.com">www.positivechoices.com</a></li>
										</ul>
									</li>
									<li>
										HealthyLifeInfo.com
										<ul>
											<li>
												<a href="http://www.healthylifeinfo.com">www.healthylifeinfo.com</a></li>
										</ul>
									</li>
									<li>
										Life and Health Network
										<ul>
											<li>
												<a href="http://www.lifeandhealthnetwork.org">www.lifeandhealthnetwork.org</a></li>
										</ul>
									</li>
									<li>
										Adventist Medical Evangelism Network (<span class="caps">AMEN</span>)
										<ul>
											<li>
												<a href="http://www.amensda.org">www.amensda.org</a></li>
										</ul>
									</li>
									<li>
										Amazing Health Facts
										<ul>
											<li>
												<a href="http://www.amazinghealthfacts.org">www.amazinghealthfacts.org</a></li>
										</ul>
									</li>
									<li>
										Coranary Health Improvement Project (<span class="caps">CHIP</span>)
										<ul>
											<li>
												<a href="http://www.chiphealth.com">www.chiphealth.com</a></li>
										</ul>
									</li>
									<li>
										Vibrant Life
										<ul>
											<li>
												<a href="http://www.vibrantlife.com">www.vibrantlife.com</a></li>
										</ul>
									</li>
									<li>
										Get Healthy . . . Get Smart!
										<ul>
											<li>
												<a href="http://www.gethealthygetsmart.com">www.gethealthygetsmart.com</a></li>
										</ul>
									</li>
									<li>
										Wellsource &ndash; Health Risk Assessments and Wellness Tools
										<ul>
											<li>
												<a href="http://www.wellsource.com">www.wellsource.com</a></li>
										</ul>
									</li>
									<li>
										Hamblin&rsquo;s HOPE&trade;
										<ul>
											<li>
												<a href="http://www.hopesource.com">www.hopesource.com</a></li>
										</ul>
									</li>
									<li>
										Prevent and Reverse Heart Disease
										<ul>
											<li>
												<a href="http://www.heartattackproof.com">www.heartattackproof.com</a></li>
										</ul>
									</li>
									<li>
										Dr. McDougall&rsquo;s Health and Medical Center
										<ul>
											<li>
												<a href="http://www.drmcdougall.com">www.drmcdougall.com</a></li>
										</ul>
									</li>
									<li>
										Dr. Neal Barnard&rsquo;s Program for Reversing Diabetes
										<ul>
											<li>
												<a href="http://www.nealbarnard.org/diabetes_book.htm">www.nealbarnard.org</a></li>
										</ul>
									</li>
									<li>
										Lay Institute for Global Health Training (<span class="caps">LIGHT</span>)
										<ul>
											<li>
												<a href="http://www.lightingtheworld.org">www.lightingtheworld.org</a></li>
										</ul>
									</li>
									<li>
										WebMD
										<ul>
											<li>
												<a href="http://www.webmd.com">www.webmd.com</a></li>
										</ul>
									</li>
									<li>
										Physicians Committee for Responsible Medicine
										<ul>
											<li>
												<a href="http://www.pcrm.org">www.pcrm.org</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						
					</section>
					
				</div>
				
			</div>
			
			<div class="right  sidebar">
			
				<header class="bar">Additional Resources</header>
				
				<p>To receive discounts on health related products and services from participating businesses, visit <a href="{path='deals'}">http://newstartclub.com/deals</a></p>
				
				<header class="bar">Need Help?</header>
				
				<p>NEWSTART&reg; Global medical missionaries are available to help you with your health outreach.</p>
				
				<p>Phone: 530-422-7993<br>
					Email: <a href="mailto:club@newstart.com"></a><a href="mailto:club@newstart.com">club@newstart.com</a></p>
				
			</div>
			
		</div>

	</div><!-- /body -->

{sn_footer}
{sn_scripts}

<script src="{site_url}/assets/js/sponsors.js"></script>
		
{gv_analytics}
</body>
</html>