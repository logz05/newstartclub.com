{if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }

{if:else}
	{redirect="404"}
{/if}
{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
<div class="body">
	<div class="heading clearafter">
		<div class="icon"></div><h1>{section}</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="list left">
			<ul>
				{exp:weblog:entries weblog="{channel}" sort="asc" limit="9" orderby="partner_last_name" paginate="bottom" disable="member_data|trackbacks" dynamic="off"}
				<li class="partner clearafter">
					<a href="{url_title_path='{channel}/detail'}" class="image">
						{exp:ce_img:single src="{partner_photo}" max_width="100" max_height="100" crop="yes" attributes='alt="{title}" title="{title}"'}
					</a>
					<div class="info">
						<h1 class="name"><a href="{url_title_path='{channel}/detail'}">{title}{if partner_cred != ""}, {partner_cred}{/if}</a>{embed="includes/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}"}</h1>
						<p class="bio">
							{exp:html_strip}
								{exp:char_limit total="200"}{partner_bio}{/exp:char_limit}
							{/exp:html_strip}<a class="link-more" href="{url_title_path='{channel}/detail'}">more&raquo;</a>
						</p>
					</div>
				</li>
					{paginate}
						{if "{total_pages}" > 1}
							<li class="pagination">
								<p>{pagination_links}</p>
							</li>
						{/if}
					{/paginate}
				{/exp:weblog:entries}
			</ul>
		</div><!--/.list-->
		<div class="sidebar right">
			<div class="bar">Partners</div>
			<p>We have selected some of the best health presenters across the country to provide you with credible and practical health information. Our partners are selected both for the quality of their information and the clarity of their presentations.</p>
			<p>If you are interested in becoming a club partner, email <a href="mailto:club@newstart.com">club@newstart.com</a></p>
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}