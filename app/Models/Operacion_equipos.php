<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion_equipos extends Model
{
    protected $table = 'operacion_equipos';
    protected $fillable = ['equipo_id','operacion_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function equipos()
    {
        return $this->belongsTo('App\Models\Equipo', 'equipo_id');
    }
    public function operaciones()
    {
        return $this->belongsTo('App\Models\Operacion', 'operacion_id');
    }
    public function locadors()
    {
        return $this->belongsTo('App\Models\Locador', 'locador_id');
    }
}
