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
				<a class="btn btn-success" href="{{ route('portfolio_add') }}">Добавить портфолио</a>
			</div>
		</div>
	</div>
</div>

@isset($portfolios)
<div class="card-box mb-30">
	<h2 class="h4 pd-20">Портфолио</h2>
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus datatable-nosort">Изображение</th>
				<th>Название</th>
				<th>Описание</th>
				<th>Текст</th>
				<th>Клиент</th>
				<th>Фильтр</th>
				<th>Умение</th>
				<th class="datatable-nosort">Действие</th>
			</tr>
		</thead>
		<tbody>
			@foreach($portfolios as $portfolio)
				<tr>
					<td class="table-plus">
						<img src="{{ asset('storage/'.$portfolio->img->max) }}" width="200" height="200">
					</td>
					<td>
						<h5 class="font-16">{{ $portfolio->title }}</h5>
					</td>
					<td>
						<p>{{ $portfolio->desc }}</p>
					</td>
					<td>
						<p>{{ $portfolio->text }}</p>
					</td>
					<td>
						<p>{{ $portfolio->customer }}</p>
					</td>
					<td>
						<p>{{ $portfolio->filter->title }}</p>
					</td>
					<td>
						<p>{{ $portfolio->skill->title }}</p>
					</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="{{ route('portfolio', $portfolio->id) }}"><i class="dw dw-eye"></i><button class="btn">Просмотр</button></a>
								<a class="dropdown-item" href="{{ route('portfolio_edit', $portfolio->id) }}"><i class="dw dw-edit2"></i><button class="btn">Редактирование</button></a>
								<form action="{{ route('portfolio_edit', $portfolio->id) }}" method="post">
									@csrf
									@method('DELETE')
									<a class="dropdown-item" href=""><i class="dw dw-delete-3"></i><button type="submit" class="btn">Удаление</button></a>
								</form>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pl-4 pb-4">{{ $portfolios->links() }}</div>
</div>
@endisset