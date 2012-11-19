{embed="embeds/_doc-top" 
	class="my-health"
	title="My Health"
}
<div class="heading clearfix">
	<h1 data-icon="c">How is Your Health?</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			<img class="image" src="{site_url}/assets/images/my-health/my-health-image.png"><strong>Making positive lifestyle choices could cut your risk for diabetes by about 80%.</strong><sup id="fnref:1"><a href="#fn:1" rel="footnote">1</a></sup>
			<p>Taking the right health risk assessment (HRA) is the first step to living well naturally. The NEWSTART® Lifestyle Club <span class="caps">HRA</span> — HealthGauge™ Health Score Calculator—is based on a recent study<sup id="fnref:2"><a href="#fn:2" rel="footnote">2</a></sup> where the health practices of 200,000 people were recorded. When the participants were surveyed ten years later, the research revealed a clear relationship between five key health practices and one’s risk for developing type 2 diabetes. Individuals who managed to make improvements in all five risk areas were able to reduce their risk by about 80%, according to the study.</p>
			<p>More than ever before, scientific research<sup id="fnref:3"><a href="#fn:3" rel="footnote">3</a></sup> is uncovering the fact that heart disease, cancer, and diabetes are largely the result of the way we live. By addressing common lifestyle factors such as obesity and alcohol consumption, a person’s odds of developing these diseases may decrease for each positive lifestyle change they make.</p>
			<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information. You will be presented with specific recommendations to begin following right away.</p>
			<p><strong>Key features of the HealthGauge™ Health Score Calculator:</strong></p>
			<ul>
				<li>Easy-to-complete 7-point questionnaire</li>
				<li>Comprehensive report with personalized recommendations</li>
				<li>Links from the report to extensive health improvement content</li>
				<li>Access to the NEWSTART® health information request portal</li>
			</ul>
			<p><em>Take the first step to better health. Calculate your health score today!</em></p>
			<hr>
			<h3>References</h3>
			<ol class="references">
				<li id="fn:1"><p><a href="http://diabetes.webmd.com/news/20110902/improving-lifestyle-reduces-diabetes-risk" title="WebMD Health News">Improving Lifestyle Reduces Diabetes Risk</a> <a href="#fnref:1" rev="footnote">↩</a></p></li>
				<li id="fn:2"><p><a href="http://www.annals.org/content/155/5/292.abstract" title="Sept. 6 Issue of Annals of Internal Medicine">Lifestyle Factors and Risk for New-Onset Diabetes—A Population-Based Cohort Study</a> <a href="#fnref:2" rev="footnote">↩</a></p></li>
				<li id="fn:3"><p><a href="http://www.heartattackproof.com/resolving_cade.htm">Resolving the Coronary Artery Disease Epidemic through Plant-Based Nutrition</a> <a href="#fnref:3" rev="footnote">↩</a></p></li>	
			</ol>
			
		</div>
	</div>
	<div class="sidebar right">
		{if logged_out}
			<header class="bar" data-icon="c">The HealthGauge<sup>&trade;</sup></header>
			<a href="{path='my-health/calculator'}">
				<div id="gauge"></div>
			</a>
			<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
			<p class="button-wrap">
				<a href="{path='my-health/calculator'}" class="super small secondary button"><span>Calculate</span></a>
			</p>
		{/if}
		{exp:user:stats}
			{if member_score_total == ""}
				<header class="bar" data-icon="c">The HealthGauge<sup>&trade;</sup></header>
				<a href="{path='my-health/calculator'}">
					<div id="gauge"></div>
				</a>
				<p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
				<p class="button-wrap">
					<a href="{path='my-health/calculator'}" class="super small secondary button"><span>Calculate</span></a>
				</p>
			{if:else}
				<header class="bar" data-icon="c">My Health</header>
				<h2 class="center">Health Score Results</h2>
				<h3 class="total-score"><a href="{path='my-health/results'}" title="Go to my results">{member_score_total}</a></h3>
				<p class="center">
					<a href="{path='my-health/calculator'}"><span>Recalculate</span></a>
				</p>
				<p class="button-wrap center">
					<a href="{path='my-health/results'}" class="super small secondary button"><span>View Recommendations</span></a>
				</p>
			{/if}
		{/exp:user:stats}
	</div>
</div>
{embed="embeds/_doc-bottom"}