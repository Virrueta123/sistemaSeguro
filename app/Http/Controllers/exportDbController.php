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
        $file_name = 'sistemaCat_' . date('m-d-Y');
    
        $laravel = Artisan::call("backup:mysql-dump $file_name");

        return redirect()->back();
      
    } 

    public function showBackup(){
        $files = Storage::disk('local')->allFiles('public/backups');
         
        return view("modules.dbBackup",[
            "files" => $files
        ]);
        
    }

    public function backupget($fecha){
         
        if (Storage::disk('local')->exists("public/backups/sistemacat_{$fecha}.sql.gz")) {
            return Storage::download("public/backups/sistemacat_{$fecha}.sql.gz");
        }
         
    }
}
