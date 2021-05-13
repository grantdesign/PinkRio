@if(isset($articles) && isset($comments))
<div id="sidebar-blog-sidebar" class="sidebar group">
	
	<div class="widget-first widget recent-posts">
		<h3>Recent Posts</h3>
		<div class="recent-post group">
			
			@foreach($articles->take(3) as $article)
			<div class="hentry-post group">
				<div class="thumb-img"><img src="{{ asset('storage/'.$article->img->mini) }}" /></div>
				<div class="text">
					<a href="{{ route('article', $article->id) }}" class="title">{{ $article->title }}</a>
					<p>{{ Str::limit($article->desc, 58) }}</p>
					<a class="read-more" href="{{ route('article', $article->id) }}">&rarr; Read More</a>
				</div>
			</div>
			@endforeach

		</div>
	</div>
	
	<div class="widget-last widget recent-comments">
		<h3>Recent Comments</h3>
		<div class="recent-post recent-comments group">
			
			@foreach($comments as $comment)
			<div class="the-post group">
				<div class="avatar">
					<img alt="" src="{{ asset(env('THEME')) }}/images/avatar/unknow55.png" class="avatar" />   
				</div>
				<span class="author"><strong><a href="/">{{ $comment->user->name }}</a></strong> in</span> 
				<a class="title" href="{{ route('article', $comment->article_id) }}">{{ $comment->article->title }}</a>
				<p class="comment">{{ $comment->text }} <a class="goto" href="{{ route('article', $comment->article_id) }}">&#187;</a>
				</p>
			</div>
			@endforeach

		</div>
	</div>
	
</div>
@endif