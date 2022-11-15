<?php

namespace App\Http\Controllers;

use App\Models\accidentes;
use App\Models\afectados;
use App\Models\propietario;
use Illuminate\Http\Request;

class accidenteController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$Prx_Id)
    {

        $valid = $request->validate([ 
            "Acx_Desc" =>"required",
            "Acx_Lugar" =>"required",
            "Acx_Direccion" =>"required",
        ]);

        $valid["Prx_Id"] = $Prx_Id;
        $valid["Acx_Created"] = fecha_hoy();
                 
        $valid["Acx_Nro"] = accidentes::all()->count() == 0 ? 1 : accidentes::max('Acx_Nro') + 1;

        $Acx = accidentes::create($valid);

        if( $Acx ){  
            session()->flash('successo', 'El registro se creo correctamente');
            return redirect()->route("Accidente.show",$Prx_Id);
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Accidente.show",$Prx_Id);
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
        
        $Acx = accidentes::where("Prx_Id",$id)->first();
        $Prx = propietario::select("*")
        ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
        ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
        ->where("Prx_Id",$id)
        ->first();

        if ($Acx) {
            $Afxs = afectados::where("Acx_Id",$Acx->Acx_Id)->get();
        }else{
            $Afxs = [];
        } 
        $count = 0;
        
        return view("modules.accidentes.show",[ 
            "Prx" => $Prx,"Acx" => $Acx,"Afxs" => $Afxs,"count" =>$count
        ]);
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
        $valid = $request->validate([ 
            "Acx_Desc" =>"required",
            "Acx_Lugar" =>"required",
            "Acx_Direccion" =>"required"
        ]);
        
        $valid["BeneficiosPagadosGm"] = convertmoney($request->all()["BeneficiosPagadosGm"]);
        $valid["ReclamoPendientedePagoGm"] = convertmoney($request->all()["ReclamoPendientedePagoGm"]);

        $valid["BeneficiosPagadosIt"] = convertmoney($request->all()["BeneficiosPagadosIt"]);
        $valid["ReclamoPendientedePagoIt"] = convertmoney($request->all()["ReclamoPendientedePagoIt"]);

        $valid["BeneficiosPagadosIp"] = convertmoney($request->all()["BeneficiosPagadosIp"]);
        $valid["ReclamoPendientedePagoIp"] = convertmoney($request->all()["ReclamoPendientedePagoIp"]);

        $valid["BeneficiosPagadosGs"] = convertmoney($request->all()["BeneficiosPagadosGs"]);
        $valid["ReclamoPendientedePagoGs"] = convertmoney($request->all()["ReclamoPendientedePagoGs"]);

        $valid["BeneficiosPagadosIdm"] = convertmoney($request->all()["BeneficiosPagadosIdm"]);
        $valid["ReclamoPendientedePagoIdm"] = convertmoney($request->all()["ReclamoPendientedePagoIdm"]);

        $Acx = accidentes::where("Acx_Id",$id);
        
        $update = $Acx->update($valid);
 
        $Acxget =  accidentes::where("Acx_Id",$id)->first();
      
        if( $update ){  
            session()->flash('successo', 'El registro se edito correctamente');
            return redirect()->route("Accidente.show",$Acxget->Prx_Id);
        }else{
            session()->flash('erroro', 'No se encontro ningun cambio');
            return redirect()->route("Accidente.show",$Acxget->Prx_Id);
        } 
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
}
