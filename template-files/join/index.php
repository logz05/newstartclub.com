{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Create an Account"
		section=""
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

<body>

{if logged_in}
	{redirect="update-profile"}
{/if}

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>

	<div class="body  members">
		
		<header class="heading">
			<h1 class="post__title">Create an Account</h1>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">
			
				{sn_no-script}
				
				<div class="loading-form" id="loading-form">
					<span class="loading" id="js-load-form"></span>
				</div>
			
				{exp:user:register group_id="5" return="update-profile" required="member_first_name|member_last_name|username|password|password_confirm|member_zip" form:class="js-load  clearfix" form:id="register"}

					<table>
						<tr>
							<th scope="row" width="140"><label for="member_first_name" class="req"><span class="req">* </span>First Name</label></th>
							<td>
								<input type="text" class="input" name="member_first_name" id="member_first_name" value="" size="25" autocomplete="off" onblur="registration(this.form)" />
								<input type="text" class="hidden" value="" name="jsFirstName" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="member_last_name" class="req"><span class="req">* </span>Last Name</label></th>
							<td>
								<input type="text" class="input" name="member_last_name" id="member_last_name" value="" size="25" autocomplete="off" onblur="registration(this.form)" />
								<input type="text" class="hidden" value="" name="jsLastName" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="member_address">Address</label></th>
							<td><input type="text" class="input" id="member_address" name="member_address" value="" size="32" autocomplete="off" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_country">Country</label></th>
							<td>
								<select name="country_selector" id="country_selector" class="input  country-selector" autocorrect="off" autocomplete="off" onblur="addressLookUp(this.form);">
									<option value="US" data-alternative-spellings="US USA United States of America" data-relevancy-booster="3.5">United States</option>
									<option value="AF" data-alternative-spellings="AF افغانستان">Afghanistan</option>
									<option value="AX" data-alternative-spellings="AX Aaland Aland" data-relevancy-booster="0.5">Åland Islands</option>
									<option value="AL" data-alternative-spellings="AL">Albania</option>
									<option value="DZ" data-alternative-spellings="DZ الجزائر">Algeria</option>
									<option value="AS" data-alternative-spellings="AS" data-relevancy-booster="0.5">American Samoa</option>
									<option value="AD" data-alternative-spellings="AD" data-relevancy-booster="0.5">Andorra</option>
									<option value="AO" data-alternative-spellings="AO">Angola</option>
									<option value="AI" data-alternative-spellings="AI" data-relevancy-booster="0.5">Anguilla</option>
									<option value="AQ" data-alternative-spellings="AQ" data-relevancy-booster="0.5">Antarctica</option>
									<option value="AG" data-alternative-spellings="AG" data-relevancy-booster="0.5">Antigua And Barbuda</option>
									<option value="AR" data-alternative-spellings="AR">Argentina</option>
									<option value="AM" data-alternative-spellings="AM Հայաստան">Armenia</option>
									<option value="AW" data-alternative-spellings="AW" data-relevancy-booster="0.5">Aruba</option>
									<option value="AU" data-alternative-spellings="AU" data-relevancy-booster="1.5">Australia</option>
									<option value="AT" data-alternative-spellings="AT Österreich Osterreich Oesterreich ">Austria</option>
									<option value="AZ" data-alternative-spellings="AZ">Azerbaijan</option>
									<option value="BS" data-alternative-spellings="BS">Bahamas</option>
									<option value="BH" data-alternative-spellings="BH البحرين">Bahrain</option>
									<option value="BD" data-alternative-spellings="BD বাংলাদেশ" data-relevancy-booster="2">Bangladesh</option>
									<option value="BB" data-alternative-spellings="BB">Barbados</option>
									<option value="BY" data-alternative-spellings="BY Беларусь">Belarus</option>
									<option value="BE" data-alternative-spellings="BE België Belgie Belgien Belgique" data-relevancy-booster="1.5">Belgium</option>
									<option value="BZ" data-alternative-spellings="BZ">Belize</option>
									<option value="BJ" data-alternative-spellings="BJ">Benin</option>
									<option value="BM" data-alternative-spellings="BM" data-relevancy-booster="0.5">Bermuda</option>
									<option value="BT" data-alternative-spellings="BT भूटान">Bhutan</option>
									<option value="BO" data-alternative-spellings="BO">Bolivia</option>
									<option value="BQ" data-alternative-spellings="BQ">Bonaire, Sint Eustatius and Saba</option>
									<option value="BA" data-alternative-spellings="BA Босна и Херцеговина">Bosnia and Herzegovina</option>
									<option value="BW" data-alternative-spellings="BW">Botswana</option>
									<option value="BV" data-alternative-spellings="BV">Bouvet Island</option>
									<option value="BR" data-alternative-spellings="BR Brasil" data-relevancy-booster="2">Brazil</option>
									<option value="IO" data-alternative-spellings="IO">British Indian Ocean Territory</option>
									<option value="BN" data-alternative-spellings="BN">Brunei Darussalam</option>
									<option value="BG" data-alternative-spellings="BG България">Bulgaria</option>
									<option value="BF" data-alternative-spellings="BF">Burkina Faso</option>
									<option value="BI" data-alternative-spellings="BI">Burundi</option>
									<option value="KH" data-alternative-spellings="KH កម្ពុជា">Cambodia</option>
									<option value="CM" data-alternative-spellings="CM">Cameroon</option>
									<option value="CA" data-alternative-spellings="CA" data-relevancy-booster="2">Canada</option>
									<option value="CV" data-alternative-spellings="CV Cabo">Cape Verde</option>
									<option value="KY" data-alternative-spellings="KY" data-relevancy-booster="0.5">Cayman Islands</option>
									<option value="CF" data-alternative-spellings="CF">Central African Republic</option>
									<option value="TD" data-alternative-spellings="TD تشاد‎ Tchad">Chad</option>
									<option value="CL" data-alternative-spellings="CL">Chile</option>
									<option value="CN" data-alternative-spellings="CN Zhongguo Zhonghua Peoples Republic 中国/中华">China</option>
									<option value="CX" data-alternative-spellings="CX" data-relevancy-booster="0.5">Christmas Island</option>
									<option value="CC" data-alternative-spellings="CC" data-relevancy-booster="0.5">Cocos (Keeling) Islands</option>
									<option value="CO" data-alternative-spellings="CO">Colombia</option>
									<option value="KM" data-alternative-spellings="KM جزر القمر">Comoros</option>
									<option value="CG" data-alternative-spellings="CG">Congo</option>
									<option value="CD" data-alternative-spellings="CD Congo-Brazzaville Repubilika ya Kongo">Congo, the Democratic Republic of the</option>
									<option value="CK" data-alternative-spellings="CK" data-relevancy-booster="0.5">Cook Islands</option>
									<option value="CR" data-alternative-spellings="CR">Costa Rica</option>
									<option value="CI" data-alternative-spellings="CI Cote dIvoire">Côte d'Ivoire</option>
									<option value="HR" data-alternative-spellings="HR Hrvatska">Croatia</option>
									<option value="CU" data-alternative-spellings="CU">Cuba</option>
									<option value="CW" data-alternative-spellings="CW Curacao">Curaçao</option>
									<option value="CY" data-alternative-spellings="CY Κύπρος Kýpros Kıbrıs">Cyprus</option>
									<option value="CZ" data-alternative-spellings="CZ Česká Ceska">Czech Republic</option>
									<option value="DK" data-alternative-spellings="DK Danmark" data-relevancy-booster="1.5">Denmark</option>
									<option value="DJ" data-alternative-spellings="DJ جيبوتي‎ Jabuuti Gabuuti">Djibouti</option>
									<option value="DM" data-alternative-spellings="DM Dominique" data-relevancy-booster="0.5">Dominica</option>
									<option value="DO" data-alternative-spellings="DO">Dominican Republic</option>
									<option value="EC" data-alternative-spellings="EC">Ecuador</option>
									<option value="EG" data-alternative-spellings="EG" data-relevancy-booster="1.5">Egypt</option>
									<option value="SV" data-alternative-spellings="SV">El Salvador</option>
									<option value="GQ" data-alternative-spellings="GQ">Equatorial Guinea</option>
									<option value="ER" data-alternative-spellings="ER إرتريا ኤርትራ">Eritrea</option>
									<option value="EE" data-alternative-spellings="EE Eesti">Estonia</option>
									<option value="ET" data-alternative-spellings="ET ኢትዮጵያ">Ethiopia</option>
									<option value="FK" data-alternative-spellings="FK" data-relevancy-booster="0.5">Falkland Islands (Malvinas)</option>
									<option value="FO" data-alternative-spellings="FO Føroyar Færøerne" data-relevancy-booster="0.5">Faroe Islands</option>
									<option value="FJ" data-alternative-spellings="FJ Viti फ़िजी">Fiji</option>
									<option value="FI" data-alternative-spellings="FI Suomi">Finland</option>
									<option value="FR" data-alternative-spellings="FR République française" data-relevancy-booster="2.5">France</option>
									<option value="GF" data-alternative-spellings="GF">French Guiana</option>
									<option value="PF" data-alternative-spellings="PF Polynésie française">French Polynesia</option>
									<option value="TF" data-alternative-spellings="TF">French Southern Territories</option>
									<option value="GA" data-alternative-spellings="GA République Gabonaise">Gabon</option>
									<option value="GM" data-alternative-spellings="GM">Gambia</option>
									<option value="GE" data-alternative-spellings="GE საქართველო">Georgia</option>
									<option value="DE" data-alternative-spellings="DE Bundesrepublik Deutschland" data-relevancy-booster="3">Germany</option>
									<option value="GH" data-alternative-spellings="GH">Ghana</option>
									<option value="GI" data-alternative-spellings="GI" data-relevancy-booster="0.5">Gibraltar</option>
									<option value="GR" data-alternative-spellings="GR Ελλάδα" data-relevancy-booster="1.5">Greece</option>
									<option value="GL" data-alternative-spellings="GL grønland" data-relevancy-booster="0.5">Greenland</option>
									<option value="GD" data-alternative-spellings="GD">Grenada</option>
									<option value="GP" data-alternative-spellings="GP">Guadeloupe</option>
									<option value="GU" data-alternative-spellings="GU">Guam</option>
									<option value="GT" data-alternative-spellings="GT">Guatemala</option>
									<option value="GG" data-alternative-spellings="GG" data-relevancy-booster="0.5">Guernsey</option>
									<option value="GN" data-alternative-spellings="GN">Guinea</option>
									<option value="GW" data-alternative-spellings="GW">Guinea-Bissau</option>
									<option value="GY" data-alternative-spellings="GY">Guyana</option>
									<option value="HT" data-alternative-spellings="HT">Haiti</option>
									<option value="HM" data-alternative-spellings="HM">Heard Island and McDonald Islands</option>
									<option value="VA" data-alternative-spellings="VA" data-relevancy-booster="0.5">Holy See (Vatican City State)</option>
									<option value="HN" data-alternative-spellings="HN">Honduras</option>
									<option value="HK" data-alternative-spellings="HK 香港">Hong Kong</option>
									<option value="HU" data-alternative-spellings="HU Magyarország">Hungary</option>
									<option value="IS" data-alternative-spellings="IS Island">Iceland</option>
									<option value="IN" data-alternative-spellings="IN भारत गणराज्य Hindustan" data-relevancy-booster="3">India</option>
									<option value="ID" data-alternative-spellings="ID" data-relevancy-booster="2">Indonesia</option>
									<option value="IR" data-alternative-spellings="IR ایران">Iran, Islamic Republic of</option>
									<option value="IQ" data-alternative-spellings="IQ العراق‎">Iraq</option>
									<option value="IE" data-alternative-spellings="IE Éire" data-relevancy-booster="1.2">Ireland</option>
									<option value="IM" data-alternative-spellings="IM" data-relevancy-booster="0.5">Isle of Man</option>
									<option value="IL" data-alternative-spellings="IL إسرائيل ישראל">Israel</option>
									<option value="IT" data-alternative-spellings="IT Italia" data-relevancy-booster="2">Italy</option>
									<option value="JM" data-alternative-spellings="JM">Jamaica</option>
									<option value="JP" data-alternative-spellings="JP Nippon Nihon 日本" data-relevancy-booster="2.5">Japan</option>
									<option value="JE" data-alternative-spellings="JE" data-relevancy-booster="0.5">Jersey</option>
									<option value="JO" data-alternative-spellings="JO الأردن">Jordan</option>
									<option value="KZ" data-alternative-spellings="KZ Қазақстан Казахстан">Kazakhstan</option>
									<option value="KE" data-alternative-spellings="KE">Kenya</option>
									<option value="KI" data-alternative-spellings="KI">Kiribati</option>
									<option value="KP" data-alternative-spellings="KP North Korea">Korea, Democratic People's Republic of</option>
									<option value="KR" data-alternative-spellings="KR South Korea" data-relevancy-booster="1.5">Korea, Republic of</option>
									<option value="KW" data-alternative-spellings="KW الكويت">Kuwait</option>
									<option value="KG" data-alternative-spellings="KG Кыргызстан">Kyrgyzstan</option>
									<option value="LA" data-alternative-spellings="LA">Lao People's Democratic Republic</option>
									<option value="LV" data-alternative-spellings="LV Latvija">Latvia</option>
									<option value="LB" data-alternative-spellings="LB لبنان">Lebanon</option>
									<option value="LS" data-alternative-spellings="LS">Lesotho</option>
									<option value="LR" data-alternative-spellings="LR">Liberia</option>
									<option value="LY" data-alternative-spellings="LY ليبيا">Libyan Arab Jamahiriya</option>
									<option value="LI" data-alternative-spellings="LI">Liechtenstein</option>
									<option value="LT" data-alternative-spellings="LT Lietuva">Lithuania</option>
									<option value="LU" data-alternative-spellings="LU">Luxembourg</option>
									<option value="MO" data-alternative-spellings="MO">Macao</option>
									<option value="MK" data-alternative-spellings="MK Македонија">Macedonia, The Former Yugoslav Republic Of</option>
									<option value="MG" data-alternative-spellings="MG Madagasikara">Madagascar</option>
									<option value="MW" data-alternative-spellings="MW">Malawi</option>
									<option value="MY" data-alternative-spellings="MY">Malaysia</option>
									<option value="MV" data-alternative-spellings="MV">Maldives</option>
									<option value="ML" data-alternative-spellings="ML">Mali</option>
									<option value="MT" data-alternative-spellings="MT">Malta</option>
									<option value="MH" data-alternative-spellings="MH" data-relevancy-booster="0.5">Marshall Islands</option>
									<option value="MQ" data-alternative-spellings="MQ">Martinique</option>
									<option value="MR" data-alternative-spellings="MR الموريتانية">Mauritania</option>
									<option value="MU" data-alternative-spellings="MU">Mauritius</option>
									<option value="YT" data-alternative-spellings="YT">Mayotte</option>
									<option value="MX" data-alternative-spellings="MX Mexicanos" data-relevancy-booster="1.5">Mexico</option>
									<option value="FM" data-alternative-spellings="FM">Micronesia, Federated States of</option>
									<option value="MD" data-alternative-spellings="MD">Moldova, Republic of</option>
									<option value="MC" data-alternative-spellings="MC">Monaco</option>
									<option value="MN" data-alternative-spellings="MN Mongγol ulus Монгол улс">Mongolia</option>
									<option value="ME" data-alternative-spellings="ME">Montenegro</option>
									<option value="MS" data-alternative-spellings="MS" data-relevancy-booster="0.5">Montserrat</option>
									<option value="MA" data-alternative-spellings="MA المغرب">Morocco</option>
									<option value="MZ" data-alternative-spellings="MZ Moçambique">Mozambique</option>
									<option value="MM" data-alternative-spellings="MM">Myanmar</option>
									<option value="NA" data-alternative-spellings="NA Namibië">Namibia</option>
									<option value="NR" data-alternative-spellings="NR Naoero" data-relevancy-booster="0.5">Nauru</option>
									<option value="NP" data-alternative-spellings="NP नेपाल">Nepal</option>
									<option value="NL" data-alternative-spellings="NL Holland Nederland" data-relevancy-booster="1.5">Netherlands</option>
									<option value="NC" data-alternative-spellings="NC" data-relevancy-booster="0.5">New Caledonia</option>
									<option value="NZ" data-alternative-spellings="NZ Aotearoa">New Zealand</option>
									<option value="NI" data-alternative-spellings="NI">Nicaragua</option>
									<option value="NE" data-alternative-spellings="NE Nijar">Niger</option>
									<option value="NG" data-alternative-spellings="NG Nijeriya Naíjíríà" data-relevancy-booster="1.5">Nigeria</option>
									<option value="NU" data-alternative-spellings="NU" data-relevancy-booster="0.5">Niue</option>
									<option value="NF" data-alternative-spellings="NF" data-relevancy-booster="0.5">Norfolk Island</option>
									<option value="MP" data-alternative-spellings="MP" data-relevancy-booster="0.5">Northern Mariana Islands</option>
									<option value="NO" data-alternative-spellings="NO Norge Noreg" data-relevancy-booster="1.5">Norway</option>
									<option value="OM" data-alternative-spellings="OM عمان">Oman</option>
									<option value="PK" data-alternative-spellings="PK پاکستان" data-relevancy-booster="2">Pakistan</option>
									<option value="PW" data-alternative-spellings="PW" data-relevancy-booster="0.5">Palau</option>
									<option value="PS" data-alternative-spellings="PS فلسطين">Palestinian Territory, Occupied</option>
									<option value="PA" data-alternative-spellings="PA">Panama</option>
									<option value="PG" data-alternative-spellings="PG">Papua New Guinea</option>
									<option value="PY" data-alternative-spellings="PY">Paraguay</option>
									<option value="PE" data-alternative-spellings="PE">Peru</option>
									<option value="PH" data-alternative-spellings="PH Pilipinas" data-relevancy-booster="1.5">Philippines</option>
									<option value="PN" data-alternative-spellings="PN" data-relevancy-booster="0.5">Pitcairn</option>
									<option value="PL" data-alternative-spellings="PL Polska" data-relevancy-booster="1.25">Poland</option>
									<option value="PT" data-alternative-spellings="PT Portuguesa" data-relevancy-booster="1.5">Portugal</option>
									<option value="PR" data-alternative-spellings="PR">Puerto Rico</option>
									<option value="QA" data-alternative-spellings="QA قطر">Qatar</option>
									<option value="RE" data-alternative-spellings="RE Reunion">Réunion</option>
									<option value="RO" data-alternative-spellings="RO Rumania Roumania România">Romania</option>
									<option value="RU" data-alternative-spellings="RU Rossiya Российская Россия" data-relevancy-booster="2.5">Russian Federation</option>
									<option value="RW" data-alternative-spellings="RW">Rwanda</option>
									<option value="BL" data-alternative-spellings="BL St. Barthelemy">Saint Barthélemy</option>
									<option value="SH" data-alternative-spellings="SH St.">Saint Helena</option>
									<option value="KN" data-alternative-spellings="KN St.">Saint Kitts and Nevis</option>
									<option value="LC" data-alternative-spellings="LC St.">Saint Lucia</option>
									<option value="MF" data-alternative-spellings="MF St.">Saint Martin (French Part)</option>
									<option value="PM" data-alternative-spellings="PM St.">Saint Pierre and Miquelon</option>
									<option value="VC" data-alternative-spellings="VC St.">Saint Vincent and the Grenadines</option>
									<option value="WS" data-alternative-spellings="WS">Samoa</option>
									<option value="SM" data-alternative-spellings="SM">San Marino</option>
									<option value="ST" data-alternative-spellings="ST">Sao Tome and Principe</option>
									<option value="SA" data-alternative-spellings="SA السعودية">Saudi Arabia</option>
									<option value="SN" data-alternative-spellings="SN Sénégal">Senegal</option>
									<option value="RS" data-alternative-spellings="RS Србија Srbija">Serbia</option>
									<option value="SC" data-alternative-spellings="SC" data-relevancy-booster="0.5">Seychelles</option>
									<option value="SL" data-alternative-spellings="SL">Sierra Leone</option>
									<option value="SG" data-alternative-spellings="SG Singapura சிங்கப்பூர் குடியரசு 新加坡共和国">Singapore</option>
									<option value="SX" data-alternative-spellings="SX">Sint Maarten (Dutch Part)</option>
									<option value="SK" data-alternative-spellings="SK Slovenská Slovensko">Slovakia</option>
									<option value="SI" data-alternative-spellings="SI Slovenija">Slovenia</option>
									<option value="SB" data-alternative-spellings="SB">Solomon Islands</option>
									<option value="SO" data-alternative-spellings="SO الصومال">Somalia</option>
									<option value="ZA" data-alternative-spellings="ZA RSA Suid-Afrika">South Africa</option>
									<option value="GS" data-alternative-spellings="GS">South Georgia and the South Sandwich Islands</option>
									<option value="SS" data-alternative-spellings="SS">South Sudan</option>
									<option value="ES" data-alternative-spellings="ES España" data-relevancy-booster="2">Spain</option>
									<option value="LK" data-alternative-spellings="LK ශ්‍රී ලංකා இலங்கை Ceylon">Sri Lanka</option>
									<option value="SD" data-alternative-spellings="SD السودان">Sudan</option>
									<option value="SR" data-alternative-spellings="SR शर्नम् Sarnam Sranangron">Suriname</option>
									<option value="SJ" data-alternative-spellings="SJ" data-relevancy-booster="0.5">Svalbard and Jan Mayen</option>
									<option value="SZ" data-alternative-spellings="SZ weSwatini Swatini Ngwane">Swaziland</option>
									<option value="SE" data-alternative-spellings="SE Sverige" data-relevancy-booster="1.5">Sweden</option>
									<option value="CH" data-alternative-spellings="CH Swiss Confederation Schweiz Suisse Svizzera Svizra" data-relevancy-booster="1.5">Switzerland</option>
									<option value="SY" data-alternative-spellings="SY Syria سورية">Syrian Arab Republic</option>
									<option value="TW" data-alternative-spellings="TW 台灣 臺灣">Taiwan, Province of China</option>
									<option value="TJ" data-alternative-spellings="TJ Тоҷикистон Toçikiston">Tajikistan</option>
									<option value="TZ" data-alternative-spellings="TZ">Tanzania, United Republic of</option>
									<option value="TH" data-alternative-spellings="TH ประเทศไทย Prathet Thai">Thailand</option>
									<option value="TL" data-alternative-spellings="TL">Timor-Leste</option>
									<option value="TG" data-alternative-spellings="TG Togolese">Togo</option>
									<option value="TK" data-alternative-spellings="TK" data-relevancy-booster="0.5">Tokelau</option>
									<option value="TO" data-alternative-spellings="TO">Tonga</option>
									<option value="TT" data-alternative-spellings="TT">Trinidad and Tobago</option>
									<option value="TN" data-alternative-spellings="TN تونس">Tunisia</option>
									<option value="TR" data-alternative-spellings="TR Türkiye Turkiye">Turkey</option>
									<option value="TM" data-alternative-spellings="TM Türkmenistan">Turkmenistan</option>
									<option value="TC" data-alternative-spellings="TC" data-relevancy-booster="0.5">Turks and Caicos Islands</option>
									<option value="TV" data-alternative-spellings="TV" data-relevancy-booster="0.5">Tuvalu</option>
									<option value="UG" data-alternative-spellings="UG">Uganda</option>
									<option value="UA" data-alternative-spellings="UA Ukrayina Україна">Ukraine</option>
									<option value="AE" data-alternative-spellings="AE UAE الإمارات">United Arab Emirates</option>
									<option value="GB" data-alternative-spellings="GB Great Britain England UK Wales Scotland Northern Ireland" data-relevancy-booster="2.5">United Kingdom</option>
									<option value="UM" data-alternative-spellings="UM">United States Minor Outlying Islands</option>
									<option value="UY" data-alternative-spellings="UY">Uruguay</option>
									<option value="UZ" data-alternative-spellings="UZ Ўзбекистон O'zbekstan O‘zbekiston">Uzbekistan</option>
									<option value="VU" data-alternative-spellings="VU">Vanuatu</option>
									<option value="VE" data-alternative-spellings="VE">Venezuela</option>
									<option value="VN" data-alternative-spellings="VN Việt Nam" data-relevancy-booster="1.5">Vietnam</option>
									<option value="VG" data-alternative-spellings="VG" data-relevancy-booster="0.5">Virgin Islands, British</option>
									<option value="VI" data-alternative-spellings="VI" data-relevancy-booster="0.5">Virgin Islands, U.S.</option>
									<option value="WF" data-alternative-spellings="WF" data-relevancy-booster="0.5">Wallis and Futuna</option>
									<option value="EH" data-alternative-spellings="EH لصحراء الغربية">Western Sahara</option>
									<option value="YE" data-alternative-spellings="YE اليمن">Yemen</option>
									<option value="ZM" data-alternative-spellings="ZM">Zambia</option>
									<option value="ZW" data-alternative-spellings="ZW">Zimbabwe</option>
								</select>
								<input type="text" class="input  hidden" id="member_country" name="member_country" value="" size="30" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="member_zip" class="req"><span class="req">* </span>Zip Code</label></th>
							<td class="zip-code-row">
								<input type="text" pattern="[0-9]*" class="input" id="member_zip" name="member_zip" value="" size="7" autocomplete="off" onblur="addressLookUp(this.form);" />
								<p id="searching" class="searching"><i class="loading" id="search-loader"></i></p>
								<p id="results" class="address-results">
									<span id="results-city"></span>, <span id="results-state"></span> | <a href="javascript:void(0)" id="jq_edit-address-results">Edit City/State</a>
								</p>
								<div class="edit-address" id="edit-address">
									<input type="text" class="input  member_city" id="member_city" name="member_city" value="" size="24" placeholder="City" />
									<input type="text" class="input  member_state" id="member_state" name="member_state" value="" size="20" placeholder="State" />
									<a href="javascript:void(0)" id="jq_save-address-results" class="jq_save-address-results">Save City/State</a>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="member_phone">Phone</label></th>
							<td><input type="tel" class="input" id="member_phone" name="member_phone" value="" size="25" placeholder="(000) 000-0000" autocomplete="off" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="username" class="req"><span class="req">* </span>Email</label></th>
							<td>
								<input type="email" class="input" id="email" name="username" value="" size="32" placeholder="example@me.com" autocomplete="off" autocapitalize="off" onblur="registration(this.form)" />
								<input type="text" class="hidden" name="jsEmail" />
								<p class="instructions">Please provide a valid email address to receive your FREE gift.</p>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="password" class="req"><span class="req">* </span>Password</label></th>
							<td><input type="password" class="input" id="password" name="password" size="20" autocomplete="off" onblur="registration(this.form)" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="password_confirm" class="req"><span class="req">* </span>Password, Again</label></th>
							<td>
								<input type="password" class="input" id="password_confirm" name="password_confirm" size="20" autocomplete="off" />
								<input type="hidden" class="hidden" id="member_welcome_email" name="member_welcome_email" value="0" />
								<input type="text" class="hidden" name="jsPassword" />
								{if segment_2}<input type="hidden" class="input" id="member_promo_code" name="member_promo_code" size="5" value="{segment_2}" autocomplete="off" />{/if}
							</td>
						</tr>
						{if segment_2 == ""}
						<tr>
							<th scope="row"><label for="member_promo_code">Promo Code</label></th>
							<td>
								<input type="text" class="input" id="member_promo_code" name="member_promo_code" size="5" autocomplete="off" />
								<p class="instructions">If you received a promo code enter it here.</p>
							</td>
						</tr>
						{/if}
						<tr>
							<th scope="row">
							</th>
							<td>
								<h2>How did you hear about us?</h2>
								<select name="member_source" class="input">
									{select_member_source} 
									<option value="{value}" {selected}>{value}</option> 
									{/select_member_source}
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row">
							</th>
							<td>
								<p id="terms-conditions">
									<input class="checkbox" type="checkbox" name="accept_terms">
									<span>I agree to the <a href="{path='about/terms-of-use'}">terms</a> and <a href="{path='about/privacy-policy'}">conditions</a> which include receiving a monthly eNewsletter.</span>
								</p>
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
					{select_member_groups} 
					<input type="checkbox" value="{group_id}" checked="checked" />{group_title}
					{/select_member_groups}
					<?php if (isset($_POST['member_age'])) { ?>
						<div class="hidden">
							<input class="hidden" type="hidden" name="member_age" value="<?php echo $_POST['member_age']; ?>" />
							<input class="hidden" type="hidden" name="member_weight" value="<?php echo $_POST['member_weight']; ?>" />
							<input class="hidden" type="hidden" name="member_height_in" value="<?php echo $_POST['member_height_in']; ?>" />
							<input class="hidden" type="hidden" name="member_waist_in" value="<?php echo $_POST['member_waist_in']; ?>" />
							<input class="hidden" type="hidden" name="member_score_sleep" value="<?php echo $_POST['member_score_sleep']; ?>" />
							<input class="hidden" type="hidden" name="member_score_exercise" value="<?php echo $_POST['member_score_exercise']; ?>" />
							<input class="hidden" type="hidden" name="member_score_alcohol" value="<?php echo $_POST['member_score_alcohol']; ?>" />
							<input class="hidden" type="hidden" name="member_score_smoking" value="<?php echo $_POST['member_score_smoking']; ?>" />
							<input class="hidden" type="hidden" name="member_score_diet" value="<?php echo $_POST['member_score_diet']; ?>" />
							<input class="hidden" type="hidden" name="member_score_nutrition" value="<?php echo $_POST['member_score_nutrition']; ?>" />
							<input class="hidden" type="hidden" name="member_score_emotional" value="<?php echo $_POST['member_score_emotional']; ?>" />
							<input class="hidden" type="hidden" name="member_score_total" value="<?php echo $_POST['member_score_total']; ?>" />
							<input class="hidden" type="hidden" name="member_score_history" value='<?php echo stripslashes($_POST['member_score_history']); ?>' />
						</div>
					<?php } ?>
					
				{/exp:user:register}
				
			</div>
			
			<div class="sidebar  right">
			
				<header class="bar">My Information</header>
				<p class="fine-print">By providing your information, you will be enrolled as a {site_name} member. With this, you will receive email communications with healthy videos, articles, recipes and tips for improving your life, plus details on members-only events and discounts. <strong>Membership is FREE.</strong> Your information will never be shared with a third party, and you can opt out at any time.</p>
				
			</div>
			
		</div>
	
	</div><!-- /body -->

{sn_footer}
{sn_scripts}

<script src="{site_url}/assets/js/spin.min.js"></script>
<script type="text/javascript">
//Spin.js loading indicator

	var opts = {
		lines: 12,
		length: 4,
		width: 2,
		radius: 6,
		color: '#9f9e9b',
		speed: 1.3,
		trail: 70,
		shadow: false
	};
	var target = document.getElementById('js-load-form');
	var spinner = new Spinner(opts).spin(target);
	
	var searchOpts = {
		lines: 11, // The number of lines to draw
		length: 2, // The length of each line
		width: 2, // The line thickness
		radius: 4, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#000', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 57, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};
	var target = document.getElementById('search-loader');
	var spinner = new Spinner(searchOpts).spin(target);
	
// End Spin.js parameters
</script>

<script src="{site_url}/assets/js/jquery.validate.min.js"></script>
<script src="{site_url}/assets/js/member-register.js"></script>

<script src="{site_url}/assets/js/jquery-ui-autocomplete.js"></script>
<script src="{site_url}/assets/js/jquery.select-to-autocomplete.min.js"></script>

<script type="text/javascript" charset="utf-8">

jQuery(document).ready(function($){

	$("#searching").hide();

	$("#register").slideDown('slow').css({opacity:0}).animate({"opacity": 1}, "slow");
	$("#loading-form").fadeOut(500);

	$('#country_selector').selectToAutocomplete();
	
	$("#edit-address").hide();
	
	$("#jq_edit-address-results").click(function(){
		$("#results").hide();
		$("#edit-address").show();
		$("#member_city").focus();
		return false;
	});
	
	$("#jq_save-address-results").click(function(){
		$("#edit-address").hide();
		$("#results").show();
		$("#member_phone").focus();
		return false;
	});
	
	$(".country-selector.ui-autocomplete-input").blur(function() {
		var memberCountry = $(this).val();
		$("#member_country").val(memberCountry);
	});
	
	$("#member_city").keyup(function() {
		var city = $(this).val();
		$("#results-city").html(city);
	});
	
	$("#member_state").keyup(function() {
		var state = $(this).val();
		$("#results-state").html(state);
	});

});
</script>
	
	
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function addressLookUp(form, resultHandler) {

	var address = form.member_address.value;
	var zipcode = form.member_zip.value;
	var country = form.country_selector.value;
	
	if (zipcode != "") {
	
	$("#results").hide();
	
	$("#searching").fadeIn(300);
	
		geocoder.geocode( { 'address': zipcode + '+' + address, 'region': country}, function (result, status) {
		
			var state = "--";
			var city = "--";
			
			document.getElementById('results-city').innerHTML = city;
			document.getElementById('results-state').innerHTML = state;
			
			for (var component in result[0]['address_components']) {
				for (var i in result[0]['address_components'][component]['types']) {
					
					if (result[0]['address_components'][component]['types'][i] == "postal_town") {
						city = result[0]['address_components'][component]['short_name'];
						document.getElementById('member_city').value = city;
						document.getElementById('results-city').innerHTML = city;
					}
					
					if (result[0]['address_components'][component]['types'][i] == "locality") {
						city = result[0]['address_components'][component]['short_name'];
						document.getElementById('member_city').value = city;
						document.getElementById('results-city').innerHTML = city;
					}
					
					if (result[0]['address_components'][component]['types'][i] == "sublocality") {
						city = result[0]['address_components'][component]['short_name'];
						document.getElementById('member_city').value = city;
						document.getElementById('results-city').innerHTML = city;
					}
					
					if (result[0]['address_components'][component]['types'][i] == "administrative_area_level_1") {
						state = result[0]['address_components'][component]['short_name'];
						document.getElementById('member_state').value = state;
						document.getElementById('results-state').innerHTML = state;
					}
				
				}
			}
			
			$("#searching").fadeOut(300);
			
			$("#results").show();
			
			return;
		});
	
	}
	
}
</script>

{gv_analytics}
</body>
</html>