<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Alert;

class ProfileController extends Controller {

    public function index() {
        $id = Auth::id();

        $profile = Profile::where('users_id', $id)->first();

        return view('profile.index', compact('profile'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        $request->validate([
            'umur' => 'required',
            'alamat' => 'required',
            'biodata' => 'required',
        ]);

        $profile = Profile::find($id);
        
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->biodata = $request->biodata;

        $profile->save();
        toastr()->success('Berhasil', 'Profile Berhasil di Edit');
        return redirect('/profile');
    }

    public function destroy($id) {
        //
    }
}
