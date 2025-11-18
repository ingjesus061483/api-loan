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
    //form[0].reset();                                                          
    //allFields.removeClass("ui-state-error");

}
});
var dialogEps= $("#dialogEps").dialog({
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
var dialogContact= $("#dialogContact").dialog({                                
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
var urlBase=$("#base_url").val();
var app=$("#info").val(); 
if( $("#errors").length>0 )           
{
    Swal.fire({        
        title: "Drag me!",        
        icon: "error",        
        html:$("#errors").html(),        
        draggable: true
    });            
}
if( $("#message").length>0 )            
{    
    Swal.fire({        
        title: "Información",
        icon: "success",
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
switch(app)
    {
        case "client":                    
        {
            $("#cardInfoPersonal").fadeIn();
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
function validar(mensaje) 
    {
        if (confirm(mensaje))
        {                              
            return true;                
        }                
        return false;                               
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
                alert(ajaxContext.responseText)                   
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
                alert(ajaxContext.responseText)                   
            }                
        });
}
$(".btnEps").click(function(){
        dialogEps.dialog("open");
});
$(".btnArl").click(function(){
        dialogArl.dialog("open");
});
    //$("#btnArl").click(function(){});
$("#birth_date").change(function(){
        let age=CalculateAge(this.value);
           $("#age").val(age +" años");               
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
