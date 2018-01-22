<?php

namespace App;

use App\Helpers\CourseUnitPdfGenerator;
use App\Helpers\InteractsWithSemesters;
use App\Helpers\InteractsWithUser;

class CourseUnit extends BaseModel
{
    use InteractsWithSemesters,InteractsWithUser;
    /**
     * the cache keys that should be cleared on model events.
     *
     * @var array
     */
    protected $cacheKeys = ['courseUnits.*'];

    /**
     * Gets all.
     *
     * @return Collection all
     */
    public static function getAll()
    {
        return cache()->rememberForever('courseUnits.*', function () {
            return static::latest('name')
            ->get(['name', 'semester_id', 'id']);
        });
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = title_case($name);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function cachedPaginatedNotes($page = null)
    {
        $key = "courseUnits/$this->id/notes/$page";

        return cache()->remember($key, 15, function () {
            return $this->notes()->oldest('date')->simplePaginate(4);
        });
    }

    public function addNotes($data)
    {
        //clear the cache
        cache()->flush();

        $this->notes()->create($data);

        return $this;
    }

    public function generatePdf()
    {
        return (new CourseUnitPdfGenerator($this))->generate();
    }
}
