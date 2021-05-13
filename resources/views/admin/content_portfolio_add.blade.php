<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin_portfolios') }}">Портфолио</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Добавление портфолио</h4>
		</div>
	</div>
	<form action="{{ route('portfolio_add') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" name="title" value="{{ old('title') }}">
		</div>
		<div class="form-group">
			<label>Краткое описание</label>
			<input class="form-control" type="text" name="desc" value="{{ old('desc') }}">
		</div>
		<div class="form-group">
			<label>Текст</label>
			<textarea class="form-control" name="text">{{ old('text') }}</textarea>
		</div>
		<div class="form-group">
			<label>Клиент</label>
			<input class="form-control" type="text" name="customer" value="{{ old('customer') }}">
		</div>
		<div class="form-group">
			<label>Фильтр</label>
			<select class="custom-select form-control" name="filter_alias">
				@foreach($filters as $filter)
					<option value="{{ $filter->alias }}">{{ $filter->title }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Умение</label>
			<select class="custom-select form-control" name="skill_alias">
				@foreach($skills as $skill)
					<option value="{{ $skill->alias }}">{{ $skill->title }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Min изображение</label>
			<input type="file" class="form-control-file form-control height-auto" name="min_img">
		</div>
		<div class="form-group">
			<label>Max изображение</label>
			<input type="file" class="form-control-file form-control height-auto" name="max_img">
		</div>
		<div class="form-group">
			<label>Path изображение</label>
			<input type="file" class="form-control-file form-control height-auto" name="path_img">
		</div>
		<button type="submit" class="btn btn-success">Добавить</button>
	</form>
</div>