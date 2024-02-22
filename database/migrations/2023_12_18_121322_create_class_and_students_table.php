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
            $table->string(
                'student_id'
            );
            $table->integer('class_room');
            $table->integer('generation');
            $table->integer('day_id');
            $table->integer('session_id');
            $table->integer('subjects_id');
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
