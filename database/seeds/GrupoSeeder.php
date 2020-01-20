<?php

use Illuminate\Database\Seeder;
use App\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create(['grupo' => 'A']);
        Grupo::create(['grupo' => 'B']);
        Grupo::create(['grupo' => 'C']);
    }
}
