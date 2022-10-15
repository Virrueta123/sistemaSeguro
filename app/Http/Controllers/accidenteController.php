<?php

namespace App\Http\Controllers;

use App\Models\accidentes;
use App\Models\afectados;
use App\Models\Propietario;
use Illuminate\Http\Request;

class accidenteController extends Controller
{
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
        $Prx = Propietario::where("Prx_Id",$id)->first();
        if ($Acx) {
            $Afxs = afectados::where("Acx_Id",$Acx->Acx_Id)->get();
        }else{
            $Afxs = [];
        } 
        return view("modules.accidentes.show",[ 
            "Prx" => $Prx,"Acx" => $Acx,"Afxs" => $Afxs
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
}
