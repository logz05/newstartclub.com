{embed="embeds/_doc-top" 
	class="my-health"
	title="Your request has been sent!"
	add="pp/prettyPhoto|vimeo"
}
	<ul class="trail">
		<li><a href="{path='site_index'}">Home</a></li>
		<li><a href="{path='my-health'}">My Health</a></li>
	</ul>
	<div class="heading clearfix">
		<h1>Congratulations!</h1>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
			<div class="post">
				<p>You have taken an important first step to improving your health naturally. A NEWSTART&reg; representative will contact you shortly. In the meantime, check out the following videos to find out how NEWSTART&reg; has helped others get well or visit <a href="http://www.newstart.com/" title="www.newstart.com">www.newstart.com</a> to learn more.</p>
				<div class="vimeoBadge">
					<script type="text/javascript" src="http://vimeo.com/weimartv/badgeo/?stream=channel&amp;stream_id=39106&amp;count=12&amp;thumbnail_width=100&amp;show_titles=yes"></script>
				</div>
				<p><a href="{path='my-health/results'}">&laquo; Back to my results</a></p>
			</div>
		</div>
		<div class="sidebar right">
			<header class="bar">Contact Us</header>
			<img src="{site_url}/assets/images/my-health/NEWSTART.png" width="190" />
			<p class="center">20601 West Paoli Lane<br />Weimar, CA 95736</p>
			<p class="center">(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;">www.newstart.com</a></p>
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
<script type="text/javascript">
	$(document).ready(function(){
		$('.vimeoBadge .clip a').attr('rel', 'prettyPhoto');
		$('.vimeoBadge a img').attr('alt', 'NEWSTART Now');
		$('.vimeoBadge a img').attr('class', 'image');
		$(".clip").each(function(){
					alt = $(this).find("img").attr("alt");
					title = $(this).find(".caption a").text();
					$(this).find("> a").attr("title", title);
			});
		$(".vimeoBadge a[rel^='prettyPhoto']")
		.prettyPhoto({
			theme:'dark_rounded',
			animationSpeed: 'slow'
		});
	});
</script>
{embed="embeds/_doc-bottom" script_add="jquery.prettyPhoto_3.0"}