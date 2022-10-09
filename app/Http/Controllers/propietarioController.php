<?php

namespace App\Http\Controllers;

use App\Models\propietario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class propietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("modules.propietario.index",[
             
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vigenciaI = Carbon::now()->format("d/m/Y");
        $vigenciaF = Carbon::now()->addYear(1)->addDay(-1)->format("d/m/Y");
       
        return view("modules.propietario.create",[
            "vigenciaI" => $vigenciaI,
            "vigenciaF" => $vigenciaF,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $vigenciaI = Carbon::now()->format("Y-m-d");
        $vigenciaF = Carbon::now()->addYear(1)->addDay(-1)->format("Y-m-d");
        $valid = $request->validate([ 
            "Prx_Nombre" =>"required",
            "Prx_Apellido" =>"required",
            "Prx_Dni" =>"required",
            "Prx_Contacto" =>"required",
            "Prx_Direccion" =>"required",
            "Prx_Ubigeo" =>"required",
            "Prx_NroPlaca" =>"required",
            "Prx_Categoria" =>"required",
            "Prx_Ano" =>"required",
            "Prx_Marca" =>"required",
            "Prx_NroAsientos" =>"required",
            "Prx_NroSerie" =>"required",
            "Prx_Modelo" =>"required",
            "Prx_Uso" =>"required"
        ]);
        $codigo = DB::select('SELECT GenerarCodigoCat() as codigo' )[0]->codigo;
         
      
        $valid["Prx_NroCat"] = $codigo;
        $valid["Prx_Contacto"] = str_replace(" ", "", $request->all()["Prx_Contacto"]);
        $valid["Prx_VigenciaI"] = $vigenciaI;
        $valid["Prx_VigenciaF"] = $vigenciaF;
        $Prx = propietario::create($valid);

        if( $Prx ){  
            session()->flash('successo', 'El registro se creo correctamente');
            return redirect()->route("Propietario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Propietario.index");
        } 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function data(Request $request){
        if ($request->ajax()) {
            $model = propietario::select("*") 
            ->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn("asociado",function($Data){  
                   return $Data->Prx_Nombre." ".$Data->Prx_Apellido; 
                })
                ->addColumn("estado",function($Data){  
                    if($Data->activo == "A"){
                        return "Activo"; 
                    }else{
                        return "Inactivo";
                    }  
                }) 
                ->addColumn('action', function($Data){
                    $msm = "estas segur@ que desea elminar este cliente";
                    $actionBtn = '
                    <a href="#"><i class="fa fa-edit fa-2x"></i> </a>
                    <a href="'.route("Accidente.show",$Data->Prx_Id).'"><i class="fas fa-car-crash text-warning fa-2x"></i> </a>
                    ';
                    return $actionBtn;
                }) 
                ->rawColumns(['action']) 
                ->make(true);
         }  
    }
}
