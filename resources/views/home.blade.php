@extends('layouts.admin')

@section(
    "name"
)
    <h1 class="text-primary">Inicio</h1>
    
@endsection

@section(
    "history"
)

    <li><a href="{{ route("home") }}"><i class="fa fa-book"></i> home</a></li>
    

@endsection

@section('app')
<div class="container">
   <div class="row">
      
      <!-- /.col -->
      <div class=" col-sm-4 ">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa-solid fa-file-circle-xmark"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Seguro Vencidos</span>
            <span class="info-box-number">{{ count($segurosVencidos) }}</span>
            <span class="info-box-number"><a href="{{ route("Reporte.vencidos") }}" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> ver mas</a>  </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    

      <div class=" col-sm-4 ">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa-sharp fa-solid fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Numero de Seguros</span>
            <span class="info-box-number">{{ count($nseguros) }}</span>
            <span class="info-box-number"><a href="{{ route("Propietario.index") }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> ver mas</a>  </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
     
      <div class=" col-sm-4 ">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-car-crash"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">SINIESTROS ATENDIDOS</span>
            <span class="info-box-number">{{ count($accidentes) }}</span>
            <span class="info-box-number"><a href="{{ route("Reporte.siniestros") }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> ver mas</a>  </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
</div>

<div class="box box-info">
   <div class="box-header with-border">
   <h3 class="box-title">Reporte de los seguros por vencer</h3>
   <div class="box-tools pull-right">
   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
   </button>
   <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
   </div>
   </div>
   <div class="box-body ">
      <div class="row">
         <div class="col-12">
            <div id="main" style="width: 100%;height:400px;"></div>
         </div>
      </div>
   </div>
</div>
   </div>
   
   </div>
@endsection

@section('js')
    <script>

      
  $(function () {
    "use strict";

    
    var myChart = echarts.init(document.getElementById('main'));


    window.addEventListener('resize',function(){
      myChart.resize();
    })
// Config
var option = {
  xAxis: {
    type: 'category',
    boundaryGap: false,
    data: {!! $legends !!},
    color:"#dd6b66"
  },
  tooltip: {
    trigger: 'axis'
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: {!! $data !!} ,
      type: 'line',
      areaStyle: {},
      color:"#dd6b66"
    }
  ]
};
// Use the option and data to display the chart
myChart.setOption(option);
// Click and jump to Baidu search website
myChart.on('click', function(params) {
   var route = "{{ route('Reporte.diavencidos',22) }}";
   var url = route.replace('22', params.name);
   
  window.open(
       url
  );
});
 
  });

    </script>
@endsection