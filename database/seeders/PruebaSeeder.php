<?php

namespace Database\Seeders;

use App\Models\Prueba;
use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prueba::create([
        'id_caso'=>1,
        'nombre'=>'Nro',
        'descripcion'=>'probando'
        ]);
    }
}
