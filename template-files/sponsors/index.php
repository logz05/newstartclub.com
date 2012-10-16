{if segment_2}
	{redirect="404"}
{/if}
{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program"
	sponsor_type="
		{exp:user:stats dynamic='off'}
			{exp:channel:categories show='{member_admin_id}' channel='locations' style='linear'}
				{sponsor_type}
			{/exp:channel:categories}
		{/exp:user:stats}
		"
	admin_id="{exp:user:stats dynamic='off'}{member_admin_id}{/exp:user:stats}"
}
{if logged_out || (member_group != 1 && member_group != 6)}
	<div class="heading clearfix">
		<h1>Sponsorship Program</h1>
	</div>
	<div class="grid23 clearfix">
		<div class="main {if logged_out}tour {/if}left">
			<div class="post">
				<iframe src="http://player.vimeo.com/video/17569582" width="490" height="276" frameborder="0"></iframe>
				<h2>Health Evangelism Made Simple</h2>
				<h3>Become a NEWSTART&reg; Lifestyle Club sponsor and harness the power of NEWSTART&reg; in your health outreach.</h3>
				<p>The NEWSTART&reg; Lifestyle Club sponsorship program is designed to equip schools, churches, and health care organizations to do health evangelism simply and effectively. It&rsquo;s based on the world famous <a href="http://www.newstart.com/newstart/what-is-newstart/">NEWSTART&reg;</a> principles that have helped millions live well naturally without the use of drugs.</p>
				<h2>As a sponsor, you&rsquo;ll get:</h2>
				<h3>Health seminar service and support</h3>
				<p><img class="left" src="{site_url}/assets/images/sponsor_admin/tour_newstart.png" style="margin-right:10px;" width="120">Whether you decide to sponsor a <a href="http://www.reversingdisease.org/">Reversing Disease seminar</a> from Weimar Center of Health and Education, a <span class="caps">CHIP</span> program, Depression Recovery program, or even a <a href="http://newstartexpo.com/">NEWSTART&reg; Health Expo</a>, you&rsquo;ll have a wide selection of events to choose from. You will also have full permission to use the NEWSTART&reg; acronym in your presentations and advertising. And should you need help, you can call on one of our <a href="http://newstartglobal.com/">NEWSTART&reg; Global</a> medical missionary teams to help you get started. In addition, NEWSTART&reg; Lifestyle Club health experts will be available to answer seminar participants&rsquo; questions through the club website.</p>
				<h3>Health survey and event promotional tools</h3>
				<p><img class="right" src="{site_url}/assets/images/sponsor_admin/tour-promo-tools.jpg" style="margin-left:10px; margin-right:-19px" width="280">With 80% of U.S. patients seeking health information online, having your health events and seminars on the NEWSTART&reg; Lifestyle Club website will mean higher attendance. For more demanding advertising campaigns, you&rsquo;ll have our field tested community health survey, event flyers, and club cards to use at health Expos and door-to-door. They&rsquo;ve been specifically designed to be fun, easy to use, and yield results. Best of all, you&rsquo;ll have full control over posting to the club website where browsers can find specific details about your events along with contact information including Google&reg; mapped directions.</p>
				<h3>Online contact management system</h3>
				<p>Being a club sponsor means having direct contact with club members in your area. You&rsquo;ll be able to easily view contact information and send email through a set of powerful online communication tools. As new members are added via your sponsor promo code, event <span class="caps">RSVP</span> list, or area zip code, you&rsquo;ll be able to know exactly how many are interested in a specific event or health topic. Not only that, it integrates seamlessly with popular <span class="caps">CRM</span> software such as <a href="http://getdisciples.com/">Disciples</a> or <a href="http://www.nchsoftware.com/crm/index.html"><span class="caps">NHC</span> Reflect</a>.</p>
				<p><img src="{site_url}/assets/images/sponsor_admin/tour-contacts.jpg" style="margin-left: -40px;" width="549"></p>
				<h3>Discounts on&nbsp;health products and services</h3>
				<p><img class="left" src="{site_url}/assets/images/sponsor_admin/tour_discounts.png" style="margin-right:10px;" width="180">Gain access to additional resources to help your participants stay fit and strong. As a NEWSTART&reg; Lifestyle Club member, you&rsquo;ll receive discounts on health related products and services from participating businesses.</p>
				<p>So what are you waiting for? <a href="http://newstartclub.com/sponsors/apply" {if logged_out}data-reveal-id="signin-modal-sponsor-apply"{/if}>Apply now</a>.</p>
			</div>
		</div>
		<div class="sidebar right">
			<header class="bar">Become a Sponsor</header>
			<p>To become a NEWSTART&reg; Lifestyle Club sponsor, click &ldquo;Get Started&rdquo; below or contact Richard Ramont for more information.</p>
			<p>Phone: 530-422-7993<br>
				Email: <a href="mailto:club@newstart.com"></a><a href="mailto:club@newstart.com">club@newstart.com</a></p>
			<p>$175 sponsorship. $50 annual renewal. FREE to qualifying churches.</p>
			<p><strong>IMPORTANT:</strong> You must sign in as a NEWSTART Lifestyle Club member to apply for sponsorship.</p>
			<p class="button-wrap">
				<a href="{path='sponsors/apply'}" class="super giant green button" {if logged_out}data-reveal-id="signin-modal-sponsor-apply"{/if}><span>Get Started</span></a></p>
			<div class="quotes">
				<blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has made a huge difference in my health outreach.&rdquo;</blockquote>
				<cite>&mdash;Todd D. Armstrong<br><a href="http://www.fhes.net/" target="_blank">Speaker/Director, Family Health &amp; Education Services</a></cite>
				<blockquote>&ldquo;This is the best thing I&rsquo;ve seen in a long, long time.&rdquo;</blockquote>
				<cite>&mdash;James Redfield<br><a href="http://colfaxcares.org" target="_blank">Pastor, Colfax SDA Church</a></cite>
				<blockquote>&ldquo;This is JUST what we have needed to make it easy to network with the people who come to our health programs and to easily get others to join.&rdquo;</blockquote>
				<cite>&mdash;Debbie Cox<br><a href="{path='locations/detail/buskirk-newstart-club'}" target="_blank">Health Ministries Leader, Buskirk SDA Church</a></cite>
				<blockquote>&ldquo;The NEWSTART&reg; Lifestyle Club has added a whole new dimension to our approach in regards to outreach. Utilizing the club will be a permanent addition to our ministry.&rdquo;</blockquote>
				<cite>&mdash;Mike Mudd<br><a href="http://yfj.netasi.org/" target="_blank">Evangelism Coordinator, ASI Youth For Jesus</a></cite>
				<blockquote>&ldquo;I highly recommend this resource.&rdquo;</blockquote>
				<cite>&mdash;Katia Reinert<br><a href="http://www.nadhealthministries.org" target="_blank">Director, NAD Adventist Health Ministries</a></cite>
			</div>
		</div>
	</div>
{if:else}
	{exp:user:stats dynamic="off"}
		{exp:channel:categories show="{member_admin_id}" channel="locations" style="linear"}
		<div class="heading clearfix">
			<h1>{category_name}</h1>
		</div>
		{/exp:channel:categories}
	{/exp:user:stats}
	<div class="grid23 clearfix">
		<div class="main left">
			<ul id="nav-list">
				{if "{sponsor_type}" == "profit"}
					<li><a href="{path='sponsors/add-deal'}">Add a deal <span class="arrow">&rarr;</span></a></li>
					<li><a href="{path='sponsors/edit-deals'}">Edit your deals <span class="arrow">&rarr;</span></a></li>
				{if:else}
					<li><a href="{path='sponsors/add-event'}">Add an event <span class="arrow">&rarr;</span></a></li>
					<li><a href="{path='sponsors/edit-events'}">Edit your events <span class="arrow">&rarr;</span></a></li>
				{/if}
				<li><a href="{path='sponsors/invite'}">Invite members to be part of the club <span class="arrow">&rarr;</span></a></li>
				<li><a href="{path='sponsors/email-members'}">Email your members <span class="arrow">&rarr;</span></a></li>
				<li><a href="{path='sponsors/resources'}">Get resources <span class="arrow">&rarr;</span></a></li>
			</ul>
			<div class="button-wrap">
				<a href="{site_url}/downloads/sponsor-resources/common-files/Quick-Start-Guide.pdf" class="super secondary button"><span>Quick Start Guide &raquo;</span></a>
			</div>
			{exp:user:edit form:name="sponsor-id-switch" form:id="sponsor-id-switch" return="sponsors" password_required="n" dynamic="no"}
				{if member_admin_ids || group_id == 1}
				<label for="member_admin_id"><h5>Change Sponsor</h5></label>
					<input type="hidden" name="member_first_name" value="{member_first_name}" />
					<input type="hidden" name="member_last_name" value="{member_last_name}" />
					<input type="hidden" name="member_zip" value="{member_zip}" />
					<input type="hidden" name="member_terms_conditions" value="on" />
					
					<select name="member_admin_id" class="input" onchange="this.form.submit()">
					{if member_admin_ids}
						{exp:channel:categories category_group="24" channel="locations" style="linear" show="{member_admin_ids}"}
							<option value="{category_id}"{if category_id == member_admin_id} selected="selected"{/if}>{category_name}</option>
						{/exp:channel:categories}
					{if:else}
						{exp:channel:categories category_group="24" channel="locations" style="linear"}
							<option value="{category_id}"{if category_id == member_admin_id} selected="selected"{/if}>{category_name}</option>
						{/exp:channel:categories}
					{/if}
					</select>
					
					{categories}
						{category_selected}<input type="hidden" name="category[]" value="{category_id}" />{/category_selected}
						{category_body}{selected}{/category_body}
					{/categories}
				{/if}
				<div class="button-wrap">
					<a href="{path='sponsors/apply'}" class="super green button"><span>Add Sponsor</span></a>
				</div>
			{/exp:user:edit}
		</div>
		
		{exp:user:stats dynamic="off"}
		<div class="sidebar right">
			<header class="bar">Sponsor Admin</header>
			<p>Below is a list of users who currently can access this account:</p>
			<ul class="bullets">
				{exp:query sql="
					SELECT CONCAT(m_field_id_1, ' ', m_field_id_2) AS full_name, username AS user_email FROM exp_member_data

					JOIN exp_members
					ON exp_member_data.member_id = exp_members.member_id

					WHERE group_id = '6'
					AND (m_field_id_28 = '{member_admin_id}' OR m_field_id_29 LIKE '%{member_admin_id}%')
					ORDER BY full_name ASC
					"}
					<li><span class="has-tip"><span class="tooltip top"><i class="nub"></i>{user_email}</span>{full_name}</span></li>
				{/exp:query}
			</ul>
			<p>To add or remove users from this account, send your request to the address below. Please include each user&rsquo;s email address and reference promo code <strong>{member_admin_id}</strong>. Users must be members of the NEWSTART Lifestyle Club.</p>
			<p>For questions or comments about this service, please call 530-422-7993 or email <a href="mailto:club@newstart.com">club@newstart.com</a></p>
			<div class="button-wrap">
				<a href="{path='site_index'}" class="super red button"><span>Club Home</span></a>
			</div>
		</div>
		{/exp:user:stats}
		
	</div>
{/if}
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min" sponsor-apply="yes"}