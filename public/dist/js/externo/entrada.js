$('#form-externo').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '/externo/input',
        method: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load').removeClass('d-none');
            $('#btn-register').addClass('d-none');
        },
        success: function(data){
            var externo = $('#nombre').val();
            toastr.success(externo+' registrado(a)', '¡Éxito!')
            $('#form-externo')[0].reset();
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('nombre')) $('#error-nombre').html(errors['nombre'][0]); else $('#error-nombre').html('');
            if(errors.hasOwnProperty('telefono')) $('#error-telefono').html(errors['telefono'][0]); else $('#error-telefono').html('');
            if(errors.hasOwnProperty('personas')) $('#error-personas').html(errors['personas'][0]); else $('#error-personas').html('');
            if(errors.hasOwnProperty('motivo')) $('#error-motivo').html(errors['motivo'][0]); else $('#error-motivo').html('');
        },
        complete: function(){
            $('#btn-register').removeClass('d-none');
            $('#load').addClass('d-none');
        }
    });
});

function validarTelefono(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
    }
    return false;        
}