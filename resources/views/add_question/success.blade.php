@extends('tpl.main')

@section('title', 'Вопрос задан..')

@section('content')
    <h2>Спасибо за обращение! Ожидайте ответа.</h2><br><br>

    @isset($backLink)
        <a href="{{ $backLink }}"><button class="delete-button">Вернуться на главную</button></a>
    @endisset
@endsection

