<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimetableLectureRequest;
use App\TimeTable;
use App\TimetableLecture;

class TimeTableController extends Controller
{
    public function index()
    {
        $intake = TimeTable::intakesWithLectures()->getAll();

        return view('timetable.index', compact('intake'));
    }

    public function store(TimetableLectureRequest $request)
    {
        TimetableLecture::process($request->validated());

        return TimetableLecture::getAll();
    }

    public function destroy($id)
    {
        TimetableLecture::findOrFail($id)->delete();

        return TimetableLecture::getAll();
    }
}
