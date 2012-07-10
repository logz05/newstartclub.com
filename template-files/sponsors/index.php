{if segment_2}
	{redirect="404"}
{/if}
{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{sponsor_type}{/exp:weblog:categories}{/exp:user:stats}"
}
{if logged_out || (member_group != 1 && member_group != 13)}
	<div class="heading clearfix">
		<h1>Sponsorship Program</h1>
	</div>
	<div class="grid23 clearfix">
		<div class="main {if logged_out}tour {/if}left">
			<div class="post">
				<iframe src="http://player.vimeo.com/video/17569582" width="490" height="276" frameborder="0"></iframe>
				{exp:weblog:entries weblog="sponsors" entry_id="477" limit="1"}
					{body}
				{/exp:weblog:entries}
				<p>So what are you waiting for? <a href="http://newstartclub.com/sponsors/apply" {if logged_out}data-reveal-id="signin-modal-sponsor-apply"{/if}>Apply now</a>.</p>
			</div>
		</div>
		<div class="sidebar right">
			<div class="bar">Become a Sponsor</div>
				{exp:weblog:entries weblog="sponsors" entry_id="478" limit="1"}
					{body}
				{/exp:weblog:entries}
			<p class="button-wrap">
				<a href="/sponsors/apply" class="super giant green button" {if logged_out}data-reveal-id="signin-modal-sponsor-apply"{/if}><span>Get Started</span></a></p>
			<div class="quotes">
				<blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has made a huge difference in my health outreach.&rdquo;</blockquote>
				<cite>&mdash;Todd D. Armstrong<br><a href="http://www.fhes.net/" target="_blank">Speaker/Director, Family Health &amp; Education Services</a></cite>
				<blockquote>&ldquo;This is the best thing I&rsquo;ve seen in a long, long time.&rdquo;</blockquote>
				<cite>&mdash;James Redfield<br><a href="http://colfaxcares.org" target="_blank">Pastor, Colfax SDA Church</a></cite>
				<blockquote>&ldquo;This is JUST what we have needed to make it easy to network with the people who come to our health programs and to easily get others to join.&rdquo;</blockquote>
				<cite>&mdash;Debbie Cox<br><a href="/locations/detail/buskirk-newstart-club/" target="_blank">Health Ministries Leader, Buskirk SDA Church</a></cite>
				<blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has added a whole new dimension to our approach in regards to outreach. Utilizing the club will be a permanent addition to our ministry.&rdquo;</blockquote>
				<cite>&mdash;Mike Mudd<br><a href="http://yfj.netasi.org/" target="_blank">Evangelism Coordinator, ASI Youth For Jesus</a></cite>
				<blockquote>&ldquo;I highly recommend this resource.&rdquo;</blockquote>
				<cite>&mdash;Katia Reinert<br><a href="http://www.nadhealthministries.org" target="_blank">Director, NAD Adventist Health Ministries</a></cite>
			</div>
		</div>
	</div>
{if:else}
	{exp:user:stats dynamic="off"}
		{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}
	<div class="heading clearfix">
		<h1>{category_name}</h1>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
			<ul id="nav-list">
				{if sponsor_type == "profit"}
					<li><a href="/sponsors/add-deal">Add a deal <span class="arrow">&rarr;</span></a></li>
					<li><a href="/sponsors/edit-deals">Edit your deals <span class="arrow">&rarr;</span></a></li>
				{if:else}
					<li><a href="/sponsors/add-event">Add an event <span class="arrow">&rarr;</span></a></li>
					<li><a href="/sponsors/edit-event">Edit your events <span class="arrow">&rarr;</span></a></li>
				{/if}
				<li><a href="/sponsors/invite">Invite members to be part of the club <span class="arrow">&rarr;</span></a></li>
				<li><a href="/sponsors/email-members">Email your members <span class="arrow">&rarr;</span></a></li>
				<li><a href="/sponsors/resources">Get resources <span class="arrow">&rarr;</span></a></li>
			</ul>
			{/exp:weblog:categories}
		{/exp:user:stats}
			<div class="button-wrap">
				<a href="/downloads/sponsor-resources/common-files/Quick-Start-Guide.pdf" class="super secondary button"><span>Quick Start Guide &raquo;</span></a>
			</div>
			{exp:user:edit form:name="sponsor-id-switch" form:id="sponsor-id-switch" return="sponsors" password_required="n" dynamic="off"}
				{if sponsor_multiple || group_id == 1}
				<label for="sponsor_number"><h5>Change Sponsor</h5></label>
					<input type="hidden" name="firstName" value="{firstName}" />
					<input type="hidden" name="lastName" value="{lastName}" />
					<input type="hidden" name="zipCode" value="{zipCode}" />
					<input type="hidden" name="terms_and_conditions" value="on" />
					
					<select name="sponsor_number" class="input" onchange="this.form.submit()">
					{if sponsor_multiple}
						{exp:weblog:categories category_group="24" weblog="locations" style="linear" show="{sponsor_multiple}"}
							<option value="{category_id}"{if category_id == sponsor_number} selected="selected"{/if}>{category_name}</option>
						{/exp:weblog:categories}
					{if:else}
						{exp:weblog:categories category_group="24" weblog="locations" style="linear"}
							<option value="{category_id}"{if category_id == sponsor_number} selected="selected"{/if}>{category_name}</option>
						{/exp:weblog:categories}
					{/if}
					</select>
					
					{categories}
						{category_selected}<input type="hidden" name="category[]" value="{category_id}" />{/category_selected}
						{category_body}{selected}{/category_body}
					{/categories}
				{/if}
				<div class="button-wrap">
					<a href="/sponsors/apply" class="super green button"><span>Add Sponsor</span></a>
				</div>
			{/exp:user:edit}
		</div>
		<div class="sidebar right">
			<div class="bar">Admin Home</div>
			<p>For questions or comments about this service, please call 530-422-7993 or email <a href="mailto:club@newstart.com">club@newstart.com</a></p>
			<div class="button-wrap">
				<a href="/" class="super red button"><span>Club Home</span></a>
			</div>
		</div>
	</div>
{/if}
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|sponsor-admin" sponsor-apply="yes"}