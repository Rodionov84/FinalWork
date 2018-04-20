@foreach(App\Category::all() as $category)
    <li>
        <a href="#cat{{$category->id}}">
            {{$category->title}}
        </a>
    </li>
@endforeach