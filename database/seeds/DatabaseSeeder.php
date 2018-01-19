<?php

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

        Semester::create([
            'name' => 'Semester 2',
            'academic_year' => '2017 to 2018',
            'starts' => '2017-01-20',
            'ends' => '2017-05-19',
        ]);

        Semester::activateUsingId(1);

        $courseUnits = [
            'Database Management systems',
            'Information systems',
            'data mining',
            'Macro Economics',
            'French 2',
            'Operating Systems',
        ];
        foreach ($courseUnits as $courseUnit) {
            \App\CourseUnit::Create([
                'faculty_id' => 1,
                'name' => $courseUnit,
            ]);
        }
        $this->call(NotesTableSeeder::class);
    }
}
