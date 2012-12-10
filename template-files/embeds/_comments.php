<div class="the-comments" itemscope itemtype="http://schema.org/AggregateRating">
	<header class="bar"  data-icon="B">Comments
		{exp:comment:entries sort="asc" limit="1" channel="{embed:channel}"}
			{if no_results}(&thinsp;<span itemprop="reviewCount">0</span>&thinsp;){/if}
			(&thinsp;<span itemprop="reviewCount">{total_comments}</span>&thinsp;)
		{/exp:comment:entries}
		<span class="leave-cmt">
			{if logged_in}
				<a href="#comment-form">Leave a Comment</a>
			{if:else}
				<a href="/signin" data-reveal-id="signin-modal-comments">Leave a Comment</a>
			{/if}
		</span>
	</header>
	<ol class="comments listing">
		{exp:comment:entries sort="asc" limit="20" channel="{embed:channel}"}
		<li id="c_{comment_id}" class="comment {switch="even|odd"}">
			<h3 class="meta">
				<strong><a href="#c_{comment_id}" title="Permalink this comment">{count}</a></strong>
				<span class="author"><?php echo ucwords(strtolower("{member_first_name}")); ?></span>
				<span class="date">{comment_date format="%M %j, %Y, %g:%i %A %T"}</span>
			</h3>
			<div class="comment-body">
				{comment}
			</div>
		</li>
		{/exp:comment:entries}
	</ol>
{if logged_in}
	{exp:comment:preview}
		<div class="comment-preview">
			<header class="bar">Comment Preview</header>
			<ol class="comments listing">
				<li class="comment">
					<h3 class="meta">
						<strong>*</strong>
						<span class="author">{exp:user:stats dynamic="off"}<?php echo ucwords(strtolower("{member_first_name}")); ?>{/exp:user:stats}</span>
						<span class="date">{current_time format="%M %j, %Y, %g:%i %A %T"}</span>
					</h3>
					<div class="comment-body">
						{comment}
					</div>
				</li>
			</ol>
		</div>
	{/exp:comment:preview}

	<h2>Leave a Comment</h2>

	<div class="comment-form">
		<p>Only <a href="#allowed-elements" class="allowed-elements">these elements</a> are allowed in submitted comments.</p>
		<ul id="allowed-elements">
			<li>&lt;a href="http://www.mysite.com/"&gt;my site&lt;/a&gt;</li>
			<li>&lt;img src="http://www.mysite.com/myimage" alt="image" /&gt;</li>
			<li>&lt;blockquote&gt;quote&lt;/blockquote&gt;</li>
			<li>&lt;em&gt;my emphasized text&lt;/em&gt;</li>
			<li>&lt;strong&gt;my bold text&lt;/strong&gt;</li>
			<li>&lt;code&gt;my code&lt;/code&gt;</li>
		</ul>
		<p>Your comment will be moderated and will be deleted if commenters only leave a keyword, if sites linked are commercial in nature and not related to the entry, or if the comment simply doesn&rsquo;t add substance to the discussion.</p>
		{exp:comment:form channel="{embed:channel}" preview="{embed:channel}/detail"}
		<table>
		{exp:user:stats dynamic="off"}
			<tr>
				<th scope="row"><label for="comment">Comment</label></th>
				<td>
					<textarea class="input" name="comment" id="cmt-textarea" cols="38" rows="5">{comment}</textarea>
					<input type="hidden" name="name" value="<?php echo ucwords(strtolower("{member_first_name}")); ?>" size="50" />
					<input type="hidden" name="email" value="{email}" size="50" /> 
					<input type="hidden" name="location" value="{state} {zipCode}" size="50" />
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<p>
						<label><input type="checkbox" name="notify_me" value="yes" {notify_me} /><span>Notify me of follow-up comments?</span></label>
					</p>
					<p class="button-wrap">
						<button type="submit" name="submit" class="super green button"><span>Submit</span></button>
						<button type="submit" name="preview" class="super secondary button"><span>Preview</span></button>
					</p>
				</td>
			</tr>
		{/exp:user:stats}
		</table>
		{/exp:comment:form}
	</div>
{/if}
</div>