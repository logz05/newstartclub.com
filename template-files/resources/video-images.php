 {exp:channel:entries channel="resources" limit="500" category="146" dynamic="no" disable="member_data|categories"}
          <li class="resource">
            <a href="{url_title_path='resources/detail'}" class="image">
              {if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
              {exp:ce_img:single src="{resource_thumb}" max_width="490" crop="yes" attributes='alt="{title}" title="{title}"'}
            </a>
            <span class="title"><a href="{url_title_path='resources/detail'}">{title} - Entry ID {entry_id}</a></span>
          </li>
        {/exp:channel:entries}