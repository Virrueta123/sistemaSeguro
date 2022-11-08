@extends('layouts.admin')

@section('name')
    <h1 class="text-primary"> Copias de seguridad de la base de datos</h1>

@endsection

@section('history')

    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Reporte</a></li>


@endsection


@section('app')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Todas las copias</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Nombre Archivo</th>
                            <th>Fecha</th>
                            <th class="text-success text-center">descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                            @php
                                $parte1 = explode('_', $file);
                                $parte2 = explode('.', $parte1[1]);
                                $url = explode('/', $parte1[0]);
                            @endphp
                            <tr>
                                <td class="text-success"> <i class="fa fa-database"></i>
                                    {{ $url[2] }}_{{ $parte1[1] }} </td>
                                <td class="text-info">{{ \Carbon\Carbon::parse($parte2[0])->format('d/m/Y') }}</td>
                                <td class="text-success text-center"><a href="{{ route('backupget', $parte2[0]) }}"> <i
                                            class="fa fa-download"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="{{ route('backupset') }}" class="btn btn-sm btn-info btn-flat pull-left">Crear una copia</a>
        </div>
        <!-- /.box-footer -->
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
