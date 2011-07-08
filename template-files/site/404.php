<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">	
	<title>{site_name} | 404</title>
	<style type="text/css">
	
	body {
		background: url(/assets/css/images/html_bkg.png) repeat-x #A7C7EF;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		color: #222;
		margin: 0;
		padding: 0;
		font-size: 75%;
		-webkit-font-smoothing: antialiased;
		text-rendering: optimizelegibility;
	}
	
	.container {
		margin: 0 auto;
		margin-top: 100px;
		width: 500px;
		position: relative;
	}
	
	.body {
		background: url(/assets/css/images/site-offline.png) no-repeat 65px 40px white;
		border-radius: 15px;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		padding: 160px 40px 40px;
		text-align: center;
		position: relative;
		box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.35);
		-webkit-box-shadow: 0 1px 8px rgba(0,0,0,0.35);
		-moz-box-shadow: 0 1px 8px rgba(0,0,0,0.25);
	}
	
	h1 {
		font-size: 32px;
		color: #87A621;
		border-top: 1px dashed #ddd;
		font-weight: bold;
		padding-top: 16px;
		margin-bottom: 8px;
	}
	
	p {
		font-size: 16px;
		color: #333;
		line-height: 22px;
		margin: 6px 0;
	}
	
	</style>
</head>
<body>
<div class="container">
	<div class="body">
		<h1>404</h1>
		<p>We could not find the page you requested.</p>
		{if segment_2 == "health_conditions"}
			<p>Perhaps you were looking for this page:</p>
			{if segment_3 == "chronic_pain"}
				<a href="{path='{segment_1}/health-conditions/chronic-pain'}">{site_url}{segment_1}/health-conditions/chronic-pain/</a>
			{if:elseif segment_3 == "heart_disease"}
				<a href="{path='{segment_1}/health-conditions/heart-disease'}">{site_url}{segment_1}/health-conditions/heart-disease/</a>
			{if:elseif segment_3 == "high_blood_pressure"}
				<a href="{path='{segment_1}/health-conditions/high-blood-pressure'}">{site_url}{segment_1}/health-conditions/high-blood-pressure/</a>
			{if:elseif segment_3 == "high_cholesterol"}
				<a href="{path='{segment_1}/health-conditions/high-cholesterol'}">{site_url}{segment_1}/health-conditions/high-cholesterol/</a>
			{if:elseif segment_3 == "skin_conditions"}
				<a href="{path='{segment_1}/health-conditions/skin-conditions'}">{site_url}{segment_1}/health-conditions/skin-conditions/</a>
			{if:else}
				<a href="{path='{segment_1}/health-conditions/{segment_3}'}">{site_url}{segment_1}/health-conditions/{segment_3}/</a>
			{/if}
		{/if}
		{if segment_2 == "living_better"}
			<p>Perhaps you were looking for this page:</p>
			{if segment_3 == "emotional_wellbeing"}
				<a href="{path='{segment_1}/living-better/emotional-wellbeing'}">{site_url}{segment_1}/living-better/emotional-wellbeing/</a>
			{if:elseif segment_3 == "general_health_wellness"}
				<a href="{path='{segment_1}/living-better/general-health-wellness'}">{site_url}{segment_1}/living-better/general-health-wellness/</a>
			{if:elseif segment_3 == "health_spirituality"}
				<a href="{path='{segment_1}/living-better/health_spirituality'}">{site_url}{segment_1}/living-better/health_spirituality/</a>
			{if:elseif segment_3 == "mental_performance"}
				<a href="{path='{segment_1}/living-better/mental-performance'}">{site_url}{segment_1}/living-better/mental-performance/</a>
			{if:else}
				<a href="{path='{segment_1}/living-better/{segment_3}'}">{site_url}{segment_1}/living-better/{segment_3}/</a>
			{/if}
		{/if}
		{if segment_1 == "super_admin"}
			<p>Perhaps you were looking for this page:</p>
			<a href="{path='super-admin'}">{site_url}super-admin/</a>
		{/if}
		{if segment_1 == "partners"}
			<p>Perhaps you were looking for this page:</p>
			{if segment_2 == "brian_schwartz" || segment_3 == "brian_schwartz"}
				<a href="{path='{segment_1}/detail/brian-schwartz/'}">{site_url}{segment_1}/detail/brian-schwartz/</a>
			{/if}
			{if segment_2 == "clarence_ing" || segment_3 == "clarence_ing"}
				<a href="{path='{segment_1}/detail/clarence-ing/'}">{site_url}{segment_1}/detail/clarence-ing/</a>
			{/if}
			{if segment_2 == "david_derose" || segment_3 == "david_derose"}
				<a href="{path='{segment_1}/detail/david-derose/'}">{site_url}{segment_1}/detail/david-derose/</a>
			{/if}
			{if segment_2 == "don_hanson" || segment_3 == "don_hanson"}
				<a href="{path='{segment_1}/detail/don-hanson/'}">{site_url}{segment_1}/detail/don-hanson/</a>
			{/if}
			{if segment_2 == "don_mackintosh" || segment_3 == "don_mackintosh"}
				<a href="{path='{segment_1}/detail/don-mackintosh/'}">{site_url}{segment_1}/detail/don-mackintosh/</a>
			{/if}
			{if segment_2 == "doug_plata" || segment_3 == "doug_plata"}
				<a href="{path='{segment_1}/detail/doug-plata/'}">{site_url}{segment_1}/detail/doug-plata/</a>
			{/if}
			{if segment_2 == "eddie_ramirez" || segment_3 == "eddie_ramirez"}
				<a href="{path='{segment_1}/detail/eddie-ramirez/'}">{site_url}{segment_1}/detail/eddie-ramirez/</a>
			{/if}
			{if segment_2 == "galen_comstock" || segment_3 == "galen_comstock"}
				<a href="{path='{segment_1}/detail/galen-comstock/'}">{site_url}{segment_1}/detail/galen-comstock/</a>
			{/if}
			{if segment_2 == "george_chen" || segment_3 == "george_chen"}
				<a href="{path='{segment_1}/detail/george-chen/'}">{site_url}{segment_1}/detail/george-chen/</a>
			{/if}
			{if segment_2 == "hildelisa_flickinger" || segment_3 == "hildelisa_flickinger"}
				<a href="{path='{segment_1}/detail/hildelisa-flickinger/'}">{site_url}{segment_1}/detail/hildelisa-flickinger/</a>
			{/if}
			{if segment_2 == "jack_mcintosh" || segment_3 == "jack_mcintosh"}
				<a href="{path='{segment_1}/detail/jack-mcintosh/'}">{site_url}{segment_1}/detail/jack-mcintosh/</a>
			{/if}
			{if segment_2 == "jeff_riedesel" || segment_3 == "jeff_riedesel"}
				<a href="{path='{segment_1}/detail/jeff-riedesel/'}">{site_url}{segment_1}/detail/jeff-riedesel/</a>
			{/if}
			{if segment_2 == "jerry_flores" || segment_3 == "jerry_flores"}
				<a href="{path='{segment_1}/detail/jerry-flores/'}">{site_url}{segment_1}/detail/jerry-flores/</a>
			{/if}
			{if segment_2 == "jim_brackett" || segment_3 == "jim_brackett"}
				<a href="{path='{segment_1}/detail/jim-brackett/'}">{site_url}{segment_1}/detail/jim-brackett/</a>
			{/if}
			{if segment_2 == "michael_orlich" || segment_3 == "michael_orlich"}
				<a href="{path='{segment_1}/detail/michael-orlich/'}">{site_url}{segment_1}/detail/michael-orlich/</a>
			{/if}
			{if segment_2 == "milton_teske" || segment_3 == "milton_teske"}
				<a href="{path='{segment_1}/detail/milton-teske/'}">{site_url}{segment_1}/detail/milton-teske/</a>
			{/if}
			{if segment_2 == "neil_nedley" || segment_3 == "neil_nedley"}
				<a href="{path='{segment_1}/detail/neil-nedley/'}">{site_url}{segment_1}/detail/neil-nedley/</a>
			{/if}
			{if segment_2 == "pam_kendall" || segment_3 == "pam_kendall"}
				<a href="{path='{segment_1}/detail/pam-kendall/'}">{site_url}{segment_1}/detail/pam-kendall/</a>
			{/if}
			{if segment_2 == "phil_mills" || segment_3 == "phil_mills"}
				<a href="{path='{segment_1}/detail/phil-mills/'}">{site_url}{segment_1}/detail/phil-mills/</a>
			{/if}
			{if segment_2 == "rich_kollenberg" || segment_3 == "rich_kollenberg"}
				<a href="{path='{segment_1}/detail/rich-kollenberg/'}">{site_url}{segment_1}/detail/rich-kollenberg/</a>
			{/if}
			{if segment_2 == "rich_smith" || segment_3 == "rich_smith"}
				<a href="{path='{segment_1}/detail/rich-smith/'}">{site_url}{segment_1}/detail/rich-smith/</a>
			{/if}
			{if segment_2 == "ronda_smith" || segment_3 == "ronda_smith"}
				<a href="{path='{segment_1}/detail/ronda-smith/'}">{site_url}{segment_1}/detail/ronda-smith/</a>
			{/if}
			{if segment_2 == "sally_christensen" || segment_3 == "sally_christensen"}
				<a href="{path='{segment_1}/detail/sally-christensen/'}">{site_url}{segment_1}/detail/sally-christensen/</a>
			{/if}
			{if segment_2 == "sualua_tupolo" || segment_3 == "sualua_tupolo"}
				<a href="{path='{segment_1}/detail/sualua-tupolo/'}">{site_url}{segment_1}/detail/sualua-tupolo/</a>
			{/if}
			{if segment_2 == "tim_arnott" || segment_3 == "tim_arnott"}
				<a href="{path='{segment_1}/detail/tim-arnott/'}">{site_url}{segment_1}/detail/tim-arnott/</a>
			{/if}
			{if segment_2 == "timothy_howe" || segment_3 == "timothy_howe"}
				<a href="{path='{segment_1}/detail/timothy-howe/'}">{site_url}{segment_1}/detail/timothy-howe/</a>
			{/if}
			{if segment_2 == "winston_craig" || segment_3 == "winston_craig"}
				<a href="{path='{segment_1}/detail/winston-craig/'}">{site_url}{segment_1}/detail/winston-craig/</a>
			{/if}
		{/if}
	</div>
</div>
</body>
</html>