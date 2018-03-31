@foreach(App\Questions::All() as $question)
    <li>
        <a class="cd-faq-trigger" href="#{{$question->question_id}}">{{$question->question}}{{$cat_id}}</a>
        <div class="cd-faq-content">
            <p>{{$question->response}}</p>
        </div> <!-- cd-faq-content -->
    </li>
@endforeach