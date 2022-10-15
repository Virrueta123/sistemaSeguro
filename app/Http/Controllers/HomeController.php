<?php

namespace App\Http\Controllers;

use App\Models\accidentes;
use App\Models\Propietario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        // $pendientesDay = PedientesCalendar::select("*")
        //         ->join('cliente', 'cliente.Clx_Id', '=', 'pendientes.Clx_Id')
        //         ->where(DB::raw("DATE_ADD(pendientes.Pex_Fecha,interval -1 day)"),fecha_hoy()) 
        //         ->where("pendientes.active","A") 
        //         ->get(); 
        $accidentes = accidentes::all();

        $nseguros =  Propietario:: 
        where("activo","A") 
        ->get();
        $segurosVencidos = Propietario::
        where("Prx_VigenciaF","<",fecha_hoy())
        ->get();
        $dias = ["1","2","3","4","5","6"];
        $legends = [];
        $data = [];
        foreach ($dias as $dia) {
            $prxs = count(Propietario::
            where("Prx_VigenciaF","=",Carbon::now()->addDay($dia)->format("Y-m-d"))
            ->get());
            array_push($legends,Carbon::now()->addDay($dia)->format("d-m-Y"));
            array_push($data,$prxs);
        }
        
        return view('home',[
            "segurosVencidos" =>$segurosVencidos,
            "nseguros" =>$nseguros,
            "accidentes" =>$accidentes,
            "legends" =>json_encode($legends, JSON_NUMERIC_CHECK),
            "data" =>json_encode($data, JSON_NUMERIC_CHECK),
            
        ]);
    }

    public function vencidos(Request $request){
        if ($request->ajax()) {
            $model = Propietario::
            where("Prx_VigenciaF","<",fecha_hoy())
            ->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn("asociado",function($Data){  
                   return $Data->Prx_Nombre." ".$Data->Prx_Apellido; 
                })
                ->addColumn("estado",function($Data){  
                    if($Data->Prx_VigenciaF  >  Carbon::now()->format("Y-m-d") ){
                        return "Activo"; 
                    }else{
                        return "vencido";
                    }  
                }) 
                ->addColumn('action', function($Data){
                    $msm = "estas segur@ que desea elminar este cliente";
                    $actionBtn = '';
                        if (Auth::user()->tipo == "A") {
                            $actionBtn = '
                            <a href="'.route("Propietario.edit",$Data->Prx_Id).'"><i class="fa fa-edit fa-2x"></i> </a> 
                            ';
                        }
                    if($Data->Prx_VigenciaF  >  Carbon::now()->format("Y-m-d") ){
                        $actionBtn.= '<a href="'.route("Accidente.show",$Data->Prx_Id).'"><i class="fas fa-car-crash text-warning fa-2x"></i> </a>';
                    }  
                    return $actionBtn;
                }) 
                ->rawColumns(['action']) 
                ->make(true);
         }else{
            return view('modules.reportes.vencidos' );
         }
    }

    public function diavencidos(Request $request,$fecha){
            
            $fecha = Carbon::parse($fecha)->format("Y-m-d");
            
            if ($request->ajax()) {
                $model = Propietario::
                where("Prx_VigenciaF","=",$fecha)
                ->get();
                return DataTables::of($model)
                    ->addIndexColumn()
                    ->addColumn("asociado",function($Data){  
                       return $Data->Prx_Nombre." ".$Data->Prx_Apellido; 
                    })
                    ->addColumn("estado",function($Data){  
                        if($Data->Prx_VigenciaF  >  Carbon::now()->format("Y-m-d") ){
                            return "Activo"; 
                        }else{
                            return "vencido";
                        }  
                    }) 
                    ->addColumn('action', function($Data){
                        $msm = "estas segur@ que desea elminar este cliente";
                        $actionBtn = '';
                        if (Auth::user()->tipo == "A") {
                            $actionBtn = '
                            <a href="'.route("Propietario.edit",$Data->Prx_Id).'"><i class="fa fa-edit fa-2x"></i> </a> 
                            ';
                        }
                        
                        if($Data->Prx_VigenciaF  >  Carbon::now()->format("Y-m-d") ){
                            $actionBtn.= '<a href="'.route("Accidente.show",$Data->Prx_Id).'"><i class="fas fa-car-crash text-warning fa-2x"></i> </a>';
                        }  
                        return $actionBtn;
                    }) 
                    ->rawColumns(['action']) 
                    ->make(true);
             }else{
                return view('modules.reportes.diavencer', [
                    "fecha" => $fecha ]
                 );
             }
          
    }

    public function siniestro(Request $request){
             
            
            if ($request->ajax()) {

                $model = accidentes::all();

                return DataTables::of($model)
                    ->addIndexColumn() 
                    ->addColumn('action', function($Data){
                         
                        $actionBtn = '
                        <a href="'.route("Accidente.show",$Data->Prx_Id).'"><i class="fa fa-eye fa-1x"></i> </a> 
                        ';
                         
                        return $actionBtn;
                    }) 
                    ->rawColumns(['action']) 
                    ->make(true);
             }else{
                return view('modules.reportes.siniestros');
             }
          
    }
}
