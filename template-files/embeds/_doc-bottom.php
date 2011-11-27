</div><!-- /.body -->
<footer>
  <p>A FREE community service of <a href="http://newstart.com/">NEWSTART&reg;</a>. &copy; 2010-{current_time format="%Y"}. All Rights Reserved.</p>
  <p><a href="/about/privacy-policy">Privacy Policy</a> | <a href="/about/terms-of-use">Terms of Use</a></p>
</footer>
<div id="shadow-left"></div>
<div id="shadow-right"></div>
{embed="embeds/_signin-mini"}
{if "{embed:sim}"}
  <?php 
  $modal = explode('|', '{embed:sim}');
  foreach($modal as $file) {
    echo '{embed="embeds/_signin-modal modal-role="'. $file .'"}'."\n";
  } ?>
{/if}
{if "{embed:script_add}"}
  <?php $splitcontents = explode('|', '{embed:script_add}');
  foreach($splitcontents as $file) {
   echo '<script src="/assets/js/'.$file.'.js"></script>'."\n";
  } ?>
{/if}
</body>
</html>