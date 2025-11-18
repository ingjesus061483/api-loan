<?php

namespace App\Http\Controllers;

use App\Http\Requests\Arl\StoreRequest;
use App\Http\Requests\Arl\UpdateRequest;
use App\Http\Requests\AutorizeRequest;
use Illuminate\Http\Request;
use App\Models\ArlAffiliate;
class ArlController extends Controller
{
    public function show($id)
    {
        return response()->json(ArlAffiliate::find($id));
        //
    }
    public function index(AutorizeRequest $request)
    {
        $data=[
            'arls'=>ArlAffiliate::all()
        ];  
        return view('arl.index',$data);
        //
    }
    public function store(StoreRequest $request)
    {
        $ArlAffiliate=new ArlAffiliate();
        $ArlAffiliate->name=$request->name;
        $ArlAffiliate->description=$request->description;
        $ArlAffiliate->save();                
     return back()->with(['message'=>'ARL afiliada creada correctamente']);
    }
    public function destroy($id)
    {        
        $ArlAffiliate=ArlAffiliate::find($id);                                    
        $ArlAffiliate->delete();                
        return back()->with(['message'=>'ARL afiliada eliminada correctamente']);
    }
    public function update(UpdateRequest $request ,$id)
    {       
        $ArlAffiliate=ArlAffiliate::find($id);
        $arrArl=[
            'name'=>$request->name,
            'description'=>$request->description
        ];
        $ArlAffiliate->update($arrArl);        
        return back()->with(['message'=>'ARL afiliada actualizada correctamente']);
    }
    //
}
