<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marks_register', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer(
            'exam_id');
            $table->integer(
            'class_id');
            $table->integer(
            'subject_id');
            $table->integer('college_id');
            $table->integer('session_id');
            $table->integer(
            'class_work');
            $table->integer(
            'home_work');
            $table->integer(
            'test_work');
            $table->integer(
            'exam');
            $table->integer('create_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks_register');
    }
};
