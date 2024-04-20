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
        Schema::create('exam_schedule', function (Blueprint $table) {
            $table->id();
            $table->integer(
                'exam_id'
            );
            $table->integer(
                'class_id'
            );
            $table->integer('subject_id');
            $table->integer('college_id');
            $table->integer('session_id');
            $table->date(
                'exam_date'
            );
            $table->string(
                'start_time'
            );
            $table->string(
                'end_time'
            );
            $table->string(
                'room_number'
            );
            $table->string(
                'full_marks'
            );
            $table->string(
                'passing_mark'
            );
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_schedule');
    }
};
