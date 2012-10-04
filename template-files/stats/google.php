{embed="embeds/_doc-top" 
	class=""
	title="Google Custom Search"
"}
<div class="heading clearfix">
	<h1>Google Custom Search</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div id="cse" style="width:100%;"></div> 
	</div>
	<div class="sidebar right">
		<header class="bar">About</header>
		<div id="cse-search-form" style="width: 100%;">Loading&hellip;</div>
		<script src="//www.google.com/jsapi" type="text/javascript"></script>
		<script type="text/javascript"> 
		  google.load('search', '1', {language : 'en', style : google.loader.themes.V2_DEFAULT});
		  google.setOnLoadCallback(function() {
		    var customSearchOptions = {};
		    customSearchOptions['adoptions'] = {'layout': 'noTop'};
		    var customSearchControl = new google.search.CustomSearchControl(
		      '007070075648562526152:cexokofxdem', customSearchOptions);
		    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
		    var options = new google.search.DrawOptions();
		    options.setSearchFormRoot('cse-search-form');
		    customSearchControl.draw('cse', options);
		  }, true);
		</script>

	</div>
</div>
{embed="embeds/_doc-bottom"}