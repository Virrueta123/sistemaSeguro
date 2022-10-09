<?php

namespace App\Http\Controllers;

use App\Models\afectados;
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
    public function store(Request $request)
    {
        //
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
