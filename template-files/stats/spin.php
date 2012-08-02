{embed="embeds/_doc-top"}

<div id="load-it"></div>

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


{exp:weblog:entries weblog="locations" category="{promo_code}" limit="1"}
        <div class="locations">
          <header class="bar"><a href="/locations/">Featured Location</a></header>
          <a href="/locations/detail/{url_title}" title="{title}">
            <div class="location-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={location_address}+{location_city}+{location_state}&zoom=7&markers=size:med%7C{location_address}+{location_city}+{location_state}&size=180x125&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});"></div>
          </a>
          <p><a href="/locations/detail/{url_title}" title="{title}">{title}</a></p>
        </div>
      {/exp:weblog:entries}

{embed="embeds/_doc-bottom"}