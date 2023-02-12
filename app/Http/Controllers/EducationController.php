<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Organiser;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('educations.index', [
            'educations' => Education::with('organiser')->latest('date')
                    ->filter(request(['search', 'upcoming', 'past', 'organiser']))
                    ->paginate(15)
                    ->withQueryString(),
            'organisers' => Organiser::all(),
        ]);
    }

    public function create()
    {
        return view('educations.create', [
            'organisers' => Organiser::all(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|min:3|max:30',
            'organiser_id' => 'required',
            'date' => 'required|date',
            'city' => 'max:30',
            'price' => 'required|numeric',
            'credits' => 'required|numeric',
        ]);

        Education::create($data);

        return redirect()->route('educations.index')->with('message', 'New Education was added successfully!');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return back()->with('success', 'Education was deleted successfully!');
    }
}
