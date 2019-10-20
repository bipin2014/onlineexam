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
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('q_id');
            $table->unsignedBigInteger('q_no');
            $table->string('main_heading')->nullable();
            $table->string('q_heading')->nullable();
            $table->string('description')->nullable();
            $table->string('description_url')->nullable();
            $table->string('option1')->nullable();
            $table->string('option1_url')->nullable();
            $table->string('option2')->nullable();
            $table->string('option2_url')->nullable();
            $table->string('option3')->nullable();
            $table->string('option3_url')->nullable();
            $table->string('option4')->nullable();
            $table->string('option4_url')->nullable();
            $table->unsignedBigInteger('e_id');
            $table->foreign('e_id')->references('e_id')->on('exams')->onDelete('cascade');
            $table->unsignedBigInteger('answer');
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
