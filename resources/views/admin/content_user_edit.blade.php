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
            <h4 class="text-blue h4">Редактирование пользователя</h4>
        </div>
    </div>
    <form action="{{ route('user_edit', $user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label>Имя</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label>Почта</label>
            <input class="form-control" type="text" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label>Права доступа</label>
            <select class="form-control" name="is_admin">
                @foreach($roles as $key => $role)
                    @if($key == $user->is_admin)
                        <option selected="" value="{{ $key }}">{{ $role }}</option>
                    @else
                        <option value="{{ $key }}">{{ $role }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="hidden" name="password" value="{{ $user->password }}">
        <div class="form-group">
            <label>Новый пароль</label>
            <input class="form-control" type="text" name="new_password">
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>