@extends('admin.tpl.main')

@section('title', 'User-edit')

@section('content')
<h2>Вы уверены?</h2>
<p>Удаление модератора #{{$user_id}}</p><br>
<a href="/admin/users/delete?user_id={{$user_id}}&confirm" ><button class="delete-button">Да</button></a>
<a href="/admin/users" ><button class="delete-button">Нет</button></a>
@endsection