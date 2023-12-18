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
        Schema::create('parents_info', function (Blueprint $table) {
            $table->id();
            $table->string('father_name');
            $table->string(
                'father_nationality'
            );
            $table->string(
                'father_occupation'
            );
            $table->string(
                'father_phone_number'
            );
            $table->string(
                'mother_name'
            );
            $table->string(
                'mother_nationality'
            );
            $table->string(
                'mother_occupation'
            );
            $table->string('mother_phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents_info');
    }
};
