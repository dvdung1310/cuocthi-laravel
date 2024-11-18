<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exam_user', function (Blueprint $table) {
            $table->id();
            $table->json('list_question'); 
            $table->json('selected_answers');
            $table->integer('point')->default(0);
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_user');
    }
};
