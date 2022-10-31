 
<table class="table" border="1" >
    <thead> 
        <tr >
            <th colspan="22" style="font-size:22px; margin:6px; background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;"> <h1>Padron Sunat de las fechas : {{ \Carbon\Carbon::parse($fechaI)->format("d/m/Y") }} hasta {{ \Carbon\Carbon::parse($fechaF)->format("d/m/Y") }}</h1></th>
        </tr>
    <tr > 
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">RUC DEL INFORMANTE</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">TIPO DE DOCUMENTO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">RUC/DNI</th>  
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">APELLIDO PATERNO</th>  
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">APELLIDO MATERNO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">NOMBRES</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">RAZON SOCIAL</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">MARCA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">AÑO DE FABRICACION</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">PLACA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">USO VEHICULO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">N° DE ASIENTOS</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">MODELO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">N° DE SERIE</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">PROVINCIA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">DEPARTAMENTO</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">DIRECCION</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">CELULAR</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">FECHA</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">N° DE POLIZA</th> 
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">PERIODO DE CAT</th>
        <th style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center; padding: 4px;">MONTO</th>
    </tr>
    </thead>
    <tbody>
    {{$total=0}}
    
    @foreach ($padronSunats as $padronSunat)
    <tr >
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">20603993579</td>
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

       
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{  explode(" ",$padronSunat->Prx_Apellido)[0] }}</td> 
         
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ explode(" ",$padronSunat->Prx_Apellido)[1] }}</td> 
       
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Nombre }}</td> 

        @if ( $padronSunat->Prx_Ruc =="nt" && $padronSunat->Prx_Razon =="nt" )
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">registro sin ruc</td> 
        @else 
            <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Razon }}</td> 
        @endif

        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Marca }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Ano }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_NroPlaca }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Uvx_Nombre }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Csx_Nombre }}</td>

        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_NroPlaca }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Modelo }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">SAN MARTIN</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">SAN MARTIN</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Direccion }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_Contacto }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_VigenciaI }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ $padronSunat->Prx_NroCat }}</td> 
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">{{ \Carbon\Carbon::parse($padronSunat->Prx_Vigencia)->format("Y") }}</td>
        <td style="border:3px solid rgb(0, 14, 76); text-align: center;">S/ {{ moneyformat($padronSunat->Csx_MontoCat + $padronSunat->Csx_GananciaCat) }}</td>
        {{ $total += $padronSunat->Csx_MontoCat + $padronSunat->Csx_GananciaCat }}
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="background-color: #0082FC; border:3px solid rgb(0, 14, 76); color:white; text-align: center;">S/ {{ moneyformat($total) }}</td>
    </tr>
    </tbody>
</table>