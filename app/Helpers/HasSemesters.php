<?php

namespace App\Helpers;

use App\AllSemester;
use App\Semester;

trait HasSemesters
{
    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }

    public function activeSemester()
    {
        return cache()->rememberForever('semesters.active', function () {
            return $this->semesters()->active()->first() ?: AllSemester::activated();
        });
    }

    public function allSemeters()
    {
        return cache()->remember('semesters.*', 60, function () {
            $data = $this->semesters()->latest('to')->get();

            if ($data->isNotEmpty()) {
                $data[] = new AllSemester();
            }

            return $data;
        });
    }
}
