<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
		<div class="col-md-6 col-sm-12 text-right">
			<div class="dropdown">
				<a class="btn btn-success" href="{{ route('blog_add') }}">Добавить статью</a>
			</div>
		</div>
	</div>
</div>

@isset($articles)
<div class="card-box mb-30">
	<h2 class="h4 pd-20">Все статьи</h2>
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus datatable-nosort">Изображение</th>
				<th>Название</th>
				<th>Описание</th>
				<th>Текст</th>
				<th>Пользователь</th>
				<th>Категория</th>
				<th class="datatable-nosort">Действие</th>
			</tr>
		</thead>
		<tbody>
			@foreach($articles as $article)
				<tr>
					<td class="table-plus">
						<img src="{{ asset('storage/'.$article->img->max) }}" width="200" height="200">
					</td>
					<td>
						<h5 class="font-16">{{ $article->title }}</h5>
					</td>
					<td>
						<p>{{ $article->desc }}</p>
					</td>
					<td>
						<p>{{ $article->text }}</p>
					</td>
					<td>
						<p>{{ $article->user->name }}</p>
					</td>
					<td>
						<p>{{ $article->category->title }}</p>
					</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="{{ route('article', $article->id) }}"><i class="dw dw-eye"></i><button class="btn">Просмотр</button></a>
								<a class="dropdown-item" href="{{ route('blog_edit', $article->id) }}"><i class="dw dw-edit2"></i><button class="btn">Редактирование</button></a>
								<form action="{{ route('blog_edit', $article->id) }}" method="post">
									@csrf
									@method('DELETE')
									<a class="dropdown-item" href="{{ route('blog_edit', $article->id) }}"><i class="dw dw-delete-3"></i><button type="submit" class="btn">Удаление</button></a>
								</form>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pl-4 pb-4">{{ $articles->links() }}</div>
</div>
@endisset