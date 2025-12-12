<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizeRequest;
use App\Models\Homework;
use App\Http\Requests\Homework\StoreRequest;
use App\Http\Requests\Homework\UpdateRequest;
use App\Models\Client;
class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AutorizeRequest $request)
    {
        $data=[
            'homeworks'=>Homework::all(),
            'clients'=>Client::all(),
        ];
        return view ('Homework.index',$data);
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
        Homework::create([
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'remark'=>$request->description,
            'status_homework_id'=>1
        ]);
        return back()->with(['message'=>'Tarea creada correctamente']);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return response()->json(Homework::find($id));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        $homework=Homework::find($id);
        $homework->update([
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'client_id'=>$request->client_id,
            'remark'=>$request->description,
            'status_homework_id'=>$request->status_homework_id
        ]);
        return back()->with(['message'=>'Tarea actualizada correctamente']);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $homework=Homework::find($id);
        $homework->delete();
        return back()->with(['message'=>'Tarea eliminada correctamente']);


        //
    }
}
