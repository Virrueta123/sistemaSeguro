@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary">Creando propietario</h1>
    
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
         <h4 class="text-info"><i class="fa fa-user"></i> Datos del Propietario</h4>
    </div>
    
    <div class="box-body">
      <form id="propietario" role="form" method="POST" action="{{ route("Propietario.store") }}">
    
        @csrf
        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Dni</label>
                    <input  name="Prx_Dni" id="Prx_Dni" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']">
 
                </div>   
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Ubigueo</label>
                    <input  name="Prx_Ubigeo" id="Prx_Ubigeo" class="form-control"  > 
                </div>   
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Vigencia</label>
                    <p >
                        Inicio {{ $vigenciaI }} - Final {{ $vigenciaF }}
                    </p>
                    
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" name="Prx_Nombre" class="form-control" placeholder="Nombres...">
                </div>   
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="Prx_Apellido" class="form-control" placeholder="Apellido...">
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" id="Prx_Contacto" name="Prx_Contacto" class="form-control" placeholder="Celular...">
                </div>   
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" name="Prx_Direccion" class="form-control" placeholder="Direccion...">
                </div> 
            </div>
        </div>
        
        <div class="col-xs-12">
        <h4 class="text-info"><i class="fa fa-automobile"></i> Datos del Vehiculo</h4>
        </div>
        
        <div class="row">
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Numero Placa</label>
                    <input type="text" name="Prx_NroPlaca" id="Prx_NroPlaca" class="form-control"  > 
                </div>   
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Numero de serie</label>
                    <input type="text" name="Prx_NroSerie" id="Prx_NroSerie" class="form-control"  > 
                </div>   
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" name="Prx_Marca" id="Prx_Marca" class="form-control"  > 
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Numero de asientos</label>
                    <input type="number" name="Prx_NroAsientos" id="Prx_NroAsientos" class="form-control"  > 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" name="Prx_Modelo" id="Prx_Modelo" class="form-control"  > 
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Años de uso</label>
                    <input type="number" name="Prx_Uso" id="Prx_Uso" class="form-control"  > 
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label>Clase Vehicular</label>
                    <select name="Prx_Categoria" class="form-control">
                      <option value="">Seleciona una clase</option>  
                      <option value="Monto lineal">Monto lineal</option>
                      <option value="Trimovil">Trimovil</option>
                      <option value="Auto">Auto</option> 
                    </select>
                </div>   
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Año</label>
                    <select name="Prx_Ano" class="form-control">
                      <option value="">Seleciona un Año</option>
                      <option value="2000">2000</option>
                      <option value="2001">2001</option>
                      <option value="2002">2002</option>
                      <option value="2003">2003</option> 
                      <option value="2004">2004</option>
                      <option value="2005">2005</option>
                      <option value="2006">2006</option>
                      <option value="2007">2007</option>
                      <option value="2008">2008</option>
                      <option value="2009">2009</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
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
                    noespeciales: true,
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