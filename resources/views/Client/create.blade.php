@extends('shared/layout')
@section('img',url('img/CerikSoluciones.png'))
@section('title','Formulario de solicitud de credito')
@section('content')

<div>
    <h6>Los campos marcados con * deben ser llenados obligatoriamente </h6>
</div>
<div style="padding: 5px">           
    <div class="row">                
        <div class="col-4">            
            <a id="btnInfoPersonal" style="width:100%" class="{{$info=='client'?'btn btn-info':'btn btn-primary'}}">Información personal</a>        
        </div>        
        <div class="col-4">            
            <a id="btnDatosContacto"style="width:100%" class="{{$info=='contact'?'btn btn-info':'btn btn-primary'}}">Información de contacto</a>        
        </div>        
        <div class="col-4">            
            <a id="btnInfoLaboral"style="width:100%" class="{{$info=='employment'?'btn btn-info':'btn btn-primary'}}">Información laboral</a>        
        </div>
    </div>    
    <div class="row" style="margin-top: 5px">        
        <div class="col-4">            
            <a id="btnInfoPatrimonial"style="width:100%" class="{{$info=='patrimonial'?'btn btn-info':'btn btn-primary'}}">Información patrimonial</a>        
        </div>        
        <div class="col-4">            
            <a id="btnInfoLegal"style="width:100%" class="{{$info=='law'?'btn btn-info':'btn btn-primary'}}">Información Legal </a>        
        </div>        
        <div class="col-4">            
            <a id="btnInfoCredito"style="width:100%" class="{{$info=='loan'?'btn btn-info':'btn btn-primary'}}">Acerca del crédito   </a>
        </div>
    </div>        
</div>
<div class="card mb-4" id="cardInfoPersonal"style="display:none;">    
    <div class="card-header">        
        <i class="fas fa-table me-1"></i>        
        INFORMACION PERSONAL    
    </div>    
    <div class="card-body">        
       
                <form autocomplete="off" action="{{url('/clients')}}{{$client!=null?'/'.$client->id:''}}" method="post">                    
                    @csrf  
                        <input type="hidden" name="id" value="{{$client?->id}}" id="id" >          
                    @if($client!=null)
                        @method('PATCH')
                    @endif
                    @if(auth()->check())                        
                    <div class="row">                
                        <div  class="col-4">                    
                            <div class="mb-3">                        
                                <label class="form-label" for=""> REFERENCIA </label>                       
                                <input type="text" class="form-control"value="{{$client!=null?$client->reference: old('reference')}}"
                                    name="reference" id="reference">                        
                            </div>                
                        </div>                
                        <div  class="col-4">                    
                            <div class="mb-3">                        
                                <label class="form-label" for=""> CALIDAD DEL TITULAR </label>                        
                                <select class="form-select" name="quality_holder" id="quality_holder">                            
                                    <option value="">Seleccione una opcion</option>                            
                                    @foreach($QualityHolder as $item)                            
                                    <option value="{{$item->id}}"{{$item->id==$client?->quality_holder_id?'selected':''}}>{{$item->name}}</option>                                          
                                    @endforeach                        
                                </select>                    
                            </div>                       
                        </div>                
                        <div class="col-4">                    
                            <div class="mb-3">                        
                                <label class="form-label" for="">TITULO VALOR </label>                        
                                <input type="text" class="form-control" name ="value_Title" value="{{$client!=null?$client->value_Title:old('value_Title')}}" id="value_Title"/>                    
                            </div>                
                        </div>            
                    </div>            
                    @endif
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="">NOMBRES Y APELLIDOS* </label>
                                <input type="text" class="form-control" name ="name_last_name" value="{{$client!=null?$client->name_last_name:old('name_last_name')}}" id="name_last_name"/>
                            </div>      
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for=""># DOCUMENTO*</label>
                                <input type="text" name="identification" id="identification" class="form-control" value="{{$client!=null?$client->identification:old('identification')}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3" >
                                <label class="form-label" for="">FECHA DE NACIMIENTO*</label>
                                <div class="row">
                                    <div class="col-8">                                        
                                        <input type="date" name="birth_date" class="form-control" value="{{$client!=null?$client->date_birth:old('birth_date')}}"                                        
                                        id="birth_date">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" readonly class="form-control" id="age" 
                                        value="{{$client!=null? \Carbon\Carbon::parse($client->date_birth)->age:''}}">
                                    </div>
                                </div>
                                
                                                                                                                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3" >
                                <label class="form-label" for="">FECHA DE EXPEDICION*</label>
                                <input type="date" name="expedition_date" class="form-control" value="{{$client!=null?
                                                                                                        $client->expedition_date
                                                                                                        :old('expedition_date')}}" 
                                                                                                        id="expedition_date">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3" >
                                <label class="form-label" for="">DIRECCION RESIDENCIA*</label>
                                <input type="text" class="form-control" value="{{$client!=null?$client->address:old('address')}}" name="address" id="address">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="">BARRIO* </label>
                                <input type="text" name="neighborhood" value="{{$client!=null?$client->neighborhood:old('neighborhood')}}" class="form-control" id="neighborhood">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3" >
                            <label class="form-label" for=""> ESTADO CIVIL*</label>
                            <select name="marital_status" class="form-select" id="marital_status">            
                                    <option value="">Seleccione una opcion</option>
                                    @foreach ($maritalstatus as $item)
                                    <option value="{{$item->id}}"{{$item->id==$client?->marital_status_id?'selected':''}}>{{$item->name}}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for=""> EMAIL*</label>
                                <input type="email" value="{{$client!=null?$client->email:old('email')}}" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3" >
                                <label class="form-label" for=""> NIVEL DE ESTUDIOS*</label>
                                <select name="study_level" class="form-select" id="study_level">            
                                    <option value="">Seleccione una opcion</option>
                                    @foreach($studylevels as $item)
                                    <option value="{{$item->id}}"{{$item->id==$client?->level_study_id?'selected':''}}>{{$item->name}}</option>
                                    @endforeach                             
                                </select>
                            </div>
                        </div>
                    </div>    
                    <button type="submit" id="btnGuardar" class="btn btn-success">{{$client==null?'Guardar':'Actualizar'}}</button>                     
                </form>
       
    </div>
</div>
    <div class="card mb-4" id="cardDatosContacto" style="width:85%;margin:0 auto; display: none;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            INFORMACION DE CONTACTO        
        </div>
        <div class="card-body">
            
                    <a class="btn btn-primary"title="Crear datos de contacto" id="btnContact"><i class="fa-solid fa-square-phone-flip"></i></a>
                    <table class="table">
                        <thead>
                            <tr>   
                                <th>Dato de contacto </th>                                                        
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactInfos as $item)
                            <tr>                                                                     
                                <td>{{$item->phone_type->name.' '.$item->phone_number}}</td>                                            
                                <td>
                                    <form onsubmit="return validar('Desea eliminar este registro?')" action="{{url('/contactinfo')}}/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button title="Eliminar" class="btn btn-danger" type="submit"> 
                                            <i class="fa-solid fa-trash"></i>
                                        </button>                                        
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            
        </div>
    </div>        
    <div class="card mb-4" id="cardInfoLaboral" style="display:none">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            INFORMACION LABORAL
        </div>
        <div class="card-body">
            <a class= "btnEps btn btn-primary" id="btnEps"> Crear EPS</a>
            <a class=" btnArl btn btn-primary" id="btnArl">Crear ARL</a>            
            <form autocomplete="off" action="{{url('/employmentInformations')}}{{$EmploymentInformation!=null?'/'.$EmploymentInformation->id:''}} "method="post">
                        @csrf
                        @if($EmploymentInformation!=null)
                            @method('PATCH')
                        @endif
                        <input type="hidden" name="client_id" value="{{$client!=null? $client->id:''}}" id="client_id" >
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        EMPRESA DONDE LABORA*
                                    </label>
                                    <input type="text"value="{{$EmploymentInformation!=null?$EmploymentInformation->company_works:old('company_works')}}" class="form-control" name="company_works" id="company_works">
                                </div>
                            </div>
                            <div class="col-4">            
                                <div class="mb-3">            
                                    <label class="form-label" for="">
                                        NIT #*
                                    </label> 
                                    <input type="text" class="form-control" value="{{$EmploymentInformation!=null?$EmploymentInformation->nit_company_work:old('nit_company_works')}}" name="nit_company_works" id="nit_company_works">   
                                </div>        
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        DIRECCION OFICINA PRINCIPAL*
                                    </label>
                                    <input type="text" name="main_address" class="form-control" value="{{$EmploymentInformation!=null?$EmploymentInformation->main_address:old('main_address')}}" id="main_address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        DEPARTAMENTO*
                                    </label>
                                    <select class="form-select" name="state" id="state">
                                        <option value="">Escoge un departamento </option>
                                        @foreach ($States as $item)
                                        <option value="{{$item->id}}"{{$item->id==$EmploymentInformation?->state_id?'selected':''}}>{{$item->name}} </option>    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        CIUDAD*
                                    </label>
                                    <select class="form-select" name="city" id="city">
                                        <option value="">Escoge una ciudad  </option>
                                        @foreach ($cities as $item)
                                        <option value ="{{$item->id}}"{{$item->id==$EmploymentInformation?->city_id?'selected':''}} >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        EMPRESA EN MISION
                                    </label>
                                    <input type="text" name="company_on_mission" class="form-control" value="{{$EmploymentInformation!=null?$EmploymentInformation->company_on_mission:old('company_on_mission')}}" id="company_on_mission">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        NIT EMPRESA EN MISION
                                    </label>
                                    <input class="form-control" type="text" name="nit_company_on_mission" value="{{$EmploymentInformation!=null?$EmploymentInformation->nit:old('nit_company_on_mission')}}" id="nit_company_on_mission">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        DIRECCION SEDE                     
                                    </label>
                                    <input class="form-control" type="text" name="address_company_on_mission" value="{{$EmploymentInformation!=null?$EmploymentInformation->branch_address:old('address_company_on_mission')}}" id="address_company_on_mission">
                                </div>      
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        FECHA DE INGRESO*
                                    </label>
                                    <input type="date" name="entry_date" class="form-control" value="{{$EmploymentInformation!=null?$EmploymentInformation->entry_date:old('entry_date')}}" id="entry_date">        
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">SALARIO MENSUAL PROMEDIO*</label>
                                    <input type="text" class="currency form-control" name="average_monthly_salary" value="${{$EmploymentInformation!=null?number_format($EmploymentInformation->average_monthly_salary):old('average_monthly_salary')}}" id="average_monthly_salary">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        CARGO ACTUAL*        
                                    </label>
                                    <input type="text" class="form-control" name="current_position" value="{{$EmploymentInformation!=null?$EmploymentInformation->current_position:old('current_position')}}" id="current_position">        
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">FRECUENCIA DE PAGOS*</label>
                                    <select class="form-select" name="payment_frequency" id="payment_frequency">
                                        <option value="">Seleccione una frecuencia de pago</option>
                                        @foreach($PaymentFrecuencies as $item)
                                        <option value="{{$item->id}}" {{$item->id==$EmploymentInformation?->payment_frequency_id?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        FECHA DE PAGO EMPRESA (FPE)*
                                    </label>
                                    <select class="form-select" name="company_payment_date" id="company_payment_date">
                                        <option value="">Seleccione una fecha de pago</option>
                                        @foreach($CompanyPaymentDates as $item)
                                        <option value="{{$item->id}}"{{$item->id==$EmploymentInformation?->company_payment_date_id?'selected':''}}>{{$item->name}} </option>
                                        @endforeach            
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">            
                                    <label class="form-label" for="">
                                        FECHA DE PAGO CLIENTE (FPC)*
                                    </label>
                                    <select class="form-select" name="custemer_payment_date" id="customer_payment_date">
                                        <option value="">Seleccione una fecha de pago</option>
                                        @foreach($CustomerPaymentDates as $item)
                                        <option value="{{$item->id}}"{{$item->id==$EmploymentInformation?->customer_payment_date_id?'selected':''}} >{{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">TIPO DE CONTRATO*</label>
                                    <select class="form-select" name="contract_type" id="contract_type">
                                        <option value="">Seleccione un tipo de contrato </option>
                                        @foreach($ContractTypes as $item)
                                        <option value="{{$item->id}}"{{$item->id==$EmploymentInformation?->contract_type_id?'selected':''}}>{{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">EPS AFILIADA*</label>
                                    <select class="form-select" name="eps_affiliate" id="eps_affiliate">
                                        <option value="">Seleccione una EPS </option>
                                        @foreach($EpsAffiliates as $item)
                                        <option value="{{$item->id}}"{{$item->id==$EmploymentInformation?->eps_affiliate_id?'selected':''}} >{{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">ARL AFILIADA</label>
                                    <select class="form-select" name="arl_affiliate" id="arl_affiliate">
                                        <option value="">Seleccione una ARL </option>
                                        @foreach($ArlAffiliates as $item)
                                        <option value="{{$item->id}}" {{$item->id==$EmploymentInformation?->arl_affiliate_id?'selected':''}}>{{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </div>   
                            </div>
                        </div>
                        <button type="submit" id="btnGuardar" class="btn btn-success">{{$EmploymentInformation==null?'Guardar':'Actualizar'}}</button>
            </form>
            
        </div>
    </div>
    <div class="card mb-4" id="cardInfoCrediticia" style="display:none">        
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            ACERCA EL CREDITO
        </div>
        <div class="card-body">
            
                    <form autocomplete="off" action="{{url('/loans')}}{{$loan!=null?'/'.$loan->id:''}}"method="post">
                        @if($loan!=null)
                            @method('PATCH')
                        @endif
                        @csrf
                        <input type="hidden" name="client_id"  value="{{$client!=null? $client->id:''}}" id="client_id" >
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        CREDITO SOLICITADO (COP)*
                                    </label>
                                    <input class="currency form-control" type="text" name="ammount" value="${{$loan!=null?number_format($loan->ammount):old('ammount')}}" id="ammount">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        PLAZO SOLICITADO (Meses)*
                                    </label>
                                    <input class="form-control" type="number" name="term" value="{{$loan!=null?$loan->term:old('term')}}" id="term">
                                </div>  
                            </div>
                            <div class="col-4">
                                <div class="mb-3" >            
                                    <label class="form-label" for="">
                                        TIPO DE GARANTIA*
                                    </label>    
                                    <select class="form-select" name="warranty" id="warranty">
                                        <option value="">Seleccione una garantia</option>
                                        @foreach($Warranties as $item)
                                        <option value="{{$item->id}}"{{$item->id==$loan?->warranty_id?'selected':''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <button type="submit" id="btnGuardar" class="btn btn-success">{{$loan==null?'Guardar':'Actualizar'}}</button>
                    </form>
            
        </div>
    </div>
    <div class="card mb-4" id="cardInfoPatrimonial" style="width:70%;margin:0 auto;display: none;">        
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            INFORMACION PATRIMONIAL
        </div>
        <div class="card-body">
            
                    <form autocomplete="off" action="{{url('/clients/UpdatePatrimonialInformation')}}/{{$client!=null?$client->id:0}}"method="post">
                        @csrf
                        @method('PATCH') 
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">                        
                                <input type="checkbox" {{$client?->vehicle==1?'checked':'' }} name="vehicle" id="vehicle">                        
                                POSEE VEHICULO 
                            </label>
                        </div>               
                        <div class="form-check form-check-inline" >
                            <label class="form-check-label" for="">                        
                                <input type="checkbox" name="estate" {{$client?->estate==1?'checked':'' }} id="estate">
                                POSEE PROPIEDADES
                            </label>
                        </div>
                        <div>
                            <button type="submit" id="btnGuardar" class="btn btn-success">Actualizar</button>
                        </div>
                    </form>
            
        </div>
    </div>
    <div class="card mb-4" id="cardInfoLegal" style="width:85%;margin:0 auto;display: none;">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            INFORMACION LEGAL
        </div>
        <div class="card-body">            
            <form autocomplete="off" action="{{url('/clients/UpdateLawInformation')}}/{{$client!=null?$client->id:0}}"method="post">
                        @csrf
                        @method('PATCH')   
                        <div class="row">
                            <div class="col-5">
                                <div class="form-check form-check-inline" >
                                    <label class="form-check-label" for="">
                                        <input type="checkbox"  name="seizure" {{$client?->seizure==1?'checked':'' }} id="seizure">         
                                        TIENE EMBARGOS                                            
                                    </label>                    
                                </div>
                            </div>               
                            <div class="col-7" id="divCompanySeizure" style="display: none">
                                <div class="mb-3">
                                    <label class="form-label" for="">
                                        EMPRESA QUE LO EMBARGA                    
                                    </label>
                                    <input type="text" class="form-control" value="{{$client?->company_seizure}}" name="company_seizure"  id="company_seizure">     
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="btnGuardar" class="btn btn-success">Actualizar</button>                
                        </div>
                    </form>
            
        </div>
    </div>

@endsection