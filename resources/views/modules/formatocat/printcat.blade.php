@extends(
"layouts.admin"
)

@section(
    "name"
)
    <h1 class="text-primary"> Imprimir formato cat</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("home") }}"><i class="fa fa-dashboard"></i> Reporte</a></li>
     

@endsection


@section(
    "app"
)
<div class="box">
    <div class="box-header">
      <h3 class="box-title text"> Documento seguro Cat </h3>
      <div class="pull-right">
        <a href="#" class="btn btn-danger" id="btn-printCat"> <i class="fa fa-print"></i>Imprimir Documento</a>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" >
        <div id="printCat"  class="printCat">
            @include("modules.formatocat.formato")
        </div>
         
    </div>

    
 
  </div>
@endsection



@section(
    "js"
)
 
@section("js")
<script> 
 

$(function() {
    $("#btn-printCat").click(function (e) { 

        Swal.fire({
            title: '<strong>Imprimir documento</strong>',
            icon: 'info',
            html:
                'Estas seguro que desea imprimir, ' +
                '<strong> Se registrara como una copia </strong>  ' ,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                '<i class="fa fa-print"></i> Great!',
            confirmButtonAriaLabel: 'Imprimir',
            cancelButtonText:
                '<i class="fa fa-xmark"></i>',
            cancelButtonAriaLabel: 'Thumbs down'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({ 
                    type: "POST",
                    url: "{{ route('duplicadoajax') }}",
                    data: { Prx_Id : "{{ $PrxGet->Prx_Id }}" },
                    beforeSend: function(){
                        $("#preload").fadeIn();
                },
                success: function(response) {
                    $("#printCat").print({
                        addGlobalStyles : true,
                        stylesheet : null,
                        rejectWindow : true,
                        noPrintSelector : ".no-print",
                        iframe : true,
                        append : null,
                        prepend : null
                    });  
                    $("#preload").fadeOut();
                }
                }); 
            } else if (result.isDenied) {
                 
            }
        })
        


    }); 
});

 
    
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
        
     
        
         
   
</script>

@endsection