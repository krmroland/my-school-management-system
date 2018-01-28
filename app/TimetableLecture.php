<?php

namespace App;

use App\Helpers\InteractsWithIntakes;

class TimetableLecture extends BaseModel
{
    use InteractsWithIntakes;

    public function cacheAll()
    {
        return Intake::active()->with(
            [
                'semester' => function ($builder) {
                    return $builder->latest('to');
                },
                'timetableLectures.courseUnit',
                'timetableLectures' => function ($builder) {
                    return $builder->orderBy('time', 'day');
                },
            ]
        )->first() ?: collect([]);
    }

    public function setVenueAttribute($venue)
    {
        $this->attributes['venue'] = strtoupper($venue);
    }

    public function courseUnit()
    {
        return $this->belongsTo(CourseUnit::class);
    }

    public static function process($attributes)
    {
        $dayAndTime = array_only($attributes, ['day', 'hour', 'dayTime']);

        $lecture = static::where($dayAndTime)->first();

        if ($lecture) {
            return $lecture->update($attributes);
        }
        static::create($attributes);
    }
}
