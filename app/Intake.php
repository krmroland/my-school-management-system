<?php

namespace App;

use App\Helpers\InteractsWithUser;

class Intake extends BaseModel
{
    use InteractsWithUser;
    /**
     * cast the following fields to native types.
     *
     * @var array
     */
    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($builder)
    {
        return $builder->where(['is_active' => true]);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public static function activateUsingId($id)
    {
        //since almost everything is coupled to intakes
        //we will flush the entire cache once the intake
        //changes
        cache()->flush();
        //deactivate all intakes
        static::query()->update(['is_active' => false]);

        if ($id == -1) {
            return;
        }

        static::findOrFail($id)->update(['is_active' => true]);
    }

    public function timetableLectures()
    {
        return $this->hasMany(TimetableLecture::class);
    }
}
