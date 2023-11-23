<?php

namespace Database\Factories;

use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LectureFactory extends Factory {

	protected $model = Lecture::class;

	public function definition(): array {
		return [
			'name'        => $this->faker->unique()->name(),
			'description' => $this->faker->text(),
			'created_at'  => Carbon::now(),
			'updated_at'  => Carbon::now(),
		];
	}
}
