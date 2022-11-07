<?php

namespace App\Http\Controllers;

use App\Exports\exportBdsiniestros;
use App\Exports\ExportPadronSbs;
use App\Exports\exportReporteTotal;
use App\Exports\exportResumenPedientes;
use App\Exports\expPdxSunat;
use App\Http\Controllers\Controller;
use App\Models\accidentes;
use App\Models\Propietario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class padronController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function padronSunat(){
        return view("modules.reportes.padronSunat",[  
        ]);
    }
    public function padronSunatBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;

        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
        $Prx = Propietario::select("*")
            ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
            ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
            ->whereBetween('propietarios.Prx_VigenciaI', [$fechaI, $fechaF])->get();

        if ( count($Prx) == 0 )  {
            session()->flash('erroro', 'No hay ningun dato en esas fechas ');
            return redirect()->route("Reporte.padronSbs");
        } else {
            return Excel::download(new expPdxSunat($fechaI,$fechaF,$Prx), 'padroSunatF'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
        }
        
    }
    public function padronSbs(){
        return view("modules.reportes.padronSbs",[  
        ]);
    }
    public function padronSbsBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;

        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
         
        $Prx = Propietario::select("*")
            ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
            ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
            ->whereBetween('propietarios.Prx_VigenciaI', [$fechaI, $fechaF])->get();
        
        if ( count($Prx) == 0 ) {
            session()->flash('erroro', 'No hay ningun dato en esas fechas ');
            return redirect()->route("Reporte.padronSbs");
        } else {
            return Excel::download(new ExportPadronSbs($fechaI,$fechaF,$Prx), 'padroSbsF'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
        } 
        
    }

    /**-----------------------------**/
    /**--------------resumen pendientes---------------**/
    
    public function resumenPendiente(){
        return view("modules.reportes.resumenPendiente",[  
        ]);
    }
    public function resumenPendienteBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;

        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
         
        $Prx = Propietario::select("*")
            ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
            ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
            ->whereBetween('propietarios.Prx_VigenciaI', [$fechaI, $fechaF])->get();
        
        if ( count($Prx) == 0 ) {
            session()->flash('erroro', 'No hay ningun dato en esas fechas ');
            return redirect()->route("Reporte.padronSbs");
        } else {
            return Excel::download(new exportResumenPedientes($fechaI,$fechaF,$Prx), 'padroSbsF'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
        } 
        
    }
    
    /**----------End--------**/
    /**-----------------------------**/


    /**-----------------------------**/
    /**--------------db siniestros---------------**/
    
    public function dbSiniestros(){
        return view("modules.reportes.dbSiniestros",[  
        ]);
    }
    public function dbSiniestrosBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;

        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
         
        $Acx = accidentes::select(
        "Acx_Lugar",
        "Prx_Ruc",
        "Prx_NroCat",
        "Prx_VigenciaI",
        "Prx_VigenciaF",
        "Prx_Razon",
        "Prx_Nombre",
        "Prx_Apellido",
        "Prx_NroPlaca",
        "Acx_Direccion",
        "Acx_Desc",
        "Acx_Nro",
        "BeneficiosPagadosGm",
        "ReclamoPendientedePagoGm",
        "BeneficiosPagadosIt",
        "ReclamoPendientedePagoIt",
        "BeneficiosPagadosIp",
        "ReclamoPendientedePagoIp",
        "BeneficiosPagadosGs",
        "ReclamoPendientedePagoGs",
        "BeneficiosPagadosIdm",
        "ReclamoPendientedePagoIdm",
        DB::raw('count(afectados.Acx_Id) AS afectados'))
                ->join("propietarios","propietarios.Prx_Id","=","accidentes.Prx_Id") 
                ->leftjoin("afectados","afectados.Acx_Id","=","accidentes.Acx_Id") 
                ->groupBy('accidentes.Acx_Id') 
                ->whereBetween('Acx_Created', [$fechaI, $fechaF])->get();

        // DB::raw('count(afectados.Acx_Id) AS afectados'))
        if ( count($Acx) == 0 ) {
            session()->flash('erroro', 'No hay ningun dato en esas fechas ');
            return redirect()->route("Reporte.padronSbs");
        } else {
             return Excel::download(new exportBdsiniestros($fechaI,$fechaF,$Acx), 'Bdsiniestros'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
        } 
        
    }
    
    /**----------End--------**/
    /**-----------------------------**/

    /**-----------------------------**/
    /**--------------resumen total---------------**/
    
    public function resumenTotal(){
        return view("modules.reportes.resumenTotal",[  
        ]);
    }
    public function resumenTotalBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;

        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
         
        $ReclamoPendientedePagoGm= accidentes::select("*")
            ->where("ReclamoPendientedePagoGm",">",0)
            ->whereBetween('Acx_Created', [$fechaI, $fechaF])->get();

        $ReclamoPendientedePagoIt= accidentes::select("*")
            ->where("ReclamoPendientedePagoIt",">",0)
            ->whereBetween('Acx_Created', [$fechaI, $fechaF])->get();

        $ReclamoPendientedePagoIp= accidentes::select("*")
            ->where("ReclamoPendientedePagoIp",">",0)
            ->whereBetween('Acx_Created', [$fechaI, $fechaF])->get();

        $ReclamoPendientedePagoGs= accidentes::select("*")
            ->where("ReclamoPendientedePagoGs",">",0)
            ->whereBetween('Acx_Created', [$fechaI, $fechaF])->get();

        $ReclamoPendientedePagoIdm= accidentes::select("*")
            ->where("ReclamoPendientedePagoIdm",">",0)
            ->whereBetween('Acx_Created', [$fechaI, $fechaF])->get();  

       
            return Excel::download(new exportReporteTotal($fechaI,$fechaF,$ReclamoPendientedePagoGm,$ReclamoPendientedePagoIt,$ReclamoPendientedePagoIp,$ReclamoPendientedePagoGs,$ReclamoPendientedePagoIdm), 'resumenTotal'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
         
        
    }
    
    /**----------End--------**/
    /**-----------------------------**/
}
