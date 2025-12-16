<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizeRequest;
use App\Models\Newness;
use App\Http\Requests\Newness\StoreRequest;
use App\Http\Requests\Newness\UpdateRequest;
use App\Models\Client;
use App\Models\NewnessType;

class NewnessController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(AutorizeRequest $request)
    {
        $data=[
            'newnesses'=>Newness::all(),
            'clients'=>Client::all(),
            'newnesstypes'=>NewnessType::all(),
        ];
        return view ('Newness.index',$data);

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Newness::create([
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'newness_type_id'=>$request->newness_type_id,
            'remark'=>$request->remark,
            'state_newness_id'=>1
        ]);
        return back()->with(['message'=>'Novedad creada correctamente']);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return response()->json(Newness::find($id));    //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newness $newness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $newness=Newness::find($id);
        $arrNewness=[
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'newness_type_id'=>$request->newness_type_id,
            'remark'=>$request->remark,
            'state_newness_id'=>$request->state_newness_id
        ];
        $newness->update($arrNewness);
        return back()->with(['message'=>'Novedad actualizada correctamente']);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $newness=Newness::find($id);
        $newness->delete();
        return back()->with(['message'=>'Novedad eliminada correctamente']);
        //
    }
}
