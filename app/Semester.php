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
    protected static $cacheKeys = [
        'semesters.*',
        'semesters.active',
    ];

    /**
     * hook into the booting process of the model.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            static::clearCache();
        });
    }

    protected static function clearCache()
    {
        cache()->deleteMultiple(static::$cacheKeys);
    }

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
        static::clearCache();
        //deactivate all semesters
        static::query()->update(['is_active' => false]);

        if ($id == -1) {
            return;
        }
        static::findOrFail($id)->update(['is_active' => true]);
    }
}
