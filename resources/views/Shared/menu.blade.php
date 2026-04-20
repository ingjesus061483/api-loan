 @if(auth()->check())

 <div class="sb-sidenav-menu-heading">Core</div>
 <a class="nav-link" href="#" id="buscar">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
    BUSQUEDA RAPIDA


 </a>

 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsBd" aria-expanded="false" aria-controls="collapseLayoutsBd">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
    BASE DE DATOS
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
 </a>
 <div class="collapse" id="collapseLayoutsBd" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{url('/clients')}}">Clientes</a>
        <a class="nav-link" href="#">Proveedores</a>
    </nav>
</div>
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar"></i></div>
    DIARIO
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
         <a class="nav-link" href="{{url('/Newness')}}">Novedades</a>
        <a class="nav-link" href="{{url('/homework')}}"> Tareas</a>
        <a class="nav-link" href="{{url('/requestLoan')}}">Solicitudes de préstamo</a>
    </nav>
</div>
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsD" aria-expanded="false" aria-controls="collapseLayoutsD">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
    CONFIGURACIÓN
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseLayoutsD" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{url('/NewnessType')}}">Tipos de novedades</a>
        <a class="nav-link" href="{{url('/DocumentType')}}">Tipos de documentos</a>
        <a class="nav-link" href="{{url('/arls')}}"> ARL</a>
        <a class="nav-link" href="{{url('/eps')}}">EPS</a>
        <a class="nav-link" href="{{url('/authorizationPolicies')}}"> Politicas y autorizaciones</a>
        <a class="nav-link" href="{{url('/users')}}">Usuarios</a>
    </nav>
</div>
@else
<div class="sb-sidenav-menu-heading">Formatos</div>
<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fa-solid fa-credit-card"></i></div>
    CREDITICIOS
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="{{url('/clients/create')}}">Solicitud de credito</a>
    </nav>
</div>
@endif
