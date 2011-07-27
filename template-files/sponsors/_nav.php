<nav id="nav">
	<ul>
		<li{if embed:channel == "sponsor_admin" && segment_2 == ""} class="current"{/if}><a href="/sponsor_admin/">Home</a><span></span></li>
		<li{if segment_2 == "events" && segment_3 == "add"} class="current"{/if}><a href="/sponsor_admin/events/add/">Add Events</a><span></span></li>
		<li{if segment_2 == "events" && segment_3 == "edit"} class="current"{/if}><a href="/sponsor_admin/events/edit/">Edit Events</a><span></span></li>
		<li{if segment_2 == "invite-members"} class="current"{/if}><a href="/sponsor_admin/invite-members/">Invite Members</a><span></span></li>
		<li{if segment_2 == "email-members" || segment_2 == "email"} class="current"{/if}><a href="/sponsor_admin/email-members/">Email Members</a><span></span></li>
		<li{if segment_2 == "resources"} class="current"{/if}><a href="/sponsor_admin/resources/">Resources</a><span></span></li>
	</ul>
</nav>