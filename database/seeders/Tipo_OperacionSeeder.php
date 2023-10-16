<?php

namespace Database\Seeders;

use App\Models\Toperacion;
use Illuminate\Database\Seeder;

class Tipo_OperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toperaciones = [
            'Devuelto',
            'Prestado'
        ];

        foreach ($toperaciones as $toperacion) {
            Toperacion::create([
                'nombre'=>$toperacion
            ]);
        }
    }
}
