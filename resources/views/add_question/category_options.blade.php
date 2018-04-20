@foreach(App\Category::all() as $category)
    <option value="{{$category->id}}">{{$category->title}}</option>
@endforeach