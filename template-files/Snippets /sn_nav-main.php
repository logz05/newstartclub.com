	<nav class="main-nav">
		<ul>
			<li class="home{if segment_1 == ""    } current{/if}"><a href="{path='site_index'}">&emsp;</a><i></i></li>
			<li{if segment_1 == "my-health"} class="current"{/if}><a href="{path='my-health' }">My Health</a><i></i></li>
			<li{if segment_1 == "deals"    } class="current"{/if}><a href="{path='deals'     }">Deals</a><i></i></li>
			<li{if segment_1 == "events"   } class="current"{/if}><a href="{path='events'    }">Events</a><i></i></li>
			<li{if segment_1 == "services" } class="current"{/if}><a href="{path='services'  }">Services</a><i></i></li>
			<li{if segment_1 == "resources"} class="current"{/if}><a href="{path='resources' }">Resources</a><i></i></li>
			<li{if segment_1 == "recipes"  } class="current"{/if}><a href="{path='recipes'   }">Recipes</a><i></i></li>
			<li{if segment_1 == "questions"} class="current"{/if}><a href="{path='questions' }">Questions</a><i></i></li>
		</ul>
	</nav>
	<nav class="sub-nav">
		<ul>
			<li><a href="{path='resources/detail/nutrition' }"{if segment_2 == "detail" && segment_3 =="nutrition" } class="active"{/if} title="Nutrition"><span class="emphasis">N</span>utrition</a></li>
			<li><a href="{path='resources/detail/exercise'  }"{if segment_2 == "detail" && segment_3 =="exercise"  } class="active"{/if} title="Exercise"><span class="emphasis">E</span>xercise</a></li>
			<li><a href="{path='resources/detail/water'     }"{if segment_2 == "detail" && segment_3 =="water"     } class="active"{/if} title="Water"><span class="emphasis">W</span>ater</a></li>
			<li><a href="{path='resources/detail/sunlight'  }"{if segment_2 == "detail" && segment_3 =="sunlight"  } class="active"{/if} title="Sunlight"><span class="emphasis">S</span>unlight</a></li>
			<li><a href="{path='resources/detail/temperance'}"{if segment_2 == "detail" && segment_3 =="temperance"} class="active"{/if} title="Temperance"><span class="emphasis">T</span>emperance</a></li>
			<li><a href="{path='resources/detail/air'       }"{if segment_2 == "detail" && segment_3 =="air"       } class="active"{/if} title="Air"><span class="emphasis">A</span>ir</a></li>
			<li><a href="{path='resources/detail/rest'      }"{if segment_2 == "detail" && segment_3 =="rest"      } class="active"{/if} title="Rest"><span class="emphasis">R</span>est</a></li>
			<li><a href="{path='resources/detail/trust'     }"{if segment_2 == "detail" && segment_3 =="trust"     } class="active"{/if} title="Trust"><span class="emphasis">T</span>rust</a></li>
		</ul>
	</nav>