<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up() {
		Schema::create('group_lectures', function (Blueprint $table) {
			$table->id();
			$table->foreignId('lecture_id')->constrained('lectures')->cascadeOnDelete();
			$table->foreignId('group_id')->constrained('groups')->cascadeOnDelete();
			$table->smallInteger('lecture_order');
			$table->timestamps();
            $table->unique(['lecture_id', 'group_id']);
		});
	}

	public function down() {
		Schema::dropIfExists('group_lectures');
	}
};
