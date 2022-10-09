<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accidentes extends Model
{
    use HasFactory;
    protected $table="accidentes";
    protected $primaryKey ="Acx_Id";
    protected $guarded = []; 
    public $timestamps = false;
}
