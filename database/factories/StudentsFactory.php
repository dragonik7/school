<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentsFactory extends Factory {

	protected $model = Students::class;

	public function definition() {
		return [
			'name'       => $this->faker->name(),
			'email'      => $this->faker->unique()->safeEmail(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
