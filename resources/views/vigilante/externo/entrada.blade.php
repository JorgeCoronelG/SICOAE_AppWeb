@extends('vigilante.layout.layout')

@section('title', 'Entrada | Externo')

@section('content')
<div class="row justify-content-center" id="div-form">
    <div class="col-lg-10 col-md-12 col-xl-9">
        <div class="card o-hidden shadow-lg">
            <div class="card-header">
                <div class="text-center">
                    <h4 class="text-gray-900">Registro externo</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form id="form-externo">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Nombre completo" maxlength="150" autocomplete="off" required />
                                        <span id="error-nombre" style="color: #D52E2E;"></span>
                                    </div>
                                    <div class="col-3">
                                        <input id="telefono" name="telefono" class="form-control" type="text" autocomplete="off"
                                            placeholder="Teléfono" onkeypress="return validarTelefono(event);" maxlength="10" required />
                                        <span id="error-telefono" style="color: #D52E2E;"></span>
                                    </div>
                                    <div class="col-3">
                                        <input id="personas" name="personas" class="form-control" type="number" 
                                            placeholder="N° personas" min="1" max="99" required />
                                        <span id="error-personas" style="color: #D52E2E;"></span>
                                    </div>
                                </div>
                                <hr /> 
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea id="motivo" name="motivo" class="form-control" type="text" 
                                            placeholder="Motivo de la visita" required ></textarea>
                                        <span id="error-motivo" style="color: #D52E2E;"></span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-user" id="btn-register">Registrar</button>
                                    <div class="btn btn-primary btn-user disabled d-none" id="load">Registrando externo...</div>
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
    <script src="{{ asset('dist/js/externo/entrada.js') }}"></script>
@endsection