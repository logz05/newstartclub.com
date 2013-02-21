<nav class="main-nav sponsors">
	<ul>
	
		<li class="home{if segment_1 == "sponsors" && segment_2 == ""} current{/if}">
			<a href="{path='sponsors'}">&emsp;</a>
			<i></i>
		</li>
		
		<li{if segment_2 == "add-deal"} class="current"{/if}>
			<a href="{path='sponsors/add-deal'}">Add Deals</a>
			<i></i>
		</li>
		
		<li{if segment_2 == "edit-deals" || segment_2 == "edit-deal"} class="current"{/if}>
			<a href="{path='sponsors/edit-deals'}">Edit Deals</a>
			<i></i>
		</li>
		
		<li{if segment_2 == "add-members" } class="current"{/if}>
			<a href="{path='sponsors/add-members'}">Add Members</a>
			<i></i>
		</li>
		
		<li{if segment_2 == "email-members" || segment_2 == "send-email" || segment_2 == "refer" || segment_2 == "referral-sent"    } class="current"{/if}>
			<a href="{path='sponsors/email-members'}">Email Members</a>
			<i></i>
		</li>
		
		<li{if segment_2 == "resources"} class="current"{/if}>
			<a href="{path='sponsors/resources'}">Resources</a>
			<i></i>
		</li>
		
	</ul>
</nav>