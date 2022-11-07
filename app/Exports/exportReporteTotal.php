<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class exportReporteTotal implements FromView,ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $fechaI,string $fechaF,
    $ReclamoPendientedePagoGm,
    $ReclamoPendientedePagoIt,
    $ReclamoPendientedePagoIp,
    $ReclamoPendientedePagoGs,
    $ReclamoPendientedePagoIdm)
    {
        $this->fechaI = $fechaI;
        $this->fechaF = $fechaF;
        $this->ReclamoPendientedePagoGm = $ReclamoPendientedePagoGm;
        $this->ReclamoPendientedePagoIt = $ReclamoPendientedePagoIt;
        $this->ReclamoPendientedePagoIp = $ReclamoPendientedePagoIp;
        $this->ReclamoPendientedePagoGs = $ReclamoPendientedePagoGs;
        $this->ReclamoPendientedePagoIdm = $ReclamoPendientedePagoIdm;
    }
    public function view(): View
    {    
        return view('modules.reportes.resumenTotalTable', [
            'ReclamoPendientedePagoGm' => $this->ReclamoPendientedePagoGm,
            'ReclamoPendientedePagoIt' => $this->ReclamoPendientedePagoIt,
            'ReclamoPendientedePagoIp' => $this->ReclamoPendientedePagoIp,
            'ReclamoPendientedePagoGs' => $this->ReclamoPendientedePagoGs,
            'ReclamoPendientedePagoIdm' => $this->ReclamoPendientedePagoIdm,
            "fechaI" => $this->fechaI,
            "fechaF" => $this->fechaF 
        ]);
    } 
}
