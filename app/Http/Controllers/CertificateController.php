<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function store(User $user, Education $education)
    {
        // authorization basic
        // if(auth()->user()->id !== $user->id && auth()->user()->id !== $education->user_id){ abort(403); }

        // authorization with Gate
        // $this->authorize('see_my_own', [$user, $education]);

        // authorization with Gate on routes

        $data = request()->validate([
            'certificate' => 'required|file|mimes:pdf,jpeg,jpg,png|max:2000'
        ]);

        // if(request()->hasFile('certificate')) {}
        if(request('certificate')) {
            $file = request('certificate');
            $filename = $file->getClientOriginalName(); // ^ "stil-u2Lp8tXIcjw-unsplash (1).jpg" (name + extension)
            $file = $file->storeAs('certificates/' . $user->id, $filename); // "cerificates/{{ $user->id }}/stil-u2Lp8tXIcjw-unsplash (1).jpg"

            // 1st delete certificate (file from storage?) added before?
            $user->educations()->updateExistingPivot($education->id, ['certificate' => $filename]);

            return back()->with('message', 'File saved successfully.');
        }
    }

    public function download(User $user, Education $education)
    {
        // authorization basic (no Gate)
        // if(auth()->user()->id === $user->id && auth()->user()->id !== $education->user_id){ abort(403); }

        // authorization with Gate
        // $this->authorize('see_my_own', [$user, $education]);

        // authorization with Gate on routes

        // dd($education);
        $education = $user->educations()->where('education_id', $education->id)->first(); // not get()
        // dd($education->pivot->certificate);
        return Storage::download('certificates/' . $user->id . '/' . $education->pivot->certificate);

    }
}
