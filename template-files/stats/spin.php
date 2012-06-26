{embed="embeds/_doc-top"}

<div id="dont-load-it"></div>

<script src="/assets/js/spin.min.js"></script>
<script>

var opts = {
  lines: 12,
  length: 4,
  width: 2,
  radius: 6,
  color: '#9f9e9b',
  speed: 1.3,
  trail: 70,
  shadow: false
};
var target = document.getElementById('load-it');
var spinner = new Spinner(opts).spin(target);
</script>

{exp:user:stats dynamic="off"}
    
<?php

  $zipCode = "{exp:weblog:entries weblog="locations" search:location_zip="{zipCode}" limit="1"}{location_zip}{/exp:weblog:entries}";
  $promoCode = "{exp:weblog:entries weblog="locations" category="{promo_code}" limit="1"}{url_title}{/exp:weblog:entries}";
  
  if ($zipCode) {
    echo "Zip Code matches a local sponsor.";
  } else if ($promoCode) {
    echo "Promo Code matches a local sponsor.";
  } else {
    echo "There is no featured sponsor in your area.";
  }
  
  echo "Zip Code: $zipCode, Promo Code: $promoCode";

?>

{exp:weblog:entries weblog="locations" category="{promo_code}" limit="1"}
        <div class="locations">
          <div class="bar"><a href="/locations/">Featured Location</a></div>
          <a href="/locations/detail/{url_title}" title="{title}">
            <div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
          </a>
          <p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
        </div>
      {/exp:weblog:entries}

{/exp:user:stats}

{embed="embeds/_doc-bottom"}