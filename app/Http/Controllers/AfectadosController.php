<?php

namespace App\Http\Controllers;

use App\Models\accidentes;
use App\Models\afectados;
use App\Models\propietario;
use Illuminate\Http\Request;

class AfectadosController extends Controller
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
            "Afx_Nacimiento" => "required",
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
    public function edit($Afx_Id)
    {
        $Afx = afectados::where("Afx_id",$Afx_Id)->first();
        return view("modules.afectados.edit",[
            "Afx" => $Afx
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\afectados  $afectados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Afx_Id)
    {
        $valid = $request->validate([ 
            "Afx_Nombre" => "required",
            "Afx_Apellido" => "required",
            "Afx_Dni" => "required",
            "Afx_Cel" => "required",
            "Afx_Nacimiento" => "required",
        ]); 
        
        $Afx = afectados::where("Afx_id",$Afx_Id);
        
        $update = $Afx->update($valid);
 
        $Acxget =  accidentes::where("Acx_id",$Afx->first()->Acx_Id)->first();
   
        if( $update ){  
            session()->flash('successo', 'El registro se edito correctamente');
            return redirect()->route("Accidente.show",$Acxget->Prx_Id);
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Accidente.show",$Acxget->Prx_Id);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\afectados  $afectados
     * @return \Illuminate\Http\Response
     */
    public function destroy( $Afx_Id )
    {
        $Afx = afectados::where("Afx_id",$Afx_Id)->first();
        $Acx = accidentes::where("Acx_Id",$Afx->Acx_Id)->first();
     
        $delete = afectados::where("Afx_id",$Afx_Id)->delete();

        if( $delete ){  
            session()->flash('successo', 'El registro se elimino correctamente');
            return redirect()->route("Accidente.show",$Acx->Prx_Id);
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Accidente.show",$Acx->Prx_Id);
        } 
    }
}
