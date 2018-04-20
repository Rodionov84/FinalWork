@extends('tpl.main')

@section('title', 'FAQ')

@section('content')
        @include('questions_list.categories')
        <section class="cd-faq-question" id="add_form">
        @include('add_question.form')
        </section>
@endsection