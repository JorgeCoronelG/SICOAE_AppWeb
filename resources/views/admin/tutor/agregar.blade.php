@extends('admin.layout.layout')

@section('title', 'Agregar | Tutor')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10 col-md-12 col-xl-8">
        <div class="card o-hidden shadow-lg">
            <div class="card-header">
                <div class="text-center">
                    <h4 class="text-gray-900">Agregar tutor</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form id="form-tutor">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Nombre completo" maxlength="150" autocomplete="off" required/>
                                        <span id="error-nombre" style="color: #D52E2E;"></span>
                                    </div>
                                    <div class="col-4">
                                        <input id="telefono" name="telefono" class="form-control" type="text" 
                                            placeholder="Teléfono" autocomplete="off" onkeypress="return validarTelefono(event);"
                                            maxlength="10" required/>
                                        <span id="error-telefono" style="color: #D52E2E;"></span>
                                    </div>
                                </div>
                                <hr /> 
                                <div class="form-group row">
                                    <div class="col-8 offset-2">
                                        <input type="email" class="form-control" id="correo" name="correo"
                                            placeholder="Correo electrónico" maxlength="120" autocomplete="off" required/>
                                        <span id="error-correo" style="color: #D52E2E;"></span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-user" id="btn-add">Agregar</button>
                                    <div class="btn btn-primary disabled d-none" id="load">Agregando tutor...</div>
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
    <script src="{{ asset('dist/js/tutor/agregar.js') }}"></script>
@endsection