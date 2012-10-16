<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]>		 <html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]>		 <html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]>		 <html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{if embed:title}{embed:title} | {site_name}{if:else}{site_name}{/if}</title>
	<![if !IEMobile]>
	<meta name="viewport" content="width=860;" />
	<![endif]>
	
	<meta name="author" content="{site_name}">
	{if embed:meta}{embed:meta}{/if}
	<meta property="fb:admins" content="696875904" />
	{if segment_1 == "news"                              }<link rel="alternate" type="application/rss+xml" title="{site_name} News"      href="{path='news/rss'}" />{/if}
	{if segment_1 == "faq" && segment_2 != "detail"      }<link rel="alternate" type="application/rss+xml" title="{site_name} FAQ"       href="{path='faq/rss' }" />{/if}
	{if segment_1 == "resources" && segment_2 != "detail"}<link rel="alternate" type="application/rss+xml" title="{site_name} Resources" href="resources/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}" />{/if}
	{if segment_1 == "events" && segment_2 != "detail"   }<link rel="alternate" type="application/rss+xml" title="{site_name} Events"    href="events/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" />{/if}

	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/default'    }" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/icons'      }" type="text/css" />
{if embed:add}
	<?php 
		$splitcontents = explode('|', '{embed:add}');
		foreach($splitcontents as $file) {
			echo "\t".'<link rel="stylesheet" href="/assets/css/'.$file.'.css" type="text/css" />'."\n";
		} 
	?>
{/if}
	<script src="{site_url}/assets/js/modernizr-custom-2.6.1.js"></script>

	{if embed:map}{embed="embeds/_google-maps"}{/if}
	<!--Google Analytics-->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-12179773-3']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>

<body{if embed:map} onload="initialize()"{/if}>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<label for="toggle-hidden-check" id="toggle-hidden-label">&emsp;&emsp;&emsp;</label>
	<input type="checkbox" id="toggle-hidden-check">
	
	<header class="header">
		<nav class="super-nav">
			<ul>
				{if logged_in}
					<li>Hi,
					{exp:user:stats dynamic="off"}
						{!--<span class="has-tip">
							<span class="tooltip bottom">
								<i class="nub"></i>
								{exp:channel:entries channel='locations' category='{member_admin_id}' limit='1' dynamic='no' status='open|closed' disable="categories|member_data|pagination|trackbacks"}
									{title}
									Promo Code: {member_admin_id}
									Zip Code: {location_zip}
								{/exp:channel:entries}
							</span>
						</span>--}
							<strong><?php echo ucwords(strtolower("{member_first_name} {member_last_name}")); ?></strong>
						
					{/exp:user:stats}
					</li>
				{/if}
				{if group_id == '1' && segment_1 == "sponsors"}
					{exp:user:stats dynamic="off"}
					<li>{exp:channel:entries channel='locations' category='{member_admin_id}' limit='1' dynamic='no' status='open|closed' disable="categories|member_data|pagination|trackbacks"}{member_admin_id} | {location_zip}{/exp:channel:entries}</li>
					{/exp:user:stats}
				{/if}
				{if segment_1 != "sponsors" && (member_group == 1 || member_group == 6)}<li><a href="{path='sponsors'}">Sponsor Admin</a></li>{/if}
				{if segment_1 == "sponsors" && (member_group == 1 || member_group == 6)}<li><a href="{path='site_index'}">Main Site</a></li>{/if}
				<li>
					{if logged_out}
						{if segment_1 == 'sponsors'}
							<a href="{path='sponsors/signin'}" data-reveal-id="signin-modal-mini" id="sign-in">Sign In</a>
						{if:else}
							<a href="{path='signin'}" data-reveal-id="signin-modal-mini" id="sign-in">Sign In</a>
						{/if}
					{if:else}
						<a href="{path='logout'}">Sign Out</a>
					{/if}
				</li>
				<li>
					{if logged_out}
						{if segment_1 == 'sponsors'}
							<a href="{path='sponsors/apply'}" data-reveal-id="signin-modal-sponsor-apply">Apply</a>
						{if:else}
							<a href="{path='register'}">Register</a>
						{/if}
					{if:else}
						<a href="{path='settings'}">Settings</a>
					{/if}
				</li>
			</ul>
		</nav>
	{if logged_out}
		<div class="free-mem-ribbon">
			<a href="{path='register'}"></a>
		</div>
	{/if}
	<div class="masthead"></div>
	<nav class="main-nav{if segment_1 == "sponsors" && (member_group == 1 || member_group == 6)} sponsors{/if}{if embed:sponsor_type} {embed:sponsor_type}{/if}">
		<ul>
		{!-- If the logged in member is in the Sponsor member group and on the Sponsor section of the site then show the sponsor nav bar. Else show regular nav bar. --}
		{if segment_1 == "sponsors" && (member_group == 1 || member_group == 6)}
		
			<li class="home{if segment_1 == "sponsors" && segment_2 == ""} current{/if}"><a href="{path='sponsors'}">&emsp;</a><i></i></li>
			{if embed:sponsor_type == "profit"}
				<li{if segment_2 == "add-deal"                              } class="current"{/if}><a href="{path='sponsors/add-deal'  }">Add Deals</a><i></i></li>
				<li{if segment_2 == "edit-deals" || segment_2 == "edit-deal"} class="current"{/if}><a href="{path='sponsors/edit-deals'}">Edit Deals</a><i></i></li>
			{if:else}
				<li{if segment_2 == "add-event"  } class="current"{/if}><a href="{path='sponsors/add-event'  }">Add Events</a><i></i></li>
				<li{if segment_2 == "edit-events"} class="current"{/if}><a href="{path='sponsors/edit-events'}">Edit Events</a><i></i></li>
			{/if}
			<li{if segment_2 == "invite"                                    } class="current"{/if}><a href="{path='sponsors/invite'       }">Invite Members</a><i></i></li>
			<li{if segment_2 == "email-members" || segment_2 == "send-email"} class="current"{/if}><a href="{path='sponsors/email-members'}">Email Members</a><i></i></li>
			<li{if segment_2 == "resources"                                 } class="current"{/if}><a href="{path='sponsors/resources'    }">Resources</a><i></i></li>
			
		{if:else}
		
			<li class="home{if segment_1 == ""} current{/if}"><a href="{path='site_index'}">&emsp;</a><i></i></li>
			<li{if segment_1 == "my-health"} class="current"{/if}><a href="{path='my-health'}">My Health</a><i></i></li>
			<li{if segment_1 == "deals"    } class="current"{/if}><a href="{path='deals'    }">Deals</a><i></i></li>
			<li{if segment_1 == "events"   } class="current"{/if}><a href="{path='events'   }">Events</a><i></i></li>
			<li{if segment_1 == "services" } class="current"{/if}><a href="{path='services' }">Services</a><i></i></li>
			<li{if segment_1 == "resources"} class="current"{/if}><a href="{path='resources'}">Resources</a><i></i></li>
			<li{if segment_1 == "recipes"  } class="current"{/if}><a href="{path='recipes'  }">Recipes</a><i></i></li>
			<li{if segment_1 == "questions"} class="current"{/if}><a href="{path='questions'}">Questions</a><i></i></li>
			
		{/if}
		</ul>
	</nav>
	{if segment_1 == "sponsors" && (member_group == 1 || member_group == 6)}
	
	{if:else}
	<nav class="sub-nav">
		<ul>
			<li><a href="{path='resources/detail/nutrition' }"{if segment_2 == "detail" && segment_3 =="nutrition" } class="active"{/if} title="Nutrition"> <span class="emphasis">N</span>utrition</a></li>
			<li><a href="{path='resources/detail/exercise'  }"{if segment_2 == "detail" && segment_3 =="exercise"  } class="active"{/if} title="Exercise">  <span class="emphasis">E</span>xercise</a></li>
			<li><a href="{path='resources/detail/water'     }"{if segment_2 == "detail" && segment_3 =="water"     } class="active"{/if} title="Water">     <span class="emphasis">W</span>ater</a></li>
			<li><a href="{path='resources/detail/sunlight'  }"{if segment_2 == "detail" && segment_3 =="sunlight"  } class="active"{/if} title="Sunlight">  <span class="emphasis">S</span>unlight</a></li>
			<li><a href="{path='resources/detail/temperance'}"{if segment_2 == "detail" && segment_3 =="temperance"} class="active"{/if} title="Temperance"><span class="emphasis">T</span>emperance</a></li>
			<li><a href="{path='resources/detail/air'       }"{if segment_2 == "detail" && segment_3 =="air"       } class="active"{/if} title="Air">       <span class="emphasis">A</span>ir</a></li>
			<li><a href="{path='resources/detail/rest'      }"{if segment_2 == "detail" && segment_3 =="rest"      } class="active"{/if} title="Rest">      <span class="emphasis">R</span>est</a></li>
			<li><a href="{path='resources/detail/trust'     }"{if segment_2 == "detail" && segment_3 =="trust"     } class="active"{/if} title="Trust">     <span class="emphasis">T</span>rust</a></li>
		</ul>
	</nav>
	{/if}
		<div class="shadow-left"></div>
		<div class="shadow-right"></div>
	</header>
	<div class="body{if embed:class} {embed:class}{/if}{if segment_2 == 'detail'} detail{/if}"{if embed:microdata} itemscope itemtype="http://schema.org/{embed:microdata}"{/if}>