<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\Lecture;
use App\Models\Students;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $lectures = Lecture::factory()->count(20);
        $students = Students::factory()->count(20);
        Group::factory()
             ->count(5)
             ->has($students, 'students')
             ->hasAttached($lectures,['lecture_order'=> rand(1,6)], 'lectures')
             ->create();
    }
}
