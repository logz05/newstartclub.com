<div id="the-comments">
  <div id="comment-title" class="bar">Comments
    {exp:comment:entries sort="asc" limit="1" weblog="{embed:channel}"}
      {if no_results}(&thinsp;0&thinsp;){/if}
      (&thinsp;{total_comments}&thinsp;)
    {/exp:comment:entries}
    <span class="leave-cmt">
      {if logged_in}
        <a href="#comment-form">Leave a Comment</a>
      {if:else}
        <a href="/signin" data-reveal-id="signin-modal-comments">Leave a Comment</a>
      {/if}
    </span>
  </div>
  <div id="comments">
    <ol id="comment-list">
      {exp:comment:entries sort="asc" limit="20" weblog="{embed:channel}"}
      <li id="c_{comment_id}" class="comment-box {switch="even|odd"}">
        <h3 class="count">
          <strong><a href="#c_{comment_id}" title="Permalink this comment">{absolute_count}</a></strong>
          <span class="author">{firstName} {lastName}</span>
          <span class="date">{comment_date format="%M %j, %Y, %g:%i %A %T"}</span>
        </h3>
        <div class="comment">
          {comment}
        </div>
      </li>
      {/exp:comment:entries}
    </ol>
  </div>
{if logged_in}
  {exp:comment:preview}
    <div id="comment-preview">
      <div class="bar">Comment Preview</div>
      <ol>
        <li class="comment-box">
          <h3 class="count">
            <strong>*</strong>
            <span class="author">{exp:user:stats}{firstName} {lastName}{/exp:user:stats}</span>
            <span class="date">{current_time format="%M %j, %Y, %g:%i %A %T"}</span>
          </h3>
          <div class="comment">
            {comment}
          </div>
        </li>
      </ol>
    </div>
  {/exp:comment:preview}

  <h2>Leave a Comment</h2>

  <div id="comment-form">
    <p>Only <a href="#allowed-elements" class="allowed-elements">these elements</a> are allowed in submitted comments.</p>
    <ul id="allowed-elements">
      <li>&lt;a href="http://www.mysite.com/"&gt;my site&lt;/a&gt;</li>
      <li>&lt;img src="http://www.mysite.com/myimage" alt="image" /&gt;</li>
      <li>&lt;blockquote&gt;quote&lt;/blockquote&gt;</li>
      <li>&lt;em&gt;my emphasized text&lt;/em&gt;</li>
      <li>&lt;strong&gt;my bold text&lt;/strong&gt;</li>
      <li>&lt;code&gt;my code&lt;/code&gt;</li>
    </ul>
    <p>Your comment will be moderated and will be deleted if commenters only leave a keyword, if sites linked are commercial in nature and not related to the entry, or if the comment simply doesn’t add substance to the discussion.</p>
    {exp:comment:form weblog="{embed:channel}" preview="{embed:channel}/detail"}
    <table>
      <tr>
        <th scope="row"><label for="comment">Comment</label></th>
        <td>
          <textarea class="input" name="comment" id="cmt-textarea" cols="38" rows="10">{comment}</textarea>
        {exp:user:stats}
          <input type="hidden" name="name" value="{firstName} {lastName}" size="50" />
          <input type="hidden" name="email" value="{email}" size="50" /> 
          <input type="hidden" name="location" value="{state} {zipCode}" size="50" />
        {/exp:user:stats}
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <p>
            <input type="checkbox" name="notify_me" value="yes" {notify_me} /> Notify me of follow-up comments?
          </p>
          <p class="button-wrap">
            <button type="submit" name="submit" class="super green button"><span>Submit</span></button>
            <button type="submit" name="preview" class="super secondary button"><span>Preview</span></button>
          </p>
        </td>
      </tr>
    </table>
    {/exp:comment:form}
  </div>
{/if}
</div>