<?php

namespace App;

use Illuminate\Contracts\Support\Jsonable;

class MySchool implements Jsonable, \JsonSerializable
{
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        return [
            'activeSemester' => app('active_semester'),
        ];
    }

    public function toJson($options = 0)
    {
        return $this->toArray();
    }
}
