@extends('admin.tpl.main')

@section('title', 'Create user')

@section('content')
<form method="get">
    <input type="text" name="username" required value="" minlength="4" maxlength="30" placeholder="Имя пользователя">
    <input type="password" name="password" required value="" minlength="6" placeholder="Пароль">
    <input type="password" name="re_password" required value="" minlength="6" placeholder="Подтверждение пароля">
    <input type="submit" value="Создать">
</form>
@endsection