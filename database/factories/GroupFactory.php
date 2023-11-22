<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GroupFactory extends Factory {

	protected $model = Group::class;

	public function definition() {
		return [
			'name'       => $this->faker->unique()->name(),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];
	}
}
