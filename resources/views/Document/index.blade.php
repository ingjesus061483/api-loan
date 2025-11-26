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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('documents/download/'.$item->id) }}" title="Descargar documento" class="btn btn-success"><i class="fa-solid fa-download"></i></a>
                        <form action="{{ url('documents/'.$item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" title="Eliminar documento" class="btn btn-danger" onclick="validar(this,'Eliminar documento?')"><i class="fa-solid fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>




    </div>
@endsection
