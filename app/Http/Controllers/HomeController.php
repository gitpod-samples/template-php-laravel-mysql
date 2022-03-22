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
        return view('calculator');
    }

    public function security()
    {
        return view('calculator');
    }

    public function terms()
    {
        return view('calculator');
    }

    public function confirm()
    {
        return view('auth.confirm');
    }


    
}
