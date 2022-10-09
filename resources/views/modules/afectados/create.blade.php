@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary">Creando </h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("Propietario.index") }}"><i class="fa fa-dashboard"></i> Propietarios</a></li>
    <li class="active">Creando resgistro</li>

@endsection


@section(
    "app"
)
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Formulario de Registro</h3>
    </div>
    <!-- /.box-header -->
    <div class="col-xs-12">
         <h4 class="text-info"><i class="fa fa-user"></i> Datos del Afectado </h4>
    </div>
    
    <div class="box-body">
      <form id="propietario" role="form" method="POST" action="{{ route("Afectado.store",$Acx_Id) }}">
    
        @csrf
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" name="Afx_Nombre" class="form-control" placeholder="Nombres...">
                </div>   
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="Afx_Apellido" class="form-control" placeholder="Apellido...">
                </div> 
            </div>
        </div>

        <div class="row">
            
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Dni</label>
                    <input  name="Afx_Dni" id="Afx_Dni" class="form-control" >
 
                </div>   
            </div>

            <div class="col-xs-6">
                <div class="form-group">
                    <label>Celular</label>
                    <input  name="Afx_Cel" id="Afx_Cel" class="form-control" >
                </div>   
            </div>
        </div>
   
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>

      </form>
    </div>
    <!-- /.box-body -->
  </div>
@endsection



@section(
    "js"
)
 
<script>
   
$(document).ready(function(){
    
    $("#Afx_Dni").inputmask("99999999"); 

    $("#Afx_Cel").inputmask("999999999");
 
    //$("#Prx_NroPlaca").inputmask("a");

    $( "#propietario" ).validate({
            rules: {
                Afx_Dni: {
                    required: true,
                    number:true,
                    minlength: 8,
                    maxlength: 8
                },
                Afx_Nombre: {
                    required: true,
                    lettersonly: true,
                    minlength: 2,
                    maxlength: 150
                },
                Afx_Apellido: {
                    lettersonly: true,
                    required: true, 
                    minlength: 2,
                    maxlength: 150
                },
                Afx_Cel: { 
                    required: true, 
                    number:true,
                }
            }  
    });    
    
});
</script>

@endsection