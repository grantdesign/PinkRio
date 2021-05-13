<div id="page-meta">
	<div class="inner group">
		<h3>...Hello! :)</h3>
		<h4>Here is user information</h4>
	</div>
</div>
<!-- END PAGE META -->
<!-- START PRIMARY -->
<div id="primary" class="sidebar-left">
	<div class="inner group">
		<!-- START SIDEBAR -->
		<div id="sidebar-contact" class="sidebar group">
			<div class="widget-first widget contact-info">
				<h3>Contact Information</h3>
				<div class="sidebar-nav">
					<ul>
						<li>
							<span>Name:</span>
							{{ $user->name }}
						</li>
						<li>
							<span>Email:</span>
							{{ $user->email }}
						</li>
						<li>
							<span>Registration date:</span>
							{{ $user->created_at->format('d.m.Y') }}
						</li>
					</ul>
				</div>
			</div>
			<div class="widget-last widget text-image">
				<h3>Customer Support</h3>
				<div class="text-image" style="text-align:left"><img src="{{ asset(env('THEME')) }}/images/callus.gif" alt="Customer Support" /></div>
				<p>Nunc sit amet pretium purus. Pellet netus et malesuada fames ac turpis egestas.entesque habitant morbi tristique senectus </p>
			</div>
		</div>