<?php

namespace App\Http\Controllers;

use App\Semester;

class ActivateSemestersController extends Controller
{
    public function store($id)
    {
        return Semester::activateUsingId($id);
    }
}
