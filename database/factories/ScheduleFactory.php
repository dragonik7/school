<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Schedule;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScheduleFactory extends Factory {

	protected $model = Schedule::class;

	public function definition(): array {
		return [
			'lecture_id'    => Lecture::query()->get()->random()->id,
			'group_id'      => Group::query()->get()->random()->id,
			'lecture_order' => $this->faker->randomNumber(),
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),
		];
	}
}
