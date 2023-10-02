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
        Schema::create('section_student', function (Blueprint $table) {
            $table->unsignedBigInteger("section_id");
            $table->unsignedBigInteger("student_id");
            
            $table->primary("section_id", "student_id");
            $table->foreign("section_id")->references("id")->on("sections");
            $table->foreign("student_id")->references("id")->on("students");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_student');
    }
};
