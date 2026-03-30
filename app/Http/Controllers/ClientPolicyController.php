<?php

namespace App\Http\Controllers;
use App\Http\Requests\ClientPolicy\StoreRequest;
use App\Models\ClientPolicy;
use Illuminate\Http\Request;

class ClientPolicyController extends Controller
{
    public function store(StoreRequest $request)
    {
        $Clientpolicy=Clientpolicy::create([
            'client_id' => $request->client_id,
            'policy_id' => $request->policy_id,
            'state_policy_id' =>$request->state_policy_id,
        ]);
        $policy=$Clientpolicy->policy()->where('title','like','p%')->first();
        $autorization=$Clientpolicy->policy()->where('title','like','a%')->first();
        $parr=$policy!=null?'política '.$policy->title:($autorization!=null?'autorización '.$autorization->title:'');
        session(["info"=>"AuthorizeProtocol"]);
        switch($Clientpolicy->state_policy_id)
        {
            case 1:{
                return back()->with(["message"=>"La $parr ha sido aceptada "]);
                break;
            }
            case 2:{
                return back()->with(["message"=>"La $parr ha sido rechazada "]);
                break;
            }
            case 3:{
                return back()->with(["message"=>"En caso de no aceptar ni rechazar la $parr, comuniquese con el administrador para más información "]);
                break;
            }
        }

        //
    }


    //
}
