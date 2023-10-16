<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'Laptop',
            'Lectora de Codigo de Barra',
            'Cpu'
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre'=>$categoria
            ]);
        } 
    
    }
}
