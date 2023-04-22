<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MainController extends Controller
{
    public function getIndex()
    {
        if (Auth::check()) {
            $users = DB::table('users')->get();
            return view('main', ['users' => $users]);
        } else {
            return view('auth.login');
        }
    }
}
