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

    <li><a href="{{ route("Propietario.index") }}"><i class="fa fa-dashboard"></i> Clase vehicular</a></li>
    <li class="active">Tabla de registros</li>

@endsection


@section(
    "app"
)
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Tabla de registros</h3>
      <div class="pull-right">
        <a href="{{ route("clase.create") }}" class="btn btn-danger"> <i class="fa fa-user-plus"></i> Crear una clase Vehicular</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="clase" class="table table-bordered table-striped">
        <thead >
        <tr >
          <th class="text-center">Nombre</th>
          <th class="text-center">Costo Cat</th>
          <th class="text-center">Aporte extraordinario</th>
          <th class="text-center">Estado</th> 
          <th class="text-center"><i class="fa fa-cogs"></i></th>
        </tr>
        </thead>
        <tbody class="text-center">
         
        </tbody>
        <tfoot>
          <tr >
            <th class="text-center">Nombre</th>
            <th class="text-center">Costo Cat</th>
            <th class="text-center">Aporte extraordinario</th>
            <th class="text-center">Estado</th> 
            <th class="text-center"><i class="fa fa-cogs"></i></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection



@section(
    "js"
)
 
@section("js")
<script>
  $(function () {
    
    var table = $('#clase').DataTable({
      "order": [[ 0, "ASC" ]],
        language: { 
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" 
        }, 
        ajax: "{{ route("clase.data") }}",
        columns: [
            {data: 'Csx_Nombre', name: 'Nombres'}, 
            {data: 'Csx_MontoCat', name: 'Nombres'}, 
            {data: 'Csx_GananciaCat', name: 'Nombres'}, 
            {data: 'activo', name: 'Nombres'},
             {
                 data: 'action', 
                 name: 'action' 
             },
        ],
        dom: 'Bfrtip',
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }) 
  });
</script>

@endsection