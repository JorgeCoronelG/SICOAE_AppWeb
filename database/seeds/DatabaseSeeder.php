<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(EstudianteSeeder::class);
        $this->call(ExternoSeeder::class);
    }
}
