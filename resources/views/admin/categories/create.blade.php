@extends('admin.tpl.main')

@section('title', 'Create-New-Category')

@section('content')
    <form method="get">
        <input type="text" name="title" placeholder="Название категории">
        <input type="submit" value="Создать">
    </form>
@endsection