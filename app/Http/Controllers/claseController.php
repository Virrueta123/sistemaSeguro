<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\clase;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class claseController extends Controller
{
    public function index(){
        return view("modules.clase.index",[
             
        ]);
    }
    public function create(){
        return view("modules.clase.create",[
             
        ]);
    }
    public function store(Request $request){
        $valid = $request->validate([ 
            "Csx_Nombre" =>"required",
            "Csx_MontoCat" =>"required",
            "Csx_GananciaCat" =>"required",
        ]);
       
        $Csx = clase::create($valid);

        if( $Csx ){  
            session()->flash('successo', 'El registro se creo correctamente');
            return redirect()->route("clase.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("clase.index");
        } 
    }
    public function edit($Csx_Id){
        $Csx = clase::find($Csx_Id);
        return view("modules.clase.edit",[
            "Csx" => $Csx  
        ]);
    }
    public function update($Csx_Id,Request $request){
        $valid = $request->validate([ 
            "Csx_Nombre" =>"required",
            "Csx_MontoCat" =>"required", 
            "Csx_GananciaCat" =>"required",
        ]);
        $Csx = clase::where("Csx_Id",$Csx_Id);
        $Csx = $Csx->update($valid);
        if( $Csx ){  
            session()->flash('successo', 'El registro se actualizo correctamente');
            return redirect()->route("clase.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("clase.index");
        }
    }
    public function destroy($Csx_Id){
        return 'destroy';
    }
    public function data(Request $request){
        if ($request->ajax()) {
            $model = clase::select("*") 
            ->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn("Csx_MontoCat",function($Data){ 
                    return "S/ ".moneyformat($Data->Csx_MontoCat);
                })
                ->addColumn("Csx_GananciaCat",function($Data){ 
                    return "S/ ".moneyformat($Data->Csx_GananciaCat);
                })
                ->addColumn("activo",function($Data){ 
                    if($Data->activo == "A"){
                        return "Actico";
                    }else{
                        return "Inactico";
                    } 
                })
                ->addColumn('action', function($Data){
                    $msm = "estas segur@ que desea elminar esta clase";
                    $actionBtn = '
                    <a href="'.route("clase.edit",$Data->Csx_Id).'"><i class="fa fa-edit fa-1x"></i> </a>
                     
                    ';
                    return $actionBtn;
                }) 
                ->rawColumns(['action']) 
                ->make(true);
         }  
    }
}
