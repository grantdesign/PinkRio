<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Главная</a></li>
					<li class="breadcrumb-item"><a href="{{ route('users') }}">Пользователи</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Контактная информация</h4>
		</div>
	</div>
	<div class="profile-info">
		<ul>
			<li>
				<span>Имя:</span>
				{{ $user->name }}
			</li>
			<li>
				<span>Почта:</span>
				{{ $user->email }}
			</li>
			<li>
				<span>Дата регистрации:</span>
				{{ $user->created_at->format('d.m.Y') }}
			</li>
		</ul>
	</div>
</div>