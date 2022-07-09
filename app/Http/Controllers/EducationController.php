<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('educations.index', [
            'educations' => Education::with('organiser')->latest('date')->paginate(15),
        ]);
    }
}
