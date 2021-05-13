@if(isset($portfolio) && isset($portfolios))
<div id="primary" class="sidebar-no">
	<div class="inner group">
		<div id="content-page" class="content group">
			<div class="clear"></div>
			<div class="posts">
				<div class="group portfolio-post internal-post">
					<div id="portfolio" class="portfolio-full-description">

						<div class="fulldescription_title gallery-filters">
							<h1>{{ $portfolio->title }}</h1>
						</div>
						
						<div class="portfolios hentry work group">
							<div class="work-thumbnail">
								<a class="thumb"><img src="{{ asset('storage/'.$portfolio->img->max) }}"></a>
							</div>
							<div class="work-description">
								<p>{{ $portfolio->text }}</p>
								<div class="clear"></div>
								<div class="work-skillsdate">
									<p class="skills"><span class="label">Skills:</span> {{ $portfolio->skill->title }}</p>
									<p class="workdate"><span class="label">Customer:</span> {{ $portfolio->customer }}</p>
									<p class="workdate"><span class="label">Year:</span> {{ $portfolio->created_at->year }}</p>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
						
						<h3>Other Projects</h3>
						
						<div class="portfolio-full-description-related-projects">

							@foreach($portfolios as $portfolio)
							<div class="related_project">
								<a class="related_proj related_img" href="{{ route('portfolio', $portfolio->id) }}"><img src="{{ asset('storage/'.$portfolio->img->mini) }}" /></a>
								<h4><a href="#">{{ $portfolio->title }}</a></h4>
							</div>
							@endforeach
							
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		@endif