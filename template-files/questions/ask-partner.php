{embed="embeds/_doc-top" 
	class="questions"
	title="Choose Partner"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='questions'}">Questions</a></li>
</ul>
<div class="heading clearfix">
	<h1>Choose Partner</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<p>Choose one of our partners below to answer your question.</p>
		{embed="questions/_partner-list"
			cat_ids='{exp:user:users group_id="6" dynamic="off" search:member_partner_id="IS_NOT_EMPTY" backspace="1"}{member_partner_id}|{/exp:user:users}'
		}
	</div>
	<div class="sidebar right">
		<section class="section">
			<header class="bar">Privacy</header>
			<p>Your personal information will not be shared with any third party. If we use your question on our site your information will remain anonymous.</p>
		</section>
	</div>
</div>
{embed="embeds/_doc-bottom" sim="comments"}