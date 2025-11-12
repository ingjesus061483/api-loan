<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if(session()->has('client'))
        {            
            session()->forget('client');
        }
        if (session()->has('info'))
        {
            session()->forget('info');
        }
        return view('Home.welcome');
    }
    //
}
