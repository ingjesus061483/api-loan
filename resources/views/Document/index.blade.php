@extends('shared/layout')
@section('img',url('img/CerikSoluciones.png'))
@section('title','Listado de documentos')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de documentos
    </div>
    <div class="card-body">
        <div style="padding: 5px">
            <a  title="Crear documento" id="btnDocument" class="btn btn-primary" ><i class="fa-solid fa-file-arrow-up"></i></a>
        </div>
        <div class="row">
        @foreach($documents as $item)
        <div class="col-4">
            <div class="card shadow mb-4">                
                <div class="card-header py-3">                    
                    <h6 class="m-0 font-weight-bold text-primary" style="text-align:center;">{{$item->document_type->name }}</h6>
                </div>   
                <div class="card-body" style="align-content: center">
                    <img class="img-fluid" src="{{url('img')}}/{{$item->name}}" width="100px" height="100px" alt="{{$item->description}}">
                </div>
                <div class="card-footer" style="text-align:center;">
                    <div  class="small text-gray-500">                        
                        {{date("d/m/Y", strtotime($item->created_at))}}                    
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" action="{{url('/Document')}}/{{$item->id}}"  style="display:inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="button" title="Eliminar" class="btn btn-danger btn-sm" onclick="validar(this,'¿Desea eliminar el registro?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                        <div class="col-6">
                            <a title="Editar" onclick="editarDocument({{$item->id}})" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
        @endforeach
        </div>

     
    </div>
@endsection