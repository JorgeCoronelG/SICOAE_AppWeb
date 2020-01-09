@extends('admin.layout.layout')

@section('title', 'Agregar | Vigilante')

@section('content')
<div class="row justify-content-center" id="div-form">
    <div class="col-lg-10 col-md-12 col-xl-8">
        <div class="card o-hidden shadow-lg">
            <div class="card-header">
                <div class="text-center">
                    <h4 class="text-gray-900">Agregar vigilante</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form id="form" method="POST">
                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                               placeholder="Nombre completo" required autocomplete="off" />
                                    </div>
                                    <div class="col-4">
                                        <input id="telefono" name="telefono" class="form-control" type="text" 
                                               placeholder="Teléfono" required autocomplete="off"/>
                                    </div>
                                </div>
                                <hr /> 
                                <div class="form-group row">
                                    <div class="col-8 offset-2">
                                        <input type="email" class="form-control" id="correo" name="correo"
                                               placeholder="Correo electrónico" required autocomplete="off"/>
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