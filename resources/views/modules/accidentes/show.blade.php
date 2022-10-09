
@extends(
    "layouts.admin"
    )
    
    @section(
        "name"
    )
        <h1 class="text-primary"> Accidente</h1>
        
    @endsection
    
    @section(
        "history"
    )
    
        <li><a href="{{ route("Propietario.index") }}"><i class="fa fa-dashboard"></i> Propietarios</a></li>
        <li class="active">Tabla de registro</li>
    
    @endsection
    
    
    @section(
        "app"
    )
    <div class="box box-primary">
      <div class="box-body box-profile">
        <h3 class="profile-username text-center">Datos del conductor</h3>

        <div class="row">
            <div class="col-sm-6">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Nro Cat</b> <p class="pull-right text-info">{{ $Prx->Prx_NroCat }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Dni</b> <p class="pull-right text-info">{{ $Prx->Prx_Dni }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Nombre</b> <p class="pull-right text-info">{{ $Prx->Prx_Nombre }}</p>
                    </li>
                    <li class="list-group-item">
                        <b>Celular</b> <p class="pull-right text-info">{{ $Prx->Prx_Contacto }}</p>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Vigencia</b> 
                    @if ($Prx->Prx_VigenciaF <= Carbon\Carbon::now()->format("Y-m-d"))
                        <small class="text-danger">vencido</small>
                    @else
                        <small class="text-success">Activo</small>
                    @endif
                      
                    @if ($Prx->Prx_VigenciaF <= Carbon\Carbon::now()->format("Y-m-d"))
                        <p class="pull-right text-danger"> 
                            Inicio {{ Carbon\Carbon::parse($Prx->Prx_VigenciaI)->format("d/m/Y") }} - vence {{ Carbon\Carbon::parse($Prx->Prx_VigenciaF)->format("d/m/Y") }}
                        </p> 
                    @else
                        <p class="pull-right text-success"> 
                            Inicio {{ Carbon\Carbon::parse($Prx->Prx_VigenciaI)->format("d/m/Y") }} - vence {{ Carbon\Carbon::parse($Prx->Prx_VigenciaF)->format("d/m/Y") }}
                        </p> 
                    @endif 
                    </li>
                    <li class="list-group-item">
                      <b>Ubigeo</b> <p class="pull-right text-info">{{ $Prx->Prx_Ubigeo }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Apellido</b> <p class="pull-right text-info">{{ $Prx->Prx_Apellido }}</p>
                    </li>
                    <li class="list-group-item">
                        <b>Direccion</b> <p class="pull-right text-info">{{ $Prx->Prx_Direccion }}</p>
                    </li>
                </ul>
            </div> 
        </div>

        <h3 class="profile-username text-center">Datos del Vehiculo</h3>

        <div class="row">
            <div class="col-sm-6">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Nro Placa</b> <p class="pull-right text-info">{{ $Prx->Prx_NroPlaca }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Modelo</b> <p class="pull-right text-info">{{ $Prx->Prx_Modelo }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Numero de Asientos</b> <p class="pull-right text-info">{{ $Prx->Prx_NroAsientos }} Asientos</p>
                    </li>
                    <li class="list-group-item"> 
                        <b>Año</b> <p class="pull-right text-info">{{ $Prx->Prx_Ano }}</p>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Nro Serie</b> <p class="pull-right text-info">{{ $Prx->Prx_NroSerie }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Marca</b> <p class="pull-right text-info">{{ $Prx->Prx_Marca }}</p>
                    </li>
                    <li class="list-group-item">
                      <b>Años de Uso</b> <p class="pull-right text-info">{{ $Prx->Prx_Uso }} años</p>
                    </li>
                    <li class="list-group-item">
                        <b>Clase Vehicular</b> <p class="pull-right text-info">{{ $Prx->Prx_Categoria }}</p>
                    </li>
                </ul>
            </div> 
        </div>

    </div>
    </div>
 
        @if (!$Acx) 
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Descripcion Accidente</h3>
            </div> 
            <div class="box-body">
              <form id="accidente" role="form" method="POST" action="{{ route("Accidente.store",$Prx->Prx_Id) }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input  name="Acx_Desc" id="Acx_Desc" class="form-control" >
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
          @else
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">Accidente</h3>

              <div class="row">
                <div class="col-sm-12">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Descripcion del accidentes</b> <p class="pull-right text-info">{{ $Acx->Acx_Desc }}</p>
                        </li> 
                    </ul>
                </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-sm-12">
                    <a href="{{ route("Afectado.create",$Acx->Acx_Id) }}" class="btn btn-block   btn-dropbox "> 
                        <i class="fa fa-add"> </i> agregar a personas afectadas
                    </a>
                </div>
             </div>
            <!-- /.box-body -->
          </div>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de registros</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr >
                  <th class="text-center">Dni</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Celular</th> 
                </tr>
                </thead>
                <tbody class="text-center">
                @forelse ( $Afxs as $Afx)
                  <tr>
                    <td>{{  $Afx->Afx_Dni }}</td>
                    <td>{{  $Afx->Afx_Nombre }}</td>
                    <td>{{  $Afx->Afx_Apellido }}</td>
                    <td>{{  $Afx->Afx_Cel }}</td>
                  </tr>
                @empty
                <tr>
                    <td colspan="4"><h4 class="text-center text-warning">Aun no se registro ningun afectado</h4></td>
                </tr>
                @endforelse
                  
                </tbody>
                <tfoot class="text-center">
                    <th class="text-center">Dni</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Celular</th> 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div> 


          @endif
        
   
    @endsection
    
    
    
    @section(
        "js"
    )
     
    @section("js")
    <script>
          
    $(document).ready(function(){ 
        $( "#accidente" ).validate({
                rules: {
                    Acx_Desc: {
                        required: true, 
                        minlength: 4,
                        maxlength: 150
                    }, 
                }  
        });    
        
    });
    </script>
    
    @endsection




