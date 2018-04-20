@extends('admin.tpl.main')

@section('title', 'Users')

@section('content')
<table width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th><a href="/admin/users/create">Создать нового администратора</a></th>
        </tr>
    </thead>
    <tbody>
    @foreach(App\User::all() as $user)
        <tr>
            <td class="column-admin">{{$user->id}}</td>
            <td class="column-admin">{{$user->login}}</td>
            <td class="column-admin">
                <a href="/admin/users/edit?user_id={{$user->id}}">Изменить пароль</a> <span>/</span>
                <a href="/admin/users/delete?user_id={{$user->id}}">Удалить</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection