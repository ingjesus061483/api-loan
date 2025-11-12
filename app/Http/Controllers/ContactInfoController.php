<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInfo\StoreRequest;
use App\Models\Client;
use App\Models\ContactInformation;
use App\Models\PhoneType;

class ContactInfoController extends Controller
{
    public function store(StoreRequest $request)
    {
        $client=(session()->has('client')?session('client'):$request->client_id!=0)?Client::find($request->client_id): null;
        if($client==null)
        {
            return redirect()->to(url('/clients/create'))  ->withErrors("la informacion personal no ha sido llena");                       
        }
        $ContactInfo=new ContactInformation();
        $ContactInfo->client_id=$request->client_id;
        $ContactInfo->phone_number=$request->phone;
        $ContactInfo->phone_type_id=$request->phone_type;
        $ContactInfo->save();        
        session(["info"=>"contact"]);
     //   return redirect()->to(url('/clients/create')); 
     return back();
   }
    public function destroy($id)
    {        
        $ContactInfo=ContactInformation::find($id);                                    
        $ContactInfo->delete();    
        session(["info"=>"contact"]);           
     //   return redirect()->to(url('/clients/create'));      
     return back();
    }
    //
}
