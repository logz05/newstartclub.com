<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
{if "{embed:add}" != ""}
<?php $splitcontents = explode('|', '{embed:add}');
foreach($splitcontents as $file) {
 echo '<script type="text/javascript" src="http://www.newstartclub.com/assets/js/'.$file.'.js"></script>'."\n";
} ?>
{/if}