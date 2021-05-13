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
				<a class="btn btn-success" href="{{ route('menu_add') }}">Добавить меню</a>
			</div>
		</div>
	</div>
</div>

@isset($menus)
<div class="card-box mb-30">
	<h2 class="h4 pd-20">Меню</h2>
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus datatable-nosort">Название</th>
				<th>Путь</th>
				<th class="datatable-nosort">Действие</th>
			</tr>
		</thead>
		<tbody>
			@foreach($menus as $menu)
				<tr>
					<td class="table-plus">
						<h5 class="font-16">{{ $menu->name }}</h5>
					</td>
					<td>
						<p>{{ $menu->path }}</p>
					</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="{{ route('menu_edit', $menu->id) }}"><i class="dw dw-edit2"></i><button class="btn">Редактирование</button></a>
								<form action="{{ route('menu_edit', $menu->id) }}" method="post">
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
</div>
@endisset