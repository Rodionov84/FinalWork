@foreach(App\Categories::all() as $category)
    <li>
        <a href="#cat{{$category->category_id}}">
            {{$category->title}}
        </a>
    </li>
@endforeach