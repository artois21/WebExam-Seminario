<?php

namespace Database\Seeders;

use App\Models\Prestamos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrestamosSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //apagamos la llave foranea
        Prestamos::truncate(); //eliminar todos los registros
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //volvemos a encender
        for ($i=0; $i < 10; $i++) { 
            Prestamos::create(
                [
                    'cantidad' => 100,
                    'periodo' => 12,
                    'interes' => 10,
                    'user_id' => 1
                ]
            );
        }
    }
}
