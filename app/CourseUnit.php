<?php

namespace App;

use App\Helpers\CourseUnitPdfGenerator;
use App\Helpers\HasNotes;
use App\Helpers\InteractsWithIntakes;

class CourseUnit extends BaseModel
{
    use InteractsWithIntakes,HasNotes;

    /**
     * Gets all.
     *
     * @return Collection all
     */
    public static function cacheAll()
    {
        return static::oldest('name')->get(['name', 'semester_id', 'id', 'code'])->keyBy('code');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = title_case($name);
    }

    public function setCodeAttribute($code)
    {
        $this->attributes['code'] = strtoupper($code);
    }

    public function generatePdf()
    {
        return (new CourseUnitPdfGenerator($this))->generate();
    }

    public function timeTable()
    {
    }
}
