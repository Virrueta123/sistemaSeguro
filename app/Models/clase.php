<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clase extends Model
{
    use HasFactory;
    protected $table="clase";
    protected $primaryKey ="Csx_id";
    protected $guarded = []; 
    public $timestamps = false;
}
