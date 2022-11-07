<table class="table" border="1">
    @php
        $th = 'background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;';
    @endphp
    <thead>
        <tr>
            <th colspan="22" style="font-size:22px; margin:6px; {{ $th }}">
                <h1>Db Siniestros : {{ \Carbon\Carbon::parse($fechaI)->format('d/m/Y') }} hasta
                    {{ \Carbon\Carbon::parse($fechaF)->format('d/m/Y') }}</h1>
            </th>
        </tr>
        <tr>


            <th colspan="1" rowspan="2" style="{{ $th }}">
                Número del CAT
            </th>

            <th colspan="2" rowspan="2" style="{{ $th }}">
                Placa
            </th>

            <th colspan="3" rowspan="2" style="{{ $th }}">
                Código del Accidente
            </th>

            <th colspan="4" rowspan="2" style="{{ $th }}">
                Código del Siniestro
            </th>

            <th colspan="5" rowspan="2" style="{{ $th }}">
                Zona Geográfica
            </th>

            <th colspan="6" rowspan="2" style="{{ $th }}">
                Fecha de Ocurrencia
            </th>

            <th colspan="7" rowspan="2" style="{{ $th }}">
                Fecha de Notificación a la AFOCAT
            </th>

            <th colspan="8" rowspan="2" style="{{ $th }}">
                Nombre de Accidentado
            </th>



            <th colspan="2" style="{{ $th }}">
                Gastos Médicos
            </th>

            <th colspan="2" style="{{ $th }}">
                Incapacidad Temporal
            </th>

            <th colspan="2" style="{{ $th }}">
                Invalidez Permanente
            </th>

            <th colspan="2" style="{{ $th }}">
                Gastos de Sepelio
            </th>

            <th colspan="2" style="{{ $th }}">
                Indemnización por Muerte
            </th>

            <th rowspan="2" style="{{ $th }}">
                Beneficios Pgados Total
            </th>

            <th rowspan="2" style="{{ $th }}">
                Beneficios Pendientes de Pago Total
            </th>

            <th rowspan="2" style="{{ $th }}">
                Costo Siniestro Total
            </th>
        </tr>

        <tr>

            <th style="{{ $th }}">
                Beneficios Pagados
            </th>
            <th style="{{ $th }}">
                Reclamo Pendiente de Pago
            </th>

            <th style="{{ $th }}">
                Beneficios Pagados
            </th>
            <th style="{{ $th }}">
                Reclamo Pendiente de Pago
            </th>

            <th style="{{ $th }}">
                Beneficios Pagados
            </th>
            <th style="{{ $th }}">
                Reclamo Pendiente de Pago
            </th>

            <th style="{{ $th }}">
                Beneficios Pagados
            </th>
            <th style="{{ $th }}">
                Reclamo Pendiente de Pago
            </th>


            <th style="{{ $th }}">
                Beneficios Pagados
            </th>
            <th style="{{ $th }}">
                Reclamo Pendiente de Pago
            </th>


        </tr>
    </thead>
    <tbody>
        @php
            $BeneficiosPagadosGm = 0;
            $ReclamoPendientedePagoGm = 0;
            $BeneficiosPagadosIt = 0;
            $ReclamoPendientedePagoIt = 0;
            $BeneficiosPagadosIp = 0;
            $ReclamoPendientedePagoIp = 0;
            $BeneficiosPagadosGs = 0;
            $ReclamoPendientedePagoGs = 0;
            $BeneficiosPagadosIdm = 0;
            $ReclamoPendientedePagoIdm = 0;
            
            $BeneficiosPgadosTotalc = 0;
            
            $BeneficiosPendientesdePagoTotalc = 0;
            
            $CostoSiniestroTotalc = 0;
        @endphp
        @foreach ($dbss as $dbs)
            @php
                $BeneficiosPgadosTotal = $dbs->BeneficiosPagadosGm + $dbs->BeneficiosPagadosIt + $dbs->BeneficiosPagadosIp + $dbs->BeneficiosPagadosGs + $dbs->BeneficiosPagadosIdm;
                
                $BeneficiosPendientesdePagoTotal = $dbs->ReclamoPendientedePagoGm + $dbs->ReclamoPendientedePagoIt + $dbs->ReclamoPendientedePagoIp + $dbs->ReclamoPendientedePagoGs + $dbs->ReclamoPendientedePagoIdm;
                
                $CostoSiniestroTotal = $BeneficiosPgadosTotal + $BeneficiosPendientesdePagoTotal;
                
                $BeneficiosPgadosTotalc += $BeneficiosPgadosTotal;
                
                $BeneficiosPendientesdePagoTotalc += $BeneficiosPendientesdePagoTotal;
                
                $CostoSiniestroTotalc += $CostoSiniestroTotal;
                
                $BeneficiosPagadosGm += $dbs->BeneficiosPagadosGm;
                $ReclamoPendientedePagoGm += $dbs->ReclamoPendientedePagoGm;
                $BeneficiosPagadosIt += $dbs->BeneficiosPagadosIt;
                $ReclamoPendientedePagoIt += $dbs->ReclamoPendientedePagoIt;
                $BeneficiosPagadosIp += $dbs->BeneficiosPagadosIp;
                $ReclamoPendientedePagoIp += $dbs->ReclamoPendientedePagoIp;
                $BeneficiosPagadosGs += $dbs->BeneficiosPagadosGs;
                $ReclamoPendientedePagoGs += $dbs->ReclamoPendientedePagoGs;
                $BeneficiosPagadosIdm += $dbs->BeneficiosPagadosIdm;
                $ReclamoPendientedePagoIdm += $dbs->ReclamoPendientedePagoIdm;
                
            @endphp




            <tr>
                <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $dbs->Prx_NroCat }}</td>

                <td colspan="2" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ $dbs->Prx_NroPlaca }}</td>

                <td colspan="3"style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $dbs->Acx_Nro }} -
                    {{ \Carbon\Carbon::parse($dbs->Acx_Created)->format('Y') }}
                </td>

                <td colspan="4" style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $dbs->afectados }}
                </td>
                <td colspan="5" style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $dbs->Acx_Lugar }}
                </td>
                <td colspan="6" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ \Carbon\Carbon::parse($dbs->Acx_Created)->format('d/m/Y') }}
                </td>

                <td colspan="7" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ \Carbon\Carbon::parse($dbs->Prx_VigenciaF)->format('d/m/Y') }}
                </td>
                @if ($dbs->Prx_Ruc == 'nt' && $dbs->Prx_Razon == 'nt')
                    <td colspan="8" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                        {{ $dbs->Prx_Nombre }}
                        {{ $dbs->Prx_Apellido }}</td>
                @else
                    <td colspan="8" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                        {{ $dbs->Prx_Razon }}</td>
                @endif

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->BeneficiosPagadosGm) }}</td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->ReclamoPendientedePagoGm) }}</td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->BeneficiosPagadosIt) }}</td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->ReclamoPendientedePagoIt) }}</td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->BeneficiosPagadosIp) }}</td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->ReclamoPendientedePagoIp) }}</td>

                <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->BeneficiosPagadosGs) }}</td>
                <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->ReclamoPendientedePagoGs) }}</td>

                <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->BeneficiosPagadosIdm) }}</td>
                <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($dbs->ReclamoPendientedePagoIdm) }}
                </td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($BeneficiosPgadosTotal) }}
                </td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($BeneficiosPendientesdePagoTotal) }}
                </td>

                <td colspan="1" style="border:3px solid rgb(0, 14, 76); text-align: center;">
                    {{ moneyformat($CostoSiniestroTotal) }}
                </td>
            </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th colspan="36">

            </th>

            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPagadosGm) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($ReclamoPendientedePagoGm) }}
            </th>

            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPagadosIt) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($ReclamoPendientedePagoIt) }}
            </th>

            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPagadosIp) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($ReclamoPendientedePagoIp) }}
            </th>

            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPagadosGs) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($ReclamoPendientedePagoGs) }}
            </th>

            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPagadosIdm) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($ReclamoPendientedePagoIdm) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPgadosTotalc) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($BeneficiosPendientesdePagoTotalc) }}
            </th>
            <th colspan="1" style="{{ $th }}">
                S/. {{ moneyformat($CostoSiniestroTotalc) }}
            </th>


        </tr>
    </tfoot>
</table>
