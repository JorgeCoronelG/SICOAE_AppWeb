<?php

use Illuminate\Database\Seeder;
use App\Grado;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create(['grado' => 1]);
        Grado::create(['grado' => 2]);
        Grado::create(['grado' => 3]);
        Grado::create(['grado' => 4]);
        Grado::create(['grado' => 5]);
        Grado::create(['grado' => 6]);
    }
}
