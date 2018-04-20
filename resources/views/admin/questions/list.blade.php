@extends('admin.tpl.main')

@section('title', 'Вопросы категории')

@section('content')
    <table width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>Тема</th>
            <th>Автор</th>
            <th>Вопрос</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <td class="column-admin">{{$question->id}}</td>
                <td class="column-admin" style="color: {{$question->status ? ( $question->status == 1 ? "green" : "red" ) : "gray" }}">
                    {{$question->status ? ( $question->status == 1 ? "Опубликован" : "Скрыт" ) : "Ожидает ответа" }}
                </td>
                <td class="column-admin">{{$question->created_at }}</td>
                <td class="column-admin">{{$question->title }}</td>
                <td class="column-admin">{{$question->user_name}}<br>{{$question->user_email}}</td>
                <td class="column-admin">{{$question->question}}</td>
                <td class="column-admin">
                    @if ($question->status != 1)
                        <a href="/admin/questions/show?question_id={{$question->id}}">Опубликовать</a>
                    @else
                        <a href="/admin/questions/hide?question_id={{$question->id}}">Скрыть</a>
                    @endif
                </td>
               <td class="column-admin">
                    <a href="/admin/questions/edit?question_id={{$question->id}}">Изменить</a> <br><br>
                       <a href="/admin/questions/delete?question_id={{$question->id}}">Удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection