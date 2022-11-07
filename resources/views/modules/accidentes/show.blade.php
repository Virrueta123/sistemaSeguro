@extends('layouts.admin')

@section('name')
    <h1 class="text-primary"> Accidente</h1>

@endsection

@section('history')

    <li><a href="{{ route('Propietario.index') }}"><i class="fa fa-dashboard"></i> Propietarios</a></li>
    <li class="active">Tabla de registro</li>

@endsection


@section('app')

    <div class="box box-info collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Datos del conductor</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="display: none;">

            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nro Cat</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_NroCat }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Dni</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Dni }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Nombre</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Nombre }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Celular</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Contacto }}</p>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Vigencia</b>
                            @if ($Prx->Prx_VigenciaF <= Carbon\Carbon::now()->format('Y-m-d'))
                                <small class="text-danger">vencido</small>
                            @else
                                <small class="text-success">Activo</small>
                            @endif

                            @if ($Prx->Prx_VigenciaF <= Carbon\Carbon::now()->format('Y-m-d'))
                                <p class="pull-right text-danger">
                                    Inicio {{ Carbon\Carbon::parse($Prx->Prx_VigenciaI)->format('d/m/Y') }} - vence
                                    {{ Carbon\Carbon::parse($Prx->Prx_VigenciaF)->format('d/m/Y') }}
                                </p>
                            @else
                                <p class="pull-right text-success">
                                    Inicio {{ Carbon\Carbon::parse($Prx->Prx_VigenciaI)->format('d/m/Y') }} - vence
                                    {{ Carbon\Carbon::parse($Prx->Prx_VigenciaF)->format('d/m/Y') }}
                                </p>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>Ubigeo</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Ubigeo }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Apellido</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Apellido }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Direccion</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Direccion }}</p>
                        </li>
                    </ul>
                </div>
            </div>

            <h3 class="profile-username text-center">Datos del Vehiculo</h3>

            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nro Placa</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_NroPlaca }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Modelo</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Modelo }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Numero de Asientos</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_NroAsientos }} Asientos</p>
                        </li>
                        <li class="list-group-item">
                            <b>Año</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Ano }}</p>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nro Serie</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_NroSerie }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Marca</b>
                            <p class="pull-right text-info">{{ $Prx->Prx_Marca }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Uso Vehicular</b>
                            <p class="pull-right text-info">{{ $Prx->Uvx_Nombre }}</p>
                        </li>
                        <li class="list-group-item">
                            <b>Clase Vehicular</b>
                            <p class="pull-right text-info">{{ $Prx->Csx_Nombre }}</p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>






    @if (!$Acx)
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Descripcion Accidente</h3>
            </div>
            <div class="box-body">
                <form id="accidente" role="form" method="POST" action="{{ route('Accidente.store', $Prx->Prx_Id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input name="Acx_Desc" id="Acx_Desc" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lugar del Accidente</label>
                                <input name="Acx_Lugar" id="Acx_Lugar" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Direccion del Accidente</label>
                                <input name="Acx_Direccion" id="Acx_Direccion" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-submit">Registrar</button>
                    </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
    @else
        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
                <h3 class="profile-username text-center">Accidente Nº {{ $Acx->Acx_Nro }} </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">

                <form id="accidente" role="form" method="POST"
                    action="{{ route('Accidente.update', $Acx->Acx_Id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input name="Acx_Desc" id="Acx_Desc" value="{{ $Acx->Acx_Desc }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Lugar del Accidente</label>
                                <input name="Acx_Lugar" id="Acx_Lugar" value="{{ $Acx->Acx_Lugar }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Direccion del Accidente</label>
                                <input name="Acx_Direccion" id="Acx_Direccion" value="{{ $Acx->Acx_Direccion }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                        </div>

                    </div>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>Gastos Médicos</h3>
                                <label>Beneficios Pagados</label>
                                <input name="BeneficiosPagadosGm" id="BeneficiosPagadosGm"
                                    data-type="BeneficiosPagadosGm" value="{{ moneyformat($Acx->BeneficiosPagadosGm) }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>-</h3>
                                <label>Reclamo Pendiente de Pago</label>
                                <input name="ReclamoPendientedePagoGm" id="ReclamoPendientedePagoGm"
                                    data-type="ReclamoPendientedePagoGm"
                                    value="{{ moneyformat($Acx->ReclamoPendientedePagoGm) }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>Incapacidad Temporal</h3>
                                <label>Beneficios Pagados</label>
                                <input name="BeneficiosPagadosIt" id="BeneficiosPagadosIt"
                                    data-type="BeneficiosPagadosIt" value="{{ moneyformat($Acx->BeneficiosPagadosIt) }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>-</h3>
                                <label>Reclamo Pendiente de Pago</label>
                                <input name="ReclamoPendientedePagoIt" id="ReclamoPendientedePagoIt"
                                    data-type="ReclamoPendientedePagoIt"
                                    value="{{ moneyformat($Acx->ReclamoPendientedePagoIt) }}" class="form-control">
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>Invalidez Permanente</h3>
                                <label>Beneficios Pagados</label>
                                <input name="BeneficiosPagadosIp" id="BeneficiosPagadosIp"
                                    data-type="ReclamoPendientedePagoIp"
                                    value="{{ moneyformat($Acx->ReclamoPendientedePagoIp) }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>-</h3>
                                <label>Reclamo Pendiente de Pago</label>
                                <input name="ReclamoPendientedePagoIp" id="ReclamoPendientedePagoIp"
                                    data-type="ReclamoPendientedePagoIp"
                                    value="{{ moneyformat($Acx->ReclamoPendientedePagoIp) }}" class="form-control">
                            </div>
                        </div>



                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>Gastos de Sepelio</h3>
                                <label>Beneficios Pagados</label>
                                <input name="BeneficiosPagadosGs" id="BeneficiosPagadosGs"
                                    data-type="BeneficiosPagadosGs" value="{{ moneyformat($Acx->BeneficiosPagadosGs) }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>-</h3>
                                <label>Reclamo Pendiente de Pago</label>
                                <input name="ReclamoPendientedePagoGs" id="ReclamoPendientedePagoGs"
                                    data-type="ReclamoPendientedePagoGs"
                                    value="{{ moneyformat($Acx->ReclamoPendientedePagoGs) }}" class="form-control">
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <h3>Indemnización por Muerte</h3>
                                <label>Beneficios Pagados</label>
                                <input name="BeneficiosPagadosIdm" id="BeneficiosPagadosIdm"
                                    data-type="BeneficiosPagadosIdm"
                                    value="{{ moneyformat($Acx->BeneficiosPagadosIdm) }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <h3>-</h3>
                                <label>Reclamo Pendiente de Pago</label>
                                <input name="ReclamoPendientedePagoIdm" id="ReclamoPendientedePagoIdm"
                                    data-type="ReclamoPendientedePagoIdm"
                                    value="{{ moneyformat($Acx->ReclamoPendientedePagoIdm) }}" class="form-control">
                            </div>
                        </div>



                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-submit"> <i class="fa fa-file-edit"></i>
                            Editar</button>
                    </div>

                </form>

            </div>
        </div>



        <div class="box-body">
            <div class="row m-2">
                <div class="col-sm-6 ">
                    <a href="{{ route('Afectado.create', $Acx->Acx_Id) }}" class="btn  btn-dropbox">
                        <i class="fa fa-add"> </i> agregar a personas afectadas
                    </a>
                </div>
            </div>

        </div>


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabla de registros</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table id="cat" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center">Nro</th>
                            <th class="text-center">Dni</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Celular</th>
                            <th class="text-center">Edad</th>
                            <th class="text-center">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        @forelse ($Afxs as $Afx)
                            <tr>
                                @php $count++; @endphp
                                <td>{{ $Acx->Acx_Nro }}.{{ $count }}</td>
                                <td>{{ $Afx->Afx_Dni }}</td>
                                <td>{{ $Afx->Afx_Nombre }}</td>
                                <td>{{ $Afx->Afx_Apellido }}</td>
                                <td>{{ $Afx->Afx_Cel }}</td>
                                <td>{{ edad($Afx->Afx_Nacimiento) }} años</td>
                                <td>
                                    <a href="{{ route('Afectado.edit', $Afx->Afx_id) }}">
                                        <i class="fa fa-edit text-cyan"></i>
                                    </a>

                                    <a class="btn  btn-xs p-0">
                                        <form method="POST" id="formdeleteafectadodelete{{ $Afx->Afx_id }}"
                                            action="{{ route('Afectado.delete', $Afx->Afx_id) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                onclick="FormDelete('afectadodelete{{ $Afx->Afx_id }}','estas seguro que seas eliminar al afectado : {{ $Afx->Afx_Nombre }}',event)"
                                                class="btn btn-danger btn-xs" Data-toggle="tooltip" title="Delete"><i
                                                    class="fa-solid fa-trash fa-1x"> </i></button>
                                        </form>
                                    </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <h4 class="text-center text-warning">Aun no se registro ningun afectado</h4>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                    <tfoot class="text-center">
                        <th class="text-center">Nro</th>
                        <th class="text-center">Dni</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellido</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Edad</th>
                        <th class="text-center">Operaciones</th>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>


    @endif


@endsection



@section('js')

@section('js')
    <script>
        $(document).ready(function() {

            currency("BeneficiosPagadosGm")
            currency("ReclamoPendientedePagoGm");
            currency("BeneficiosPagadosIt");
            currency("ReclamoPendientedePagoIt");
            currency("BeneficiosPagadosIp");
            currency("ReclamoPendientedePagoIp");
            currency("BeneficiosPagadosGs");
            currency("ReclamoPendientedePagoGs");
            currency("BeneficiosPagadosIdm");
            currency("ReclamoPendientedePagoIdm");

            $("#accidente").validate({
                rules: {
                    Acx_Desc: {
                        required: true,
                        minlength: 4,
                        maxlength: 150
                    },
                    Acx_Direccion: {
                        required: true,
                        minlength: 4,
                        maxlength: 150
                    },
                    Acx_Lugar: {
                        required: true,
                        minlength: 4,
                        maxlength: 150
                    }
                }
            });

        });
    </script>

@endsection
