@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary"> propietario</h1>
    
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
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Tabla de registros</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="cat" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nº Cat</th>
          <th>Nº Placa</th>
          <th>F-inicio</th>
          <th>F-Termino</th>
          <th>Asociado</th>
          <th>Clase Vehicular</th>
          <th>Estado</th> 
          <th>Operaciones</th>
        </tr>
        </thead>
        <tbody>
         
        </tbody>
        <tfoot>
         
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
    
    var table = $('#cat').DataTable({
      "order": [[ 0, "ASC" ]],
        language: { 
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" 
        }, 
        ajax: "{{ route("Propietario.data") }}",
        columns: [
            {data: 'Prx_NroCat', name: 'Nombres'},  
            {data: 'Prx_NroPlaca', name: 'Nombres'},  
            {data: 'Prx_VigenciaI', name: 'Nombres'},  
            {data: 'Prx_VigenciaF', name: 'Nombres'}, 
            {data: 'asociado', name: 'Nombres'}, 
            {data: 'Csx_Nombre', name: 'Nombres'}, 
            {data: 'estado', name: 'Nombres'}, 
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