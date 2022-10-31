 
<table class="table" border="1" >
    <thead> 
        <tr >
            <th colspan="22" style="font-size:22px; margin:6px; background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;"> <h1>Padron Sunat de las fechas : {{ \Carbon\Carbon::parse($fechaI)->format("d/m/Y") }} hasta {{ \Carbon\Carbon::parse($fechaF)->format("d/m/Y") }}</h1></th>
        </tr>
    <tr > 
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">N° DE POLIZA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">PERIODO DE CAT</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">FECHA</th>  
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">FECHA DE EMISION</th>  
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">FECHA DE VENCIMIENTO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">RAZÓN SOCIAL</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">TIPO DE DOCUMENTO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">RUC/DNI</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">PLACA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">PROVINCIA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">CATEGORIA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">USO VEHICULO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">CLASE</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">VALOR DEL CAT</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">APORTE DEL RIEZGO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">APORTE PARA GASTOS ADMINISTRATIVOS</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">APORTE EXTRAORDINARIO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">SITUACION</th> 
    </tr>
    </thead>
    <tbody>
    
    @php
        $total=0;
        $Ar=0;
        $Ag=0;
        $Ae=0;  
    @endphp
    @foreach ($padronSunats as $padronSunat)
    <tr >
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_NroCat }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ \Carbon\Carbon::parse($padronSunat->Prx_VigenciaI)->format("Y") }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_VigenciaI }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_VigenciaI }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_VigenciaF }}</td>

        @if ( $padronSunat->Prx_Ruc =="nt" && $padronSunat->Prx_Razon =="nt" )
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">registro sin ruc</td> 
        @else 
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Razon }}</td> 
        @endif

        @if ( $padronSunat->Prx_Ruc =="nt" && $padronSunat->Prx_Razon =="nt" )
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">Dni</td> 
        @else 
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">Ruc</td> 
        @endif 

        @if ( $padronSunat->Prx_Ruc =="nt" && $padronSunat->Prx_Razon =="nt" )
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Dni }}</td> 
        @else 
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Ruc }}</td> 
        @endif

        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_NroPlaca }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">SAN MARTIN</td> 
         
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">x2</td> 
       
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Uvx_Nombre }}</td> 
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Csx_Nombre }}</td>
 
        
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">S/ {{ moneyformat($padronSunat->Csx_MontoCat) }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">S/ {{ moneyformat(porcentaje($padronSunat->Csx_MontoCat,80)) }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">S/ {{ moneyformat(porcentaje($padronSunat->Csx_MontoCat,20)) }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">S/ {{  moneyformat($padronSunat->Csx_GananciaCat)  }}</td>
       
        @if ( $padronSunat->Prx_VigenciaF  >  \Carbon\Carbon::now()->format("Y-m-d"))
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">NUEVO</td>
        @else
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">VENCIDO</td>
        @endif
        @php
            $total += $padronSunat->Csx_MontoCat + $padronSunat->Csx_GananciaCat;
            $Ar += porcentaje($padronSunat->Csx_MontoCat,80);
            $Ag += porcentaje($padronSunat->Csx_MontoCat,20);
            $Ae += $padronSunat->Csx_GananciaCat;
        @endphp
     
    </tr>
    @endforeach
    <tr> 
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center;">S/ {{ moneyformat($total) }}</td>
        <td style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center;">S/ {{ moneyformat($Ar) }}</td>
        <td style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center;">S/ {{ moneyformat($Ag) }}</td>
        <td style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center;">S/ {{ moneyformat($Ae) }}</td>
        <td></td>
         
        
    </tr>
    </tbody>
</table>