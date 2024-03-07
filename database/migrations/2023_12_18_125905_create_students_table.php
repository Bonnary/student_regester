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
        Schema::create('students', function (Blueprint $table) {
            // $table->increments('id');
            $table->increments(
                'id'
            )->startingValue(1000000);
            $table->integer(
                'generation'
            );
            $table->text(
                'image'
            )->nullable();
            $table->string(
                'khmer_name'
            );
            $table->string('english_name');
            $table->date('date_of_birth');
            $table->string('sex');
            $table->string(
                'nationality'
            );
            $table->text('address');
            $table->string(
                'phone_number'
            );
            $table->string(
                'facebook_or_email'
            )->nullable();
            $table->integer('parentInfo_id');
            $table->integer(
                'enrollment_type_id'
            );
            $table->integer(
                'session_id'
            );
            $table->integer(
                'subjects_and_colleges_id'
            );
            $table->integer(
                'grade_id'
            )->nullable();
            $table->integer(
                'family_situation_id'
            );
            $table->integer(
                'student_job_id'
            );
            $table->boolean('is_active')->default(true);
            $table->integer('create_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
