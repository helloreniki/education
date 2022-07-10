<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;

class UserEducationController extends Controller
{
    public function index()
    {
        // show all from education_user pivot table, that approved = null or 0 (can change mind disapprove ->later approve)
        // vsi educationi, ki imajo userja, upcoming and (approved 0 or approved null)
        $educations_to_approve = Education::query( )
            ->where('date', '>', now())
            ->withWhereHas('users', fn($q) =>
                $q  ->where('approved', 0)
                    ->orWhere('approved', null)
            )
            ->get();

        // dd($educations_to_approve);

        return view('employee-education.index', [
            'educationsToApprove' => $educations_to_approve,
        ]);
    }

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
