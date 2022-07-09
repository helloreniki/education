<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Profession;
use Illuminate\Support\Str;
use App\Models\WorkPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('work_position')->paginate(15);

        return view('employees.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('employees.create', [
            'work_positions' => WorkPosition::all(),
            'professions' => Profession::all(),
            'departments' => Department::all(),
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:5|max:40',
            'email' => 'required|email|unique:users,email',
            'work_email' => 'required|email|unique:users,work_email',
            'address' => 'required|max:255',
            'phone_number' => 'required|',
            'date_of_employment' => 'required|date|before:today',
            'work_position_id' => 'required',
            'profession_id' => 'required',
            'department_id' => 'required',
        ]);

        $data['password'] = Hash::make(Str::random(32));

        User::create($data);

        return redirect()->route('employees.index')->with('message', 'New employee created successfully!');
    }
}