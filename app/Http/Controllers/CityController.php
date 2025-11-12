<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function GetCitiesByState($stateId)
    {
        return response()->json(City::where('state_id',$stateId)->get());
    }
    //
}
