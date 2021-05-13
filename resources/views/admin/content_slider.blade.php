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
				<a class="btn btn-success" href="{{ route('slider_add') }}">Добавить слайдер</a>
			</div>
		</div>
	</div>
</div>

@isset($sliders)
<div class="card-box mb-30">
	<h2 class="h4 pd-20">Все слайды</h2>
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus datatable-nosort">Изображение</th>
				<th>Название</th>
				<th>Текст</th>
				<th class="datatable-nosort">Действие</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sliders as $slider)
				<tr>
					<td class="table-plus">
						<img src="{{ asset('storage/'.$slider->img) }}" width="200" height="200">
					</td>
					<td>
						<h5 class="font-16">{{ $slider->title }}</h5>
					</td>
					<td>
						<p>{{ $slider->text }}</p>
					</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="{{ route('slider_edit', $slider->id) }}"><i class="dw dw-edit2"></i><button class="btn">Редактирование</button></a>
								<form action="{{ route('slider_edit', $slider->id) }}" method="post">
									@csrf
									@method('DELETE')
									<a href="{{ route('slider_edit', $slider->id) }}" class="dropdown-item"><i class="dw dw-delete-3"></i><button type="submit" class="btn">Удаление</button></a>
								</form>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pl-4 pb-4">{{ $sliders->links() }}</div>
</div>
@endisset