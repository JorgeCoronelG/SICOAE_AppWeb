<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('index');

Route::get('/usuario/index', 'UsuarioController@index')->name('usuario.index');
Route::post('/login', 'UsuarioController@login')->name('login');
Route::get('/logout', 'UsuarioController@logout')->name('logout');

Route::get('/tutor/all', 'TutorController@findAll')->name('tutor.all');
Route::get('/tutor/all/actives', 'TutorController@findAllActives')->name('tutor.all.actives');
Route::post('/tutor/add', 'TutorController@add')->name('tutor.add');
Route::post('/tutor/edit', 'TutorController@edit')->name('tutor.edit');
Route::post('/tutor/status', 'TutorController@changeStatus')->name('tutor.status');

Route::get('/grado/all', 'GradoController@findAll')->name('grado.all');
Route::get('/grado/count', 'GradoController@count')->name('grado.count');

Route::get('/grupo/all', 'GrupoController@findAll')->name('grupo.all');
Route::get('/grupo/count', 'GrupoController@count')->name('grupo.count');

Route::post('/estudiante/add', 'EstudianteController@add')->name('estudiante.add');
Route::get('/estudiante/all', 'EstudianteController@findAll')->name('estudiante.all');
Route::post('/estudiante/edit', 'EstudianteController@edit')->name('estudiante.edit');
Route::post('/estudiante/status', 'EstudianteController@changeStatus')->name('estudiante.status');
Route::get('/estudiante/count', 'EstudianteController@count')->name('estudiante.count');

Route::post('/vigilante/add', 'VigilanteController@add')->name('vigilante.add');
Route::get('/vigilante/all', 'VigilanteController@findAll')->name('vigilante.all');
Route::post('/vigilante/edit', 'VigilanteController@edit')->name('vigilante.edit');
Route::post('/vigilante/delete', 'VigilanteController@delete')->name('vigilante.delete');
Route::get('/vigilante/count', 'VigilanteController@count')->name('vigilante.count');

Route::get('/registro/day/assistance', 'RegistroController@dayAssistance')->name('registro.day.assistance');
Route::get('/registro/all/{matricula}', 'RegistroController@findAllByStudent')->name('registro.all.student');
Route::get('/registro/group/all/{grupo}', 'RegistroController@findAllByGroup')->name('registro.all.group');
Route::get('/registro/grade/all/{grado}', 'RegistroController@findAllByGrade')->name('registro.all.grade');

Route::get('/referencia/all/input', 'ReferenciaController@inputDay')->name('referencia.all.input');
Route::get('/referencia/input/{id}', 'ReferenciaController@inputReference')->name('referencia.input');

Route::post('/externo/input', 'ExternoController@input')->name('externo.input');
Route::get('/externo/all', 'ExternoController@findAll')->name('externo.all');
Route::get('/externo/all/output', 'ExternoController@findAllWithoutOutput')->name('externo.all.output');
Route::get('/externo/output/{id}', 'ExternoController@output')->name('externo.output');

Route::get('/hora', function(){
    return 'Fecha: '.date('Y/m/d').', Hora:'.date('G:i:s');
});

Route::middleware(['auth', 'administrador'])->group(function(){
    Route::get('/admin', 'AdminViewController@index')->name('admin.index');
    Route::get('/admin/agregar/tutor','AdminViewController@agregarTutor')->name('admin.agregar.tutor');
    Route::get('/admin/gestionar/tutores', 'AdminViewController@gestionarTutores')->name('admin.gestionar.tutores');
    Route::get('/admin/agregar/estudiante', 'AdminViewController@agregarEstudiante')->name('admin.agregar.estudiante');
    Route::get('/admin/gestionar/estudiantes', 'AdminViewController@gestionarEstudiantes')->name('admin.gestionar.estudiantes');
    Route::get('/admin/agregar/vigilante', 'AdminViewController@agregarVigilante')->name('admin.agregar.vigilante');
    Route::get('/admin/gestionar/vigilantes', 'AdminViewController@gestionarVigilantes')->name('admin.gestionar.vigilantes');
    /*Route::get('/admin/agregarGrado', 'AdminViewController@agregarGrado')->name('admin.agregar.grado');
    Route::get('/admin/gestionarGrados', 'AdminViewController@gestionarGrados')->name('admin.gestionar.grados');
    Route::get('/admin/agregarGrupo', 'AdminViewController@agregarGrupo')->name('admin.agregar.grupo');
    Route::get('/admin/gestionarGrupos', 'AdminViewController@gestionarGrupos')->name('admin.gestionar.grupos');*/
    Route::get('/admin/registros/externos', 'AdminViewController@historicoExternos')->name('admin.registros.externos');
    Route::get('admin/estadisticas/estudiante', 'AdminViewController@estadisticaEstudiante')->name('admin.estadistica.estudiante');
    Route::get('admin/estadisticas/grupo', 'AdminViewController@estadisticaGrupo')->name('admin.estadistica.grupo');
    Route::get('admin/estadisticas/grado', 'AdminViewController@estadisticaGrado')->name('admin.estadistica.grado');
});

Route::middleware(['auth', 'vigilante'])->group(function(){
    Route::get('/vigilante', 'VigilanteViewController@index')->name('vigilante.index');
    Route::get('/vigilante/entradaEstudiante', 'VigilanteViewController@entradaEstudiante')->name('vigilante.entrada.estudiante');
    Route::get('/vigilante/salidaEstudiante', 'VigilanteViewController@salidaEstudiante')->name('vigilante.salida.estudiante');
    Route::get('/vigilante/entradaExterno', 'VigilanteViewController@entradaExterno')->name('vigilante.entrada.externo');
    Route::get('/vigilante/salidaExterno', 'VigilanteViewController@salidaExterno')->name('vigilante.salida.externo');
});

//Rutas de ejemplo
/*
Route::get('hola', function(){
    return 'Hola mundo';
});

Route::get('usuario/{nombre}', function($nombre){
    return $nombre;
});

Route::get('usuario/{nombre}', function($nombre){
    return $nombre;
})->where('nombre', '[A-Za-z]+');

Route::get('id/{id}', function($id){
    return $id;
})->where('id', '[0-9]+');

Route::get('usuario/{nombre}/{id}', function($nombre, $id){
    return $nombre.','.$id;
})->where([
    'nombre' => '[A-Za-z]+',
    'id' => '[0-9]+'
]);

Route::get('usuario/{nombre?}', function($nombre='Invitado'){
    return $nombre;
});

Route::get('usuario/{nombre}/comentario/{comentario}', function($nombre,$comentario){
    return $nombre.', '.$comentario;
});

Route::get('prueba', function(){
    return 'Prueba ruta con nombre';
})->name('prueba-route');

Route::get('redirigir', function(){
    return redirect()->route('prueba-route');
});

Route::get('usuario/{nombre}', function($nombre){
    return $nombre;
})->name('usuario-nombre');

Route::get('redirigir-usuario', function(){
    return redirect()->route('usuario-nombre',['nombre' => 'Jorge']);
});

Route::redirect('/prueba3', '/prueba');

Route::resource('usuario', 'UsuarioController')->only([
    'index', 'show'
]);

Route::resource('usuario', 'UsuarioController')->only([
    'index', 'show'])->names([
        'index' => 'usuario.inicio',
        'show' => 'usuario.mostrar'
        ]);

Route::resource('usuario', 'UsuarioController')->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('url', 'Controller@function');
*/