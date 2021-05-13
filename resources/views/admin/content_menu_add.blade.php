<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item"><a href="{{ route('menu') }}">Меню</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Добавление меню</h4>
		</div>
	</div>
	<form action="{{ route('menu_add') }}" method="post">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" name="name" value="{{ old('name') }}">
		</div>
		<div class="form-group">
			<label>Путь</label>
			<input class="form-control" type="text" name="path" value="{{ old('path') }}">
		</div>
		<button type="submit" class="btn btn-success">Добавить</button>
	</form>
</div>