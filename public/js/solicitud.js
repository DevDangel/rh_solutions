$('#modalVer').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var motivo = button.data('motivo');

    $('#motivoSolicitud').val(motivo);
});

// por ajax enviar datos
$('.btn-generar').on('click', function () {
    let solicitudId = $(this).data('id');

   $.ajax({
    url: '/admin/generar-certificado',
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //Enviar el token CSRF
    },
    data: {
        id_solicitud: solicitudId
    },
    success: function () {
        alert('✅ Certificado generado correctamente.');
           $('.btn-enviar[data-id="' + solicitudId + '"]').prop('disabled', false).css({
            'cursor': 'pointer',
            'opacity': '1'
        });
    },
    error: function (xhr) {
         if (xhr.status === 409) {
                alert('❌ Este contrato ya tiene un certificado en el historial. No puedes generar otro.');
            } else {
                alert('❌ Error al generar certificado: ' + xhr.responseText);
            }
    }
});
});
// Acción para el botón enviar
$('.btn-enviar').on('click', function () {
    event.preventDefault();
    let button = $(this);
    let solicitudId = button.data('id');

    // Prevenir múltiples clics
    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Enviando...');

    $.ajax({
        url:'/admin/enviar-certificado',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { id_solicitud: solicitudId },
        success: function (response) {
            alert('✅ Certificado enviado correctamente. Revisa tu correo.');
        },
        error: function (xhr) {
            let errorMsg = '❌ Error al enviar el certificado.';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMsg += '\n' + xhr.responseJSON.error;
            }
            alert(errorMsg);
        },
        complete: function () {
            // Restaurar botón
            button.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Enviar');
        }
    });
});


