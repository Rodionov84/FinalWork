@extends('admin.tpl.main')

@section('title', $text)

@section('content')
    <h2>Вы уверены?</h2>
    <p>{{ $text }}</p><br>
    <a href="{{ $confirm }}" ><button class="delete-button">Да</button></a>
    <a href="{{ $back }}" ><button class="delete-button">Нет</button></a>
@endsection