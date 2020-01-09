@extends('vigilante.layout.layout')

@section('title', 'Entrada | Externo')

@section('content')
<div class="row justify-content-center" id="div-form">
    <div class="col-lg-10 col-md-12 col-xl-8">
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
                            <form id="form" action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre completo" maxlength="120" autocomplete="off" required />
                                    </div>
                                    <div class="col-4">
                                        <input id="telefono" name="telefono" class="form-control" type="text" 
                                               placeholder="Teléfono" required />
                                    </div>
                                </div>
                                <hr /> 
                                <div class="form-group row">
                                    <div class="col-12">
                                        <textarea id="motivo" name="motivo" class="form-control" type="text" 
                                                  placeholder="Motivo de la visita" required ></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-user">Registrar</button>
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
    <script src="{{ asset('dist/externo/entrada.js') }}"></script>
@endsection