{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"}
{assign_variable:channel="members"}
{assign_variable:section="Update Profile"}
<div class="body">
	<div class="heading clearafter">
		<h1>{section}</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="left">
	
			<h2>To better serve your health needs, please take a moment to indicate the areas you're interested in.</h2>
			
		{exp:user:edit return="{path='my_health'}" form:class="clearfix"}
			<h1>Check the subjects you are interested in</h1>
			<div class="grid12-23 clearafter">
				<div class="left">
					{categories group_id="14" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
					{category_body}<input type="checkbox" name="category[]" value="{category_id}" {selected} /><span>{category_description}</span><br />
					{/category_body}{/categories}
				</div>
				<div class="right">
					<label>Emotional and spiritual health:</label><br />
					{categories group_id="15" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
					{category_body}<input type="checkbox" name="category[]" value="{category_id}" {selected} /><span>{category_description}</span><br />
					{/category_body}{/categories}
				</div>
			</div>
			<div class="category3">
				<label>I would like information on:</label><br />
				{categories group_id="16" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
				{category_body}<input type="checkbox" name="category[]" value="{category_id}" {selected} /><span>{category_description}</span><br />
				{/category_body}{/categories}
			</div>
			<input type="text" class="hide" name="firstName" id="firstName" value="{firstName}" size="25" autocomplete="off" />
			<input type="text" pattern="[0-9]*" class="hide" id="zipCode" name="zipCode" value="{zipCode}" size="7" autocomplete="off" />
		  
			<p><button type="submit" class="super green button"><span>Save</span></button></p>
			{/exp:user:edit}
		</div><!--/.left-->
		<div class="sidebar right">
			<div class="bar">{section}</div>
			<p>To view or change your completed profile at anytime as well as update your password, click on &ldquo;Settings&rdquo; at the top of the page.</p>
			<div class="pic"></div>
		</div>
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}