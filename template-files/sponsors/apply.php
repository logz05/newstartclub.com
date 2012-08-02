{if logged_out}
	{redirect="sponsors"}
{/if}
{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Application"
}
<div class="heading clearfix">
	<h1>Sponsorship Application</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			{exp:weblog:entries weblog="sponsors" entry_id="479" limit="1"}
				{body}
			{/exp:weblog:entries}
		</div>
<form action="/sponsors/application-submitted" method="post" id="sponsor_register" enctype="multipart/form-data">
<script type="text/javascript">

function getZIP (form) {
		var countrySel = document.getElementById("sponsorCountry");
		var countryValue = countrySel.options[countrySel.selectedIndex].value;
		var client = new XMLHttpRequest();
		client.open("GET", "http://zip.elevenbasetwo.com/v2/" + countryValue + "/" + form.sponsorZipCode.value, true);
		client.onreadystatechange = function() {
			if(client.readyState == 4) {
				//document.write(client.responseText);
				var location_data = JSON.parse(client.responseText);

				form.sponsorCity.value = location_data.city;
				form.sponsorState.value = location_data.state;

				};
		};

		client.send();
}
</script>
          
	<h2>Sponsor Information</h2>
	<noscript>
		<div class="alert-box warning">
			<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
		</div>
	</noscript>
	<table>
		<tr>
			<th scope="row" width="150px"><label for="sponsorName" class="req"><span class="req">* </span>Sponsor Name</label></th>
			<td>
				<input type="text" class="input" name="sponsorName" id="sponsorName" value="" size="25" autocomplete="off" />
				<p class="instructions">Usually the name of your organization or church.</p>
			</td>
		</tr>
		<tr class="hidden">
			<th scope="row"><label for="sponsorCountry" class="req"><span class="req">* </span>Country</label></th>
			<td>
				<select id="sponsorCountry" name="sponsorCountry" class="input">
					<option value="US">United States of America</option>
					<option value="CA">Canada</option>
					<option value="AF">Afghanistan</option>
					<option value="AL">Albania</option>
					<option value="DZ">Algeria</option>
					<option value="AS">American Samoa</option>
					<option value="AD">Andorra</option>
					<option value="AO">Angola</option>
					<option value="AI">Anguilla</option>
					<option value="AQ">Antarctica</option>
					<option value="AG">Antigua &amp; Barbuda</option>
					<option value="AR">Argentina</option>
					<option value="AM">Armenia</option>
					<option value="AW">Aruba</option>
					<option value="AU">Australia</option>
					<option value="AT">Austria</option>
					<option value="AZ">Azerbaijan</option>
					<option value="BS">Bahama</option>
					<option value="BH">Bahrain</option>
					<option value="BD">Bangladesh</option>
					<option value="BB">Barbados</option>
					<option value="BY">Belarus</option>
					<option value="BE">Belgium</option>
					<option value="BZ">Belize</option>
					<option value="BJ">Benin</option>
					<option value="BM">Bermuda</option>
					<option value="BT">Bhutan</option>
					<option value="BO">Bolivia</option>
					<option value="BA">Bosnia and Herzegovina</option>
					<option value="BW">Botswana</option>
					<option value="BV">Bouvet Island</option>
					<option value="BR">Brazil</option>
					<option value="IO">British Indian Ocean Territory</option>
					<option value="VG">British Virgin Islands</option>
					<option value="BN">Brunei Darussalam</option>
					<option value="BG">Bulgaria</option>
					<option value="BF">Burkina Faso</option>
					<option value="BU">Burma (no longer exists)</option>
					<option value="BI">Burundi</option>
					<option value="KH">Cambodia</option>
					<option value="CM">Cameroon</option>
					<option value="CV">Cape Verde</option>
					<option value="KY">Cayman Islands</option>
					<option value="CF">Central African Republic</option>
					<option value="TD">Chad</option>
					<option value="CL">Chile</option>
					<option value="CN">China</option>
					<option value="CX">Christmas Island</option>
					<option value="CC">Cocos (Keeling) Islands</option>
					<option value="CO">Colombia</option>
					<option value="KM">Comoros</option>
					<option value="CG">Congo</option>
					<option value="CK">Cook Iislands</option>
					<option value="CR">Costa Rica</option>
					<option value="CI">Côte D'ivoire (Ivory Coast)</option>
					<option value="HR">Croatia</option>
					<option value="CU">Cuba</option>
					<option value="CY">Cyprus</option>
					<option value="CZ">Czech Republic</option>
					<option value="CS">Czechoslovakia (no longer exists)</option>
					<option value="YD">Democratic Yemen (no longer exists)</option>
					<option value="DK">Denmark</option>
					<option value="DJ">Djibouti</option>
					<option value="DM">Dominica</option>
					<option value="DO">Dominican Republic</option>
					<option value="TP">East Timor</option>
					<option value="EC">Ecuador</option>
					<option value="EG">Egypt</option>
					<option value="SV">El Salvador</option>
					<option value="GQ">Equatorial Guinea</option>
					<option value="ER">Eritrea</option>
					<option value="EE">Estonia</option>
					<option value="ET">Ethiopia</option>
					<option value="FK">Falkland Islands (Malvinas)</option>
					<option value="FO">Faroe Islands</option>
					<option value="FJ">Fiji</option>
					<option value="FI">Finland</option>
					<option value="FR">France</option>
					<option value="FX">France, Metropolitan</option>
					<option value="GF">French Guiana</option>
					<option value="PF">French Polynesia</option>
					<option value="TF">French Southern Territories</option>
					<option value="GA">Gabon</option>
					<option value="GM">Gambia</option>
					<option value="GE">Georgia</option>
					<option value="DD">German Democratic Republic (no longer exists)</option>
					<option value="DE">Germany</option>
					<option value="GH">Ghana</option>
					<option value="GI">Gibraltar</option>
					<option value="GR">Greece</option>
					<option value="GL">Greenland</option>
					<option value="GD">Grenada</option>
					<option value="GP">Guadeloupe</option>
					<option value="GU">Guam</option>
					<option value="GT">Guatemala</option>
					<option value="GN">Guinea</option>
					<option value="GW">Guinea-Bissau</option>
					<option value="GY">Guyana</option>
					<option value="HT">Haiti</option>
					<option value="HM">Heard &amp; McDonald Islands</option>
					<option value="HN">Honduras</option>
					<option value="HK">Hong Kong</option>
					<option value="HU">Hungary</option>
					<option value="IS">Iceland</option>
					<option value="IN">India</option>
					<option value="ID">Indonesia</option>
					<option value="IQ">Iraq</option>
					<option value="IE">Ireland</option>
					<option value="IR">Islamic Republic of Iran</option>
					<option value="IL">Israel</option>
					<option value="IT">Italy</option>
					<option value="JM">Jamaica</option>
					<option value="JP">Japan</option>
					<option value="JO">Jordan</option>
					<option value="KZ">Kazakhstan</option>
					<option value="KE">Kenya</option>
					<option value="KI">Kiribati</option>
					<option value="KP">Korea, Democratic People's Republic of</option>
					<option value="KR">Korea, Republic of</option>
					<option value="KW">Kuwait</option>
					<option value="KG">Kyrgyzstan</option>
					<option value="LA">Lao People's Democratic Republic</option>
					<option value="LV">Latvia</option>
					<option value="LB">Lebanon</option>
					<option value="LS">Lesotho</option>
					<option value="LR">Liberia</option>
					<option value="LY">Libyan Arab Jamahiriya</option>
					<option value="LI">Liechtenstein</option>
					<option value="LT">Lithuania</option>
					<option value="LU">Luxembourg</option>
					<option value="MO">Macau</option>
					<option value="MG">Madagascar</option>
					<option value="MW">Malawi</option>
					<option value="MY">Malaysia</option>
					<option value="MV">Maldives</option>
					<option value="ML">Mali</option>
					<option value="MT">Malta</option>
					<option value="MH">Marshall Islands</option>
					<option value="MQ">Martinique</option>
					<option value="MR">Mauritania</option>
					<option value="MU">Mauritius</option>
					<option value="YT">Mayotte</option>
					<option value="MX">Mexico</option>
					<option value="FM">Micronesia</option>
					<option value="MD">Moldova, Republic of</option>
					<option value="MC">Monaco</option>
					<option value="MN">Mongolia</option>
					<option value="MS">Monserrat</option>
					<option value="MA">Morocco</option>
					<option value="MZ">Mozambique</option>
					<option value="MM">Myanmar</option>
					<option value="NA">Nambia</option>
					<option value="NR">Nauru</option>
					<option value="NP">Nepal</option>
					<option value="NL">Netherlands</option>
					<option value="AN">Netherlands Antilles</option>
					<option value="NT">Neutral Zone (no longer exists)</option>
					<option value="NC">New Caledonia</option>
					<option value="NZ">New Zealand</option>
					<option value="NI">Nicaragua</option>
					<option value="NE">Niger</option>
					<option value="NG">Nigeria</option>
					<option value="NU">Niue</option>
					<option value="NF">Norfolk Island</option>
					<option value="MP">Northern Mariana Islands</option>
					<option value="NO">Norway</option>
					<option value="OM">Oman</option>
					<option value="PK">Pakistan</option>
					<option value="PW">Palau</option>
					<option value="PA">Panama</option>
					<option value="PG">Papua New Guinea</option>
					<option value="PY">Paraguay</option>
					<option value="PE">Peru</option>
					<option value="PH">Philippines</option>
					<option value="PN">Pitcairn</option>
					<option value="PL">Poland</option>
					<option value="PT">Portugal</option>
					<option value="PR">Puerto Rico</option>
					<option value="QA">Qatar</option>
					<option value="RE">Réunion</option>
					<option value="RO">Romania</option>
					<option value="RU">Russian Federation</option>
					<option value="RW">Rwanda</option>
					<option value="LC">Saint Lucia</option>
					<option value="WS">Samoa</option>
					<option value="SM">San Marino</option>
					<option value="ST">Sao Tome &amp; Principe</option>
					<option value="SA">Saudi Arabia</option>
					<option value="SN">Senegal</option>
					<option value="SC">Seychelles</option>
					<option value="SL">Sierra Leone</option>
					<option value="SG">Singapore</option>
					<option value="SK">Slovakia</option>
					<option value="SI">Slovenia</option>
					<option value="SB">Solomon Islands</option>
					<option value="SO">Somalia</option>
					<option value="ZA">South Africa</option>
					<option value="GS">South Georgia and the South Sandwich Islands</option>
					<option value="ES">Spain</option>
					<option value="LK">Sri Lanka</option>
					<option value="SH">St. Helena</option>
					<option value="KN">St. Kitts and Nevis</option>
					<option value="PM">St. Pierre &amp; Miquelon</option>
					<option value="VC">St. Vincent &amp; the Grenadines</option>
					<option value="SD">Sudan</option>
					<option value="SR">Suriname</option>
					<option value="SJ">Svalbard &amp; Jan Mayen Islands</option>
					<option value="SZ">Swaziland</option>
					<option value="SE">Sweden</option>
					<option value="CH">Switzerland</option>
					<option value="SY">Syrian Arab Republic</option>
					<option value="TW">Taiwan, Province of China</option>
					<option value="TJ">Tajikistan</option>
					<option value="TZ">Tanzania, United Republic of</option>
					<option value="TH">Thailand</option>
					<option value="TG">Togo</option>
					<option value="TK">Tokelau</option>
					<option value="TO">Tonga</option>
					<option value="TT">Trinidad &amp; Tobago</option>
					<option value="TN">Tunisia</option>
					<option value="TR">Turkey</option>
					<option value="TM">Turkmenistan</option>
					<option value="TC">Turks &amp; Caicos Islands</option>
					<option value="TV">Tuvalu</option>
					<option value="UG">Uganda</option>
					<option value="UA">Ukraine</option>
					<option value="SU">Union of Soviet Socialist Republics (no longer exi</option>
					<option value="AE">United Arab Emirates</option>
					<option value="GB">United Kingdom (Great Britain)</option>
					<option value="UM">United States Minor Outlying Islands</option>
					<option value="US">United States of America</option>
					<option value="VI">United States Virgin Islands</option>
					<option value="ZZ">Unknown or unspecified country</option>
					<option value="UY">Uruguay</option>
					<option value="UZ">Uzbekistan</option>
					<option value="VU">Vanuatu</option>
					<option value="VA">Vatican City State (Holy See)</option>
					<option value="VE">Venezuela</option>
					<option value="VN">Viet Nam</option>
					<option value="WF">Wallis &amp; Futuna Islands</option>
					<option value="EH">Western Sahara</option>
					<option value="YE">Yemen</option>
					<option value="YU">Yugoslavia</option>
					<option value="ZR">Zaire</option>
					<option value="ZM">Zambia</option>
					<option value="ZW">Zimbabwe</option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="sponsorAddress" class="req"><span class="req">* </span>Physical Address</label></th>
			<td><input type="text" class="input" id="sponsorAddress" name="sponsorAddress" value="" size="32" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="sponsorZipCode" class="req"><span class="req">* </span>Zip Code</label></th>
			<td>
				<input type="text" class="input" id="sponsorZipCode" name="sponsorZipCode" value="" size="7" autocomplete="off" onblur="getZIP(this.form)" />
				<input type="hidden" name="sponsorCountry" value="United States" size="32" autocomplete="off" />
				<p class="instructions">U.S. ZIP codes only please.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="sponsorCity" class="req"><span class="req">* </span>City</label></th>
			<td>
				<input type="text" class="input" id="sponsorCity" name="sponsorCity" value="" size="20" autocomplete="off" />
			</td>
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
			<th scope="row"><label for="sponsorDescription" class="req"><span class="req">* </span>Description</label></th>
			<td>
				<textarea class="input" id="sponsorDescription" name="sponsorDescription" rows="5" cols="32" autocomplete="off"></textarea>
				<p class="instructions">Describe your organization and what health related events, products or services you offer. (50 words or less)</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="sponsorNeedHelp" class="req"><span class="req">* </span>Need Help?</label></th>
			<td><br>
				<label class="need-help">
					<input type="radio" class="input" name="sponsorNeedHelp" value="Yes" />
					<span>Yes</span>
				</label><br>
				<label class="need-help">
					<input type="radio" class="input" name="sponsorNeedHelp" value="No" />
					<span>No</span>
				</label>
				<p class="instructions"><a href="http://newstartglobal.com" target="_blank">NEWSTART&reg; Global</a> medical missionary teams are available to help you get started with your health outreach.</p>
			</td>
		</tr>
	</table>

	<h2>Contact Person</h2>

	<table>
		{exp:user:stats}
		<tr>
			<th scope="row" width="150px"><label for="contactName" class="req"><span class="req">* </span>Contact Name</label></th>
			<td><input type="text" class="input" name="contactName" id="contactName" value="{firstName} {lastName}" size="25" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="contactAddress"><span class="req">* </span>Mailing Address</label></th>
			<td><input type="text" class="input" id="contactAddress" name="contactAddress" value="{address}" size="32" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="contactCity"><span class="req">* </span>City</label></th>
			<td><input type="text" class="input" id="contactCity" name="contactCity" value="{city}" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="contactState"><span class="req">* </span>State</label></th>
			<td>
				<select name="contactState" class="input"> 
					{select_state} 
					<option value="{value}" {selected}>{value}</option> 
					{/select_state}
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="contactZipCode" class="req"><span class="req">* </span>Zip Code</label></th>
			<td><input type="text" class="input" id="contactZipCode" name="contactZipCode" value="{zipCode}" size="7" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="contactPhone"><span class="req">* </span>Phone</label></th>
			<td><input type="tel" class="input" id="contactPhone" name="contactPhone" value="{phone}" size="15" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="contactEmail" class="req"><span class="req">* </span>Email</label></th>
			<td>
				<input type="email" class="input" id="contactEmail" name="contactEmail" value="{email}" size="32" autocomplete="off" />
				<p class="instructions">This email address will be listed in the sidebar of your location page.</p>
				<input type="hidden" class="hidden" id="applicantName" name="applicantName" value="{firstName} {lastName}" size="32" />
				<input type="hidden" class="hidden" id="applicantUsername" name="applicantUsername" value="{email}" size="32" />
			</td>
		</tr>
		{/exp:user:stats}
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
		<header class="bar">Sponsorship Application</header>
		{exp:weblog:entries weblog="sponsors" entry_id="480" limit="1"}
			{body}
		{/exp:weblog:entries}
	</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|sponsor-register"}