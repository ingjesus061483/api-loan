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
            <a  title="Crear Novedad" href="{{url('/Newness/create')}}" class="btn btn-primary" ><i class="fa-solid fa-newspaper"></i></a>
        </div>
        <table  class="table table-hover table-bordered" style="width: 100%" >
            <thead style ="font-size: 14px" >
                <tr>
                    <th style="text-align: center">N°</th>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">FECHA</th>
                    <th style="text-align: center" >CLIENTE	</th>
                    <th style="text-align: center">TIPO DE NOVEDAD	</th>
                    <th style="text-align: center">NOVEDAD</th>
                    <th style="text-align: center">ESTADO</th>
                     <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>

                </tr>
            </thead>
            <tbody style ="font-size: 12px" >
            @foreach ($newnesses as $item)
            <tr>
                <td style="text-align: center;">{{$item->id}}</td>
                <td style="text-align: center;"> {{$item->user->name}}</td>
                <td style="text-align: center;">{{date("d/m/Y", strtotime($item->date))}}</td>
                <td style="text-align: center;">{{$item->client->identification.' '.$item->client->name_last_name }}</td>
                <td style="text-align: center;">{{$item->newness_type->name}}</td>
                <td style="text-align: center;">{{$item->remark}}</td>
                <td style="text-align: center;">
                    <select class="form-select"  onchange="cambiarEstadoNewness({{$item->id}},this)" aria-label="Default select example" style="font-size:12px;
                        {{$item->state_newness->id==1?'background-color:rgba(172,63,71,0.5);':''}} {{$item->state_newness->id==2?'background-color:rgba(75,181,67,0.5);':''}}
                        text-align:center;color:black;font-weight:bold">
                        @foreach ($state_newnesses as $state)
                        <option value="{{$state->id}}"  {{$item->state_newness->id==$state->id?'selected':''}}
                            @switch($state->id)
                                @case(1)
                                    style="background-color:rgba(172,63,71,0.5);color:black;font-weight:bold"
                                    @break
                                @case(2)
                                    style="background-color:rgba(75,181,67,0.5);color:black;font-weight:bold"
                                    @break
                            @endswitch>{{$state->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td style="text-align: center;">
                    <a title="Editar" href="{{url('/Newness/'.$item->id.'/edit')}}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
