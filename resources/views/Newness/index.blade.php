@extends('Shared/layout')
@section('title','Listado de novedades')
@section('content')

<div class="card mb-4" style="width: 100% ; margin:0 auto">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de novedades
    </div>
    <div class="card-body">
        <div style="padding: 5px">
            <a  title="Crear Novedad" id="btnNewness" class="btn btn-primary" ><i class="fa-solid fa-newspaper"></i></a>
        </div>
        <table  class="table table-hover table-bordered" style="width: 100%" >
            <thead style ="font-size: 14px" >
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th style="text-align: center">N°</th>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">FECHA</th>
                    <th style="text-align: center" >CLIENTE	</th>
                    <th style="text-align: center">TIPO DE NOVEDAD	</th>
                    <th style="text-align: center">NOVEDAD</th>
                    <th style="text-align: center">ESTADO</th>
                </tr>
            </thead>
            <tbody style ="font-size: 12px" >
            @foreach ($newnesses as $item)
            <tr>
                <td style="text-align: center">
                    <form method="POST" action="{{url('/eps')}}/{{$item->id}}"  style="display:inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="button" title="Eliminar" class="btn btn-danger btn-sm" onclick="validar(this,'¿Desea eliminar el registro?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td >
                <td style="text-align: center;">
                    <a title="Editar" onclick="editarEps({{$item->id}})" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
                <td style="text-align: center;">{{$item->id}}</td>
                <td style="text-align: center;"> {{$item->user->name}}</td>
                <td style="text-align: center;">{{date("d/m/Y", strtotime($item->date))}}</td>
                <td style="text-align: center;">{{$item->client->identification.' '.$item->client->name_last_name }}</td>
                <td style="text-align: center;">{{$item->newness_type->name}}</td>
                <td style="text-align: center;">{{$item->remark}}</td>
                <td style="text-align: center;">
                    @switch($item->state_newness->id)
                    @case(1)
                        <span title="{{$item->state_newness->name}}" class="badge bg-warning"><i class="fa-solid fa-circle-question"></i></span>

                        @break

                    @case(2)
                        <span title="{{$item->state_newness->name}}" class="badge bg-success"><i class="fa-solid fa-circle-check"></i></span>
                        @break
                    @endswitch
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
