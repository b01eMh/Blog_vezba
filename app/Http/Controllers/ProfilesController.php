<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(Profile $profile)
    {
        return view('profiles.show')->with('profile', $profile);
    }

    public function edit(Request $request, Profile $profile)
    {
        return view('profiles.edit')->with('profile', $profile);
    }

    public function update(Request $request, Profile $profile)
    {
        $inputs = $request->validate([
            'username' => 'required|min:3',
            'city' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'profile_pic' => 'image'
        ]);
        if ($request->hasFile('profile_pic')) {
            $picture = $request->profile_pic->store('pictures', 'public');
            if ($profile->profile_pic !== null) {
                unlink('storage/' . $profile->profile_pic);
            }
            $pictureArray = ['profile_pic' => $picture];
        }
        auth()->user()->profile->update(array_merge(
            $inputs,
            $pictureArray ?? []
        ));
        return redirect(route('profiles.show', $profile->id))->with('success', 'Profile updated!');
    }
}
