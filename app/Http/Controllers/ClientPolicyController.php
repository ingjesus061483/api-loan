<?php

namespace App\Http\Controllers;
use App\Http\Requests\ClientPolicy\StoreRequest;
use Illuminate\Http\Request;

class ClientPolicyController extends Controller
{
    public function store(StoreRequest $request)
    {
        clientpolicy::create([
            'client_id' => $request->client_id,
            'policy_id' => $request->policy_id,
            'acept' => 1,
        ]);
        return back()->with(['message' => 'Política aceptada correctamente']);
        //
    }


    //
}
