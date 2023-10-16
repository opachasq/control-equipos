<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locador extends Model
{
    protected $table = 'locadors';
    protected $fillable = ['dni','codigo','nombres','apellidos','celular','activo','genero_id','area_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function areas()
    {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }
    public function generos()
    {
        return $this->belongsTo('App\Models\Genero', 'genero_id');
    }
   
}
