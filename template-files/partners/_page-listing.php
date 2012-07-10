<ul class="listing">
  {exp:weblog:entries weblog="partners" sort="asc" limit="9" orderby="partner_last_name" paginate="bottom" disable="member_data|trackbacks" dynamic="off" {embed:parameters}}
  <li class="partner clearfix">
    <a href="{url_title_path='partners/detail'}" class="image">
      {exp:ce_img:single src="{partner_photo}" max_width="100" max_height="100" crop="yes" attributes='alt="{title}" title="{title}"'}
    </a>
    <div class="info">
      <h2><a href="{url_title_path='partners/detail'}">{title}{if partner_cred != ""}, {partner_cred}{/if}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
      <p class="bio">
        {exp:html_strip}
          {exp:char_limit total="200"}{partner_bio}{/exp:char_limit}
        {/exp:html_strip}<a class="link-more" href="{url_title_path='partners/detail'}">more&raquo;</a>
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