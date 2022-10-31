<?php

namespace App\Http\Controllers;

use App\Exports\ExportPadronSbs;
use App\Exports\expPdxSunat;
use App\Http\Controllers\Controller;
use App\Models\Propietario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class padronController extends Controller
{
    public function padronSunat(){
        return view("modules.reportes.padronSunat",[  
        ]);
    }
    public function padronSunatBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;
        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
      
        return Excel::download(new expPdxSunat($fechaI,$fechaF), 'padroSunatF'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
    }
    public function padronSbs(){
        return view("modules.reportes.padronSbs",[  
        ]);
    }
    public function padronSbsBetweenDate(Request $request){
        $data = explode(" - ",$request->all()["betweenDate"]) ;
        $fechaI = Carbon::createFromFormat('d/m/Y', $data[0])->format('Y-m-d');
        $fechaF = Carbon::createFromFormat('d/m/Y', $data[1])->format('Y-m-d');
      
        return Excel::download(new ExportPadronSbs($fechaI,$fechaF), 'padroSbsF'.fecha_hoy().'_'.Carbon::now()->format("H:i:s").'.xlsx' );
    }
}
