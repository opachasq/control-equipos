<?php

namespace Database\Seeders;
use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            'Centro Pre Univeristario',
            'Planificacion',
            'Pre Inversion'
        ];

        foreach ($areas as $area) {
            Area::create([
                'nombre'=>$area
            ]);
        } 
    }
}
