<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelos';
    protected $fillable = ['nombre', 'activo', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}
