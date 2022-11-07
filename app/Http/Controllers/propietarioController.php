<?php

namespace App\Http\Controllers;

use App\Models\clase;
use Peru\Jne\DniFactory;
use App\Models\Propietario;
use App\Models\usovehicular;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use GuzzleHttp\Client;
class propietarioController extends Controller
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
        return view("modules.propietario.index",[
             
        ]);
    }

    public function printFormato($Prx)
    {
        $PrxGet = Propietario::select("*")
        ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
        ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
        ->where("Prx_Id",$Prx)
        ->first();
        return view("modules.formatocat.printcat",[
            "PrxGet" => $PrxGet
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
        $Csxs = clase::where("activo","A")->get();
        $Uvxs = usovehicular::where("Uvx_Activo","A")->get();
        return view("modules.propietario.create",[
            "vigenciaI" => $vigenciaI,
            "vigenciaF" => $vigenciaF,
            "Csxs" => $Csxs,
            "Uvxs" => $Uvxs
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
            "Prx_Ruc" =>"",
            "Prx_Razon" =>"",
            "Prx_Provincia" =>"",
            "Prx_Departamento" =>"",
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
        
        $valid["Prx_Ruc"] = $request->all()["Prx_Ruc"] == "" ? "nt" : $request->all()["Prx_Ruc"];
        $valid["Prx_Razon"] = $request->all()["Prx_Razon"] == "" ? "nt" : $request->all()["Prx_Razon"];
        
        $valid["Prx_HoraC"] = Carbon::now()->format("H:i:s");

        $valid["Prx_NroCat"] = $codigo;
        $valid["Prx_Contacto"] = str_replace(" ", "", $request->all()["Prx_Contacto"]);
        $valid["Prx_VigenciaI"] = $vigenciaI;
        $valid["Prx_VigenciaF"] = $vigenciaF;
        
        $Prx = Propietario::create($valid);

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
    public function edit($id)
    { 
        $Prx = Propietario::select("*")
        ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
        ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
        ->where("Prx_Id",$id)
        ->first();
        $clase = clase::where("activo","A")->get();
        $uso = usovehicular::where("Uvx_Activo","A")->get();
        $anos = ["2000","2001","2002","2003", "2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021","2022"]; 


        return view("modules.propietario.edit",[ 
            "Prx" => $Prx,"clase" =>  $clase,"anos" => $anos,"uso" =>  $uso
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
            "Prx_Provincia" =>"",
            "Prx_Departamento" =>"",
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
            "Prx_Uso" =>"required",
            "Prx_VigenciaI"=>"required",
            "Prx_VigenciaF"=>"required",
            "Prx_Contacto"=>"required",
        ]);
        $valid["Prx_Contacto"] = str_replace(" ", "", $request->all()["Prx_Contacto"]);
        $Prx = Propietario::where("Prx_Id",$id);
        $Prx = $Prx->update($valid);

        if( $Prx ){  
            session()->flash('successo', 'El registro se actualizo correctamente');
            return redirect()->route("Propietario.index");
        }else{
            session()->flash('erroro', 'fallo el registro, intentelo de nuevo');
            return redirect()->route("Propietario.index");
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
    public function consultadniajax(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "dni"=>"required|numeric|digits:8" 
        ]);
        $dni = $req->all();
        $dni = $dni["dni"];
        
        if($validator->passes()){
            $factory = new DniFactory();
            $cs = $factory->create(); 
            $person = $cs->get($dni);
            if (!$person) {
                echo '{"tipo":"error","mensaje":"dni no encontrado"}'; 
            }else{
                echo '{"tipo":"success","mensaje":'.json_encode($person).'}'; 
            } 
        }else{
            echo '{"tipo":"validate","mensaje":'.json_encode($validator->errors()->all()).'}'; 
        } 
    }

    public function duplicadoajax(Request $req)
    {
        
        $Prx = Propietario::where("Prx_Id",$req->all()["Prx_Id"] );
        $copia = Propietario::where("Prx_Id",$req->all()["Prx_Id"] )->first()->Prx_Duplicado + 1 ;
        $Prx = $Prx->update([ "Prx_Duplicado" => $copia ]);
        
        if ($Prx) {
            return true;
        } else {
            return false;
        }
         
    }

    public function consultarucajax(Request $req){
        $validator = Validator::make($req->all(), [
            "ruc"=>"required|numeric|digits:11" 
        ]);
        $ruc = $req->all();
        $ruc = $ruc["ruc"];
        $token = env("CONSULTA_TOKEN");
        $number = $ruc;
        $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);

        $parameters = [
            'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Referer' => 'https://apis.net.pe/api-consulta-ruc',
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => ['numero' => $number]
        ];
        $res = $client->request('GET', '/v1/ruc', $parameters);
        $response = json_decode($res->getBody()->getContents(), true);
        return $response;  

    }

    public function data(Request $request){
        if ($request->ajax()) {
            $model = Propietario::select("*")
            ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria")  
            ->get();
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn("asociado",function($Data){  
                   return $Data->Prx_Nombre." ".$Data->Prx_Apellido; 
                })
                ->addColumn("estado",function($Data){  
                    if( $Data->Prx_VigenciaF  >  Carbon::now()->format("Y-m-d") ){
                        return "Activo"; 
                    }else{
                        return "vencido";
                    } 
                }) 
                ->addColumn('action', function($Data){
                    $msm = "estas segur@ que desea elminar este cliente";
                    $actionBtn= "";
                    if( $Data->Prx_VigenciaF  >  Carbon::now()->format("Y-m-d") ){
                       $actionBtn.= '<a href="'.route("Propietario.printFormato",$Data->Prx_Id).'"><i class="fa-solid fa-print text-orange fa-2x"></i> </a>
                       <a href="'.route("Propietario.edit",$Data->Prx_Id).'"><i class="fa fa-edit fa-2x"></i> </a>'; 
                    }
                    $actionBtn.= ' 
                    
                    <a href="'.route("Accidente.show",$Data->Prx_Id).'"><i class="fas fa-car-crash text-warning fa-2x"></i> </a>
                    ';
                    return $actionBtn;
                }) 
                ->rawColumns(['action']) 
                ->make(true);
         }  
    }
}
