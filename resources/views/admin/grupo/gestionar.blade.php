@extends('admin.layout.layout')

@section('title', 'Gestionar | Grupos')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table id="tabla-grupo" class="table table-bordered" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align:center;">Grupo</th>
                        <th style="width: 30%; text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="text-align:center;">ITI45</th>
                        <th style="width: 15%; text-align:center;">
                            <button class="btn btn-outline-primary btn-circle"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-outline-danger btn-circle"><i class="fa fa-trash"></i></button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/grupo/gestionar.js') }}"></script>
@endsection