<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin_categories') }}">Категории</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Редактирование категории</h4>
		</div>
	</div>
	<form action="{{ route('category_edit', $category->id) }}" method="post">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" name="title" value="{{ $category->title }}">
		</div>
		<div class="form-group">
			<label>Псевдоним</label>
			<input class="form-control" type="text" name="alias" value="{{ $category->alias }}">
		</div>
		<button type="submit" class="btn btn-success">Сохранить</button>
	</form>
</div>