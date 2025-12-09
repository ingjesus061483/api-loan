@extends('Shared/layout')
@section('title','Listado usuarios')
@section('content')

<div class="card mb-4" style="width: 70% ;margin:0 auto">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Listado de usuarios
    </div>
    <div class="card-body">
        <div style="padding: 5px">
            <a title="Crear usuarios" class="btn btn-primary"id="btnUser" >
                <i class="fa-solid fa-user-tie"></i>
            </a>
        </div>

        <table  class="table table-hover table-bordered" style="width:100%">
            <thead style ="font-size: 14px" >
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>        
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection