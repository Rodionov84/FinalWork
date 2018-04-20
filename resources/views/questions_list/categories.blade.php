@foreach(App\Category::all() as $category)
    <ul id="cat{{$category->id}}" class="cd-faq-group">
        <li class="cd-faq-title"><h2>{{$category->title}}</h2></li>
        @include("questions_list.questions", array("category_id" => $category->id))
    </ul> <!-- cd-faq-group -->
@endforeach

