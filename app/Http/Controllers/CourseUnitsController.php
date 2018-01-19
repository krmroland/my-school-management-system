<?php

namespace App\Http\Controllers;

use App\CourseUnit;
use App\Http\Requests\CourseUnitRequest;
use Illuminate\Http\Request;

class CourseUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseUnits = CourseUnit::getAll();

        return view('courseUnits.index', compact('courseUnits'));

        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CourseUnitRequest $request)
    {
        CourseUnit::create($request->validated());

        return CourseUnit::getAll();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\CourseUnit $courseUnit
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CourseUnit $courseUnit)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\CourseUnit $courseUnit
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseUnit $courseUnit)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\CourseUnit          $courseUnit
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseUnit $courseUnit)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\CourseUnit $courseUnit
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseUnit $courseUnit)
    {
    }
}
