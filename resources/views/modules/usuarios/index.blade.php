@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary"> Usuario</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("Usuario.index") }}"><i class="fa fa-dashboard"></i> Usuario </a></li>
    <li class="active">Tabla de registro</li>

@endsection


@section(
    "app"
)
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Tabla de Usuarios</h3>
      <div class="pull-right">
        <a href="{{ route("Usuario.create") }}" class="btn btn-danger"> <i class="fa fa-user-plus"></i> Crear usuario</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="cat" class="table table-bordered table-striped">
        <thead class="bg-info">
        <tr >
          <th class="text-center">Nombre de usuario</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Apellido</th>
          <th class="text-center">Celular</th>
          <th class="text-center">Estado</th> 
          <th class="text-center">Operaciones</th> 
        </tr>
        </thead>
        <tbody class="text-center">
         
        </tbody>
        <tfoot class="bg-info">
            <th class="text-center">Nombre de usuario</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Apellido</th>
            <th class="text-center">Celular</th>
            <th class="text-center">Estado</th> 
            <th class="text-center">Operaciones</th> 
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
        ajax: "{{ route("Usuario.data") }}",
        columns: [
            {data: 'username', name: 'Nombres'},  
            {data: 'name', name: 'Nombres'},  
            {data: 'lastname', name: 'Nombres'},  
            {data: 'cel', name: 'Nombres'}, 
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