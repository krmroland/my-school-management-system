<?php

namespace App;

class CourseUnit extends BaseModel
{
    public static function getAll()
    {
        return static::latest('name')->get();
    }
}
