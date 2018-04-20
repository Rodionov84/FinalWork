@extends('admin.tpl.main')

@section('title', 'Редактирование вопроса')

@section('content')
    <form method="get">
        <input class="cd-faq-question-2" type="hidden" name="question_id" value="{{ $question->id }}">
        <input class="cd-faq-question-2" type="text" name="user_name" required placeholder="Автор" value="{{ $question->user_name }}">
        <input class="cd-faq-question-2" type="email" name="user_email" required placeholder="Email" value="{{ $question->user_email }}">
        <select class="cd-faq-question-2" name="category_id"  required>
            @foreach(App\Category::all() as $category)
                <option {{ $category->id == $question->category_id ? 'selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <input class="cd-faq-question-2" type="text" name="question" required placeholder="Вопрос" value="{{ $question->question }}">
        <textarea class="cd-faq-question-2" name="response" style="height: 200px;">{{ $question->response }}</textarea>
        <input name="edit" class="cd-faq-question-2" type="submit" value="Изменить">
        @if ($question->status != 1)
            <input name="public" class="cd-faq-question-2" type="submit" value="Опубликовать">
        @endif
        @if ($question->status != 2)
            <input name="hide" class="cd-faq-question-2" type="submit" value="Скрыть">
        @endif
    </form>
@endsection