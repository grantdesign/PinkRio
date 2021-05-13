<div class="left-side-bar">
	<div class="brand-logo">
		<a href="{{ route('home') }}" target="_blank">
			<img src="{{ asset(env('THEME')) }}/admin/vendors/images/deskapp-logo.png" class="dark-logo">
			<img src="{{ asset(env('THEME')) }}/admin/vendors/images/deskapp-logo-white.png" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li class="dropdown">
					<a href="{{ route('admin') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Главная</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('slider') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-browser2"></span><span class="mtext">Слайдер</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('blog') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-apartment"></span><span class="mtext">Блог</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('admin_portfolios') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-paint-brush"></span><span class="mtext">Портфолио</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('comments') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-chat3"></span><span class="mtext">Комментарии</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('admin_categories') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-list3"></span><span class="mtext">Категории</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('filters') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-invoice"></span><span class="mtext">Фильтры</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('skills') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-analytics-21"></span><span class="mtext">Умения</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('menu') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-diagram"></span><span class="mtext">Меню</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="{{ route('users') }}" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-user"></span><span class="mtext">Пользователи</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>