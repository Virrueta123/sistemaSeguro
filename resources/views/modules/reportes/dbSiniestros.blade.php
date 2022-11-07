@extends('layouts.admin')

@section('name')
    <h1 class="text-primary"> Db siniestros</h1>

@endsection

@section('history')

    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Reporte</a></li>


@endsection


@section('app')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title text">Elige entre 2 fechas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form id="clase" role="form" method="POST" action="{{ route('Reporte.dbSiniestrosBetweenDate') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Dos Fechas</label>
                            <input name="betweenDate" value="" id="betweenDate" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="box-footer btn-search" style="display: none;">
                    <button type="submit" class="btn btn-primary btn-submit"> <i class="fa fa-search"></i> Buscar
                        Fechas</button>
                </div>
            </form>
        </div>


        <!-- /.box-body -->
    </div>
@endsection



@section('js')

@section('js')
    <script>
        $(function() {

            $('#betweenDate').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('#betweenDate').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                    'DD/MM/YYYY'));
                $(".btn-search").fadeIn();
            });

            $('#betweenDate').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                $(".btn-search").fadeOut();
            });

        });
    </script>

@endsection
