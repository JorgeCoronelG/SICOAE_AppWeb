$('#tabla-vigilante').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Vigilantes",
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
        "url": "/vigilante/all",
        "type": "get",
        "dataSrc": ''
    },
    'columns':[
        {data: 'nombre'},
        {data: 'telefono'},
        {data: 'correo'},
        {'orderable': true,
            render: function(data, type, row){
                var output = '<button class="btn btn-outline-primary btn-circle" data-toggle="modal" data-target="#update-modal" onclick="actualizar(\''+row.id+'\',\''+row.nombre+'\',\''+row.telefono+'\',\''+row.correo+'\');"><i class="fas fa-edit"></i></button> '+
                    '<button class="btn btn-outline-danger btn-circle" data-toggle="modal" data-target="#delete-modal" onclick="eliminar(\''+row.correo+'\',\''+row.nombre+'\');"><i class="fas fa-times"></i></button>';
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

function eliminar(correo, nombre){
    $('#iddelete').val(correo);
    $('#vigilante').html(nombre);
}

$('#form-update').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '/vigilante/edit',
        method: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load-update').removeClass('d-none');
            $('#btn-cancel').addClass('d-none');
            $('#btn-update').addClass('d-none');
        },
        success: function(data){
            var vigilante = $('#nombre').val();
            toastr.options.onHidden = function() { location.reload(); }
            toastr.success('Vigilante '+vigilante+' actualizado', '¡Éxito!', {timeOut: 1500})
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
    var correo = $('#iddelete').val();
    var token = $('#token').val();
    $.ajax({
        url: '/vigilante/delete',
        method: 'post',
        data: { _token: token, correo : correo },
        dataType: 'json',
        beforeSend: function(){
            $('#load-status').removeClass('d-none');
            $('#btn-not').addClass('d-none');
            $('#btn-yes').addClass('d-none');
        },
        success: function(data){
            var vigilante = $('#vigilante').text();
            toastr.options.onHidden = function() { location.reload(); }
            toastr.success('Vigilante '+vigilante+' eliminado', '¡Éxito!', {timeOut: 1500})
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('delete')) toastr.error(errors['delete'][0], 'Error');
        },
        complete: function(){
            $('#btn-not').removeClass('d-none');
            $('#btn-yes').removeClass('d-none');
            $('#load-status').addClass('d-none');
        }
    });
});