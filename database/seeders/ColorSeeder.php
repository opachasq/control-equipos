<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'Negro',
            'Rojo',
            'Plomo'
        ];

        foreach ($colors as $color) {
            Color::create([
                'nombre'=>$color
            ]);
        } 
    }
}
