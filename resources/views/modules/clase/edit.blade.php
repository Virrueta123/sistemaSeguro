
@extends(
    "layouts.admin"
    )
    
    @section(
        "name"
    )
        <h1 class="text-primary">Clases vehiculares</h1>
        
    @endsection
    
    @section(
        "history"
    )
    
        <li><a href="{{ route("clase.index") }}"><i class="fa fa-dashboard"></i> Clase vehicular</a></li>
        <li class="active">Editar</li>
    
    @endsection
    
    
    @section(
        "app"
    )
    <!-- /.box-header --> 
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario para Editar registro</h3>
        </div> 
        <div class="box-body">
          <form id="clase" role="form" method="POST" action="{{ route("clase.update",$Csx->Csx_Id) }}">
            @csrf
            @method("PATCH")
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nombre de la clase vehicular</label>
                        <input  name="Csx_Nombre" value="{{ $Csx->Csx_Nombre }}" id="Acx_Desc" class="form-control" >
                    </div>   
                </div> 
            </div> 
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Costo Cat </label>
    
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa-solid fa-money-bill-wave"></i>
                      </div>
                      <input type="text" name="Csx_MontoCat" value="{{ $Csx->Csx_MontoCat }}"  id="Csx_MontoCat" class="form-control" data-type="Csx_MontoCat" >
                    </div>
                    <!-- /.input group -->
                  </div>
            </div> 
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Aporte extraordinario</label>
    
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa-solid fa-piggy-bank"></i>
                      </div>
                      <input type="text" name="Csx_GananciaCat" value="{{ $Csx->Csx_GananciaCat }}"  id="Csx_GananciaCat" class="form-control" data-type="Csx_GananciaCat" >
                    </div>
                    <!-- /.input group -->
                  </div>
            </div>
            
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-submit">Registrar</button>
            </div>
    
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    @endsection
    
    
    
    @section(
        "js"
    )
     
    @section("js")
    <script>

      currency("Csx_MontoCat");
      currency("Csx_GananciaCat");

      $( "#clase" ).validate({
            rules: {
                Csx_Nombre: {
                    required: true, 
                    minlength: 4,
                    maxlength: 149
                },
                Csx_MontoCat: {
                    required: true
                },
                Csx_GananciaCat: {
                    required: true
                }
            }  
      });

    </script>
    
    @endsection
 