<table class="table" border="1">
    @php
        $th = 'background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;';
    @endphp
    <thead>
        <tr>
            <th colspan="3" style="font-size:22px; margin:6px; {{ $th }}">
                <h1>Db Siniestros : {{ \Carbon\Carbon::parse($fechaI)->format('d/m/Y') }} hasta
                    {{ \Carbon\Carbon::parse($fechaF)->format('d/m/Y') }}</h1>
            </th>
        </tr>
        <tr>


            <th style="{{ $th }}">
                TIPOS DE COBERTURAS
            </th>

            <th style="{{ $th }}">
                NUMERO DE SINIESTROS (N° de Casos)
            </th>

            <th style="{{ $th }}">
                MONTO PENDIENTES DE PAGOS
            </th>

        </tr>
    </thead>
    <tbody>

        @php
            $total = $ReclamoPendientedePagoIdm->sum('ReclamoPendientedePagoIdm') + $ReclamoPendientedePagoGs->sum('ReclamoPendientedePagoGs') + $ReclamoPendientedePagoIp->sum('ReclamoPendientedePagoIp') + $ReclamoPendientedePagoIt->sum('ReclamoPendientedePagoIt') + $ReclamoPendientedePagoGm->sum('ReclamoPendientedePagoGm');
            
            $cantidad = count($ReclamoPendientedePagoIdm) + count($ReclamoPendientedePagoGs) + count($ReclamoPendientedePagoIp) + count($ReclamoPendientedePagoIt) + count($ReclamoPendientedePagoGm);
        @endphp

        <tr>
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;"> FALLECIMIENTO</td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ count($ReclamoPendientedePagoIdm) }}
            </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ moneyformat($ReclamoPendientedePagoIdm->sum('ReclamoPendientedePagoIdm')) }}
            </td>
        </tr>

        <tr>
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;"> GASTOS SEPELIO </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ count($ReclamoPendientedePagoGs) }}
            </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ moneyformat($ReclamoPendientedePagoGs->sum('ReclamoPendientedePagoGs')) }}
            </td>
        </tr>

        <tr>
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;"> GASTOS MEDICOS </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ count($ReclamoPendientedePagoGm) }}
            </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ moneyformat($ReclamoPendientedePagoGm->sum('ReclamoPendientedePagoGm')) }}
            </td>
        </tr>

        <tr>
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">INCAPACIDAD PERMANENTE </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ count($ReclamoPendientedePagoIp) }}
            </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ moneyformat($ReclamoPendientedePagoIp->sum('ReclamoPendientedePagoIp')) }}
            </td>
        </tr>

        <tr>
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">INCAPACIDAD TEMPORAL </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ count($ReclamoPendientedePagoIt) }}
            </td>

            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">
                {{ moneyformat($ReclamoPendientedePagoIt->sum('ReclamoPendientedePagoIt')) }}
            </td>
        </tr>


    </tbody>
    <tfoot>
        <tr>

            <th style="{{ $th }}">
                TOTAL GENERAL
            </th>
            <th style="{{ $th }}">
                {{ moneyformat($cantidad) }}
            </th>

            <th style="{{ $th }}">
                {{ moneyformat($total) }}
            </th>

        </tr>
    </tfoot>
</table>
