<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'correo' => 'administrador@sicoae.com',
            'clave' => bcrypt('password'),
            'tipo_usuario' => 1,
            'estatus' => 1
        ]);

        $usuario = Usuario::create([
            'correo' => 'tprog.jorge.coronel@outlook.com',
            'clave' => bcrypt('4423178052'),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $tutor = $usuario->getTutor()->create([
            'nombre' => 'Jorge Coronel González',
            'telefono' => '4423178052'
        ]);
        $tutor->getToken()->create([
            'token' => ''
        ]);

        $usuario = Usuario::create([
            'correo' => 'tutor_2@gmail.com',
            'clave' => bcrypt('4422334455'),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $tutor = $usuario->getTutor()->create([
            'nombre' => 'Fabiola González García',
            'telefono' => '4422334455'
        ]);
        $tutor->getToken()->create([
            'token' => ''
        ]);

        $usuario = Usuario::create([
            'correo' => 'tutor_3@gmail.com',
            'clave' => bcrypt('4422334455'),
            'tipo_usuario' => 3,
            'estatus' => 1
        ]);
        $tutor = $usuario->getTutor()->create([
            'nombre' => 'Luis Enrique Álvarez Mendoza',
            'telefono' => '4422334455'
        ]);
        $tutor->getToken()->create([
            'token' => ''
        ]);

        $usuario = Usuario::create([
            'correo' => 'vigilante_1@gmail.com',
            'clave' => bcrypt('4422334455'),
            'tipo_usuario' => 2,
            'estatus' => 1
        ]);
        $usuario->getVigilante()->create([
            'nombre' => 'Eduardo Hernández Olvera',
            'telefono' => '4422334455'
        ]);

        $usuario = Usuario::create([
            'correo' => 'vigilante_2@gmail.com',
            'clave' => bcrypt('4422334455'),
            'tipo_usuario' => 2,
            'estatus' => 1
        ]);
        $usuario->getVigilante()->create([
            'nombre' => 'Iván Girón Hernández',
            'telefono' => '4422334455'
        ]);

        $usuario = Usuario::create([
            'correo' => 'vigilante_3@gmail.com',
            'clave' => bcrypt('4422334455'),
            'tipo_usuario' => 2,
            'estatus' => 1
        ]);
        $usuario->getVigilante()->create([
            'nombre' => 'Jorge Ramírez Rosas',
            'telefono' => '4422334455'
        ]);
    }
}
