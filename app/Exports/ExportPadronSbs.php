<?php

namespace App\Exports;
 
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
 

class ExportPadronSbs implements FromView,ShouldAutoSize 
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
        return view('modules.reportes.padronSbsTable', [
            'padronSunats' => $this->data,
            "fechaI" => $this->fechaI,
            "fechaF" => $this->fechaF 
        ]);
    } 
}
