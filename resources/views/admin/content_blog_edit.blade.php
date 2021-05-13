<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item"><a href="{{ route('blog') }}">Блог</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Редактирование статьи</h4>
		</div>
	</div>
	<form action="{{ route('blog_edit', $article->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" name="title" value="{{ $article->title }}">
		</div>
		<div class="form-group">
			<label>Краткое описание</label>
			<input class="form-control" type="text" name="desc" value="{{ $article->desc }}">
		</div>
		<div class="form-group">
			<label>Текст</label>
			<textarea id="content1" class="form-control" name="text">{{ $article->text }}</textarea>
		</div>
		<input type="hidden" name="img" value="{{ $article->img }}">
		<input type="hidden" name="user_id" value="{{ $article->user_id }}">
		<div class="form-group">
			<label>Категория</label>
			<select class="custom-select form-control" name="category_id">
				@foreach($categories as $category)
					@if($category->id == $article->category_id)
						<option selected="" value="{{ $category->id }}">{{ $category->title }}</option>
					@else
						<option value="{{ $category->id }}">{{ $category->title }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-success">Сохранить</button>
	</form>
</div>