@if(isset($portfolios) && isset($portfolioRandOne))
<div id="primary" class="sidebar-right">
	<div class="inner group">
		<div id="content-home" class="content group">
			<div class="hentry group">
				<div class="section portfolio">
					
					<h3 class="title">Latest projects</h3>
					
					<div class="hentry work group portfolio-sticky portfolio-full-description">
						<div class="work-thumbnail">
							<a class="thumb"><img src="{{ asset('storage/'.$portfolioRandOne->img->max) }}" /></a>
							<div class="work-overlay">
								<h3><a href="{{ route('portfolio', $portfolioRandOne->id) }}">{{ $portfolioRandOne->title }}</a></h3>
								<p class="work-overlay-categories"><img src="{{asset(env('THEME'))}}/images/categories.png" alt="Categories" /> in: <a href="{{ route('home') }}">{{ $portfolioRandOne->filter->title }}</a></a></p>
							</div>
						</div>
						<div class="work-description">
							<h2><a href="{{ route('portfolio', $portfolioRandOne->id) }}">{{ $portfolioRandOne->title }}</a></h2>
							<p class="work-categories">in: <a href="{{ route('home') }}">{{ $portfolioRandOne->filter->title }}</a></p>
							<p>{{ Str::limit($portfolioRandOne->text, 200) }} [...]</p>
							<a href="{{ route('portfolio', $portfolioRandOne->id) }}" class="read-more">|| Read more</a>
						</div>
					</div>
					
					<div class="clear"></div>
					
					<div class="portfolio-projects">
						
						@foreach($portfolios as $key => $portfolio)
						@if($key < 3)
						<div class="related_project">
							<div class="overlay_a related_img">
								<div class="overlay_wrapper">
									<img src="{{ asset('storage/'.$portfolio->img->mini) }}" />					
									<div class="overlay">
										<a class="overlay_img" href="{{ asset('storage/'.$portfolio->img->path) }}" rel="lightbox"></a>
										<a class="overlay_project" href="{{ route('portfolio', $portfolio->id) }}"></a>
										<span class="overlay_title">{{ $portfolio->title }}</span>
									</div>
								</div>
							</div>
							<h4><a href="{{ route('portfolio', $portfolio->id) }}">{{ $portfolio->title }}</a></h4>
							<p>{{ $portfolio->desc }} [...]
							</div>
							@else
							<div class="related_project_last related_project">
								<div class="overlay_a related_img">
									<div class="overlay_wrapper">
										<img src="{{ asset('storage/'.$portfolio->img->mini) }}" />                      
										<div class="overlay">
											<a class="overlay_img" href="{{ asset('storage/'.$portfolio->img->path) }}" rel="lightbox"></a>
											<a class="overlay_project" href="{{ route('portfolio', $portfolio->id) }}"></a>
											<span class="overlay_title">{{ $portfolio->title }}</span>
										</div>
									</div>
								</div>
								<h4><a href="{{ route('portfolio', $portfolio->id) }}">{{ $portfolio->title }}</a></h4>
								<p>{{ $portfolio->desc }} [...]
								</div>
								@endif
								@endforeach
								
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<!-- START COMMENTS -->
					<div id="comments">
					</div>
					<!-- END COMMENTS -->
				</div>
				@endif