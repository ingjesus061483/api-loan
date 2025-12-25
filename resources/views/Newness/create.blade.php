@extends('Shared/layout')
@section('title',' Crear novedad')
@section('content')
<div class="card mb-4" style="width: 100% ; margin:0 auto">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Crear Novedad
    </div>
    <div class="card-body">
        <form id="formNewness" method="POST" action="{{url('/newness')}}" >
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="client_id" class="col-form-label">Cliente</label>
                    <input type="text"name="client_id" id="client_id">

                </div>
                <div class="col-md-6">
                    <label for="newness_type_id" class="col-form-label">Tipo de Novedad</label>
                    <input type="text" onFocus="focus(this)" name="newness_type_id" id="newness_type_id">
                </div>
            </div>
            <div class="mb-3">
                <label for="remark" class="col-form-label">Novedad</label>
                <textarea class="form-control" name="remark" id="remark" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar Novedad</button>
            </div>
        </form>
    </div>
@endsection
