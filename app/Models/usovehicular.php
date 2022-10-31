<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usovehicular extends Model
{
    use HasFactory;
    protected $table="usovehicular";
    protected $primaryKey ="Uvx_Id";
    protected $guarded = [];
    public $timestamps = false;
}
