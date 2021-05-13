<div id="page-meta">
	<div class="inner group">
		<h3>...Say Hello! :)</h3>
		<h4>Get in touch with Pink Rio team</h4>
	</div>
</div>
<!-- END PAGE META -->
<!-- START PRIMARY -->
<div id="primary" class="sidebar-left">
	<div class="inner group">
		<!-- START CONTENT -->
		<div id="content-page" class="content group">
			<div class="hentry group">
				<form id="contact-form-contact-us" class="contact-form" method="post" action="{{ route('contacts') }}">
					@csrf
					<div class="usermessagea">
						@if(session('status'))
							<p class="success">{{ session('status') }}</p>
						@endif
						
						@if(count($errors) > 0)
							@foreach($errors->all() as $error)
							<p class="error">{{ $error }}</p>
							@endforeach
						@endif
					</div>
					<fieldset>
						<ul>
							<li class="text-field">
								<label for="name-contact-us">
									<span class="label">Name</span>
									<br /><span class="sublabel">This is the name</span><br />
								</label>
								<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="name" id="name-contact-us" class="required" value="{{ old('name') }}" /></div>
								<div class="msg-error"></div>
							</li>
							<li class="text-field">
								<label for="email-contact-us">
									<span class="label">Email</span>
									<br />					<span class="sublabel">This is a field email</span><br />
								</label>
								<div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" id="email-contact-us" class="required email-validate" value="{{ old('email') }}" /></div>
								<div class="msg-error"></div>
							</li>
							<li class="textarea-field">
								<label for="message-contact-us">
									<span class="label">Message</span>
								</label>
								<div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span><textarea name="message" id="message-contact-us" rows="8" cols="30" class="required">{{ old('message') }}</textarea></div>
								<div class="msg-error"></div>
							</li>
							<li class="submit-button">
								<input type="submit" value="Send Message" class="sendmail alignright" />			
							</li>
						</ul>
					</fieldset>
				</form>
				<script type="text/javascript">
					var messages_form_126 = {
						name: "Please, fill in your name",
						email: "Please, insert a valid email address",
						message: "Please, insert your message"
					};
				</script>
			</div>
			<!-- START COMMENTS -->
			<div id="comments">
			</div>
			<!-- END COMMENTS -->
		</div>
		<!-- END CONTENT -->
		<!-- START SIDEBAR -->
		<div id="sidebar-contact" class="sidebar group">
			<div class="widget-first widget contact-info">
				<h3>Contacts</h3>
				<div class="sidebar-nav">
					<ul>
						<li>
							<i class="icon-map-marker" style="color:#979797;font-size:20pxpx"></i> Location: PinkRio, 115  Avenue street - Italy
						</li>
						<li>
							<i class="icon-info-sign" style="color:#979797;font-size:20pxpx"></i> Phone: 3471717174
						</li>
						<li>
							<i class="icon-print" style="color:#979797;font-size:20pxpx"></i> Fax: +39 0035 356 765
						</li>
						<li>
							<i class="icon-envelope" style="color:#979797;font-size:20pxpx"></i> Email: pinkrio@yit.com
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