$('#form-login').submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '/login',
        method: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load-login').removeClass('d-none');
            $('#btn-login').addClass('d-none');
        },
        success: function(data){
            location.reload();
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('correo')) $('#error-correo').html(errors['correo'][0]); else $('#error-correo').html('');
            if(errors.hasOwnProperty('clave')) $('#error-clave').html(errors['clave'][0]); else $('#error-clave').html('');
            if(errors.hasOwnProperty('login')) toastr.error(errors['login'][0], 'Error');
        },
        complete: function(){
            $('#btn-login').removeClass('d-none');
            $('#load-login').addClass('d-none');
        }
    });
});