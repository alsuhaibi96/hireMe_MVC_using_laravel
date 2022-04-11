<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // a method that logs the uer out
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }
}
