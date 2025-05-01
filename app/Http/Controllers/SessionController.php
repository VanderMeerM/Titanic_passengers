<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    public function create() {
       return view('auth.login');
    }

    public function store(Request $request) {

    //    dd('test');

        $credentials = $request->validate([
            'email' => ['required', 'email'], 
            'password' => ['required']
        ]);

        
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $pass_id = $request->input('pass_id');

            return redirect()->route('all.index');
        }

    }

public function destroy() {

    Auth::logout();

    return back();
 }
}
