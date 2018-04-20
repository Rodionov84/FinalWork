@extends('admin.tpl.main')

@section('title', 'Result')

@section('content')
{{ $text }}
@isset($backLink)
<br><br><a href="{{ $backLink }}"><button class="delete-button">Далее</button></a>
@endisset
@endsection