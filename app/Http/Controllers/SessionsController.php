<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Provided credentials could not be verified.'
            ]);
        }
        session()->regenerate();

        return redirect('/')->with('success', 'Successfully logged in.');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Successfully logged out.');
    }
}
