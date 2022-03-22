<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function calculator()
    {
        return view('calculator');
    }

    public function policy()
    {
        return view('policy');
    }

    public function security()
    {
        return view('security');
    }

    public function terms()
    {
        return view('terms');
    }

    public function confirm()
    {
        return view('auth.confirm');
    }


    
}
