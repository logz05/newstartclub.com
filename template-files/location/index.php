<?php

{exp:weblog:categories weblog="locations" show="{segment_2}" style="linear"}

header("Location: /locations/detail/{category_url_title}"); /* Redirect browser */

exit;
{/exp:weblog:categories}

?>