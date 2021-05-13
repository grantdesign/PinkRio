<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item"><a href="{{ route('slider') }}">Слайдер</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Добавление слайдера</h4>
		</div>
	</div>
	<form action="{{ route('slider_add') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" name="title" placeholder="Пример: PINKRIO. <span>STRONG AND POWERFUL.</span>">
		</div>
		<div class="form-group">
			<label>Текст</label>
			<textarea class="form-control" name="text"></textarea>
		</div>
		<div class="form-group">
			<label>Изображение</label>
			<input type="file" class="form-control-file form-control height-auto" name="img">
		</div>
		<button type="submit" class="btn btn-success">Добавить</button>
	</form>
</div>