@isset($slider)
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
			<h4 class="text-blue h4">Редактирование слайдера</h4>
		</div>
	</div>
	<form action="{{ route('slider_edit', $slider->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" value="{{ $slider->title }}" name="title" placeholder="Пример: PINKRIO. <span>STRONG AND POWERFUL.</span>">
		</div>
		<div class="form-group">
			<label>Текст</label>
			<textarea class="form-control" name="text">{{ $slider->text }}</textarea>
		</div>
		<div class="form-group">
			<label>Старое изображение</label><br>
			<img src="{{ asset('storage/'.$slider->img) }}" class="img-fluid" width="200" height="200">
		</div>
		<div class="form-group">
			<label>Новое изображение</label><br>
			<input type="file" class="form-control-file form-control height-auto" name="img">
		</div>
		<button type="submit" class="btn btn-success">Сохранить</button>
	</form>
</div>
@endisset