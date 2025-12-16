<?php

namespace App\Http\Controllers;

use App\Models\NewnessType;
use App\Http\Requests\NewnessType\StoreRequest;
use App\Http\Requests\NewnessType\UpdateRequest;
use App\Http\Requests\AutorizeRequest;
class NewnessTypeController extends Controller
{
    public function SearchByName(Request $request)
    {
        $newnesstypes=NewnessType::where('name','like','%'.$request->name.'%')->selectRaw("concat(id,'-', name)  as label")-> get();
        return response()->json($newnesstypes);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(AutorizeRequest $request)
    {
        $data=['NewnessTypes'=>NewnessType::all()];
        return view('NewnessType.index',$data);
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        NewnessType::create([
            "name"=>$request->name,
            "description"=>$request->description
        ]);
        return back()->with(['message'=>'Tipo de novedad creada correctamente']);

        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return response()->json(NewnessType::find($id));
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $newnessType=NewnessType::find($id);
        $newnessType->update([
            "name"=>$request->name,
            "description"=>$request->description
        ]);
        return back()->with(['message'=>'Tipo de novedad actualizada correctamente']);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newnessType=NewnessType::find($id);
        $newnessType->delete();
        return back()->with(['message'=>'Tipo de novedad actualizada correctamente']);

        //
    }
}
