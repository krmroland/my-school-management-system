<?php

namespace App\Helpers;

use App\Note;

trait HasNotes
{
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function cachedPaginatedNotes($page = null)
    {
        return  $this->notesCache()
                ->rememberForever($page, function () {
                    return $this->notes()->oldest('date')->simplePaginate(4);
                });
    }

    public function addNotes($data)
    {
        //clear the cache
        $this->notesCache()->flush();

        $this->notes()->create($data);

        return $this;
    }

    public function notesCache()
    {
        return cache()->tags(["courseUnits/$this->id/notes"]);
    }
}
