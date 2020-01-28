@extends('admin.layout.layout')

@section('title', 'Gestionar | Vigilantes')

@section('content')
<div class="row justify-content-center">
    <div class="table-responsive">
        <table id="tabla-vigilante" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Nombre</th>
                    <th style="text-align:center;">Teléfono</th>
                    <th style="text-align:center;">Correo</th>
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
                <input type="text" id="idupdate" name="idupdate" hidden="true" />
                <input type="text" id="oldemail" name="oldemail" hidden="true" />
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
                    <div class="col-sm-4">
                        <label>Teléfono</label>
                    </div>
                    <div class="col-sm-8">
                        <input id="telefono" name="telefono" class="form-control" type="text" 
                            placeholder="Teléfono" autocomplete="off" required onkeypress="return validarTelefono(event);"
                            maxlength="10"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label>Correo electrónico</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="correo" name="correo"
                            placeholder="Correo electrónico" maxlength="120" autocomplete="off" required />
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

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¿Estás seguro?</h5>
        </div>
        <input type="email" id="iddelete" hidden="true" />
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        <div class="modal-body">Se eliminará el vigilante <strong><span id="vigilante"></span></strong></div><div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" id="btn-not">No</button>
            <button class="btn btn-primary" type="button" id="btn-yes">Si</button>
            <div class="btn btn-primary btn-user disabled d-none" id="load-status">Actualizando estatus...</div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/vigilante/gestionar.js') }}"></script>
@endsection