@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary">Editando usuario</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("Usuario.index") }}"><i class="fa fa-dashboard"></i> Usuario</a></li>
    <li class="active">Editando resgistro</li>

@endsection


@section(
    "app"
)
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"> Editar Formulario </h3>
    </div>
    <!-- /.box-header -->
    <div class="col-sm-12">
         <h4 class="text-info"><i class="fa fa-user"></i> Datos del usuario</h4>
    </div>
    
    <div class="box-body">
       
      <form id="usuario" role="form" method="POST" action="{{ route("Usuario.updates",$User->id) }}">
       
        @csrf
        @method("PATCH")
        <div class="row">
            <div class="col-sm-6">
                <label>Dni</label>
                
                 <div class="input-group input-group">
                    <input name="dni" id="dni" value="{{ $User->dni }}" class="form-control"  >
                        <span class="input-group-btn">
                          <button id="BtnDni" type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                  </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Usuario</label>
                    <input  name="username" id="username" value="{{ $User->username }}" class="form-control"  > 
                </div>   
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" id="name" name="name" value="{{ $User->name }}" class="form-control" placeholder="Nombres...">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" id="lastname" name="lastname" value="{{ $User->lastname }}" class="form-control" placeholder="Apellido...">
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input type="text" id="email" name="email" value="{{ $User->email }}" class="form-control" placeholder="Celular...">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" name="cel" value="{{ $User->cel }}" class="form-control" placeholder="Direccion...">
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Privilegios</label>
                    <select name="tipo" class="form-control"> 
                      <option {{$User->tipo == "A"  ? 'selected' : ''}} value="A">Administrador</option>
                      <option {{$User->tipo == "T"  ? 'selected' : ''}} value="T">Trabajador</option> 
                    </select>
                </div>  
            </div>
        </div>
     
        <h4 class="text-info"><i class="fa fa-lock"></i> Cambiar Contraseña</h4>
   
            
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" id="password" name="password" value="" class="form-control" placeholder="Contraseña">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Vuelva a escribir la contraseña</label>
                    <input type="password" name="password_confirm" value="" class="form-control" placeholder="Contraseña">
                </div> 
            </div>
        </div>
        
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
        
        dni = $("#dni").val();
        
        $.ajax({ 
            type: "POST",
            url: "{{ route('consultadniajax') }}",
            data: { dni:dni },
            beforeSend: function(){
                $("#preload").fadeIn();
            },
            success: function(response) {
           
                data = JSON.parse(response)  
                switch (data.tipo) {
                    case 'success':
                        $("#name").val(data.mensaje.nombres)
                        $("#lastname").val(data.mensaje.apellidoPaterno+" "+ data.mensaje.apellidoMaterno) 
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
                        
                        $("#name").val("");
                        $("#lastname").val("");
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
                        $("#name").val("");
                        $("#lastname").val("");
                    break;  
                }
                $("#preload").fadeOut();
            }
        }); 
    });


    $("#dni").inputmask("99999999");
   
    $.validator.addMethod("uniqueuser",
    function (value, element) { 
            valor=false;
            usernameActual = "{{  $User->username }}";
            $.ajax({ 
                type: "POST",
                url: "{{ route('uniqueuser') }}",
                data: { username:value },
                async: false, 
                beforeSend: function(){
                    
                },
                success: function(response) {
                    if( usernameActual == value ){
                       valor=true; 
                    }else{
                     if(response=="success"){
                        valor=true; 
                     }else{
                        valor=false;  
                     }
                    }
                     
                }
            }); 
            return valor; 
    },"Este usuario Ya esxite" );
    //$("#Prx_NroPlaca").inputmask("a");

    $( "#usuario" ).validate({
            rules: {
                username:{
                   uniqueuser: true,
                   required: true, 
                },
                dni: {
                    required: true,
                    number:true,
                    minlength: 8,
                    maxlength: 8
                },
                name: {
                    required: true,
                    lettersonly: true,
                    minlength: 2,
                    maxlength: 150
                },
                lastname: {
                    lettersonly: true,
                    required: true, 
                    minlength: 2,
                    maxlength: 150
                },
                cel: {  
                    required: true, 
                    minlength: 9,
                    maxlength: 9
                },
                password: {
                    minlength: 5,
                    maxlength: 10,
                },
                password_confirm: {
                    minlength: 5,
                    equalTo: "#password",
                    maxlength: 10,
                }

            }  
    });    
    
});
</script>

@endsection