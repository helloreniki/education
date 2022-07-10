<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;

class UserEducationController extends Controller
{
    public function create(User $user, Education $education)
    {
        return view('employee-education.create', [
            'user' => $user,
            'education' => $education,
        ]);
    }

    public function store(User $user, Education $education)
    {
        $data = request()->validate([
            'education_id' => 'required',
        ]);

        $user->educations()->attach($data);

        return redirect()->route('educations.index')->with('message', 'You were successfully applied for education. You will be informed by email, if your request was approved.');
    }
}
