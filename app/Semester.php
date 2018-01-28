<?php

namespace App;

class Semester extends BaseModel
{
    /**
     * append the following attributes on serialization.
     *
     * @var array
     */
    protected $appends = ['fullName'];

    public function getFullNameAttribute()
    {
        return "$this->name ($this->academic_year)";
    }

    public function intake()
    {
        return $this->hasMany(Intake::class);
    }

    public static function boot()
    {
        parent::boot();
        // temporarily we will create a new intake
        // when a semester is created
        static::created(function ($semester) {
            $semester->intake()->create([]);
        });
    }
}
