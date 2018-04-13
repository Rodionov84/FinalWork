<table width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th><a href="/admin/users/create">Создать нового администратора</a></th>
        </tr>
    </thead>
    <tbody>
    @foreach(App\Users::all() as $user)
        <tr>
            <td class="column-admin">{{$user->user_id}}</td>
            <td class="column-admin">{{$user->login}}</td>
            <td class="column-admin">
                <a href="/admin/users/edit?user_id={{$user->user_id}}">Изменить пароль</a> <span>/</span>
                <a href="/admin/users/remove?user_id={{$user->user_id}}">Удалить из списка</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>