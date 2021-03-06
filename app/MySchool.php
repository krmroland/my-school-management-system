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
            'activeIntake' => app('active_intake'),
            'DROPBOX_TOKEN' => config('services.dropbox.token'),
        ];
    }

    public function toJson($options = 0)
    {
        return $this->toArray();
    }
}
