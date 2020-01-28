@extends('admin.layout.layout')

@section('title', 'Gestionar | Estudiantes')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-estudiante" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Matrícula</th>
                    <th style="text-align:center;">ID Tarjeta</th>
                    <th style="text-align:center;">Nombre completo</th>
                    <!--<th style="text-align:center;">Fecha de nacimiento</th>
                    <th style="text-align:center;">CURP</th>-->
                    <th style="text-align:center;">Escolaridad</th>
                    <th style="text-align:center;">Tutor(a)</th>
                    <th style="width: 15%; text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar información</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form-update">
                @csrf
                <input type="text" id="oldmatricula" name="oldmatricula" hidden="true" />
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Matrícula</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="matricula" name="matricula"
                            placeholder="Matrícula" maxlength="10" autocomplete="off" required />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>ID Tarjeta</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tarjeta" name="tarjeta"
                            placeholder="ID Tarjeta" maxlength="120" autocomplete="off" required />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Nombre completo</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Nombre completo" maxlength="150" autocomplete="off" required />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label>Grado</label>
                    </div>
                    <div class="col-sm-4">
                        <select id="grado" name="grado" class="form-control" required></select>
                    </div>
                    <div class="col-sm-2">
                        <label>Grupo</label>
                    </div>
                    <div class="col-sm-4">
                        <select id="grupo" name="grupo" class="form-control" required></select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Tutor</label>
                    </div>
                    <div class="col-sm-8">
                        <select id="tutor" name="tutor" class="form-control" required></select>
                    </div>
                </div>
                <hr />
                <div class="text-right">
                    <a data-dismiss="modal"><button class="btn btn-secondary" id="btn-cancel">Cancelar</button></a>
                    <button class="btn btn-primary btn-user" id="btn-update">Actualizar</button>
                    <div class="btn btn-primary btn-user disabled d-none" id="load-update">Actualizando información...</div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="change-status-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¿Estás seguro?</h5>
        </div>
        <input type="text" id="idchange" hidden="true" />
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        <div class="modal-body">Se cambiará el estatus de <strong><span id="estudiante"></span></strong> a <strong><span id="status"></span></strong></div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" id="btn-not">No</button>
            <button class="btn btn-primary" type="button" id="btn-yes">Si</button>
            <div class="btn btn-primary btn-user disabled d-none" id="load-status">Actualizando estatus...</div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/estudiante/gestionar.js') }}"></script>
@endsection