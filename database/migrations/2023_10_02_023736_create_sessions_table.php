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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("section_id");
            $table->unsignedBigInteger("course_id");
            $table->decimal("max_score", 8, 2);
            $table->tinyInteger("status");
            $table->timestamps();
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade");
            $table->foreign("section_id")->references("id")->on("sections")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
