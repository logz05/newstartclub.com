</div><!-- /.body -->
<footer class="footer">
	<p>A FREE community service of <a href="http://newstart.com/">NEWSTART&reg;</a>. &copy; 2010-{current_time format="%Y"}. All Rights Reserved..</p>
	<p><a href="/about/privacy-policy">Privacy Policy</a> | <a href="/about/terms-of-use">Terms of Use</a> | <a href="/faq">FAQ</a></p>
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
{if "{embed:script_add}"}
	<?php $splitcontents = explode('|', '{embed:script_add}');
	foreach($splitcontents as $file) {
	 echo '<script src="/assets/js/'.$file.'.js"></script>'."\n";
	} ?>
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
{if segment_2 == "add-event"}
	<script src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
			CKEDITOR.replace( 'field_id_35',
			{
				customConfig : '/ckeditor-custom/config_custom.js',
				toolbar: 'SponsorToolbar'
			});
	</script>
{/if}
</body>
</html>