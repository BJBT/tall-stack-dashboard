<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();

        return view('survey', compact('surveys'));
    }
}
