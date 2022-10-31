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
      <h3 class="box-title">Todos los Siniestros atendidos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="cat" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">Nro Siniestro</th>
          <th class="text-center">Descripcion</th>
          <th class="text-center">Lugar</th>
          <th class="text-center">Direccion</th>
          <th class="text-center">Fecha</th>
          <th class="text-center">Operaciones</th>
        </tr>
        </thead>
        <tbody class="text-center">
         
        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">Nro Siniestro</th>
            <th class="text-center">Descripcion</th>
            <th class="text-center">Lugar</th>
            <th class="text-center">Direccion</th> 
            <th class="text-center">Fecha</th>
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
      "order": [[ 1, "DESC" ]],
        language: { 
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" 
        }, 
        ajax: "{{ route("Reporte.siniestros") }}",
        columns: [
            {data: 'Acx_Nro', name: 's'}, 
            {data: 'Acx_Desc', name: 'Nombres'},  
            {data: 'Acx_Lugar', name: 'Nombres'},  
            {data: 'Acx_Direccion', name: 'Nombres'},  
            {data: 'Acx_Created', name: 'Nombres'},
            
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