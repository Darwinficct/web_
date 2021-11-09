<?php

namespace Database\Seeders;

use App\Models\Juzgado;
use Illuminate\Database\Seeder;

class JuzgadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Juzgado::create([
            'id'=>1,
            'codigo'=>'187',
            'nombre'=>'Juzgado publico de familia',
            'id_ciudad'=>1
        ]);
    }
}
