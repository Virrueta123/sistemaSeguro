<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class afectados extends Model
{
    use HasFactory;
    protected $table="afectados";
    protected $primaryKey ="Afx_id";
    protected $guarded = []; 
    public $timestamps = false;
}
