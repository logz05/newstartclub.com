		<div class="heading clearafter">
			<h1>{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:weblog:categories}{/exp:user:stats}</h1>
		</div>
		<div class="grid23 clearafter">
			<div class="left">
				<h2><a href="/sponsors/events/add/">Add an event <span class="arrow">&rarr;</span></a></h2>
				<h2><a href="/sponsors/events/edit/">Edit your events <span class="arrow">&rarr;</span></a></h2>
				<h2><a href="/sponsors/invite-members/">Invite members to be part of the club <span class="arrow">&rarr;</span></a></h2>
				<h2><a href="/sponsors/email-members/">Email your members <span class="arrow">&rarr;</span></a></h2>
				<h2><a href="/sponsors/resources/">Get resources <span class="arrow">&rarr;</span></a></h2>
				<p class="button-wrap">
					<a href="/downloads/sponsor-resources/common-files/Quick-Start-Guide.pdf" class="super secondary button"><span>Quick Start Guide &raquo;</span></a>
				</p>
				{if group_id == "1"}
				<h2>Super Admin</h2>
				
					<label for="sponsor_number">Change Sponsor</label>
					
					{exp:user:edit form:name="sponsor_id_switch" form:id="sponsor_id_switch" return="sponsors" password_required="n" dynamic="off"}
						<input type="hidden" name="firstName" value="{firstName}" />
						<input type="hidden" name="lastName" value="{lastName}" />
						<input type="hidden" name="zipCode" value="{zipCode}" />
						<select name="sponsor_number" class="input">
							{exp:weblog:categories category_group="24" weblog="locations" style="linear"}
								<option value="{category_id}"{if category_id == sponsor_number} selected="selected"{/if}>{category_name}</option>
							{/exp:weblog:categories}
						</select>
						<button type="submit" class="super green button"><span>Go</span></button>
						
						{categories}
							{category_selected}<input type="hidden" name="category[]" value="{category_id}" />{/category_selected}
							{category_body}{selected}{/category_body}
						{/categories}
						
					{/exp:user:edit}
				
				{/if}
			</div>
			<div class="sidebar right">
				<div class="bar">Admin Home</div>
				<p>For questions or comments about this service, please call 530-422-7993 or email <a href="mailto:club@newstart.com">club@newstart.com</a></p>
				<p class="button-wrap">
					<a href="/" class="super red button"><span>Club Home</span></a>
				</p>
			</div><!--/.right-->
		</div>	