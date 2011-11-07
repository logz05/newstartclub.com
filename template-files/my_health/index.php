{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<div class="body">
	<div class="heading clearafter">
		<div class="icon"></div>
		<h1>How is Your Health?</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="single left">
			{exp:weblog:entries weblog="{channel}" entry_id="641" limit="1"}
				{body}
			{/exp:weblog:entries}
		</div><!--/.single-->
		<div class="sidebar right">
			{if logged_out}
				<div class="bar">The HealthGauge<sup>&trade;</sup></div>
				<a href="/signin" data-reveal-id="signin-modal-health-gauge">
					<div id="my_health_gauge"></div>
				</a>
				<p>This health score calculator will evaluate your health by comparing your personal health practices with modern scientific information.</p>
				<p class="button-wrap">
					<a href="/signin" class="super small secondary button" data-reveal-id="signin-modal-health-gauge"><span>Calculate</span></a>
				</p>
			{/if}
			{exp:user:stats}
				{if memberScoreTotal == ""}
					<div class="bar">The HealthGauge<sup>&trade;</sup></div>
					<a href="/my_health/calculator/">
						<div id="my_health_gauge"></div>
					</a>
					<p>This health score calculator will evaluate your health by comparing your personal health practices with modern scientific information.</p>
					<p class="button-wrap">
						<a href="/my_health/calculator/" class="super small secondary button"><span>Calculate</span></a>
					</p>
				{if:else}
					<div class="bar">Health Score Results</div>
					<h1 class="total-score"><a href="/my_health/results/">{memberScoreTotal}</a></h1>
					<p class="button-wrap">
						<a href="/my_health/calculator/" class="super small secondary button"><span>Recalculate</span></a>
					</p>
				{/if}
			{/exp:user:stats}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="health-gauge" modal-msg="You must be signed in to calculate your health score."}
{embed="includes/_doc_bottom"}