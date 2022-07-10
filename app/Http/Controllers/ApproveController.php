<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function store(User $user, Education $education)
    {
        // set approved column on pivot table to 1 // not attach, not sync
        $user->educations()->updateExistingPivot($education->id, ['approved' => 1]);

        return redirect()->back()->with('message', "You approved this application for education!");

    }

    public function destroy(User $user, Education $education)
    {
        // delete the pair on pivot table, not just set approve = 0
        $user->educations()->detach($education->id);

        return redirect()->back()->with('message', "You DIDN'T approve this application for education!");
    }
}
