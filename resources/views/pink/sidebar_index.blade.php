@if(isset($articles))
<div class="sidebar group">
    
    <div class="widget-first widget recent-posts">
        <h3>From our blog</h3>
        <div class="recent-post group">
            @foreach($articles as $article)
            <div class="hentry-post group">
                <div class="thumb-img"><img src="{{ asset('storage/'.$article->img->mini) }}" /></div>
                <div class="text">
                    <a href="{{ route('article', $article->id) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title }}</a>
                    <p class="post-date">September 24, 2012</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <div class="widget-last widget text-image">
        <h3>Customer support</h3>
        <div class="text-image" style="text-align:left"><img src="{{ asset(env('THEME')) }}/images/callus.gif" alt="Customer support" /></div>
        <p>Proin porttitor dolor eu nibh lacinia at ultrices lorem venenatis. Sed volutpat scelerisque vulputate. </p>
    </div>
    
</div>
@endif