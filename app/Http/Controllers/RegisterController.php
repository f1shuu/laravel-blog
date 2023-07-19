<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:50',
            'username' => 'required|min:3|max:50|unique:users,username',
            'email' => 'required|email|max:50|unique:users,email',
            'avatar' => 'required|image',
            'password' => 'required|min:6|max:50'
        ]);

        $attributes['avatar'] = request()->file('avatar')->store('avatars');

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Successfully registered.');
    }
}
