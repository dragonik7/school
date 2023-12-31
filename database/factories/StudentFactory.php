<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentFactory extends Factory {

	protected $model = Student::class;

	public function definition(): array {
		return [
			'name'       => $this->faker->name(),
			'email'      => $this->faker->unique()->safeEmail(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
