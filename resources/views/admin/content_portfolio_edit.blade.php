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
			<h4 class="text-blue h4">Редактирование портфолио</h4>
		</div>
	</div>
	<form action="{{ route('portfolio_edit', $portfolio->id) }}" method="post">
		@csrf
		<div class="form-group">
			<label>Название</label>
			<input class="form-control" type="text" name="title" value="{{ $portfolio->title }}">
		</div>
		<div class="form-group">
			<label>Краткое описание</label>
			<input class="form-control" type="text" name="desc" value="{{ $portfolio->desc }}">
		</div>
		<div class="form-group">
			<label>Текст</label>
			<textarea class="form-control" name="text">{{ $portfolio->text }}</textarea>
		</div>
		<div class="form-group">
			<label>Клиент</label>
			<input class="form-control" type="text" name="customer" value="{{ $portfolio->customer}}">
		</div>
		<div class="form-group">
			<label>Фильтр</label>
			<select class="custom-select form-control" name="filter_alias">
				@foreach($filters as $filter)
					@if($filter->alias == $portfolio->filter_alias)
						<option selected="" value="{{ $filter->alias }}">{{ $filter->title }}</option>
					@else
						<option value="{{ $filter->alias }}">{{ $filter->title }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Умение</label>
			<select class="custom-select form-control" name="skill_alias">
				@foreach($skills as $skill)
					@if($skill->alias == $portfolio->skill_alias)
						<option selected="" value="{{ $skill->alias }}">{{ $skill->title }}</option>
					@else
						<option value="{{ $skill->alias }}">{{ $skill->title }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<input type="hidden" name="img" value="{{ $portfolio->img }}">
		<button type="submit" class="btn btn-success">Сохранить</button>
	</form>
</div>