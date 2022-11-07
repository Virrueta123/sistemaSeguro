<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class usuarioController extends Controller
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
    
    public function index()
    {
        return view("modules.usuarios.index",[
             
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
        return view("modules.usuarios.create",[ ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
      
        $valid = $request->validate([   
            "imgbackground" => "",
            "dni" => "",
            "username" => "",
            "name" => "",
            "lastname" => "",
            "email" => "",
            "cel" => "",
            "tipo" => ""
        ]);

        $valid["password"] = Hash::make($request->all()["password"]);

        $User = User::create($valid);
          
        if( $User ){  
            session()->flash('successo', 'El registro se creo correctamente');
            return redirect()->route("Usuario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Usuario.index");
        } 
       
    }

    // ajax
    public function uniqueuser(Request $res){
        $usuario = User::where("username",$res->all()["username"])->get();
    
        if(count($usuario)==0){ 
            echo("success");
        }else{
            echo("error");
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
    public function editPerfil($id)
    { 
        $User = User::where("id",$id)->first(); 

        return view("modules.usuarios.editperfil",[ 
            "User" => $User
        ]);
    }

    public function edit($id)
    { 
        $User = User::where("id",$id)->first(); 

        return view("modules.usuarios.edit",[ 
            "User" => $User
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
            "dni" => "",
            "username" => "",
            "name" => "",
            "lastname" => "",
            "email" => "",
            "cel" => "" 
        ]);

        $valid["password"] = Hash::make($request->all()["password"]);
  
        $User = User::where("id",$id);
        $User = $User->update($valid);

        if( $User ){  
            session()->flash('successo', 'El registro se actualizo correctamente');
            return redirect()->route("Usuario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Usuario.index");
        } 
    }

    public function updates(Request $request, $id)
    { 
       
        $valid = $request->validate([ 
            "tipo" => "",
            "dni" => "",
            "username" => "",
            "name" => "",
            "lastname" => "",
            "email" => "",
            "cel" => "" 
        ]);

        $valid["password"] = Hash::make($request->all()["password"]);
  
        $User = User::where("id",$id);
        $User = $User->update($valid);

        if( $User ){  
            session()->flash('successo', 'El registro se actualizo correctamente');
            return redirect()->route("Usuario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Usuario.index");
        } 
    }

    public function suspender($id)
    { 
         
        $User = User::where("id",$id);
        $User = $User->update(["estado"=>"D"]);

        if( $User ){  
            session()->flash('successo', 'Usuario suspendido correctamente');
            return redirect()->route("Usuario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Usuario.index");
        } 
    }

    public function activar($id)
    { 
         
        $User = User::where("id",$id);
        $User = $User->update(["estado"=>"A"]);

        if( $User ){  
            session()->flash('successo', 'Usuario activado correctamente');
            return redirect()->route("Usuario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Usuario.index");
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
        $delete = User::where('id',$id)->delete();
        if( $delete ){  
            session()->flash('successo', 'Usuario se elimino correctamente');
            return redirect()->route("Usuario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Usuario.index");
        } 
    } 
    
    public function data(Request $request){
        if ($request->ajax()) {
            $model = User::select("*") 
            ->whereNotIn("id",[Auth::user()->id])
            ->get();
            return DataTables::of($model)
                ->addIndexColumn() 
                ->addColumn("estado",function($Data){  
                    if($Data->estado == "A" ){
                        return "Activo"; 
                    }else{
                        return "Suspendido";
                    }  
                }) 
                ->addColumn('action', function($Data){
                    
                    
                    if ($Data->estado == "A") {
                        $msm = "estas segur@ que desea suspender este usuario"; 
                        $suspendido = '<a  class="edit btn  btn-xs">
                            <form method="POST"  id="formdeleteusuariosuspender'.$Data->id.'" action="'.route("Usuario.suspender",$Data->id).'">
                                    <input type="hidden" name="_token" value="'. csrf_token() .'">
                                    <input name="_method" type="hidden" value="patch">
                                    <button type="submit"  onclick="FormDelete(\'usuariosuspender'.$Data->id.'\',\''.$msm.'\',event)" class="btn btn-warning btn-xs" Data-toggle="tooltip" title="Delete"><i class="fa-solid fa-user-slash fa-1x"> </i></button>
                            </form>
                        </a>';
                    } else {
                        $msm = "estas segur@ que desea activar este usuario"; 
                        $suspendido = '<a  class="edit btn  btn-xs">
                        <form method="POST"  id="formdeleteusuariosuspender'.$Data->id.'" action="'.route("Usuario.activar",$Data->id).'">
                                <input type="hidden" name="_token" value="'. csrf_token() .'">
                                <input name="_method" type="hidden" value="patch">
                                <button type="submit"  onclick="FormDelete(\'usuariosuspender'.$Data->id.'\',\''.$msm.'\',event)" class="btn btn-success btn-xs" Data-toggle="tooltip" title="Delete"><i class="fa-solid fa-user-slash fa-1x"> </i></button>
                        </form>
                        </a>';
                    }

                    $msmdelete = "estas segur@ que desea eliminar este usuario"; 

                    $actionBtn = '
                    <a href="'.route("Usuario.edit",$Data->id).'"><i class="fa fa-edit fa-1x"></i> </a>
                    '.$suspendido.'
                     
                    <a  class="btn  btn-xs p-0">
                        <form method="POST"  id="formdeleteusuariodelete'.$Data->id.'" action="'.route("Usuario.delete",$Data->id).'">
                                <input type="hidden" name="_token" value="'. csrf_token() .'">
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit"  onclick="FormDelete(\'usuariodelete'.$Data->id.'\',\''.$msmdelete.'\',event)" class="btn btn-danger btn-xs" Data-toggle="tooltip" title="Delete"><i class="fa-solid fa-trash fa-1x"> </i></button>
                        </form>
                    </a>
                    ';
                    return $actionBtn;
                }) 
                ->rawColumns(['action']) 
                ->make(true);
         }  
    }
}
