<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;  
    public function getImage($request,$nombre){
        $nombreimagen=null;
        if($request->hasFile('file'))     
        {
            $imagen=$request->file('file');
            $nombreimagen=Str::slug($nombre).".".$imagen->guessExtension();
            if (!file_exists('img'))
            {
                 mkdir("img");
            } 
            $ruta=public_path("img/");
            if(file_exists($ruta.$nombreimagen))
            {
                unlink($ruta.$nombreimagen);
            }            
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
        }
        return $nombreimagen;
    }  
    function convert_to_number($str)
    {
       $cur= str_replace('$','',$str) ;
       $ammount=str_replace(',','', str_replace('.00','',$cur));
       return $ammount;
    }
  
}
