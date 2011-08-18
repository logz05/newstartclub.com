{if logged_out}
<div id="signin-modal-mini" class="reveal-modal mini standalone">
	<h1>Sign In</h1>
	{if embed:modal-msg}<p>{embed:modal-msg}</p>{/if}
	{exp:member:login_form error_page="members/error" return="/{segment_1}/{segment_2}/{segment_3}/{segment_4}/{segment_5}/{segment_6}/{segment_7}"}
	<table>
		<tr>
			<th scope="row"><label for="email">Email</label></th>
			<td><input type="email" class="input" id="email" name="username" value="" size="20" autocapitalize="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="password">Password</label></th>
			<td><input type="password" class="input" id="password" name="password" size="20" /></td>
		</tr>
		{if auto_login}<tr>
			<th></th>
			<td><input class="checkbox" type="checkbox" name="auto_login" value="1" /><span>Keep me logged in</span></td>
		</tr>{/if}
		<tr>
			<th scope="row">&nbsp;</th>
			<td>
				<button type="submit" class="super green button"><span>Sign In</span></button>
				<a class="forgot-pass" href="/forgot-password/">Forgot your password?</a>
			</td>
		</tr>
	</table>
	{/exp:member:login_form}
	<a class="close-modal close">&times;</a>
</div>
{/if}
{if embed:standalone == ""}
<footer>
  <p>A FREE community service of the <a href="http://newstart.com/">NEWSTART&reg; Lifestyle Program</a>. &copy; 2010-{current_time format="%Y"}. All Rights Reserved.</p>
  <p><a href="/about/privacy-policy/">Privacy Policy</a> | <a href="/about/terms-of-use/">Terms of Use</a></p>
</footer>
<div id="shadow-left"></div>
<div id="shadow-right"></div>
{/if}
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script src="/assets/js/jquery.reveal.js"></script>
<script src="/assets/js/common.js"></script>
{if "{embed:script_add}" != ""}
<?php $splitcontents = explode('|', '{embed:script_add}');
foreach($splitcontents as $file) {
 echo '<script src="/assets/js/'.$file.'.js"></script>'."\n";
} ?>
{/if}
{!-- BEGIN Resource Sidebar Javascript --}
{if segment_1 == "resources"}
  {if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0")}
    <script type="text/javascript">
    $(document).ready(function(){
      //Toggle list
      $(".sidebar h2").click(function(){
        $(this).next("ul").slideToggle(400)
        $(this).children(".arrow").toggle()
        return false;
      });
    });
    </script>
  {if:else}
    <script type="text/javascript">
    $(document).ready(function(){
      
      //Hide all lists except the one for the current section
      $(".sidebar h2").children(".arrow").toggle();
      $(".sidebar ul.filter-list").not(".filter-list.{segment_2}").hide();
      $(".sidebar h2.{segment_2}").children(".arrow").toggle();
      
      //Toggle lists
      $(".sidebar h2").click(function(){
        $(this).next("ul").slideToggle(400)
        $(this).children(".arrow").toggle()
        return false;
      });
    
    });
    </script>
  {/if}
{/if}
{if segment_2 == "request-sent"}
<script type="text/javascript">
  $(document).ready(function(){
    $('.vimeoBadge .clip > a').attr('rel', 'prettyPhoto');
    $('.vimeoBadge a img').attr('alt', 'NEWSTART Now');
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
{/if}
</body>
</html>