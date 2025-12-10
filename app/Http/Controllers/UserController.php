<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizeRequest;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function show($id)
    {
         return response()->json(User::find($id));
    }
    public function index(AutorizeRequest $request)
    {
        $data=['users'=>User::all()];
        return view('Auth.index',$data);
    }
    public function update (UpdateRequest $request,  $id)
    {
        $user=User::find($id);
        $user->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'phone'=>$request->phone,
            ]);
        return back()->with(['message'=>'Usuario autalizado correctamente']);

    }

    public function store(StoreRequest $request)
    {
          $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
         ]);
        return back()->with(['message'=>'Usuario creado correctamente']);
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete($id);
        return back()->with(['message'=>'Usuario eliminado correctamente']);
    }
    //
}
