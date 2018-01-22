<?php

namespace App\Http\Controllers;

use App\CourseUnit;

class CourseUnitPdfController extends Controller
{
    public function index(CourseUnit $courseUnit)
    {
        return $courseUnit->generatePdf();
    }
}
