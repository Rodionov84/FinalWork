<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function listPage()
    {
        return view('admin.categories.list');
    }

    public function deletePage(Request $request)
    {
        $category_id = $request->has('category_id') ? intval($request->input('category_id')) : 0;

        $message = "";
        $backLink = "";

        $category = Category::find($category_id);

        if ($category->count()) {
            if ($request->has('confirm')) {
                $category->delete();
                Question::where("category_id", $category_id)->delete();

                return view('admin.message')->with("text", "Тема удалёна")->with("backLink", "/admin/categories");
            } else {
                return view('admin.confirm')
                    ->with("text", "Удалить тему #" . $category_id . "?")
                    ->with("confirm", "/admin/categories/show?confirm&category_id=" . $category_id)
                    ->with("back", "/admin/categories");
            }
        } else {
            return "$category_id 404";
        }
      //  return view('admin.message')->with("text", $message)->with("backLink", $backLink);
    }


    public function editPage(Request $request)
    {
        $category_id = $request->has('category_id') ? intval($request->input('category_id')) : 0;

        $category = Category::where("id", $category_id);

        if ($category->count()) {
            if ($request->has('title')) {

                Category::find($category_id)->update(['title' => $request->input('title')]);

                $message = "Название темы успешно изменено!!";
                $backLink = "/admin/categories";

                return view('admin.message')->with("text", $message)->with("backLink", $backLink);
            }
            else
            {
                $category = $category->first();

                return view('admin.categories.edit')->with("category_id", $category_id)->with("title", $category->title);
            }
        }
        return "404";
    }

    protected function createPage(Request $request)
    {
        if( $request->has("title") )
        {
            return $this->createCategory($request);
        }
        return view('admin.categories.create');
    }

    function createCategory(Request $request)
    {
        $new_category = new Category();
        $new_category->title = $request->input("title");
        $new_category->save();

        $message = "Тема успешно создана!";
        $backLink = "/admin/categories";

        return view('admin.message')->with("text", $message)->with("backLink", $backLink);
    }

}
