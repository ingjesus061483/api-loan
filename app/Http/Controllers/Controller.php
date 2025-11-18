<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
   function convert_to_number($str)
   {
       $cur= str_replace('$','',$str) ;
       $ammount=str_replace(',','', str_replace('.00','',$cur));
       return $ammount;
   }
  
}
