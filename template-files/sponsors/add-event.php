{embed="embeds/_doc-top" 
	class="sponsors"
	title="Create a new event"
	add="datepicker/datepicker"
}
<div class="heading clearfix">
	<h1>Create a new event</h1>
</div>
<div class="grid23 clearfix">
	<div class="main events left">
	{sn_no-script}
	<h2>Event Information</h2>

{exp:safecracker channel="events" return="sponsors/edit-events"}
	<table>
		<tr>
			<th scope="row"><label for="title" class="req">Title</label></th>
			<td><input type="text" class="input" name="title" id="title" value="" size="36" maxlength="100" onkeyup="liveUrlTitle();" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="entry_datepicker" class="req">From</label></th>
			<td>
				<table>
					<tr>
						<td>
							<input type="text" class="datepicker" id="entry_datepicker" readonly="readonly" value="{current_time format='%m/%d/%Y'}" size="14" title="Date. Expected format is month number, day number, year number."/>
							<input type="text" dir="ltr" id="entry_date" class="input hidden" name="entry_date" value="{current_time format='%Y-%m-%d 12:00 AM'}" maxlength="128" size="25" />
						</td>
						<td>
							<div class="select-input">{field:event_start_time}</div>
						</td>
					</tr>
				</table>
				
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="expiration_datepicker" class="req">To</label></th>
			<td>
				<table>
					<tr>
						<td>
							<input type="text" class="datepicker" id="expiration_datepicker" readonly="readonly" value="" size="14" title="Date. Expected format is month number, day number, year number."/>
							<input type="text" dir="ltr" id="expiration_date" class="input hidden" name="expiration_date" value="" maxlength="128" size="25" />
						</td>
						<td>
							<div class="select-input">{field:event_end_time}</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		{exp:user:stats dynamic="off"}
		{exp:channel:entries channel="locations" limit="1" category="{member_sponsor_id}"}
		<tr>
			<th scope="row"><label for="event_location_name" class="req">Place</label></th>
			<td>
				<input type="text" dir="ltr" id="event_location_name" class="input" name="event_location_name" value="{title}" maxlength="256" size="40" />
<!-- 				<p class="instructions">Name of the event location.</p> -->
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_address" class="req">Address</label></th>
			<td>
				<textarea dir="ltr" id="event_address" class="input" name="event_address" rows="2">{location_address}</textarea>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_city" class="req">City</label></th>
			<td><input type="text" dir="ltr" id="event_city" class="input" name="event_city" value="{location_city}" maxlength="256" size="25" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="event_state" class="req">State</label></th>
			<td><input type="text" dir="ltr" id="event_state" class="input" name="event_state" value="{location_state}" maxlength="256" size="10" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="event_zip" class="req">Zip Code</label></th>
			<td><input type="text" dir="ltr" id="event_zip" class="input" name="event_zip" value="{location_zip}" maxlength="9" size="10" /><br></td>
		</tr>
		{if member_id==1}
		<tr>
			<th scope="row"><label for="event_zip" class="req">Country</label></th>
			<td>
				<select name="event_country" id="event_country" class="input" autocorrect="off" autocomplete="off">
					<option value="US"{if location_country == 'US'} selected{/if}>United States</option>
					<option value="AF"{if location_country == 'AF'} selected{/if}>Afghanistan</option>
					<option value="AX"{if location_country == 'AX'} selected{/if}>Åland Islands</option>
					<option value="AL"{if location_country == 'AL'} selected{/if}>Albania</option>
					<option value="DZ"{if location_country == 'DZ'} selected{/if}>Algeria</option>
					<option value="AS"{if location_country == 'AS'} selected{/if}>American Samoa</option>
					<option value="AD"{if location_country == 'AD'} selected{/if}>Andorra</option>
					<option value="AO"{if location_country == 'AO'} selected{/if}>Angola</option>
					<option value="AI"{if location_country == 'AI'} selected{/if}>Anguilla</option>
					<option value="AQ"{if location_country == 'AQ'} selected{/if}>Antarctica</option>
					<option value="AG"{if location_country == 'AG'} selected{/if}>Antigua And Barbuda</option>
					<option value="AR"{if location_country == 'AR'} selected{/if}>Argentina</option>
					<option value="AM"{if location_country == 'AM'} selected{/if}>Armenia</option>
					<option value="AW"{if location_country == 'AW'} selected{/if}>Aruba</option>
					<option value="AU"{if location_country == 'AU'} selected{/if}>Australia</option>
					<option value="AT"{if location_country == 'AT'} selected{/if}>Austria</option>
					<option value="AZ"{if location_country == 'AZ'} selected{/if}>Azerbaijan</option>
					<option value="BS"{if location_country == 'BS'} selected{/if}>Bahamas</option>
					<option value="BH"{if location_country == 'BH'} selected{/if}>Bahrain</option>
					<option value="BD"{if location_country == 'BD'} selected{/if}>Bangladesh</option>
					<option value="BB"{if location_country == 'BB'} selected{/if}>Barbados</option>
					<option value="BY"{if location_country == 'BY'} selected{/if}>Belarus</option>
					<option value="BE"{if location_country == 'BE'} selected{/if}>Belgium</option>
					<option value="BZ"{if location_country == 'BZ'} selected{/if}>Belize</option>
					<option value="BJ"{if location_country == 'BJ'} selected{/if}>Benin</option>
					<option value="BM"{if location_country == 'BM'} selected{/if}>Bermuda</option>
					<option value="BT"{if location_country == 'BT'} selected{/if}>Bhutan</option>
					<option value="BO"{if location_country == 'BO'} selected{/if}>Bolivia</option>
					<option value="BQ"{if location_country == 'BQ'} selected{/if}>Bonaire, Sint Eustatius and Saba</option>
					<option value="BA"{if location_country == 'BA'} selected{/if}>Bosnia and Herzegovina</option>
					<option value="BW"{if location_country == 'BW'} selected{/if}>Botswana</option>
					<option value="BV"{if location_country == 'BV'} selected{/if}>Bouvet Island</option>
					<option value="BR"{if location_country == 'BR'} selected{/if}>Brazil</option>
					<option value="IO"{if location_country == 'IO'} selected{/if}>British Indian Ocean Territory</option>
					<option value="BN"{if location_country == 'BN'} selected{/if}>Brunei Darussalam</option>
					<option value="BG"{if location_country == 'BG'} selected{/if}>Bulgaria</option>
					<option value="BF"{if location_country == 'BF'} selected{/if}>Burkina Faso</option>
					<option value="BI"{if location_country == 'BI'} selected{/if}>Burundi</option>
					<option value="KH"{if location_country == 'KH'} selected{/if}>Cambodia</option>
					<option value="CM"{if location_country == 'CM'} selected{/if}>Cameroon</option>
					<option value="CA"{if location_country == 'CA'} selected{/if}>Canada</option>
					<option value="CV"{if location_country == 'CV'} selected{/if}>Cape Verde</option>
					<option value="KY"{if location_country == 'KY'} selected{/if}>Cayman Islands</option>
					<option value="CF"{if location_country == 'CF'} selected{/if}>Central African Republic</option>
					<option value="TD"{if location_country == 'TD'} selected{/if}>Chad</option>
					<option value="CL"{if location_country == 'CL'} selected{/if}>Chile</option>
					<option value="CN"{if location_country == 'CN'} selected{/if}>China</option>
					<option value="CX"{if location_country == 'CX'} selected{/if}>Christmas Island</option>
					<option value="CC"{if location_country == 'CC'} selected{/if}>Cocos (Keeling) Islands</option>
					<option value="CO"{if location_country == 'CO'} selected{/if}>Colombia</option>
					<option value="KM"{if location_country == 'KM'} selected{/if}>Comoros</option>
					<option value="CG"{if location_country == 'CG'} selected{/if}>Congo</option>
					<option value="CD"{if location_country == 'CD'} selected{/if}>Congo, the Democratic Republic of the</option>
					<option value="CK"{if location_country == 'CK'} selected{/if}>Cook Islands</option>
					<option value="CR"{if location_country == 'CR'} selected{/if}>Costa Rica</option>
					<option value="CI"{if location_country == 'CI'} selected{/if}>Côte d'Ivoire</option>
					<option value="HR"{if location_country == 'HR'} selected{/if}>Croatia</option>
					<option value="CU"{if location_country == 'CU'} selected{/if}>Cuba</option>
					<option value="CW"{if location_country == 'CW'} selected{/if}>Curaçao</option>
					<option value="CY"{if location_country == 'CY'} selected{/if}>Cyprus</option>
					<option value="CZ"{if location_country == 'CZ'} selected{/if}>Czech Republic</option>
					<option value="DK"{if location_country == 'DK'} selected{/if}>Denmark</option>
					<option value="DJ"{if location_country == 'DJ'} selected{/if}>Djibouti</option>
					<option value="DM"{if location_country == 'DM'} selected{/if}>Dominica</option>
					<option value="DO"{if location_country == 'DO'} selected{/if}>Dominican Republic</option>
					<option value="EC"{if location_country == 'EC'} selected{/if}>Ecuador</option>
					<option value="EG"{if location_country == 'EG'} selected{/if}>Egypt</option>
					<option value="SV"{if location_country == 'SV'} selected{/if}>El Salvador</option>
					<option value="GQ"{if location_country == 'GQ'} selected{/if}>Equatorial Guinea</option>
					<option value="ER"{if location_country == 'ER'} selected{/if}>Eritrea</option>
					<option value="EE"{if location_country == 'EE'} selected{/if}>Estonia</option>
					<option value="ET"{if location_country == 'ET'} selected{/if}>Ethiopia</option>
					<option value="FK"{if location_country == 'FK'} selected{/if}>Falkland Islands (Malvinas)</option>
					<option value="FO"{if location_country == 'FO'} selected{/if}>Faroe Islands</option>
					<option value="FJ"{if location_country == 'FJ'} selected{/if}>Fiji</option>
					<option value="FI"{if location_country == 'FI'} selected{/if}>Finland</option>
					<option value="FR"{if location_country == 'FR'} selected{/if}>France</option>
					<option value="GF"{if location_country == 'GF'} selected{/if}>French Guiana</option>
					<option value="PF"{if location_country == 'PF'} selected{/if}>French Polynesia</option>
					<option value="TF"{if location_country == 'TF'} selected{/if}>French Southern Territories</option>
					<option value="GA"{if location_country == 'GA'} selected{/if}>Gabon</option>
					<option value="GM"{if location_country == 'GM'} selected{/if}>Gambia</option>
					<option value="GE"{if location_country == 'GE'} selected{/if}>Georgia</option>
					<option value="DE"{if location_country == 'DE'} selected{/if}>Germany</option>
					<option value="GH"{if location_country == 'GH'} selected{/if}>Ghana</option>
					<option value="GI"{if location_country == 'GI'} selected{/if}>Gibraltar</option>
					<option value="GR"{if location_country == 'GR'} selected{/if}>Greece</option>
					<option value="GL"{if location_country == 'GL'} selected{/if}>Greenland</option>
					<option value="GD"{if location_country == 'GD'} selected{/if}>Grenada</option>
					<option value="GP"{if location_country == 'GP'} selected{/if}>Guadeloupe</option>
					<option value="GU"{if location_country == 'GU'} selected{/if}>Guam</option>
					<option value="GT"{if location_country == 'GT'} selected{/if}>Guatemala</option>
					<option value="GG"{if location_country == 'GG'} selected{/if}>Guernsey</option>
					<option value="GN"{if location_country == 'GN'} selected{/if}>Guinea</option>
					<option value="GW"{if location_country == 'GW'} selected{/if}>Guinea-Bissau</option>
					<option value="GY"{if location_country == 'GY'} selected{/if}>Guyana</option>
					<option value="HT"{if location_country == 'HT'} selected{/if}>Haiti</option>
					<option value="HM"{if location_country == 'HM'} selected{/if}>Heard Island and McDonald Islands</option>
					<option value="VA"{if location_country == 'VA'} selected{/if}>Holy See (Vatican City State)</option>
					<option value="HN"{if location_country == 'HN'} selected{/if}>Honduras</option>
					<option value="HK"{if location_country == 'HK'} selected{/if}>Hong Kong</option>
					<option value="HU"{if location_country == 'HU'} selected{/if}>Hungary</option>
					<option value="IS"{if location_country == 'IS'} selected{/if}>Iceland</option>
					<option value="IN"{if location_country == 'IN'} selected{/if}>India</option>
					<option value="ID"{if location_country == 'ID'} selected{/if}>Indonesia</option>
					<option value="IR"{if location_country == 'IR'} selected{/if}>Iran, Islamic Republic of</option>
					<option value="IQ"{if location_country == 'IQ'} selected{/if}>Iraq</option>
					<option value="IE"{if location_country == 'IE'} selected{/if}>Ireland</option>
					<option value="IM"{if location_country == 'IM'} selected{/if}>Isle of Man</option>
					<option value="IL"{if location_country == 'IL'} selected{/if}>Israel</option>
					<option value="IT"{if location_country == 'IT'} selected{/if}>Italy</option>
					<option value="JM"{if location_country == 'JM'} selected{/if}>Jamaica</option>
					<option value="JP"{if location_country == 'JP'} selected{/if}>Japan</option>
					<option value="JE"{if location_country == 'JE'} selected{/if}>Jersey</option>
					<option value="JO"{if location_country == 'JO'} selected{/if}>Jordan</option>
					<option value="KZ"{if location_country == 'KZ'} selected{/if}>Kazakhstan</option>
					<option value="KE"{if location_country == 'KE'} selected{/if}>Kenya</option>
					<option value="KI"{if location_country == 'KI'} selected{/if}>Kiribati</option>
					<option value="KP"{if location_country == 'KP'} selected{/if}>Korea, Democratic People's Republic of</option>
					<option value="KR"{if location_country == 'KR'} selected{/if}>Korea, Republic of</option>
					<option value="KW"{if location_country == 'KW'} selected{/if}>Kuwait</option>
					<option value="KG"{if location_country == 'KG'} selected{/if}>Kyrgyzstan</option>
					<option value="LA"{if location_country == 'LA'} selected{/if}>Lao People's Democratic Republic</option>
					<option value="LV"{if location_country == 'LV'} selected{/if}>Latvia</option>
					<option value="LB"{if location_country == 'LB'} selected{/if}>Lebanon</option>
					<option value="LS"{if location_country == 'LS'} selected{/if}>Lesotho</option>
					<option value="LR"{if location_country == 'LR'} selected{/if}>Liberia</option>
					<option value="LY"{if location_country == 'LY'} selected{/if}>Libyan Arab Jamahiriya</option>
					<option value="LI"{if location_country == 'LI'} selected{/if}>Liechtenstein</option>
					<option value="LT"{if location_country == 'LT'} selected{/if}>Lithuania</option>
					<option value="LU"{if location_country == 'LU'} selected{/if}>Luxembourg</option>
					<option value="MO"{if location_country == 'MO'} selected{/if}>Macao</option>
					<option value="MK"{if location_country == 'MK'} selected{/if}>Macedonia, The Former Yugoslav Republic Of</option>
					<option value="MG"{if location_country == 'MG'} selected{/if}>Madagascar</option>
					<option value="MW"{if location_country == 'MW'} selected{/if}>Malawi</option>
					<option value="MY"{if location_country == 'MY'} selected{/if}>Malaysia</option>
					<option value="MV"{if location_country == 'MV'} selected{/if}>Maldives</option>
					<option value="ML"{if location_country == 'ML'} selected{/if}>Mali</option>
					<option value="MT"{if location_country == 'MT'} selected{/if}>Malta</option>
					<option value="MH"{if location_country == 'MH'} selected{/if}>Marshall Islands</option>
					<option value="MQ"{if location_country == 'MQ'} selected{/if}>Martinique</option>
					<option value="MR"{if location_country == 'MR'} selected{/if}>Mauritania</option>
					<option value="MU"{if location_country == 'MU'} selected{/if}>Mauritius</option>
					<option value="YT"{if location_country == 'YT'} selected{/if}>Mayotte</option>
					<option value="MX"{if location_country == 'MX'} selected{/if}>Mexico</option>
					<option value="FM"{if location_country == 'FM'} selected{/if}>Micronesia, Federated States of</option>
					<option value="MD"{if location_country == 'MD'} selected{/if}>Moldova, Republic of</option>
					<option value="MC"{if location_country == 'MC'} selected{/if}>Monaco</option>
					<option value="MN"{if location_country == 'MN'} selected{/if}>Mongolia</option>
					<option value="ME"{if location_country == 'ME'} selected{/if}>Montenegro</option>
					<option value="MS"{if location_country == 'MS'} selected{/if}>Montserrat</option>
					<option value="MA"{if location_country == 'MA'} selected{/if}>Morocco</option>
					<option value="MZ"{if location_country == 'MZ'} selected{/if}>Mozambique</option>
					<option value="MM"{if location_country == 'MM'} selected{/if}>Myanmar</option>
					<option value="NA"{if location_country == 'NA'} selected{/if}>Namibia</option>
					<option value="NR"{if location_country == 'NR'} selected{/if}>Nauru</option>
					<option value="NP"{if location_country == 'NP'} selected{/if}>Nepal</option>
					<option value="NL"{if location_country == 'NL'} selected{/if}>Netherlands</option>
					<option value="NC"{if location_country == 'NC'} selected{/if}>New Caledonia</option>
					<option value="NZ"{if location_country == 'NZ'} selected{/if}>New Zealand</option>
					<option value="NI"{if location_country == 'NI'} selected{/if}>Nicaragua</option>
					<option value="NE"{if location_country == 'NE'} selected{/if}>Niger</option>
					<option value="NG"{if location_country == 'NG'} selected{/if}>Nigeria</option>
					<option value="NU"{if location_country == 'NU'} selected{/if}>Niue</option>
					<option value="NF"{if location_country == 'NF'} selected{/if}>Norfolk Island</option>
					<option value="MP"{if location_country == 'MP'} selected{/if}>Northern Mariana Islands</option>
					<option value="NO"{if location_country == 'NO'} selected{/if}>Norway</option>
					<option value="OM"{if location_country == 'OM'} selected{/if}>Oman</option>
					<option value="PK"{if location_country == 'PK'} selected{/if}>Pakistan</option>
					<option value="PW"{if location_country == 'PW'} selected{/if}>Palau</option>
					<option value="PS"{if location_country == 'PS'} selected{/if}>Palestinian Territory, Occupied</option>
					<option value="PA"{if location_country == 'PA'} selected{/if}>Panama</option>
					<option value="PG"{if location_country == 'PG'} selected{/if}>Papua New Guinea</option>
					<option value="PY"{if location_country == 'PY'} selected{/if}>Paraguay</option>
					<option value="PE"{if location_country == 'PE'} selected{/if}>Peru</option>
					<option value="PH"{if location_country == 'PH'} selected{/if}>Philippines</option>
					<option value="PN"{if location_country == 'PN'} selected{/if}>Pitcairn</option>
					<option value="PL"{if location_country == 'PL'} selected{/if}>Poland</option>
					<option value="PT"{if location_country == 'PT'} selected{/if}>Portugal</option>
					<option value="PR"{if location_country == 'PR'} selected{/if}>Puerto Rico</option>
					<option value="QA"{if location_country == 'QA'} selected{/if}>Qatar</option>
					<option value="RE"{if location_country == 'RE'} selected{/if}>Réunion</option>
					<option value="RO"{if location_country == 'RO'} selected{/if}>Romania</option>
					<option value="RU"{if location_country == 'RU'} selected{/if}>Russian Federation</option>
					<option value="RW"{if location_country == 'RW'} selected{/if}>Rwanda</option>
					<option value="BL"{if location_country == 'BL'} selected{/if}>Saint Barthélemy</option>
					<option value="SH"{if location_country == 'SH'} selected{/if}>Saint Helena</option>
					<option value="KN"{if location_country == 'KN'} selected{/if}>Saint Kitts and Nevis</option>
					<option value="LC"{if location_country == 'LC'} selected{/if}>Saint Lucia</option>
					<option value="MF"{if location_country == 'MF'} selected{/if}>Saint Martin (French Part)</option>
					<option value="PM"{if location_country == 'PM'} selected{/if}>Saint Pierre and Miquelon</option>
					<option value="VC"{if location_country == 'VC'} selected{/if}>Saint Vincent and the Grenadines</option>
					<option value="WS"{if location_country == 'WS'} selected{/if}>Samoa</option>
					<option value="SM"{if location_country == 'SM'} selected{/if}>San Marino</option>
					<option value="ST"{if location_country == 'ST'} selected{/if}>Sao Tome and Principe</option>
					<option value="SA"{if location_country == 'SA'} selected{/if}>Saudi Arabia</option>
					<option value="SN"{if location_country == 'SN'} selected{/if}>Senegal</option>
					<option value="RS"{if location_country == 'RS'} selected{/if}>Serbia</option>
					<option value="SC"{if location_country == 'SC'} selected{/if}>Seychelles</option>
					<option value="SL"{if location_country == 'SL'} selected{/if}>Sierra Leone</option>
					<option value="SG"{if location_country == 'SG'} selected{/if}>Singapore</option>
					<option value="SX"{if location_country == 'SX'} selected{/if}>Sint Maarten (Dutch Part)</option>
					<option value="SK"{if location_country == 'SK'} selected{/if}>Slovakia</option>
					<option value="SI"{if location_country == 'SI'} selected{/if}>Slovenia</option>
					<option value="SB"{if location_country == 'SB'} selected{/if}>Solomon Islands</option>
					<option value="SO"{if location_country == 'SO'} selected{/if}>Somalia</option>
					<option value="ZA"{if location_country == 'ZA'} selected{/if}>South Africa</option>
					<option value="GS"{if location_country == 'GS'} selected{/if}>South Georgia and the South Sandwich Islands</option>
					<option value="SS"{if location_country == 'SS'} selected{/if}>South Sudan</option>
					<option value="ES"{if location_country == 'ES'} selected{/if}>Spain</option>
					<option value="LK"{if location_country == 'LK'} selected{/if}>Sri Lanka</option>
					<option value="SD"{if location_country == 'SD'} selected{/if}>Sudan</option>
					<option value="SR"{if location_country == 'SR'} selected{/if}>Suriname</option>
					<option value="SJ"{if location_country == 'SJ'} selected{/if}>Svalbard and Jan Mayen</option>
					<option value="SZ"{if location_country == 'SZ'} selected{/if}>Swaziland</option>
					<option value="SE"{if location_country == 'SE'} selected{/if}>Sweden</option>
					<option value="CH"{if location_country == 'CH'} selected{/if}>Switzerland</option>
					<option value="SY"{if location_country == 'SY'} selected{/if}>Syrian Arab Republic</option>
					<option value="TW"{if location_country == 'TW'} selected{/if}>Taiwan, Province of China</option>
					<option value="TJ"{if location_country == 'TJ'} selected{/if}>Tajikistan</option>
					<option value="TZ"{if location_country == 'TZ'} selected{/if}>Tanzania, United Republic of</option>
					<option value="TH"{if location_country == 'TH'} selected{/if}>Thailand</option>
					<option value="TL"{if location_country == 'TL'} selected{/if}>Timor-Leste</option>
					<option value="TG"{if location_country == 'TG'} selected{/if}>Togo</option>
					<option value="TK"{if location_country == 'TK'} selected{/if}>Tokelau</option>
					<option value="TO"{if location_country == 'TO'} selected{/if}>Tonga</option>
					<option value="TT"{if location_country == 'TT'} selected{/if}>Trinidad and Tobago</option>
					<option value="TN"{if location_country == 'TN'} selected{/if}>Tunisia</option>
					<option value="TR"{if location_country == 'TR'} selected{/if}>Turkey</option>
					<option value="TM"{if location_country == 'TM'} selected{/if}>Turkmenistan</option>
					<option value="TC"{if location_country == 'TC'} selected{/if}>Turks and Caicos Islands</option>
					<option value="TV"{if location_country == 'TV'} selected{/if}>Tuvalu</option>
					<option value="UG"{if location_country == 'UG'} selected{/if}>Uganda</option>
					<option value="UA"{if location_country == 'UA'} selected{/if}>Ukraine</option>
					<option value="AE"{if location_country == 'AE'} selected{/if}>United Arab Emirates</option>
					<option value="GB"{if location_country == 'GB'} selected{/if}>United Kingdom</option>
					<option value="UM"{if location_country == 'UM'} selected{/if}>United States Minor Outlying Islands</option>
					<option value="UY"{if location_country == 'UY'} selected{/if}>Uruguay</option>
					<option value="UZ"{if location_country == 'UZ'} selected{/if}>Uzbekistan</option>
					<option value="VU"{if location_country == 'VU'} selected{/if}>Vanuatu</option>
					<option value="VE"{if location_country == 'VE'} selected{/if}>Venezuela</option>
					<option value="VN"{if location_country == 'VN'} selected{/if}>Vietnam</option>
					<option value="VG"{if location_country == 'VG'} selected{/if}>Virgin Islands, British</option>
					<option value="VI"{if location_country == 'VI'} selected{/if}>Virgin Islands, U.S.</option>
					<option value="WF"{if location_country == 'WF'} selected{/if}>Wallis and Futuna</option>
					<option value="EH"{if location_country == 'EH'} selected{/if}>Western Sahara</option>
					<option value="YE"{if location_country == 'YE'} selected{/if}>Yemen</option>
					<option value="ZM"{if location_country == 'ZM'} selected{/if}>Zambia</option>
					<option value="ZW"{if location_country == 'ZW'} selected{/if}>Zimbabwe</option>
				</select>
				</td>
		</tr>
		{/if}
	{/exp:channel:entries}

		<tr>
			<th scope="row"><label for="event_image">Image</label></th>
			<td>
				{field:event_image}
				<p class="instructions">Accepted file types: .jpg, .png, .gif</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_description" class="req">Description</label></th>
			<td>
				{field:event_description}
				<p class="instructions">Should include event description, contact information, registration instructions, etc.<br><strong>Note:</strong> To preserve formatting click on the Paste from Word button.</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="field_id_35">*&nbsp;Categories</label>
			</th>
			<td>
				<br>
				<p class="instructions"><strong>Please select at least one category for your event.</strong></p>
				<ul class="inputs">
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="374" /> <span>Finding Peace</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="371" /> <span>Fitness</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="376" /> <span>Health Expo</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="369" /> <span>Heart Disease Prevention</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="372" /> <span>Improving Mental Performance</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="367" /> <span>Natural Remedies</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="375" /> <span>Overcoming Depression</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="373" /> <span>Reducing Stress</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="365" /> <span>Reversing Diabetes</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="439" /> <span>Reversing Disease Seminar</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="370" /> <span>Stop Smoking</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="366" /> <span>Vegetarian Cooking</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="368" /> <span>Weight Management</span></label></li>
					<li class="hidden"><label><input class="checkbox" type="checkbox" name="category[]" value="{member_sponsor_id}" checked="checked" /> <span>{member_sponsor_id}</span></label></li>
				</ul>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<div class="button-wrap">
					<button type="submit" class="super green button"><span>Save</span></button>
					<button type="reset" class="super secondary button"><span>Reset</span></button>
				</div>
			</td>
		</tr>
	</table>
	{/exp:user:stats}
{/exp:safecracker}

</div>
<div class="right sidebar">
	<header class="bar">Add Events</header>
		<ul class="bullets">
			<li><a href="{path='sponsors/edit-events'}">View or edit events</a></li>
		</ul>
		<p><strong>IMPORTANT:</strong> Please create a separate entry for each day of an event that does not fall on consecutive days.</p>
		<p>Only approved {site_name} events may be added. If your event type does not fit one of the categories below, please email <a href="mailto:club@newstart.com">club@newstart.com</a> or call 530-422-7993 before adding your event. Please note that club events should generally be offered free or at low cost.</p>
</div>
</div><!-- /.grid23 -->
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}