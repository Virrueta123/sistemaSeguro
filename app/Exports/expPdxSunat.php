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

class expPdxSunat implements FromView,ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function __construct(string $fechaI,string $fechaF,$data)
    {
        $this->fechaI = $fechaI;
        $this->fechaF = $fechaF;
        $this->data = $data;
    }
    public function view(): View
    {    
        return view('modules.reportes.padronSunatTable', [
            'padronSunats' => $this->data,
            "fechaI" => $this->fechaI,
            "fechaF" => $this->fechaF 
        ]);
    } 
}
