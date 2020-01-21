$('#tabla-estudiante').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Estudiantes",
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
        "url": "/estudiante/all",
        "type": "get",
        "dataSrc": ''
    },
    'columns':[
        {data: 'matricula'},
        {data: 'tarjeta'},
        {data: 'nombre'},
        {'orderable': true,
            render: function(data, type, row){
                return row.grado+'° '+row.grupo;
            }
        },
        {data: 'nombre_tutor'},
        {'orderable': true,
            render: function(data, type, row){
                var output = '<button class="btn btn-outline-primary btn-circle" data-toggle="modal" data-target="#update-modal" onclick="actualizar(\''+row.matricula+'\',\''+row.tarjeta+'\',\''+row.nombre+'\',\''+row.grado+'\',\''+row.grupo+'\', \''+row.tutor+'\');"><i class="fas fa-edit"></i></button> '+
                '<button class="btn btn-outline-danger btn-circle" data-toggle="modal" data-target="#change-status-modal" onclick="cambiarEstatus(\''+row.correo+'\');"><i class="fas fa-times"></i></button>';
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

function actualizar(matricula, tarjeta, nombre, grado, grupo, tutor){
    $('#oldmatricula').val(matricula);
    $('#matricula').val(matricula);
    $('#tarjeta').val(tarjeta);
    $('#nombre').val(nombre);
    getGrado(grado);
    getGrupo(grupo);
    getTutor(tutor);
}

$('#form-update').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '/estudiante/edit',
        type: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load-update').removeClass('d-none');
            $('#btn-cancel').addClass('d-none');
            $('#btn-update').addClass('d-none');
        },
        success: function(data){
            var estudiante = $('#nombre').val();
            toastr.options.onHidden = function() { location.reload(); }
            toastr.success('Estudiante '+estudiante+' actualizado', '¡Éxito!', {timeOut: 1500})
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

function getGrado(grado){
    $.get('/grado/all', function(data){
        var output = '<option value="">Selecciona un grado:</option>';
        $.each(data, function(i, item){
            if(grado == item.grado)
                output += '<option value="'+item.grado+'" selected>'+item.grado+'°</option>';
            else
                output += '<option value="'+item.grado+'">'+item.grado+'°</option>';
        });
        $('#grado').html(output);
    });
}

function getGrupo(grupo){
    $.get('/grupo/all', function(data){
        var output = '<option value="">Selecciona un grupo:</option>';
        $.each(data, function(i, item){
            if(grupo == item.grupo)
                output += '<option value="'+item.grupo+'" selected>'+item.grupo+'</option>';
            else
                output += '<option value="'+item.grupo+'">'+item.grupo+'</option>';
        });
        $('#grupo').html(output);
    });
}

function getTutor(tutor){
    $.get('/tutor/all/actives', function(data){
        var output = '<option value="">Selecciona un tutor:</option>';
        $.each(data, function(i, item){
            if(tutor == item.id)
                output += '<option value="'+item.id+'" selected>'+item.nombre+' - '+item.telefono+'</option>';
            else
                output += '<option value="'+item.id+'">'+item.nombre+' - '+item.telefono+'</option>';
        });
        $('#tutor').html(output);
    });
}