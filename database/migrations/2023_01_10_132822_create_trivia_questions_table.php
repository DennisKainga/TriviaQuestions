<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trivia_questions', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->enum('difficulty', ['EASY','MEDIUM', 'HARD']);
            $table->string('question');
            $table->string('correct_answer');
            $table->json('incorrect_answers');
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
        Schema::dropIfExists('trivia_questions');
    }
};
