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
        Schema::create('class_and_students', function (Blueprint $table) {
            $table->id();
            $table->integer(
                'student_id'
            );
            $table->integer(
                'class_id'
            );
            $table->integer(
                'generation'
            );
            $table->integer(
                'session_id'
            );
            $table->integer(
                'subjects_and_colleges_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_and_students');
    }
};
