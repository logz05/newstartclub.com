<section class="section social-links{if embed:class} {embed:class}{/if}">
	<header class="bar" data-icon="u">Share</header>
	
	{!-- Moved the rest of the Facebook script to _doc-top.php to fix an off-center page issue --}
	
	<div class="fb-like" data-href="{exp:weblog:entries weblog='{embed:channel}' url_title='{segment_3}'}{title_permalink='{embed:channel}/detail'}{/exp:weblog:entries}" data-send="true" data-layout="button_count" data-width="190" data-show-faces="false" data-font="lucida grande"></div>
	
	<a href="https://twitter.com/share" class="twitter-share-button" data-via="newstartweimar">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
	<div class="g-plus-button">
		<!-- Place this tag where you want the +1 button to render. -->
		<div class="g-plusone" data-size="medium" data-href="{exp:weblog:entries weblog='{embed:channel}' url_title='{segment_3}'}{title_permalink='{embed:channel}/detail'}{/exp:weblog:entries}"></div>
		
		<!-- Place this tag after the last +1 button tag. -->
		<script type="text/javascript">
			(function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		</script>
	</div>
	<div class="pin-it">
		<a href="http://pinterest.com/pin/create/button/?url={exp:weblog:entries weblog='{embed:channel}' url_title='{segment_3}' show_future_entries='yes' show_expired='yes'}{title_permalink='{embed:channel}/detail'}&media={exp:ce_img:pair src='{embed:image}' max_width='300' max_height='225' crop='yes'}http://newstartclub.com{made}{/exp:ce_img:pair}{/exp:weblog:entries}" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
		<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
	</div>
</section>