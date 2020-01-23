$('#form-vigilante').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '/vigilante/add',
        method: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function(){
            $('#load').removeClass('d-none');
            $('#btn-add').addClass('d-none');
        },
        success: function(data){
            var vigilante = $('#nombre').val();
            toastr.success('Vigilante '+vigilante+' agregado', '¡Éxito!')
            $('#form-vigilante')[0].reset();
        },
        error: function(jqXHR){
            let errors = jqXHR.responseJSON.errors;
            if(errors.hasOwnProperty('correo')) toastr.error(errors['correo'][0], 'Error');
        },
        complete: function(){
            $('#btn-add').removeClass('d-none');
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