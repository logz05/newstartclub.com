{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"
	header=""
	sponsor_admin="yes"}
{assign_variable:channel="sponsors"}
{assign_variable:section="Sponsorship Application"}
<div class="body">
	<div class="heading clearafter">
		<h1>{section}</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="left">
			{exp:weblog:entries weblog="{channel}" entry_id="479" limit="1"}
				{body}
			{/exp:weblog:entries}
	<form action="{path='{channel}/application-submitted'}" method="post" id="sponsor_register" enctype="multipart/form-data">
	
		<h1>Sponsor Information</h1>
		<noscript>
			<div class="no-script">
				<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
			</div>
		</noscript>
		<table>
			<tr>
				<th scope="row" width="150px"><label for="sponsorName" class="req"><span class="req">* </span>Sponsor Name</label></th>
				<td><input type="text" class="input" name="sponsorName" id="sponsorName" value="" size="25" autocomplete="off" /></td>
			</tr>
			<tr class="hide">
				<th scope="row"><label for="sponsorLogo">Sponsor Logo</label><div>Accepted file types: .jpg, .bmp, .tiff, .eps, .png</div></th>
				<td><input type="file" name="sponsorLogo" id="sponsorLogo" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorAddress" class="req"><span class="req">* </span>Physical Address</label></th>
				<td><input type="text" class="input" id="sponsorAddress" name="sponsorAddress" value="" size="32" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorCity" class="req"><span class="req">* </span>City</label></th>
				<td><input type="text" class="input" id="sponsorCity" name="sponsorCity" value="" size="20" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorState" class="req"><span class="req">* </span>State</label></th>
				<td>
					<select name="sponsorState" class="input"> 
						<option value="--">--</option>
						<option value="Alabama">Alabama</option>
						<option value="Alaska">Alaska</option>
						<option value="Arizona">Arizona</option>
						<option value="Arkansas">Arkansas</option>
						<option value="California">California</option>
						<option value="Colorado">Colorado</option>
						<option value="Connecticut">Connecticut</option>
						<option value="Delaware">Delaware</option>
						<option value="District of Columbia">District of Columbia</option>
						<option value="Florida">Florida</option>
						<option value="Georgia">Georgia</option>
						<option value="Guam">Guam</option>
						<option value="Hawaii">Hawaii</option>
						<option value="Idaho">Idaho</option>
						<option value="Illinois">Illinois</option>
						<option value="Indiana">Indiana</option>
						<option value="Iowa">Iowa</option>
						<option value="Kansas">Kansas</option>
						<option value="Kentucky">Kentucky</option>
						<option value="Louisiana">Louisiana</option>
						<option value="Maine">Maine</option>
						<option value="Maryland">Maryland</option>
						<option value="Massachusetts">Massachusetts</option>
						<option value="Michigan">Michigan</option>
						<option value="Minnesota">Minnesota</option>
						<option value="Mississippi">Mississippi</option>
						<option value="Missouri">Missouri</option>
						<option value="Montana">Montana</option>
						<option value="Nebraska">Nebraska</option>
						<option value="Nevada">Nevada</option>
						<option value="New Hampshire">New Hampshire</option>
						<option value="New Jersey">New Jersey</option>
						<option value="New Mexico">New Mexico</option>
						<option value="New York">New York</option>
						<option value="North Carolina">North Carolina</option>
						<option value="North Dakota">North Dakota</option>
						<option value="Ohio">Ohio</option>
						<option value="Oklahoma">Oklahoma</option>
						<option value="Oregon">Oregon</option>
						<option value="Pennsylvania">Pennsylvania</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Rhode Island">Rhode Island</option>
						<option value="South Carolina">South Carolina</option>
						<option value="South Dakota">South Dakota</option>
						<option value="Tennessee">Tennessee</option>
						<option value="Texas">Texas</option>
						<option value="Utah">Utah</option>
						<option value="Vermont">Vermont</option>
						<option value="Virginia">Virginia</option>
						<option value="Virgin Islands">Virgin Islands</option>
						<option value="Washington">Washington</option>
						<option value="West Virginia">West Virginia</option>
						<option value="Wisconsin">Wisconsin</option>
						<option value="Wyoming">Wyoming</option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorZipCode" class="req"><span class="req">* </span>Zip Code</label></th>
				<td><input type="text" class="input" id="sponsorZipCode" name="sponsorZipCode" value="" size="7" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorCountry">Country</label></th>
				<td><div class="input readonly">United States</div><input type="hidden" name="sponsorCountry" value="United States" size="32" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorPhone" class="req"><span class="req">* </span>Phone</label></th>
				<td><input type="tel" class="input" id="sponsorPhone" name="sponsorPhone" value="" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorEmail" class="req"><span class="req">* </span>Email</label></th>
				<td><input type="email" class="input" id="sponsorEmail" name="sponsorEmail" value="" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorFax">Fax</label></th>
				<td><input type="text" class="input" id="sponsorFax" name="sponsorFax" value="" size="15" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorWebsite">Website</label></th>
				<td><input type="text" class="input" id="sponsorWebsite" name="sponsorWebsite" value="" size="24" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorRegAff" class="req"><span class="req">* </span>Religious Affiliation</label></th>
				<td><input type="text" class="input" id="sponsorRegAff" name="sponsorRegAff" value="" size="32" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorHealthEvents" class="req"><span class="req">* </span>Health Events</label></th>
				<td>
					<textarea class="input" id="sponsorHealthEvents" name="sponsorHealthEvents" rows="5" cols="32" autocomplete="off"></textarea>
					<p class="instructions">Please list the type of community health events your organization would like to sponsor.</p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="sponsorNeedHelp" class="req"><span class="req">* </span>Need Help?</label></th>
				<td>
					<textarea class="input" id="sponsorNeedHelp" name="sponsorNeedHelp" rows="5" cols="32" autocomplete="off"></textarea>
					<p class="instructions"><a href="http://newstartglobal.com" target="_blank">NEWSTART&reg; Global</a> medical missionary teams are available to help you get started with your health outreach. Please indicate the dates that work best for your organization.</p>
				</td>
			</tr>
		</table>

		<h1>Contact Person</h1>

		<table>
			<tr>
				<th scope="row" width="150px"><label for="contactName" class="req"><span class="req">* </span>Contact Name</label></th>
				<td><input type="text" class="input" name="contactName" id="contactName" value="" size="25" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="contactAddress"><span class="req">* </span>Mailing Address</label></th>
				<td><input type="text" class="input" id="contactAddress" name="contactAddress" value="" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="contactCity"><span class="req">* </span>City</label></th>
				<td><input type="text" class="input" id="contactCity" name="contactCity" value="" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="contactState"><span class="req">* </span>State</label></th>
				<td>
					<select name="contactState" class="input"> 
						<option value="">--</option>
						<option value="Alabama">Alabama</option>
						<option value="Alaska">Alaska</option>
						<option value="Arizona">Arizona</option>
						<option value="Arkansas">Arkansas</option>
						<option value="California">California</option>
						<option value="Colorado">Colorado</option>
						<option value="Connecticut">Connecticut</option>
						<option value="Delaware">Delaware</option>
						<option value="District of Columbia">District of Columbia</option>
						<option value="Florida">Florida</option>
						<option value="Georgia">Georgia</option>
						<option value="Guam">Guam</option>
						<option value="Hawaii">Hawaii</option>
						<option value="Idaho">Idaho</option>
						<option value="Illinois">Illinois</option>
						<option value="Indiana">Indiana</option>
						<option value="Iowa">Iowa</option>
						<option value="Kansas">Kansas</option>
						<option value="Kentucky">Kentucky</option>
						<option value="Louisiana">Louisiana</option>
						<option value="Maine">Maine</option>
						<option value="Maryland">Maryland</option>
						<option value="Massachusetts">Massachusetts</option>
						<option value="Michigan">Michigan</option>
						<option value="Minnesota">Minnesota</option>
						<option value="Mississippi">Mississippi</option>
						<option value="Missouri">Missouri</option>
						<option value="Montana">Montana</option>
						<option value="Nebraska">Nebraska</option>
						<option value="Nevada">Nevada</option>
						<option value="New Hampshire">New Hampshire</option>
						<option value="New Jersey">New Jersey</option>
						<option value="New Mexico">New Mexico</option>
						<option value="New York">New York</option>
						<option value="North Carolina">North Carolina</option>
						<option value="North Dakota">North Dakota</option>
						<option value="Ohio">Ohio</option>
						<option value="Oklahoma">Oklahoma</option>
						<option value="Oregon">Oregon</option>
						<option value="Pennsylvania">Pennsylvania</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Rhode Island">Rhode Island</option>
						<option value="South Carolina">South Carolina</option>
						<option value="South Dakota">South Dakota</option>
						<option value="Tennessee">Tennessee</option>
						<option value="Texas">Texas</option>
						<option value="Utah">Utah</option>
						<option value="Vermont">Vermont</option>
						<option value="Virginia">Virginia</option>
						<option value="Virgin Islands">Virgin Islands</option>
						<option value="Washington">Washington</option>
						<option value="West Virginia">West Virginia</option>
						<option value="Wisconsin">Wisconsin</option>
						<option value="Wyoming">Wyoming</option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="contactZipCode" class="req"><span class="req">* </span>Zip Code</label></th>
				<td><input type="text" class="input" id="contactZipCode" name="contactZipCode" value="" size="7" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="contactCountry" class="req"><span class="req">* </span>Country</label></th>
				<td><input type="text" class="input" id="contactCountry" name="contactCountry" value="" size="32" autocomplete="off" /></td>
			</tr><tr>
				<th scope="row"><label for="contactPhone"><span class="req">* </span>Phone</label></th>
				<td><input type="tel" class="input" id="contactPhone" name="contactPhone" value="" size="15" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="contactEmail" class="req"><span class="req">* </span>Email</label></th>
				<td><input type="email" class="input" id="contactEmail" name="contactEmail" value="" size="32" autocomplete="off" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="contactPassword" class="req"><span class="req">* </span>Desired Password</label></th>
				<td>
					<input type="password" class="input" id="contactPassword" name="contactPassword" value="" size="20" autocomplete="off" />
					<p class="instructions">Please use 6 or more characters. This is used so that we can create your account if approved. You may change it later.</p>
				</td>
			</tr>
			<tr>
				<th scope="row">&nbsp;</th>
				<td>
					<div class="button-wrap">
						<button type="submit" class="super green button"><span>Submit</span></button>
						<button type="reset" class="super secondary button"><span>Reset</span></button>
					</div>
				</td>
			</tr>
		</table>
	</form>
		</div>
		<div class="sidebar right">
			<div class="bar">Sponsorship Application</div>
			{exp:weblog:entries weblog="{channel}" entry_id="480" limit="1"}
				{body}
			{/exp:weblog:entries}
		</div>
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|sponsor-register"}