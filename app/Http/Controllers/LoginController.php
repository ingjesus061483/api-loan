<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return redirect()->to('/');
        }
        return view('Auth.Login');
    }
    public function store(LoginRequest $request)
    {
        if(Auth::validate(['email'=>$request->email,
        'password'=>$request->password]))
        {
            $user =Auth::getProvider()->retrieveByCredentials([
                'email'=>$request->email,
                'password'=>$request->password]);                
            Auth::login($user);
            return redirect()->to('/');
        }
        return redirect()->to('login/show')->withErrors('Usuario o contraseña inválido');

    }
    public function destroy(int $id)
    {
        Session::flush();
        Auth::logout();           
        return redirect()->to('/');  
    }
    //
}
