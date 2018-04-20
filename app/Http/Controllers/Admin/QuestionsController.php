<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    function listPage(Request $request)
    {
        $category_id = $request->has("category_id") ? intval($request->input("category_id")) : 0;

        if( $category_id > 0 )
        {
            $questions = Question::select('questions.*', 'categories.title')->where("category_id", $category_id)->leftJoin('categories', 'categories.id', '=', 'questions.category_id')->get();
        }
        else
        {
            $questions = Question::select('questions.*', 'categories.title')->join('categories', 'categories.id', '=', 'questions.category_id')->get();
        }

        return view('admin.questions.list')->with("questions", $questions);
    }

    public function editPage(Request $request)
    {
        $question_id = $request->has('question_id') ? intval($request->input('question_id')) : 0;

        $question = Question::where("id", $question_id);

        if ($question->count()) {
            if ($request->has('user_name')) {

                if( $request->has('edit') ) {
                    Question::find($question_id)->update([
                        'user_name' => $request->input('user_name'),
                        'user_email' => $request->input('user_email'),
                        'category_id' => $request->input('category_id'),
                        'question' => $request->input('question'),
                        'response' => $request->input('response')
                    ]);
                }
                else if( $request->has('public') )
                {
                    Question::find($question_id)->update([
                        'status' => 1,
                        'user_name' => $request->input('user_name'),
                        'user_email' => $request->input('user_email'),
                        'category_id' => $request->input('category_id'),
                        'question' => $request->input('question'),
                        'response' => $request->input('response')
                    ]);
                }
                else if( $request->has('hide') )
                {
                    Question::find($question_id)->update([
                        'status' => 2,
                        'user_name' => $request->input('user_name'),
                        'user_email' => $request->input('user_email'),
                        'category_id' => $request->input('category_id'),
                        'question' => $request->input('question'),
                        'response' => $request->input('response')
                    ]);
                }

                $message = "Вопрос успешно отредактирован!";
                $backLink = "/admin/questions";

                return view('admin.message')->with("text", $message)->with("backLink", $backLink);
            }
            else
            {
                $question = $question->first();

                return view('admin.questions.edit')->with("question", $question);
            }
        }
        return "404";
    }

    public function hidePage(Request $request)
    {
        $question_id = $request->has('question_id') ? intval($request->input('question_id')) : 0;

        $question = Question::where("id", $question_id);

        if ($question->count()) {
            if ($request->has('confirm')) {
                $question->update(['status'=>2]);

                return view('admin.message')->with("text", "Вопрос скрыт")->with("backLink", "/admin/questions");
            }

            return view('admin.confirm')
                    ->with("text", "Скрытие вопроса #" . $question_id)
                    ->with("confirm", "/admin/questions/hide?confirm&question_id=" . $question_id)
                    ->with("back", "/admin/questions");
        }

        return "404";
    }

    public function showPage(Request $request)
    {
        $question_id = $request->has('question_id') ? intval($request->input('question_id')) : 0;

        $question = Question::where("id", $question_id);

        if ($question->count()) {
            if ($request->has('confirm')) {
                $question->update(['status'=>1]);

                return view('admin.message')->with("text", "Вопрос опубликован")->with("backLink", "/admin/questions");
            }
            return view('admin.confirm')
                ->with("text", "Опубликовать вопрос #" . $question_id . "?")
                ->with("confirm", "/admin/questions/show?confirm&question_id=" . $question_id)
                ->with("back", "/admin/questions");
        }

        return "404";
    }

    public function deletePage(Request $request)
    {
        $question_id = $request->has('question_id') ? intval($request->input('question_id')) : 0;

        $question = Question::where("id", $question_id);

        if ($question->count()) {
            if ($request->has('confirm')) {
                $question->delete();

                return view('admin.message')->with("text", "Вопрос удалён")->with("backLink", "/admin/questions");
            }

            return view('admin.confirm')
                ->with("text", "Удаление вопроса #" . $question_id)
                ->with("confirm", "/admin/questions/delete?confirm&question_id=" . $question_id)
                ->with("back", "/admin/questions");
        }

        return "404";
    }
}
