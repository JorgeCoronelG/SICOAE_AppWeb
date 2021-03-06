@extends('admin.layout.layout')

@section('title', 'Agregar | Grado')

@section('content')
<div class="row justify-content-center" id="div-form">
    <div class="col-lg-3 col-md-4 col-xl-4">
        <div class="card o-hidden shadow-lg">
            <div class="card-header">
                <div class="text-center">
                    <h4 class="text-gray-900">Agregar grado</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form id="form" method="POST">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="grado" name="grado"
                                               placeholder="Grado" required autocomplete="off"/>
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