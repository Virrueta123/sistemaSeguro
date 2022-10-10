@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary"> Reporte</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("home") }}"><i class="fa fa-dashboard"></i> Home</a></li>
     

@endsection


@section(
    "app"
)
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Todos los seguros vencidos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="cat" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">Nº Cat</th>
          <th class="text-center">Nº Placa</th>
          <th class="text-center">F-inicio</th>
          <th class="text-center">F-Termino</th>
          <th class="text-center">Asociado</th>
          <th class="text-center">Clase Vehicular</th>
          <th class="text-center">Estado</th> 
          <th class="text-center">Operaciones</th>
        </tr>
        </thead>
        <tbody class="text-center">
         
        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">Nº Cat</th>
            <th class="text-center">Nº Placa</th>
            <th class="text-center">F-inicio</th>
            <th class="text-center">F-Termino</th>
            <th class="text-center">Asociado</th>
            <th class="text-center">Clase Vehicular</th>
            <th class="text-center">Estado</th> 
            <th class="text-center">Operaciones</th>
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
    
    var table = $('#cat').DataTable({
      "order": [[ 0, "ASC" ]],
        language: { 
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" 
        }, 
        ajax: "{{ route("Reporte.vencidos") }}",
        columns: [
            {data: 'Prx_NroCat', name: 'Nombres'},  
            {data: 'Prx_NroPlaca', name: 'Nombres'},  
            {data: 'Prx_VigenciaI', name: 'Nombres'},  
            {data: 'Prx_VigenciaF', name: 'Nombres'}, 
            {data: 'asociado', name: 'Nombres'}, 
            {data: 'Prx_Categoria', name: 'Nombres'}, 
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