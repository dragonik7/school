<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\GroupLecture;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GroupLectureFactory extends Factory {

	protected $model = GroupLecture::class;

	public function definition() {
		return [
			'lecture_id'    => Lecture::query()->get()->random()->id,
			'group_id'      => Group::query()->get()->random()->id,
			'lecture_order' => $this->faker->randomNumber(),
			'created_at'    => Carbon::now(),
			'updated_at'    => Carbon::now(),
		];
	}
}
