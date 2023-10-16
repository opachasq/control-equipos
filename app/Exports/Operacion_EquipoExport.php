<?php

namespace App\Exports;

use App\Models\Operacion_equipos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Operacion_EquipoExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ID',
            'LOCADOR',
            'CELULAR',
            'OFICINA',
            'FECHA DE PRESTAMOS',
            'FECHA DE DEVOLUCION',
            'SERIE',
            'CÓDIGO PATRIMONIAL',
            'COLOR',
            'Marca',
        ];
    }
    public function collection()
    {
        $operacio_equipos=Operacion_equipos::get();

        $filas=[];

        foreach ($operacio_equipos as $key => $operacionequipo) {
            $filas[]=[
                $operacionequipo->id,
                $operacionequipo->operaciones->locadors->nombres.' '.$operacionequipo->operaciones->locadors->apellidos,
                $operacionequipo->operaciones->locadors->celular,
                $operacionequipo->operaciones->locadors->areas->nombre,
                $operacionequipo->operaciones->created_at,
                $operacionequipo->operaciones->fecha,
                $operacionequipo->equipos->serie,
                $operacionequipo->equipos->cod_patrimonial,
                $operacionequipo->equipos->colors->nombre,
                $operacionequipo->equipos->marcas->nombre,

            ];
            
        }
       
       return collect($filas);
    }
}
