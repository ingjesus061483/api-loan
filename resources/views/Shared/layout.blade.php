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
 
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css">
        <link href="{{url('/jquery-ui-1.12.1.custom/jquery-ui.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('/')}}">Magestad</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                @if (auth()->check())              
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form class="d-none d-md-inline-block form-inline" action="{{url('/login')}}/{{auth()->user()->id }}"                                    
                                onsubmit="return validar('Desea cerrar la sesion?')" method="post">
                            @csrf
                            @method('delete')
                            <button title="Cerrar sesion" type="submit" class="btn">
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
                            <div class="sb-sidenav-menu-heading">Core</div>
                            @if(auth()->check())
                            <a class="nav-link" href="{{url('/clients')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dots"></i></div>
                                Clientes
                            </a>
                            @else
                            <a class="nav-link" href="{{url('/clients/create')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dots"></i></div>
                                Solicitud de credito
                            </a>
                            @endif
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
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
                        </div>
                    </div>
                    <div class="sb-sidenav-footer"> 
                        <div class="small">Logged in as:</div>
                        @if(auth()->check())                       
                        {{auth()->user()->name}}
                        @endif
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @if(session('message'))
                            <div  id="message" class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif                    
                        @if($errors->any())
                            <div  id="errors" class="alert alert-danger">
                                <ul>                                    
                                    @foreach ($errors->all() as $error)                                    
                                        <li>{{$error}}</li>                                 
                                    @endforeach                                
                                </ul>
                            </div>                            
                        @endif
                        <h1 class="mt-4">@yield('title')</h1>
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
                            <div class="text-muted">Copyright &copy; Your Website {{date('Y')}}</div>
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
        <script src="{{url('/js/jquery.js')}}"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('/js/scripts.js')}}"></script>
        <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.3.4/datatables.min.js" integrity="sha384-mtJ3+H/dkUyvhmcXYSyIZyaeG0TnEkh91c1JwFkrkBLHBv8oQ3lFjUp8xfDan41b" crossorigin="anonymous"></script>
        <script src="{{url('/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script> 

        <script>

            if($("#seizure"))
            {
                if($("#seizure").is(':checked'))                
                {
                    $("#divCompanySeizure").fadeIn();                
                }                
            }
            var app="{{isset($info)?$info:''}}";
        
            switch(app){
                case "client":{
                    $("#cardInfoPersonal").fadeIn();
                    break;
                }
                case "contact":{
                    $("#cardDatosContacto").fadeIn();
                    break;
                }
                case 'law':{
                    $("#cardInfoLegal").fadeIn();   
                    break; 
                }
                case 'patrimonial':{
                    $("#cardInfoPatrimonial").fadeIn();    
                    break;
                }
                case  'loan':{
                    $("#cardInfoCrediticia").fadeIn();
                    break;
                }
                case 'employment':{
                    $("#cardInfoLaboral").fadeIn();

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
            const myTimeout = setTimeout(myGreeting, 5000);            
            function validar(mensaje) 
            {
                if (confirm(mensaje))
                {                              
                    return true;                
                }                
                return false;                               
            }  
            $(".currency").focus(function(){
                this.value= ""
               
            });
            $(".currency").blur(function(){
              this.value= new Intl.NumberFormat("en-US", {
                                        style: "currency",                        
                                        currency: "USD"
                                        }).format(this.value);
            });          
            $("#state").change(function(){
                console.log(this.value);
                url="{{url('/cities/GetCitiesByState/')}}/"+this.value;
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
                        alert(ajaxContext.responseText)                   
                    }                
                });
            })
            $("#seizure").change(function(){
                console.log( this.checked);
                this.checked?$("#divCompanySeizure").fadeIn():$("#divCompanySeizure").fadeOut();      
                $("#company_seizure").focus(); 
                $("#company_seizure").val('');
                         
            });
          
            $("#btnInfoPatrimonial").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                
                $("#btnInfoPatrimonial")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $("#cardInfoPatrimonial").fadeIn();
                $("#cardInfoPersonal").fadeOut();
                $("#cardInfoLaboral").fadeOut();
                $("#cardInfoCrediticia").fadeOut();
                $("#cardDatosContacto").fadeOut();
                $("#cardInfoLegal").fadeOut();
            });
            $("#btnInfoPersonal").click(function(){                
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoPersonal")
                .removeClass('btn-primary')
                .addClass('btn-info');
                $("#cardInfoPersonal").fadeIn();
                $("#cardInfoLaboral").fadeOut();
                $("#cardInfoCrediticia").fadeOut();
                $("#cardDatosContacto").fadeOut();
                $("#cardInfoPatrimonial").fadeOut();
                $("#cardInfoLegal").fadeOut();
            });
            $("#btnInfoLaboral").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoLaboral")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $("#cardInfoPersonal").fadeOut();
                $("#cardInfoLaboral").fadeIn();
                $("#cardInfoCrediticia").fadeOut();
                $("#cardDatosContacto").fadeOut();
                $("#cardInfoPatrimonial").fadeOut();
                $("#cardInfoLegal").fadeOut();
            });
            $("#btnDatosContacto").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnDatosContacto")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $("#cardDatosContacto").fadeIn();
                $("#cardInfoPersonal").fadeOut();
                $("#cardInfoLaboral").fadeOut();
                $("#cardInfoCrediticia").fadeOut();
                $("#cardInfoPatrimonial").fadeOut();
                $("#cardInfoLegal").fadeOut();
            });
            $("#btnInfoLegal").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoLegal")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                
                $("#cardInfoPatrimonial").fadeOut();
                $("#cardDatosContacto").fadeOut();
                $("#cardInfoPersonal").fadeOut();
                $("#cardInfoLaboral").fadeOut();
                $("#cardInfoCrediticia").fadeOut();
                $("#cardInfoLegal").fadeIn();
            })
            $("#btnInfoCredito").click(function(){
                $(".btn").removeClass('btn-info').addClass('btn-primary');
                $("#btnInfoCredito")
                 .removeClass('btn-primary')
                 .addClass('btn-info');
                $("#cardInfoPatrimonial").fadeOut();
                $("#cardDatosContacto").fadeOut();
                $("#cardInfoPersonal").fadeOut();
                $("#cardInfoLaboral").fadeOut();
                $("#cardInfoCrediticia").fadeIn();
                $("#cardInfoLegal").fadeOut();
            });
            
            $("#btnContact").click(function()                          
            {
                dialogContact.dialog("open");            
            });            
            dialogContact= $("#dialogContact")
            .dialog({                
            autoOpen: false,                
            height: 350,                      
            width: 600,                      
            modal: true,                      
            buttons: 
            [{
                text: "Guardar",                        
                "class": 'btn btn-success',                        
                click: function () {                            
                    $("#frmContact")[0].submit();                     
                }
            },            
            {                        
                text: "Salir",                        
                "class": 'btn btn-danger',                        
                click: function () {                            
                    dialogContact.dialog("close");                        
                }
            }],                                          
            close: function () 
            {
                $("#frmContact")[0].reset();
                //form[0].reset();                                                          
                //allFields.removeClass("ui-state-error");                        
            }                    
            });
            function myGreeting()         
            {                    
                $("#errors").fadeOut();                
            }
        </script>
    </body>
</html>
