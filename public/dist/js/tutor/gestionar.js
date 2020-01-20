$('#tabla-tutor').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Tutores",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    'lengthMenu': [[5, 10, 15], [5, 10, 15]],
    'paging': true,
    'info': false,
    'filter': true,
    'stateSave': true,
    'ajax':{
        "url": "/tutor/all",
        "type": "get",
        "dataSrc": ''
    },
    'columns':[
        {data: 'nombre'},
        {data: 'telefono'},
        {data: 'correo'},
        {'orderable': true,
            render: function(data, type, row){
                var output = '<button class="btn btn-outline-primary btn-circle" data-toggle="modal" data-target="#update-modal" onclick="actualizar(\''+row.id+'\',\''+row.nombre+'\',\''+row.telefono+'\',\''+row.correo+'\');"><i class="fas fa-edit"></i></button> ';
                if(row.estatus == 1){
                    output += '<button class="btn btn-outline-danger btn-circle" data-toggle="modal" data-target="#change-status-modal" onclick="cambiarEstatus(\''+row.correo+'\',\''+row.nombre+'\', \'INACTIVO\');"><i class="fas fa-times"></i></button>';
                }else{
                    output += '<button class="btn btn-outline-success btn-circle" data-toggle="modal" data-target="#change-status-modal" onclick="cambiarEstatus(\''+row.correo+'\',\''+row.nombre+'\', \'ACTIVO\');"><i class="fas fa-check"></i></button>';
                }
                return output;
            }
        }
    ],
    'columnDefs':[
        {
            'targets': '_all',
            'className': 'text-center'
        }
    ]
});

function actualizar(id, nombre, telefono, correo){
    $('#idupdate').val(id);
    $('#oldemail').val(correo);
    $('#nombre').val(nombre);
    $('#telefono').val(telefono);
    $('#correo').val(correo);
}

function cambiarEstatus(id, nombre, estatus){
    $('#idchange').val(id);
    $('#tutor').html(nombre);
    $('#status').html(estatus);
}

$('#form-update').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '/tutor/edit',
        method: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load-update').removeClass('d-none');
            $('#btn-cancel').addClass('d-none');
            $('#btn-update').addClass('d-none');
        },
        success: function(data){
            var tutor = $('#nombre').val();
            toastr.options.onHidden = function() { location.reload(); }
            toastr.success('Tutor(a) '+tutor+' actualizado(a)', '¡Éxito!', {timeOut: 1500})
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('update')) toastr.error(errors['update'][0], 'Error');
        },
        complete: function(){
            $('#btn-cancel').removeClass('d-none');
            $('#btn-update').removeClass('d-none');
            $('#load-update').addClass('d-none');
        }
    });
});

$('#btn-yes').click(function(){
    var id = $('#idchange').val();
    var token = $('#token').val();
    $.ajax({
        url: '/tutor/status',
        method: 'post',
        data: { _token: token, id : id },
        dataType: 'json',
        beforeSend: function(){
            $('#load-status').removeClass('d-none');
            $('#btn-not').addClass('d-none');
            $('#btn-yes').addClass('d-none');
        },
        success: function(data){
            var tutor = $('#tutor').text();
            toastr.options.onHidden = function() { location.reload(); }
            if($('#status').text() === 'ACTIVO'){
                toastr.success('Tutor(a) '+tutor+' activo(a)', '¡Éxito!', {timeOut: 1500})
            }else{
                toastr.success('Tutor(a) '+tutor+' inactivo(a)', '¡Éxito!', {timeOut: 1500})
            }
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('estatus')) toastr.error(errors['estatus'][0], 'Error');
        },
        complete: function(){
            $('#btn-not').removeClass('d-none');
            $('#btn-yes').removeClass('d-none');
            $('#load-status').addClass('d-none');
        }
    });
});

function validarTelefono(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
    }
    return false;        
}