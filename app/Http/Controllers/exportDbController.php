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
        $file_name = 'sistemaCat_' . date('m-d-Y_h_i_s_a');
    
        $laravel = Artisan::call("backup:mysql-dump $file_name");

        dd($laravel);
      
    } 

    public function showBackup(){
        $files = Storage::disk('local')->allFiles('public/backups');
        dd($files);
    }
}
