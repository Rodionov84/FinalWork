@extends('admin.tpl.main')

@section('title', 'Категории')

@section('content')
<table width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Всего</th>
            <th>Опубликовано</th>
            <th>Без ответа</th>
            <th><a href="/admin/categories/create">Создать новую категорию</a></th>
        </tr>
    </thead>
    <tbody>
    @foreach(App\Category::all() as $category)
        <tr>
            <td class="column-admin">{{$category->id}}</td>
            <td class="column-admin"><a href="/admin/categories/questions?category_id={{ $category->id }}">{{$category->title}}</a></td>
            <td class="column-admin">{{ App\Question::where('category_id', $category->id)->count() }}</td>
            <td class="column-admin">{{ App\Question::where('category_id', $category->id)->where('status', '!=', 0 )->count() }}</td>
            <td class="column-admin">{{ App\Question::where('category_id', $category->id)->where('status', '!=', 1 )->count() }}</td>
            <td class="column-admin">
                <a href="/admin/categories/edit?category_id={{$category->id}}">Изменить категорию</a> <span>/</span>
                <a href="/admin/categories/delete?category_id={{$category->id}}">Удалить категорию</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection