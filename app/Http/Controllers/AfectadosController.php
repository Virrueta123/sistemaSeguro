<?php

namespace App\Http\Controllers;

use App\Models\accidentes;
use App\Models\afectados;
use App\Models\propietario;
use Illuminate\Http\Request;

class AfectadosController extends Controller
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
    public function create($Acx_Id)
    {
        return view("modules.afectados.create",[
            "Acx_Id" => $Acx_Id
        ]);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$Acx_Id)
    {
        
        $valid = $request->validate([ 
            "Afx_Nombre" =>"required",
            "Afx_Apellido" =>"required",
            "Afx_Dni" =>"required",
            "Afx_Cel" =>"required",
        ]);
        $valid["Acx_id"] = $Acx_Id;

        $Afx = afectados::create($valid);
        $Acxget =  accidentes::where("Acx_id",$Acx_Id)->first();
      
        if( $Afx ){  
            session()->flash('successo', 'El registro se creo correctamente');
            return redirect()->route("Accidente.show",$Acxget->Prx_Id);
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Accidente.show",$Acxget->Prx_Id);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\afectados  $afectados
     * @return \Illuminate\Http\Response
     */
    public function show(afectados $afectados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\afectados  $afectados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, afectados $afectados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\afectados  $afectados
     * @return \Illuminate\Http\Response
     */
    public function destroy(afectados $afectados)
    {
        //
    }
}
