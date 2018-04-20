@extends('admin.tpl.main')

@section('title', 'Edit-Name-Category')

@section('content')
    <form method="get">
        <input type="hidden" name="category_id" value="{{ $category_id }}">
        <input type="text" name="title" placeholder="Изменить название" value="{{ $title }}">
        <input type="submit" value="Изменить">
    </form>
@endsection