{embed="includes/_doc-top" 
  channel="{channel}"
  title="
        {if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }
          {section}
        {if:else}
          {section} in {exp:weblog:entries weblog="{channel}" limit="1" search:partner_state="={segment_3}" dynamic="off"}{partner_state:label}{/exp:weblog:entries}
        {/if}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
<div class="body">
  {if segment_2 == "state"}
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}">{section}</a></li>
  </ul>
  {/if}
  <div class="heading clearafter">
    {if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }
    <div class="icon"></div>
    <h1>{section}</h1>
    {if:else}
    <h1>{exp:weblog:entries weblog="{channel}" limit="1" search:partner_state="={segment_3}" dynamic="off"}{partner_state:label}{/exp:weblog:entries}</h1>
    {/if}
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <ul>
      {if segment_2 == "state" && segment_3}
        {exp:weblog:entries weblog="{channel}" sort="asc" limit="9" orderby="partner_last_name" search:partner_state="={segment_3}" paginate="bottom" disable="member_data|trackbacks" dynamic="off"}
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
      {if:else}
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
      {/if}
      </ul>
    </div><!--/.list-->
    <div class="sidebar right">
      {embed="partners/_sidebar"}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
  <div id="rss-feed">
    <a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
      <div class="icon"></div><span>RSS Feed</span>
    </a>
  </div>
</div><!-- /.body -->
{embed="includes/_doc_bottom"}