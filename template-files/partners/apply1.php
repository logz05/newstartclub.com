{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Partnership Application"
		section=""
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

<body>

{if logged_out}
	{redirect="partners"}
{/if}

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>

	<div class="body  services">
	
		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='partners'}">Partners</a></li>
		</ul>
		
		<header class="heading">
			<h1 class="post__title">Partnership Application</h1>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">

				{exp:freeform:form
					form_name="partner_application"
					required="ff_first_name|ff_last_name"
					return="partners/application-submitted"
					class=""
				}
					<table>
						{exp:user:stats dynamic="off"}
						<tr>
							<th scope="row"><label for="ff_first_name">First Name</label></th>
							<td><input type="text" class="input" name="ff_first_name" id="ff_first_name" value="{member_first_name}" size="20" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="ff_last_name">Last Name</label></th>
							<td><input type="text" class="input" name="ff_last_name" id="ff_last_name" value="{member_last_name}" size="22" /></td>
						</tr>
						<tr>
							<th scope="row">
								<label for="partner_credentials">Credentials</label>
							</th>
							<td>
								<input type="text" name="partner_credentials" class="input" id="partner_credentials" size="8" value="" />
								<p class="instructions">i.e. MD, RN, MPH, etc.</p>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="partner_specialty">Specialty</label>
							</th>
							<td>
								<input type="text" name="partner_specialty" class="input" id="partner_specialty" value="" size="23" value="" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_message">Biography</label>
							</th>
							<td>
								<textarea class="input" id="ff_message" name="ff_message" rows="5" cols="28" autocomplete="off"></textarea>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_image_upload">Picture</label>
								<div></div>
							</th>
							<td>
								{freeform:field:ff_image_upload} 
								<p class="instructions">Accepted file types: .jpg, .png, .gif</p>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_address">Business Address</label>
							</th>
							<td>
								<input type="text" name="ff_address" class="input" id="ff_address" size="32" value="" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_city">City</label>
							</th>
							<td>
								<input type="text" name="ff_city" class="input" id="ff_city" value="" size="20" value="" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_state">State</label>
							</th>
							<td>
								<select name="ff_state" class="input"> 
							<option value="--">--</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="PR">Puerto Rico</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="VI">Virgin Islands</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_zip_code">Zip Code</label>
							</th>
							<td>
								<input type="text" name="ff_zip_code" class="input" id="ff_zip_code" value="" size="7" value="" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_phone">Business Phone</label>
							</th>
							<td>
								<input type="text" name="ff_phone" class="input" id="ff_phone" value="" size="15" value="" />
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="ff_affiliation">Local Church Affiliation</label>
							</th>
							<td>
								<input type="text" name="ff_affiliation" class="input" id="ff_affiliation" size="20" value="" />
							</td>
						</tr>
						<tr>
							<th scope="row">
							</th>
							<td>
								<p class="instructions">It may take up to a few minutes to send your application depending on your picture size.</p>
								<p class="button-wrap">
									<button type="submit" class="super green button"><span>Submit</span></button>
									<input type="text" class="input hidden" name="ff_sender_email" id="ff_sender_email" value="{email}" size="28" />
								</p>
							</td>
						</tr>
						{/exp:user:stats}
					</table>
				{/exp:freeform:form}
			</div>
			
			<div class="sidebar  right">
				<header class="bar">Partnership Application</header>
				<p>{site_name} partners must be individuals that abide by and promote the principles of the <a href="http://newstart.com">NEWSTART&reg;</a> acronym and should be in harmony with the teachings of the Seventh-day Adventist Church. We reserve the right to deny or revoke partnership.</p>
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
<script src="{site_url}/assets/js/sponsor-application.js"></script>

<script src="{site_url}/assets/js/jquery-ui-autocomplete.js"></script>
<script src="{site_url}/assets/js/jquery.select-to-autocomplete.min.js"></script>

<script type="text/javascript" charset="utf-8">

jQuery(document).ready(function($){

	$("#searching").hide();

	$("#sponsor_register").slideDown('slow').css({opacity:0}).animate({"opacity": 1}, "slow");
	$("#loading-form").fadeOut(500);

	$('#country_selector').selectToAutocomplete();
	
	$("#edit-address").hide();
	
	$("#jq_edit-address-results").click(function(){
		$("#results").hide();
		$("#edit-address").show();
		$("#ff_sponsor_city").focus();
		return false;
	});
	
	$("#jq_save-address-results").click(function(){
		$("#edit-address").hide();
		$("#results").show();
		$("#ff_sponsor_phone").focus();
		return false;
	});
	
	$(".ff_sponsor_country.ui-autocomplete-input").blur(function() {
		var sponsorCountry = $(this).val();
		$("#ff_sponsor_country").val(sponsorCountry);
	});
	
	$("#ff_sponsor_city").keyup(function() {
		var city = $(this).val();
		$("#results-city").html(city);
	});
	
	$("#ff_sponsor_state").keyup(function() {
		var state = $(this).val();
		$("#results-state").html(state);
	});

});
</script>
	
	
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function addressLookUp(form, resultHandler) {

	var address = form.ff_sponsor_address.value;
	var zipcode = form.ff_sponsor_zip_code.value;
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
						document.getElementById('ff_sponsor_city').value = city;
						document.getElementById('results-city').innerHTML = city;
					}
					
					if (result[0]['address_components'][component]['types'][i] == "locality") {
						city = result[0]['address_components'][component]['short_name'];
						document.getElementById('ff_sponsor_city').value = city;
						document.getElementById('results-city').innerHTML = city;
					}
					
					if (result[0]['address_components'][component]['types'][i] == "sublocality") {
						city = result[0]['address_components'][component]['short_name'];
						document.getElementById('ff_sponsor_city').value = city;
						document.getElementById('results-city').innerHTML = city;
					}
					
					if (result[0]['address_components'][component]['types'][i] == "administrative_area_level_1") {
						state = result[0]['address_components'][component]['short_name'];
						document.getElementById('ff_sponsor_state').value = state;
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
{embed="embeds/_doc-bottom"}