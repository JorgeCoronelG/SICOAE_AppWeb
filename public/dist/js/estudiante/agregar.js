$.get('/grado/all', function(data){
    var output = '<option value="">Selecciona un grado:</option>';
    $.each(data, function(i, item){
        output += '<option value="'+item.grado+'">'+item.grado+'°</option>';
    });
    $('#grado').html(output);
});

$.get('/grupo/all', function(data){
    var output = '<option value="">Selecciona un grupo:</option>';
    $.each(data, function(i, item){
        output += '<option value="'+item.grupo+'">'+item.grupo+'</option>';
    });
    $('#grupo').html(output);
});

$.get('/tutor/all/actives', function(data){
    var output = '<option value="">Selecciona un tutor:</option>';
    $.each(data, function(i, item){
        output += '<option value="'+item.id+'">'+item.nombre+' - '+item.telefono+'</option>';
    });
    $('#tutor').html(output);
});

$('#form-estudiante').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '/estudiante/add',
        type: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load').removeClass('d-none');
            $('#btn-add').addClass('d-none');
        },
        success: function(data){
            var estudiante = $('#nombre').val();
            toastr.success('Estudiante '+estudiante+' agregado', '¡Éxito!')
            $('#form-estudiante')[0].reset();
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('add')) toastr.error(errors['add'][0], 'Error');
        },
        complete: function(){
            $('#btn-add').removeClass('d-none');
            $('#load').addClass('d-none');
        }
    });
});