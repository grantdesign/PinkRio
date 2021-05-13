				<div id="primary" class="sidebar-right">
					<div class="inner group">
						@if(session('status'))
							<p class="success">{{ session('status') }}</p>
						@endif

						@if ($errors->any())
							<div class="alert alert-danger">
							    <ul>
							        @foreach ($errors->all() as $error)
							            <li>{{ $error }}</li>
							        @endforeach
							    </ul>
							</div>
						@endif
						<!-- START CONTENT -->
						<div id="content-single" class="content group">
							<div class="hentry hentry-post blog-big group ">
								<!-- post featured & title -->
								<div class="thumbnail">
									<!-- post title -->
									<h1 class="post-title"><a href="{{ route('article', $article->id) }}">{{ $article->title }}</a></h1>
									<!-- post featured -->
									<div class="image-wrap">
										<img src="{{ asset('storage/'.$article->img->max) }}">
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
									<p class="comments"><span><a href="/">{{ count($article->comments) > 0 ? count($article->comments).' comments' : 'No comments' }}</a></span></p>
								</div>
								<!-- post content -->
								<div class="the-content single group">
									{!! $article->text !!}
									<div class="socials">
										<h2>love it, share it!</h2>
										<a href="/" class="socials-small facebook-small" title="Facebook">facebook</a>
										<a href="/" class="socials-small twitter-small" title="Twitter">twitter</a>
										<a href="/" class="socials-small google-small" title="Google">google</a>
										<a href="/" class="socials-small pinterest-small" title="Pinterest">pinterest</a>
										<a href="/" class="socials-small bookmark-small" title="This is the title of the first article. Enjoy it.">bookmark</a>
									</div>
								</div>
							</div>

							
							<!-- START COMMENTS -->
							<div id="comments">
								@if(count($article->comments) > 0)
								<h3 id="comments-title">
									<span>{{ count($article->comments) }}</span> comments
								</h3>
								<ol class="commentlist group">
									@foreach($article->comments as $key => $comment)
									<li class="comment even depth-1">
										<div class="comment-container">
											<div class="comment-author vcard">
												<img alt="" src="{{ asset(env('THEME')) }}/images/avatar/unknow.png" class="avatar" height="75" width="75" />
												<cite class="fn">{{ $comment->user_id != null ? $comment->user->name : $comment->name }}</cite>           
											</div>
											<!-- .comment-author .vcard -->
											<div class="comment-meta commentmetadata">
												<div class="intro">
													<div class="commentDate">
														<a href="">{{ date('d-m-Y', strtotime($comment->created_at)) }}</a>                        
													</div>
													<div class="commentNumber">#&nbsp;{{ $key+1 }}</div>
												</div>
												<div class="comment-body">
													<p>{{ $comment->text }}</p>
												</div>
											</div>
											<!-- .comment-meta .commentmetadata -->
										</div>
										<!-- #comment-##  -->
									</li>
									@endforeach
								</ol>
							@else
							<h2>No comments</h2>
							@endif
								<div id="respond">
									<h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
									<form action="{{ route('article', $article->id) }}" method="post" id="commentform">
										@csrf
										<p class="comment-form-author"><label for="author">Name</label> <input id="author" name="name" type="text" value="{{ old('name') }}" size="30" aria-required="true" /></p>
										<p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="{{ old('email') }}" size="30" aria-required="true" /></p>
										<p class="comment-form-url"><label for="url">Website</label><input id="url" name="site" type="text" value="{{ old('site') }}" size="30" /></p>
										<p class="comment-form-comment"><label for="comment">Your comment</label><textarea id="comment" name="text" cols="45" rows="8">{{ old('text') }}</textarea></p>
										<div class="clear"></div>
										<input type="hidden" name="article_id" value="{{ $article->id }}">
										@if(Auth::user())
										<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
										@endif
										<p class="form-submit">
											<input type="submit" id="submit" value="Post Comment" />
										</p>
									</form>
								</div>
								<!-- #respond -->
							</div>
							<!-- END COMMENTS -->
						</div>