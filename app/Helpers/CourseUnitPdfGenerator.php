<?php

namespace App\Helpers;

use App\CourseUnit;
use PDF;

class CourseUnitPdfGenerator
{
    public function __construct(CourseUnit $courseUnit)
    {
        $this->courseUnit = $courseUnit;
    }

    public function generate()
    {
        //load all the notes to avoid n+1 queries
        $this->courseUnit->load('notes');

        return PDF::loadView(
            'courseUnits.pdf',
            ['courseUnit' => $this->courseUnit]
        )->setPaper('a4')->stream($this->name());
    }

    protected function name()
    {
        return $this->courseUnit->name.'.pdf';
    }
}
