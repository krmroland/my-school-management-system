<?php

namespace App\Http\Controllers;

use App\Cycle;
use App\GeneratorOperationSummary;
use Illuminate\Http\Request;

class ActiveCyclesController extends Controller
{
    public function index(Request $request)
    {
        return GeneratorOperationSummary::filterRequest($request);
    }

    public function store(Request $request)
    {
        Cycle::activate($request->validate([
            'cycle_id' => 'required|numeric',
        ])['cycle_id']);
    }
}
