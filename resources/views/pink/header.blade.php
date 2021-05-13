<div id="header" class="group">

	<div class="group inner">

		<!-- START LOGO -->
		<div id="logo" class="group">
			<a href="{{ route('home') }}" title="Pink Rio"><img src="{{ asset(env('THEME')) }}/images/logo.png" title="Pink Rio" alt="Pink Rio" /></a>
		</div>
		<!-- END LOGO -->

		<div id="sidebar-header" class="group">
			<div class="widget-first widget yit_text_quote">
				<blockquote class="text-quote-quote">&#8220;The caterpillar does all the work but the butterfly gets all the publicity.&#8221;</blockquote>
				<cite class="text-quote-author">George Carlin</cite>
			</div>
		</div>
		<div class="clearer"></div>

		<hr />
		
		<!-- START MAIN NAVIGATION -->
		@if($menus)
		<div class="menu classic">
			<ul id="nav" class="menu">
				@foreach($menus as $key => $menu)
				<li>
					<a href="{{ $menu->path }}">{{ $menu->name }}</a>
					@if($menu->name == 'BLOG')
						<ul class="sub-menu">
							@foreach($categories as $category)
						    	<li><a href="{{ route('categories', $category->id) }}">{{ $category->title }}</a></li>
						    @endforeach
						</ul>
					@endif
				</li>
				@endforeach
			</ul>
		</div>
		@endif
		<!-- END MAIN NAVIGATION -->

		<div id="header-shadow"></div>
		<div id="menu-shadow"></div>
	</div>

</div>