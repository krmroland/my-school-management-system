<?php

namespace App;

use App\Helpers\InteractsWithUser;

class Semester extends BaseModel
{
    use InteractsWithUser;

    /**
     * cast the following fields to native types.
     *
     * @var array
     */
    protected $casts = ['is_active' => 'boolean'];

    /**
     * append the following attributes on serialization.
     *
     * @var array
     */
    protected $appends = ['fullName'];
    /**
     * the cache keys.
     *
     * @var array
     */
    protected $cacheKeys = [
        'semesters.*',
        'semesters.active',
    ];

    public function scopeActive($builder)
    {
        return $builder->where(['is_active' => true]);
    }

    public function getFullNameAttribute()
    {
        return "$this->name ($this->academic_year)";
    }

    public static function activateUsingId($id)
    {
        cache()->flush();
        //deactivate all semesters
        static::query()->update(['is_active' => false]);

        if ($id == -1) {
            return;
        }
        static::findOrFail($id)->update(['is_active' => true]);
    }
}
