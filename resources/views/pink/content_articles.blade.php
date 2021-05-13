@if(isset($articles))
<div id="primary" class="sidebar-right">
	<div class="inner group">
		<!-- START CONTENT -->
		<div id="content-blog" class="content group">
			
			@foreach($articles as $key => $article)
			<div class="sticky hentry hentry-post blog-big group">
				<!-- post featured & title -->
				<div class="thumbnail">
					<!-- post title -->
					<h2 class="post-title"><a href="{{ route('article', $article->id) }}">{{ $article->title }}</a></h2>
					<!-- post featured -->
					<div class="image-wrap">
						<img src="{{ asset('storage/'.$article->img->max) }}" />
					</div>
					<p class="date">
						<span class="month">{{ $article->created_at->format('M') }}</span>
						<span class="day">{{ $article->created_at->format('d') }}</span>
					</p>
				</div>
				<!-- post meta -->
				<div class="meta group">
					<p class="author"><span>by <a href="{{ route('profile', $article->user->id) }}" rel="author">{{ $article->user->name }}</a></span></p>
					<p class="categories"><span>In: <a href="{{ route('categories', $article->category->id) }}" rel="category tag">{{ $article->category->title }}</a></span></p>
					<p class="comments"><span><a href="{{ route('article', $article->id) }}">
					{{ count($article->comments->toArray()) > 0 ? count($article->comments->toArray()).' comments' : 'No comments' }} </a></span></p>
				</div>
				<!-- post content -->
				<div class="the-content group">
					<p>{{ $article->desc }}</p>
					<p><a href="{{ route('article', $article->id) }}" class="btn btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ Read more</a></p>
				</div>
				<div class="clear"></div>
			</div>
			@endforeach
			
			<div class="general-pagination group">
			
				@if($articles->lastPage() > 1) 
					
					@if($articles->currentPage() !== 1)
						<a href="{{ $articles->url(($articles->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
					@endif
					
					@for($i = 1; $i <= $articles->lastPage(); $i++)
						@if($articles->currentPage() == $i)
							<a class="selected disabled">{{ $i }}</a>
						@else
							<a href="{{ $articles->url($i) }}">{{ $i }}</a>
						@endif
					@endfor
					
					@if($articles->currentPage() !== $articles->lastPage())
						<a href="{{ $articles->url(($articles->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
					@endif
				
				@endif
			
			</div>
			
		</div>
@endif