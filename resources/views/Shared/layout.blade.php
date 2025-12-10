<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url('/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.4/datatables.min.css" rel="stylesheet" integrity="sha384-R5Azes02wvL9ervyq6xo5WLyg1ufX0qwun0F/0qos0E0wNjnnRTADTQpjpnNLakj" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/img/Cerik.ico')}}" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css">
        <link href="{{url('/jquery-ui-1.12.1.custom/jquery-ui.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <input type="hidden" id="base_url" value="{{url('/')}}/">
        <input type="hidden" id="info" value="{{isset($info)?$info:''}}">
        <input type="hidden" id="client" value="{{isset($client)?$client->id:''}}">
        <input type="hidden" id="user" value="{{auth()->check()? auth()->user()->id :''}}">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('/')}}">Magestad</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
        <!--    @if(!isset($client))
            <form action="{{url('/clients/0')}}" method="GET" autocapitalize="off" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input name="identification" class="form-control" type="text" placeholder="Digite su CC" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit "><i class="fas fa-search"></i></button>
                </div>
            </form>
            @else
            <a href="{{url('/clients')}}/{{$client->id}}" class="btn btn-primary ms-auto me-0 me-md-3 my-2 my-md-0">
                <i class="fa-solid fa-user-tie"></i>&nbsp;{{$client->name_last_name}}</a>
            @endif-->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                @if (auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form class="d-none d-md-inline-block form-inline" action="{{url('/login')}}/{{auth()->user()->id }}"
                             method="post">
                            @csrf
                            @method('delete')
                            <button title="Cerrar sesion" type="button" onclick="validar(this,'Desea cerrar la sesion?')" class="btn">
                              Cerrar sesion  <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>

                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user-check"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('login/show')}}">Login</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    </ul>
                </li>
                @endif


            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @if(auth()->check())
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/NewnessType')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tipos de novedades
                
                            </a>
                            <a class="nav-link" href="{{url('/authorizationPolicies')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Politicas y autorizaciones
                            </a>
                            <a class="nav-link" href="{{url('/arls')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ARL
                            </a>
                            <a class="nav-link" href="{{url('/eps')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                EPS
                            </a>
                            <a class="nav-link" href="{{url('/DocumentType')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                                Tipo de documentos
                            </a>
                            <a class="nav-link" href="{{url('/clients')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dots"></i></div>
                                Clientes
                            </a>
                            <a class="nav-link" href="{{url('/users')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dots"></i></div>
                                Usuarios
                            </a>
                            @else

                            <div class="sb-sidenav-menu-heading">Formatos</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Crediticios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('/clients/create')}}">Solicitud de credito</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        @if(auth()->check())
                        <div class="small">
                            Logged in as:&nbsp;{{auth()->user()->name}}
                        </div>
                        @endif
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @if(session('message'))
                            <div  id="message" style="display: none" class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        @if($errors->any())
                            <div  id="errors" style="display: none" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="list-style: none">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-10">
                                <h1 class="mt-4">@yield('title')</h1>
                            </div>
                            <div class="col-2">
                                <img src="{{url('img/CerikSoluciones.png')}}"width="100px"height="100px;" alt="">
                            </div>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                       @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Magestad {{date('Y')}}</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div title="Usuarios" id="dialogUser">
            <form action="{{url('/users')}}" method="POST"autocommplete="off" id="frmUser">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Nombre*</label>
                    <input type="text" name="name" class="form-control" style="width:80%;font-size:12px" id="name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Contraseña*</label>
                    <input type="password" name="password" class="form-control" style="width:80%;font-size:12px" id="password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password-confirmation">
                        Confirmar Contraseña
                    </label>
                    <input type="password" name="password_confirmation" style="width:80%;font-size:12px" id="password_confirmation" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Telefono*</label>
                    <input type="text" name="phone" class="form-control" style="width:80%;font-size:12px" id="phone">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Email*</label>
                    <input type="email" name="email" class="form-control" style="width:80%;font-size:12px" id="email">
                </div>



            </form>

        </div>
        <div title="Tipo de documento" id="dialogDocumentType">
            <form id ="frmDocumentType" action="{{url('/DocumentType')}}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Nombre*</label>
                    <input type="text" name="name" class="form-control" style="width:80%;font-size:12px" id="name">
                </div>
                @if (auth()->check())
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size: 14px"> Descripcion</label>
                    <textarea name="description" id="description" style="font-size: 12px" class="form-control" cols="30" rows="10"></textarea>
                </div>
                @endif
            </form>
        </div>
        <div title="Ver documentos" id="dialogViewDocuments">
            <div style="width:60%; margin:0 auto">
                <table class="table table-hover table-bordered" id="tblDocuments" style="width:100%">
                    <thead style ="font-size: 14px">
                        <tr>
                            <th>#</th>
                            <th>DOCUMENTO</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody style ="font-size: 12px">
                    </tbody>
                </table>
            </div>

        </div>
        <div title="Adjuntar documentos" id ="dialogAttach">
            <form id="frmAttach" autocomplete="off" enctype="multipart/form-data" method="POST" action=" {{url('/documents')}}">
                @csrf
                <input type="hidden"  value="{{isset($client)? $client->id:''}}" name="client" id="client" >
                <input type="hidden" name="document_type" id="document_type">

                <div class="mb-3">
                    <input type="file"accept="image/*"  name="file"  class="form-control form-control-sm"  id="file">
                </div>
            </form>
        </div>
        <div title="Autorizaciones y politicas" id="dialogPolicy">
            <form id ="frmPolicy" action="{{url('/authorizationPolicies')}}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Titulo*</label>
                    <input type="text" name="title" class="form-control" style="width:80%:font-size:12px" id="title">
                </div>
                <div class="mb-3">
                    <label class="form-label" for=""> Contenido*</label>
                    <textarea name="description" id="description" class="form-control" style="font-size: 12px" cols="30" rows="10"></textarea>
                </div>

            </form>
        </div>
        <div title="EPS" id="dialogEps">
            <form id ="frmEps" action="{{url('/eps')}}" method="POST" autocomplete="off">
                @csrf
                <p style="color: red;font-size:12">Si su EPS no se encuentra en el listado, por favor registrela</p>
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Nombre*</label>
                    <input type="text" name="name" class="form-control" style="width:80%;font-size12px " id="name">
                </div>
                @if (auth()->check())
                <div class="mb-3">
                    <label class="form-label" for=""> Descripcion</label>
                    <textarea name="description" id="description" class="form-control" style="font-size:12px;" cols="30" rows="10"></textarea>
                </div>
                @endif
            </form>
        </div>
        <div title="ARL" id="dialogArl">
            <form id ="frmArl" action="{{url('/arls')}}" method="POST" autocomplete="off">
                @csrf
                <p style="color: red;font-size:12px">Si su ARL no se encuentra en el listado, por favor registrela</p>
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Nombre*</label>
                    <input type="text" name="name" class="form-control" style="width:80%;font-size:12px; " id="name">
                </div>
                @if (auth()->check())
                <div class="mb-3">
                    <label class="form-label" for=""> Descripcion</label>
                    <textarea name="description" id="description" style="font-sive:12px" class="form-control" cols="30" rows="10"></textarea>
                </div>
                @endif
            </form>
        </div>
        <div title="Tipos de novedades" id="dialogNewnessType">
            <form id ="frmNewnessType" action="{{url('/NewnessType')}}" method="POST" autocomplete="off">
                @csrf                
                <div class="mb-3">
                    <label class="form-label" for="" style="font-size:14px"> Nombre*</label>
                    <input type="text" name="name" class="form-control" style="width:80%;font-size:12px; " id="name">
                </div>
                @if (auth()->check())
                <div class="mb-3">
                    <label class="form-label" for=""> Descripcion</label>
                    <textarea name="description" id="description" style="font-sive:12px" class="form-control" cols="30" rows="10"></textarea>
                </div>
                @endif
            </form>
        </div>
        <div title="Información de contacto" id="dialogContact">
            <div class="row">
                <div class="col-3">
                    <img width="120px" height="120px" src="{{url('img/CerikSoluciones.png')}}" alt="">
                </div>
                <div class="col-9">
                    <form action="{{url('/contactinfo')}}" autocomplete="off" method="POST" id="frmContact">
                            @csrf
                            <input type="hidden"  value="{{isset($client)? $client->id:''}}" name="client_id" id="client_id" >
                            <div class="mb-3">
                                <label class="form-label" for="" style="font-size: 14px;"> Tipo de contacto</label>
                                <select class="form-select" name="phone_type" style="width:80;font-size:12px " id="phone_type">
                                    <option value="">Seleccione una opcion</option>
                                    @if(isset($phonetypes))
                                    @foreach($phonetypes as $item)
                                    <option value="{{$item->id}}">{{ $item->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="" style="font-size:14px" >
                                    Numero de telefono
                                </label>
                                <input type="tel" name="phone" class="form-control"style="width:80%; font-size:12px;" id="phone">
                            </div>
                        </form>
                </div>
        </div>
        <script src="{{url('/js/jquery.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('/js/scripts.js')}}"></script>
        <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.4/datatables.min.js" integrity="sha384-mtJ3+H/dkUyvhmcXYSyIZyaeG0TnEkh91c1JwFkrkBLHBv8oQ3lFjUp8xfDan41b" crossorigin="anonymous"></script>
        <script src="{{url('/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            var user=$("#user").val();
            var client=$("#client").val();
            var app=$("#info").val();
            var urlBase=$("#base_url").val();
            if( $("#errors").length>0 )
            {
                Swal.fire({
                  title: "Se han encontrado los siguientes errores:",
                  icon: "error",
                  html:$("#errors").html(),
                  draggable: true
                });
            }
            if( $("#message").length>0 )
            {
                Swal.fire({
                  title: "Información",
                  icon: "info",
                  html:$("#message").html(),
                  draggable: true
                });
            }

            if($("#seizure"))
            {
                if($("#seizure").is(':checked'))
                {
                    $("#divCompanySeizure").fadeIn();
                }
            }
            if($("#birth_date"))
            {
                if($("#birth_date").val()!='')
                {
                   let age=CalculateAge($("#birth_date").val());
                    $("#age").val(age +" años");
                }
            }
            function abrirInfopersonal(us ,cli)
            {
                if(us!='')
                    {
                        return true;
                        //$("#cardInfoPersonal").fadeIn();

                    }
                    else if(cli!='')
                    {
                        return false;
                        //$("#cardInfoPersonal").fadeOut();
                    }
                    else
                    {
                        return true;
                        // $("#cardInfoPersonal").fadeIn();

                    }
            }

            switch(app)
            {
                case "client":
                {
                    if(abrirInfopersonal(user ,client))
                    {
                        $("#cardInfoPersonal").fadeIn();
                    }
                    else
                    {
                        $("#cardInfoPersonal").fadeOut();
                    }



                    break;
                }
                case "contact":
                {
                    $("#cardDatosContacto").fadeIn();
                    break;
                }
                case 'law':
                {
                    $("#cardInfoLegal").fadeIn();
                    break;
                }
                case 'patrimonial':
                {
                    $("#cardInfoPatrimonial").fadeIn();
                    break;
                }
                case  'loan':
                {
                    $("#cardInfoCrediticia").fadeIn();
                    break;
                }
                case 'employment':
                {
                    $("#cardInfoLaboral").fadeIn();
                    break;
                }
                case 'AuthorizeProtocol':
                {
                    $("#cardPolAutorizaciones").fadeIn();
                    break;
                }
                case 'PersonData':{
                   $("#cardPoltrataDatosPers").fadeIn()
                }
            }
            if($(".table"))
            {
                $(".table").DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    scrollX: true,
                    "language":
                    {
                        "url": "https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json"
                    },
                 /*   "columnDefs":
                    [{
                        className: "dt-head-center", targets: [ 0 ]
                    }],      */
                });
            }
            function submitPolicy(state)
            {
                $("#frmClientPolicy #state_policy_id").val(state);
                $("#frmClientPolicy").submit();


            }
            function viewDocuments(client,document_type)
            {
                var url=urlBase+"documents";
                var data ={
                    client_id:client,
                    document_type_id:document_type
                };
                $.ajax({
                    url: url,
                    type: "GET",
                    data:data,
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        var documents= result.documents;
                        $("#tblDocuments tbody").empty();
                        $.each(documents, function(index, doc)
                        {
                            i=doc.name.indexOf('.')
                            name=doc.name.substring(0,i)

                            let row= '<tr>'+
                                        "<td style='text-align:center'>"+doc.id+'</td>'+
                                        '<td>'+name+'</td>'+
                                         "<td style='text-align:center'>"+
                                            '<a href="'+urlBase+'documents/download/'+doc.id+'" title="Descargar documento" class="btn btn-success btn-sm"><i class="fa-solid fa-download"></i></a>&nbsp; '+
                                            '<form action="'+urlBase+'documents/'+doc.id+'" method="POST" style="display: inline;">'+
                                                '<input type="hidden" name="_token" value="'+$('meta[name="csrf-token"]').attr('content')+'">'+
                                                '<input type="hidden" name="_method" value="DELETE">'+
                                                '<button type="button" title="Eliminar documento" class="btn btn-danger btn-sm" onclick="validar(this,\'Eliminar documento?\')"><i class="fa-solid fa-trash"></i></button>'+
                                            '</form>'+
                                        '</td>'+
                                    '</tr>';
                            $("#tblDocuments tbody").append(row);
                        });
                        dialogViewDocuments.dialog("open");
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });

            }
            function validar(obj, mensaje)
            {
                console.log(obj.parentElement);
                var frm = obj.parentElement;
                Swal.fire({
                    title: mensaje,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, continuar",
                    cancelButtonText: "Cancelar"
                    }).then((result) =>
                    {
                        if(result.isConfirmed)
                        {
                            frm.submit();
                        }

                    });

            }
            function editarNewnessType(id)
            {
                url=urlBase+"NewnessType/"+id;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        dialogNewnessType.dialog("open");
                        $("#frmNewnessType #name").val(result.name);
                        $("#frmNewnessType #description").val(result.description);
                        $("#frmNewnessType").attr('action',urlBase+"NewnessType/"+id);// "{{url('/arls')}}/"+id);
                        let metodo= '<input type="hidden" name="_method" value="PUT">';
                        $("#frmNewnessType").append(metodo);
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });

            }
            function editarUser(id)
            {
                      url=urlBase+"users/"+id;//"{{url('/DocumentType')}}/"+id;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                       dialogUser. dialog("open");
                        $("#frmUser #name").val(result.name);
                        $("#frmUser #email").val(result.email);
                        $("#frmUser #phone").val(result.phone);
                        $("#frmUser").attr('action',urlBase+"users/"+id);//"{{url('/DocumentType')}}/"+id);
                        let metodo= '<input type="hidden" name="_method" value="PUT">';
                        $("#frmUser").append(metodo);
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });

            }
            function editarDocumentType(id)
            {
                url=urlBase+"DocumentType/"+id;//"{{url('/DocumentType')}}/"+id;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        dialogDocumentType.dialog("open");
                        $("#frmDocumentType #name").val(result.name);
                        $("#frmDocumentType #description").val(result.description);
                        $("#frmDocumentType").attr('action',urlBase+"DocumentType/"+id);//"{{url('/DocumentType')}}/"+id);
                        let metodo= '<input type="hidden" name="_method" value="PUT">';
                        $("#frmDocumentType").append(metodo);
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });
            }
            function editarPolicy(id)
            {
                url=urlBase+"authorizationPolicies/"+id;//"{{url('/authorizationPolicies')}}/"+id;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        dialogPolicy.dialog("open");
                        $("#frmPolicy #title").val(result.title);
                        $("#frmPolicy #description").val(result.description);
                        $("#frmPolicy").attr('action',urlBase+"authorizationPolicies/"+id);//"{{url('/authorizationPolicies')}}/"+id);
                        let metodo= '<input type="hidden" name="_method" value="PUT">';
                        $("#frmPolicy").append(metodo);
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });
            }
            function editarArl(id)
            {
                url=urlBase+"arls/"+id;//"{{url('/arls')}}/"+id;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        dialogArl.dialog("open");
                        $("#frmArl #name").val(result.name);
                        $("#frmArl #description").val(result.description);
                        $("#frmArl").attr('action',urlBase+"arls/"+id);// "{{url('/arls')}}/"+id);
                        let metodo= '<input type="hidden" name="_method" value="PUT">';
                        $("#frmArl").append(metodo);
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });
            }
            function myGreeting(etiqueta)
            {
                $("#"+etiqueta).fadeOut();
            }
            function CalculateAge(dateString)
            {
                let hoy = new Date();
                let fechaNacimiento = new Date(dateString);
                let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
                let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
                if (
                    diferenciaMeses < 0 ||(diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate()))
                {
                    edad--;
                }
                return edad;
            }
            function attach(documentTypeId)
            {
                $("#frmAttach #document_type").val(documentTypeId);
                dialogAttach.dialog("open");

            }
            function editarEps(id)
            {
                url=urlBase+"eps/"+id;// "{{url('/eps')}}/"+id;
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        dialogEps.dialog("open");
                        $("#frmEps #name").val(result.name);
                        $("#frmEps #description").val(result.description);
                        $("#frmEps").attr('action',urlBase+"eps/"+id);//"{{url('/eps')}}/"+id);
                        let metodo= '<input type="hidden" name="_method" value="PUT">';
                        $("#frmEps").append(metodo);
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });
            }
            $("#btnNewnessType").click(function(){
                dialogNewnessType.dialog("open");

            });
            $("#btnUser").click(function(){
dialogUser.dialog("open");

            });
            $(".btnPolicy").click(function(){
                dialogPolicy.dialog("open");
            });
            $(".btnEps").click(function(){
                dialogEps.dialog("open");
            });
            $(".btnArl").click(function(){
                dialogArl.dialog("open");
            });

            $("#birth_date").change(function(){
                let age=CalculateAge(this.value);
                   $("#age").html("Edad: "+age +" años");
            });
            $(".currency").focus(function(){
                this.value= "";
            });
            $(".currency").blur(function(){
              this.value= new Intl.NumberFormat("en-US", {
                                        style: "currency",
                                        currency: "USD"
                                        }).format(this.value);
            });
            $("#state").change(function(){
                console.log(this.value);
                url=urlBase+"cities/GetCitiesByState/"+this.value;//"{{url('/cities/GetCitiesByState/')}}/"+this.value;
                $("#city").empty().append('<option value="">Seleccione una ciudad</option>');
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (result)
                    {
                        console.log(result);
                        $.each(result, function(index, city)
                        {
                            $("#city").append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    },
                    error: function (ajaxContext)
                    {
                        Swal.fire({
                            title: "Se han encontrado los siguientes errores:",
                            icon: "error",
                            text:ajaxContext.responseText,
                            draggable: true
                        });
                        //alert(ajaxContext.responseText)
                    }
                });
            })
            $("#seizure").change(function(){
                console.log( this.checked);
                this.checked?$("#divCompanySeizure").fadeIn():$("#divCompanySeizure").fadeOut();
                $("#company_seizure").focus();
                $("#company_seizure").val('');
            });
            $("#btnPolAutorizaciones").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnPolAutorizaciones")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                 $(".card").fadeOut();
                $("#cardPolAutorizaciones").fadeIn();

            });
            $("#btnPoltrataDatosPers").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnPoltrataDatosPers")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                 $(".card").fadeOut();
                $("#cardPoltrataDatosPers").fadeIn();

            }) ;
            $("#btnInfoPatrimonial").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoPatrimonial")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                 $(".card").fadeOut();
                $("#cardInfoPatrimonial").fadeIn();

            });
            $("#btnDocumenType").click(function(){
                dialogDocumentType.dialog("open");
            });
            $("#btnInfoPersonal").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');

                $(".card").fadeOut();
                if(abrirInfopersonal(user ,client)){
                    $("#btnInfoPersonal")
                .removeClass('btn-primary')
                .addClass('btn-info');
                    $("#cardInfoPersonal").fadeIn();

                   }
                   else
                   {
                       Swal.fire({
                        title: "Advertencia",
                        icon: "warning",
                        html:"La informacion ya se encuentra registrada, si desea actualizarla por favor contacte al administrador",
                        draggable: true
                        });
                    }


            });
            $("#btnInfoLaboral").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoLaboral")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $(".card").fadeOut();
                $("#cardInfoLaboral").fadeIn();

            });
            $("#btnDatosContacto").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnDatosContacto")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $(".card").fadeOut();
                $("#cardDatosContacto").fadeIn();

            });
            $("#btnInfoLegal").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoLegal")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $(".card").fadeOut();
                $("#cardInfoLegal").fadeIn();
            })
            $("#btnInfoCredito").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoCredito")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $(".card").fadeOut();
                $("#cardInfoCrediticia").fadeIn();

            });

            $("#btnContact").click(function()
            {
                dialogContact.dialog("open");
            });
            var dialogNewnessType=$("#dialogNewnessType").dialog({
                autoOpen: false,
                height: 250,
                width: 500,
                modal: true,
                buttons:
                [{
                    text: "Guardar",
                    "class": 'btn btn-success',
                    click: function () {
                        $("#frmNewnessType")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogNewnessType.dialog("close");
                    }
                }],
                close: function ()
                {
                    $("#frmNewnessType")[0].reset();
                   //form[0].reset();
                    //allFields.removeClass("ui-state-error");

                } 
            })
            var dialogViewDocuments= $("#dialogViewDocuments").dialog({
                autoOpen: false,
                height: 400,
                width: 700,
                modal: true,
                buttons:
                [{
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogViewDocuments.dialog("close");
                    }
                }],
                close: function ()
                {
                    $("#tblDocuments tbody").empty();
                   //form[0].reset();
                    //allFields.removeClass("ui-state-error");

                }
            });
            var dialogDocumentType= $("#dialogDocumentType").dialog({
                autoOpen: false,
                height: 250,
                width: 500,
                modal: true,
                buttons:
                [{
                    text: "Guardar",
                    "class": 'btn btn-success',
                    click: function () {
                        $("#frmDocumentType")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogDocumentType.dialog("close");
                    }
                }],
                close: function ()
                {
                    $("#frmDocumentType")[0].reset();
                   //form[0].reset();
                    //allFields.removeClass("ui-state-error");

                }
            });
            var dialogUser=$("#dialogUser").dialog({
                autoOpen: false,
                height: 500,
                width: 500,
                modal: true,
                buttons:
                [{
                    text: "Guardar",
                    class: 'btn btn-success',
                    click: function () {
                       $("#frmUser")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogUser.dialog("close");
                    }
                }],
                close: function ()
                {
                    $("#frmUser")[0].reset();
                   //form[0].reset();
                    //allFields.removeClass("ui-state-error");

                }
            })
            var dialogAttach= $("#dialogAttach").dialog({
                autoOpen: false,
                height: 250,
                width: 500,
                modal: true,
                buttons:
                [{
                    text: "Adjuntar",
                    "class": 'btn btn-success',
                    click: function () {
                       $("#frmAttach")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogAttach.dialog("close");
                    }
                }],
                close: function ()
                {
                    $("#frmAttach")[0].reset();
                   //form[0].reset();
                    //allFields.removeClass("ui-state-error");

                }
            });
            var dialogPolicy= $("#dialogPolicy").dialog({
                autoOpen: false,
                height: 350,
                width: 600,
                modal: true,
                buttons:
                [{
                    text: "Guardar",
                    "class": 'btn btn-success',
                    click: function () {
                        $("#frmPolicy")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogPolicy.dialog("close");
                    }
                }],
            });
            var dialogArl= $("#dialogArl").dialog({
                autoOpen: false,
                height: 350,
                width: 600,
                modal: true,
                buttons:
                [{
                    text: "Guardar",
                    "class": 'btn btn-success',
                    click: function () {
                        $("#frmArl")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogArl.dialog("close");
                    }
                }],
                close: function (){
                    $("#frmArl")[0].reset();
                }
            });
            dialogEps= $("#dialogEps").dialog({
                autoOpen: false,
                height: 350,
                width: 600,
                modal: true,
                buttons:
                [{
                    text: "Guardar",
                    "class": 'btn btn-success',
                    click: function () {
                        $("#frmEps")[0].submit();
                    }
                },
                {
                    text: "Salir",
                    "class": 'btn btn-danger',
                    click: function () {
                        dialogEps.dialog("close");
                    }
                }],
            close: function ()
            {
                $("#frmEps")[0].reset();
                //form[0].reset();
                //allFields.removeClass("ui-state-error");
            }
            });
            dialogContact= $("#dialogContact").dialog({
                autoOpen: false,
                height: 350,
                width: 600,
                modal: true,
                buttons:
                [
                    {
                        text: "Guardar",
                        "class": 'btn btn-success',
                        click: function()
                        {
                            $("#frmContact")[0].submit();
                        }
                    },
                    {
                        text: "Salir",
                        "class": 'btn btn-danger',
                        click: function ()
                        {
                            dialogContact.dialog("close");
                        }

                    }
                ],
                close: function ()
                {
                    $("#frmContact")[0].reset();
                //form[0].reset();
                //allFields.removeClass("ui-state-error");
                }
            });

        </script>
    </body>
</html>
