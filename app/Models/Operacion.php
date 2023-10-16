<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operacions';
    protected $fillable = ['responsable','celular','fecha_prestamo','fecha_devolucion','descripcion','equipo_id','area_id','estado_id','toperacion_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function locadors()
    {
        return $this->belongsTo('App\Models\Locador', 'locador_id');
    }
    public function operaciones()
    {
        return $this->belongsTo('App\Models\Operacion', 'operacion_id');
    }
    public function equipos()
    {
        return $this->belongsTo('App\Models\Equipo', 'equipo_id');
    }
   
}
