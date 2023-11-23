<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\Student;
use App\Models\Visit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VisitFactory extends Factory {

    protected $model = Visit::class;

    public function definition(): array {
        return [
            'student_id' => Student::query()->get()->random()->id,
            'lecture_id' => Lecture::query()->get()->random()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
