<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class QuestionsController extends Controller
{
    public function newQuestion()
    {
        $new_question = new Questions();

        $new_question->user_name = $_GET["user_name"];
        $new_question->user_email = $_GET["user_email"];
        $new_question->category_id = $_GET["category_id"];
        $new_question->question = $_GET["question"];

        $new_question->save();

        header("Location: /success_question ");
        exit();
    }

    public function successQuestion()
    {
        return view('tpl.main')->with("title", "Вопрос задан")->with("content", view('add_question.success'));
    }
}
