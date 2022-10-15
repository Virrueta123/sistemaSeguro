@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary">Editar propietario</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("Propietario.index") }}"><i class="fa fa-dashboard"></i> Propietarios</a></li>
    <li class="active">Editando resgistro</li>

@endsection


@section(
    "app"
)
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Formulario </h3>
    </div>
    <!-- /.box-header -->
    <div class="col-sm-12">
         <h4 class="text-info"><i class="fa fa-user"></i> Datos del Propietario</h4>
    </div>
    
    <div class="box-body">
       
      <form id="propietario" role="form" method="POST" action="{{ route("Propietario.update",$Prx->Prx_Id) }}">
       
        @csrf
        @method("PATCH")
        <div class="row">
            <div class="col-sm-3">
                <label>Dni</label>
                
                 <div class="input-group input-group">
                    <input name="Prx_Dni" id="Prx_Dni" value="{{ $Prx->Prx_Dni }}" class="form-control"  >
                        <span class="input-group-btn">
                          <button id="BtnDni" type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Ubigueo</label>
                    <input  name="Prx_Ubigeo" id="Prx_Ubigeo" value="{{ $Prx->Prx_Ubigeo}}" class="form-control"  > 
                </div>   
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Vigencia Incio</label>
                    <input type="date" name="Prx_VigenciaI" id="Prx_VigenciaI" value="{{ $Prx->Prx_VigenciaI }}" class="form-control"  > 
                </div>   
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Vigencia Final</label>
                    <input type="date" name="Prx_VigenciaF" id="Prx_VigenciaF" value="{{ $Prx->Prx_VigenciaF }}" class="form-control"  > 
                </div>   
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" id="Prx_Nombre" name="Prx_Nombre" value="{{ $Prx->Prx_Nombre }}" class="form-control" placeholder="Nombres...">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" id="Prx_Apellido" name="Prx_Apellido" value="{{ $Prx->Prx_Apellido }}" class="form-control" placeholder="Apellido...">
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" id="Prx_Contacto" name="Prx_Contacto" value="{{ $Prx->Prx_Contacto }}" class="form-control" placeholder="Celular...">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" name="Prx_Direccion" value="{{ $Prx->Prx_Direccion }}" class="form-control" placeholder="Direccion...">
                </div> 
            </div>
        </div>
        
        <div class="col-sm-12">
        <h4 class="text-info"><i class="fa fa-automobile"></i> Datos del Vehiculo</h4>
        </div>
        
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Numero Placa</label>
                    <input type="text" name="Prx_NroPlaca" id="Prx_NroPlaca" value="{{ $Prx->Prx_NroPlaca }}" class="form-control"  > 
                </div>   
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Numero de serie</label>
                    <input type="text" name="Prx_NroSerie" id="Prx_NroSerie" value="{{ $Prx->Prx_NroSerie }}" class="form-control"  > 
                </div>   
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" name="Prx_Marca" id="Prx_Marca" value="{{ $Prx->Prx_Marca }}" class="form-control"  > 
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Numero de asientos</label>
                    <input type="number" name="Prx_NroAsientos" id="Prx_NroAsientos" value="{{ $Prx->Prx_NroAsientos }}" class="form-control"  > 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" name="Prx_Modelo" id="Prx_Modelo" value="{{ $Prx->Prx_Modelo }}" class="form-control"  > 
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Años de uso</label>
                    <input type="number" name="Prx_Uso" id="Prx_Uso" value="{{ $Prx->Prx_Uso }}" class="form-control"  > 
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Clase Vehicular</label>
                    <select name="Prx_Categoria" class="form-control"> 
                      @foreach ($categoria as $ct)
                        @if ($Prx->Prx_Categoria == $ct)
                        <option selected value="{{ $ct }}">{{ $ct }}</option> 
                        @else
                        <option value="{{ $ct }}">{{ $ct }}</option> 
                        @endif 
                      @endforeach
                    </select>
                </div>   
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Año</label>
                    <select name="Prx_Ano" class="form-control">
                        @foreach ($anos as $ano)
                            @if ($Prx->Prx_Ano == $ano)
                            <option selected value="{{ $ano }}">{{ $ano }}</option> 
                            @else
                            <option value="{{ $ano }}">{{ $ano }}</option> 
                            @endif 
                        @endforeach 
                    </select>
                </div>  
            </div>
             
        </div>
 
        <!-- select
        <div class="form-group">
          <label>Select</label>
          <select class="form-control">
            <option>option 1</option>
            <option>option 2</option>
            <option>option 3</option>
            <option>option 4</option>
            <option>option 5</option>
          </select>
        </div> -->
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-submit">Editar</button>
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
    
    $.ajaxSetup({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 

    $("#BtnDni").click(function (e) {  
        
        dni = $("#Prx_Dni").val();
        
        $.ajax({ 
            type: "POST",
            url: "{{ route('consultadniajax') }}",
            data: { dni:dni },
            beforeSend: function(){
                 
            },
            success: function(response) {
           
                data = JSON.parse(response) 
        
                
                switch (data.tipo) {
                    case 'success':
                        $("#Prx_Nombre").val(data.mensaje.nombres)
                        $("#Prx_Apellido").val(data.mensaje.apellidoPaterno+" "+ data.mensaje.apellidoMaterno) 
                        console.log(data.mensaje.nombres)
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: "Se encontro los datos",
                                showConfirmButton: false,
                                timer: 2500
                        }) 
                        break;

                    case 'error':
                        Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: "Se encontro los datos",
                                showConfirmButton: false,
                        })    
                        
                        $("#Prx_Nombre").val("");
                        $("#Prx_Apellido").val("");
                        break;

                    case 'validate':
                        data.mensaje.forEach(element => {  
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: element,
                                showConfirmButton: false,
                                timer: 2500
                            }) 
                        });
                        $("#Prx_Nombre").val("");
                        $("#Prx_Apellido").val("");
                    break;
                
                        
                }
            }
        }); 
    });



    $("#Prx_Dni").inputmask("99999999");
  
     
    $("#Prx_Ubigeo").inputmask("999999"); 

    $("#Prx_Contacto").inputmask("999 999 999");
 
    //$("#Prx_NroPlaca").inputmask("a");

    $( "#propietario" ).validate({
            rules: {
                Prx_Dni: {
                    required: true,
                    number:true,
                    minlength: 8,
                    maxlength: 8
                },
                Prx_VigenciaI: {
                    required: true, 
                },
                Prx_VigenciaF: {
                    required: true, 
                },
                Prx_Nombre: {
                    required: true,
                    lettersonly: true,
                    minlength: 2,
                    maxlength: 150
                },
                Prx_Apellido: {
                    lettersonly: true,
                    required: true, 
                    minlength: 2,
                    maxlength: 150
                },
                Prx_Contacto: {  
                    required: true, 
                    minlength: 11,
                    maxlength: 11
                },
                Prx_Direccion: { 
                    required: true, 
                    minlength: 2,
                    maxlength: 150
                },
                Prx_Ubigeo: {
                    number: true,
                    required: true, 
                    minlength: 6, 
                }, 
                Prx_NroPlaca: { 
                    required: true, 
                    minlength: 7,
                    maxlength: 7
                }, 
                Prx_NroSerie: { 
                    required: true, 
                    minlength: 17,
                    maxlength: 17
                }, 
                Prx_Categoria: { 
                    required: true
                },
                Prx_Ano: { 
                    required: true 
                },
                Prx_Marca: {
                    lettersonly: true, 
                    required: true, 
                    minlength: 2,
                    maxlength: 50
                },
                Prx_NroAsientos: {
                    number: true, 
                    required: true, 
                    minlength: 1
                },
                Prx_Modelo: { 
                    required: true, 
                    minlength: 1,
                    maxlength: 150
                },
                Prx_Uso: {
                    number:true,
                    required: true, 
                    minlength: 1,
                    maxlength: 3
                }
            }  
    });    
    
});
</script>

@endsection