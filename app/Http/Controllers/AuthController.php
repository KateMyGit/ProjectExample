<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('main');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nationality' => 'required',
            'gender' => 'required|in:male,female',
            'nameOrganization' => 'required',
            'position' => 'required',
            'birthdayDate' => 'required|date|after:1900-01-01|before:today',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nationality = $request->nationality;
        $user->gender = $request->gender;
        $user->nameOrganization = $request->nameOrganization;
        $user->position = $request->position;
        $user->birthdayDate = $request->birthdayDate;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('main');
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
