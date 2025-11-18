<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loan\StoreRequest;
use App\Http\Requests\Loan\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Loan;
class LoanController extends Controller
{
    public function update(UpdateRequest $request,$id)
    {   
        $loan=Loan::find($id);
        $ammount=$this->convert_to_number($request->ammount);  
        $arrloan=[    
            'ammount'=>$ammount,
            'term'=>$request->term,
            'client_id'=>$request->client_id,
            'warranty_id'=>$request->warranty
        ];
        $loan->update($arrloan);
        session(["info"=>"loan"]);
        return back()->with(['message'=>'Información del prestamo actualizada correctamente']);
    }
    public function store(StoreRequest $request)
    {
        $client=session()->has('client')?session('client'):null;
        $ammount=$this->convert_to_number($request->ammount);// str_replace(',','', str_replace('.00','',$cur));
        //print_r($request->all());
      //$cur= str_replace('$','',$request->ammount) ;
        if($client==null)
        {
            return redirect()->to(url('/clients/create'))  ->withErrors("La información personal no ha sido llena");                       
        }
        $arrloan=[
            'reference'=>date_timestamp_get(date_create()).$client->identification,
            'ammount'=>$ammount,
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
