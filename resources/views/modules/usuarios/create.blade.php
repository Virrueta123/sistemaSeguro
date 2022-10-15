@extends(
"layouts.admin"
)

@section(
    "name"
)

    <h1 class="text-primary">Creando usuario</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("Usuario.index") }}"><i class="fa fa-dashboard"></i> Usuario</a></li>
    <li class="active">Creando resgistro</li>

@endsection


@section(
    "app"
)
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title"> Formulario </h3>
    </div>
    <!-- /.box-header -->
   
    
   
    
    <div class="box-body">
       
      <form id="usuario" role="form" method="POST" action="{{ route("Usuario.create") }}">
        <div class="container parent">
            <h4 class="text-info p-2"><i class="fa-solid fa-image"></i> Elige un avatar</h4>
            <div class="row">
                <div class='col text-center'>
                <input type="radio" checked value="dist/img/avatar.png" name="imgbackground" id="img1" class="d-none imgbgchk" style="opacity:0;" value="">
                  <label for="img1">
                    <img src="{{ asset("dist/img/avatar.png") }}" class="img-circle" alt="Image 1">
                    <div class="tick_container">
                      <div class="tick"><i class="fa fa-check"></i></div>
                    </div>
                    </label>
                </div>
                <div class='col text-center'>
                <input type="radio" value="dist/img/avatar2.png" name="imgbackground" id="img2" class="d-none imgbgchk" style="opacity:0;" value="">
                  <label for="img2">
                    <img src="{{ asset("dist/img/avatar2.png") }}" class="img-circle" alt="Image 2">
                    <div class="tick_container">
                      <div class="tick"><i class="fa fa-check"></i></div>
                    </div>
                  </label>
                </div>
                <div class='col text-center'>
                <input type="radio" value="dist/img/avatar3.png" name="imgbackground" id="img3" class="d-none imgbgchk" style="opacity:0;" value="">
                  <label for="img3">
                    <img src="{{ asset("dist/img/avatar3.png") }}" class="img-circle" alt="Image 3">
                    <div class="tick_container">
                      <div class="tick"><i class="fa fa-check"></i></div>
                    </div>
                  </label>
                </div>
                <div class='col text-center'>
                <input type="radio" value="dist/img/avatar04.png" name="imgbackground" id="img4" class="d-none imgbgchk" style="opacity:0;" value="">
                    <label for="img4">
                      <img src="{{ asset("dist/img/avatar04.png") }}" class="img-circle" alt="Image 4">
                      <div class="tick_container">
                        <div class="tick"><i class="fa fa-check"></i></div>
                      </div>
                    </label>
                </div>
    
                <div class='col text-center'>
                    <input type="radio" value="dist/img/avatar5.png" name="imgbackground" id="img5" class="d-none imgbgchk" style="opacity:0;" value="">
                        <label for="img5">
                          <img src="{{ asset("dist/img/avatar5.png") }}"  class="img-circle" alt="Image 4">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-check"></i></div>
                          </div>
                        </label>
                    </div>
              </div>
            </div>
    
        <div class="col-sm-12">
             <h4 class="text-info"><i class="fa fa-user"></i> Datos del usuarios</h4>
        </div>
        
        @csrf 
        <div class="row">
            <div class="col-sm-6">
                <label>Dni</label>
                
                 <div class="input-group input-group">
                    <input name="dni" id="dni"  class="form-control"  >
                        <span class="input-group-btn">
                          <button id="BtnDni" type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                  </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Usuario</label>
                    <input  name="username" id="username" class="form-control"  > 
                </div>   
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombres...">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Apellido...">
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Celular...">
                </div>   
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" name="cel" class="form-control" placeholder="Direccion...">
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Privilegios</label>
                    <select name="tipo" class="form-control">
                      <option value="">Seleciona un Privilegio</option>
                      <option value="A">Administrador</option>
                      <option value="T">Trabajador</option> 
                    </select>
                </div>  
            </div>
        </div>

     
        <h4 class="text-info"><i class="fa fa-lock"></i> Seguridad</h4>
   
            
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
            <button type="submit" class="btn btn-primary btn-submit">Crear</button>
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
            $.ajax({ 
                type: "POST",
                url: "{{ route('uniqueuser') }}",
                data: { username:value },
                async: false, 
                beforeSend: function(){
                    
                },
                success: function(response) {
                    
                     if(response=="success"){
                        valor=true; 
                     }else{
                        valor=false;  
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
                    required: true,
                },
                tipo: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                imgbackground: {
                    required: true, 
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password",
                    maxlength: 10,
                }

            }  
    });    
    
});
</script>

@endsection