<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\Visit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $lectures = Lecture::factory(100)->create();
        $students = Student::factory(20);
        Group::factory(5)
             ->has($students, 'students')
             ->hasAttached($lectures, ['lecture_order' => rand(1, 6)], 'lectures')
             ->create();
        Visit::factory(40)
             ->create();
    }
}
