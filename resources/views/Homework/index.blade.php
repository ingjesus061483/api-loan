@extends('Shared/layout')
@section('title','Listado de tareas')
@section('content')

<div class="card mb-4" style="width: 100% ; margin:0 auto">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de tareas
    </div>
    <div class="card-body">
        <div style="padding: 5px">
            <a  title="Crear tarea" id="btnHomework" class="btn btn-primary" ><i class="fa-solid fa-clipboard-check"></i></a>
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
                    <th style="text-align: center">TAREA</th>
                    <th style="text-align: center">ESTADO</th>
                </tr>
            </thead>
            <tbody style ="font-size: 12px" >
            @foreach ($homeworks as $item)
            <tr>
                <td style="text-align: center">
                    <form method="POST" action="{{url('/homework')}}/{{$item->id}}"  style="display:inline">
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
                <td style="text-align: center;">{{$item->client->identification}}</td>
                <td style="text-align: center;">{{$item->remark}}</td>
                <td style="text-align: center;">
                @switch($item->statehomework->id)
                    @case(1)
                        <span class="badge bg-warning"><i class="fa-solid fa-circle-question"></i></span>

                        @break

                    @case(2)
                        <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i></span>
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
