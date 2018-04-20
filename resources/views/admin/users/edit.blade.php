@extends('admin.tpl.main')

@section('title', 'User-edit')

@section('content')
<form method="get">
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <input type="text" disabled value="{{ $login }}" >
    <input type="password" name="current_password" required value="" minlength="5" placeholder="Старый пароль">
    <input type="password" name="new_password" required value="" minlength="5" placeholder="Новый пароль">
    <input type="password" name="new_re_password" required value="" minlength="5" placeholder="Подтверждение пароля">
    <input type="submit" value="Изменить пароль">
</form>
@endsection