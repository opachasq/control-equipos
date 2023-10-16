<?php

namespace Database\Seeders;


use App\Models\Modelo;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelos = [
            'HP PRODESK',
            'ALTRON',
            'S01900'
        ];

        foreach ($modelos as $modelo) {
            Modelo::create([
                'nombre'=>$modelo
            ]);
        } 
    }
}
