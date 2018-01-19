<?php

use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    protected $ids = [];

    public function __construct()
    {
        $this->faker = app(Generator::class);

        $this->ids = \App\CourseUnit::pluck('id');
    }

    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('notes')->insert($this->fakeData());
    }

    public function fakeData()
    {
        return Collection::times(100, function () {
            return [
                'course_unit_id' => $this->ids->random(),
                'contents' => $this->fakeContents(),
                'date' => $this->fakeDate(),
            ];
        })->toArray();
    }

    protected function fakeDate()
    {
        return $this->faker->dateTimeThisMonth->format('Y-m-d');
    }

    public function fakeContents()
    {
        $contents = '<h1>'.$this->faker->sentence(4).'</h4> ';

        for ($i = 0; $i < 4; ++$i) {
            $contents .= '<p>'.$this->faker->paragraph(50).'</p>';
        }

        return $contents;
    }
}
