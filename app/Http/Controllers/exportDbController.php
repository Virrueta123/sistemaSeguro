<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class exportDbController extends Controller
{
    public function backup_database()
    {
        $file_name = 'sistemacat_' . date('Y-m-d');
    
        Artisan::call("backup:mysql-dump $file_name");

        return redirect()->route("backup"); 
    } 

    public function showBackup(){
        $files = Storage::disk('local')->files('public/backups');
         
        return view("modules.dbBackup",[
            "files" => $files
        ]);
        
    }

    public function backupget($fecha){
         
        
            return Storage::download("public/backups/sistemacat_{$fecha}.sql.gz");
        
         
    }
}
