<?php

namespace App;

class AllSemester extends Semester
{
    public function __construct($items = [])
    {
        parent::__construct(
            ['name' => 'All Semesters', 'id' => -1]
        );

        $this->fill($items);
    }

    public function getFullNameAttribute()
    {
        return 'All Semesters';
    }

    public static function activated()
    {
        return new static(['is_active' => true]);
    }
}
