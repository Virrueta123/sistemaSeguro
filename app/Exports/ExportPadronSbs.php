<?php

namespace App\Exports;

use App\Models\Propietario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportPadronSbs implements FromView,ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $fechaI,string $fechaF)
    {
        $this->fechaI = $fechaI;
        $this->fechaF = $fechaF;
    }
    public function view(): View
    {    
        return view('modules.reportes.padronSbsTable', [
            'padronSunats' => Propietario::select("*")
            ->join("clase","clase.Csx_Id","=","propietarios.Prx_Categoria") 
            ->join("usovehicular","usovehicular.Uvx_Id","=","propietarios.Prx_Uso") 
            ->whereBetween('propietarios.Prx_VigenciaI', [$this->fechaI, $this->fechaF])->get(),
            "fechaI" => $this->fechaI,
            "fechaF" => $this->fechaF 
        ]);
    } 
}
