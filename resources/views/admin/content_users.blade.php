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
	</div>
</div>

@isset($users)
<div class="card-box mb-30">
	<h2 class="h4 pd-20">Все пользователи</h2>
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus datatable-nosort">Имя</th>
				<th>Почта</th>
				<th>Права доступа</th>
				<th class="datatable-nosort">Действие</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td class="table-plus">
						<h5 class="font-16">{{ $user->name }}</h5>
					</td>
					<td>
						<p>{{ $user->email }}</p>
					</td>
					<td>
						<p>{{ $user->is_admin === 0 ? 'Пользователь' : 'Администратор' }}</p>
					</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="{{ route('user', $user->id) }}"><i class="dw dw-eye"></i><button class="btn">Просмотр</button></a>
								<a class="dropdown-item" href="{{ route('user_edit', $user->id) }}"><i class="dw dw-edit2"></i><button class="btn">Редактирование</button></a>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endisset