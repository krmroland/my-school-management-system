<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public static function reset()
    {
        static::truncate();

        static::create(config('faculties'));

        cache()->forget('faculties.all');
    }

    public static function all(array $columns = ['*'])
    {
        return cache()->rememberForever('faculties.all', function () {
            return static::oldest('name')->get();
        });
    }
}
