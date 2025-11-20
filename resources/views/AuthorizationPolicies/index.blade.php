@extends('shared/layout')
@section('title','Listado de Listado de politicas y autorizaciones')
@section('content')  

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de politicas y autorizaciones
    </div>
    <div class="card-body">
        <div style="padding: 5px">            
            <a  title="Crear politica o autorizacion" class="btnPolicy btn btn-primary" ><i class="fa-solid fa-circle-plus"></i></a>        
        </div>  

        <table  class="table table-hover table-bordered" style="width: 100%" >
            <thead >
                <tr>                    
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>     
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>     
                    <th style="text-align:center">TITULO</th>
                    <th style="text-align:center">DESCRIPCION</th>              
                </tr>
            </thead>
            <tbody>
                @foreach ($AuthorizationPolicies as $item)        
                <tr>
                    <td>
                        <form method="POST" action="{{url('/authorizationPolicies')}}/{{$item->id}}"  style="display:inline">
                            @csrf
                            {{method_field('DELETE')}}                            
                            <button type="button" title="Eliminar" class="btn btn-danger btn-sm" onclick="validar(this,'¿Desea eliminar el registro?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    <td><a title="Editar" onclick="editarPolicy({{$item->id}})" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a></td>
                    <td>{{$item->title}}    </td>
                    <td>{{$item->description}}  </td>                    
                </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
</div>
@endsection