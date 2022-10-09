<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propietario extends Model
{
    use HasFactory;
    protected $table="propietarios";
    protected $primaryKey ="Prx_Id";
    protected $guarded = []; 
    public $timestamps = false;
}
