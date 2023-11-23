<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('lecture_id')->constrained('lectures');
            $table->unique(['student_id', 'lecture_id']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('visits');
    }
};
