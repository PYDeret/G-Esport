<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class APIAppliController extends Controller
{

	public function __construct()
	{
    }
    
    public function connect(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return Auth::id();
        }
        else{
            return "none";
        }
    }
}
