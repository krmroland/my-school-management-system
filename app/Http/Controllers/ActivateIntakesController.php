<?php

namespace App\Http\Controllers;

use App\Intake;

class ActivateIntakesController extends Controller
{
    public function store($id)
    {
        return Intake::activateUsingId($id);
    }
}
