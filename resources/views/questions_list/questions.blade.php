@foreach(App\Question::where('category_id', '=', $category_id)->where('status', '!=', 0)->get() as $question)
    <li>
        <a class="cd-faq-trigger" href="#{{$question->question_id}}">{{$question->question}}</a>
        <div class="cd-faq-content">
            <p>{{$question->response}}</p>
        </div> <!-- cd-faq-content -->
    </li>
@endforeach