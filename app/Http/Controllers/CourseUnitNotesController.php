<?php

namespace App\Http\Controllers;

use App\CourseUnit;
use App\Note;
use Illuminate\Http\Request;

class CourseUnitNotesController extends Controller
{
    public function index(CourseUnit $courseUnit, Request $request)
    {
        return $courseUnit->cachedPaginatedNotes($request->page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CourseUnit $courseUnit)
    {
        return $courseUnit->addNotes(
            $request->validate(['date' => 'required'])
        )->cachedPaginatedNotes();
    }

    public function update(Request $request, $course_unit_id, $notes_id)
    {
        Note::updateById($notes_id, $request->only('contents'));
    }
}
