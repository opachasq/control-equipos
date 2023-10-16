<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
            'Masculino',
            'Femenino'
        ];

        foreach ($generos as $genero) {
            Genero::create([
                'nombre'=>$genero
            ]);
        } 
    }
}
