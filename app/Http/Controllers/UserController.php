<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizeRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(AutorizeRequest $request)
    {        
        $data=['users'=>User::all()];
        return view('Auth.index',$data);
    }
    public function store(){

    }
    //
}
