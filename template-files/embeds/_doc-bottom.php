</div><!-- /.body -->
<footer class="footer">
	<p>A FREE community service of <a href="http://newstart.com/">NEWSTART&reg;</a>. &copy; 2010-{current_time format="%Y"}. All Rights Reserved.</p>
	<p><a href="/about/privacy-policy">Privacy Policy</a> | <a href="/about/terms-of-use">Terms of Use</a> | <a href="/faq">FAQ</a> | <a href="/news">Blog</a></p>
</footer>
{embed="embeds/_signin-mini"}
{if "{embed:sponsor-apply}"}
	{embed="sponsors/_apply-modal"}
{/if}
{if segment_2 == "tell-me-more"}{embed="my_health/_locations-modal"}{/if}
{if "{embed:sim}"}
	<?php 
	$modal = explode('|', '{embed:sim}');
	foreach($modal as $file) {
		echo '{embed="embeds/_signin-modal modal-role="'. $file .'"}'."\n";
	} ?>
{/if}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
{if logged_out}<script src="/assets/js/jquery.reveal.js"></script>{/if}
<script src="/assets/js/common.js"></script>

{if "{embed:script_add}"}
	<?php $splitcontents = explode('|', '{embed:script_add}');
	foreach($splitcontents as $file) {
	 echo '<script src="/assets/js/'.$file.'.js"></script>'."\n";
	} ?>
{/if}


{if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0")}
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
	<script type="text/javascript">
			CKEDITOR.replace( 'field_id_375',
			{
				customConfig : '/ckeditor-custom/config_custom.js',
				toolbar: 'SponsorToolbar'
			});
	</script>
	<script type="text/javascript">
			CKEDITOR.replace( 'field_id_35',
			{
				customConfig : '/ckeditor-custom/config_custom.js',
				toolbar: 'SponsorToolbar'
			});
	</script>
	<script type="text/javascript">
		$(function() {
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
		});
	</script>
{/if}
</body>
</html>