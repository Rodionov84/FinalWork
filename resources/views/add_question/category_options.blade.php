@foreach(App\Categories::all() as $category)
    <option value="{{$category->category_id}}">{{$category->title}}</option>
@endforeach