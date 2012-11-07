</div><!-- /.body -->
<footer class="footer">
	<p>A FREE community service of <a href="http://newstart.com">NEWSTART&reg;</a>. &copy; 2010-{current_time format="%Y"}. All Rights Reserved.</p>
	<p>
		<a href="{path='about/privacy-policy'}">Privacy Policy</a> |
		<a href="{path='about/terms-of-use'}">Terms of Use</a> |
		<a href="{path='locations'}">Locations</a> |
		<a href="{path='news'}">Blog</a> |
		<a href="http://newstart.com/store">Store</a>
	</p>
</footer>
{embed="embeds/_signin-mini"}
{if "{embed:sponsor-apply}"}
	{embed="sponsors/_apply-modal"}
{/if}
{if segment_2 == "tell-me-more"}{embed="my-health/_locations-modal"}{/if}
{if "{embed:sim}"}
	<?php 
	$modal = explode('|', '{embed:sim}');
	foreach($modal as $file) {
		echo '{embed="embeds/_signin-modal modal-role="'. $file .'"}'."\n";
	} ?>
{/if}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
{if "{embed:show-coupons}"}
<script type="text/javascript" src="{site_url}/assets/js/jquery.zclip.min.js"></script>

	{exp:channel:entries channel="deals" entry_id="{embed:show-coupons}" show_expired="yes" show_future_entries="yes" orderby="date" sort="asc" dynamic="no"}
		<div id="modal-coupon-{entry_id}" class="deals reveal-modal">
			<div class="coupon post">
				<div class="sponsor">{categories show_group="24"}{category_name}{/categories}</div>
				<div class="deal-title">{title}</div>
				<div class="code">Coupon code: <span id="code-{entry_id}">{deal_code}</span></div>
				<div class="instructions">
					{deal_instructions}
					<p class="valid">Valid from {entry_date format="%F %j%S, %Y"}{if expiration_date} to {expiration_date format="%F %j%S, %Y"}{/if}</p>
				</div>
				<div class="terms">{deal_terms}</div>
				<div class="url"><span>newstartclub.com/deal/{entry_id}</span></div>
				<i>t</i>
			</div>
			<div class="button-wrap center">
			{categories show_group="45"}
				{if category_id == "449"}
					<a href="{path='deals/online/{entry_id}'}" id="copy-coupon-{entry_id}" class="super secondary button" target="_blank"><span>Copy</span></a>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#copy-coupon-{entry_id}').zclip({
									path:'/assets/js/ZeroClipboard.swf',
									copy:$('#code-{entry_id}').text(),
									afterCopy:function(){
										window.open('/deals/online/{entry_id}', '_blank');
									}
							});
						});
					</script>
				{/if}
			{/categories}
			<a href="{url_title_path='deals/coupon'}" class="super secondary button print-coupon" target="_blank"><span>Print</span></a></div>
			<a class="close-modal close">&times;</a>
		</div>
		
	{/exp:channel:entries}
{/if}
<script src="{site_url}/assets/js/jquery.reveal.js"></script>
<script src="{site_url}/assets/js/common.js"></script>

{if "{embed:script_add}"}
	<?php $splitcontents = explode('|', '{embed:script_add}');
	foreach($splitcontents as $file) {
	 echo '<script src="{site_url}/assets/js/'.$file.'.js"></script>'."\n";
	} ?>
{/if}


{if segment_1 && (segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0"))}
	<script type="text/javascript">
	$(document).ready(function(){
		//Toggle list
		$(".sidebar h2").click(function(){
			$(this).next("ul").slideToggle(400)
			$(this).children(".arrow").toggle()
			return false;
		});
	});
	</script>
{if:else}
	{if segment_1 == "sponsors" && segment_3}
		<script type="text/javascript">
		$(document).ready(function(){
			
			//Hide all lists except the one for the current section
			$(".sidebar h2").children(".arrow").toggle();
			$(".sidebar ul.filter-list").not(".filter-list.{segment_3}").hide();
			$(".sidebar h2.{segment_3}").children(".arrow").toggle();
			
			//Toggle lists
			$(".sidebar h2").click(function(){
				$(this).next("ul").slideToggle(400)
				$(this).children(".arrow").toggle()
				return false;
			});
		
		});
		</script>
	{if:elseif segment_1 != "sponsors" && segment_1 !=""}
		<script type="text/javascript">
		$(document).ready(function(){
			
			//Hide all lists except the one for the current section
			$(".sidebar h2").children(".arrow").toggle();
			$(".sidebar ul.filter-list").not(".filter-list.{segment_2}").hide();
			$(".sidebar h2.{segment_2}").children(".arrow").toggle();
			
			//Toggle lists
			$(".sidebar h2").click(function(){
				$(this).next("ul").slideToggle(400)
				$(this).children(".arrow").toggle()
				return false;
			});
		
		});
		</script>
	{/if}
{/if}

{if segment_2 == "send-email"}
	<script src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'custom-message',
			{
				customConfig : '/ckeditor-custom/config_custom.js',
				toolbar: 'SponsorToolbar'
			});
	</script>
{/if}
{if segment_2 == "add-deal" || segment_2 == "add-event" || segment_2 == "edit-deal" || segment_2 == "edit-event"}
	<script src="/ckeditor/ckeditor.js"></script>
	{if segment_2 == "add-deal" || segment_2 == "edit-deal"}
	<script type="text/javascript">
			CKEDITOR.replace( 'deal_instructions',
			{
				customConfig : '/ckeditor-custom/config_custom.js',
				toolbar: 'SponsorToolbar'
			});
	</script>
	{/if}
	{if segment_2 == "add-event" || segment_2 == "edit-event"}
	<script type="text/javascript">
			CKEDITOR.replace( 'event_description',
			{
				customConfig : '/ckeditor-custom/config_custom.js',
				toolbar: 'SponsorToolbar'
			});
	</script>
	{/if}
	<script type="text/javascript">
	
	$( "#entry_datepicker" ).datepicker({
		altField: "#entry_date",
		altFormat: "yy-mm-dd '12:00 AM'",
		dateFormat: "mm/dd/yy",
		minDate: -0,
		numberOfMonths: 1,
		dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
		onSelect: function( selectedDate ) {
			$( "#expiration_datepicker" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#expiration_datepicker" ).datepicker({
		altField: "#expiration_date",
		altFormat: "yy-mm-dd '11:59 PM'",
		dateFormat: "mm/dd/yy",
		minDate: -0,
		numberOfMonths: 1,
		dayNamesMin: ["S", "M", "T", "W", "T", "F", "S"],
		onSelect: function( selectedDate ) {
			$( "#entry_datepicker" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	</script>
{/if}
</body>
</html>