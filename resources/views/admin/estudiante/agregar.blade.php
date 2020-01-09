@extends('admin.layout.layout')

@section('title', 'Agregar | Estudiante')

@section('content')
<div class="row justify-content-center" id="div-form">
    <div class="col-lg-10 col-md-12 col-xl-8">
        <div class="card o-hidden shadow-lg">
            <div class="card-header">
                <div class="text-center">
                    <h4 class="text-gray-900">Agregar estudiante</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form id="form" action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre completo" maxlength="120" autocomplete="off" required />
                                    </div>
                                    <div class="col-4">
                                        <input id="fechaN" name="fechaN" class="form-control" type="text" 
                                               placeholder="Fecha de nacimiento" onfocus="(this.type='date')" required />
                                    </div>
                                </div>
                                <hr /> 
                                <div class="form-group row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="idEst" name="idEst"
                                        placeholder="ID Tarjeta" maxlength="120" autocomplete="off" required />
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="matricula" name="matricula"
                                        placeholder="Matrícula" maxlength="10" autocomplete="off" required />
                                    </div>
                                    <div class="col-4">
                                        <input id="curp" name="curp" class="form-control" type="text" 
                                               placeholder="CURP" maxlength="18" required />
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <div class="col-6">
                                        <select id="grado" name="grado" class="form-control" required>
                                            <option value="">Selecciona un grado:</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select id="grupo" name="grupo" class="form-control" required>
                                            <option value="">Selecciona un grupo:</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select id="tutor" name="tutor" class="form-control" required>
                                            <option value="">Selecciona un tutor:</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-user">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!--<script src="{{ asset('prueba.js') }}"></script>-->
@endsection