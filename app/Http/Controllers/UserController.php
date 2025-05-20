<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class UserController extends Controller
{
    public function show() {

        return view('user.show', [
            'user' => User::find(1)
        ]);
              
    }
    public function update()
    {
        $user = User::find(1); 
         
        $user->fill(['password' => Hash::make("oC9em7Wce0")])->save(); 

    }
}