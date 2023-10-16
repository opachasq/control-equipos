<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['cod_patrimonial','serie','caracteristica', 'activo','categoria_id','marca_id','modelo_id','color_id', 'created_at', 'updated_at'];
    protected $guarded = ['id'];

    public function categorias()
    {
        return $this->belongsTo('App\Models\Categoria', 'categoria_id');
    }
    public function marcas()
    {
        return $this->belongsTo('App\Models\Marca', 'marca_id');
    }
    public function modelos()
    {
        return $this->belongsTo('App\Models\Modelo', 'modelo_id');
    }
    public function colors()
    {
        return $this->belongsTo('App\Models\Color', 'color_id');
    }
}
