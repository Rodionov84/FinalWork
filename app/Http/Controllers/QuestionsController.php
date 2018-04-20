<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
//use Symfony\Component\Console\Question\Question;

class QuestionsController extends Controller
{
    public function newQuestion(Request $request)
    {
        $new_question = new Question();

        $new_question->user_name = $request->input('user_name');
        $new_question->user_email = $request->input('user_email');
        $new_question->category_id = $request->input('category_id');
        $new_question->question = $request->input('question');

        $new_question->save();

        return redirect('/success_question');
    }

    public function successQuestion()
    {
        //return view('tpl.main')->with("title", "Вопрос задан")->with("content", view('add_question.success'));
        $backLink = "/";
        return view('add_question.success')->with("backLink", $backLink);
    }
}
