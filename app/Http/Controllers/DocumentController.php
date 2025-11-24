<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\Document\StoreRequest;
use App\Http\Requests\Document\UpdateRequest;
use App\Models\Client;
use App\Models\DocumentType;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $client= Client::find($request->client);
        $document_type=DocumentType::find($request->document_type);
        $name= $this->getImage($request,$client->identification.'-'.$document_type->name);
         Document::create([
            'client_id'=>$request->client,
            'document_type_id'=>$request->document_type,
            'name'=>$name,
            'description'=>$request->description,
        ]);
       return back()->with(['message'=>'Documento cargado correctamente']);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)    
    {
        $document=Document::find($id);
        return response()->download(public_path('img/'.$document->name));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
