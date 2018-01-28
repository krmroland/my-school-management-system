<?php

namespace App;

class Note extends BaseModel
{
    //turn off the timestamps
    public $timestamps = false;

    protected $dates = ['date'];

    /**
     * these notes belong to a course unit.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseUnit()
    {
        return $this->belongsTo(CourseUnit::class);
    }

    public static function updateById($id, $data)
    {
        tap(static::findOrFail($id), function ($note) use ($data) {
            $note->update($data);
            //clear the notes cache
            $note->courseUnit->notesCache()->flush();
        });
    }

    public function hasCache()
    {
        //there is no place where we are fetching the notes
        //they them selves, the course unit is responsible for fetching them
        return false;
    }
}
