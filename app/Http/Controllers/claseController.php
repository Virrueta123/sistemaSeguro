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
    public function suspender($Csx_Id){
         
        $Csx = clase::where("Csx_Id",$Csx_Id);
        $Csx = $Csx->update(["activo"=>"D"]);
        if( $Csx ){  
            session()->flash('successo', 'esta clase de suspendio correctamente');
            return redirect()->route("clase.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("clase.index");
        }
    }
    public function activar($Csx_Id){
        $Csx = clase::where("Csx_Id",$Csx_Id);
        $Csx = $Csx->update(["activo"=>"A"]);
        if( $Csx ){  
            session()->flash('successo', 'esta clase se activo correctamente');
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
                    $actionBtn="";
                    if ($Data->activo == "A") {
                        $msm = "estas segur@ que desea suspender esta clase"; 
                        $actionBtn .= '<a  class="edit btn  btn-xs">
                            <form method="POST"  id="formdeleteclasesuspender'.$Data->Csx_Id.'" action="'.route("clase.suspender",$Data->Csx_Id).'">
                                    <input type="hidden" name="_token" value="'. csrf_token() .'">
                                    <input name="_method" type="hidden" value="patch">
                                    <button type="submit"  onclick="FormDelete(\'clasesuspender'.$Data->Csx_Id.'\',\''.$msm.'\',event)" class="btn btn-warning btn-xs" Data-toggle="tooltip" title="Delete"><i class="fa-solid fa-user-slash fa-1x"> </i></button>
                            </form>
                        </a>';
                    } else {
                        $msm = "estas segur@ que desea activar esta clase"; 
                        $actionBtn .= '<a  class="edit btn  btn-xs">
                        <form method="POST"  id="formdeleteclasesuspender'.$Data->Csx_Id.'" action="'.route("clase.activar",$Data->Csx_Id).'">
                                <input type="hidden" name="_token" value="'. csrf_token() .'">
                                <input name="_method" type="hidden" value="patch">
                                <button type="submit"  onclick="FormDelete(\'clasesuspender'.$Data->Csx_Id.'\',\''.$msm.'\',event)" class="btn btn-success btn-xs" Data-toggle="tooltip" title="Delete"><i class="fa-solid fa-user-slash fa-1x"> </i></button>
                        </form>
                        </a>';
                    }
                    $actionBtn.= '
                    <a href="'.route("clase.edit",$Data->Csx_Id).'"><i class="fa fa-edit fa-1x"></i> </a> 
                    ';
                    return $actionBtn;
                }) 
                ->rawColumns(['action']) 
                ->make(true);
         }  
    }
}
