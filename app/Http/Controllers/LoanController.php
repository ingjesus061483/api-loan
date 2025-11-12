<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loan\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Loan;
class LoanController extends Controller
{
    public function update(Request $request,$id)
    {
        
    }
    public function store(StoreRequest $request)
    {
        $client=session()->has('client')?session('client'):null;
        if($client==null)
        {
            return redirect()->to(url('/clients/create'))  ->withErrors("la informacion personal no ha sido llena");                       
        }
        $arrloan=[
            'reference'=>date_timestamp_get(date_create()).$client->identification,
            'ammount'=>$request->ammount,
            'term'=>$request->term,
            'client_id'=>$request->client_id,
            'warranty_id'=>$request->warranty
        ];
        $loan=Loan::create($arrloan);
        session(["info"=>"loan"]);
        return redirect()->to(url('/clients/create'))                         
                         ->with(['message'=>'Se ha generado una Solicitud de credito 
                                             con referencia '.$loan->reference.' en 
                                             breve nos pondremos en contacto con usted']);

    }
    //
}
