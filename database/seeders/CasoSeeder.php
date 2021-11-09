<?php

namespace Database\Seeders;

use App\Models\Caso;
use Illuminate\Database\Seeder;

class CasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caso::create([
            'id_juzgado'=>1,
            'nombre'=>'Denuncia por acaso',
            'sigla'=>'INF110'
        ]);
    }
}
