<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );

?>
{embed="embeds/_doc-top"
  channel="home"
  title="
    {if logged_in}
      {exp:user:stats dynamic="off"}
        Hello, <?php echo ucwords(strtolower("{firstName}")); ?>
      {/exp:user:stats}
    {/if}
    {if logged_out}
      Live Well Naturally
    {/if}
"}
  {if logged_out}
    <div id="intro-heading" class="clearfix">
      <p class="button-wrap">
        <a href="/register" class="giant super green button"><span>Get Started &raquo;</span></a>
      </p>
      <h1>Live Well Naturally.</h1>
      <h2>Experience the <a href="http://www.newstart.com/newstart/what-is-newstart/">NEWSTART&reg;</a> lifestyle&mdash;the most natural way to:</h2>
      <ul class="first">
        <li>Eat well and lose weight</li>
        <li>Reduce your chance of disease</li>
        <li>Cut healthcare costs</li>
      </ul>
      <ul>
        <li>Look and feel better</li>
        <li>Minimize your risks for Cancer, Obesity, Diabetes and Hypertension</li>
      </ul>
    </div>
  {if:else}
    <div class="heading clearfix">
      <div class="icon"></div>
      {exp:user:stats dynamic="off"}
        <h1>Welcome home, <span><?php echo ucwords(strtolower("{firstName}")); ?></span></h1>
      {/exp:user:stats}
    </div>
  {/if}
  <div class="grid23 clearfix">
    <div class="main left">
      <div class="resources">
        <div class="bar"><a href="/resources">Featured Resources</a></div>
        <h2>Videos</h2>
        <ul class="clearfix">
        {exp:weblog:entries weblog="resources" limit="4" category="146" orderby="random" dynamic="off" disable="member_data|categories"}
          <li class="resource">
            <a href="{url_title_path='resources/detail'}" class="image">
              {if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
              {exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
            </a>
            <span class="title"><a href="{url_title_path='resources/detail'}">{exp:char_limit total="22"}{title}{/exp:char_limit}</a></span>
          </li>
        {/exp:weblog:entries}
        </ul>
        <h2>Articles</h2>
        <ul class="clearfix">
        {exp:weblog:entries weblog="resources" limit="4" category="145" orderby="random" dynamic="off" disable="member_data|categories"}
          <li class="resource">
            <a href="{url_title_path='resources/detail'}" class="image">
              {exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
            </a>
            <span class="title"><a href="{url_title_path='resources/detail'}">{exp:char_limit total="22"}{title}{/exp:char_limit}</a></span>
          </li>
        {/exp:weblog:entries}
        </ul>
        <h2>Recipes</h2>
        <ul class="clearfix">
        {exp:weblog:entries weblog="resources" limit="4" category="148" orderby="random" dynamic="off" disable="member_data|categories"}
          <li class="resource">
            <a href="{url_title_path='resources/detail'}" class="image">
              {exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
            </a>
            <span class="title"><a href="{url_title_path='resources/detail'}">{exp:char_limit total="22"}{title}{/exp:char_limit}</a></span>
          </li>
        {/exp:weblog:entries}
        </ul>
      </div>
      <div class="events">
        <div class="bar"><a href="{path='events'}">Upcoming Events</a></div>
        <ul>
        {exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" show_future_entries="yes" show_expired="no" limit="2"}
          <li class="event" id="{exp:nice_date date='{event_start_date}' format='%Y-%m-%d'}">
            {assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}
            {assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
            <h2>
              <a href="{url_title_path='events/detail'}">{title}</a>
              <div class="date">
                <span class="day">{exp:nice_date date="{event_start_date}" format="%d"}</span>
                <span class="month">{exp:nice_date date="{event_start_date}" format="%M"}</span>
                <span class="year">{exp:nice_date date="{event_start_date}" format="%Y"}</span>
                <span class="time">
                  {!-- Check if event is only on one date and time is set --}
                  {if event_start_date == event_end_date && event_start_time !=""}
                    {exp:nice_date date="{event_start_time}" format="%g:%i %a"} - {exp:nice_date date="{event_end_time}" format="%g:%i %a"}
                  {/if}
                  
                  {!-- Check if event is only on one date and time is NOT set --}
                  {if event_start_date == event_end_date && event_start_time == ""}
                    All Day
                  {/if}
                  
                  {!-- Check to see if repeating event --}
                  {if (event_start_date != event_end_date)}
                    {exp:nice_date date="{event_start_date}" format="%M %j"} - {exp:nice_date date="{event_end_date}" format="%M %j"}
                  {/if}
                </span>
              </div>
            </h2>
            <h3><a href="/events/locations/{event_state}/{event_city}">{event_city}, {event_state}</a></h3>
          </li>
        {/exp:weblog:entries}
        </ul>
      </div>
      
      <div class="news">
        <div class="bar"><a href="/news">Latest Updates</a></div>
        <ul id="listing">
          {exp:weblog:entries weblog="resources|events|partners|locations|questions" limit="5" orderby="date" sort="desc" dynamic="off" show_future_entries="yes"}
          <li class="entry {weblog_short_name}">
            <h2>
              <a href="/{weblog_short_name}/detail/{url_title}">
                {if weblog_short_name == 'questions'}
                  {exp:char_limit total="35"}{qa_question}{/exp:char_limit}
                {if:else}
                  {exp:char_limit total="35"}{title}{/exp:char_limit}
                {/if}
              </a>
            </h2>
            <div class="date">
              <span class="timeago">{if entry_date > current_time}Upcoming{if:else}<?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?>{/if}</span>
              <span class="entry-date">{entry_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
            </div>
          </li>
          {/exp:weblog:entries}
        </ul>
      </div>
    </div>

    <div class="right sidebar">
      <div class="my_health">
          {if logged_out}
          <div class="bar"><a href="/my_health">The HealthGauge<sup>&trade;</sup></a></div>
            <a href="/signin" data-reveal-id="signin-modal-health-gauge">
              <div id="gauge"></div>
            </a>
            <p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
            <p class="button-wrap">
              <a href="/signin" class="super small secondary button" data-reveal-id="signin-modal-health-gauge"><span>Calculate</span></a>
            </p>
          {/if}
          {if logged_in}{exp:user:stats}{/if}
          {if logged_in && memberScoreTotal == ""}
          <div class="bar"><a href="/my_health">The HealthGauge<sup>&trade;</sup></a></div>
            <a href="/my_health/calculator">
              <div id="gauge"></div>
            </a>
            <p>This health score calculator will evaluate your risk of developing a lifestyle related disease by comparing your personal health practices with modern scientific information.</p>
            <p class="button-wrap">
              <a href="/my_health/calculator" class="super small secondary button"><span>Calculate</span></a>
            </p>
          {/if}
          
          {if logged_in && memberScoreTotal != ""}
          <div class="bar"><a href="/my_health">My Health</a></div>
            <h2 class="my_health">Health Score Results</h2>
            <h3 class="total-score">
              <a href="/my_health/results">{exp:user:stats dynamic="off"}{memberScoreTotal}{/exp:user:stats}</a>
            </h3>
            <p class="center"><a href="/my_health/calculator">Recalculate</a></p>
            <p class="button-wrap center">
              <a href="/my_health/results" class="super small secondary button"><span>View Recommendations</span></a>
            </p>
          {/if}
          {if logged_in}{/exp:user:stats}{/if}
      </div>
    {if logged_in}
      <div class="members">
        <div class="bar"><a href="/settings">My Interests</a></div>
          <ul>
            {exp:user:stats}{categories group_id="14|15"}
              {category_body}<li><a href="{path='resources/{reg1_path}{reg2_path}'}">&raquo; {category_description}</a></li>
              {/category_body}{/categories}
            {/exp:user:stats}
          </ul>
          <p class="button-wrap">
            <a href="/settings" class="super small secondary button"><span>Update my interests</span></a>
          </p>
      </div>
      <div class="events">
        <div class="bar"><a href="/events">RSVP List</a></div>
        {embed="events/_rsvp-list"}
      </div>
    {/if}
    {if logged_out}
      <div class="resources">
        <div class="bar"><a href="/resources">Resource Topics</a></div>
        <h2>Health Conditions</h2>
        <ul>
          <?php
              $categories = array(
              {exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="17" backspace="1"}
                '{count}' => '<li><a href="{path=\'resources/health-conditions/{category_url_title}\'}">{category_name}</a></li>',
              {/exp:weblog:categories}
              );
              for ($i = 1; $i <= 11; $i++) {
                echo $categories[$i] . "\n";
              };
            ?>
          <li class="see-more"><a href="/resources">See more &raquo;</a></li>
        </ul>
        <h2>Living Better</h2>
        <ul>
          <?php
            $categories = array(
            {exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="19" backspace="1"}
              '{count}' => '<li><a href="{path=\'resources/living-better/{category_url_title}\'}">{category_name}</a></li>',
            {/exp:weblog:categories}
            );
            for ($i = 1; $i <= 11; $i++) {
              echo $categories[$i] . "\n";
            };
          ?>
          <li class="see-more"><a href="/resources">See more &raquo;</a></li>
        </ul>
        <h2>Recipes</h2>
        <ul>
          <?php
            $categories = array(
            {exp:weblog:categories weblog="resources" style="linear" show_empty="no" category_group="39" backspace="1"}
              '{count}' => '<li><a href="{path=\'resources/recipes/{category_url_title}\'}">{category_name}</a></li>',
            {/exp:weblog:categories}
            );
            for ($i = 1; $i <= 11; $i++) {
              echo $categories[$i] . "\n";
            };
          ?>
          <li class="see-more"><a href="/resources">See more &raquo;</a></li>
        </ul>
      </div>
    {/if}
    {if logged_in}
    <div class="news">
      <div class="bar"><a href="/news">Follow Us</a></div>
      <a href="http://www.facebook.com/newstartclub/" class="news-follow" title="Facebook">
        <h4 class="icon" id="facebook-icon">Facebook</h4>
      </a>
      <a href="http://www.twitter.com/newstartclub/" class="news-follow" title="Twitter">
        <h4 class="icon" id="twitter-icon">Twitter</h4>
      </a>
      <a href="/news/rss/" class="news-follow" title="Subscribe">
        <h4 class="icon" id="rss-icon">Subscribe</h4>
      </a>
    </div>
    {/if}
    {if logged_in}
      {exp:user:stats dynamic="off"}
        {exp:weblog:entries weblog="locations" search:sponsor_zip="{zipCode}" limit="1"}
          <div class="locations">
            <div class="bar"><a href="/locations/">Featured Location</a></div>
            <a href="/locations/detail/{url_title}" title="{title}">
              <div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={sponsor_address}+{sponsor_city}+{sponsor_state}&zoom=7&markers=size:med%7C{sponsor_address}+{sponsor_city}+{sponsor_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
            </a>
            <p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
          </div>
        {/exp:weblog:entries}
      {/exp:user:stats}
    {/if}
    {if member_group == "1" || member_group == "13"}
      <div class="sponsor-admin">
        <div class="bar"><a href="/sponsors/">Sponsor Admin</a></div>
          <ul>
            <li><a href="/sponsors/add-event">&raquo; Add Event</a></li>
            <li><a href="/sponsors/edit-event">&raquo; Edit Event</a></li>
            <li><a href="/sponsors/invite">&raquo; Invite Members</a></li>
            <li><a href="/sponsors/email-members">&raquo; Email Members</a></li>
            <li><a href="/sponsors/resources">&raquo; Get Resources</a></li>
          </ul>
      </div>
    {/if}
    </div>
  </div>
{embed="embeds/_doc-bottom" sim="health-gauge"}