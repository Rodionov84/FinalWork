<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table) {
            $table->increments('question_id');
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->string('user_name', 50);
            $table->string('user_email', 50);
            $table->tinyInteger('category_id')->unsigned();
            $table->string('question');
            $table->text('response')->nullable()->defualt(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
