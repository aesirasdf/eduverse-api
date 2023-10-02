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
        Schema::create('session_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("session_id");
            $table->unsignedBigInteger("student_id");
            $table->unsignedBigInteger("question_id");
            $table->timestamps();


            $table->foreign("session_id")->references("id")->on("sessions")->onDelete("cascade");
            $table->foreign("student_id")->references("id")->on("students")->onDelete("cascade");
            $table->foreign("question_id")->references("id")->on("questions")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_details');
    }
};
