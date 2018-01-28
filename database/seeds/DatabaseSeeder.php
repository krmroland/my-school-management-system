<?php

use App\Intake;
use App\Semester;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        cache()->flush();
        $this->call(UsersTableSeeder::class);
        auth()->loginUsingId(1);
        \App\Faculty::reset();

        // Semester::create([
        //     'name' => 'Semester 2',
        //     'academic_year' => '2017 to 2018',
        //     'starts' => '2017-01-20',
        //     'ends' => '2017-05-19',
        // ]);

        // Intake::activateUsingId(1);

        // $courseUnits = [
        //     'BIS3206' => 'Database Management systems',
        //     'BIS3207' => 'Information systems',
        // ];
        // foreach ($courseUnits as $code => $courseUnit) {
        //     \App\CourseUnit::Create([
        //         'faculty_id' => 1,
        //         'code' => $code,
        //         'creditUnits' => 2,
        //         'name' => $courseUnit,
        //     ]);
        // }

        // $this->call(NotesTableSeeder::class);
    }
}
