<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create([
            'id'=>1,
            'nombre'=>'Santa Cruz de La Sierra',
            'sigla' =>'SCZ'
        ]);
    }
}
